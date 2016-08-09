<?php
	require_once("../modelo/class_tipo_cliente.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_cliente=$_POST["txtidtipo_cliente"];
		$lsdesc_tipo_clie=$_POST["txtdesc_tipo_clie"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_cliente= new class_tipo_cliente();
		$lobjtipo_cliente->fsetiidtipo_cliente($liidtipo_cliente);	
		$lobjtipo_cliente->fsetsdesc_tipo_clie($lsdesc_tipo_clie);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidtipo_cliente=$lobjtipo_cliente->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&liidtipo_cliente=$liidtipo_cliente&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjtipo_cliente->fbuscar();
			if ($lbenc)
			{
				$lsdesc_tipo_clie=$lobjtipo_cliente->fgetsdesc_tipo_clie();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&liidtipo_cliente=$liidtipo_cliente&lsdesc_tipcli=$lsdesc_tipcli&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjtipo_cliente->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_cliente->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=1");
			}
		}			
	}
    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjtipo_cliente->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_cliente->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtipo_cliente->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_cliente->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_cliente&av=9");
			}
	}   
?>
