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
			function ponPrefijo(IdVRelcon, nombre_vrc, apellido_vrc, telefono_vrc, idunidad_vru, placa_vru, idremolque_vrr, placa_vrr)
			{ 
				opener.document.fordcar.txtcedula.value = IdVRelcon;
				opener.document.fordcar.txtnombre_per.value = nombre_vrc;
				opener.document.fordcar.txtapellido_per.value = apellido_vrc;
				opener.document.fordcar.txttelefono_corp_per.value = telefono_vrc;
				opener.document.fordcar.txtidunidad.value = idunidad_vru;
				opener.document.fordcar.txtplaca_uni.value = placa_vru;
				opener.document.fordcar.txtidremolque.value = idremolque_vrr;
				opener.document.fordcar.txtplaca_rem.value = placa_vrr;
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
				include("../../modelo/class_reluni.php");
				$objEquipo = new class_reluni();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->BuscaReluni($cod,$nombre);
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
					<div class="panel-heading"><a href="CatalogoReluniOrdcar.php"><strong><i class="glyphicon glyphicon-align-justify"></i>Catalogo  Condutor</strong></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="BuscaReluniOrdcar.php"><strong><i class="glyphicon glyphicon-folder-open"></i>Busqueda de Conductor</strong></a></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Cedula</th>
										<th>Nmbre</th>
										<th>Apellido</th>
										<th>Telefono</th>
										<th>Unidad</th>
										<th>Placa</th>
										<th>Remolque</th>
										<th>Placa</th>
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
											$IdVRelcon = $lista[$i][1];
											$nombre_vrc = $lista[$i][2];
											$apellido_vrc = $lista[$i][3];
											$telefono_vrc = $lista[$i][4];
											$correo_vrc = $lista[$i][5];
											$idunidad_vru = $lista[$i][6];
											$placa_vru = $lista[$i][7];
											$idremolque_vrr = $lista[$i][8];
											$placa_vrr = $lista[$i][9];
										?>
										<th><input name="textfield"  class="form-control" type="text"           value="<?php echo $IdVRelcon ?>"  onClick="ponPrefijo(this.value, '<?php echo $nombre_vrc?>', '<?php echo $apellido_vrc?>', '<?php echo $telefono_vrc?>', '<?php echo $idunidad_vru?>', '<?php echo $placa_vru?>', '<?php echo $idremolque_vrr?>', '<?php echo $placa_vrr?>')"></th>
										<th><input name="textfield3" class="form-control" type="text"  readonly value="<?php echo $nombre_vrc?>"></th>
										<th><input name="textfield4" class="form-control" type="text"  readonly value="<?php echo $apellido_vrc?>"></th>
										<th><input name="textfield1" class="form-control" type="text"  readonly value="<?php echo $telefono_vrc?>"></th>
										<th><input name="textfield5" class="form-control" type="text"  readonly value="<?php echo $idunidad_vru?>"></th>
										<th><input name="textfield6" class="form-control" type="text"  readonly value="<?php echo $placa_vru?>"></th>
										<th><input name="textfield7" class="form-control" type="text"  readonly value="<?php echo $idremolque_vrr?>"></th>
										<th><input name="textfield2" class="form-control" type="text"  readonly value="<?php echo $placa_vrr?>"></th>
									</tr>
									<?php 
										}
									?>  
									</tr>
								</tbody> 
							</table>
							<h4 style="color:#DB4D4D;"> Para seleccionar un Conductor, haga click en la Cedula.</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body> 
</html> 
