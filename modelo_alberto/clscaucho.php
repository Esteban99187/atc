<?php
	include_once('clsConexionPg.php');
	class clscaucho extends clsConexionPg {
		public $idcaucho,$idmarca,$idmedida,$rin;

		public function incluir() {
		 	return $this->ejecutar("INSERT INTO tcaucho(idmarcacaucho,idmedidacaucho,rin) VALUES('$this->idmarca','$this->idmedida','$this->rin')");
		}
		public function buscar() {
			$this->ejecutar("SELECT c.*,med.descripcion as medida,mar.descripcion as marca FROM tcaucho as c inner join tmedidacaucho as med on med.idmedida = c.idmedidacaucho inner join tmarcacaucho as mar on mar.idmarca = c.idmarcacaucho WHERE idcaucho='$this->idcaucho'");
			return $this->arreglo();
		}
		public function modificar() {
			return $this->ejecutar("UPDATE tcaucho SET idmedidacaucho='$this->idmedida',idmarcacaucho='$this->idmarca',rin='$this->rin' WHERE idcaucho='$this->idcaucho' ");
		}
		public function eliminar($estatus) {
			return $this->ejecutar("UPDATE tcaucho SET estatus = '$estatus' where idcaucho='$this->idcaucho'");
		}
		public function listar() {
			$this->ejecutar("SELECT c.*,med.descripcion as medida,mar.descripcion as marca FROM tcaucho as c inner join tmedidacaucho as med on med.idmedida = c.idmedidacaucho inner join tmarcacaucho as mar on mar.idmarca = c.idmarcacaucho");
			return $this->matriz();
		}
	}
?>