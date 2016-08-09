<?php 
	include_once('../controlador_alberto/cortmantenimiento_correctivo.php'); 
	include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
<div id='titulo_form'>Mantenimiento Correctivo</div>
<form action=''  id='formulario_maestro' method='POST'>
<table width='100%' id='formulario_persona'>

<?php
include_once("../modelo_alberto/clstmantenimiento_correctivo.php");
$tmantenimiento_correctivo = new clstmantenimiento_correctivo();

if(!$_GET['nro_solicitud']){
	$tmantenimiento_correctivo->traer_codigo();
	$mitmantenimiento_correctivo = $tmantenimiento_correctivo->row();
}else{

	$tmantenimiento_correctivo->idmatenimiento_correctivo = $_GET['nro_solicitud'];
	$tmantenimiento_correctivo->buscar_mantenimiento();
	$rows = $tmantenimiento_correctivo->row();
	$existe = "yes";


	//tambien buscaremos las unidades
	include_once("../modelo_alberto/clstunidad.php");
	$unidad = new clstunidad();
	$unidad->placa_unidad = $rows['placa'];
	$unidad->buscar_unidad($rows['placa']);
	$mtunidad = $unidad->row();
}

?>


	
<tr style="display:none;">
 <td>idmatenimiento_correctivo</td>
 <td><input type='text' class='solonumeros'  name='idmatenimiento_correctivo' value='<?php if($existe!="yes"){print($mitmantenimiento_correctivo["idmatenimiento_correctivo"]+1);} print($rows["idmatenimiento_correctivo"]); ?>' ></td>
</tr>



<tr>
	<td>Fecha</td>
	<td><input readonly="readonly" name="fecha" type="text" style="width:10%;" value="<?php if($existe!="yes"){ print(date("Y-m-d")); }else {  print($rows['fecha']); } ?>"></td>
</tr>

<tr>
	<td>Placa</td>
	<td>
		<input  style="width:50%;" value="<?php print($rows["placa"]); ?>" id="placa_mantenimiento_correctivo" readonly="readonly" type="text" name="placa" placeholder="Ingrese la Placa">
		<input type="button" value="Buscar"  onclick="buscar_unidad()" style="width:10%;">
	</td>
</tr>

<tr>
	<td>Modelo</td>
	<td><input style="width:50%;" value="<?php print($mtunidad['modelo']); ?>" type="text" id="modelo_nombre" placeholder="Modelo de la Unidad" readonly="readonly"></td>
</tr>

<tr>
	<td>Kilometraje Actual</td>
	<td><input style="width:50%;" type="text" id="kilometraje_actual" placeholder="Kilometraje Actual" readonly="readonly"></td>
</tr>


<!--modelo de la unidad-->
<input type="hidden" id="modelo_unidad" value="<?php print($mtunidad['idmodelo_unidad']); ?>">
<input type="hidden" id="busqueda_ajax" value="<?php print($mtunidad['idmodelo_unidad']); ?>">


<tr>
<td>
Falla</td>
<td>
<select class='solovacio' id="falla_correctivo" name='idfalla'>
<?php  include_once('../modelo_alberto/clstfalla.php');
    $tfalla = new clstfalla();
     $tfalla->listar(); ?>
    <option value=''>Seleccionar</option>
      <?php while($mitfalla=$tfalla->row()){ ?>
         <option <?php if($rows['idfalla']==$mitfalla['idfalla']) print('selected'); ?>   value="<?php print($mitfalla['idfalla']); ?>"><?php print($mitfalla['descripcion']); ?></option>
      <?php } ?></select></td>
</tr>

<tr>
	<td>Observación</td>
	<td><textarea name="observacion" style="height:50px;"><?php print($rows['observacion']); ?></textarea></td>
</tr>




</table>



<!--esta es la tabla de la transaccion-->
<br>
<br>
<div id='titulo_form'>Repuestos</div>
<table id="transaccion" width="100%">

<tr>
 <td>
 	<p>Repuesto</p>
 	<select name="id_repuesto" id="id_repuesto" class="solovacio">
 		<option value="">Seleccione el Repuesto</option>
 	</select>
 </td>

 <td>
 	<p>Actividad</p>
	<input style="width:100px;" type='text' class='letranumeros' id="actividad"  name='actividad' value='<?php print($rows["actividad"]); ?>' >
