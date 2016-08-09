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
			function ponPrefijo(cod, precio_total_vto, pais_origen_vto, estado_origen_vto, municipio_origen_vto, parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd)
			{ 
				opener.document.fsolicitud.txtidtabulador.value = cod;
				opener.document.fsolicitud.txtprecio_tabulador.value = precio_total_vto;
				opener.document.fsolicitud.cmbidpais_origen_tabulador.value = pais_origen_vto;
				opener.document.fsolicitud.cmbidestado_origen_tabulador.value = estado_origen_vto;
				opener.document.fsolicitud.cmbidmunicipio_origen_tabulador.value = municipio_origen_vto;
				opener.document.fsolicitud.cmbidparroquia_origen_tabulador.value = parroquia_origen_vto;
				opener.document.fsolicitud.cmbidciudad_origen_tabulador.value = ciudad_origen_vto;
				opener.document.fsolicitud.cmbidpais_destino_tabulador.value = pais_destino_vtd;
				opener.document.fsolicitud.cmbidestado_destino_tabulador.value = estado_destino_vtd;
				opener.document.fsolicitud.cmbidmunicipio_destino_tabulador.value = municipio_destino_vtd;
				opener.document.fsolicitud.cmbidparroquia_destino_tabulador.value = parroquia_destino_vtd;
				opener.document.fsolicitud.cmbidciudad_destino_tabulador.value = ciudad_destino_vtd;
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
				include("../../modelo/class_tabulador.php");
				$objEquipo = new class_tabulador();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->BuscaTabuladorSolicitud($cod,$nombre);
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
					<div class="panel-heading"><a href="CatalogoTabuladorSolicitud.php"><strong><i class="glyphicon glyphicon-align-justify"></i>Catalogo de Tabulador</strong></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="BuscaTabuladorSolicitud.php"><strong><i class="glyphicon glyphicon-folder-open"></i>Busqueda de Tabulador</strong></a></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Ciudad Origen</th>
										<th>Ciudad Destino</th>
										<th>Via</th>
										<th>Kilometraje</th>
										<th>Tipo de Unidad</th>
										<th>Capacidad</th>
										<th>Precio Total</th>
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
											$pais_origen_vto = $lista[$i][4];
											$estado_origen_vto = $lista[$i][5];
											$municipio_origen_vto = $lista[$i][6];
											$parroquia_origen_vto = $lista[$i][7];
											$ciudad_origen_vto = $lista[$i][8];
											$pais_destino_vtd = $lista[$i][9];
											$estado_destino_vtd = $lista[$i][10];
											$municipio_destino_vtd = $lista[$i][11];
											$parroquia_destino_vtd = $lista[$i][12];
											$ciudad_destino_vtd = $lista[$i][13];
											$tipo_uniad_vto = $lista[$i][14];
											$capacidad_vto = $lista[$i][15];
											$precio_total_vto = $lista[$i][16];
										?>
										<th><input name="textfield"  class="form-control" type="text"           value="<?php echo $codig ?>"  onClick="ponPrefijo(this.value, '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>')"></th>
										<th><input name="textfield1" class="form-control" type="text"  readonly value="<?php echo $ciudad_origen_vto?>"></th>
										<th><input name="textfield2" class="form-control" type="text"  readonly value="<?php echo $ciudad_destino_vtd?>"></th>
										<th><input name="textfield3" class="form-control" type="text"  readonly value="<?php echo $nomb?>"></th>
										<th><input name="textfield4" class="form-control" type="text"  readonly value="<?php echo $modelo?>"></th>
										<th><input name="textfield5" class="form-control" type="text"  readonly value="<?php echo $tipo_uniad_vto?>"></th>
										<th><input name="textfield6" class="form-control" type="text"  readonly value="<?php echo $capacidad_vto?>"></th>
										<th><input name="textfield7" class="form-control" type="text"  readonly value="<?php echo $precio_total_vto?>"></th>
									</tr>
									<?php 
										}
									?>  
									</tr>
								</tbody> 
							</table>
							<h4 style="color:#DB4D4D;"> Para seleccionar un Tabulador, haga click en el Codigo.</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body> 
</html> 
