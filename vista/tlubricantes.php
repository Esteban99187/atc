<?php 
	include_once("../modelo_alberto/clsGenerarCombos.php");
	$comboPg = new CombosDinamicos;
	include_once('../controlador_alberto/cortrepuesto_lubricante.php'); 
	include_once("componentes_alberto.php");
	$i = 0;
?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Lubricantes</div>
	<form action=''  id='formulario_maestro' method='POST' autocomplete="off">
		<table width='100%' id='formulario_persona'>

		<?php $codigoRL = $objRL->traer_codigo(); ?>

			<tr style="display:none;">
				<td>id_repuesto</td>
				<td><input type='text' class='solonumeros'  name='id_repuesto' value='<?php if(isset($existe) && $existe=="yes"){ echo $rows["id_repuesto"]; }else { echo $codigoRL["id_repuesto"]+1; } ?>' ></td>
			</tr>

			<tr>
				<td style="width:200px;">
					<p>Nombre</p>
					<input type='text' class='letranumeros campo'  name='nombre_repuesto' value='<?php print($rows["nombre_repuesto"]); ?>' >
				</td>
				<td style="width:200px;">
					<p>Unidad De Medida</p>
					<select class='solovacio campo'  name='idunidad_medida'>
						<?php $comboPg->generarCombo("SELECT * FROM unidad_medida","idunidad_medida","desc_unid_medi",$rows["idunidad_medida"]); ?>
					</select>
				</td>
				<td>
					<p>Tipo de Lubricante</p>
					<select name="tipo_lubricante" class="solovacio campo">
						<option>SELECCIONE UNA OPCIÓN</option>
						<option value="1" <?php if($rows["tipo_lubricante"]==1) echo "selected" ?>>Motor</option>
						<option value="2" <?php if($rows["tipo_lubricante"]==2) echo "selected" ?>>Liga de Frenos</option>
						<option value="3" <?php if($rows["tipo_lubricante"]==3) echo "selected" ?>>Hidráulico</option>
						<option value="4" <?php if($rows["tipo_lubricante"]==4) echo "selected" ?>>Caja</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<p>Stock Mínimo</p>
					<input type='text' class='solonumeros campo' id="stockmini" name='stock_min' value='<?php print($rows["stock_min"]); ?>' onblur="validarStock()">
				</td>
				<td>
					<p>Stock Máximo</p>
					<input type='text' class='solonumeros campo' id="stockmaxi" name='stock_max' value='<?php print($rows["stock_max"]); ?>' onblur="validarStock()">
				</td>
			</tr>
			<input type="hidden" name="id_modelo_repuesto" value="0">
			<!--este sera un campo que ira oculto este es del tipo lubricante-->
			<tr style="display:none;">
				<td>tipo_repuesto</td>
				<td><input type='text' class=''  name='tipo_repuesto' value='2' ></td>
			</tr>
		</table>
	<br>
	<br>
	<!--aqui haremos la tabla transaccional-->
	<div id='titulo_form' style="border:1px solid black !important;">Detalle</div>
	<table width='100%' id='transaccion'>
		<tr>
			<td>
				<p>Modelo Unidad</p>
				<select class='solonumeros' id="modelo_unidad" name='idmodelo_unidad' style="width:200px;">
					<?php $comboPg->generarCombo("SELECT * FROM modelo_unidad where estatus_moduni = '1'","idmodelo_unidad","desc_mode",$rows["idmodelo_unidad"]); ?>
				</select>		
			</td>
			<td>
				<p>Kilometraje Mínimo (Km.)</p>
				<input type='text' id="kminimo" onKeypress="return solonumeros(event)"  onblur="validarMaximo()"  name='kmin' value='<?php if(isset($rows["kmin"]) ) echo $rows["kmin"];  ?>' >
			</td>
			<td>
				<p>Kilometraje Máximo (Km.)</p>
				<input type='text' id="kmaximo" onKeypress="return solonumeros(event)" onblur="validarMaximo()"  name='kmax' value='<?php if(isset($rows["kmax"]) ) echo $rows["kmax"];    ?>' >
			</td>
			<td>
				<p>Cantidad</p>
				<input   type='text' style="width:60px;" onKeypress="return solonumeros(event)" id="cantidad" class='solonumeros'  name='cantidad' value='<?php print($rows["cantidad"]); ?>' >
			</td>
			<td>
				<input type="button" class="btn btn-primary" value="+" onclick="agregar()" style="width:50px;">
			</td>


		<!--haremos el detalle-->
		<?php if($existe=="yes"){

			include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
			$detalle_repuesto = new clstdetalle_unidades_repuesto();
			$detalle_repuesto->id_repuesto = $rows["id_repuesto"];
			$datoRepuestoDetalle = $detalle_repuesto->buscar_unidades_repuestos();

			foreach ($datoRepuestoDetalle as $midetalle_repuesto){
				?>

				<tr id="t_<?php print($i); ?>">
					<td><p style='font-size:14px;'><?php print($midetalle_repuesto['desc_mode']); ?><input type='hidden' value='<?php print($midetalle_repuesto['idmodelo_unidad']); ?>' name='idmodelo_unidads[]'></p></td>
					<td><p style='font-size:14px;'><?php print($midetalle_repuesto['kmin']); ?></p><input type='hidden' name='kmins[]' value='<?php print($midetalle_repuesto['kmin']); ?>' ></td>
					<td><p style='font-size:14px;'><?php print($midetalle_repuesto['kmax']); ?></p><input type='hidden' name='kmaxs[]' value='<?php print($midetalle_repuesto['kmax']); ?>'></td>
					<td><p style='font-size:14px;'><?php print($midetalle_repuesto['cantidad']); ?></p><input type='hidden' name='cantidads[]' value='<?php print($midetalle_repuesto['cantidad']); ?>'></td>
					<td><button type="button" class="btn btn-warning" onclick='borrar(t_<?php print($i); ?>)'>X</button></td>
				</tr>


				<?php $i++; } ?> 


				<?php }?>
				<!--cierre del detalle-->
				<input type="hidden" id="valor_transaccion" value="<?php print($i); ?>">

			</table>
			<!--cierre de la transaccion-->
		<ol id='botonera'>
			<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
			<?php if($existe!="yes"){ ?>
			<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
			<li><input type='submit' onclick="return guardar()" class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') ?>></li>

			<?php }else{ ?>

			<li><input type='submit' onclick="return guardar()" class="btn btn-primary"  name='incluir2'  id='incluir' value='Guardar'></li>

			<?php } ?>

			<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
			<!--<li><input type='submit' class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>-->
			<li><input type='submit'  class="cancelar" name='cancelar' value='Cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>
		</ol>
		<!--ventana modal aqui-->
		<!--aqui estara la ventana modal-->
		<!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
		<div id="ventana_modal">
			<h1 id="tabla_modal">Lista lubricantes</h1>
			<div id="busqueda_modal">
				<label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
			</div>

			<div style="height:400px; overflow:auto;">
				<table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
					<tr>
						<th>Id</th>
						<th>Repuesto</th>
						<th>#</th>
					</tr>
					<?php
					$listatrepuesto_lubricante = new clstrepuesto_lubricante();
					$listado = $listatrepuesto_lubricante->listar_lubricantes();
					foreach($listado as $index => $lista){	
						?>

						<tr>
							<td><?php print($lista['id_repuesto']); ?></td>
							<td><?php print($lista['nombre_repuesto']); ?></td>
							<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

						</tr>
						<?php } ?>

					</table>
				</div>
			</div>
			<!--ciere de la ventana modal-->
	</form>