</td>

 <td>
 	<p>Kilometraje</p>
 	<input style="width:60px;" type='text' class='solonumeros' onKeypress="return solonumeros(event)" id="kilometraje" name='kilometraje' value='<?php print($rows["kilometraje"]); ?>' >
 </td>

 <td>
 	<p>Cantidad</p>
	<input style="width:60px;" readonly="readonly" type='text' class='solonumeros kilometraje_preventivo' onKeypress="return solonumeros(event)"  id="cantidad" name='cantidad' value='<?php print($rows["cantidad"]); ?>' >
</td>

<td>
 	<p>UM</p>
	<input style="width:60px;" type='text' class='solonumeros' onKeypress="return solonumeros(event)"  id="unidad_medida" name='unidad_medida' value='<?php print($rows["unidad_medida"]); ?>' >
</td>


 <td>
 	<p>Mecánico</p>
	<select class='solonumeros' id="idmecanico" name='idmecanico'>
<?php  include_once('../modelo_alberto/clstmecanico.php');
    $tmecanico = new clstmecanico();
     $tmecanico->listar(); ?>
    <option value=''>Seleccionar</option>
      <?php while($mitmecanico=$tmecanico->row()){ ?>
         <option <?php if($rows['idmecanico']==$mitmecanico['idmecanico']) print('selected'); ?>   value="<?php print($mitmecanico['idmecanico']); ?>"><?php print($mitmecanico['nombre1']); ?></option>
      <?php } ?></select>
 </td>


<td>
 <p>Fecha</p>
 <input type='date' style="width:100px;" class='' id="fecha"  name='fecha' value='<?php print(date("Y-m-d")); ?>' >
</td>


 <td>
 	<p>Nota</p>
 	<input style="width:80px;" type='text' class='letranumeros'  id="nota" name='nota' value='<?php print($rows["nota"]); ?>' >
 </td>

 <td>
 	<?php if(!$_GET['nro_solicitud']){ ?>
 		<input type="button" onclick="agregar()" value="+" style="width:25px; height:50px;">
 	<?php } ?>
 </td>
</tr>




<!--esta es la de la busqueda-->

<?php
	if($_GET['nro_solicitud']){
		include_once("../modelo_alberto/clstsolicitud_mantenimiento.php");
		$solicitud = new clssolicitud_mantenimiento();
		$solicitud->nro_solicitud = $_GET['nro_solicitud'];
		$solicitud->buscar_solicitud();


	while($misolicitud = $solicitud->row()){	

 ?>
<tr>
 <td>
	<input type='text' readonly="readonly" class='' id="actividad"  name='actividad' value='<?php print($misolicitud["nombre_repuesto"]); ?>' >
 	
 </td>

 <td>
	<input type='text' readonly="readonly" class='' id="actividad"  name='actividad' value='<?php print($misolicitud["actividad"]); ?>' >
</td>

 <td>
 	<input style="width:60px;" readonly="readonly" type='text' class='' id="kilometraje" name='kilometraje' value='<?php print($misolicitud["kilometraje"]); ?>' >
 </td>

 <td>
	<input style="width:40px;" readonly="readonly" type='text' class=''  id="cantidad" name='cantidad' value='<?php print($misolicitud["cantidad"]); ?>' >
</td>

 <td>
	<input style="width:60px;" readonly="readonly" type='text' class=''  id="unidad_medida" name='unidad_medida' value='<?php print($misolicitud["unidad_medida"]); ?>' >
</td>

 <td>
 	<input type='text' readonly="readonly" style="width:100px;" class='' id="fecha"  name='fecha' value='<?php print($misolicitud["nombre1"]." ".$misolicitud['nombre2']); ?>' >
 </td>


<td>
 <input type='text' readonly="readonly" style="width:100px;" class='' id="fecha"  name='fecha' value='<?php print($misolicitud["fecha"]); ?>' >
</td>

 <td>
 	<input type='text' readonly="readonly" class=''  id="nota" name='nota' value='<?php print($misolicitud["nota"]); ?>' >
 </td>

 <td>
 	--
 </td>
</tr>

<?php }} ?>


<!--cierrre de la busqueda-->




</table>

<!---cierre de la transaccion-->



<ol id='botonera'>

