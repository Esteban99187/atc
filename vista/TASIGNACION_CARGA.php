<?php 

	include_once('../controlador_alberto/cortdetalle_carga.php'); 
	include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar asignaciones de carga</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstdetalle_carga.php");
$tdetalle_carga = new clstdetalle_carga();
$tdetalle_carga->traer_codigo();
$mitdetalle_carga = $tdetalle_carga->row();?>


<tr style="display:none;">
 <td>idtdetallecarga</td>
 <td><input type='text' class='solovacio'  name='idtdetallecarga' value='<?php if($existe!="yes"){print($mitdetalle_carga["idtdetallecarga"]+1);} print($rows["idtdetallecarga"]); ?>' ></td>
</tr>

<tr>
 <td>placa unidad</td>
 <td><input type='text' readonly="readonly" placeholder="Buscar la placa" id="numero_unidad" style='width:80%; float:left;' class='solovacio <?php if($existe!='yes') print('campo campoclave'); ?>'  name='placa_unidad' value='<?php print($rows["placa_unidad"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
 <input type="button" value="buscar unidad" style="width:20%;" onclick="buscar_unidad()">
 </td>
</tr>



<tr>
	<td>Cedula del chofer:</td>
	<td><input type="text"  value="<?php print($rows['cedula']); ?>" placeholder="Cedula del chofer" id="cedula_chofer"></td>
</tr>

<tr>
	<td>Nombre del chofer:</td>
	<td><input type="text" value="<?php print($rows['nombre1'].' '.$rows['nombre2']) ?>" placeholder="Nombre del chofer" id="nombre_chofer"></td>
</tr>





<tr>
<td>
Carga</td>
<td>
<select class='solovacio' name='idtcarga'>
<?php  include_once('../modelo_alberto/clstcarga.php');
    $tcarga = new clstcarga();
     $tcarga->listar(); ?>
    <option value=''>seleccionar</option>
      <?php while($mitcarga=$tcarga->row()){ ?>
         <option <?php if($rows['idtcarga']==$mitcarga['idtcarga']) print('selected'); ?>   value="<?php print($mitcarga['idtcarga']); ?>"><?php print($mitcarga['nombre']); ?></option>
      <?php } ?></select></td>
</tr>
<tr>
 <td>fecha asignacion</td>
 <td><input type='text' class="solovacio"  readonly="readonly"  name='fecha_asignacion' value='<?php if($existe=="yes"){ print($rows["fecha_asignacion"]); }else{ print(date("Y-m-d")); } ?>' ></td>
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
<div id="ventana_modal" style="position:fixed !important; top:-150 !important;">
	<h1 id="tabla_modal">Lista de solicitudes</h1>
	<div id="busqueda_modal">
		<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
	</div>

	<div style="height:400px; overflow:auto;">
	<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
		<tr>
			<th>Nro</th>
			<th>Placa</th>
			<th>Cedula</th>
			<th>Nombre del chofer</th>
			<th>Carga</th>
			<th>Fecha de Asignacion</th>
			<th>Buscar</th>
		</tr>
		<?php
			$lista_solicitud = new clstdetalle_carga();
			$lista_solicitud->listar();
			while($lista = $lista_solicitud->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['idtdetallecarga']); ?></td>
			<td><?php print($lista['placa_unidad']) ?></td>
			<td><?php print($lista['cedula']); ?></td>
			<td><?php print($lista['nombre1'].' '.$lista['nombre2']); ?></td>
			<td><?php print($lista['carga']); ?></td>
			<td><?php print($lista['fecha_asignacion']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>










</form>
</div><?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>



<script type="text/javascript">
	

	function buscar_unidad(){
		miventana = window.open('ventanas/lista_unidades.php', 'ventana','width=800, height=400');			
	}

</script>