</div><?php if($msj){ ?>   <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>
<!--descripcion de la transaccion-->
<script type="text/javascript">
var i = document.getElementById("valor_transaccion").value;
ta=document.getElementById("transaccion"); 

	//funcion para borrar
	function borrar(t){ 
		ta.deleteRow(t.rowIndex); 
	} 
	function limpiar(){
		document.getElementById("modelo_unidad").value="";
		document.getElementById("cantidad").value=0;
		document.getElementById("kminimo").value=0;
		document.getElementById("kmaximo").value=0;
	}
	function agregar(){
		//transaccion
		combo = document.getElementById("modelo_unidad");

		unidad = combo.options[combo.selectedIndex].text;
		unidad_value = combo.value;

		//cantidad del repuesto
		cantidad = parseInt(document.getElementById("cantidad").value);

		kminimo = parseInt(document.getElementById("kminimo").value);
		kmaximo = parseInt(document.getElementById("kmaximo").value);



		if(cantidad && unidad_value && kminimo && kmaximo ){

		//ahora veremos si existe el valor ingresado en la transaccion
		cant_filas = ta.rows.length;
		cont_existe = 0;

		//aqui mostraremos sus textos
		for(z=0; z<cant_filas; z++){

			if(document.all){

				if(ta.rows[z].cells[0].childNodes[0].innerText == unidad_value){
					cont_existe++;
				}


			}else{

				if(ta.rows[z].cells[0].childNodes[0].textContent == unidad){
					cont_existe++;
				}

			}
		}

		if(cont_existe==0){

			tr=ta.insertRow(-1);  //insertar una fila
			td0=tr.insertCell(0);  // insertar una columna
			td1=tr.insertCell(1);   //insertar la segunta columna
			td2=tr.insertCell(2);   //insertar la tercera columna
			td3=tr.insertCell(3);   //insertar la tercera columna
			td4=tr.insertCell(4);   //insertar la tercera columna


			tr.setAttribute('id','t_'+i);
			td0.innerHTML ="<p style='font-size:14px;'>"+unidad+"<input type='hidden' value='"+unidad_value+"' name='idmodelo_unidads[]'></p>";
			td1.innerHTML="<p style='font-size:14px;'>"+kminimo+"</p><input type='hidden' name='kmins[]' value='"+kminimo+"'>";
			td2.innerHTML="<p style='font-size:14px;'>"+kmaximo+"</p><input type='hidden' name='kmaxs[]' value='"+kmaximo+"'>";
			td3.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidads[]' value='"+cantidad+"'>";
			td4.innerHTML = "<button class='btn btn-warning' onclick='borrar(t_"+i+")'>X</button>";



			i++;

		}else{
			crearMsj("Este modelo "+unidad+" ya esta asociado");
		}

	}else{
		crearMsj("existe algun valor vacio");

		}/*else if((kmaximo != 0) || (kminimo != 0 )){
		crearMsj("El Kilometraje minimo o  el Kilometraje maximo tiene que ser igual a  0  ");
	}*/ 
}
	//cierre de la funcion agregar




	//funcion para buscar chofer
	function buscar_chofer(){
		miventana = window.open('ventanas/lista_choferes.php', 'ventana','width=800, height=400');
	}

	//solonumeros
	//validar la fecha
	function solonumeros(e){
		var key = window.Event ? e.which : e.keyCode
		return (key >= 48 && key <= 57 || key==8)
	}

	//validacion para guardar si existe al menos un dato en la transaccion
	function guardar(){
		cant_filas = parseInt(ta.rows.length);
		if(cant_filas<=1){
			crearMsj("Debe solicitar al menos un lubricante");
			return false;
		}else{
			return true;
		}
	}
	function validarMaximo(){
		mini =  parseInt(document.getElementById("kminimo").value);
		maxi =  parseInt(document.getElementById("kmaximo").value);
		if( (mini>=0 && maxi>=0 ) && mini>=maxi ){
			crearMsj("el Kilometraje Máximo no puede ser menor o igual al mínimo");
			$("#kmaximo").val("");
			$("#kminimo").val("");
		}
	}
	function validarStock(){
		maxi = parseInt(document.getElementById("stockmaxi").value);
		mini = parseInt(document.getElementById("stockmini").value);
		if( (mini>maxi) ){
			crearMsj("El stock máximo no puede ser menor al mínimo");
			$("#stockmaxi").val("");
			$("#stockmini").val("");
		}
	}
</script>

