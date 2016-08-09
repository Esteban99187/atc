<?php 
    require_once("../modelo_alberto/clsSolicitud.php");
    require_once("../modelo_alberto/clsInventario.php");
    $objSolicitud = new clsSolicitud;
    $ObjInventario = new Inventario;

    if( isset($_POST["generarEntrada"]) && !empty($_POST["generarEntrada"]) ) {
    	$datosProductos = $objSolicitud->generarReporte($_POST["generarEntrada"]); //desde aqui podemos obtener los datos para cambiar los stock segun la cantidad aprobada
    	$objSolicitud->cambiarEstadoRequisicion('5',$_POST["generarEntrada"]);
    	foreach ($datosProductos as $index => $producto) {
    		$ObjInventario->idP = $producto["idrepuesto"];
    		$ObjInventario->cambiarStock("id_repuesto","trepuesto_lubricante",$producto["cantidadaprobada"],1);
    	}
    	$msj = "Inventario alimentado Exitosamente";
    }

    $solicitudes = $objSolicitud->buscarRequisicion("aceptadas",2);
?>