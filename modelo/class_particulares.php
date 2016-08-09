<?php
	require_once("class_datos.php");
	class usuarios extends clsDatos{
		
	    /* CHEQUEA SI EXISTE EL NRO. DE CEDULA */
		public function chequea_existencia($datos){
			$this->conectar();
			$sql = "select * from usuarios where cedula ='$datos'";
			$consulta = $this->filtro($sql);
			$existe = $this->num_registros($consulta);
			if($existe > 0){
				return true;
			}else{
				return false;
			}
		}
		/* ------------------------*/			
		/* REGISTRAR NUEVO USUARIO */	
		public function nuevo_particulares($datos){
			$this->conectar();
			$sql = "insert into particulares (idParticular,nacionalidad,nombre,apellido,fecha_naci,sexo,telefono,correo,direccion)VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}
		/* ------------------------*/
		/* EDITAR USUARIO USUARIOS */
		public function editar_particulares($datos,$id){
			$this->conectar();
			$sql = "update particulares set nombre = '$datos[2]',apellido = '$datos[3]',fecha_naci = '$datos[4]',sexo = '$datos[5]',telefono = '$datos[6]',telefono = '$datos[7]',direccion = '$datos[8]' where idParticular = '$id'";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}
		/* ------------------------*/
		/* ELIMINAR USUARIO USUARIOS */
		public function eliminar_particulares($id){
			$this->conectar();
			$sql = "delete from particulares where idParticular = '$id'";
			if($this->ejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}
		
		/* ------------------------*/
		/* EDITAR USUARIO USUARIOS */
		public function recibir_datos($buscar){
			$this->conectar();
			$sql = "select * from particulares where idParticular = '$buscar'";
			$consulta = $this->filtro($sql);
			$listo = false;
			while($get = $this->proximo($consulta)){
				$this->getdatos = array($get["nombre"],$get["apellido"],$get["fecha_naci"],$get["sexo"],$get["telefono"],$get["correo"],$get["direccion"]);
			$listo=true;
			}
			return $listo;
		}
		public function getdatos_array(){
			return $this->getdatos;
		}
		/* ------------------------*/
		/* LISTAR USUARIOS */
		public function listar_particulares($ultimo,$tipo){
			$this->conectar();
			if($tipo == 1 or $tipo == 0){
			$sql = "select * from particulares";
			}else if($tipo == 2){
			$sql = "select * from particulares where idParticular = '$ultimo'";
			}
			$consulta = $this->filtro($sql);
			$nro = 0;
			while($p = $this->proximo($consulta)){
			$nro++;
		if($ultimo == $p["idParticular"]){
			
		echo '<tr>
        <td><b>'.$nro.'</b></td><td><b>'.$p["nacionalidad"]."-".$p["idParticular"].'</b></td><td><b>'.strtoupper($p["nombre"].' '.$p["apellido"]).'</b></td><td align="center"><a href="?url=particulares&edit='.$p["idParticular"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$p["idParticular"].',"particulares")><i class="glyphicon glyphicon-remove-sign"></i></a></td>
      </tr>';
	  
		}else{
			echo '<tr>
        <td>'.$nro.'</td><td>'.$p["nacionalidad"]."-".$p["idParticular"].'</td><td>'.strtoupper($p["nombre"].' '.$p["apellido"]).'</td><td align="center"><a href="?url=particulares&edit='.$p["idParticular"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$p["idParticular"].',"particulares")><i class="glyphicon glyphicon-remove-sign"></i></a></td>
      </tr>';
				}
			}
		}
		/* ------------------------*/
		/* IMPRIMIR LISTA DE USUARIOS PDF */
	
		
	}
?>