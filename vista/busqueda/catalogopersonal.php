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
    <title>SOSTRANS</title> 
<script> 
function ponPrefijo(cod, nomco, modelo, civil, sexo, tlfm, tlfcasa, corr, dire, fn, fc, esta, ro, de, con, fp, sm, nrohi, nrohij, nivel, ob){ 
	opener.document.form1.txtcedula.value = cod;
	opener.document.form1.txtnombres_per.value = nomco;
	opener.document.form1.txtapellidos_per.value = modelo;
	opener.document.form1.cmbestado_civil_per.value = civil;
	opener.document.form1.radsexo_per.value = sexo;
	opener.document.form1.txttelefono_movil_per.value = tlfm;
	opener.document.form1.txttelefono_casa_per.value = tlfcasa;
	opener.document.form1.txtcorreo_per.value = corr;
	opener.document.form1.txtdireccion_habitacion_per.value = dire;
	opener.document.form1.txtfecha_nacimiento_per.value = fn;
	opener.document.form1.txtfecha_contratacion_per.value = fc;
	opener.document.form1.cmbidestatus.value = esta;
	opener.document.form1.cmbcod_rol.value = ro;
	opener.document.form1.cmbiddepartamento.value = de;
	opener.document.form1.cmbperiodo_pago_per.value = con;
	opener.document.form1.cmbforma_pago_per.value = fp;
	opener.document.form1.txtsueldo_mensual_per.value = sm;
	opener.document.form1.cmbnro_hijos_per.value = nrohi;
	opener.document.form1.cmbnivel_academico_per.value = nivel;
	opener.document.form1.txtobs_academica_per.value = ob;
	



	window.close()	
} 
</script> 
<style type="text/css">
</style>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="../css/maestro.css" type="text/css" rel="stylesheet" />
</head> 

<body style="background:url(../img/fondo2.png);"> 
<h1><?php 
				include("../modelo/class_personal.php");
				$objEquipo = new class_personal();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadopersonal($cod,$nombre);
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
				<td colspan="5" style="background:url(../img/colores3.jpg);radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius : 5px 5px 0px 0px;" width="470"><p style="font-family:arial;color:#FFFFFF;margin:0px 0px 0px 170px;">Seleccione RIF </p></td>
			   </tr>
			   <tr>
					<td><p style="font-family:arial;">cedula:</p></td>
					<td ><p style="font-family:arial;">&nbsp nombre :  </p></td>
				</tr>
				<tr>
					
					<?php
						if ($lista<0)
							echo "ERROR: no se logro la conexion a la bd";
						else
							for($i=0;$i<count($lista);$i++){
								$codig= $lista[$i][1];
								$nomb = $lista[$i][2];
								$modelo = $lista[$i][3];
								$civil = $lista[$i][4];
								$sexo = $lista[$i][5];
								$tlfm = $lista[$i][6];
								$tlfcasa = $lista[$i][7];
								$corr= $lista[$i][8];
								$dire = $lista[$i][9];
								$fn = $lista[$i][10];
								$fc = $lista[$i][11];
								$esta = $lista[$i][12];
								$ro = $lista[$i][13];
								$de = $lista[$i][14];
								$con = $lista[$i][15];
								$fp = $lista[$i][16];
								$sm = $lista[$i][17];
								$nrohi = $lista[$i][18];
								$nrohij = $lista[$i][19];
								$nivel = $lista[$i][20];
								$ob = $lista[$i][21];
								
							?>
					<td><div align="center">
					  <input name="textfield"  type="text"value="<?php echo $codig ?>" size="60" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $civil?>', '<?php echo $sexo?>', '<?php echo $tlfm?>', '<?php echo $tlfcasa?>', '<?php echo $corr?>', '<?php echo $dire?>', '<?php echo $fn?>', '<?php echo $fc?>', '<?php echo $esta?>', '<?php echo $ro?>', '<?php echo $de?>', '<?php echo $con?>', '<?php echo $fp?>', '<?php echo $sm?>', '<?php echo $nrohi?>', '<?php echo $nrohij?>', '<?php echo $nivel?>', '<?php echo $ob?>')">
						</div>
					</td>
					<td><div align="center" >
					  <input name="textfield2"  type="text" size="150" readonly value="<?php echo $nomb?>" size="15">
					</div></td>
					
				</tr>
				  <?php }?>
				  
					 
</td></tr>
				</table>
			</form>  <p style="font-family:arial;margin:0px 0px 0px 0px;color:#D90000;"> Para seleccionar un Estado, haga click en el codigo.</p>
			</fieldset>
		</div>
		
 
</body> 
</html> 
