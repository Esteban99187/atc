<?php 
    include_once('../controlador_alberto/corordencompra.php');
    include_once("componentes_alberto.php");
?>
<div id='contenedor_formulario' >
    <div id='titulo_form'>Orden de Compra</div>
    <form action=''  id='formulario_maestro' method='POST'>
        <?php if(isset($_GET["accion"]) && !empty($_GET["accion"])){ ?>
            <?php if($_GET["accion"]=="comprar"): ?>
                <table class="table table-condensed table-bordered table-striped responsive">
                    <thead>
                        <tr>
                            <th width="145">
                                Nro
                            </th>
                            <th>
                                Marca
                            </th>
                            <th>
                                Modelo
                            </th>
                            <th>
                                Repuesto
                            </th>
                            <th>
                               Cantidad Aprobada para Compra
                            </th>
                        </tr>
                    </thead>
                    <tbody cl ass="detalle" id="transaccion">
                        <?php if($Repuestos) foreach($Repuestos as $index => $repuesto): ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="codigoDetalle[]" value="<?php echo $repuesto['iddetalle'] ?>"> <?php echo $index+1 ?>
                                </td>
                                <td>
                                    <?php echo $repuesto["marca"] ?>
                                </td>
                                <td>
                                    <?php echo $repuesto["modelo"] ?>
                                </td>
                                <td>
                                    <?php echo $repuesto["repuesto"] ?>
                                </td>
                                <td>
                                    <?php echo $repuesto["cantidadaprobada"] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="6">
                                Observación: <?php echo $Repuestos[0]["observacion"] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <button type="submit" name="guardarAceptado" onclick="chequearAprobacion(event)" value="<?php echo (isset($_GET['id']))?$_GET['id']:'' ?>" class="btn btn-success btn-sm btn-icon icon-left"> 
                                <i class="entypo-check"></i>
                                Procesar Compra
                            </button>
                            <button type="submit" name="volver" value="1" class="btn btn-danger btn-sm btn-icon icon-left"> 
                                <i class="entypo-back"></i>
                                Volver
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php }else{ ?>
        <div id='titulo_form'>Solicitudes Aceptadas</div>
        <table class="table table-condensed table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th width="145">
                        id de Solicitud
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                       Acción
                    </th>
                </tr>
            </thead>
            <tbody class="detalle" id="transaccion">
                <?php if($solicitudes): ?>
                <?php foreach($solicitudes as $index => $solicitud): ?>
                    <tr>
                        <td>
                            <?=$solicitud["idrequisicion"] ?>
                        </td>
                        <td>
                            <?=$solicitud["fecha"] ?>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="VerReporte(<?php echo $solicitud['idrequisicion'] ?>)" name="aceptar"  class="btn btn-success btn-sm btn-icon icon-left"> 
                                <i class="entypo-check"></i>
                                Ver Requisición
                            </a>
                            <button type="button" onclick="verFomularioCompra(<?php echo $solicitud['idrequisicion'] ?>)" name="GenerarCompra"   class="btn btn-info btn-sm btn-icon icon-left"> 
                                <i class="fa fa-money"></i>
                                Procesar Orden de Compra
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php } ?>
    </form>
</div>
<script type="text/javascript">
    function VerReporte(nro){
        window.open("../reportes/orden.php?nro="+nro);
    }
    function verFomularioCompra(nro){
        location.href="admin.php?url=ordencompra&accion=comprar&id="+nro;
    }
</script>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php };  ?>