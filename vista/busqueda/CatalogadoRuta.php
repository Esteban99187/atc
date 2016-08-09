<?php
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSISTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                                                                                           *
	*  Este programa es software libre, puede redistribuirlo y / o modificar                    *
	*  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
	*  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
	*                                                                                           *
	*  Este programa se distribuye con la esperanza de que sea útil,                            *
	*  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
	*  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
	*                                                                                           *
	********************************************************************************************/
	session_start();
	$msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="../../adsertrans.php" </script>');
	}
	if($msj)
	{
		echo "<script> alert('".$msj."') </script>";
	}
?>
<html> 
	<head> 
		<title>ATCSISTEM</title> 
		<script> 
			function ponPrefijo(cod, nomco, modelo, pais_origen_vro, estado_origen_vro, municipio_origen_vro, parroquia_origen_vro, ciudad_origen_vro, pais_destino_vrd, estado_destino_vrd, municipio_destino_vrd, parroquia_destino_vrd, ciudad_destino_vrd)
			{ 
				opener.document.ftabulador.txtidruta.value = cod;
				opener.document.ftabulador.txtvia_rut.value = nomco;
				opener.document.ftabulador.txtkilometraje_tab.value = modelo;
				opener.document.ftabulador.cmbidpais_origen_tabulador.value = pais_origen_vro;
				opener.document.ftabulador.cmbidestado_origen_tabulador.value = estado_origen_vro;
				opener.document.ftabulador.cmbidmunicipio_origen_tabulador.value = municipio_origen_vro;
				opener.document.ftabulador.cmbidparroquia_origen_tabulador.value = parroquia_origen_vro;
				opener.document.ftabulador.cmbidciudad_origen_tabulador.value = ciudad_origen_vro;
				opener.document.ftabulador.cmbidpais_destino_tabulador.value = pais_destino_vrd;
				opener.document.ftabulador.cmbidestado_destino_tabulador.value = estado_destino_vrd;
				opener.document.ftabulador.cmbidmunicipio_destino_tabulador.value = municipio_destino_vrd;
				opener.document.ftabulador.cmbidparroquia_destino_tabulador.value = parroquia_destino_vrd;
				opener.document.ftabulador.cmbidciudad_destino_tabulador.value = ciudad_destino_vrd;
				window.close()
			} 
		</script> 
		<style type="text/css">
		</style>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.css">
	</head>
	<body style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
	background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */"> 
		<h1>
			<?php 
				include("../../modelo/class_ruta.php");
				$objEquipo = new class_ruta();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->FBuscaRuta($cod,$nombre);
				if($lista=="99")
				{
			?>
			<script> 
				alert("No se han encontrado resultados en la busqueda.");
			</script> 
			<script languaje='javascript' type='text/javascript'>window.close();</script>;
			<?php 
				}
			?>
		</h1>
		<div class="row spa">
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="CatalogoRuta.php"><strong><i class="glyphicon glyphicon-align-justify"></i>Catalogo de Rutas</strong></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="BuscaRuta.php"><strong><i class="glyphicon glyphicon-folder-open"></i>Busqueda de Rutas</strong></a></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Ciudad Origen</th>
										<th>Ciudad Destino</th>
										<th>Via</th>
										<th>Kilometraje</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if ($lista<0)
											echo "ERROR: no se logro la conexion a la bd";
											else
											for($i=0;$i<count($lista);$i++)
											{
											$codig= $lista[$i][1];
											$nomb = $lista[$i][2];
											$modelo = $lista[$i][3];
											$pais_origen_vro = $lista[$i][4];
											$estado_origen_vro = $lista[$i][5];
											$municipio_origen_vro = $lista[$i][6];
											$parroquia_origen_vro = $lista[$i][7];
											$ciudad_origen_vro = $lista[$i][8];
											$pais_destino_vrd = $lista[$i][9];
											$estado_destino_vrd = $lista[$i][10];
											$municipio_destino_vrd = $lista[$i][11];
											$parroquia_destino_vrd = $lista[$i][12];
											$ciudad_destino_vrd = $lista[$i][13];
										?>
										<th><input name="textfield"  class="form-control" type="text"           value="<?php echo $codig ?>"  onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"></th>
										<th><input name="textfield1" class="form-control" type="text"  readonly value="<?php echo $ciudad_origen_vro?>"></th>
										<th><input name="textfield2" class="form-control" type="text"  readonly value="<?php echo $ciudad_destino_vrd?>"></th>
										<th><input name="textfield3" class="form-control" type="text"  readonly value="<?php echo $nomb?>"></th>
										<th><input name="textfield4" class="form-control" type="text"  readonly value="<?php echo $modelo?>"></th>
									</tr>
									<?php 
										}
									?>  
									</tr>
								</tbody> 
							</table>
							<h4 style="color:#DB4D4D;"> Para seleccionar una Ruta, haga click en el Codigo.</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body> 
</html> 
