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
	<body style="#FAFAFA"> 
		<h1>
			<?php 
				include("../../modelo/class_ruta.php");
				$objEquipo = new class_ruta();
				$lista    = $objEquipo->ListadoRuta();
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
				<div class="panel panel-default">
					<div class="panel-heading"><div class="panel-title"><a href="CatalogoRuta.php"><i class="glyphicon glyphicon-align-justify"></i>Catalogo de Rutas</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="BuscaRuta.php"><i class="glyphicon glyphicon-folder-open"></i>Busqueda de Rutas</a></div></div>
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
										<th><a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"><?php echo $codig ?></a></th>
										<th><a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"><?php echo $ciudad_origen_vro?></a></th>
										<th><a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"><?php echo $ciudad_destino_vrd?></a></th>
										<th><a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"><?php echo $nomb?></a></th>
										<th><a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $pais_origen_vro?>', '<?php echo $estado_origen_vro?>', '<?php echo $municipio_origen_vro?>', '<?php echo $parroquia_origen_vro?>', '<?php echo $ciudad_origen_vro?>', '<?php echo $pais_destino_vrd?>', '<?php echo $estado_destino_vrd?>', '<?php echo $municipio_destino_vrd?>', '<?php echo $parroquia_destino_vrd?>', '<?php echo $ciudad_destino_vrd?>')"><?php echo $modelo?></a></th>
									</tr>
									<?php 
										}
									?>  
									</tr>
								</tbody> 
							</table>
							
						</div>
					</div>
				</div>
			</div>
		
	</body> 
</html> 
