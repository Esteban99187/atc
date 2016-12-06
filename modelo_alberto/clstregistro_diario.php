<?php
	include_once('clsConexionPg.php');
	class clstregistro_diario extends clsConexionPg {
		public $id_tregistro_diario,$placa_unidad,$kilometraje,$fecha,$id_chofer,$observacion;
		public function incluir() {
			return $this->ejecutar("INSERT INTO tregistro_diario VALUES('$this->id_tregistro_diario','$this->placa_unidad',$this->kilometraje,'$this->fecha',$this->id_chofer,'$this->observacion',$this->kilometraje_anterior)");
		}
		public function buscar() {
			$this->ejecutar("SELECT * FROM tregistro_diario WHERE id_tregistro_diario='$this->id_tregistro_diario'");
			return $this->arreglo();
		}
		//buscar registro diario
		public function buscar_registro_diario($miid_registro_diario) {
			$this->ejecutar("SELECT rd.*,ch.nombre1||' '||ch.nombre2 AS chofer FROM tregistro_diario rd INNER JOIN tchofer ch ON rd.id_chofer = ch.id_chofer WHERE rd.id_tregistro_diario ='$miid_registro_diario'");
			return $this->arreglo();
		}
		public function modificar() {
			return $this->ejecutar("UPDATE tregistro_diario SET placa_unidad='$this->placa_unidad',kilometraje='$this->kilometraje',fecha='$this->fecha',id_chofer='$this->id_chofer',observacion='$this->observacion',kilometraje_anterior='$this->kilometraje_anterior' WHERE id_tregistro_diario='$this->id_tregistro_diario' ");
		}
		public function eliminar() {
			return $this->ejecutar("DELETE FROM tregistro_diario WHERE placa_unidad='$this->placa_unidad'");
		}
		public function listar() {
			$this->ejecutar("SELECT *  FROM tregistro_diario");
			return $this->matriz();
		}
		public function traer_codigo() {
			$this->ejecutar("SELECT MAX(id_tregistro_diario) AS id_tregistro_diario  FROM tregistro_diario");
			return $this->arreglo();
		}
		//buscar kilometraje diario
		public function buscar_kilometraje_diario() {
			$this->ejecutar("SELECT * FROM tregistro_diario WHERE placa_unidad='$this->placa_unidad' ORDER BY kilometraje DESC LIMIT 1 ");
			return $this->arreglo();
		}
		//buscar datos de registro
	} 
?>