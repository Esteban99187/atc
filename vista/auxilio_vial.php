<?php 
	include_once('../controlador_alberto/cortauxilio_vial.php'); 	
	include_once("componentes_alberto.php");


	//crear el combo dinamico
	include_once("../modelo_alberto/clsCombo.php");
	$combo = new clsCombo();
	$combo->listar_paises();

?>


<!--exportamos los archivos para el combo dinamico-->
<script type="text/javascript" src="js_al/combo.js"></script>

<div id='contenedor_formulario' >
<div id='titulo_form'>Auxilio Vial <?php if($existe=="yes"){ ?><h1 style="float:right;"><a target="_blank" href="../reportes/rtauxilio_vial.php?codigo=<?php print($rows['id_auxilio_vial']); ?>">Imprimir Reporte</a></h1><?php } ?></div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstauxilio_vial.php");
$tauxilio_vial = new clstauxilio_vial();
$tauxilio_vial->traer_codigo();
$mitauxilio_vial = $tauxilio_vial->row();?>



<tr style="display:none;">
 <td>id_auxilio_vial</td>
 <td><input type='text' class=''  name='id_auxilio_vial' value='<?php if($existe!="yes"){print($mitauxilio_vial["id_auxilio_vial"]+1);} print($rows["id_auxilio_vial"]); ?>' ></td>
</tr>

<tr>
 <td>Placa de la unidad</td>
 <td>
 	<input type='text'  placeholder="Buscar la placa de la unidad a auxiliar" readonly="readonly" id="numero_unidad" style='width:80%; float:left;' class='readonlytrue <?php if($existe!='yes') print('campo campoclave'); ?>'  name='placa_unidad' value='<?php print($rows["placa_unidad"]); ?>' >
 	<input type="button" value="buscar unidad" style="width:20%;" onclick="buscar_unidad()">
 </td>
</tr>


<tr>
	<td>Cedula:</td>
	<td><input type="text" value="<?php print($rows['cedula']); ?>" id="cedula_chofer" placeholder="Cedula del chofer" readonly="readonly"></td>
</tr>

<tr>
	<td>Chofer:</td>
	<td><input type="text" value="<?php print($rows['nombre1'].' '.$rows['nombre2']); ?>" id="nombre_chofer" placeholder="Nombres del chofer" readonly="readonly"></td>
</tr>

<tr>
 <td>Fecha del auxilio vial</td>
 <td><input type='text' class='readonlytrue campo'  name='fecha_auxilio_vial' value='<?php if($existe=='yes'){ print($rows["fecha_auxilio_vial"]); }else{ print(date("Y-m-d"));  } ?>' ></td>
</tr>

<tr>
 <td>descripcion del accidente</td>
 <td><input type='text' class=''  name='descripcion_accidente' value='<?php print($rows["descripcion_accidente"]); ?>' ></td>
</tr>



<tr>
	<td>Pais</td>
	<td>
		<select  id="pais" class='solonumeros' name='id_pais'>
    	<option value=''>seleccionar pais</option>
    	<?php while($mipais = $combo->row()){ ?>
    		<option <?php if($rows['idpais']==$mipais['idpais']) print("selected"); ?> value="<?php print($mipais['idpais']); ?>"><?php print($mipais['desc_pais']); ?></option>
    	<?php } ?>
    	
  	</select>
  </td>
</tr>


<tr>
	<td>Estado</td>
	<td>
		<select id="estado" class='solonumeros' name='id_estado'>
    	<option value=''>seleccionar</option>
    	<?php if($existe=="yes"){ ?>
    		<option selected="selected" value="<?php print($rows['idestado']) ?>"><?php print($rows['desc_esta']) ?></option>
    	<?php } ?>
  	</select>
  </td>
</tr>



<tr>
	<td>Municipio</td>
	<td>
		<select id="municipio" class='solonumeros' name='id_municipio'>
    	<option value=''>seleccionar</option>
    	<?php if($existe=="yes"){ ?>
    		<option selected="selected" value="<?php print($rows['idmunicipio']) ?>"><?php print($rows['desc_muni']) ?></option>
    	<?php } ?>
  	</select>
  </td>
</tr>


<tr>
	<td>Parroquia</td>
	<td>
		<select id="parroquia" class='solonumeros' name='id_parroquia'>
    	<option value=''>seleccionar</option>
  		<?php if($existe=="yes"){ ?>
    		<option selected="selected" value="<?php print($rows['idparroquia']) ?>"><?php print($rows['desc_parr']) ?></option>
    	<?php } ?>
  	</select>
  </td>
</tr>


<tr>
 <td>direccio detallada</td>
 <td><input type='text' class=''  name='direccio_detallada' value='<?php print($rows["direccio_detallada"]); ?>' ></td>
</tr>

<tr>
	<td>Solicitud de materiales:</td>
	<td>
		<textarea  style="width:300px; height:50px;" name="descripcion_materiales"><?php print($rows['descripcion_solicitud']); ?></textarea>
	</td>
</tr>


 <!--solicitud-->
<?php if($existe=="yes"){ ?> 
<tr>
	 <td>Estatus de la solicitud:</td>
	 <td><?php if($rows['estatus_auxilio']=="2"){ print("En espera"); }else if($rows['estatus_auxilio']=="1"){ print("Aprobado"); }else{ print("Rechazado");  } ?></td>
</tr>
<?php  } ?>


</table>
<ol id='botonera'>

<?php if($existe_aprobacion!="yes"){ ?>
	<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
	<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
	<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
	<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
	<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
	<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
	<li><input type='submit'  name='cancelar'   value='cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>

<?php } else{ ?>
		<li><input type='submit'  name='Aprobar'   value='Aprobar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		<li><input type='submit'  name='Rechazar'   value='Rechazar' <?php  if($existe!='yes')	print('disabled');?> ></li>
<?php } ?>

</ol>



	<!--ventana modal aqui-->
<!--aqui estara la ventana modal-->
<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
<div id="ventana_modal">
	<h1 id="tabla_modal">Lista de auxilio vial</h1>
	<div id="busqueda_modal">
		<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
	</div>

	<div style="height:400px; overflow:auto;">
	<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
		<tr>
			<th>Id</th>
			<th>Placa unidad</th>
			<th>Fecha de auxilio vial</th>
			<th>Descripcion del accidente</th>
			<th>Direccion detallada</th>
			<th>#</th>
		</tr>
		<?php
			$lista_auxilio = new clstauxilio_vial();
			$lista_auxilio->listar();
			while($lista = $lista_auxilio->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['id_auxilio_vial']); ?></td>
			<td><?php print($lista['placa_unidad']); ?></td>
			<td><?php print($lista['fecha_auxilio_vial']); ?></td>
			<td><?php print($lista['descripcion_accidente']); ?></td>
			<td><?php print($lista['direccio_detallada']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>
<!--ciere de la ventana modal-->


<?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>




</form>
</div>



<!--funcion para buscar la unidad-->
<script type="text/javascript">
	
	//abrir ventana emergente de unidades	
	function buscar_unidad(){
		miventana = window.open('ventanas/lista_unidades.php', 'ventana','width=800, height=400');			
	}

</script>