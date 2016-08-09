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
	require_once("../../modelo/class_tabviatico.php");
?>
<html> 
	<head> 
		<title>ATCSISTEM</title> 
		<script> 
			function ponprefijo(valor)
			{ 
				
				opener.document.fproducto.txtoperacion.value="buscar";
				opener.document.fproducto.txtidtabulador.value=valor;
				opener.document.fproducto.submit();
				window.close();
			} 
		</script> 
		<style type="text/css">
		</style>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.css">
	</head>
	<body style="background: #FAFAFA"> 
		<h1>
			<?php 
				$objtabvia= new class_tabviatico();
				$listado_tabvia = $objtabvia->flistar();
			?>
		</h1>
		
			<div class="col-md-5">
				<div class="panel panel-default">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-folder-open"></i>Tabuladores de Viaticos</div></div>
						<div class="panel-body">
							<table class="table table-bordered table-striped table-hover">
								<thead>
								  <tr>
									<th>Código</th>
									<th>Ruta</th>
									<th>Origen</th>
									<th>Destino</th>
									<th>Dias de Ruta</th>
									<th>Total Viaticos</th>
								</tr>
								</thead>
								<thead>
								<?php if(count($listado_tabvia)): ?>
								<?php foreach($listado_tabvia as $valor): ?>
									<tr>
										<td><a href="javascript:ponprefijo('<?php echo $valor['codigo']  ?>');" ><?php echo $valor['codigo']  ?></a></td>
										<td><?php echo $valor['ruta']  ?></td>
										<td><?php echo $valor['origen']  ?></td>
										<td><?php echo $valor['destino']  ?></td>
										<td><?php echo $valor['dias']  ?></td>
										<td><?php echo $valor['total']  ?></td>
								  </tr>
								<?php endforeach;  ?>  
								<?php endif;  ?>
								</thead>
							  </table>
						</div>
					</div>
				</div>
	</body> 
</html> 
