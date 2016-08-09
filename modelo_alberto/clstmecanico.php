<?php
	include_once('clsConexionPg.php');
	class clstmecanico extends clsConexionPg {

		public $cedula,$nombre1,$nombre2,$apellido1,$apellido2,$sexo,$fecha_naci,$estado_civil,$id_parroquia,$direccion,$telefono,$correo,$estatus;

		public function incluir(){
			return $this->ejecutar("INSERT INTO tmecanico(cedula,nombre1,nombre2,apellido1,apellido2,sexo,fecha_naci,estado_civil,id_parroquia,direccion,telefono,correo) VALUES('$this->cedula','$this->nombre1','$this->nombre2','$this->apellido1','$this->apellido2','$this->sexo','$this->fecha_naci',$this->estado_civil,1,'$this->direccion','$this->telefono','$this->correo')");
		}
		public function buscar(){
			$this->ejecutar("SELECT tmecanico.*
			FROM tmecanico
			WHERE tmecanico.cedula = '$this->idmecanico'");
			return $this->arreglo();
		}
		public function listar_mecanico(){
			return $this->ejecutar("SELECT * FROM tmecanico");
		}
		//esto servira para buscar choferes asignados
		public function listar_chofer(){
			$this->ejecutar("SELECT  tpersona.*, tchofer.* FROM tpersona, tchofer WHERE tpersona.cedula = tchofer.cedula_chofer");
			return $this->matriz();
		}
		public function buscar_chofer($ced){
			$this->ejecutar("SELECT  tpersona.*, tchofer.* FROM tpersona, tchofer WHERE tpersona.cedula ='$ced' AND tpersona.cedula = tchofer.cedula_chofer");
			return $this->arreglo();
		}
		//Esto es para buscar choferes asignados
		public function buscar_choferes_asignados($ced){
			$this->ejecutar("SELECT tasignacion_unidad. * , tpersona. *
			FROM tasignacion_unidad, tpersona
			WHERE tasignacion_unidad.cedula_chofer='$ced' tasignacion_unidad.cedula_chofer = tpersona.cedula
			AND tasignacion_unidad.estatus = '1'");
			return $this->matriz();
		}
		public function listar_choferes_asignados(){
			$this->ejecutar("SELECT tasignacion_unidad. * , tpersona. *
			FROM tasignacion_unidad, tpersona
			WHERE tasignacion_unidad.cedula_chofer = tpersona.cedula
			AND tasignacion_unidad.estatus = '1'");
			return $this->matriz();
		}
		//cierre de las funciones de choferes
		public function modificar(){
			return $this->ejecutar("UPDATE tmecanico SET nombre1='$this->nombre1',nombre2='$this->nombre2',apellido1='$this->apellido1',apellido2='$this->apellido2',sexo='$this->sexo',fecha_naci='$this->fecha_naci',estado_civil='$this->estado_civil',id_parroquia=0,direccion='$this->direccion',telefono='$this->telefono',correo='$this->correo',estatus='$this->estatus' WHERE cedula='$this->cedula' ");
		}
		public function eliminar($estatus) {
			return $this->ejecutar("UPDATE tmecanico SET estatus = '$estatus' where idmecanico='$this->idmecanico'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmecanico");
			return $this->matriz();
		}
		
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idmecanico) AS cedula  FROM tmecanico");
			return $this->arreglo();
		}
		public function buscarLike($valor){
			$this->ejecutar("SELECT idmecanico,cedula, concat(cedula,' - ',nombre1,' ',apellido1) as mecanico FROM tmecanico where cedula ilike '%$valor%' or nombre1 ilike '%$valor%' or nombre2 ilike '%$valor%' or apellido1 ilike '%$valor%' or apellido2 ilike '%$valor%'");
			while($datos = $this->arreglo()) $data[] = $datos;
			return $data;
		}
	} 
 ?>