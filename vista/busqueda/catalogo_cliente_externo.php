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
  $msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
  if($msj)
  	{
  		echo "<script> alert('".$msj."') </script>";
  	}

?>
<html> 
<head> 
    <title>ATCSISTEM</title> 
<script> 
function ponPrefijo(cod, nomco, modelo, repre, direc){ 
	opener.document.fusuarioexterno_empresa.txtcedula.value = cod;
	opener.document.fusuarioexterno_empresa.txtnombre.value = nomco;
	opener.document.fusuarioexterno_empresa.txttelefono.value = modelo;
	opener.document.fusuarioexterno_empresa.txtcorreo.value = repre;
	opener.document.fusuarioexterno_empresa.txtapellido.value = direc;
	window.close()	
} 
</script> 
<style type="text/css">
</style>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.css">
</head> 

<body style="background:#FAFAFA"> 
<h1><?php 
				include("../../modelo/class_cliente.php");
				$objEquipo = new class_cliente();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadoempresa($cod,$nombre);
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

	
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title"><a href="busca_cliente_externo.php"><i class="glyphicon glyphicon-arrow-left"></i></a>&nbsp;&nbsp;Seleccione Cliente</div></div>
				<div class="panel-body">
			<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>RIF</th>
        <th>Razón Social</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
					
					<?php
						if ($lista<0)
							echo "ERROR: no se logro la conexion a la bd";
						else
							for($i=0;$i<count($lista);$i++){
								$codig= $lista[$i][1];
								$nomb = $lista[$i][2];
								$modelo = $lista[$i][3];
								$repre = $lista[$i][4];
								$direc = $lista[$i][5];
							?>
					<th>
					  <a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $repre?>', '<?php echo $direc?>')"><?php echo $codig ?></a></th>
					 <th> <a href="" onClick="ponPrefijo('<?php echo $codig ?>', '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $repre?>', '<?php echo $direc?>')"><?php echo $nomb?></a>
				</th>
				  <?php }?>
			</tr>
    </tbody> 
		</table>
			 
		</div>
</body> 
</html> 
