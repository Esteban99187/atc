<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){

		include("../modelo_alberto/clsCombo.php");
		$combos = new clsCombo;
		$respuesta = array();
		$respuesta["error"] = true;
		$respuesta["respuesta"] = array();

		if(isset($_GET["peticion"]) && $_GET["peticion"]=="modelo"){
			
			$datos = $combos->buscarModelos($_GET["data"]);
			$tmp = array();
			if($datos){
				$respuesta["error"] = false;
				foreach($datos as $index => $data){
					$tmp["id"]=$data['id_modelo_repuesto'];
					$tmp["descripcion"]=$data['nombre_modelo_repuesto'];
					array_push($respuesta["respuesta"], $tmp);
				}
			}
		}

		if(isset($_GET["peticion"]) && $_GET["peticion"]=="repuesto"){
			
			$datos = $combos->buscarRepuestos($_GET["data"]);
			$tmp = array();
			if($datos){
				$respuesta["error"] = false;
				foreach($datos as $index => $data){
					$tmp["id"]=$data['id_repuesto'];
					$tmp["descripcion"]=$data['nombre_repuesto']."- stock:".$data["stock"];
					array_push($respuesta["respuesta"], $tmp);
				}
			}
		}

		if(isset($_GET["peticion"]) && $_GET["peticion"]=="buscarFallasModelo"){
			
			$datos = $combos->buscarFallas($_GET["data"]);
			$tmp = array();
			if($datos){
				$respuesta["error"] = false;
				foreach($datos as $index => $data){
					$tmp["id"]=$data['idfalla'];
					$tmp["descripcion"]=$data['descripcion'];
					array_push($respuesta["respuesta"], $tmp);
				}
			}
		}

		if(isset($_GET["peticion"]) && $_GET["peticion"]=="buscarRepuestoFalla"){
			
			$datos = $combos->buscarRepuesto($_GET["data"]);
			$tmp = array();
			if($datos){
				$respuesta["error"] = false;
				foreach($datos as $index => $data){
					$tmp["id"]=$data['id_repuesto'];
					$tmp["descripcion"]=$data['nombre_repuesto'];
					array_push($respuesta["respuesta"], $tmp);
				}
			}
		}

		if(isset($_GET["peticion"]) && $_GET["peticion"]=="buscarRepuestoConFalla"){
			
			$datos = $combos->buscarRepuestoConFalla($_GET["falla"],$_GET["modelounidad"]);
			$tmp = array();
			if($datos){
				$respuesta["error"] = false;
				foreach($datos as $index => $data){
					$tmp["id"]=$data['id_repuesto'];
					$tmp["descripcion"]=$data['nombre_repuesto'];
					$tmp["cantidad"]=$data['cantidad'];
					array_push($respuesta["respuesta"], $tmp);
				}
			}
		}

		
		echo json_encode($respuesta);
	}		
?>