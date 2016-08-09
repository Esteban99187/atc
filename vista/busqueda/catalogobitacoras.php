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


?>

<html> 
<head> 
    <title>ATCSISTEM</title> 
<script> 
function ponPrefijo(cod, nomco, act, fe, ho, pa, tip){ 
	opener.document.form1.txtidBitacora.value = cod;
	opener.document.form1.txtidUsuario.value = nomco;
	opener.document.form1.txtActividad.value = act;
	opener.document.form1.txtfecha.value = fe;
	opener.document.form1.txthora.value = ho;
	opener.document.form1.txtpanel.value = pa;
	opener.document.form1.txttipoBitacora.value = tip;
	
	window.close()	
} 
</script> 
<style type="text/css">
</style>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="../css/maestro.css" type="text/css" rel="stylesheet" />
</head> 

<body style="background:url(../imagenes/fondo2.png);"> 
<h1><?php 
				include("../../modelo/class_bitacoras.php");
				$objEquipo = new class_bitacoras();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadobitacora($cod,$nombre);
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

	
			<fieldset style="width:470;background:#F7F7F7;" id="formu">
			 <form name=fprefijos>
			  <table border="0"  rules="rows">
    		   <tr>
				<td colspan="5" style="background:url(../imagenes/colores3.jpg);radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius : 5px 5px 0px 0px;" width="470"><p style="font-family:arial;color:#FFFFFF;margin:0px 0px 0px 170px;">Seleccione CODIGO </p></td>
			   </tr>
			   <tr>
					<td><p style="font-family:arial;">codigo:</p></td>
					<td ><p style="font-family:arial;">&nbsp usuario de bitacoras:  </p></td>
					
				</tr>
				<tr>
					
					<?php
						if ($lista<0)
							echo "ERROR: no se logro la conexion a la bd";
						else
							for($i=0;$i<count($lista);$i++){
								$codig= $lista[$i][1];
								$nomb = $lista[$i][2];
								$act = $lista[$i][3];
								$fe = $lista[$i][4];
								$ho = $lista[$i][5];
								$pa = $lista[$i][6];
								$tip = $lista[$i][7];
								
							?>
					<td><div align="center">
					  <input name="textfield"  type="text"value="<?php echo $codig ?>" size="60" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $act?>', '<?php echo $fe?>', '<?php echo $ho?>', '<?php echo $pa?>', '<?php echo $tip?>')">
						</div>
					</td>
					<td><div align="center" >
					  <input name="textfield2"  type="text" size="150" readonly value="<?php echo $nomb?>" size="15">
					</div></td>
					
				</tr>
				  <?php }?>
				  
					 
</td></tr>
				</table>
			</form>  <p style="font-family:arial;margin:0px 0px 0px 0px;color:#D90000;"> Para seleccionar bitacoras, haga click en el codigo.</p>
			</fieldset>
		</div>
		
 
</body> 
</html> 
