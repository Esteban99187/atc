<?php 
	require_once("../modelo/class_usuarios.php");
	$u = new usuariosex;
	$id= isset($_POST['id']) ? $_POST['id'] : null ;
	$preguntas = $u->OlvidoContrasena($id);
	$respuestas = $_POST["respuesta"];
	$nrespuestas = count($respuestas);
	$correctas=0;
	$incorrectas=0;
	for($i=0;$i<=$nrespuestas-1;$i++)
	{
		if($preguntas[$i][1] == $respuestas[$i])
		{
			$correctas ++;
		}
		elseif($preguntas[$i][1] != $respuestas[$i])
		{
			$incorrectas ++;
		}
	}
	if($u->recibir_datos($_POST["id"]))
	{
		$datosUsuario = $u->getdatos_array();
	}
	if($correctas > 1)
	{
		//~ $nuevaClave = $u->GeneradorClave();
		//~ if($u->ResetearUsuario($_POST["id"],$nuevaClave))
		//~ {
			//~ //----- ENVIO NUEVA CONTRASEÑA POR CORREO -------//
			//~ // email de destino
			//~ $email = "".$datosUsuario[3]."";
			//~ // asunto del email
			//~ $subject = "RECUPERAR CONTRASEÑA";
			//~ // Cuerpo del mensaje
			//~ $mensaje = "La información de este correo es personal le recomendamos \n";
			//~ $mensaje.= "eliminar este mensaje depues de recuperar su contraseña. \n";
			//~ $mensaje.= "---------------------------------- \n";
			//~ $mensaje.= "     INFORMACIÓN DE SU CUENTA              \n";
			//~ $mensaje.= "---------------------------------- \n";
			//~ $mensaje.= "NOMBRE:   ".strtoupper($datosUsuario[0]." ".$datosUsuario[1])."\n";
			//~ $mensaje.= "EMAIL:    ".strtoupper($datosUsuario[3])."\n";
			//~ $mensaje.= "FECHA:    ".date("d/m/Y")."\n";
			//~ $mensaje.= "HORA:     ".date("h:i:s a")."\n";
			//~ $mensaje.= "IP:       ".$_SERVER['REMOTE_ADDR']."\n\n";
			//~ $mensaje.= "SU NUEVA CONTRASEÑA ES : ".$nuevaClave." \n\n";
			//~ $mensaje.= "---------------------------------- \n\n";
			//~ // headers del email
			//~ $headers = "From: no-responder@bomberos.com \r\n";
			//~ // Enviamos el mensaje
			//~ if (mail($email, $subject, $mensaje, $headers)) 
			//~ {
				//~ echo '<script>window.location="../vista/vista.php?url=olvidoclave&av=13"</script>';
			//~ }
			//~ else
			//~ {
				//~ echo '<script>window.location="../vista/vista.php?url=olvidoclave&av=14"</script>';
			//~ }
			//~ //-----FIN DE ENVIO--------//
		//~ }
		//~ else
		{
					header("location: ../vista/vista.php?url=maestro_nueva_clave&liidusuario=$id");
		}
	}
	else if($incorrectas >= 1)
	{
		echo '<script>window.location="../vista/vista.php?url=olvidoclave&av=15"</script>';
	}
?>
