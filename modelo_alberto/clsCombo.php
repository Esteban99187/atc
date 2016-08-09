<?php
	include_once("clsConexionPg.php");
	//CLASE PARA CREAR LOS COMBOS DINAMICOS
	class clsCombo extends clsConexionPg {
		public $id, $tabla, $colu;
		//LISTAR PAISES
		public function listar_paises(){
			return parent::ejecutar("SELECT * FROM pais");
		}
		//esto es una busqueda dinamica
		public function buscar(){
			return parent::ejecutar("SELECT * FROM $this->tabla WHERE $this->colu='$this->id' ");
		}
		
		public function buscarFallas($idUnidad){
			$this->ejecutar("SELECT f.* 
			FROM tdetallefalla as df
			inner join tfalla as f on df.idfalla = f.idfalla
			where df.idmodelo_unidad = $idUnidad
			group by f.idfalla,f.descripcion,f.estatus");
			while($datum = $this->arreglo2()) $data[] = $datum;
			return $data;
		}
		public function buscarRepuesto($idFalla){
			$this->ejecutar("SELECT r.id_repuesto,r.nombre_repuesto,df.cantidad
			FROM tdetallefalla as df
			inner join trepuesto_lubricante as r on df.id_repuesto = r.id_repuesto
			where df.idfalla = $idFalla AND r.tipo_repuesto = 1
			group by r.id_repuesto,r.nombre_repuesto,df.cantidad");
			while($datum = $this->arreglo2()) $data[] = $datum;
			return $data;	
		}
		public function buscarModelos($idmarca){
			$this->ejecutar("SELECT * FROM tmodelo_repuesto where id_marca_repuesto = $idmarca and estatus = 1");
			while($datum = $this->arreglo2()) $data[] = $datum;
			return $data;	
		}
		public function buscarRepuestos($idmodelo){
			$this->ejecutar("SELECT * FROM trepuesto_lubricante where id_modelo_repuesto = '$idmodelo' and estatus = '1'");
			while($datum = $this->arreglo2()) $data[] = $datum;
			return $data;
		}
	}
?>