<?php if(!$_GET['nro_solicitud']){ ?>
	<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
	<li><input type='submit' onclick="return guardar()"  name='incluir'  id='incluir' value='Guardar'></li>
	<li><input type='submit'  name='cancelar'   value='Cancelar' ></li>
<?php }else{ ?>
	<li><input type='submit'  name='aceptar'   value='Aceptar' ></li>
	<li><input type='submit'  name='rechazar'   value='Rechazar' ></li>
	<li><a target="_blank" href="../reportes/rtmantenimiento_correctivo.php?nro_solicitud=<?php print($_GET['nro_solicitud']); ?>"><input type='button'   value='Imprimir Reporte' ></a></li>
<?php } ?>

</ol>
</form>
</div><?php if($msj){ ?>   <script> alert("<?php print($msj); ?>"); </script>   <?php  };  ?>




<!--descripcion de la transaccion-->
<script type="text/javascript">


var i = 0;
ta=document.getElementById("transaccion"); 
  

//funcion para borrar
function borrar(t){ 
  ta.deleteRow(t.rowIndex); 
} 




//pequeña transaccion de los roles y servicios
function agregar(){

    //transaccion
    

    combo = document.getElementById("id_repuesto");
    combo2 = document.getElementById("idmecanico");
    

    //repuesto
    repuesto = combo.options[combo.selectedIndex].text;
    repuesto_value = combo.value;

    //mecanico
    mecanico = combo2.options[combo2.selectedIndex].text;
    mecanico_value = combo2.value;


    //cantidad del repuesto
    cantidad = parseInt(document.getElementById("cantidad").value);
    unidad_medida = parseInt(document.getElementById("unidad_medida").value);
    kilometraje = parseInt(document.getElementById("kilometraje").value);
    actividad = document.getElementById("actividad").value;
   	fecha = document.getElementById("fecha").value;
    nota = document.getElementById("nota").value;



    if(cantidad && repuesto_value && mecanico_value && kilometraje && actividad && fecha && unidad_medida){


    	//ahora veremos si existe el valor ingresado en la transaccion
    	 cant_filas = ta.rows.length;
         cont_existe = 0;

         	//aqui mostraremos sus textos
        for(z=0; z<cant_filas; z++){
       	
       		if(document.all){

       			if(ta.rows[z].cells[0].childNodes[0].innerText == repuesto){
	              	cont_existe++;
	           }

	           
	       }else{
	       		
	       		if(ta.rows[z].cells[0].childNodes[0].textContent == repuesto){
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
			   td5=tr.insertCell(5);   //insertar la tercera columna
			   td6=tr.insertCell(6);   //insertar la tercera columna
			   td7=tr.insertCell(7);   //insertar la tercera columna
			   td8=tr.insertCell(8);   //insertar la tercera columna


			   tr.setAttribute('id','t_'+i);
			   td0.innerHTML ="<p style='font-size:14px;'>"+repuesto+"<input type='hidden' value='"+repuesto_value+"' name='id_repuestos[]'></p>";
			   td1.innerHTML="<p style='font-size:14px;'>"+actividad+"</p><input type='hidden' name='actividads[]' value='"+actividad+"'>";
			   td2.innerHTML="<p style='font-size:14px;'>"+kilometraje+"</p><input type='hidden' name='kilometrajes[]' value='"+kilometraje+"'>";
			   td3.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidads[]' value='"+cantidad+"'>";
			   td4.innerHTML="<p style='font-size:14px;'>"+unidad_medida+"</p><input type='hidden' name='unidad_medidas[]' value='"+unidad_medida+"'>";
			   td5.innerHTML="<p style='font-size:14px;'>"+mecanico+"</p><input type='hidden' name='mecanicos[]' value='"+mecanico_value+"'>";
			   td6.innerHTML="<p style='font-size:14px;'>"+fecha+"</p><input type='hidden' name='fechas[]' value='"+fecha+"'>";
			   td7.innerHTML="<p style='font-size:14px;'>"+nota+"</p><input type='hidden' name='notas[]' value='"+nota+"'>";
			   td8.innerHTML = "<button onclick='borrar(t_"+i+")'>X</button>";

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

function buscar_unidad(){
	miventana = window.open('ventanas/lista_unidades_correctivo.php', 'ventana','width=800, height=400');
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
		alert("Debe solicitar al menos un repuesto");
		return false;
	}else{
		return true;
	}
}


//obtener la placa de la unidad
function placa_unidad(){
	combo = document.getElementById("placa_mantenimiento_correctivo");
    //repuesto
    placa_unidad = combo.options[combo.selectedIndex].text;
    document.getElementById("placa_real").value = placa_unidad;
}


</script>

