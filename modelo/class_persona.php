<?
@include_once("modelo/class_db.php");
@include_once("../modelo/class_db.php");
class persona extends db{

	private $cedula;				
	private $nombres_per;			
	private $apellidos_per;			
	private $sexo_per;			
	private $correo_per;			
	private $telefono_movil_per;			
	private $direccion_habitacion_per;	
	public function set_cedula($cedula){
					$this->cedula = htmlspecialchars($cedula,ENT_QUOTES);
			}
		public function set_nombres_per($nombres_per){
					$this->nombres_per = htmlspecialchars($nombres_per,ENT_QUOTES);
			}
		public function set_apellidos_per($apellidos_per){
					$this->apellidos_per = htmlspecialchars($apellidos_per,ENT_QUOTES);
			}
		public function set_sexo_per($sexo_per){
					$this->sexo_per = htmlspecialchars($sexo_per,ENT_QUOTES);
			}
		public function set_correo_per($correo_per){
					$this->correo_per = htmlspecialchars($correo_per,ENT_QUOTES);
			}
		public function set_telefono_movil_per($telefono_movil_per){
					$this->telefono_movil_per = htmlspecialchars($telefono_movil_per,ENT_QUOTES);
			}
		public function set_direccion_habitacion_per($direccion_habitacion_per){
					$this->direccion_habitacion_per = htmlspecialchars($direccion_habitacion_per,ENT_QUOTES);
			}
		 
	
	
	
	
	public function registrar(){
				
		return parent::ejecutar("INSERT INTO persona (cedula,nombres_per,apellidos_per,sexo_per,correo_per,telefono_movil_per,direccion_habitacion_per) VALUES ('$this->cedula','$this->nombres_per','$this->apellidos_per','$this->sexo_per','$this->correo_per','$this->telefono_movil_per','$this->direccion_habitacion_per')");
	}
	
		public function registrar_2($p,$p1,$p2,$p3,$p4,$p5){
				
		return parent::ejecutar("INSERT INTO persona (cedula,nombres_per,apellidos_per,sexo_per) VALUES ('$p','$p1','$p2','$p3','$p4','$p5')");
	}
	
	public function listar(){
		return parent::ejecutar("SELECT cedula,nombres_per,apellidos_per,sexo_per,correo_per,telefono_movil_per,direccion_habitacion_per FROM persona");
	}
	
	
	
	public function consultar(){
		
		
	return parent::ejecutar("SELECT cedula,nombres_per,apellidos_per,sexo_per,correo_per,telefono_movil_per,direccion_habitacion_per FROM persona WHERE cedula='$this->cedula'");
		
		
	}
	
	public function consultar_p(){
		
		
	return parent::ejecutar("SELECT cedula,nombres_per,apellidos_per,sexo_per,correo_per,telefono_movil_per,direccion_habitacion_per FROM persona WHERE cedula='$this->cedula'");
		
		
	}
	
	public function consultame($codigo){
		return parent::ejecutar("SELECT * FROM persona as p, personal as pe WHERE  pe.cod_personal='$codigo' and p.cedula=pe.persona_cedula");
	}
	
		public function buscar(){
	return parent::ejecutar("SELECT cedula,nombres_per,apellidos_per,sexo_per,correo_per,telefono_movil_per,direccion_habitacion_per FROM persona WHERE (cedula LIKE '%$this->cedula%') AND (nombres_per LIKE '%$this->nombres_per%') AND (apellidos_per LIKE '%$this->apellidos_per%') AND (sexo_per LIKE '%$this->sexo_per%') AND (correo_per LIKE '%$this->correo_per%') AND (telefono_movil_per LIKE '%$this->telefono_movil_per%') AND (direccion_habitacion_per LIKE '%$this->direccion_habitacion_per%') ");
	}
	
	
	
	public function eliminar(){
		return parent::ejecutar("DELETE FROM persona WHERE cedula='$this->cedula'");
	}
	
	public function eliminar_por($por,$id){
		return parent::ejecutar("DELETE FROM persona WHERE $por='$id'");
	}
	public function consulta_por($por,$id){
		return parent::ejecutar("SELECT * FROM persona WHERE $por='$id'");
	}
	public function ultimo_id(){
		
		parent::ejecutar("SELECT MAX(cedula) AS id FROM persona");
		$ultimo_id=$this->row();
		return $ultimo_id[0];
		}
	public function editar(){
		return parent::ejecutar("UPDATE persona SET cedula='$this->cedula',nombres_per='$this->nombres_per',apellidos_per='$this->apellidos_per',sexo_per='$this->sexo_per',correo_per='$this->correo_per',telefono_movil_per='$this->telefono_movil_per',direccion_habitacion_per='$this->direccion_habitacion_per' WHERE cedula='$this->cedula'");
	
	}


public function editar_2(){
		return parent::ejecutar("UPDATE persona SET cedula='$this->cedula' WHERE cedula='$this->cedula'");
	
	}



	public function row(){
	
	return mysql_fetch_array ($this->res);
	
	}

}
?>
