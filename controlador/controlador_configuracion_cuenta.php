<?php 
	require_once("../modelo/class_usuarios.php");
	require_once("../modelo/class_bitacora.php");
	$b=new bitacora;
	$x=new usuariosex;
	$datos = $_POST["idUsuario"];
	$datosContrasena = array($_POST["contrasenaActual"],$_POST["contrasenaNueva"],$_POST["repiteContrasena"]);
	if($_POST["hay"]==2)
	{
		$preguntas = $_POST["pregunta"];
		$respuestas = $_POST["respuesta"];
		$repetir = count($preguntas);
		$error=false;

		$x->IniciaTransaccion();
		$listo = $x->cambiarContrasena($datos,$datosContrasena[1],$datosContrasena[0]);
		if(!$listo)
		{
			$error=true;
		}
		else
		{
			$listo = $x->cambioPrimeravez($datos,0);
			if(!$listo)
			{
				$error=true;
			}
			else
			{
				for($i=0;$i<=$repetir-1;$i++)
				{
					$listo = $x->preguntasUsuario($datos,$preguntas[$i],$respuestas[$i]);
					if(!$listo)
					{
						$error=true;
					}	
				}
			}
		}
		/*no conincide la contraseña anterio, porlo tndo no me permite cambiar la contraseña por una nueva*/
		if($error)
		{
			$x->RompeTransaccion();
			echo '<script>window.location="../vista/vista.php?url=configclave&av=14"</script>';
		}
		/*************************************************************************************************/
		/*envia felicitaciones de que su contraseña fue cambiada por primeravez de manera exitosa*/
		else
		{
			$x->FinTransaccion();
			echo '<script>window.location="../vista/vista.php?url=cambiocontrasena"</script>';
		}
		/*****************************************************************************************/
	}
	else if($_POST["hay"]==1)
	{
		if($x->cambiarContrasena($datos,$datosContrasena[1],$datosContrasena[0]))
		{
			if($x->cambioPrimeravez($datos,0))
			{
				echo '<script>window.location="../vista/session.php"</script>';
			}
		}
		else
		{
			echo '<script>window.location="../vista/config.php?url=configclave&av=14"</script>';
		}
	}
?>
