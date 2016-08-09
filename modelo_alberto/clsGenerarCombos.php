<?php 
	require_once("clsConexionPg.php");
	class CombosDinamicos extends clsConexionPg{
		function generarCombo($psSql,$psCampoClave,$pscampoDescripcion,$psSeleccionado="",$psMensaje="SELECCIONE UNA OPCIÓN"){
			$lsDatos="<option value=''>".$psMensaje."</option>";
			$this->ejecutar($psSql);
			while($laFila=$this->arreglo()){
				$lsSelected=($laFila[$psCampoClave]==trim($psSeleccionado))?"selected":" ";
				$lsDatos.="<option value='".$laFila[$psCampoClave]."' ".$lsSelected.">".trim($laFila[$pscampoDescripcion])."</option>";
			}
			echo $lsDatos;
		}
	}
?>