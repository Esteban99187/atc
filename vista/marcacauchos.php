<?php 
	include_once('../controlador_alberto/cormarcacaucho.php');
	include_once("componentes_alberto.php"); 
?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Marca de Cauchos</div>
	<form action=''  id='formulario_maestro' method='POST'>
		<table width='100%' id='formulario_persona'>
			<tr>
				<td></td>
				<td><input type="hidden" name="idmarca" value="<?php if(isset($rows['idmarca'])) echo $rows['idmarca']; else echo '-1' ?>"></td>
			</tr>
			<tr>
		 		<td>Marca</td>
		 		<td>
		 			<input type='text' style='float:left; width:50%;' maxlength="35" disabled class="letranumeros campo" name='descripcion' value='<?php print($rows["descripcion"]); ?>' >
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
			<h1 id="tabla_modal">Lista de marcas</h1>
			<div id="busqueda_modal">
				<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
			</div>

			<div style="height:400px; overflow:auto;">
				<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
					<tr>
						<th>Código</th>
						<th>marca</th>
						<th>Estatus</th>
						<th>Acción</th>
					</tr>
					<?php foreach ($marcas as $index => $marca): ?>

					<tr>
						<td><?php echo $marca["idmarca"] ?></td>
						<td><?php echo $marca["descripcion"] ?></td>
						<td><?php echo ($marca["estatus"])?"Activo":"Inactivo"; ?></td>
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