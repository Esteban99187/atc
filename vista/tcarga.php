<?php 

	include_once('../controlador_alberto/cortcarga.php');
	include_once("componentes_alberto.php");
 ?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar tipo de carga</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstcarga.php");
$tcarga = new clstcarga();
$tcarga->traer_codigo();
$mitcarga = $tcarga->row();?>


<tr style="display:none;">
 <td>idtcarga</td>
 <td><input type='text' class='solonumeros'  name='idtcarga' value='<?php if($existe!="yes"){print($mitcarga["idtcarga"]+1);} print($rows["idtcarga"]); ?>' ></td>
</tr>

<tr>
 <td>nombre</td>
 <td><input type='text' style='width:80%; float:left;' class='letranumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='nombre' value='<?php print($rows["nombre"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
</tr>

<tr>
 <td>placa batea</td>
 <td><input type='text' class='letranumeros'  name='placa_batea' value='<?php print($rows["placa_batea"]); ?>' ></td>
</tr>

<tr>
 <td>placa chacis</td>
 <td><input type='text' class='letranumeros'  name='placa_chacis' value='<?php print($rows["placa_chacis"]); ?>' ></td>
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
	<h1 id="tabla_modal">Lista de Cargas</h1>
	<div id="busqueda_modal">
		<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
	</div>

	<div style="height:400px; overflow:auto;">
	<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
		<tr>
			<th>Nro</th>
			<th>Nombre</th>
			<th>Placa Batea</th>
			<th>Placa Chacis</th>
			<th>Buscar</th>
		</tr>
		<?php
			$lista_solicitud = new clstcarga();
			$lista_solicitud->listar();
			while($lista = $lista_solicitud->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['idtcarga']); ?></td>
			<td><?php print($lista['nombre']) ?></td>
			<td><?php print($lista['placa_batea']); ?></td>
			<td><?php print($lista['placa_chacis']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>











</form>
</div><?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>