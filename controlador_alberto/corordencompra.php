<?php 
    require_once("../modelo_alberto/clsSolicitud.php");
    $objSolicitud = new clsSolicitud;

    if(isset($_POST["guardarAceptado"]) && !empty($_POST["guardarAceptado"])) {
    	$objSolicitud->idsolicitud=$_POST["guardarAceptado"];
    	if($objSolicitud->guardarOrdenCompra()){
    		$objSolicitud->cambiarEstadoRequisicion(2,$_POST["guardarAceptado"]);
			echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=ordencompra&si=1'; </script>";
		}else{
			echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=ordencompra&si=0'; </script>";
		}
    	
    	
    }

    if(isset($_POST["volver"])) {
		echo "<script> location.href='".$_SERVER["PHP_SELF"]."?url=ordencompra'; </script>";
	}

    if(isset($_GET["accion"]) && $_GET["accion"]=="comprar" ){
		$Repuestos = $objSolicitud->buscarRequisicion("poraceptar",1,$_GET["id"]);

	}


	$solicitudes = $objSolicitud->buscarRequisicion("aceptadas",1);
?>