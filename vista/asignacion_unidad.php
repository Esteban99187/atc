<?php 
	include_once('../controlador_alberto/cortasignacion_unidad.php');
	include_once("componentes_alberto.php");	
 ?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar asignacion de unidades</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstasignacion_unidad.php");
$tasignacion_unidad = new clstasignacion_unidad();
$tasignacion_unidad->traer_codigo();
$mitasignacion_unidad = $tasignacion_unidad->row();?>


<tr style="display:none;">
 <td>id_asignacion_unidad</td>
 <td><input type='text' class=''  name='id_asignacion_unidad' value='<?php if($existe!="yes"){print($mitasignacion_unidad["id_asignacion_unidad"]+1);} print($rows["id_asignacion_unidad"]); ?>' ></td>
</tr>

<tr>
 <td>cedula del chofer</td>
 <td><input type='text' style='width:70%; float:left;' class='solocedula <?php if($existe!='yes') print('campo campoclave'); ?>' id="cedula" name='cedula_chofer' value='<?php print($rows["cedula_chofer"]); ?>' >
 	<input type='submit' value='buscar' name='buscar' style='width:20%; display:none;' class='mibusqueda'>
 	<!--boton para buscar chofer-->
 	<input  type="button" class="busqueda_ventana" value="buscar chofer" style="width:20%; margin-left:5px;" onclick="buscar_chofer()"> 
 </td>
</tr>

<tr>
	<td>Nombre del chofer:</td>
	<td><input type="text" id="nombre" value="<?php print($rows['nombre']) ?>" placeholder="Nombre del chofer" readonly="readonly"></td>
</tr>

<tr>
 <td>Numero de la unidad</td>
 <td>
 	<input type='text' class='letranumeros' id="numero_unidad"  placeholder="Buscar unidades" style="width:70%;" name='placa_unidad' value='<?php print($rows["placa_unidad"]); ?>' >
 	<input type="button" value="buscar unidad" style="width:20%;" onclick="buscar_unidad()">
 </td>
</tr>

<tr>
 <td>fecha de asignacion</td>
 <td><input type='text' id="fecha1" onchange="compara_fecha()" class='solofecha2 fecha_piker'  name='fecha_asignacion' value='<?php print($rows["fecha_asignacion"]); ?>' ></td>
</tr>

<tr>
 <td>fecha de desasignacion</td>
 <td><input type='text' id="fecha2" onchange="compara_fecha()" class='solofecha2 fecha_piker'  name='fecha_desasignacion' value='<?php print($rows["fecha_desasignacion"]); ?>' ></td>
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
	<h1 id="tabla_modal">Lista de asignaciones</h1>
	<div id="busqueda_modal">
		<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
	</div>

	<div style="height:400px; overflow:auto;">
	<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
		<tr>
			<th>Id</th>
			<th>Cedula del chofer</th>
			<th>Nombre</th>
			<th>Placa de unidad</th>
			<th>Fecha de asignacion</th>
			<th>Fecha de designacion</th>
			<th>Buscar</th>
		</tr>
		<?php
			$lista_asignacion = new clstasignacion_unidad();
			$lista_asignacion->lista_asignacion();
			while($lista = $lista_asignacion->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['id_asignacion_unidad']); ?></td>
			<td><?php print($lista['cedula_chofer']); ?></td>
			<td><?php print($lista['nombre1']." ".$lista['nombre2']); ?></td>
			<td><?php print($lista['placa_unidad']); ?></td>
			<td><?php print($lista['fecha_asignacion']); ?></td>
			<td><?php print($lista['fecha_desasignacion']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>
<!--ciere de la ventana modal-->











</form>
</div>

<?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>

<script type="text/javascript">

	//funcion para buscar la ventana de choferes
	function buscar_chofer(){
		miventana = window.open('ventanas/lista_chofer.php', 'ventana','width=800, height=400');	
	}


	function buscar_unidad(){
		miventana = window.open('ventanas/lista_unidades.php?url=asignacion_unidad', 'ventana','width=800, height=400');			
	}


	function compara_fecha(){
		fecha1 = document.getElementById("fecha1").value;
		fecha2 = document.getElementById("fecha2").value;

		if(fecha1 && fecha2){

			//ahora compararemos las fechas
			if(Date.parse(fecha1) > Date.parse(fecha2)){
				alert("la fecha de asignacion no puede ser mayor a la de designacion");
				document.getElementById("fecha1").value = "";
				document.getElementById("fecha2").value = "";
			}

		}//condicion para saber si existen las dos fechas

	}





</script>