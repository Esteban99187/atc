<?php
include_once('clsConexionPg.php');

class clsdetalle_registro_diario extends clsConexionPg {

	public $iddetalle_registrodiario,
		   $placa_unidad,
		   $idmodelo_unidad,
		   $id_repuesto,
		   $kminima,
		   $kmaxima,
		   $kactual,
		   $estatus_mantenimiento;

	public function incluir(){
		return $this->ejecutar("INSERT INTO detalle_registrodiario (placa_unidad,idmodelo_unidad,id_repuesto,kminima,kmaxima,kactual,estatus_mantenimiento) VALUES('$this->placa_unidad','$this->idmodelo_unidad','$this->id_repuesto','$this->kminima','$this->kmaxima','$this->kactual','$this->estatus_mantenimiento')");
	}
	public function buscar(){
		$this->ejecutar("SELECT * FROM detalle_registrodiario WHERE placa_unidad='$this->placa_unidad' AND idmodelo_unidad='$this->idmodelo_unidad' AND id_repuesto='$this->id_repuesto' ");
		return $this->arreglo();
	}
	public function modificar(){
		return $this->ejecutar("UPDATE detalle_registrodiario SET kactual='$this->kactual', estatus_mantenimiento='$this->estatus_mantenimiento' WHERE placa_unidad='$this->placa_unidad' AND idmodelo_unidad='$this->idmodelo_unidad' AND id_repuesto='$this->id_repuesto' ");
	}
	//actualizar el cambio de kilometraje
	public function cambio_kilometraje(){
		return $this->ejecutar("UPDATE detalle_registrodiario SET kactual='0', estatus_mantenimiento='0' WHERE placa_unidad='$this->placa_unidad' AND id_repuesto='$this->id_repuesto'");
	}
	public function eliminar(){
		return $this->ejecutar("DELETE FROM detalle_registrodiario WHERE iddetalle_registrodiario='$this->iddetalle_registrodiario'");
	}
	public function listar(){
		$this->ejecutar("SELECT *  FROM detalle_registrodiario");
		return $this->matriz();
	}
	public function traer_codigo(){
		$this->ejecutar("SELECT MAX(iddetalle_registrodiario) AS iddetalle_registrodiario  FROM detalle_registrodiario");
		return $this->matriz();
	}
	//buscar si la placa tiene pendientes por mantenimiento
	public function buscar_pendiente_manteniento($miplaca = '-1'){
		$this->ejecutar("SELECT * FROM detalle_registrodiario WHERE (placa_unidad='$miplaca' OR '$miplaca' = '-1') AND (estatus_mantenimiento='2' OR estatus_mantenimiento='1')");
		return $this->matriz();
	}

	public function cont(){
		return pg_num_rows($this->consulta);
	}

} 
?>