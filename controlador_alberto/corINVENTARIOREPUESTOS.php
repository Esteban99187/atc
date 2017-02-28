<?php 
	require_once("../modelo_alberto/clsInventario.php");
	$ObjInventario = new Inventario;
	
	if(isset($_GET["producto"]) && !empty($_GET["producto"])){
		$productoSelect = $ObjInventario->buscarHistorial($_GET["producto"]);
		$EntradasCant = $ObjInventario->EntradasHistorial($_GET["producto"]);
		$SalidasCant = $ObjInventario->SalidasHistorial($_GET["producto"]);
	}else{
		$productosTodos = $ObjInventario->listar("repuestos");
		foreach($productosTodos as $index => $producto){
			$msj .="<p>Los siguientes repuestos/lubricantes estan por debajo del mínimo:</p><br /><br />";
			if($producto['stock'] < $producto['stock_min'])
				$msj .="<span>Nombre: ".$producto['nombre_repuesto']." Stock: ".$producto['stock']."<br />";
			else
				$msj=NULL;
		}
	}
?>