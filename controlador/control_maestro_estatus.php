<?php
	require_once("../modelo/class_estatus.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidestatus=$_POST["txtidestatus"];
		$lsnombre_est=$_POST["txtnombre_est"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjestatus= new class_estatus();
		$lobjestatus->fsetiidestatus($liidestatus);	
		$lobjestatus->fsetsnombre_est($lsnombre_est);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidestatus=$lobjestatus->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_estatus&liidestatus=$liidestatus&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjestatus->fbuscar();
			if ($lbenc)
			{
				$lsnombre_est=$lobjestatus->fgetsnombre_est();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_estatus&liidestatus=$liidestatus&lsnombre_est=$lsnombre_est&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
			{
		if ($lbhecho=$lobjestatus->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_estatus&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjestatus->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_estatus&av=1");
			}
		}			
	}	 
			if ($lsoperacion=="modificar")
		{
		if ($lbhecho=$lobjestatus->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_estatus&av=5");
		}
		else 
		{
			$lbhecho=$lobjestatus->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_estatus&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjestatus->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_estatus&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjestatus->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_estatus&av=9");
			}
	}   
?>
