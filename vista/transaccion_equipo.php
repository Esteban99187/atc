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

	$cargar='servicio_modulo';
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	$trans = isset($_GET['trans']) ? $_GET['trans'] : null ;
	$control = isset($_GET['control']) ? $_GET['control'] : null ;
	$eliminar_servicio_modulo = isset($_GET['eliminar_servicio_modulo']) ? $_GET['eliminar_servicio_modulo'] : null ;
	$conta = isset($_GET['conta']) ? $_GET['conta'] : null ;
	$row_servicio_modulo = isset($_GET['row_servicio_modulo']) ? $_GET['row_servicio_modulo'] : null ;
	$idunidad = isset($_POST['idunidad']) ? $_POST['idunidad'] : null ;

	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="../../adsertrans.php" </script>');
	}

	if($control) 
	{
		include_once("../controlador/control_".$control.".php");
	}

	if($redireccion) 
	{
		echo "<script>window.location.href='".$redireccion."'</script>";
	}

	if($eliminar_servicio_modulo)
	{
		$cargar='servicio_modulo';
	}

?>

<body onLoad="iniciar(); iniciar_detalle('<?=$cargar?>')" >

	<link href="css/maestro.css" type="text/css" rel="stylesheet" />
	<link href="css/transaccion.css" type="text/css" rel="stylesheet" />
	<script src="js/transaccion_equipo.js"></script>

	<fieldset>

		<legend class="label2">Administrador de Equipos</legend>

		<?php

			//CUADRO PARA ELEGIR CUANDO BUSCO MUCHOS EN EL BOTON CONSULTAR
			if(@$mas_de_uno)
			{
				echo '<div id="popu" class="div_cuadro_select"><form  method="post" action="?control=transaccion_equipo&transaccion=transaccion_equipo"> <select  size="10" name="idunidad">';
					while($row_modulo=$modulo->row())
					{
						echo "<option value='".$row_modulo[0]."'>".$row_modulo['idunidad']."  ".$row_modulo['serial_motor']."  ".$row_modulo['placa']."    </option>";
					}
				echo '</select>&nbsp &nbsp &nbsp  <button class="boton3" name="consultar" value="Consultar">Aceptar &nbsp &nbsp</button> &nbsp <button id="popu" class="boton6" onclick="document.getElementById('; echo "'popu'"; echo ').style.display='; echo "'none'"; echo '">Cancelar &nbsp </button></form></div>';				
			}				
			//--------------------------------------------				
						
			if(@$hay_datos_listar)
			{
				$todo_listado= '<table id="modelo_tabla" align="center"><thead><tr><th>Módulo</th><th>Nombre</th><th>Dirección Url</th><th>Rol del Trabajador</th></tr></thead>';
				while($row_modulo=$modulo->row())
				{
					$todo_listado=$todo_listado.'<tr>';
					$todo_listado=$todo_listado.'<td>'.$row_modulo["idunidad"].'</td>';
					$todo_listado=$todo_listado.'<td>'.$row_modulo["serial_motor"].'</td>';
					$todo_listado=$todo_listado.'<td>'.$row_modulo["placa"].'</td>';						
					$todo_listado=$todo_listado.'</tr>';
				}
				$todo_listado=$todo_listado.'</table>';			
				echo '	<a href="?reporte=rep_modulo" target="_blank"><img src="imagenes/pdf.png" width="55" title="Descargar" height="55" align="right"/></a>';
				echo '<br><br><br>Listado de Módulos ';
				echo $todo_listado;
			}

		?>

		<form method="post" action="?control=transaccion_equipo&transaccion=transaccion_equipo" name="f1">		
			<div id="cam_txt" <? if(@$hay_datos_listar) echo 'style="display:none"';?>>
				<div style="float:right" id="status"></div>
				<img src="imagenes/ayuda.png" width="40" height="40" style="margin:0px 0px 10px 570px;" id="ayuda_maestro" />
				<table width='900' style=' margin-left:-300px;'>
					<tr>
						<td align='justify'>
							<label class="label" for="cam_idunidad" style="margin:0px 0px 0px 15px;">Número:</label>
							<input id="cam_idunidad" type="text" readonly style="width:120px;background:#EBEBEB;color:#5D5D5D;" name="idunidad" placeholder="de Unidad" maxlength="2" onKeyPress="ValidaSoloNumeros()" value="<?=@$row_modulo['idunidad']?>" />
							<label class="label" for="cam_serial_motor" style="margin:0px 0px 0px 15px;">Serial del Motor:</label>
							<input id="cam_serial_motor" type="text" readonly size="1" style="width:120px;background:#EBEBEB;color:#5D5D5D;" onkeypress="return soloLetra(event)" placeholder="Numero" maxlength="40" name="serial_motor"  onkeypress="txNombres()" value="<?=@$row_modulo['serial_motor']?>" />
							<label class="label" for="cam_placa" style="margin:0px 0px 0px 15px;">Placa:</label>
							<input id="cam_placa" type="text" readonly size="1" style="width:120px;background:#EBEBEB;color:#5D5D5D;" name="placa" placeholder="Numero" maxlength="50" value="<?=@$row_modulo['placa']?>" />
						</td>
					</tr>
				</table>
			</div>

			<div id="div_detalle_todo" <? if(@$hay_datos_listar) echo 'style="display:none"';?>>
				<button id="btn_servicio_modulo" class="btn_menu_detalle" onClick="iniciar_detalle('servicio_modulo'); return false;">Equipos</button>
				<div class="div_contenido_tabla_detallee" >

					<?php

						//INICIALIZAR EL CONTADOR EN OTRO NRO SI ES UNA CONSULTA
						include_once("../modelo/class_servicio_equipo.php");
						$servicio_modulo2 = new servicio_equipo;
						$conta=$servicio_modulo2->consulta_por('idunidad',$idunidad);

					?>

					<table id="tabla_servicio_modulo" class="titulos_detalles" >
						<tr>
							<th  style="background:#EBEBEB;">&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Equipo</th>
							<th  style="background:#EBEBEB;">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Cantidad</th>
							<th  style="background:#EBEBEB;">&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  Observacion</th>
							<th  style="background:#EBEBEB;" class="th_derecha"><a onClick="agregar_servicio_modulodetalle(); re_cargar_combobox(); return false" style="color:#0BC93A;font-weight:bold;text-decoration:none; " href="#" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Agregar<img src="imagenes/agregar.png" width="20" height="20"></a></th>
						</tr>
						<script>
							var contadorservicio_modulo=<?=($conta+1)?>;
							function agregar_servicio_modulodetalle()
							{
								var table=document.getElementById("tabla_servicio_modulo");
								var row=table.insertRow(1);
								var cell0=row.insertCell(0);
								<?
									$trans=$trans.'<input  id="cam_nombre_equipo" type="text" style="width:225px; height:30px;" name="nombre_equipo_\'+contadorservicio_modulo+\'" value="'.$row_servicio_modulo['nombre_equipo'].' " /> ';    	
								?>
								cell0.innerHTML='<?=$trans?>';
								<? $trans=""; ?>
								var cell1=row.insertCell(1);
								<?
									$trans=$trans.'<input  id="cam_cantidad_equipo" type="text" style="width:225px; height:30px;" name="cantidad_equipo_\'+contadorservicio_modulo+\'" value="'.$row_servicio_modulo['cantidad_equipo'].' " /> ';   
								?>
								cell1.innerHTML='<?=$trans?>';
								<? $trans=""; ?>
								var cell2=row.insertCell(2);
								<?
									$trans=$trans.'<input  id="cam_observacion_equipo" type="text" style="width:225px; height:30px;" name="observacion_equipo_\'+contadorservicio_modulo+\'" value="'.$row_servicio_modulo['observacion_equipo'].' " /> ';    
								?>
								cell2.innerHTML='<?=$trans?>';
								<? $trans=""; ?>
								var cell3=row.insertCell(3);
								cell3.className="td_derecha";
								cell3.innerHTML+='  '; 			
								document.getElementById("cam_nombre_equipo").focus();contadorservicio_modulo=contadorservicio_modulo+1;								
							}
						</script>
						
						<?php

							$conta=1;
							while($row_servicio_modulo=$servicio_modulo2->row())
							{
								echo '<tr>';echo '<td>';
								echo '<input  id="cam_nombre_equipo" style="width:225px; height:30px;"  type="text" name="nombre_equipo_'.$conta.'" value="'.$row_servicio_modulo['nombre_equipo'].'" /> ';    	echo '</td>';echo '<td>';
								echo '<input  id="cam_cantidad_equipo" style="width:225px; height:30px;"  type="text" name="cantidad_equipo_'.$conta.'" value="'.$row_servicio_modulo['cantidad_equipo'].'" /> ';    	echo '</td>';echo '<td>';
								echo '<input  id="cam_observacion_equipo" style="width:225px; height:30px;" type="text" name="observacion_equipo_'.$conta.'" value="'.$row_servicio_modulo['observacion_equipo'].'" /> ';    	echo '</td>';
								echo '<td class="td_derecha"><button class="btn_borrar" name="eliminar_servicio_modulo" value="'.$row_servicio_modulo['idservicio_unidad'].'"></button></td></tr>';
								$conta++;

							}

						?>
					
					</table>
					<?	?>
				</div>
				<br/>
			</div>
			
			<div id="div_btn_maestro" style='border:0px solid black; margin-left:160px;'>
				<input id="btn_registrar" 	type="submit" name="registrar" value="Registrar          "  class="boton" 	onclick="return validar(this)"/> 
				<input id="btn_listar"		type="submit" name="listar"  class="boton2"  value="Listar     " 	/> 
				<input id="btn_consultar"	type="submit" name="buscar" value="Buscar     "	 class="boton3"  onclick="return validar(this)" />
				<input id="btn_eliminar" 	type="submit" name="eliminar" value="Eliminar        "	 class="boton4"  onclick="return validar(this)"/>
				<input id="btn_editar" 		type="submit" name="editar" value="Editar   "	 class="boton5" 	onclick="return validar(this)" />
				<input id="btn_cancelar" 	type="reset"  name="cancelar" value="Cancelar    " 	 class="boton6"  onclick="location.href='<?=$_SERVER["REQUEST_URI"]?>'"/>
			</div>			
			<div id='mensaje_ayuda' title='AYUDA EN LINEA: REGISTRAR ACTIVO'>
				<div id="mensajes" style="display:none; width:530px;">
					<h3><center>AQUI IRA EL CONTENIDO DE LAS AYUDAS</center></h3>
				</div>
			</div>
		</form>

		
		<?php
			//Muestra los mensajes que manda el controlador
			if($msj) 
			{
				echo"<div id='dialog-message' title='Informacion:'>".$msj."</div>";
				echo"<script>
						$(function() 
						{
							$( \"#dialog:ui-dialog\" ).dialog( \"destroy\" );
							$( \"#dialog-message\" ).dialog(
							{
							});
						});
					</script>";
			}
		?>

	</fieldset>

</body>
