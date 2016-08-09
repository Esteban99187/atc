<?php
	include_once('clsConexionPg.php');

	class clstdetalle_unidades_repuesto extends clsConexionPg {
		public $idrepuesto_detalle,$idmodelo_unidad,$id_repuesto,$cantidad,$kmax,$kmin,$estatus;

		public function incluir(){
		 	return $this->ejecutar("INSERT INTO tdetalle_unidades_repuesto(idmodelo_unidad,id_repuesto,cantidad,kmax,kmin,estatus) 
		 		VALUES($this->idmodelo_unidad,$this->id_repuesto,$this->cantidad,$this->kmax,$this->kmin,$this->estatus)");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM tdetalle_unidades_repuesto WHERE idrepuesto_detalle='$this->idrepuesto_detalle'");
			return $this->matriz();
		}

		//buscar los datos de un lubricante
		public function buscar_datos_unidad_repuesto_lubricante(){
			$this->ejecutar("SELECT tdetalle_unidades_repuesto. * , trepuesto_lubricante.tipo_repuesto, trepuesto_lubricante.nombre_repuesto
			FROM tdetalle_unidades_repuesto, trepuesto_lubricante
			WHERE tdetalle_unidades_repuesto.idmodelo_unidad = '$this->idmodelo_unidad'
			AND tdetalle_unidades_repuesto.id_repuesto = trepuesto_lubricante.id_repuesto");
			return $this->matriz();
		}

		public function buscar_lubricantes(){
			$this->ejecutar("SELECT tdetalle_unidades_repuesto.* , trepuesto_lubricante.tipo_repuesto, trepuesto_lubricante.nombre_repuesto, unidad_medida.desc_unid_medi as unidad_medida
			FROM tdetalle_unidades_repuesto, trepuesto_lubricante, unidad_medida
			WHERE tdetalle_unidades_repuesto.idmodelo_unidad = $this->idmodelo_unidad
			AND tdetalle_unidades_repuesto.id_repuesto = trepuesto_lubricante.id_repuesto
			AND trepuesto_lubricante.tipo_repuesto='2' 
			AND trepuesto_lubricante.idunidad_medida = unidad_medida.idunidad_medida");
			return $this->matriz();
		}

		public function buscar_repuestos(){
			$this->ejecutar("SELECT tdetalle_unidades_repuesto. * , trepuesto_lubricante.tipo_repuesto, trepuesto_lubricante.nombre_repuesto , modelo_unidad.desc_mode
			FROM tdetalle_unidades_repuesto, trepuesto_lubricante, modelo_unidad
			WHERE tdetalle_unidades_repuesto.idmodelo_unidad = $this->idmodelo_unidad
			AND tdetalle_unidades_repuesto.idmodelo_unidad = modelo_unidad.idmodelo_unidad
			AND tdetalle_unidades_repuesto.id_repuesto = trepuesto_lubricante.id_repuesto
			AND trepuesto_lubricante.tipo_repuesto=1 ");
			return $this->matriz();
		}

		//buscar repuestos segun una falla
		public function buscar_repuestos_falla(){
			$this->ejecutar("SELECT trepuesto_lubricante. * , modelo_unidad. * , tdetallefalla. * ,tfalla.descripcion, tfalla.idfalla
			FROM tdetallefalla, trepuesto_lubricante, modelo_unidad, tfalla
			WHERE tdetallefalla.idmodelo_unidad = '$this->idmodelo_unidad'
			AND tdetallefalla.idmodelo_unidad = modelo_unidad.idmodelo_unidad
			AND tdetallefalla.id_repuesto = trepuesto_lubricante.id_repuesto
			AND tdetallefalla.idfalla = tfalla.idfalla");
			return $this->matriz();
		}

		//buscar unidades en repuesto
		public function buscar_unidades_repuestos(){
			$this->ejecutar("SELECT tdetalle_unidades_repuesto. * , trepuesto_lubricante.tipo_repuesto, trepuesto_lubricante.nombre_repuesto, modelo_unidad.desc_mode
			FROM tdetalle_unidades_repuesto, trepuesto_lubricante, modelo_unidad
			WHERE tdetalle_unidades_repuesto.id_repuesto =  '$this->id_repuesto'
			AND tdetalle_unidades_repuesto.id_repuesto = trepuesto_lubricante.id_repuesto
			AND tdetalle_unidades_repuesto.idmodelo_unidad = modelo_unidad.idmodelo_unidad");
			return $this->matriz();
		}

		public function modificar(){
			return $this->ejecutar("UPDATE tdetalle_unidades_repuesto SET idmodelo_unidad='$this->idmodelo_unidad',id_repuesto='$this->id_repuesto',cantidad='$this->cantidad',kmax='$this->kmax',kmin='$this->kmin',estatus='$this->estatus' WHERE idrepuesto_detalle='$this->idrepuesto_detalle' ");
		}
		public function eliminar(){
			return @$this->ejecutar("DELETE FROM tdetalle_unidades_repuesto WHERE id_repuesto='$this->id_repuesto'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tdetalle_unidades_repuesto");
			return $this->matriz();
		}
		
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idrepuesto_detalle) AS idrepuesto_detalle  FROM tdetalle_unidades_repuesto");
			return $this->arreglo();
		}
	} 
?>