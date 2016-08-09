<?php
	require_once("../modelo/class_departamento.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liiddepartamento=$_POST["txtiddepartamento"];
		$lsdesc_depa=$_POST["txtdesc_depa"];
		$lstele_depa=$_POST["txttele_depa"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjdepartamento= new class_departamento();
		$lobjdepartamento->fsetiiddepartamento($liiddepartamento);	
		$lobjdepartamento->fsetsdesc_depa($lsdesc_depa);
		$lobjdepartamento->fsetstele_depa($lstele_depa);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liiddepartamento=$lobjdepartamento->fnuevo();
			$lihay=0;
					header("location: ../vista/admin.php?url=maestro_departamento&liiddepartamento=$liiddepartamento&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjdepartamento->fbuscar();
			if ($lbenc)
			{
				$lsdesc_depa=$lobjdepartamento->fgetsdesc_depa();
				$lstele_depa=$lobjdepartamento->fgetstele_depa();
				$lihay=1;
			}
					header("location: ../vista/admin.php?url=maestro_departamento&liiddepartamento=$liiddepartamento&lsdesc_depa=$lsdesc_depa&lstele_depa=$lstele_depa&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
			{
		if ($lbhecho=$lobjdepartamento->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_departamento&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjdepartamento->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_departamento&av=1");
			}
		}			
	}	    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjdepartamento->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_departamento&av=5");
		}
		else 
		{
			$lbhecho=$lobjdepartamento->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_departamento&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjdepartamento->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_departamento&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjdepartamento->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_departamento&av=9");
			}
	}   
?>
