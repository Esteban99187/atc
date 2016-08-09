<?php

	include_once("../modelo/class_db.php");
	class equipo extends db
	{

		private $idunidad;
		private $serial_motor;
		private $placa;

		public function set_idunidad($idunidad)
		{
			$this->idunidad = htmlspecialchars($idunidad,ENT_QUOTES);
		}
		public function set_serial_motor($serial_motor)
		{
			$this->serial_motor = htmlspecialchars($serial_motor,ENT_QUOTES);
		}
		public function set_placa($placa)
		{
			$this->placa = htmlspecialchars($placa,ENT_QUOTES);
		}

		public function registrar()
		{
			return parent::ejecutar("INSERT INTO unidad (idunidad,serial_motor,placa) VALUES ('$this->idunidad','$this->serial_motor','$this->placa')");
		}
		public function listar()
		{
			return parent::ejecutar("SELECT idunidad,serial_motor,placa FROM unidad");
		}
		public function consultar()
		{
			return parent::ejecutar("SELECT idunidad,serial_motor,placa FROM unidad WHERE idunidad='$this->idunidad'");
		}
		public function buscar()
		{
			return parent::ejecutar("SELECT idunidad,serial_motor,placa FROM unidad WHERE (idunidad LIKE '%$this->idunidad%') AND (serial_motor LIKE '%$this->serial_motor%') AND (placa LIKE '%$this->placa%')  ");
		}
		public function eliminar()
		{
			return parent::ejecutar("DELETE FROM unidad WHERE idunidad='$this->idunidad'");
		}
		public function eliminar_por($por,$id)
		{
			return parent::ejecutar("DELETE FROM unidad WHERE $por='$id'");
		}
		public function consulta_por($por,$id)
		{
			return parent::ejecutar("SELECT * FROM unidad WHERE $por='$id'");
		}
		public function ultimo_id()
		{
			parent::ejecutar("SELECT MAX(idunidad) AS id FROM unidad");
			$ultimo_id=$this->row();
			return $ultimo_id[0];
		}
		public function editar()
		{
			return parent::ejecutar("UPDATE unidad SET idunidad='$this->idunidad',serial_motor='$this->serial_motor',placa='$this->placa' WHERE idunidad='$this->idunidad'");
		}
		public function row()
		{
			return mysql_fetch_array($this->res);
		}

	}

?>
