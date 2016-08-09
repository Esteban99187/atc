<?php
	require_once("../modelo/class_tipo_producto.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_producto=$_POST["txtidtipo_producto"];
		$lsdesc_tipo_prod=$_POST["txtdesc_tipo_prod"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_producto= new class_tipo_producto();
		$lobjtipo_producto->fsetiidtipo_producto($liidtipo_producto);	
		$lobjtipo_producto->fsetsdesc_tipo_prod($lsdesc_tipo_prod);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidtipo_producto=$lobjtipo_producto->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tipo_producto&liidtipo_producto=$liidtipo_producto&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjtipo_producto->fbuscar();
			if ($lbenc)
			{
				$lsdesc_tipo_prod=$lobjtipo_producto->fgetsdesc_tipo_prod();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_tipo_producto&liidtipo_producto=$liidtipo_producto&lsdesc_tipo_prod=$lsdesc_tipo_prod&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
		if ($lsoperacion=="incluir")
		{
			if ($lbhecho=$lobjtipo_producto->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_producto&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_producto->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_producto&av=1");
			}
		}			
	}	
	
	if ($lsoperacion=="modificar")
			{
		if ($lbhecho=$lobjtipo_producto->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_producto&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_producto->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_producto&av=3");
			}
		}
	}    
			if ($lsoperacion=="eliminar")
			{
		$lbhecho=$lobjtipo_producto->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_producto&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_producto->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_producto&av=9");
			}
	}   
?>
