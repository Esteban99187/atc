<?php
	require_once("../modelo/class_tipo_cuenta.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_cuenta=$_POST["txtidtipo_cuenta"];
		$lsdesc_tipo_cuen=$_POST["txtdesc_tipo_cuen"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_cuenta= new class_tipo_cuenta();
		$lobjtipo_cuenta->fsetiidtipo_cuenta($liidtipo_cuenta);	
		$lobjtipo_cuenta->fsetsdesc_tipo_cuen($lsdesc_tipo_cuen);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidtipo_cuenta=$lobjtipo_cuenta->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&liidtipo_cuenta=$liidtipo_cuenta&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjtipo_cuenta->fbuscar();
			if ($lbenc)
			{
				$lsdesc_tipo_cuen=$lobjtipo_cuenta->fgetsdesc_tipo_cuen();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&liidtipo_cuenta=$liidtipo_cuenta&lsdesc_tipo_cuen=$lsdesc_tipo_cuen&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjtipo_cuenta->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_cuenta->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=1");
			}
		}			
	}
    
    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjtipo_cuenta->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_cuenta->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtipo_cuenta->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_cuenta->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cuenta&av=9");
			}
	}   
?>
