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
			function ponPrefijo(cod, precio_total_vto, pais_origen_vto, estado_origen_vto, municipio_origen_vto, parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd, tipo_uniad_vto, capacidad_vto, medida_vto, idtipo_unidad_vto)
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
				opener.document.fsolicitud.txtdesc_tipo_unid.value = tipo_uniad_vto;
				opener.document.fsolicitud.txtcapacidad.value = capacidad_vto;
				opener.document.fsolicitud.txtdesc_unid_medi.value = medida_vto;
				opener.document.fsolicitud.txtidtipo_unidad.value = idtipo_unidad_vto;
				window.close()
			} 
		</script> 
		<style type="text/css">
		</style>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.css">
	</head>
	<body style="background:#FAFAFA"> 
		<h1>
			<?php 
				include("../../modelo/class_tabulador.php");
				$objEquipo = new class_tabulador();
				$lista    = $objEquipo->CatalogoTabuladorSolicitud();
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
	<div class="col-md-12">
		<div class="row spa">

				<div class="panel panel-default">
					<div class="panel-heading"><div class="panel-title"><a href="CatalogoTabuladorSolicitud.php"><i class="glyphicon glyphicon-align-justify"></i>Catalogo de Tabulador</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="BuscaTabuladorSolicitud.php"><i class="glyphicon glyphicon-folder-open"></i>Busqueda de Tabulador</a></div></div>
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
										<th>Medida</th>
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
											$medida_vto = $lista[$i][16];
											$precio_total_vto = $lista[$i][17];
											$idtipo_unidad_vto = $lista[$i][18];
										?>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"> <?php echo $codig ?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $ciudad_origen_vto?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $ciudad_destino_vtd?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $nomb?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $modelo?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $tipo_uniad_vto?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $capacidad_vto?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $medida_vto?></a></th>
										<th><a href=""  onClick="ponPrefijo('<?php echo $codig?>', '<?php echo $precio_total_vto?>', '<?php echo $pais_origen_vto?>', '<?php echo $estado_origen_vto?>', '<?php echo $municipio_origen_vto?>', '<?php echo $parroquia_origen_vto?>', '<?php echo $ciudad_origen_vto?>', '<?php echo $pais_destino_vtd?>', '<?php echo $estado_destino_vtd?>', '<?php echo $municipio_destino_vtd?>', '<?php echo $parroquia_destino_vtd?>', '<?php echo $ciudad_destino_vtd?>', '<?php echo $tipo_uniad_vto?>', '<?php echo $capacidad_vto?>', '<?php echo $medida_vto?>', '<?php echo $idtipo_unidad_vto?>')"><?php echo $precio_total_vto?></a></th>
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
