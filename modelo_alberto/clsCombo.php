<?php
	include_once("clsConexion.php");
	include_once("clsConexionPg.php");
	//CLASE PARA CREAR LOS COMBOS DINAMICOS
	class clsCombo extends clsConexion {
		//LISTAR PAISES
		public function listar_paises(){
			return $this->ejecutar("SELECT * FROM pais");
		}
		public $id, $tabla, $colu;
		//esto es una busqueda dinamica
		public function buscar(){
			return $this->ejecutar("SELECT * FROM $this->tabla WHERE $this->colu='$this->id' ");
		}

		public function row(){
			return mysql_fetch_array($this->res);
		}
		
		public function buscarFallas($idUnidad){
			$pgsql = new clsConexionPg();
			$pgsql->ejecutar("SELECT f.* 
			FROM tdetallefalla as df
			inner join tfalla as f on df.idfalla = f.idfalla
			where df.idmodelo_unidad = $idUnidad
			group by f.idfalla,f.descripcion,f.estatus");
			while($datum = $pgsql->arreglo2()) $data[] = $datum;
			return $data;
		}
		public function buscarRepuesto($idFalla){
			$pgsql = new clsConexionPg();
			$pgsql->ejecutar("SELECT r.id_repuesto,r.nombre_repuesto,df.cantidad
			FROM tdetallefalla as df
			inner join trepuesto_lubricante as r on df.id_repuesto = r.id_repuesto
			where df.idfalla = $idFalla AND r.tipo_repuesto = 1
			group by r.id_repuesto,r.nombre_repuesto,df.cantidad");
			while($datum = $pgsql->arreglo2()) $data[] = $datum;
			return $data;	
		}
		public function buscarRepuestoConFalla($idFalla,$idModeloUnidad){
			$pgsql = new clsConexionPg();
			$pgsql->ejecutar("SELECT r.id_repuesto,r.nombre_repuesto,
			CASE WHEN r.stock > dur.cantidad THEN dur.cantidad ELSE COALESCE(r.stock,0) END AS cantidad   
			FROM tdetallefalla as df
			INNER JOIN trepuesto_lubricante as r on df.id_repuesto = r.id_repuesto 
			INNER JOIN tdetalle_unidades_repuesto dur ON dur.id_repuesto = r.id_repuesto AND df.idmodelo_unidad = dur.idmodelo_unidad 
			where df.idfalla = $idFalla AND df.idmodelo_unidad = $idModeloUnidad AND r.tipo_repuesto = 1
			group by r.id_repuesto,r.nombre_repuesto,dur.cantidad");
			while($datum = $pgsql->arreglo2()) $data[] = $datum;
			return $data;	
		}

		public function buscarModelos($idmarca){
			$pgsql = new clsConexionPg();
			$pgsql->ejecutar("SELECT * FROM tmodelo_repuesto where id_marca_repuesto = $idmarca and estatus = 1");
			while($datum = $pgsql->arreglo2()) $data[] = $datum;
			return $data;	
		}
		public function buscarRepuestos($idmodelo){
			$pgsql = new clsConexionPg();
			$pgsql->ejecutar("SELECT * FROM trepuesto_lubricante where id_modelo_repuesto = '$idmodelo' and estatus = '1'");
			while($datum = $pgsql->arreglo2()) $data[] = $datum;
			return $data;
		}
	}
?>