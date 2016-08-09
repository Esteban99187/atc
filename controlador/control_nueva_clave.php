<?php
	require_once("../modelo/class_nueva_clave.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidusuario=$_POST["txtidusuario"];
		$lsclave=$_POST["txtclave"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjforma_pago= new class_nueva_clave();
		$lobjforma_pago->fsetiidusuario($liidusuario);	
		$lobjforma_pago->fsetsclave($lsclave);
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjforma_pago->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/vista.php?url=maestro_nueva_clave&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
