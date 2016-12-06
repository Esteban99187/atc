<?php
    include_once("../modelo_alberto/clsGenerarCombos.php");
    $comboPg = new CombosDinamicos;
    include_once('../controlador_alberto/cortadministracion_falla.php');
    include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
  <div id='titulo_form'>Administración de Fallas</div>
  <form action=''  id='formulario_maestro' method='POST'>
    <table width='100%' id='formulario_persona'>
      <tr style="display:none;">
        <td></td>
        <td><input type='hidden' name='idtadministracion_falla' value="<?php if(isset($rows['idtadministracion_falla'])) echo $rows['idtadministracion_falla']; else echo '-1' ?>" ></td>
      </tr>
      <tr>
        <td>Falla</td>
        <td>
          <select name="idfalla" class="solovacio campo" id="falla">
          <?php $comboPg->generarCombo("SELECT * FROM tfalla where estatus = 1","idfalla","descripcion",$rows["idfalla"]) ?>
          </select>
        </td>            
      </tr>
      <tr>
        <td>Modelo Unidad</td>
        <td>
          <select class='solovacio campo' name='idmodelo_unidad' id="modelo_administracion_falla">
          <?php $comboPg->generarCombo("SELECT * FROM modelo_unidad","idmodelo_unidad","desc_mode",$rows["idmodelo_unidad"]) ?>
          </select>
        </td>
      </tr>
    </table>
    <!--trabla transaccional aqui-->
    <br>
    <br>
    <div id='titulo_form'>Repuestos</div>
    <table id="transaccion">
      <tr>
        <td>
          <p>Repuestos</p>
          <select class='form-control campo' name='id_repuesto' id="id_repuesto">
          <?php $comboPg->generarCombo("SELECT * FROM trepuesto_lubricante","id_repuesto","nombre_repuesto","SELECCIONE UNA OPCIÓN"); ?>
          </select>
        </td>
        <!-- <td>
        <p>Cantidad</p>
        <input type='text' onkeypress="return solonumeros(event)" class='form-control solonumeros campo'  id="cantidad" name='cantidad' value='<?php print($rows["cantidad"]); ?>' >
        </td> -->
        <td >
          <input  type="button" class="btn btn-primary" onclick="agregar()" value="+">
        </td>
      </tr>
      <!--haremos el detalle-->
      <?php if($existe=="yes"){
        @include_once("../modelo_alberto/clstadministracion_falla.php");
        $fallaDetalle = new clstadministracion_falla();
        $fallaDetalle->idmodelo_unidad = $rows["idmodelo_unidad"];
        $fallaDetalle->idfalla = $rows["idfalla"];
        $a=$fallaDetalle->buscar_repuestos();
        #while($midetalle_repuesto = $detalle_repuesto->row()){
        foreach($a as $midetalle_repuesto){
      ?>
          <tr id="t_<?php print($i); ?>">
            <td><p style='font-size:14px;'><?php print($midetalle_repuesto['nombre_repuesto']); ?><input type='hidden' value='<?php print($midetalle_repuesto['id_repuesto']); ?>' name='id_repuestos[]'></p></td>
            <!-- <td><p style='font-size:14px;'><?php print($midetalle_repuesto['cantidad']); ?></p><input type='hidden' name='cantidads[]' value='<?=$midetalle_repuesto['cantidad']?>'></td> -->
            <td><button class="btn btn-warning" onclick='borrar(t_<?php print($i); ?>)'>X</button></td>
          </tr>
      <?php 
        $i++; 
        }
      }//fin del if (existe == yes)
      ?>
    </table>
    <ol id='botonera'>
      <input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
      <li><input type='button'  class='incluir'  value='Incluir'  <?php  if($existe=='yes') print('disabled'); ?>></li>
      <li><input type='submit' onclick="return guardar()"  class='grabar' disabled='disabled' name='incluir'  id='incluir' value='Guardar'  <?php  if($existe=='yes') print('disabled'); ?>></li>
      <li><input type='button' class='buscar'   value='Buscar'  <?php  if($existe=='yes')	print('disabled');?>></li>
      <li><input type='submit' onclick="return guardar()" class='modificar' name='modificar' id='modificar'  value='Modificar' <?php  if($existe!='yes') print('disabled');  ?> ></li>
      <li><input type='submit'  name='eliminar'   value='Eliminar' <?php  if($existe!='yes')	print('disabled');?> ></li>
      <li><input type='submit'  class="cancelar" name='cancelar' value='Cancelar' <?php  if($existe!='yes') print('disabled');?> ></li>
    </ol>
    <!--ventana modal aqui-->
    <!--aqui estara la ventana modal-->
    <!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
    <div id="ventana_modal">
      <h1 id="tabla_modal">Lista de repuestos</h1>
      <div id="busqueda_modal">
        <label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
      </div>
      <div style="height:400px; overflow:auto;">
        <table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
          <tr>
            <th>Id</th>
            <th>Falla</th>
            <th>Modelo Unidad</th>
            <th>#</th>
          </tr>
          <?php foreach($fallas as $index => $lista): ?>
          <tr>
            <td><?php print($lista['idtadministracion_falla']); ?></td>
            <td><?php print($lista['descripcion']); ?></td>
            <td><?php print($lista['desc_mode']); ?></td>
            <td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
    <!--ciere de la ventana modal-->
  </form>
</div>
<?php if($msj){ ?>   <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>
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
  //cantidad = parseInt(document.getElementById("cantidad").value);
  //if(cantidad && repuesto_value){
  if(repuesto_value){
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
       //td1=tr.insertCell(1);   //insertar la segunta columna
       td1=tr.insertCell(1);   //insertar la tercera columna

       tr.setAttribute('id','t_'+i);
       td0.innerHTML ="<p style='font-size:14px;'>"+repuesto+"<input type='hidden' value='"+repuesto_value+"' name='id_repuestos[]'></p>";
       //td1.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidads[]' value='"+cantidad+"'>";
       td1.innerHTML = "<button type='button' class='btn btn-warning' onclick='borrar(t_"+i+")'>X</button>";
       i++;
    }else{
      crearMsj("Ya existe en la transacción");
    }
  }else{
    crearMsj("existe algun valor vacio");
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
    crearMsj("Debe solicitar al menos un repuesto");
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

