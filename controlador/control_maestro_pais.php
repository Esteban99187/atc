<?php
	require_once("../modelo/class_pais.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidpais=$_POST["txtidpais"];
		$lsdesc_pais=$_POST["txtdesc_pais"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjpais= new class_pais();
		$lobjpais->fsetiidpais($liidpais);	
		$lobjpais->fsetsdesc_pais($lsdesc_pais);
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjpais->fbuscar();
		if ($lbenc)
		{
			$lsdesc_pais=$lobjpais->fgetsdesc_pais();
			$lihay=1;
		}
			header("location: ../vista/admin.php?url=maestro_pais&liidpais=$liidpais&lsdesc_pais=$lsdesc_pais&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{ 
		if ($lbhecho=$lobjpais->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_pais&av=5");
		}
		else 
		{
			$lbhecho=$lobjpais->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_pais&av=1");
			}
		}
	}
	if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjpais->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_pais&av=5");
		}
		else 
		{
			$lbhecho=$lobjpais->fmodificar();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_pais&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjpais->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_pais&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjpais->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_pais&av=9");
			}
	}   
?>
