<?


	include("../modelo/class_usuario.php");

	$salir = isset($_GET['salir']) ? $_GET['salir'] : null;
	$clave = isset($_POST['clave']) ? $_POST['clave'] : null;
	$acceder = isset($_POST['acceder']) ? $_POST['acceder'] : null;
	$persona_cedula = isset($_POST['persona_cedula']) ? $_POST['persona_cedula'] : null;

	$usuario = new usuario;
	$usuario->set_persona_cedula($persona_cedula);
	$usuario->set_clave($clave);

	if($acceder)

	{


		if($usuario->login()>0)
		{

			session_start();
			$_SESSION['login']=true;
			$row=$usuario->row();
			$_SESSION['roles']=$row['rol_cod_rol'];
			$_SESSION['usu']=$row['persona_cedula'];
			$_SESSION['hora_inicio']=date("H-i-s");
			$_SESSION['time_ini']=mktime(date("H"),date("i"),date("s"),date("n"),date("d"),date("Y"));
			$redireccion='admin.php';


		}

		else

		{
			$msj='El usuario no Existe.';
			$redireccion="adsertrans.php";

		}
	}


	if($salir==1)
	{
    $msj='Hasta Pronto!';
		session_destroy();
		$redireccion="adsertrans.php";
	}


?>
