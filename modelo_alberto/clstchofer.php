<?php
include_once('clsConexion.php');

	class clstchofer extends clsConexion {

		public $cedula;
		public $nombre1;
		public $nombre2;
		public $apellido1;
		public $apellido2;
		public $sexo;
		public $fecha_naci;
		public $estado_civil;
		public $id_parroquia;
		public $direccion;
		public $telefono;
		public $correo;
		public $estatus;
		public $grado_licencia;

		public function incluir(){

		 return parent::ejecutar("INSERT INTO tchofer VALUES('$this->cedula','$this->nombre1','$this->nombre2','$this->apellido1','$this->apellido2','$this->sexo','$this->fecha_naci','$this->estado_civil','$this->id_parroquia','$this->direccion','$this->telefono','$this->correo','$this->grado_licencia','$this->estatus')");

		 }
		public function buscar(){
			return parent::ejecutar("SELECT * FROM tchofer WHERE cedula='$this->cedula'");
		}




		public function listar_mecanico(){
			return parent::ejecutar("SELECT * FROM tchofer");
		}




		//esto servira para buscar choferes asignados
		public function listar_chofer(){
			return parent::ejecutar("SELECT * from tchofer");
		}


		public function buscar_chofer($ced){
			return parent::ejecutar("SELECT tchofer. * , pais.idpais, pais.desc_pais, estado.idestado, estado.desc_esta, municipio.idmunicipio, municipio.desc_muni, parroquia.idparroquia, parroquia.desc_parr
			FROM tchofer, pais, estado, municipio, parroquia
			WHERE tchofer.cedula =  '$this->cedula'
			AND tchofer.id_parroquia = parroquia.idparroquia
			AND parroquia.idmunicipio = municipio.idmunicipio
			AND municipio.idestado = estado.idestado
			AND estado.idpais = pais.idpais");
		}



		//Esto es para buscar choferes asignados
		public function buscar_choferes_asignados($ced){
			return parent::ejecutar("SELECT tasignacion_unidad. * , tchofer. *
			FROM tasignacion_unidad, tchofer
			WHERE tasignacion_unidad.cedula_chofer='$ced' tasignacion_unidad.cedula_chofer = tchofer.cedula
			AND tasignacion_unidad.estatus = '1'");
		}


		public function listar_choferes_asignados(){
			return parent::ejecutar("SELECT tasignacion_unidad. * , tchofer. *
			FROM tasignacion_unidad, tchofer
			WHERE tasignacion_unidad.cedula_chofer = tchofer.cedula
			AND tasignacion_unidad.estatus = '1'");
		}

		//cierre de las funciones de choferes




		public function modificar(){
			return parent::ejecutar("UPDATE tchofer SET nombre1='$this->nombre1',nombre2='$this->nombre2',apellido1='$this->apellido1',apellido2='$this->apellido2',sexo='$this->sexo',fecha_naci='$this->fecha_naci',estado_civil='$this->estado_civil',id_parroquia='$this->id_parroquia',direccion='$this->direccion',telefono='$this->telefono',correo='$this->correo',estatus='$this->estatus' , grado_licencia='$this->grado_licencia' WHERE cedula='$this->cedula'");
		}



		public function eliminar(){
		return parent::ejecutar("DELETE FROM tchofer WHERE cedula='$this->cedula'");
		 }
		public function listar(){
		return parent::ejecutar("SELECT *  FROM tchofer");
		 }
		public function row(){
		return  mysql_fetch_array($this->res);
		 }
		public function traer_codigo(){

			return parent::ejecutar("SELECT MAX(cedula) AS cedula  FROM tchofer");
		 }

		public function buscarLike($valor){
			$this->ejecutar("SELECT id_chofer as cedula,concat(nombre1,' ',apellido1) as conductor FROM tchofer where id_chofer like '%$valor%' or nombre1 like '%$valor%' or nombre2 like '%$valor%' or apellido1 like '%$valor%' or apellido2 like '%$valor%'");
			while($datos = $this->row()) $data[] = $datos;
			return $data;
		}
	} 
 ?>