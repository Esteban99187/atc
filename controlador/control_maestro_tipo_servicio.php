<?php
	require_once("../modelo/class_tipo_servicio.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtipo_servicio=$_POST["txtidtipo_servicio"];
		$lsdescripcion_tipser=$_POST["txtdescripcion_tipser"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtipo_servicio= new class_tipo_servicio();
		$lobjtipo_servicio->fsetiidtipo_servicio($liidtipo_servicio);	
		$lobjtipo_servicio->fsetsdescripcion_tipser($lsdescripcion_tipser);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidtipo_servicio=$lobjtipo_servicio->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_tipo_servicio&liidtipo_servicio=$liidtipo_servicio&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjtipo_servicio->fbuscar();
		if ($lbenc)
		{
			$lsdescripcion_tipser=$lobjtipo_servicio->fgetsdescripcion_tipser();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_tipo_servicio&liidtipo_servicio=$liidtipo_servicio&lsdescripcion_tipser=$lsdescripcion_tipser&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjtipo_servicio->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjtipo_servicio->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtipo_servicio->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_tipo_servicio&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
