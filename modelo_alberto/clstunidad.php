<?php
	include_once('clsConexionPg.php');

	class clstunidad extends clsConexionPg {

		public $placa_unidad,$id_modelo,$id_tipo,$serial_motor,$serial_carroceria,$estatus;

		public function incluir(){

			return $this->ejecutar("INSERT INTO unidad VALUES('$this->placa_unidad','$this->id_modelo','$this->id_tipo','$this->serial_motor','$this->serial_carroceria','$this->estatus')");

		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM unidad WHERE placa='$this->placa_unidad'");
			return $this->arreglo();
		}

		//buscar el serial del motor a ver si existe

		public function buscar_serial_motor(){
			$this->ejecutar("SELECT * FROM unidad WHERE serial_motor='$this->serial_motor'");
			return $this->arreglo();
		}


		//buscar el serial de la carroceria
		public function buscar_serial_carroceria(){
			$this->ejecutar("SELECT * FROM unidad WHERE serial_carroceria='$this->serial_carroceria'");
			return $this->arreglo();
		}

		//buscar placa
		public function buscar_placa(){
			$this->ejecutar("SELECT * FROM unidad WHERE placa='$this->placa_unidad'");
			return $this->arreglo();
		}

		public function modificar(){
			return $this->ejecutar("UPDATE unidad SET id_modelo='$this->id_modelo',id_tipo='$this->id_tipo',serial_motor='$this->serial_motor',serial_carroceria='$this->serial_carroceria',estatus='$this->estatus' WHERE placa_unidad='$this->placa_unidad' ");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM unidad WHERE placa_unidad='$this->placa_unidad'");
		}
		public function listar(){
			$this->ejecutar("SELECT unidad. * , modelo_unidad.desc_mode AS modelo
				FROM unidad, modelo_unidad
				WHERE unidad.idmodelo_unidad = modelo_unidad.idmodelo_unidad");
			return $this->matriz();
		}

		public function buscar_unidad($miplaca){
			$this->ejecutar("SELECT unidad. * , modelo_unidad.desc_mode AS modelo
				FROM unidad, modelo_unidad
				WHERE unidad.placa = '$miplaca'
				AND unidad.idmodelo_unidad = modelo_unidad.idmodelo_unidad");
			return $this->matriz();
		}



	//esto es para listar las unidades que son asignadas ya a personas no se mostrara de manera general
		public function listar_unidades_asignadas(){
			$this->ejecutar("SELECT unidad. * , modelo_unidad.desc_mode AS modelo, tchofer.cedula, tchofer.nombre1, tchofer.nombre2
				FROM unidad, modelo_unidad, tasignacion_unidad, tchofer
				WHERE tasignacion_unidad.placa_unidad = unidad.placa
				AND tasignacion_unidad.cedula_chofer = tchofer.cedula
				AND unidad.idmodelo_unidad = modelo_unidad.idmodelo_unidad");
			return $this->matriz();
		}

		public function traer_codigo(){

			return $this->ejecutar("SELECT MAX(placa_unidad) AS placa_unidad  FROM unidad");
		}
	} 
?>