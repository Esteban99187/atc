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
function ponPrefijo(cod, nomco, modelo, tippro,unimed,ape,soli,nombre,tlf,producto,cli,capacidad,cap,fe,fe2,di,di2,con,no,cor,codigo,placa,remolque,codigo1,esta){ 
	opener.document.form1.txtidorden_carga.value = cod;
	opener.document.form1.txtfecha_ord.value = nomco;
	opener.document.form1.txthora_ord.value = modelo;
	opener.document.form1.txtcedula_rep_ord.value = tippro;
	opener.document.form1.txtnombre_rep_ord.value = unimed;
	opener.document.form1.txtapellido_rep_ord.value = ape;
	opener.document.form1.txtidsolicitud.value = soli;
	opener.document.form1.txtnombre_razon_social_emp.value = nombre;
	opener.document.form1.txttelefono_emp.value = tlf;
	opener.document.form1.txtnombre_pro.value = producto;
	opener.document.form1.txtidempresa.value = cli;
	opener.document.form1.txtnombre_unimed.value = capacidad;
	opener.document.form1.txtpeso_sol.value = cap;
	opener.document.form1.txtfecha_entrega.value = fe;
	opener.document.form1.txtfecha_salida.value = fe2;
	opener.document.form1.txtdireccion_salida.value = di;
	opener.document.form1.txtdireccion_entrega.value = di2;
	opener.document.form1.txtcedula.value = con;
	opener.document.form1.txtnombres_per.value = no;
	opener.document.form1.txttelefono_corp_per.value = cor;
	opener.document.form1.txtidunidad.value = codigo;
	opener.document.form1.txtplaca_uni.value = placa;
	opener.document.form1.txtidremolque.value = remolque;
	opener.document.form1.txtplaca_rem.value = codigo1;
	opener.document.form1.txtidestatus_ordcar.value = esta;
	
	
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
				include("../modelo/class_ordcar.php");
				$objEquipo = new class_ordcar();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadoorden_carga($cod,$nombre);
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
				<td colspan="5" style="background:url(../img/colores3.jpg);radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius : 5px 5px 0px 0px;" width="470"><p style="font-family:arial;color:#FFFFFF;margin:0px 0px 0px 170px;">Seleccione C&oacute;digo </p></td>
			   </tr>
			   <tr>
					<td><p style="font-family:arial;">Código orden de garga:</p></td>
					<td ><p style="font-family:arial;">&nbsp Rif Empresa </p></td>
					<td ><p style="font-family:arial;">Razon Social:  </p></td>
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
								$tippro = $lista[$i][4];
								$unimed = $lista[$i][5];
								$ape = $lista[$i][6];
								$soli = $lista[$i][7];
								$nombre = $lista[$i][8];
								$tlf = $lista[$i][9];
								$producto = $lista[$i][10];
								$cli = $lista[$i][11];
								$capacidad = $lista[$i][12];
								$cap = $lista[$i][13];
								$fe = $lista[$i][14];
								$fe2 = $lista[$i][15];
								$di = $lista[$i][16];
								$di2 = $lista[$i][17];
								$con = $lista[$i][18];
								$no = $lista[$i][19];
								$cor = $lista[$i][20];
								$codigo = $lista[$i][21];
								$placa = $lista[$i][22];
								$remolque = $lista[$i][23];
								$codigo1 = $lista[$i][24];
								$esta = $lista[$i][25];
								
							?>
					<td><div align="center">
					  <input name="textfield" type="text"value="<?php echo $codig ?>" size="60" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $modelo?>', '<?php echo $tippro?>', '<?php echo $unimed?>', '<?php echo $ape?>', '<?php echo $soli?>', '<?php echo $nombre?>', '<?php echo $tlf?>', '<?php echo $producto?>', '<?php echo $cli?>', '<?php echo $capacidad?>', '<?php echo $cap?>', '<?php echo $fe?>', '<?php echo $fe2?>', '<?php echo $di?>', '<?php echo $di2?>', '<?php echo $con?>', '<?php echo $no?>', '<?php echo $cor?>', '<?php echo $codigo?>', '<?php echo $placa?>', '<?php echo $remolque?>', '<?php echo $codigo1?>', '<?php echo $esta?>')">
						</div>
					</td>
					<td><div align="center" >
					  <input name="textfield2" type="text" size="120" readonly value="<?php echo $nomb?>" size="15">
					</div></td>
					<td><div align="center" >
					  <input name="textfield4" type="text" size="50" readonly  value="<?php echo $modelo?>" size="15">
					</div></td>
				</tr>
				  <?php }?>
				  
					 
</td></tr>
				</table>
			</form>  <p style="font-family:arial;margin:0px 0px 0px 0px;color:#D90000;"> Para seleccionar una solicitud, haga click en el código.</p>
			</fieldset>
		</div>
		
 
</body> 
</html> 
