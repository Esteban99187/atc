<?php

    require_once("../modelo/class_parroquia.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
    $liidparroquia=$_POST["txtidparroquia"];
	$lsdesc_parr=$_POST["txtdesc_parr"];
	$lsidmunicipio=$_POST["cmbidmunicipio"];
	$lsidestado=$_POST["cmbidestado"];
	$lsidpais=$_POST["cmbidpais"];
	$lsestatus_par=$_POST["txtestatus_par"];
	$lsoperacion=$_POST["txtoperacion"];
	$lshacer=$_POST["txthacer"];
	$lobjparroquia= new class_parroquia();
	$lobjparroquia->fsetiidparroquia($liidparroquia);	
	$lobjparroquia->fsetsdesc_parr($lsdesc_parr);
	$lobjparroquia->fsetsidmunicipio($lsidmunicipio);
	$lobjparroquia->fsetsidestado($lsidestado);
	$lobjparroquia->fsetsidpais($lsidpais);
	$lobjparroquia->fsetsestatus_par($lsestatus_par);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidparroquia=$lobjparroquia->fnuevo();
	$lihay=0;
	header("location: ../vista/admin.php?url=maestro_parroquia&liidparroquia=$liidparroquia&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
	$lbenc=$lobjparroquia->fbuscar();
	if ($lbenc)
	{
            $liidparroquia=$lobjparroquia->fgetiidparroquia();
            $lsdesc_parr=$lobjparroquia->fgetsdesc_parr();
            $lsidmunicipio=$lobjparroquia->fgetsidmunicipio();
            $lsidestado=$lobjparroquia->fgetsidestado();
            $lsidpais=$lobjparroquia->fgetsidpais();
            $lsestatus_par=$lobjparroquia->fgetsestatus_par();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=maestro_parroquia&liidparroquia=$liidparroquia&lsdesc_parr=$lsdesc_parr&lsidmunicipio=$lsidmunicipio&lsidestado=$lsidestado&lsidpais=$lsidpais&lsestatus_par=$lsestatus_par&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
 	if ($lsoperacion=="incluir")
		{
		if ($lbhecho=$lobjparroquia->fverificarexistencia())
			{
				header("location: ../vista/admin.php?url=maestro_parroquia&av=5");
			}
		else 
			{
				$lbhecho=$lobjparroquia->fincluir();  
				if ($lbhecho)
					{
						header("location: ../vista/admin.php?url=maestro_parroquia&av=1");
					}
			}
		}

	if ($lsoperacion=="modificar")
		{
			if ($lbhecho=$lobjparroquia->fverificarexistencia())
				{
					header("location: ../vista/admin.php?url=maestro_parroquia&av=5");
				}
			else 
				{
					$lbhecho=$lobjparroquia->fmodificar();
					if ($lbhecho)
						{
							header("location: ../vista/admin.php?url=maestro_parroquia&av=3");
						}
				}
		}
	if ($lsoperacion=="eliminar")
		{
			$lbhecho=$lobjparroquia->feliminar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_parroquia&av=7");
				}
		}

	if ($lsoperacion=="activar")
		{
			$lbhecho=$lobjparroquia->factivar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_parroquia&av=9");
				}
		}
    
?>

