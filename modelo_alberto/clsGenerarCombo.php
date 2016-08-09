	<?php 
	require_once("clsConexion.php");
	class CombosDinamicos extends clsConexion{
		function generarCombo($psSql,$psCampoClave,$pscampoDescripcion,$psMensaje=""){
			$lsDatos="<option value=''>".$psMensaje."</option>";
			$this->ejecutar($psSql);
			while($laFila=$this->arreglo()){
				$lsDatos.="<option value='".$laFila[$psCampoClave]."'>".trim($laFila[$pscampoDescripcion])."</option>";
			}
			echo $lsDatos;
		}
	}
?>