<?php
	include_once("componentes_alberto.php");
?>


<!--reportes-->

<div id='contenedor_formulario' >
<div id='titulo_form'>Reportes Generales</div>
<form   id='formulario_maestro' method='GET'>
	<br>
	<div id='titulo_form'>
		Reporte de Registro Diario
		<input style="float:right;" type="button" class="btn btn-primary" value="Imprimir" onclick="imprimir_reporte()" name="reporte">
	</div>
	<table width='100%' id='formulario_persona'>
		<tr>
		 <td>Placa</td>
		 <td>
		 	<input type='text' readonly="readonly" placeholder="Buscar la Placa" id="numero_unidad_1" style='width:80%; float:left;' class='solovacio <?php if($existe!='yes') print('campo campoclave'); ?>'  name='placa_unidad' value='<?php print($rows["placa_unidad"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
		 	<input type="button" class="btn btn-primary" value="Buscar" style="width:20%;" onclick="buscar_unidad(1)">
		 </td>
			<td>Fecha</td>
			<td><input type="date" id="fecha" name="fecha"></td>
		</tr>
	</table>
</form>

<hr>

<!--reporte de mantenimientos preventivos pendientes-->
<form  id='formulario_maestro' method='GET' style="padding:10px; width:700px;">
	<div id='titulo_form'>Reporte de Mantenimientos Preventivos Pendientes
		<input style="float:right;" type="button" class="btn btn-primary" value="Imprimir"  onclick="imprimir_reporte2()" name="reporte">
	 </div>
	<table width='100%' id='formulario_persona' style="border:1px solid #ccc; padding:10px;">
		<tr>
		 <td>Placa</td>
		 <td>
		 	<input type='text' readonly="readonly" placeholder="Buscar la Placa" id="numero_unidad_2" style='width:80%; float:left;' class='solovacio <?php if($existe!='yes') print('campo campoclave'); ?>'  name='placa_unidad' value='<?php print($rows["placa_unidad"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
		 	<input type="button" value="Buscar" class="btn btn-primary"  style="width:20%;" onclick="buscar_unidad(2)">
	</table>
</form>

<hr>


<!--listado de repuestos por modelo de unidad-->
<form  id='formulario_maestro' method='GET' style="padding:10px; width:700px;">
	<div id='titulo_form'>Reporte de Repuestos/Lubricantes por Modelo de Unidad
		<input style="float:right;" type="button" class="btn btn-primary" value="Imprimir" id="reporte" onclick="imprimir_reporte3()" name="reporte">
	 </div>
	<table width='100%' id='formulario_persona' style="border:1px solid #ccc; padding:10px;">
		<tr>
		<td>Modelo</td>
		<td>
		<select class='solovacio' id="modelo_unidad1" name='idmodelo_unidad'>
		<?php  include_once('../modelo_alberto/clsmodelo_unidad.php');
  		  $modelo_unidad = new clsmodelo_unidad();
    	 $modelo_unidad->listar(); ?>
    	<option value=''>Seleccionar</option>
      <?php while($mimodelo_unidad=$modelo_unidad->row()){ ?>
         <option <?php if($rows['idmodelo_unidad']==$mimodelo_unidad['idmodelo_unidad']) print('selected'); ?>   value="<?php print($mimodelo_unidad['idmodelo_unidad']); ?>"><?php print($mimodelo_unidad['desc_mode']); ?></option>
      <?php } ?></select>
		</tr>
		 	
	</table>
</form>


<hr>


<!--listado de repuestos por modelo de unidad-->
<form  id='formulario_maestro' method='GET' style="padding:10px; width:700px;">
	<div id='titulo_form'>Reporte de Fallas por Modelo de Unidad
		<input style="float:right;" type="button" class="btn btn-primary" value="Imprimir" id="reporte" onclick="imprimir_reporte4()" name="reporte">
	 </div>
	<table width='100%' id='formulario_persona' style="border:1px solid #ccc; padding:10px;">
		<tr>
		<td>Modelo</td>
		<td>
		<select class='solovacio' id="modelo_unidad2" name='idmodelo_unidad'>
		<?php  include_once('../modelo_alberto/clsmodelo_unidad.php');
  		  $modelo_unidad = new clsmodelo_unidad();
    	 $modelo_unidad->listar(); ?>
    	<option value=''>Seleccionar</option>
      <?php while($mimodelo_unidad=$modelo_unidad->row()){ ?>
         <option <?php if($rows['idmodelo_unidad']==$mimodelo_unidad['idmodelo_unidad']) print('selected'); ?>   value="<?php print($mimodelo_unidad['idmodelo_unidad']); ?>"><?php print($mimodelo_unidad['desc_mode']); ?></option>
      <?php } ?></select>
		</tr> 	
	</table>
</form>

<br>
<br>
<br>








</div><!--cierre del contenedor-->









<!--aqui abajo va el registro diario-->

<script type="text/javascript">
	function buscar_unidad(valor){
		miventana = window.open('ventanas/lista_unidades_reporte.php?valor='+valor, 'ventana','width=800, height=400');			
	}
	function imprimir_reporte(){
		//variables para el reporte
		var fecha = document.getElementById("fecha").value;
		var numero_unidad = document.getElementById("numero_unidad_1").value;
		//imprimimos el reporte
		miventana = window.open('../reportes/reporte_registrodiario.php?placa='+numero_unidad+'&fecha='+fecha, 'ventana','width=1000, height=1000%');			


	}

	function imprimir_reporte2(){
		//variables para el reporte
		var numero_unidad = document.getElementById("numero_unidad_2").value;
		//imprimimos el reporte
		miventana = window.open('../reportes/reporte_preventivo_pendiente.php?placa='+numero_unidad,'ventana','width=1000, height=1000%');			
	}


	function imprimir_reporte3(){
		//variables para el reporte
		var modelo_unidad = document.getElementById("modelo_unidad1").value;
		//imprimimos el reporte
		miventana = window.open('../reportes/reporte_repuestos_modelo_unidad.php?modelounidad='+modelo_unidad,'ventana','width=1000, height=1000%');			


	}


	function imprimir_reporte4(){
		//variables para el reporte
		var modelo_unidad = document.getElementById("modelo_unidad2").value;
		//imprimimos el reporte
		miventana = window.open('../reportes/reporte_repuestos_falla.php?modelounidad='+modelo_unidad,'ventana','width=1000, height=1000%');			


	}


</script>