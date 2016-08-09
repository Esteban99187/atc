<?php 
	include_once('../controlador_alberto/cortmarca.php');
	include_once("componentes_alberto.php"); 
 ?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Marca de Repuesto</div>
<form action=''  id='formulario_maestro' method='POST'>
	<table width='100%' id='formulario_persona'>
		<?php $codigoMarca = $objMarca->traer_codigo(); ?>
		<tr style="display:none;">
		 	<td>id_marca</td>
		 	<td><input type='text' class=''  name='id_marca_repuesto' value='<?php if($existe!="yes"){print($codigoMarca["id_marca_repuesto"]+1);} print($rows["id_marca_repuesto"]); ?>' ></td>
		</tr>

		<tr>
		 	<td><span style="color:red;" >*</span>Nombre</td>
		 	<td><input type='text' style='float:left; width:80%;' maxlength="24" class='letranumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='nombre_marca' value='<?php print($rows["nombre_marca_repuesto"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
		</tr>
	</table>
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
					<th>Id</th>
					<th>Nombre</th>
					<th>Estatus</th>
					<th>Buscar</th>
				</tr>
				
				<?php foreach($marcas as $index => $lista): ?>
				<tr>
					<td><?php print($lista['id_marca_repuesto']); ?></td>
					<td><?php print($lista['nombre_marca_repuesto']); ?></td>
					<td><?php echo ($lista["estatus"])?"Activo":"Inactivo"; ?></td>
					<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>
				</tr>
				<?php endforeach; ?>
				
			</table>
		</div>
	</div>
	<!--ciere de la ventana modal-->

</form>
</div><?php if($msj){ ?>   <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>