<?php 
	function firmas(){
		require_once("../modelo/clsPersonal.php");
		$objPersonal = new clspersonal;
		$firmantes = $objPersonal->buscarFirmantes();
		echo "<div class='row'>";
		for($i=1;$i<=count($firmantes);$i++){
			
			echo 
			"<div class='col-md-4' align='center'>
				__________________________________<br>".
				"<b>".$firmantes[$i-1]["personal"]."</b><br>".
				"<b>".$firmantes[$i-1]["cargo"]."</b><br>".
			"</div>";
		}
	}
?>