<?php
	/*inicia el captcha, probando no ser un robot*/
	session_start();
	@$dato = $_POST['dato'];


	if (isset($_POST['submit'])){
			/*si los datos ingrasados en el captcha procesede a verivicar el usuario y la contraseña*/		
			$REMOTE_ADDR = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
			$idUsuario = isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : null;
			require_once("../modelo/class_usuarios.php");
			require_once("../modelo/class_bitacora.php");
			require_once("../modelo/class_mensaje_movil.php");
			$b=new bitacora;
			$x=new usuariosex;
			$ml=new movil;
			date_default_timezone_set("America/Caracas");
		
			$datosLogin = array($_POST["login"],$_POST["pass"]);
			$check=$x->LoginUsuario($datosLogin);
			$tiempoSession = $x->ConfiguracionSistema('tiempoConexion');
			if($check){
				$_SESSION['login']=true;
				$datosUsuario = $x->RecibirDatosUsuario();
				$_SESSION["idUsuario"]=$datosUsuario[0];
				$_SESSION["nombre"]=$datosUsuario[1];
				$_SESSION["apellido"]=$datosUsuario[2];
				$_SESSION["idPerfil"]=$datosUsuario[3];
				$_SESSION["cedula"]=$datosUsuario[7];
				$_SESSION["idcliente"]=$datosUsuario[8];
				$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
				$_SESSION["tiempoSession"] = $tiempoSession;
				$_SESSION["ip"] = $REMOTE_ADDR;
				$x->ActualizarIntentos(0,$datosUsuario[0]);
				/* Verifica si el usuario a sido bloqueado*/
				if($datosUsuario[5] == 0)
				{

					echo '<script>window.location="../vista/session.php?av=16"</script>';
				}
				/*******************************************/
				/* Verifica si el usuario externo a sido aprobado por un analista de sistemas*/
				if($datosUsuario[5] == 2)
				{
					echo '<script>window.location="../vista/vista.php?url=Verificando"</script>';
				}
				/*******************************************/
				/* selecciona la vista de un usuario que ingresa por primera vez a la intranet*/
				else if($datosUsuario[6] == 1)
				{

					if($b->addActividad(8,13,$datosUsuario[0],'s',$_SESSION["ip"]))
					{
						if($ml->enviarMensaje($_POST["login"],'1'))
						{
							echo '<script>window.location="../vista/admin.php"</script>';
						}
					}
					
					//echo '<script>window.location="../vista/admin.php"</script>';

					//echo '<script>window.location="../vista/vista.php?url=Verificando"</script>';

					//echo '<script>window.location="../vista/vista.php?url=terminos-condiciones"</script>';
				}
				/******************************************************************************/
				/* selecciona el menu segun el tipo de usuaruio*/
				else if($datosUsuario[3] != 0)
				{
					if($b->addActividad(8,13,$datosUsuario[0],'s',$_SESSION["ip"]))
					{
						if($ml->enviarMensaje($_POST["login"],'1'))
						{
							echo '<script>window.location="../vista/admin.php"</script>';
						}
					}
				}
				/**********************************************/
				else
				{
					echo '<script>window.location="../vista/session.php?av=1"</script>';
				}
			}
			/* muestra al usuario el mensaje de que ha sido bloqueado*/
			else
			{
				//-------------------------------------------------
				$intentosUsuario = $x->IntentoFallidosUsuario($datosLogin[0]);
				$intentosConfiguracion = $x->ConfiguracionSistema('numeroIntentos');
				/*bloquea el usuario si ha excedido en numero de maximo de intentos fallidos de inicio de session*/
				if($intentosUsuario == $intentosConfiguracion)
				{
					$x->BloqueoUsuario($datosLogin[0]);
					$b->addActividad(10,13,$_POST["login"],'s',@$_SERVER[REMOTE_ADDR]);
					$ml->enviarMensaje(@$_SESSION["idUsuario"],'3');
					echo '<script>window.location="../vista/session.php?av=16"</script>';
				}
				/************************************************************************************************/
				else if($intentosUsuario <= $intentosConfiguracion)
				{
					$dato = $intentosUsuario + 1; 
					$x->ActualizarIntentos($dato,$datosLogin[0]);
					echo '<script>window.location="../vista/session.php?av=15"</script>';
				}
			}
	
	}
	/*sin de la validacion captcha*/
?>
