<?php
	include_once('clsConexionPg.php');
	class clstadministracion_falla extends clsConexionPg {
		public $idtadministracion_falla,$idfalla,$idmodelo_unidad;
		public function incluir(){
			return $this->ejecutar("INSERT INTO tadministracion_falla(idfalla,idmodelo_unidad) VALUES('$this->idfalla','$this->idmodelo_unidad')");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tadministracion_falla WHERE idtadministracion_falla='$this->idtadministracion_falla'");
			return $this->arreglo();
		}
		//aqui buscaremos los repuestos administrados en la falla
		public function buscar_repuestos(){
			$this->ejecutar("SELECT tdetallefalla.* , trepuesto_lubricante.tipo_repuesto, trepuesto_lubricante.nombre_repuesto
				FROM tdetallefalla, trepuesto_lubricante
				WHERE tdetallefalla.idmodelo_unidad =  '$this->idmodelo_unidad'
				AND tdetallefalla.idfalla =  '$this->idfalla'
				AND tdetallefalla.id_repuesto = trepuesto_lubricante.id_repuesto
				AND trepuesto_lubricante.tipo_repuesto =  '1' ");
			return $this->matriz();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE tadministracion_falla SET idfalla='$this->idfalla',idmodelo_unidad='$this->idmodelo_unidad' WHERE idtadministracion_falla='$this->idtadministracion_falla' ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM tadministracion_falla WHERE idtadministracion_falla='$this->idtadministracion_falla'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tadministracion_falla");
			return $this->matriz();
		}
		public function listarFallas(){
			$this->ejecutar("SELECT af.idtadministracion_falla, f.idfalla, f.descripcion, mu.desc_mode 
			FROM tadministracion_falla AS af 
			INNER JOIN tfalla AS f ON af.idfalla = f.idfalla 
			INNER JOIN modelo_unidad mu ON af.idmodelo_unidad = mu.idmodelo_unidad 
			LEFT JOIN tdetallefalla AS df ON df.idfalla = af.idfalla AND df.idmodelo_unidad = af.idmodelo_unidad 
			GROUP BY af.idtadministracion_falla, f.idfalla, f.descripcion,mu.desc_mode ");
			return $this->matriz();
		}
		
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idtadministracion_falla) AS idtadministracion_falla  FROM tadministracion_falla");
			return $this->arreglo();
		}
	} 
?>