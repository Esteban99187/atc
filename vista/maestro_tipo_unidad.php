<?php 

	include_once('../controlador_alberto/cortipo_unidad.php');
	include_once("componentes_alberto.php");
 ?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar tipo de unidad</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstipo_unidad.php");
$tipo_unidad = new clstipo_unidad();
$tipo_unidad->traer_codigo();
$mitipo_unidad = $tipo_unidad->row();?>


<tr style="display:none;">
 <td>idtipo_unidad</td>
 <td><input type='text' class='solonumeros'  name='idtipo_unidad' value='<?php if($existe!="yes"){print($mitipo_unidad["idtipo_unidad"]+1);} print($rows["idtipo_unidad"]); ?>' ></td>
</tr>

<tr>
 <td>Nombre</td>
 <td><input type='text' style='width:80%; float:left;' class='solonumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='desc_tipo_unid' value='<?php print($rows["desc_tipo_unid"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
</tr>

<tr>
<td>
Capacidad</td>
<td>
<select class='solovacio' name='idcapacidad'>
<?php  include_once('../modelo_alberto/clscapacidad.php');
    $capacidad = new clscapacidad();
     $capacidad->listar(); ?>
    <option value=''>seleccionar</option>
      <?php while($micapacidad=$capacidad->row()){ ?>
         <option <?php if($rows['idcapacidad']==$micapacidad['idcapacidad']) print('selected'); ?>   value="<?php print($micapacidad['idcapacidad']); ?>"><?php print($micapacidad['capacidad']); ?></option>
      <?php } ?></select></td>
</tr>
</table>
<ol id='botonera'>
<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
<li><input type='submit'  name='cancelar'   value='cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
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
			<th>Buscar</th>
		</tr>
		<?php
			$lsita_tipo_unidad = new clstipo_unidad();
			$lsita_tipo_unidad->listar();
			while($lista = $lsita_tipo_unidad->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['idtipo_unidad']); ?></td>
			<td><?php print($lista['desc_tipo_unid']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>
<!--ciere de la ventana modal-->








</form>
</div><?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>