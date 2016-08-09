<?php 
    include_once("../modelo_alberto/clsGenerarCombos.php");
    $comboPg = new CombosDinamicos;
    include_once("componentes_alberto.php"); 
    include_once('../controlador_alberto/corunidad.php'); 
?>

<div id='contenedor_formulario' >
    <div id='titulo_form'>Unidad</div>
    <form action=''  id='formulario_maestro' method='POST'>
        <table width='100%' id='formulario_persona'>
        <tr>
            <td></td>
            <td><input type="hidden" name="idunidad" value="<?php if(isset($rows['idunidad'])) echo $rows['idunidad']; else echo '-1' ?>"></td>
        </tr>
        <tr>
           <td>Cod. Unidad</td>
           <td><input type='text'  style='width:80%; float:left;'maxlength="10" class='solovacio <?php if($existe!='yes') print('campo campoclave'); ?>'  name='idunidad' value='<?php print($rows["idunidad"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
       </tr>

       <tr>
           <td>Serial Motor</td>
           <td><input type='text' id="serial_motor" style='width:80%; float:left;' maxlength="24" class='letranumeros  <?php if($existe!='yes') print('campo campoclave'); ?>'  name='serial_motor' value='<?php print($rows["serial_motor"]); ?>' ><input type='submit' value='buscar' name='buscar' style='width:10%; display:none;' class='mibusqueda'></td>
       </tr>

       <tr>
           <td>Serial Carroceria</td>
           <td><input type='text' id="serial_carroceria" class='solovacio' maxlength="24"  name='serial_carroceria' value='<?php print($rows["serial_carroceria"]); ?>' ></td>
       </tr>

       <tr>
           <td>Placa</td>
           <td><input type='text' id="miplaca" class='letranumeros' maxlength="8" name='placa' value='<?php print($rows["placa"]); ?>' ></td>
       </tr>

       <tr>
           <td>Observaciones</td>
           <td><textarea class='solovacio' name='observaciones'><?php print($rows["observaciones"]); ?></textarea></td>
       </tr>

        <tr>
            <td>Modelo</td>
            <td>
                <select class='solovacio' name='idmodelo_unidad'>
                    <?php $comboPg->generarCombo("SELECT * FROM modelo_unidad","idmodelo_unidad","desc_mode",$rows["idmodelo_unidad"]) ?>
                </select>
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
                <li><input type='submit' class="cancelar"  name='cancelar'   value='Cancelar' <?php  if($existe!='yes') print('disabled');?> ></li>
            </ol>

            <!--ventana modal aqui-->
            <!--aqui estara la ventana modal-->
            <!--aqui crearemos la ventana modal, esta ventana se traera todos los datos al momento de buscar en un maestro-->
            <div id="ventana_modal" style="position:fixed !important; top:-200 !important;">
              <h1 id="tabla_modal">Lista de Unidades</h1>
              <div id="busqueda_modal">
                <label>Buscar:</label><input type="text" id="mibusqueda_modal" placeholder="Busqueda Rapida">
            </div>

            <div style="height:400px; overflow:auto;">
              <table width="100%" cellpadding="0" cellspacing="0" id="table_modal">
                <tr>
                  <th>IdUnidad</th>
                  <th>Serial Motor</th>
                  <th>Serial Carroceria</th>
                  <th>Placa</th>
                  <th>modelo</th>
                  <th>Buscar</th>
              </tr>
              <?php
              
              foreach($unidades as $index => $lista){ 
               ?>

               <tr>
                  <td><?php print($lista['idunidad']); ?></td>
                  <td><?php print($lista['serial_motor']); ?></td>
                  <td><?php print($lista['serial_carroceria']); ?></td>
                  <td><?php print($lista['placa']); ?></td>
                  <td><?php print($lista['modelo']); ?></td>
                  <td><input type="submit" value="buscar" name="buscar" class="busqueda"></td>

              </tr>
              <?php } ?>

          </table>
      </div>
  </div>
  <!--ciere de la ventana modal-->

</form>
</div>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php  }; ?>
