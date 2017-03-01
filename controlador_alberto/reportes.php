<?php 
	if(isset($_POST["evento"]) && $_POST["evento"]=="GenerarMovimiento"){
		if(!empty($_POST['txtTipoReporte']) && !empty($_POST['txtPor']))
		{
			echo "<script> window.open('../reportes/rpmovimineto.php?tipomovimiento=".$_POST["txtPor"]."&tipo=".$_POST["txtTipoReporte"]."&fecha_desde=".$_POST["txtFechaDesde"]."&fecha_hasta=".$_POST["txtFechaHasta"]."') </script>";
		}
		else
		{
			echo "<script>alert('Los parametros \'Tipo de Reporte\' y \'Por\', no pueden quedar vacios')</script>";
		}
	}
?>