<?php

	require_once("../modelo/class_recupera.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$lcnombre1=$_POST["txtnombre1"];
		$lcnombre2=$_POST["txtnombre2"];
		$lcapellido1=$_POST["txtapellido1"];
		$lcapellido2=$_POST["txtapellido2"];
		$lcemail=$_POST["txtemail"];
		$lctlf=$_POST["txttlf"];
		$lcusuario=$_POST["txtusuario"];
		$lccontrasena=$_POST["txtcontrasena"];
		$lcpregunta=$_POST["txtpregunta"];
		$lcrespuesta=$_POST["txtrespuesta"];
		$lcpwnueva1=$_POST["txtpwnueva1"];
		$lcnivel=$_POST["radnivel"];
		$lchacer=$_POST["txthacer"];
		$lcoperacion=$_POST["txtoperacion"];

		$passw = $lccontrasena;

		$lobjusuario=new clsusuario($passw, $lcnombre1, $lcnombre2, $lcapellido1, $lcapellido2,
		$lcemail, $lctlf, $lcusuario, $lccontrasena, $lcpregunta, $lcrespuesta, $lcnivel);

	}

	if ($lcoperacion=="busca_usuario")
	{
	 	$lnhay=2;
		$llEnc=$lobjusuario->busca_usuario();
		if ($llEnc)
		{
			$lcpregunta=$lobjusuario->getpregunta();
			$lnhay=1;
			header("location: ../vista/maestro_respuesta.php?lcusuario=$lcusuario&lcpregunta=$lcpregunta");
		}
		else
		{
			header("location: ../vista/maestro_recupera.php?lnhay=$lnhay");
		}
	}

	if ($lcoperacion=="busca_respuesta")
	{
		$lnhay=2;
		$llEnc=$lobjusuario->busca_respuesta();
		if ($llEnc)
		{
			$lcpregunta=$lobjusuario->getpregunta();
			$lcrespuesta=$lobjusuario->getrespuesta();
			$lnhay=1;
			header("location: ../vista/maestro_contrasena.php?lcusuario=$lcusuario");
		}
		else
		{
			header("location: ../vista/maestro_respuesta.php?lcusuario=$lcusuario&lcpregunta=$lcpregunta&lnhay=$lnhay");
		}
	}

	if ($lcoperacion=="modificar_contrasena")
	{
		$llhecho=$lobjusuario->modificar_contrasena();
		if ($llhecho)
		{
			$lchacer="listo";
		}
		
		header("location: ../vista/adsertrans.php");
	}

?>
