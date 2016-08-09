<?php

    require_once("../modelo/class_modelo_unidad.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
        $liidmodelo_unidad=$_POST["txtidmodelo_unidad"];
	$lsdesc_mode=$_POST["txtdesc_mode"];
	$lsidmarca_unidad=$_POST["cmbidmarca_unidad"];
	$lsano_mode=$_POST["txtano_mode"];
	$lsoperacion=$_POST["txtoperacion"];
	$lshacer=$_POST["txthacer"];
	$lobjmodelo_unidad= new class_modelo_unidad();
	$lobjmodelo_unidad->fsetiidmodelo_unidad($liidmodelo_unidad);	
	$lobjmodelo_unidad->fsetsdesc_mode($lsdesc_mode);
	$lobjmodelo_unidad->fsetsidmarca_unidad($lsidmarca_unidad);
	$lobjmodelo_unidad->fsetsano_mode($lsano_mode);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidmodelo_unidad=$lobjmodelo_unidad->fnuevo();
	$lihay=0;
	header("location: ../vista/admin.php?url=maestro_modelo_unidad&liidmodelo_unidad=$liidmodelo_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
	$lbenc=$lobjmodelo_unidad->fbuscar();
	if ($lbenc)
	{
            $liidmodelo_unidad=$lobjmodelo_unidad->fgetiidmodelo_unidad();
            $lsdesc_mode=$lobjmodelo_unidad->fgetsdesc_mode();
            $lsidmarca_unidad=$lobjmodelo_unidad->fgetsidmarca_unidad();
            $lsano_mode=$lobjmodelo_unidad->fgetsano_mode();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=maestro_modelo_unidad&liidmodelo_unidad=$liidmodelo_unidad&lsdesc_mode=$lsdesc_mode&lsano_mode=$lsano_mode&lsidmarca_unidad=$lsidmarca_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
    
    if ($lsoperacion=="incluir")
    {
		if ($lbhecho=$lobjmodelo_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjmodelo_unidad->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=1");
			}
		}			
	}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjmodelo_unidad->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=5");
		}
		else 
		{
			$lbhecho=$lobjmodelo_unidad->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjmodelo_unidad->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjmodelo_unidad->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_modelo_unidad&av=9");
			}
	}   
    
?>
