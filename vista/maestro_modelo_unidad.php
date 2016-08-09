<?php 
	include_once("../modelo_alberto/clsGenerarCombos.php");
	$comboPg = new CombosDinamicos;
	include_once('../controlador_alberto/cortmodelo_unidad.php');
	include_once("componentes_alberto.php"); 
?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Modelo de Unidad</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>
<?php $codigoModelo = $objModelo->traer_codigo(); ?>

<tr style="display:none;">
 <td>id_modelo</td>
 <td><input type='text' class='solonumeros'  name='idmodelo_unidad' value='<?php if($existe!="yes"){print($codigoModelo["idmodelo_unidad"]+1);} print($rows["idmodelo_unidad"]); ?>' ></td>
</tr>


<tr>
	<td>Marca <span style="color:red;">*</span></td>
	<td>
		<select class='solonumeros campo' name='idmarca_unidad' id="marca">
		<?php $comboPg->generarCombo("SELECT * FROM marca_unidad","idmarca_unidad","desc_marc",$rows["idmarca_unidad"]); ?>
	    </select>
	</td>
</tr>
<tr>
	<td>Nombre <span style="color:red;">*</span></td>
	<td>
	 	<input type='text' style="width:80%; float:left;" class='letranumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='desc_mode' value='<?php print($rows["desc_mode"]); ?>' >
	</td>
</tr>
<tr>
	<td>Año <span style="color:red;">*</span></td>
	<td>
	 	<input type='text' style="width:80%; float:left;" class='solonumeros campo' name='anio_modelo' value='<?php print($rows["anio_modelo"]); ?>' >
	 	<input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
	</td>
</tr>

</table>
	<ol id='botonera'>
		<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
		<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
		<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
		<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
		<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
		<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		<li><input type='submit'  class="cancelar" name='cancelar'   value='Cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
	</ol>

<!--ventana modal aqui-->
<!--aqui estara la ventana modal-->
<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
<div id="ventana_modal">
	<h1 id="tabla_modal">Lista de modelos</h1>
	<div id="busqueda_modal">
		<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
	</div>

	<div style="height:400px; overflow:auto;">
	<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
		<tr>
			<th>Id</th>
			<th>Nombre del modelo</th>
			<th>Año</th>
			<th>Marca</th>
			<th>Estatus</th>
			<th>Buscar</th>
		</tr>
		
		<?php foreach($modelos as $index => $lista): ?>
		<tr>
			<td><?php print($lista['idmodelo_unidad']); ?></td>
			<td><?php print($lista['desc_mode']); ?></td>
			<td><?php print($lista['anio_modelo']); ?></td>
			<td><?php print($lista['desc_marc']); ?></td>
			<td><?php echo ($lista["estatus_moduni"]=="1")?"Activo":"Inactivo"; ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php endforeach; ?>
		
	</table>
</div>
</div>
<!--ciere de la ventana modal-->

</form>
</div><?php if($msj){ ?>   <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>