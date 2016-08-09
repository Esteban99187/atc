<?php
	require_once("../modelo/class_servicio.php");	
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidservicio=$_POST["txtidservicio"];
		$lsdescripcion_ser=$_POST["txtdescripcion_ser"];
		$lsidtipo_servicio_ser=$_POST["cmbidtipo_servicio_ser"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjservicio= new class_servicio();
		$lobjservicio->fsetiidservicio($liidservicio);	
		$lobjservicio->fsetsdescripcion_ser($lsdescripcion_ser);
		$lobjservicio->fsetsidtipo_servicio_ser($lsidtipo_servicio_ser);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidservicio=$lobjservicio->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_servicio&liidservicio=$liidservicio&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjservicio->fbuscar();
		if ($lbenc)
		{
			$liidservicio=$lobjservicio->fgetiidservicio();
			$lsdescripcion_ser=$lobjservicio->fgetsdescripcion_ser();
			$lsidtipo_servicio_ser=$lobjservicio->fgetsidtipo_servicio_ser();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_servicio&liidservicio=$liidservicio&lsdescripcion_ser=$lsdescripcion_ser&lsidtipo_servicio_ser=$lsidtipo_servicio_ser&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjservicio->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjservicio->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjservicio->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_servicio&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
