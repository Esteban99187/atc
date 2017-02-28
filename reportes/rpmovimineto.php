<?php 
	session_start();
	date_default_timezone_set("America/Asuncion");
	/*
	require_once("../modelo/clsSesion.php");
	$objSesion = new clsSesion;
	$conf = $objSesion->getArrayConfiguracion();
	*/
	$lcFecha=@date("d/m/Y");
	$lcHora =@date('g:i:s A');
	include("libreriaReporte.php");

	function base_url(){
		if (isset($_SERVER['HTTP_HOST'])){
			$base_url = (empty($_SERVER['HTTPS']) OR strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
			$base_url .= '://'. $_SERVER['HTTP_HOST'];
			$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
		}else{
			$base_url = "http://localhost/atcsistem/";
		}
		return $base_url;
	}
	
	require_once("../modelo_alberto/clsInventario.php");
	$objproducto=new Inventario;
	if(isset($_GET["id"])){
		$laMatriz=$objproducto->listarMovimiento($_GET["id"]);
	}else{
		$parametros = array(
			"porReporte" => $_GET["tipomovimiento"],
			"tipoReporte" => $_GET["tipo"],
			"producto" => $_GET["producto"],
			"fecha" => $_GET["fecha"]
		);
		$laMatriz=$objproducto->listarMovimiento("",2,$parametros);
		$jsonProductos = array();
		$todasEntradas = $objproducto->consultarTotalesEntrada($_GET["fecha"]);
		$todasSalidas = $objproducto->consultarTotalSalidas($_GET["fecha"]);
				
		if($parametros["porReporte"]==1 && ($parametros["tipoReporte"]==1 || $parametros["tipoReporte"]==2) ){
			$EntradasPor = $objproducto->consultarEntradasPor($_GET["fecha"],$parametros["tipoReporte"]);
			if($EntradasPor){
				foreach ($EntradasPor as $Ientry => $entrada) {
					$jsonProductos[$Ientry]["name"] = $entrada["producto"];
					$jsonProductos[$Ientry]["y"] = intval($entrada["cantidad"]);
				}
			}
		}

		if($parametros["porReporte"]==2 && ($parametros["tipoReporte"]==1 || $parametros["tipoReporte"]==2) ){
			$salidasPor = $objproducto->consultarSalidasPor($_GET["fecha"],$parametros["tipoReporte"]);
			if($salidasPor){
				foreach ($salidasPor as $Ientry => $salida) {
					$jsonProductos[$Ientry]["name"] = $salida["producto"];
					$jsonProductos[$Ientry]["y"] = intval($salida["cantidad"]);
				}
			}
		}


		$productoEntrada = "";
		if($todasEntradas){
			foreach ($todasEntradas as $entry => $Tentradas) {
				if($parametros["porReporte"]==1 && $parametros["tipoReporte"]==4){
					$jsonProductos[$entry]["name"] = $Tentradas["producto"];
					$jsonProductos[$entry]["y"] = intval($Tentradas["cantidad"]);
				}

				$productoEntrada .= "'".$Tentradas["producto"]."', ";
				$totalesEntradas .= intval($Tentradas["cantidad"]).", ";
			}
		}
		
		if($todasSalidas){
			foreach ($todasSalidas as $entry => $Tsalidas) {
				if($parametros["porReporte"]==2 && $parametros["tipoReporte"]==4){
					$jsonProductos[$entry]["name"] = $Tsalidas["producto"];
					$jsonProductos[$entry]["y"] = intval($Tsalidas["cantidad"]);
				}

				$totalesSalidas .= intval($Tsalidas["cantidad"]).", ";
			}
		}
	}
	if(isset($_GET["fecha"])){
		$arrFecha = explode("-",$_GET["fecha"]);
		if($arrFecha[0]==$arrFecha[1] && $arrFecha[0]==date("d/m/Y")){
			$desdefecha = $arrFecha[1];
		}else{
			$desdefecha = " de la fecha: ".$arrFecha[0]." hasta: ".$arrFecha[1];
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			body {
				background-image:url("tico.png"); background-repeat:no-repeat; background-position:center center; background-size: 600px 350px;
			}

			.nombreReporte{ font-size: 18px; font-family: arial; font-style: italic; }
			.titulo{ font-size: 10px; font-family: arial; font-weight: 100; }
			.normal{ font-size: 10px; font-family: arial; font-weight: bold; }
			.separacion{margin-bottom: 15px; margin-top: 15px;}
			.height { min-height: 150px; }
			.icon { font-size: 47px; color: #5CB85C; }
			.iconbig { font-size: 77px; color: #5CB85C;}
			.table > tbody > tr > .emptyrow { border-top: none;}
			.table > thead > tr > .emptyrow { border-bottom: none; }
			.table > tbody > tr > .highrow { border-top: 3px solid; }
			@media print{ .noimprimir{ display: none} }
			.panel,.panel-heading,.panel-body{
				background: transparent!important;
			}
			.panel-heading{

			}
			.panel-body{

			}
		</style>
		<link rel="stylesheet" href="../vista/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/fontawesome/css/font-awesome.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="cabecera">
					<!--<img src="../img/CABECERA.jpg" width="100%">-->
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h2 align="center">Movimiento de Productos <?php echo $desdefecha ?></h2>
						<!--<a href="#" class=".noimprimir"><i class="fa fa-file-pdf-o fa-4x pull-right .noimprimir"></i></a>-->
					</div>
					<hr />
				</div>
				<div class="row">
				<?php 
					if(isset($_GET["id"])){
						$fecha = implode("-",array_reverse(explode("-", $laMatriz[0]["fecha"])));
						if($laMatriz[0]["tipomovimiento"]==1){
							$tipoProducto = "Entrada";
							$nro = $laMatriz[0][0];
							$motivo  = "Observación";
							$siFechaVence = true;
						}
						else{
							$tipoProducto = "Salida";
							$motivo  = "Motivo";
							$nro = $laMatriz[0][4];	
							$siFechaVence = false;
						}
				?>
				
					<div class="col-xs-10 col-md-6 col-lg-6 pull-left">
	                    <div class="panel panel-default height">
	                        <div class="panel-heading"><b>Información</b></div>
	                        <div class="panel-body">
	                        	<strong>Nro de <?php echo $tipoProducto ?>: </strong><?php echo $nro ?><br>
	                        	<strong><?php echo $motivo ?>: </strong><?php echo $laMatriz[0][2] ?><br>
	                        	<strong>Fecha: </strong><?php echo $fecha ?><br>
	                        	
	                        </div>
	                    </div>
	                </div>
					<?php if($laMatriz[0]["responsable"]!=""){ ?>
					<div class="row">
						<div class="col-xs-12 col-md-6 col-lg-6 pull-left">
		                    <div class="panel panel-default height">
		                        <div class="panel-heading"><b>Responsable</b></div>
		                        <div class="panel-body">
		                            <strong><?php echo $laMatriz[0]["responsable"]; ?></strong>
		                        </div>
		                    </div>
		                </div>
					</div>
					<?php } ?>
				<?php
					}
				?>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
		                <div class="panel-heading">
		                    <h3 class="text-center"><strong>Productos</strong></h3>
		                </div>
		                <div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover table-striped table-condensed">
									<thead>
										<tr>
											<th>Nro</th>
											<?php if(!isset($_GET["id"])){ ?>
											<th>Fecha del Movimiento</th>
											<?php } ?>
											<th>Producto</th>
											<th>Cantidad</th>
											
											<?php if(!isset($_GET["id"])){ ?>
											<th>Fecha de Vencimiento</th>
											<th>Tipo</th>
											<th>Condición</th>
											<?php }else if($siFechaVence){ ?>
												
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php 
											if($laMatriz!=NULL or $laMatriz!=""){
												$totales = 0; $entrada = 0; $salida = 0; $inicial = 0; $ajuste = 0; $fecha = 0; $danho = 0;
												
												foreach ($laMatriz as $index => $matriz) {

													

													$fechaVencimiento = implode("-",array_reverse(explode("-", $matriz["fechavence"])));
													$totales ++;
													if($matriz["tipomovimiento"]==1){
														$entrada++;
														if($matriz["tipo"]==1) $inicial++;
														else $ajuste++;
													}else{
														$salida++;
														if($matriz["tipo"]==1) $fecha++;
														else $danho++;
													}
										?>
											<tr>
												<td><?php echo intval($index+1) ?></td>
												<?php if(!isset($_GET["id"])){ ?>
												<td><?php echo $objproducto->set_fecha($matriz["fecha"]) ?></td>
												<?php } ?>
												<td><?php echo $matriz["producto"]; ?></td>
												<td><?php echo $matriz["cantidad"]; ?></td>
												
												<?php if(!isset($_GET["id"])){ ?>
													<td><?php echo $fechaVencimiento; ?></td>	
													<td><?php echo ($matriz["tipomovimiento"]==1)?"ENTRADA":"SALIDA"; ?></td>
													<?php if($matriz["tipomovimiento"]==1){ ?>
													<td><?php echo ($matriz["tipo"]==1)?"INVENTARIO INICIAL":"AJUSTE POR ENTRADA"; ?></td>
													<?php }else{ ?>
													<td><?php echo ($matriz["tipo"]==1)?"FECHA DE VENCIMIENTO":"POR DAÑOS"; ?></td>
													<?php } ?>
													<?php  ?>
												<?php }else{ ?>
													
												<?php } ?>
											</tr>
										<?php }
											}else {//fin del if cuando no hay nada 
										?>
										<tr>
											<td colspan="8" align="center"><b>NO HAY NADA QUE REPORTAR PARA ESTOS PARAMETROS</b></td>
										</tr>
										<?php 
											}
											//aqui obtengo los pocentanjes con reglas de 3
										/*
											$porcenEntrada = floatval($entrada * 100 / $totales);
											$porcenSalida = floatval($salida * 100 / $totales);

											$porcenInicial = floatval($inicial * 100 / $entrada);
											$porcenAjuste = floatval($ajuste * 100 / $entrada);

											$porcenFecha = floatval($fecha * 100 / $salida);
											$porcenDanho = floatval($danho * 100 / $salida);
										*/
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr />
			<?php 
				if( (isset($_GET["producto"]) && !empty($_GET["producto"]) && $_GET["producto"]>0) || (isset($_GET["id"])) ){

			?>

			<?php }else if( ($parametros["porReporte"]==1 || $parametros["porReporte"]==2) && ($parametros["tipoReporte"]==1 || $parametros["tipoReporte"]==2 || $parametros["tipoReporte"]==4) ){ ?>
				<div class="row">
					<div class="col-md-12 col-sm-12" id="grafica5">
						
					</div>
				</div>
	
			<?php }else if(!isset($parametros["porReporte"])){ ?>
				<div class="row">
					<div class="col-md-4 col-sm-12" id="grafica1">
						
					</div>
					<div class="col-md-4 col-sm-12" id="grafica2">
						
					</div>
					<div class="col-md-4 col-sm-12" id="grafica3">
						
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-12" id="grafica4">
						
					</div>
				</div>
			<?php } ?>


			<hr />
			
		</div>
		<hr />
		<div style="padding-top: 20px"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12" align="center">
					<b> </b>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript" src="../js/graficos/js/highcharts.js"></script>
<script type="text/javascript" src="../js/graficos/js/modules/exporting.js"></script>
<script type="text/javascript" src="../js/graficos/js/modules/offline-exporting.js"></script>
<script>
    $(document).ready(function () {
    	if($("#grafica1").length>0){
	        $('#grafica1').highcharts({
	            chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
	            title: { text: 'Movimientos Generales' },
	            tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
	            plotOptions: {
	                pie: { allowPointSelect: true, cursor: 'pointer', dataLabels: { enabled: false }, showInLegend: true }
	            },
	            series: [{
	                name: 'Porcentaje',
	                colorByPoint: true,
	                data: [{
	                    name: 'Entradas',
	                    y: <?php echo $entrada ?>
	                }, {
	                    name: 'Salidas',
	                    y: <?php echo $salida ?>,
	                    sliced: true,
	                    selected: true
	                }]
	            }]
	        });
	    }
	    if($("#grafica2").length>0){
	        $('#grafica2').highcharts({
	            chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
	            title: { text: 'Movimientos de Entrada' },
	            tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
	            plotOptions: {
	                pie: { allowPointSelect: true, cursor: 'pointer', dataLabels: { enabled: false }, showInLegend: true }
	            },
	            series: [{
	                name: 'Porcentaje',
	                colorByPoint: true,
	                data: [{
	                    name: 'Inventario Inicial',
	                    y: <?php echo $inicial ?>
	                }, {
	                    name: 'Ajustes Por Entrada',
	                    y: <?php echo $ajuste ?>,
	                    sliced: true,
	                    selected: true
	                }]
	            }]
	        });
	    }
	    if($("#grafica3").length>0){
	        $('#grafica3').highcharts({
	            chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
	            title: { text: 'Movimientos de Salida'  },
	            tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
	            plotOptions: {
	                pie: { allowPointSelect: true, cursor: 'pointer', dataLabels: { enabled: false }, showInLegend: true }
	            },
	            series: [{
	                name: 'Porcentaje',
	                colorByPoint: true,
	                data: [{
	                    name: 'Por Fecha de Vencimiento',
	                    y: <?php echo $fecha ?>
	                }, {
	                    name: 'Por Dañs',
	                    y: <?php echo $danho ?>,
	                    sliced: true,
	                    selected: true
	                }]
	            }]
	        });
    	}
    	if($("#grafica4").length>0){
	        $('#grafica4').highcharts({
		        chart: { type: 'column' },
		        title: { text: 'Movimientos de Entrada y Salida' },
		        subtitle: { text: 'Por Productos' },
		        xAxis: { categories: [ <?php echo $productoEntrada ?> ], crosshair: true },
		        yAxis: { min: 0, title: { text: 'Cantidad' } },
		        tooltip: {
		            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		                '<td style="padding:0"><b>{point.y} </b></td></tr>',
		            footerFormat: '</table>',
		            shared: true,
		            useHTML: true
		        },

		        plotOptions: {
		        	series: {
		                borderWidth: 0,
		                dataLabels: {
		                    enabled: true,
		                    format: '{point.y}'
		                }
		            },
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        series: [{
		            name: 'Entrada',
		            data: [<?php echo $totalesEntradas ?>]

		        }, {
		            name: 'Salida',
		            data: [<?php echo $totalesSalidas ?>]

		        }]
		    });
		}
		if($("#grafica5").length>0){
			$('#grafica5').highcharts({
	            chart: { plotBackgroundColor: null, plotBorderWidth: null, plotShadow: false, type: 'pie' },
	            <?php 
	            	if($_GET["tipomovimiento"]==1){
	            		if($_GET["tipo"]==4){
	            			$titulo="Movimientos de Entrada";
	            		}else{
							$titulo = ($_GET["tipo"]==1)?"Inventario Inicial":"Ajuste por Entrada";
						}
	            	}else if($_GET["tipomovimiento"]==2){
	            		if($_GET["tipo"]==4){
	            			$titulo="Movimientos de Salida";
	            		}else{
	            			$titulo = ($_GET["tipo"]==1)?"Fecha De Vencimiento":"Daños";;
	            		}
	            	}
	            ?>
	            title: { text: 'Porcentaje de <?php echo $titulo ?> por Producto' },
	            tooltip: { pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' },
	            plotOptions: {
	                pie: { allowPointSelect: true, cursor: 'pointer', dataLabels: { enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %', style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' } }, showInLegend: true }
	            },
	            series: [{
	                name: 'Porcentaje',
	                colorByPoint: true,
	                data: <?php echo json_encode($jsonProductos); ?>
	                	
	                
	            }]
	        });
		}
    });
</script>