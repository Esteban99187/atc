<?php

	include_once("../modelo/class_db.php");
	class servicio_equipo extends db
	{

		private $idservicio_unidad;
		private $nombre_equipo;
		private $cantidad_equipo;
		private $observacion_equipo;
		private $idunidad;

		public function set_idservicio_unidad($idservicio_unidad)
		{
			$this->idservicio_unidad = htmlspecialchars($idservicio_unidad,ENT_QUOTES);
		}
		public function set_nombre_equipo($nombre_equipo)
		{
			$this->nombre_equipo = htmlspecialchars($nombre_equipo,ENT_QUOTES);
		}
		public function set_cantidad_equipo($cantidad_equipo)
		{
			$this->cantidad_equipo = htmlspecialchars($cantidad_equipo,ENT_QUOTES);
		}
		public function set_observacion_equipo($observacion_equipo)
		{
			$this->observacion_equipo = htmlspecialchars($observacion_equipo,ENT_QUOTES);
		}
		public function set_idunidad($idunidad)
		{
			$this->idunidad = htmlspecialchars($idunidad,ENT_QUOTES);
		}

		public function registrar()
		{
			return parent::ejecutar("INSERT INTO servicio_unidad (idservicio_unidad,nombre_equipo,cantidad_equipo,observacion_equipo,idunidad) VALUES ('$this->idservicio_unidad','$this->nombre_equipo','$this->cantidad_equipo','$this->observacion_equipo','$this->idunidad')");
		}
		public function listar()
		{
			return parent::ejecutar("SELECT idservicio_unidad,nombre_equipo,cantidad_equipo,observacion_equipo,idunidad FROM servicio_unidad");
		}
		public function consultar()
		{
			return parent::ejecutar("SELECT idservicio_unidad,nombre_equipo,cantidad_equipo,observacion_equipo,idunidad FROM servicio_unidad WHERE idservicio_unidad='$this->idservicio_unidad'");
		}
		public function buscar()
		{
			return parent::ejecutar("SELECT idservicio_unidad,nombre_equipo,cantidad_equipo,observacion_equipo,idunidad FROM servicio_unidad WHERE (idservicio_unidad LIKE '%$this->idservicio_unidad%') AND (nombre_equipo LIKE '%$this->nombre_equipo%') AND (cantidad_equipo LIKE '%$this->cantidad_equipo%') AND (observacion_equipo LIKE '%$this->observacion_equipo%') AND (idunidad LIKE '%$this->idunidad%') ");
		}
		public function eliminar()
		{
			return parent::ejecutar("DELETE FROM servicio_unidad WHERE idservicio_unidad='$this->idservicio_unidad'");
		}
		public function eliminar_por($por,$id)
		{
			return parent::ejecutar("DELETE FROM servicio_unidad WHERE $por='$id'");
		}
		public function consulta_por($por,$id)
		{
			return parent::ejecutar("SELECT * FROM servicio_unidad WHERE $por='$id'");
		}
		public function ultimo_id()
		{
			parent::ejecutar("SELECT MAX(idservicio_unidad) AS id FROM servicio_unidad");
			$ultimo_id=$this->row();
			return $ultimo_id[0];
		}
		public function editar()
		{
			return parent::ejecutar("UPDATE servicio_unidad SET idservicio_unidad='$this->idservicio_unidad',nombre_equipo='$this->nombre_equipo',cantidad_equipo='$this->cantidad_equipo',observacion_equipo='$this->observacion_equipo',idunidad='$this->idunidad' WHERE idservicio_unidad='$this->idservicio_unidad'");
		}
		public function row()
		{
			return mysql_fetch_array($this->res);
		}

	}

?>
