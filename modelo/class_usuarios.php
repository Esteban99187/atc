<?php
	require_once("../modelo/class_db.php");
	class usuariosex extends class_db
	{
		/* CHEQUEA SI EXISTE EL NRO. DE CEDULA */
		public function chequea_existencia($cedula)
		{
			$this->fconectar();
			$sql = "select * from usuarios where idusuario ='$cedula'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/* ------------------------*/
		/* REGISTRAR NUEVO USUARIO */	
		public function nuevo_usuario($datos)
		{
			$this->fconectar();
			$sql = "insert into usuarios (idusuario,cedula,nombre,apellido,telefono,correo,clave,tipo,fechaUltimaClave)VALUES('$datos[1]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]',now())";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function crearUsuarioPersonal($idUsuario,$idPerfil)
		{
			$this->fconectar();
			$sql = "select * from persona where cedula = '$idUsuario'";
			$query = $this->ffiltro($sql);
			while($per = $this->fproximo($query))
			{
				$datos = array($per["cedula"],$per["nombres_per"],$per["apellidos_per"],$per["telefono_movil_per"],$per["correo_per"],$per["cedula"],$idPerfil);
				$sql2 = "insert into usuarios (nombre_usuario,nombre,apellido,telefono,correo,clave,tipo,fechaUltimaClave,tipousuario)VALUES('$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]',now(),'i')";
				if($this->fejecutar($sql2))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		/* ------------------------*/
		/* EDITAR USUARIO USUARIOS */
		public function editar_usuario($datos,$id)
		{
			$this->fconectar();
			$sql = "update usuarios set nombre = '$datos[2]',apellido = '$datos[3]',telefono = '$datos[4]',correo = '$datos[5]', clave = '$datos[6]' where idusuario = '$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function editar_usuario2($datos,$id)
		{
			$this->fconectar();
			$sql = "update usuarios set telefono='$datos[0]', correo='$datos[1]' where idusuario = '$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function NuevaClave($datos,$id)
		{
			$frase = '$carballo$/';
			$lsclave=sha1($datos[0]);
			$lsclave=md5($lsclave.$frase);
			$this->fconectar();
			
			$NuevaClave=sha1($datos[1]);        
			$NuevaClave=md5($NuevaClave.$frase);
			$this->fconectar();
			$sql = "update usuarios set clave='$NuevaClave' where idusuario = '$id' and clave='$lsclave' ";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/* ------------------------*/
		/* ELIMINAR USUARIO USUARIOS */
		public function eliminar_usuario($id)
		{
			$this->fconectar();
			$sql = "delete from usuarios where idusuario = '$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/* ------------------------*/
		/* muestra datos al pulsar el boton seleccionar, ejemplo: en el listar de bloque y desbloque de usuario externo */
		public function recibir_datos($buscar)
		{
			$this->fconectar();
			$sql = "select * from usuarios, persona, departamento where idusuario = '$buscar' and usuarios.cedula=persona.cedula and persona.iddepartamento=departamento.iddepartamento";
			$consulta = $this->ffiltro($sql);
			$listo = false;
			while($get = $this->fproximo($consulta))
			{
				$this->getdatos = array($get["nombre"],$get["nombre"],$get["apellido"],$get["telefono"],$get["correo"],$get["clave"],$get["idusuario"],$get["cedula"],$get["desc_depa"]);
				$listo=true;
			}
			return $listo;
		}
		public function getdatos_array()
		{
			return $this->getdatos;
		}
		/*****************************************************************************************************************/
		/* LISTAR USUARIOS */
		public function listar_usuarios()
		{
			$this->fconectar();
			$sql = "select * from tperfiles as pr INNER JOIN usuarios as us ON pr.idPerfil = us.tipo INNER JOIN persona as prs ON us.cedula = prs.cedula";
			$consulta = $this->ffiltro($sql);
			$nro = 0;
			while($p = $this->fproximo($consulta))
			{
				$nro++;
				echo '<tr>
				<td>'.$nro.'</td><td>'.$p["nacionalidad"].'-'.$p["cedula"].'</td><td>'.strtoupper($p["nombre"].' '.$p["apellido"]).'</td><td>'.strtoupper($p["perfil"]).'</td>
				</tr>';
			}
		}
		/*lista los usuarios internos que estan es el estatus de desactivado*/
		public function listar_usuarios_desactivados()
		{
			$this->fconectar();
			$sql = "select * from persona as pr INNER JOIN usuarios as us ON us.cedula = pr.cedula WHERE us.status = '0'  and idPerfil NOT IN ('11')";
			$consulta = $this->ffiltro($sql);
			$nro = 0;
			while($p = $this->fproximo($consulta))
			{
				$nro++;
				$id = $p["idusuario"];
				$ci = $p["cedula"];
				echo "<tr><td>".$nro."</td><td>".strtoupper($p["idusuario"])."</td><td>".$p['cedula']."</td><td>".strtoupper($p['nombre'])."</td><td>".strtoupper($p['apellido'])."</td><td><a  href=javascript:activar('$id','$ci')><i class='glyphicon glyphicon glyphicon-share-alt'></i></a></td></tr>";
			}
		}
		/********************************************************************/
		/*lista los usuarios externos que estan es el estatus de desactivado*/
		public function listar_usuariosex_bloqueados()
		{
			$this->fconectar();
			$sql = "select * from usuarios where status = '0' and idPerfil='11'";
			$consulta = $this->ffiltro($sql);
			$nro = 0;
			while($p = $this->fproximo($consulta))
			{
				$nro++;
				$id = $p["idusuario"];
				$ci = $p["cedula"];
				echo "<tr><td>".$nro."</td><td>".strtoupper($p["idusuario"])."</td><td>".$p['cedula']."</td><td>".strtoupper($p['nombre'])."</td><td>".strtoupper($p['apellido'])."</td><td><a  href=javascript:desbloquear('$id','$ci')><i class='glyphicon glyphicon glyphicon-share-alt'></i></a></td></tr>";
			}
		}
		/*********************************************************************/
		public function DesbloquearUsuariosExternos($id,$ci)
		{
			$this->fconectar();
			$frase = '$carballo$/';
			$lsclave=sha1($ci);
			$lsclave=md5($lsclave.$frase);
			$sql ="update usuarios set primeravez = '1', status='1', intentosFallidos='0', clave='$lsclave' where idusuario='$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/* ------------------------*/
		/*incia sesion verificando que el usuario existes y que la contraseña ingresada para dicho usuario coincide con la registrada*/
		public function LoginUsuario($datos){
			$this->fconectar();
			$frase = '$carballo$/';
			$lsclave=sha1($datos[1]);
			$lsclave=md5($lsclave.$frase);
			$sql = "select * from usuarios where (idusuario ='$datos[0]' and clave='$lsclave')";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);

			if($existe > 0){
				while($showDatos = $this->fproximo($consulta)){
					$this->datosLogin = array($showDatos["idusuario"],$showDatos["nombre"],$showDatos["apellido"],$showDatos["idPerfil"],$showDatos["intentosFallidos"],$showDatos["status"],$showDatos["primeravez"],$showDatos["cedula"],$showDatos["idcliente"]);
				}
				return true;
			}else{
				return false;
			}
		}
		/*******************************************************************************************************************************/
		public function IntentoFallidosUsuario($login)
		{
			$this->fconectar();
			$sql="Select intentosFallidos from usuarios where idusuario = '$login'";
			$query=$this->ffiltro($sql);
			while($dato = $this->fproximo($query))
			{
				$intentosusuario = $dato["intentosFallidos"];
			}
			return $intentosusuario;
		}
		public function ConfiguracionSistema($datos)
		{
			$this->fconectar();
			$sql="select ".$datos." from tconfiguracion where idConfiguracion = '1'";
			$query = $this->ffiltro($sql);
			while($dato = $this->fproximo($query))
			{
				$resultado = $dato["".$datos.""];
			}
			return $resultado;
		}
		public function ActualizarIntentos($dato,$login)
		{
			$this->fconectar();
			$sql = "update usuarios set intentosFallidos = '$dato' where idusuario = '$login'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/*funcion que bloquea en accseso de usuarios internos al sistema*/
		public function BloqueoUsuario($login)
		{
			$this->fconectar();
			$sql = "update usuarios set status = '0' where idusuario = '$login'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/********************************************************/
		/*funcion que bloquea en accseso de usuarios externos al sistema*/
		public function BloqueoUsuarioexterno($login)
		{
			$this->fconectar();
			$sql = "update usuarios set status = '0' where idusuario = '$login'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/********************************************************/
		public function RecibirDatosUsuario()
		{
			return $this->datosLogin;
		}
		/* cambia la contraseña por una nueva */
		public function cambiarContrasena($datos,$contrasena,$contrasenaActual)
		{
			$this->fconectar();
			$sql ="select clave, fechaUltimaClave, idusuario from usuarios where idusuario = '$datos'";
			$query = $this->ffiltro($sql);
			while($result = $this->fproximo($query))
			{
				$fechaClave = $result["fechaUltimaClave"];
				$claveAnterior = $result["clave"];
				$numerousuario =$result["idusuario"];
				
				$frase = '$carballo$/';
				$claveacomparar=sha1($contrasenaActual);
				$claveacomparar=md5($claveacomparar.$frase);
				/*al ingrezar por primera vez cambia la contraseña, aqui comparamos la clave ingresada con la clave almacenada en la BD*/
				if($claveacomparar == $claveAnterior)
				{
					$sqlIn="insert into tcambiosclaveusuarios (idUsuario,fechaUsoClave,clave)values('$numerousuario','$fechaClave','$claveAnterior')";
					if($this->fejecutar($sqlIn))
					{
						$frase = '$carballo$/';
						$clavearegistrar=sha1($contrasena);
						$clavearegistrar=md5($clavearegistrar.$frase);
						$sqlUp = "update usuarios set clave = '$clavearegistrar' where idusuario = '$datos'";
						if($this->fejecutar($sqlUp))
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				}
				/**********************************************************************************************************/
				else
				{
					return false;
				}
			}
		}
		/**************************************/
		/*cambia el estatus de usuario nuevo a un usuario regular*/
		public function cambioPrimeravez($datos,$valor)
		{
			$this->fconectar();
			$sqlUp = "update usuarios set primeravez = '$valor' where idusuario = '$datos'";
			if($this->fejecutar($sqlUp))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/*********************************************************/
		/*ingresa las preguntas y respuestas secretas de un usuario que ingresa por primera vez*/
		public function preguntasUsuario($datos,$preguntas,$respuestas)
		{
			$this->fconectar();
			$sql ="select clave, fechaUltimaClave, idusuario from usuarios where idusuario = '$datos'";
			$query = $this->ffiltro($sql);
			$result = $this->fproximo($query);
			$numerousuario =$result["idusuario"];
			$sql = "insert into tpreguntaseguridad (idUsuario,pregunta,respuesta)values('$numerousuario','$preguntas','$respuestas')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		/***************************************************************************************/
		public function OlvidoContrasena($idUsuario)
		{
			$this->fconectar();
			$sql = "select * from tpreguntaseguridad where idUsuario = '$idUsuario'";
			$query=$this->ffiltro($sql);
			while($pre = $this->fproximo($query))
			{
				$preguntas[] = array($pre["pregunta"],$pre["respuesta"]);
			}
			return @$preguntas;
		}
		public function GeneradorClave()
		{
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
			$numerodeletras=5; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
				entre el rango 0 a Numero de letras que tiene la cadena */
			}
			$nuevaclave = strtoupper($cadena);
			return $nuevaclave;
		}
		public function ResetearUsuario($idUsuario,$datos)
		{	
			$this->fconectar();
			$sql ="select clave,fechaUltimaClave from usuarios where idusuario = '$idUsuario'";
			$query = $this->ffiltro($sql);
			while($result = $this->fproximo($query))
			{
				$fechaClave = $result["fechaUltimaClave"];
				$claveAnterior = $result["clave"];
				$sqlIn="insert into tcambiosclaveusuarios (idUsuario,fechaUsoClave,clave)values('$idUsuario','$fechaClave','$claveAnterior')";
				if($this->fejecutar($sqlIn))
				{
					$sqlUp = "update usuarios set clave = '$datos', primeravez = '1', status = '1' where idusuario= '$idUsuario'";
					if($this->fejecutar($sqlUp))
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
		}
		public function ActivarUsuario($id,$ci){
			$this->fconectar();
			$frase = '$carballo$/';
			$lsclave=sha1($ci);
			$lsclave=md5($lsclave.$frase);
			$sql ="update usuarios set primeravez = '1', status='1', intentosFallidos='0', clave='$lsclave' where idusuario='$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function traerPreguntas($id)
		{
			$this->fconectar();
			$sql = "select * from tpreguntaseguridad WHERE idUsuario = '$id'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta))
			{
				$preguntas[] = array($rs["pregunta"],$rs["respuesta"]);
			}
			return $preguntas;
		}
		public function hayPreguntas($id)
		{
			$this->fconectar();
			$sql = "select * from tpreguntaseguridad WHERE idUsuario = '$id'";
			$consulta = $this->ffiltro($sql);
			$cantidad = $this->fnum_registros($consulta);
			if($cantidad > 0){
				return true;
			}else{
				return false;
			}
		}
		/* FUNCIONES PARA TRANSACCIONES */
		public function IniciaTransaccion(){
			$this->fconectar();
			$pcSql="BEGIN";
			parent::fejecutar($pcSql);
		}
		public function RompeTransaccion(){
			$this->fconectar();
			$pcSql="ROLLBACK";
			parent::fejecutar($pcSql);
		}
		public function FinTransaccion(){
			$this->fconectar();
			$pcSql="COMMIT";
			parent::fejecutar($pcSql);
			parent::fdesconectar();
		}

	}
?>
