<?php 
    include_once("../modelo_alberto/clsGenerarCombos.php");
    $comboPg = new CombosDinamicos;
    include_once('../controlador_alberto/corREQUISICION.php');
    include_once("componentes_alberto.php");
?>
<link rel="stylesheet" type="text/css" href="public/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="public/css/bootstrap-select.min.css">
<script type="text/javascript" src="public/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap-datepicker.es.min.js"></script>
<div id='contenedor_formulario' >
    <div id='titulo_form'>Solicitud de Compra / Requisición</div>
    <form action=''  id='formulario_maestro' method='POST'>
        <table width='100%' id='formulario_persona'>
            <tr>
                <td>Nro de Requisición: </td>
                <td><input type="text"  class="form-control" name="txtNroRequisicion" id="nro" readonly value="<?php if(isset($ultimoRegistro)) echo $ultimoRegistro ?>"></td>
                <td>Fecha: </td>
                <td><input type="text"  class="form-control" name="txtFechaEntrada" id="FechaEntrada"></td>
            </tr>
            <tr>
                <td>Solicitante: </td>
                <td style="position: relative">
                    <input type="text" name="txtSolicitante" class="form-control" id="mecanico" onkeyup="buscarMecanico(this.value)" placeholder="cédula, nombre del mecánico">
                    <div class="ajax" id="ajaxMecanico"></div>
                </td>
                <td>Departamento: </td>
                <td><span id="departamentoPedido">TALLER</span></td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td colspan="3">
                    <textarea rows="4" style="resize: none" name="txtObservacion" class="form-control"></textarea>
                </td>
            </tr>
        </table>

        <!--trabla transaccional aqui-->
        <br>
        <br>
        <div id='titulo_form'>Pedido</div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                
                    <th>
                        <p>Marca</p>
                        <select class="form-control" id="marca" onchange="buscarCombo(this.value,'modelo')">
                            <?php $comboPg->generarCombo("SELECT * FROM tmarca_repuesto where estatus = 1 ","id_marca_repuesto","nombre_marca_repuesto"); ?>
                        </select>
                    </th>
                    <th>
                        <p>Modelo</p>
                        <select class="form-control" id="modelo" onchange="buscarCombo(this.value,'repuesto')"></select>
                    </th>
                    <th>
                        <p>Repuesto</p>
                        <select class="form-control" id="repuesto"></select>
                    </th>
                    <th>
                        <p>Cantidad</p>
                        <input type='number' min="0" class="form-control" onkeypress="return false" class='solonumeros'  id="cantidad" >
                    </th>
                    <th align="center">
                        <input  type="button" class="btn btn-info" onclick="agregar()" value="+">
                    </th>
                </tr>
            </thead>
            <tbody class="detalle" id="transaccion">
                
            </tbody>
        </table>

        <ol id='botonera'>
            <li><input type='submit' name="btnAceptar" id="aceptar" class='btn btn-primary' value='Aceptar' ></li>
        </ol>
    </form>
</div>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php };  ?>

<!--descripcion de la transaccion-->
<script type="text/javascript">
    var i = 0;
    ta=document.getElementById("transaccion"); 
    function eliminar(td) {
        tr = td.parentNode;
        tbody = tr.parentNode;
        tr.remove(td);
        //if(tbody.rows.length<=0) $("#aceptar").prop("disabled",true);
    }
    function agregar(){
        //transaccion
        combo = document.getElementById("repuesto");
        marca = document.getElementById("marca");
        modelo = document.getElementById("modelo");
        nombreMarca = marca.options[marca.selectedIndex].text;
        nombreModelo = modelo.options[modelo.selectedIndex].text;

        //repuesto
        repuesto = combo.options[combo.selectedIndex].text;
        repuesto = repuesto.split("-");
        repuesto = repuesto[0];
        repuesto_value = combo.value;
        //cantidad del repuesto
        cantidad = parseInt(document.getElementById("cantidad").value);


        if(cantidad && repuesto_value){
            comprobacion = comprobar(repuesto_value);

            if(comprobacion==0){
                tr=ta.insertRow(-1);  //insertar una fila
                td0=tr.insertCell(0);  // insertar una columna
                td1=tr.insertCell(1);   //insertar la segunta columna
                td2=tr.insertCell(2);   //insertar la tercera columna
                td3=tr.insertCell(3);   
                td4=tr.insertCell(4);   

                tr.setAttribute('id','t_'+i);
                td0.innerHTML="<p style='font-size:14px;'>"+nombreMarca+"</p>";
                td1.innerHTML="<p style='font-size:14px;'>"+nombreModelo+"</p>";
                td2.innerHTML ="<p style='font-size:14px;'>"+repuesto+"<input type='hidden' class='hiddenRepuesto' value='"+repuesto_value+"' name='id_repuestos[]'></p>";
                td3.innerHTML="<p style='font-size:14px;'>"+cantidad+"</p><input type='hidden' name='cantidad[]' value='"+cantidad+"'>";
                td4.innerHTML = "<button type='button' onclick='eliminar(this.parentNode)' class='btn btn-danger'>X</button>";

                document.getElementById("repuesto").value="";
                document.getElementById("cantidad").value = 0;
                i++;
            }else{
                crearMsj("Este Producto ya está Seleccionado");
                limpiarTransaccion();
            }

        }else{
            crearMsj("existe algun valor vacio");
        }


    }
    function limpiarTransaccion(){
        document.getElementById("repuesto").value="";
        document.getElementById("marca").value="";
        document.getElementById("modelo").value="";
        document.getElementById("cantidad").value = 0;
    }
    //cierre de la funcion agregar
    function comprobar(texto){
        error = 0;
        SelectsRepuestos = document.getElementsByClassName('hiddenRepuesto');
        for(sls=0;sls<SelectsRepuestos.length;sls++){
            if(SelectsRepuestos[sls].value==texto){
                error = 1;
                break;
            }
        }
        return error;
    }

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
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarM('+miobjeto2+')\'>'+miobjeto.mecanico+' </a>';
                }
                divAjaxM.style.display="block";
                divAjaxM.innerHTML=datosAjax;
            }else{
                divAjaxM.style.display="none";
                divAjaxM.innerHTML="";
            }
        });
    }
    function colocarM(objeto) {
        divAjaxM.style.display="none";
        divAjaxM.innerHTML="";
        document.getElementById("mecanico").value=objeto.mecanico;
    }
    function validarVacios(){
        
    }
    $('#FechaEntrada').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-2d',
        endDate: '-0d',
        language: "es",
        orientation: "top left",
        todayHighlight: true,
        autoclose: true
    });
</script>