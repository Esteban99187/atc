<?php 
    include_once('../controlador_alberto/corORDENENTRADA.php');
    include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
    
    <div id='titulo_form'>Orden de Entrada</div>
    <form action=''  id='formulario_maestro' method='POST'>

        <div id='titulo_form'>Ordenes de Compra Aceptadas</div>
        <table class="table table-condensed table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th width="145">
                        Nro de Orden 
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
                            <?php echo $solicitud["idordencompra"] ?>
                        </td>
                        <td>
                            <?php echo $solicitud["fecha"] ?>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="mostrarReporte(<?php echo $solicitud["idordencompra"] ?>)" class="btn btn-success btn-sm btn-icon icon-left" style="text-transform: capitalize;">
                                <i class="entypo-check"></i>
                                Ver Orden de Compra
                            </a>
                            <button type="submit" name="generarEntrada" value="<?php echo $solicitud['idrequisicion'] ?>"  class="btn btn-info btn-sm btn-icon icon-left"> 
                                <i class="fa fa-money"></i>
                                Generar Entrada
                            </button>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
    </form>
</div>
<script type="text/javascript">
function mostrarReporte(nro){
    window.open("../reportes/ordencompra.php?nro="+nro);
}
</script>

<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php };  ?>