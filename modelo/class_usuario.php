<?
@include_once("modelo/class_db.php");
@include_once("../modelo/class_db.php");
class usuario extends db{

	private $cod_usuario;
	private $persona_cedula;
	private $rol_cod_rol;
	private $clave;

	public function set_cod_usuario($cod_usuario){
		$this->cod_usuario = htmlspecialchars($cod_usuario,ENT_QUOTES);
	}
	public function set_persona_cedula($persona_cedula){
		$this->persona_cedula = htmlspecialchars($persona_cedula,ENT_QUOTES);
	}
	public function set_rol_cod_rol($rol_cod_rol){
		$this->rol_cod_rol = htmlspecialchars($rol_cod_rol,ENT_QUOTES);
	}
	public function set_clave($clave){
		$this->clave = htmlspecialchars($clave,ENT_QUOTES);
	}

	public function registrar(){
		return parent::ejecutar("INSERT INTO usuario (cod_usuario,persona_cedula,rol_cod_rol,clave) VALUES ('$this->cod_usuario','$this->persona_cedula','$this->rol_cod_rol','$this->clave')");
	}
	public function listar(){
		return parent::ejecutar("SELECT cod_usuario,persona_cedula,rol_cod_rol,clave FROM usuario");
	}
	public function consultar(){
		return parent::ejecutar("SELECT cod_usuario,persona_cedula,rol_cod_rol,clave FROM usuario WHERE cod_usuario='$this->cod_usuario'");
	}
	public function buscar(){
		return parent::ejecutar("SELECT cod_usuario,persona_cedula,rol_cod_rol,clave FROM usuario WHERE (cod_usuario LIKE '%$this->cod_usuario%') AND (persona_cedula LIKE '%$this->persona_cedula%') AND (rol_cod_rol LIKE '%$this->rol_cod_rol%') AND (clave LIKE '%$this->clave%') ");
	}
	public function eliminar(){
		return parent::ejecutar("DELETE FROM usuario WHERE cod_usuario='$this->cod_usuario'");
	}
	public function eliminar_por($por,$id){
		return parent::ejecutar("DELETE FROM usuario WHERE $por='$id'");
	}
	public function consulta_por($por,$id){
		return parent::ejecutar("SELECT * FROM usuario WHERE $por='$id'");
	}
	public function ultimo_id(){
		parent::ejecutar("SELECT MAX(cod_usuario) AS id FROM usuario");
		$ultimo_id=$this->row();
		return $ultimo_id[0];
	}
	public function editar(){
		return parent::ejecutar("UPDATE usuario SET cod_usuario='$this->cod_usuario',persona_cedula='$this->persona_cedula',rol_cod_rol='$this->rol_cod_rol',clave='$this->clave' WHERE cod_usuario='$this->cod_usuario'");
	}

	public function editar_clave(){
		return parent::ejecutar("UPDATE usuario SET clave='$this->clave' WHERE persona_cedula='$this->cod_usuario'");
	}

	public function login(){
		$lsclave=sha1($this->clave);
		$frase = '$carballo$/';
		$lsclave=md5($lsclave.$frase);
		return parent::ejecutar("SELECT * FROM usuario WHERE cod_usuario='$this->persona_cedula' AND clave='$lsclave' ");
	}


	public function row(){
		return mysql_fetch_array ($this->res);
	}

}
?>
