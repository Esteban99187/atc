<?php
	require_once("../modelo/class_unidad_medida.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidunidad_medida=$_POST["txtidunidad_medida"];
		$lsdesc_unid_medi=$_POST["txtdesc_unid_medi"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjunidad_medida= new class_unidad_medida();
		$lobjunidad_medida->fsetiidunidad_medida($liidunidad_medida);	
		$lobjunidad_medida->fsetsdesc_unid_medi($lsdesc_unid_medi);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidunidad_medida=$lobjunidad_medida->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_unidad_medida&liidunidad_medida=$liidunidad_medida&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjunidad_medida->fbuscar();
			if ($lbenc)
			{
				$lsdesc_unid_medi=$lobjunidad_medida->fgetsdesc_unid_medi();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_unidad_medida&liidunidad_medida=$liidunidad_medida&lsdesc_unid_medi=$lsdesc_unid_medi&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjunidad_medida->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_unidad_medida&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjunidad_medida->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_unidad_medida&av=1");
			}
		}			
	}
    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjunidad_medida->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_unidad_medida&av=5");
		}
		else 
		{
			$lbhecho=$lobjunidad_medida->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_unidad_medida&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjunidad_medida->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_unidad_medida&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjunidad_medida->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_unidad_medida&av=9");
			}
	}   
?>
