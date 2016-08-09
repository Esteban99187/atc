	<?php
	include_once('../modelo_alberto/clstrepuesto_lubricante.php');

	//registro del repuesto o lubricante
	$objRL= new clstrepuesto_lubricante(); 
	$objRL->id_repuesto= $_POST['id_repuesto'];
	$objRL->nombre_repuesto= $_POST['nombre_repuesto'];
	$objRL->tipo_repuesto= $_POST['tipo_repuesto'];
	$objRL->tipo_lubricante = $_POST["txtTipoLubricante"];
	$objRL->idunidad_medida = $_POST['idunidad_medida'];
	$objRL->stock_min = $_POST["stock_min"];
	$objRL->stock_max = $_POST["stock_max"];

	//si es lubricante entonces obtenemos la unidad de medida
	if($_POST['tipo_repuesto']=="2"){
	 	$objRL->idunidad_medida = $_POST['idunidad_medida'];
	}else{
	  	$objRL->idunidad_medida = 0;
	}

	//registro del la transaccion del repuesto
	function transaccion($idBuscado=1,$id_A_buscar="",$tipoOperacion=2){
		@include('../modelo_alberto/clstdetalle_unidades_repuesto.php');

		$objDetalleUnidades= new clstdetalle_unidades_repuesto();
		//creamos el for para la transaccion
		//eliminamos todo primero
		if($idBuscado==1){
			$objDetalleUnidades->id_repuesto= $_POST['id_repuesto_original'];//$_POST['id_repuesto'];
		}else{
			$objDetalleUnidades->id_repuesto= $id_A_buscar;
		}
		if($tipoOperacion=2)
			$objDetalleUnidades->eliminar();

		for($i=0; $i<count($_POST['idmodelo_unidads']); $i++){
			$objDetalleUnidades->idmodelo_unidad= $_POST['idmodelo_unidads'][$i];
			
			$objDetalleUnidades->cantidad= $_POST['cantidads'][$i];
			$objDetalleUnidades->kmax= $_POST['kmaxs'][$i];
			$objDetalleUnidades->kmin= $_POST['kmins'][$i];
			$objDetalleUnidades->estatus='1'; 

			//incluimos en la transaccion
			$objDetalleUnidades->incluir();
		}
	}

	if($_POST['incluir']){
		if($dato = $objRL->buscarPor($_POST['nombre_repuesto'],"nombre_repuesto")){
			transaccion(1,$_POST['id_repuesto']);
		}else{
			if($objRL->incluir()){
				$ultimoRepuesto = $objRL->buscarUltimo("trepuesto_lubricante","id_repuesto");

				@include('../modelo_alberto/clstdetalle_unidades_repuesto.php');

				$objDetalleUnidades= new clstdetalle_unidades_repuesto();
				$objDetalleUnidades->id_repuesto= $ultimoRepuesto;
				for($i=0; $i<count($_POST['idmodelo_unidads']); $i++){
					$objDetalleUnidades->idmodelo_unidad= $_POST['idmodelo_unidads'][$i];
					
					$objDetalleUnidades->cantidad= $_POST['cantidads'][$i];
					$objDetalleUnidades->kmax= $_POST['kmaxs'][$i];
					$objDetalleUnidades->kmin= $_POST['kmins'][$i];
					$objDetalleUnidades->estatus='1'; 

					//incluimos en la transaccion
					$objDetalleUnidades->incluir();
				}

				
				$msj = 'Registrado exitosamente';
			}else{
				$msj = 'No se pudo Registrar';
			}
		}
	}

	if($_POST['incluir2']){
		transaccion();
		$msj = "Actulizado exitosamente";
	}

	if($_POST['buscar']){
		if($rows = $objRL->buscar()){
			$existe = 'yes';
		 }else{ 
			$msj = 'No existe '; 
		}
	}

	if($_POST['modificar']){
		if($objRL->modificar()){
			$msj = 'Modificación exitosa';
		 }else{ 
		  	$msj = 'No se pudo modificar '; 
		}
	}

	if($_POST['eliminar']){
		if($objRL->eliminar()){
			$msj = 'Eliminación exitosa';
		 }else{ 
		  	$msj = 'No se pudo Eliminar '; 
		}
	}
	$Rls = $objRL->listar();
?>