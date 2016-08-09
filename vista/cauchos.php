<?php 
	include_once("../modelo_alberto/clsGenerarCombos.php");
	$comboPg = new CombosDinamicos;
	include_once('../controlador_alberto/corcaucho.php');
	include_once("componentes_alberto.php"); 
?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Caucho</div>
	<form action=''  id='formulario_maestro' method='POST'>
		<table width='100%' id='formulario_persona'>
			<tr>
				<td></td>
				<td><input type="hidden" name="idcaucho" value="<?php if(isset($rows['idcaucho'])) echo $rows['idcaucho']; else echo '-1' ?>"></td>
			</tr>
			<tr>
		 		<td>Marca</td>
		 		<td>
		 			<select name="txtMarca" disabled class="campo">
		 				<?php $comboPg->generarCombo("SELECT * FROM tmarcacaucho","idmarca","descripcion",$rows["idmarcacaucho"]); ?>
		 			</select>
		 			<font color="red" size="5" >*</font>
		 		</td>
			</tr>
			<tr>
		 		<td>Medida</td>
		 		<td>
		 			<select name="txtMedida" disabled class="campo">
		 				<?php $comboPg->generarCombo("SELECT * FROM tmedidacaucho","idmedida","descripcion",$rows["idmedidacaucho"]); ?>
		 			</select>
		 			<font color="red" size="5" >*</font>
		 		</td>
			</tr>
			<tr>
		 		<td>Rin</td>
		 		<td>
		 			<input type='text' style='float:left; width:50%;' maxlength="35" disabled class=" campo" name='rin' value='<?php print($rows["rin"]); ?>' >
		 			<font color="red" size="5" >*</font>
		 		</td>
			</tr>
		</table>
		<input type="hidden" name="estatus" value="<?php print($rows["estatus"]); ?>">
		<ol id='botonera'>
			<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
			<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
			<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
			<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
			<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
			<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
			<li><input type='submit' class="cancelar"  name='cancelar'   value='Cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		</ol>
	
		<!--ventana modal aqui-->
		<!--aqui estara la ventana modal-->
		<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
		<div id="ventana_modal">
			<h1 id="tabla_modal">Listado de Cauchos</h1>
			<div id="busqueda_modal">
				<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
			</div>

			<div style="height:400px; overflow:auto;">
				<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
					<tr>
						<th>Código</th>
						<th>Marca</th>
						<th>Medida</th>
						<th>Rin</th>
						<th>Estatus</th>
						<th>Acción</th>
					</tr>
					<?php foreach ($cauchos as $index => $caucho): ?>

					<tr>
						<td><?php echo $caucho["idcaucho"] ?></td>
						<td><?php echo $caucho["marca"] ?></td>
						<td><?php echo $caucho["medida"] ?></td>
						<td><?php echo $caucho["rin"] ?></td>
						<td><?php echo ($caucho["estatus"])?"Activo":"Inactivo"; ?></td>
						<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
		<!--ciere de la ventana modal-->
	</form>
</div>
<table width="100%" align="center">
	<tr>
		<td align="center">
			Los campos con <font color="red" size="5" >*</font> son obligatorios
		</td>
	</tr>
</table>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php  }; ?>