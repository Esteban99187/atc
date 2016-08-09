<?
@include_once("modelo/class_db.php");
@include_once("../modelo/class_db.php");
class rol extends db{

	private $cod_rol;			
	private $nombre_rol;			
	public function set_cod_rol($cod_rol){
					$this->cod_rol = htmlspecialchars($cod_rol,ENT_QUOTES);
			}
		public function set_nombre_rol($nombre_rol){
					$this->nombre_rol = htmlspecialchars($nombre_rol,ENT_QUOTES);
			}
		 
	
	
	
	
	public function registrar(){
				
		return parent::ejecutar("INSERT INTO rol (cod_rol,nombre_rol) VALUES ('$this->cod_rol','$this->nombre_rol')");
	}
	public function listar(){
		return parent::ejecutar("SELECT cod_rol,nombre_rol FROM rol");
	}
	public function consultar(){
		
		
	return parent::ejecutar("SELECT cod_rol,nombre_rol FROM rol WHERE cod_rol='$this->cod_rol'");
		
		
	}
	
		public function buscar(){
	return parent::ejecutar("SELECT cod_rol,nombre_rol FROM rol WHERE (cod_rol LIKE '%$this->cod_rol%') AND (nombre_rol LIKE '%$this->nombre_rol%') ");
	}
	
	
	
	public function eliminar(){
		return parent::ejecutar("DELETE FROM rol WHERE cod_rol='$this->cod_rol'");
	}
	
	public function eliminar_por($por,$id){
		return parent::ejecutar("DELETE FROM rol WHERE $por='$id'");
	}
	public function consulta_por($por,$id){
		return parent::ejecutar("SELECT * FROM rol WHERE $por='$id'");
	}
	public function ultimo_id(){
		
		parent::ejecutar("SELECT MAX(cod_rol) AS id FROM rol");
		$ultimo_id=$this->row();
		return $ultimo_id[0];
		}
	public function editar(){
		return parent::ejecutar("UPDATE rol SET cod_rol='$this->cod_rol',nombre_rol='$this->nombre_rol' WHERE cod_rol='$this->cod_rol'");
	
	}

	public function row(){
	
	return mysql_fetch_array ($this->res);
	
	}

}
?>
