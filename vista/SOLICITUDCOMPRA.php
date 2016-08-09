<?php 
    include_once('../controlador_alberto/cortadministracion_falla.php');
    include_once("componentes_alberto.php");
  ?>

<div id='contenedor_formulario' >
    <div id='titulo_form'>Solicitud de Compra / Requisición</div>
    <form action=''  id='formulario_maestro' method='POST'>
        <table width='100%' id='formulario_persona'>

        <tr>
            <td colspan="3" align="right">Fecha: </td>
            <td><span id="fechaHoy"><?php echo date("d-m-Y"); ?></span></td>
        </tr>
        <tr>
            <td>Requerido Por: </td>
            <td style="position: relative">
                <input type="text"  id="mecanico" onkeyup="buscarMecanico(this.value)">
                <input type="hidden" name="cedMecanico" id="cedMecanico">
                <div class="ajax" id="ajaxMecanico"></div>
            </td>
            <td> Departamento: </td>
            <td><span id="departamentoPedido"></span></td>
        </tr>
        <tr>
            <td>Observaciones</td>
            <td colspan="3">
                <textarea rows="4" style="resize: none"></textarea>
            </td>
        </tr>
    </table>

<!--trabla transaccional aqui-->
<br>
<br>
<div id='titulo_form'>Pedido</div>
<table id="transaccion">
<tr>

<td>
  <p>Repuestos</p>
<select class='' name='id_repuesto' id="id_repuesto">
<?php  include_once('../modelo_alberto/clstrepuesto_lubricante.php');
    $trepuesto_lubricante = new clstrepuesto_lubricante();
     $trepuesto_lubricante->listar(); ?>
    <option value=''>seleccionar</option>
      <?php while($mitrepuesto_lubricante=$trepuesto_lubricante->row()){ ?>
         <option <?php if($rows['id_repuesto']==$mitrepuesto_lubricante['id_repuesto']) print('selected'); ?>   value="<?php print($mitrepuesto_lubricante['id_repuesto']); ?>"><?php print($mitrepuesto_lubricante['nombre_repuesto']); ?></option>
      <?php } ?></select>
</td>


<td>
  <p>Cantidad</p>
 <input type='text' onkeypress="return solonumeros(event)" class='solonumeros'  id="cantidad" name='cantidad' value='<?php print($rows["cantidad"]); ?>' >
</td>
<td style="width:100px;">
  <input  style="width:100%; height:100%;" type="button" onclick="agregar()" value="+">
</td>
</tr>
</table>



<ol id='botonera'>
<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
<li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='submit' onclick="return guardar()"  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
<li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
<li><input type='submit' onclick="return guardar()" class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
<li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
<li><input type='submit'  name='cancelar'   value='Cancelar'  ></li>
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
   
    //repuesto
    repuesto = combo.options[combo.selectedIndex].text;
    repuesto_value = combo.value;
    //cantidad del repuesto
    cantidad = parseInt(document.getElementById("cantidad").value);



    if(cantidad && repuesto_value){


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
 


         tr.setAttribute('id','t_'+i);
         td0.innerHTML ="<p style='font-size:14px;'>"+repuesto+"<input type='hidden' value='"+repuesto_value+"' name='id_repuestos[]'></p>";
         td1.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidads[]' value='"+cantidad+"'>";
         td2.innerHTML = "<button onclick='borrar(t_"+i+")'>X</button>";

         i++;

    }else{
      alert("Ya existe en la transaccion");
    }




  }else{
    alert("existe algun valor vacio");
  }


}
//cierre de la funcion agregar

var divAjaxM = document.getElementById('ajaxMecanico');
    function buscarMecanico(dato){
        var datosAjax="";
        $.post("../controlador_alberto/cormecanico.php",{evento:"busquedaRapida",valor:dato},function(data){
            if(dato=!""){
                console.log(data);
                datos = JSON.parse(data);
                for(var datum in datos){
                    var miobjeto = datos[datum];
                    miobjeto2= JSON.stringify(miobjeto);
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarM('+miobjeto2+',"'+miobjeto.cedula+'")\'>'+miobjeto.cedula+' - '+miobjeto.mecanico+' </a>';
                }
                divAjaxM.style.display="block";
                divAjaxM.innerHTML=datosAjax;
            }else{
                divAjaxM.style.display="none";
                divAjaxM.innerHTML="";
            }
        });
    }
    function colocarM(objeto,valor) {
        divAjaxM.style.display="none";
        divAjaxM.innerHTML="";
        document.getElementById("cedMecanico").value=valor;
        document.getElementById("mecanico").value=objeto.mecanico;
    }

</script>

