<?php
	require_once("../modelo/class_region.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidregion=$_POST["txtidregion"];
		$lsdesc_regi=$_POST["txtdesc_regi"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjregion= new class_region();
		$lobjregion->fsetiidregion($liidregion);	
		$lobjregion->fsetsdesc_regi($lsdesc_regi);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidregion=$lobjregion->fnuevo();
		$lihay=0;
			header("location: ../vista/admin.php?url=maestro_region&liidregion=$liidregion&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjregion->fbuscar();
		if ($lbenc)
		{
			$lsdesc_regi=$lobjregion->fgetsdesc_regi();
			$lihay=1;
		}
			header("location: ../vista/admin.php?url=maestro_region&liidregion=$liidregion&lsdesc_regi=$lsdesc_regi&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
	if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjregion->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_region&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjregion->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_region&av=1");
			}
		}			
	}	    
	if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjregion->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_region&av=5");
		}
		else 
		{
			$lbhecho=$lobjregion->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_region&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjregion->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_region&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjregion->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_region&av=9");
			}
	}   
?>
