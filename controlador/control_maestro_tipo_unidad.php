<?php

    require_once("../modelo/class_tipo_unidad.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
    $liidtipo_unidad=$_POST["txtidtipo_unidad"];
	$lsdesc_tipo_unid=$_POST["txtdesc_tipo_unid"];
	$lsidcapacidad=$_POST["cmbidcapacidad"];
	$lsoperacion=$_POST["txtoperacion"];
	$lshacer=$_POST["txthacer"];
	$lobjtipo_unidad= new class_tipo_unidad();
	$lobjtipo_unidad->fsetiidtipo_unidad($liidtipo_unidad);	
	$lobjtipo_unidad->fsetsdesc_tipo_unid($lsdesc_tipo_unid);
	$lobjtipo_unidad->fsetsidcapacidad($lsidcapacidad);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidtipo_unidad=$lobjtipo_unidad->fnuevo();
	$lihay=0;
	header("location: ../vista/admin.php?url=maestro_tipo_unidad&liidtipo_unidad=$liidtipo_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
	$lbenc=$lobjtipo_unidad->fbuscar();
	if ($lbenc)
	{
            $liidtipo_unidad=$lobjtipo_unidad->fgetiidtipo_unidad();
            $lsdesc_tipo_unid=$lobjtipo_unidad->fgetsdesc_tipo_unid();
            $lsidcapacidad=$lobjtipo_unidad->fgetsidcapacidad();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=maestro_tipo_unidad&liidtipo_unidad=$liidtipo_unidad&lsdesc_tipo_unid=$lsdesc_tipo_unid&lsidcapacidad=$lsidcapacidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
    
     if ($lsoperacion=="incluir")
    {
		if ($lbhecho=$lobjtipo_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjtipo_unidad->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=1");
			}
		}			
	}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjtipo_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=5");
		}
		else 
		{
			$lbhecho=$lobjtipo_unidad->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtipo_unidad->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtipo_unidad->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tipo_unidad&av=9");
			}
	}   
    
?>
