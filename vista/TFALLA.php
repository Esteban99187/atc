<?php 
	include_once('../controlador_alberto/cortfalla.php'); 	
	include_once("componentes_alberto.php");
?>
<div id='contenedor_formulario' >
	<div id='titulo_form'>Falla</div>
	<form action=''  id='formulario_maestro' method='POST'>
		<table width='100%' id='formulario_persona'>
			<tr>
				<td></td>
				<td><input type="hidden" name="idfalla" value="<?php if(isset($rows['idfalla'])) echo $rows['idfalla']; else echo '-1' ?>"></td>
			</tr>
			<tr>
				<td>Descripción</td>
				<td>
					<input type='text' style='width:80%; float:left;' class='letranumeros <?php if($existe!='yes') print('campo campoclave'); ?>'  name='descripcion' value='<?php print($rows["descripcion"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'>
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
			<li><input type='submit' class="cancelar"  name='cancelar'   value='Cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		</ol>
		<!--ventana modal aqui-->
		<!--aqui estara la ventana modal-->
		<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
		<div id="ventana_modal" style="position:fixed !important; top:-150 !important;">
			<h1 id="tabla_modal">Listado de Fallas</h1>
			<div id="busqueda_modal">
				<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
			</div>

			<div style="height:400px; overflow:auto;">
				<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
					<tr>
						<th>Nro</th>
						<th>Descripción</th>
						<th>Acción</th>
					</tr>
					<?php
						foreach($fallas as $index => $lista){	
					?>
						<tr>
							<td><?php print($lista['idfalla']); ?></td>
							<td><?php print($lista['descripcion']) ?></td>
							<td><input type="submit" value="buscar" name="buscar" class="btn btn-primary busqueda"></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</form>
</div>
<?php if($msj){ ?>   <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>