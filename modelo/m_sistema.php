<?php
// Clase para el usuario y acceder a los datos del mismo

include_once("m_conexion.php");

class clsSistema extends clsConex{

	function clsSistema(){
		$this->clsConex();
	}

	public function mostrarDatos(){
		$sql = "SELECT s.mision,s.vision,s.logo,s.quienes_somos,s.obj_general,s.obj_especifico,s.abreviatura_sede, se.nom_sed FROM sistema as s INNER JOIN sede as se WHERE se.id_sed=s.id_sed";
		$tupla = $this->ejecuta($sql);
		return $this->ConverArray($tupla);
	}

	protected function ConverArray($rs){
		return $this->TraerArreglo($rs);
	}

}// fin de la clase

?>