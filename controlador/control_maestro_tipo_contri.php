<?php
	require_once("../modelo/class_tipo_contri.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_contribuyente=$_POST["txtidtipo_contribuyente"];
		$lsdesc_tipo_cont=$_POST["txtdesc_tipo_cont"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_contri= new class_tipo_contri();
		$lobjtipo_contri->fsetiidtipo_contribuyente($liidtipo_contribuyente);	
		$lobjtipo_contri->fsetsdesc_tipo_cont($lsdesc_tipo_cont);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidtipo_contribuyente=$lobjtipo_contri->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tipo_contri&liidtipo_contribuyente=$liidtipo_contribuyente&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjtipo_contri->fbuscar();
			if ($lbenc)
			{
				$lsdesc_tipo_cont=$lobjtipo_contri->fgetsdesc_tipo_cont();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_tipo_contri&liidtipo_contribuyente=$liidtipo_contribuyente&lsdesc_tipo_cont=$lsdesc_tipo_cont&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
		{
			if ($lbhecho=$lobjtipo_contri->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_contri&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_contri->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_contri&av=1");
			}
		}			
	}	
	
	if ($lsoperacion=="modificar")
			{
		if ($lbhecho=$lobjtipo_contri->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_contri&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_contri->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_contri&av=3");
			}
		}
	}    
			if ($lsoperacion=="eliminar")
			{
		$lbhecho=$lobjtipo_contri->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_contri&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_contri->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_contri&av=9");
			}
	}   
?>
