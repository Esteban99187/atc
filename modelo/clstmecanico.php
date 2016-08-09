<?php
	include_once('clsConexionPg.php');
	class clstmecanico extends clsConexionPg {
		public $idmecanico,$cedula,$nombre1,$nombre2,$apellido1,$apellido2,$sexo,$fecha_naci,$estado_civil,$id_parroquia,$direccion,$telefono,$correo,$estatus;

		public function incluir(){
			return $this->ejecutar("INSERT INTO tmecanico(cedula,nombre1,nombre2,apellido1,apellido2,sexo,fecha_naci,estado_civil,id_parroquia,direccion,telefono,correo)
				VALUES('$this->cedula','$this->nombre1','$this->nombre2','$this->apellido1','$this->apellido2','$this->sexo',$this->fecha_naci::date,$this->estado_civil,1,'$this->direccion','$this->telefono','$this->correo')");
		}
		public function buscar(){
			return $this->ejecutar("SELECT * FROM tmecanico WHERE cedula='$this->cedula'");
		}
		public function listar_mecanico(){
			$this->ejecutar("SELECT * FROM tmecanico");
			return $this->matriz();
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
			return $this->ejecutar("UPDATE tmecanico SET nombre1='$this->nombre1',nombre2='$this->nombre2',apellido1='$this->apellido1',apellido2='$this->apellido2',sexo='$this->sexo',fecha_naci='$this->fecha_naci',estado_civil=$this->estado_civil,direccion='$this->direccion',telefono='$this->telefono',correo='$this->correo' WHERE idmecanico='$this->idmecanico' ");
		}
		public function eliminar($estatus) {
			return $this->ejecutar("UPDATE tmecanico SET estatus = '$estatus' where idmecanico='$this->idmecanico'");
		}
		public function listar(){
			$this->ejecutar("SELECT *  FROM tmecanico");
			return $this->matriz();
		}
		public function traer_codigo(){
			$this->ejecutar("SELECT MAX(idmecanico) AS idmecanico  FROM tmecanico");
			return $this->arreglo();
		}
	} 
?>