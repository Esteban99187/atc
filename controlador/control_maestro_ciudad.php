<?php

    require_once("../modelo/class_ciudad.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
        $liidciudad=$_POST["txtidciudad"];
		$lsdesc_ciud=$_POST["txtdesc_ciud"];
		$lsidparroquia=$_POST["cmbidparroquia"];
		$lsidmunicipio=$_POST["cmbidmunicipio"];
		$lsidestado=$_POST["cmbidestado"];
		$lsidpais=$_POST["cmbidpais"];
		$lscodi_posta_ciu=$_POST["txtcodi_posta_ciu"];
		$lsestatus_ciu=$_POST["txtestatus_ciu"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjciudad= new class_ciudad();
		$lobjciudad->fsetiidciudad($liidciudad);	
		$lobjciudad->fsetsdesc_ciud($lsdesc_ciud);
		$lobjciudad->fsetsidparroquia($lsidparroquia);
		$lobjciudad->fsetsidmunicipio($lsidmunicipio);
		$lobjciudad->fsetsidestado($lsidestado);
		$lobjciudad->fsetsidpais($lsidpais);
		$lobjciudad->fsetscodi_posta_ciu($lscodi_posta_ciu);
		$lobjciudad->fsetsestatus_ciu($lsestatus_ciu);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidciudad=$lobjciudad->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_ciudad&liidciudad=$liidciudad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
		$lbenc=$lobjciudad->fbuscar();
		if ($lbenc)
		{
				$liidciudad=$lobjciudad->fgetiidciudad();
				$lsdesc_ciud=$lobjciudad->fgetsdesc_ciud();
				$lsidparroquia=$lobjciudad->fgetsidparroquia();
				$lsidmunicipio=$lobjciudad->fgetsidmunicipio();
				$lsidestado=$lobjciudad->fgetsidestado();
				$lsidpais=$lobjciudad->fgetsidpais();
				$lscodi_posta_ciu=$lobjciudad->fgetscodi_posta_ciu();
				$lsestatus_ciu=$lobjciudad->fgetsestatus_ciu();
				$lihay=1;
		}
	header("location: ../vista/admin.php?url=maestro_ciudad&liidciudad=$liidciudad&lsdesc_ciud=$lsdesc_ciud&lsidparroquia=$lsidparroquia&lsidmunicipio=$lsidmunicipio&lsidestado=$lsidestado&lsidpais=$lsidpais&lscodi_posta_ciu=$lscodi_posta_ciu&lsestatus_ciu=$lsestatus_ciu&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
    
	if ($lsoperacion=="incluir")
		{
		if ($lbhecho=$lobjciudad->fverificarexistencia())
			{
				header("location: ../vista/admin.php?url=maestro_ciudad&av=5");
			}
		else 
			{
				$lbhecho=$lobjciudad->fincluir();  
				if ($lbhecho)
					{
						header("location: ../vista/admin.php?url=maestro_ciudad&av=1");
					}
			}
		}

	if ($lsoperacion=="modificar")
		{
			if ($lbhecho=$lobjciudad->fverificarexistencia())
				{
					header("location: ../vista/admin.php?url=maestro_ciudad&av=5");
				}
			else 
				{
					$lbhecho=$lobjciudad->fmodificar();
					if ($lbhecho)
						{
							header("location: ../vista/admin.php?url=maestro_ciudad&av=3");
						}
				}
		}
	if ($lsoperacion=="eliminar")
		{
			$lbhecho=$lobjciudad->feliminar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_ciudad&av=7");
				}
		}

	if ($lsoperacion=="activar")
		{
			$lbhecho=$lobjciudad->factivar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_ciudad&av=9");
				}
		}
    
?>
