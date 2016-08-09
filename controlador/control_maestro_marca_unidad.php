<?php
	require_once("../modelo/class_marca_unidad.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidmarca_unidad=$_POST["txtidmarca_unidad"];
		$lsdesc_marc=$_POST["txtdesc_marc"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjmarca_unidad= new class_marca_unidad();
		$lobjmarca_unidad->fsetiidmarca_unidad($liidmarca_unidad);	
		$lobjmarca_unidad->fsetsdesc_marc($lsdesc_marc);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidmarca_unidad=$lobjmarca_unidad->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_marca_unidad&liidmarca_unidad=$liidmarca_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjmarca_unidad->fbuscar();
			if ($lbenc)
			{
				$lsdesc_marc=$lobjmarca_unidad->fgetsdesc_marc();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_marca_unidad&liidmarca_unidad=$liidmarca_unidad&lsdesc_marc=$lsdesc_marc&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjmarca_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_marca_unidad&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjmarca_unidad->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_marca_unidad&av=1");
			}
		}			
	}
    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjmarca_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_marca_unidad&av=5");
		}
		else 
		{
			$lbhecho=$lobjmarca_unidad->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_marca_unidad&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjmarca_unidad->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_marca_unidad&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjmarca_unidad->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_marca_unidad&av=9");
			}
	}   
?>
