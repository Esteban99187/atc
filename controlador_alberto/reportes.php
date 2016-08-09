<?php 
	if(isset($_POST["evento"]) && $_POST["evento"]=="GenerarMovimiento"){
		if($_POST["txtPor"]==1){ //reportes de entrada
			if($_POST["txtTipoReporte"]==3){ // por nro de entrada
				echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?&id=".$_POST["txtIdParametro"]."') </script>";
			}else{ //por parametros
				echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?&tipomovimiento=".$_POST["txtPor"]."&tipo=".$_POST["txtTipoReporte"]."&producto=".$_POST["codigo"]."&fecha=".$_POST["txtFecha"]."') </script>";
			}
			
		}else if($_POST["txtPor"]==2){//reportes de salida
			if($_POST["txtTipoReporte"]==3){// por nota de salida
				echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?&id=".$_POST["txtIdParametro"]."') </script>";
			}else{ //por parametros
				echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?&tipomovimiento=".$_POST["txtPor"]."&tipo=".$_POST["txtTipoReporte"]."&producto=".$_POST["codigo"]."') </script>";
			}
		}else if($_POST["txtPor"]==3){//reportes de historial de movimiento
			switch ($_POST["txtTipoReporte"]) {
				case '1': echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?tipomovimiento=1&tipo=1&fecha=".$_POST["txtFecha"]."') </script>"; break;
				case '2': echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?tipomovimiento=1&tipo=2&fecha=".$_POST["txtFecha"]."') </script>"; break;
				case '3': echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?tipomovimiento=2&tipo=1&fecha=".$_POST["txtFecha"]."') </script>"; break;
				case '4': echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?tipomovimiento=2&tipo=2&fecha=".$_POST["txtFecha"]."') </script>"; break;
				case '5': echo "<script> window.open('".base_url()."reportes/rpmovimineto.php?fecha=".$_POST["txtFecha"]."') </script>"; break;
			}
		}
	}
?>