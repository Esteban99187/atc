<?php
	require_once("class_db.php");
	class usuarios extends class_db{
		
	    /* CHEQUEA SI EXISTE EL NRO. DE CEDULA */
		public function chequea_existencia($cedula){
			$this->conectar();
			$sql = "select * from persona where cedula ='$cedula'";
			$consulta = $this->filtro($sql);
			$existe = $this->num_registros($consulta);
			if($existe > 0){
				return false;
			}else{
				return true;
			}
		}
		/* ------------------------*/			
		/* REGISTRAR NUEVO USUARIO */	
		public function nuevo_personal($datos){
			$this->conectar();
			$sql = "insert into personal(idPersonal,nacionalidad,nombre,apellido,fecha_naci,sexo,fecha_in,telefono,correo,direccion)VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[8]','$datos[9]','$datos[10]')";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}
		/* ------------------------*/
			/* ELIMINAR USUARIO USUARIOS */
		public function eliminar_personal($id,$estatus){
			$this->conectar();
			$sql = "update personal set status = '$estatus' where idPersonal = '$id'";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}

		public function editar_personal($datos,$id){
			$this->conectar();
			$sql = "update personal set nombre = '$datos[2]',apellido = '$datos[3]',telefono = '$datos[8]',correo = '$datos[9]',sexo = '$datos[5]', direccion = '$datos[10]', status='$datos[7]' where idPersonal = '$id'";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}
		/* muestra datos al pulsar el boton seleccionar, ejemplo: en el listar de bloque y desbloque de usuario */
		public function recibir_datos($buscar){
			$this->conectar();
			$sql = "select * from persona where cedula = '$buscar'";
			$consulta = $this->filtro($sql);
			while($get = $this->proximo($consulta)){
				$datos = array($get["nombres_per"],$get["apellidos_per"],$get["sexo_per"],$get["estatus_per"],$get["telefono_movil_per"],$get["correo_per"],$get["direccion_habitacion_per"]);
			}
			return $datos;
		}
		/********************************************************************************************************/
	
		/* LISTAR USUARIOS */
		public function listar_personal($ultimo,$tipo){
			$this->conectar();
			$sql = "select CONCAT(pe.nombre, ' ', pe.apellido) as nombrecompleto,pe.idPersonal,pe.nacionalidad,pe.status from personal as pe ";
			$consulta = $this->filtro($sql);
			$nro = 0;
			while($p = $this->proximo($consulta)){
			$nro++;
		if($p["status"]==0){
			
		echo '<tr style="color:red;">
        <td>'.$nro.'</td><td>'.$p["nacionalidad"].'-'.$p["idPersonal"].'</td><td>'.strtoupper($p["nombrecompleto"]).'</td><td align="center"><a href="?url=personal&edit='.$p["idPersonal"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restauracion('.$p["idPersonal"].',"personal")><i class="glyphicon glyphicon-share-alt"></i></a></td>
     	 </tr>';
	  
		}else{
		echo '<tr>
        <td>'.$nro.'</td><td>'.$p["nacionalidad"].'-'.$p["idPersonal"].'</td><td>'.strtoupper($p["nombrecompleto"]).'</td><td align="center"><a href="?url=personal&edit='.$p["idPersonal"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$p["idPersonal"].',"personal")><i class="glyphicon glyphicon-remove-sign"></i></a></td>
     	</tr>';
				}
			}
		}
		/* ------------------------*/
		public function crearUsuario($datos,$cargo){
			$this->conectar();
			$sql = "select * from cargos where idCargo = '$cargo'";
			$consulta=$this->filtro($sql);
			while($show = $this->proximo($consulta)){
			if(($show["nombre"]=='facilitador')OR($show["nombre"]=='inspector')){
			if($show["nombre"]=='facilitador'){
				$tipo = 4;
			}else if($show["nombre"]=='inspector'){
				$tipo = 3;
			}
			$sql = "insert into usuarios (nacionalidad,cedula,nombre,apellido,telefono,correo,clave,tipo,intentosFallidos,fechaUltimaClave,status)VALUES('$datos[1]','$datos[0]','$datos[2]','$datos[3]','$datos[8]','$datos[9]','$datos[0]','$tipo','2',now(),'1')";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
			}else{
				return false;
			}	
			
			}

		}
		/* IMPRIMIR LISTA DE USUARIOS PDF */
	
		public function revisionUso($id){
			$this->conectar();
			$sql = "select * from inspeccion as ins INNER JOIN cargaplanificacion as cp ON ins.idInspector = '$id' OR cp.idFacilitador = '$id'";
			$consulta = $this->filtro($sql);
			$existe = $this->num_registros($consulta);
			if($existe > 0){
				return false;
			}else{
				return true;
			}
		}
	}
?>
