<?php

    require_once("../modelo/class_capacidad.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
    $liidcapacidad=$_POST["txtidcapacidad"];
	$lscapacidad=$_POST["txtcapacidad"];
	$lsidunidad_medida=$_POST["cmbidunidad_medida"];
	$lsoperacion=$_POST["txtoperacion"];
	$lshacer=$_POST["txthacer"];
	$lobjcapacidad= new class_capacidad();
	$lobjcapacidad->fsetiidcapacidad($liidcapacidad);	
	$lobjcapacidad->fsetscapacidad($lscapacidad);
	$lobjcapacidad->fsetsidunidad_medida($lsidunidad_medida);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidcapacidad=$lobjcapacidad->fnuevo();
	$lihay=0;
	header("location: ../vista/admin.php?url=maestro_capacidad&liidcapacidad=$liidcapacidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
	$lbenc=$lobjcapacidad->fbuscar();
	if ($lbenc)
	{
            $liidcapacidad=$lobjcapacidad->fgetiidcapacidad();
            $lscapacidad=$lobjcapacidad->fgetscapacidad();
            $lsidunidad_medida=$lobjcapacidad->fgetsidunidad_medida();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=maestro_capacidad&liidcapacidad=$liidcapacidad&lscapacidad=$lscapacidad&lsidunidad_medida=$lsidunidad_medida&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
    
    if ($lsoperacion=="incluir")
    {
		if ($lbhecho=$lobjcapacidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_capacidad&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjcapacidad->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_capacidad&av=1");
			}
		}			
	}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjcapacidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_capacidad&av=5");
		}
		else 
		{
			$lbhecho=$lobjcapacidad->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_capacidad&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcapacidad->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_capacidad&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjcapacidad->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_capacidad&av=9");
			}
	}   
    
?>
