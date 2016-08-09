<?php
	require_once("../modelo/class_tipo_proveedor.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_proveedor=$_POST["txtidtipo_proveedor"];
		$lsdesc_tipo_prov=$_POST["txtdesc_tipo_prov"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_proveedor= new class_tipo_proveedor();
		$lobjtipo_proveedor->fsetiidtipo_proveedor($liidtipo_proveedor);	
		$lobjtipo_proveedor->fsetsdesc_tipo_prov($lsdesc_tipo_prov);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidtipo_proveedor=$lobjtipo_proveedor->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&liidtipo_proveedor=$liidtipo_proveedor&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjtipo_proveedor->fbuscar();
			if ($lbenc)
			{
				$lsdesc_tipo_prov=$lobjtipo_proveedor->fgetsdesc_tipo_prov();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&liidtipo_proveedor=$liidtipo_proveedor&lsdesc_tipo_prov=$lsdesc_tipo_prov&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
			{
				if ($lbhecho=$lobjtipo_proveedor->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_proveedor->fincluir(); 
		
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=1");
			}
		}			
	}
			if ($lsoperacion=="modificar")
			{
			if ($lbhecho=$lobjtipo_proveedor->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_proveedor->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=3");
			}
		}
	} 
		if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtipo_proveedor->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_proveedor->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_proveedor&av=9");
			}
	} 
    
?>
