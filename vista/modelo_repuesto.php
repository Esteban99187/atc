<?php 
	include_once("../modelo_alberto/clsGenerarCombos.php");
	$comboPg = new CombosDinamicos;
	include_once('../controlador_alberto/cortmodelo.php');
	include_once("componentes_alberto.php"); 
?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Modelo de Repuesto</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>
<?php $codigoModelo = $objModelo->traer_codigo(); ?>


<tr style="display:none;">
 <td>id_modelo</td>
 <td><input type='text' class='solonumeros'  name='id_modelo' value='<?php if($existe!="yes"){print($codigoModelo["id_modelo_repuesto"]+1);} print($rows["id_modelo_repuesto"]); ?>' ></td>
</tr>


<tr>
	<td>Marca <span style="color:red;">*</span></td>
	<td>
		<select class='solonumeros campo' name='id_marca' id="marca">
		<?php $comboPg->generarCombo("SELECT * FROM tmarca_repuesto","id_marca_repuesto","nombre_marca_repuesto",$rows["id_marca_repuesto"]); ?>
	    </select>
	</td>
</tr>
<tr>
	<td>Nombre <span style="color:red;">*</span></td>
	<td>
	 	<input type='text' style="width:80%; float:left;" class='letranumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='nombre_modelo' value='<?php print($rows["nombre_modelo_repuesto"]); ?>' >
	 	<input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
	</td>
</tr>


<!--seleccionamos el tipo de marca para traernos la marca a la que pertenece el modelo-->
<!-- <tr> -->
	<!-- <td>Tipo de Marca</td> -->
	<!-- <td> -->
		<!-- <select name="tipo_marca" id="tipo_marca" class="campo solovacio"> -->
			<!-- <option value="">Seleccione el tipo de marca</option> -->
			<!-- <option  <?php if($rows['tipo_marca']=="1") print("selected"); ?> value="1">Unidad</option> -->
			<!-- <option <?php if($rows['tipo_marca']=="2") print("selected"); ?> value="2">Repuesto</option> -->
		<!-- </select> -->
	<!-- </td> -->

<!-- </tr> -->





</table>
	<ol id='botonera'>
		<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
		<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
		<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
		<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
		<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
		<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		<li><input type='submit'  class="cancelar" name='cancelar' value='Cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
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
			<th>Marca</th>
			<th>Estatus</th>
			<th>Buscar</th>
		</tr>
		
		<?php foreach($modelos as $index => $lista): ?>
		<tr>
			<td><?php print($lista['id_modelo_repuesto']); ?></td>
			<td><?php print($lista['nombre_modelo_repuesto']); ?></td>
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

