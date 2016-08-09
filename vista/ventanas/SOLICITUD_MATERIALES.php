<?php
	

	//controlador 
	include_once("../controlador_alberto/cortsolicitud.php");


	//funcion para traer el ultimo codigo de slicitud
	include_once("../modelo_alberto/clstsolicitud.php");
	$solicitud = new clstsolicitud();
	$solicitud->traer_codigo();
	$misolicitud = $solicitud->row();



	include_once("../modelo_alberto/clstrepuesto.php");
	$repuesto = new clstrepuesto();
	$repuesto->listar();	

?>



<div id='contenedor_formulario' >
<div id='titulo_form'>Gestionar Solicitud</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>


<tr>
 <td>codigo</td>
 <td><input type='text' class='solonumeros' readonly="readonly"  name='nro_solicitud' value='<?php if($existe!="yes"){print($misolicitud["codigo"]+1);} print($rows["nro_solicitud"]); ?>' ></td>
</tr>

<!--fecha de la solcitud-->
<tr>
	<td>Fecha de solicitud:</td>
	<td><input type="text"  readonly="readonly" name="fecha_solicitud" value="<?php if($existe!="yes"){ print(date('Y-m-d')); }else{ print($rows['fecha_solicitud']); }   ?>"></td>
</tr>

<!--BUSCAR CHOFER-->
<tr>
	<td>Chofer:</td>
	<td>
		<input  style="width:75%;" id="cedula"  value="<?php print($rows['cedula_chofer']) ?>" type="text" name="cedula_chofer" placeholder="Cedula del chofer">
		<input type="button" class="campo" value="buscar" onclick="buscar_chofer()" style="width:20%;">
	</td>
</tr>
<tr>
	<td>Nombre:</td>
	<td>
		<input type="text" class="campo" value="<?php print($rows['nombre1'].' '.$rows['nombre2']) ?>" placeholder="Nombre del chofer" readonly="readonly" id="nombre">
	</td>
</tr>

	
<!--placa de la unidad-->
<tr>
	<td>Unidad  asignada</td>
	<td><input type="text" class="campo" value="<?php print($rows['placa_unidad']) ?>"  name="placa_unidad" placeholder="Placa de la unidad" readonly="readonly" id="placa"></td>
</tr>


<!--descripcion de la solicitud-->
<tr>
	<td>Descripcion de la solicitud:</td>
	<td>
		<textarea name="descripcion_solicitud" class="campo" placeholder="Descripcion de la solicitud"><?php print($rows['observacion_solicitud']); ?></textarea>
	</td>
</tr>



<?php if($existe!="yes"){ ?>
<!--transaccion en este caso la parte de los materiales-->
<tr>
	<td>Repuestos:</td>
	<td>
		<select id="repuestos" name="repuestos" style="width:50%;" class="campo">
			<option value="">Seleccione el repuesto</option>
			<?php while($mirepuesto = $repuesto->row()){?>
				<option value="<?php print($mirepuesto['id_repuesto']); ?>"><?php print($mirepuesto['nombre_repuesto']) ?></option>
			<?php } ?>
		</select>
		<!--cantidad-->
		<input type="text" class="campo"  onkeypress="return solonumeros(event)"  id="cantidad" name="cantidad" placeholder="cantidad" style="width:15%;">
		<!--boton de agregar-->
		<input type="button" value="+" class="campo" onclick="agregar()" style="width:15%;">
	</td>
</tr>
<?php } ?>


</table>


<!--tabla de la transaccion-->
<table id="transaccion" width="100%">
	<caption>Lista de materiales</caption>
	<tr>
		<td>Cod. Repuesto</td>
		<td>Nombre</td>
		<td>Cantidad</td>
		<td>#</td>
	</tr>
	<?php
		if($existe=="yes"){
			//llamamos los datos
			include_once("../modelo/clsDetalle_solicitud.php");
			$detalle = new clsDetalle_solicitud();
			$detalle->buscar_detalles($rows['nro_solicitud']);
			while($solic = $detalle->row()){
	 ?>
	 <tr>
		<td><?php print($solic['nro_solicitud']); ?></td>
		<td><?php print($solic['nombre_repuesto']); ?></td>
		<td><?php print($solic['cantidad']); ?></td>
		<td></td>
	</tr>

	 <!--cierre de la transaccion-->
	 <?php } }?>
</table>





<ol id='botonera'>
	<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
	<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
	<li><input type='submit'  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
	<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
	<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
	<li><input type='submit'  class="cancelar" name='cancelar'   value='cancelar' <?php  if($existe!='yes')	print('disabled');?> ></li>

	<!--imprimir reporte-->
	<?php if($existe=="yes"){ ?><li><a  style="float:right; font-size:30px; color:white; " href="">Imprimir reporte</a></li><?php } ?>

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
			<th>Cedula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Placa</th>
			<th>Buscar</th>
		</tr>
		<?php
			$lista_solicitud = new clstsolicitud();
			$lista_solicitud->listar();
			while($lista = $lista_solicitud->row()){	
		 ?>

		 <tr>
			<td><?php print($lista['nro_solicitud']); ?></td>
			<td><?php print($lista['cedula']) ?></td>
			<td><?php print($lista['nombre1'].' '.$lista['nombre2']); ?></td>
			<td><?php print($lista['apellido1'].' '.$lista['apellido2']); ?></td>
			<td><?php print($lista['placa_unidad']); ?></td>
			<td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

		</tr>
		 <?php } ?>
		
	</table>
</div>
</div>
<!--ciere de la ventana modal-->













</form>
</div><?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>


<!--descripcion de la transaccion-->
<script type="text/javascript">


var i = 0;


//funcion para borrar
function borrar(t){ 
  ta=document.getElementById("transaccion"); 
  ta.deleteRow(t.rowIndex); 
} 




//pequeña transaccion de los roles y servicios
function agregar(){

    //transaccion
    ta=document.getElementById("transaccion"); 
  

    combo = document.getElementById("repuestos");
    repuesto = combo.options[combo.selectedIndex].text;
    repuesto_value = combo.value;

    //cantidad del repuesto
    cantidad = parseInt(document.getElementById("cantidad").value);

  
    if(cantidad && repuesto){

    	//ahora veremos si existe el valor ingresado en la transaccion
    	 cant_filas = ta.rows.length;
         cont_existe = 0;

         	//aqui mostraremos sus textos
        for(z=0; z<cant_filas; z++){
       	
       		if(document.all){

       			if(ta.rows[z].cells[0].childNodes[0].innerText == repuesto_value){
	              	cont_existe++;
	           }

	           
	       }else{
	       		
	       		if(ta.rows[z].cells[0].childNodes[0].textContent == repuesto_value){
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


			   tr.setAttribute('id','t_'+i);
			   td0.innerHTML ="<p style='font-size:14px;'>"+repuesto_value+"</p>";
			   td1.innerHTML="<p style='font-size:14px;'>"+repuesto+"</p><input type='hidden' name='repuestos[]' value='"+repuesto_value+"'>";
			   td2.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidad[]' value='"+cantidad+"'>";
			   td3.innerHTML = "<button onclick='borrar(t_"+i+")'>X</button>";

			   i++;

		}else{
			alert("Ya existe en la transaccion");
		}


	}else{
		alert("existe algun valor vacio");
	}


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







</script>