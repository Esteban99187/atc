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
function ponPrefijo(cod, nomco, modelo, repre, unid){ 
	opener.document.fsolicitud_cliente.txtidproducto.value = cod;
	opener.document.fsolicitud_cliente.txtnombre_pro.value = nomco;
	opener.document.fsolicitud_cliente.txtnombre_tippro.value = modelo;
	opener.document.fsolicitud_cliente.txtnombre_tipuni.value = repre;
	opener.document.fsolicitud_cliente.txtnombre_unimed.value = unid;
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
<h1><?php 
				include("../../modelo/class_producto.php");
				$objEquipo = new class_producto();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadoproductosoli($cod,$nombre);
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
			<div class="panel-heading"><strong><a href="buscaproductosoli_cliente.php"><strong><i class="glyphicon glyphicon-arrow-left"></i></a>&nbsp;&nbsp;Seleccione Producto</strong></div>
				<div class="panel-body">
			<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
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
								$unid = $lista[$i][5];
							?>
					<th><input name="textfield"  type="text"value="<?php echo $codig ?>" size="10" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $repre?>', '<?php echo $unid?>')"></th>
						<th>
					  <input name="textfield2" class="form-control" type="text" size="150" readonly value="<?php echo $nomb?>" size="15"></th>
					
				  <?php }?>
				  
  </tr>
    </tbody> 
		</table>
			  <h4 style="color:#DB4D4D;"> Para seleccionar un Producto, haga click en el código.</h4>
		</div>
</body> 
</html> 
