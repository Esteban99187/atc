<?php 
    include_once('../controlador_alberto/corINVENTARIOREPUESTOS.php');
    include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
    
    <!-- esta tabla la mostramos cuando seleccinamos el historial de un producto -->
    <?php 
        if(isset($_GET["producto"]) && !empty($_GET["producto"])){   

    ?>

    <div id='titulo_form'>
        Historial de "<?php echo strtoupper($productoSelect[0]["nombre"]) ?>"
        <div class="pull-right"><a href="javascript:history.go(-1)" class="btn-sm btn-primary">Volver</a></div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs 12 ">
            <div class="jumbotron">
                <center>
                    <h1>Disponibles</h1>
                    <h1><?php echo $productoSelect[0]["stock"] ?></h1>
                </center>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs 12 ">
            <div class="jumbotron">
                <center>
                    <h1>Entradas</h1>
                    <h1><?php echo $EntradasCant ?></h1>
                </center>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs 12 ">
            <div class="jumbotron">
                <center>
                    <h1>Salidas</h1>
                    <h1><?php echo (!empty($SalidasCant))?$SalidasCant:0 ?></h1>
                </center>
            </div>
        </div>

    </div>
    
    <div id='titulo_form'>Historial </div>
        <table class="table table-condensed table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th>
                       Fecha
                    </th>
                    <th>
                        Tipo de Movimiento
                    </th>
                    <th>
                        Tipo de Transacción
                    </th>
                    <th>
                        Transacción Origen
                    </th>
                    <th>
                        Placa Unidad
                    </th>
                    <th width="145">
                        Cantidad
                    </th>
                </tr>
            </thead>
            <tbody class="detalle" id="transaccion">
                <?php if($productoSelect): ?>
                <?php foreach($productoSelect as $index => $productoS): ?>
                    <tr>
                        <td>
                            <?php echo $productoS["fecha"] ?>
                        </td>
                        <td>
                            <?php echo $productoS["tipo_movimiento"] ?>
                        </td>
                        <td>
                            <?php echo $productoS["tipo_transaccion"] ?>
                        </td>
                        <td>
                            <?php echo $productoS["transaccion_origen"] ?>
                        </td>
                        <td>
                            <?php echo $productoS["placa_unidad"] ?>
                        </td>
                        <td>
                            <?php echo $productoS["cantidad"] ?>
                        </td>
                        
                       
                    </tr>

                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    

    <?php
        }else{
    ?>
    <!-- de lo contrario mostraremos otros listado -->
    <div id='titulo_form'>Inventario de Repuestos</div>
    <form action=''  id='formulario_maestro' method='POST'>

        <div id='titulo_form'>Inventario</div>
        <table class="table table-condensed table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th width="145">
                        Nro
                    </th>
                    <th>
                        Repuesto / Lubricante
                    </th>
                    <th>
                       Disponible
                    </th>
                    <th>
                        Historial
                    </th>
                </tr>
            </thead>
            <tbody class="detalle" id="transaccion">
                <?php if($productosTodos): ?>
                <?php foreach($productosTodos as $index => $producto): ?>
                    <tr>
                        <td>
                            <?php echo intval($index + 1); ?>
                        </td>
                        <td>
                            <?php echo $producto["nombre_repuesto"] ?>
                        </td>
                        <td>
                            <?php echo intval($producto["stock"]) ?>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="verHistorial(<?php echo $producto["id_repuesto"] ?>)" class="btn btn-success btn-sm btn-icon icon-left">
                                <i class="entypo-check"></i>
                                Ver Historial
                            </a>
                            
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
    <?php } ?>
</div>
<script type="text/javascript">
function verHistorial(nro){
    location.href = window.location.href+="&producto="+nro;
}
</script>

<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php };  ?>
