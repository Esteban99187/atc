<?php
	require_once("../modelo/class_roles.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$licod_rol=$_POST["txtcod_rol"];
		$lsnombre_rol=$_POST["txtnombre_rol"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjroles= new class_roles();
		$lobjroles->fseticod_rol($licod_rol);	
		$lobjroles->fsetsnombre_rol($lsnombre_rol);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$licod_rol=$lobjroles->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_roles&licod_rol=$licod_rol&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjroles->fbuscar();
			if ($lbenc)
			{
				$lsnombre_rol=$lobjroles->fgetsnombre_rol();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_roles&licod_rol=$licod_rol&lsnombre_rol=$lsnombre_rol&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
			if ($lsoperacion=="incluir")
		{
		if ($lbhecho=$lobjroles->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_roles&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjroles->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_roles&av=1");
			}
		}			
	}	    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjroles->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_roles&av=5");
		}
		else 
		{
			$lbhecho=$lobjroles->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_roles&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjroles->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_roles&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjroles->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_roles&av=9");
			}
	}   
?>
