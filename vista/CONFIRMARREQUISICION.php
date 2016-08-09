<?php 
    include_once('../controlador_alberto/corCONFIRMARREQUISICION.php');
    include_once("componentes_alberto.php");
?>
<div id='contenedor_formulario' >
    <?php $titulo = (isset($_GET["nro"]))?"Requisición Nro: ".$_GET["nro"]:""; ?>
    <div id='titulo_form'><?php echo (isset($titulo) && !empty($titulo))?$titulo:"Confirmación de Requisición"; ?></div>
    <form action='' id='formulario_maestro' method='POST' ENCTYPE="multipart/form-data">
        <?php if(isset($_GET["accion"]) && !empty($_GET["accion"])){ ?>
            <?php if($_GET["accion"]=="aceptar"): ?>
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
                               Cantidad Solicitada
                            </th>
                            <th>
                                Cantidad Aprobada
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
                                    <?php echo $repuesto["cantidad"] ?>
                                </td>
                                <td>
                                    <input type="number" name="txtCantidadAprobada[]" class="form-control cantAprobada" min="0" max="<?php echo $repuesto["cantidad"] ?>" onkeypress="return false" value="<?php echo $repuesto["cantidad"] ?>">
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
                        <font color="red"><b>Nota: para negar la aprobación de un producto debe colocar la "Cantidad Aprobada" en 0</b></font>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <button type="submit" name="guardarAceptado" onclick="chequearAprobacion(event)" value="<?php echo (isset($_GET['nro']))?$_GET['nro']:'' ?>" class="btn btn-success btn-sm btn-icon icon-left"> 
                                <i class="entypo-check"></i>
                                Guardar
                            </button>
                            <button type="submit" name="volver" value="1" class="btn btn-danger btn-sm btn-icon icon-left"> 
                                <i class="entypo-back"></i>
                                Volver
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($_GET["accion"]=="rechazar"): ?>
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
                               Cantidad Solicitada
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
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
                                    <?php echo $repuesto["cantidad"] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5">
                                Observación: <?php echo $Repuestos[0]["observacion"] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <label for="motivo">Motivo de Rechazo</label>
                        <textarea id="motivo" name="txtMotivo" class="form-control" placeholder="escriba el motivo del rechazo"></textarea>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right">
                            <button type="submit" name="guardarRechazado" value="<?php echo (isset($_GET['nro']))?$_GET['nro']:'' ?>" class="btn btn-success btn-sm btn-icon icon-left"> 
                                <i class="entypo-check"></i>
                                Aceptar
                            </button>
                            <button type="submit" name="volver" value="1" class="btn btn-danger btn-sm btn-icon icon-left"> 
                                <i class="entypo-back"></i>
                                Volver
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php }else{ ?>
        <div id='titulo_form'>Pedido</div>
        <table class="table table-condensed table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th width="145">
                        Nro de Requisición
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Solicitante
                    </th>
                    <th>
                        Estado
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
                            <?php echo $solicitud["idrequisicion"] ?>
                        </td>
                        <td>
                            <?php echo $solicitud["fecha"] ?>
                        </td>
                        <td>
                            <?php echo $solicitud["solicitante"] ?>
                        </td>
                        <td>
                            <?php echo ($solicitud["estatus"]==0)?"SOLICITADA":""; ?>
                        </td>
                        <td>
                            <button type="submit" name="aceptar" value="<?php echo $solicitud['idrequisicion'] ?>" class="btn btn-success btn-sm btn-icon icon-left"> 
                                <i class="entypo-check"></i>
                                Aceptar
                            </button>
                            <button type="submit" name="rechazar" value="<?php echo $solicitud['idrequisicion'] ?>"  class="btn btn-danger btn-sm btn-icon icon-left"> 
                                <i class="entypo-cancel"></i>
                                Rechazar
                            </button>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php }//fin del else ?>
    </form>
</div>
<?php if(isset($_GET["si"]) && $_GET["si"]==1){ ?> 
    <?php if(isset($_GET["r"])){ ?>
        <script> crearMsj("LA REQUISICIÓN FUE RECHAZADA EXITOSAMENTE"); </script> 
    <?php }else{ ?>
        <script> crearMsj("REQUISICIÓN CONFIRMADA CON EXITO"); </script> 
    <?php } ?>
<?php }; ?>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php };  ?>
<script type="text/javascript">
    function chequearAprobacion(e){
        cantidades = document.getElementsByClassName("cantAprobada");
        enCero = 0;
        for(var ca in cantidades){
            if(cantidades[ca].value==0){
                enCero++;
            }
        }
        if(cantidades.length == enCero){
            e.preventDefault();
            crearMsj("No se puede aprobrar con todas las cantidades en 0");
        }
    }    
</script>
