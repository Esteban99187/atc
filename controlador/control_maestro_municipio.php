<?php

    require_once("../modelo/class_municipio.php");
   
    if(array_key_exists(txtoperacion,$_POST))
    {
        $liidmunicipio=$_POST["txtidmunicipio"];
	$lsdesc_muni=$_POST["txtdesc_muni"];
	$lsidestado=$_POST["cmbidestado"];
	$lsidpais=$_POST["cmbpais"];
	$lsestatus_mun=$_POST["estatus_mun"];
	$lsoperacion=$_POST["txtoperacion"];
	$lshacer=$_POST["txthacer"];
	$lobjmunicipio= new class_municipio();
	$lobjmunicipio->fsetiidmunicipio($liidmunicipio);	
	$lobjmunicipio->fsetsdesc_muni($lsdesc_muni);
	$lobjmunicipio->fsetsidestado($lsidestado);
	$lobjmunicipio->fsetsidpais($lsidpais);
	$lobjmunicipio->fsetsestatus_mun($lsestatus_mun);
    }
   
    if ($lsoperacion=="nuevo")
    {
        $liidmunicipio=$lobjmunicipio->fnuevo();
	$lihay=0;
	header("location: ../vista/admin.php?url=maestro_municipio&liidmunicipio=$liidmunicipio&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
   
    if ($lsoperacion=="buscar")
    {
        $lihay=0;
	$lbenc=$lobjmunicipio->fbuscar();
	if ($lbenc)
	{
            $liidmunicipio=$lobjmunicipio->fgetiidmunicipio();
            $lsdesc_muni=$lobjmunicipio->fgetsdesc_muni();
            $lsidestado=$lobjmunicipio->fgetsidestado();
            $lsidpais=$lobjmunicipio->fgetsidpais();
            $lsestatus_mun=$lobjmunicipio->fgetsestatus_mun();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=maestro_municipio&liidmunicipio=$liidmunicipio&lsdesc_muni=$lsdesc_muni&lsidestado=$lsidestado&lsidpais=$lsidpais&lsestatus_mun=$lsestatus_mun&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
    
	if ($lsoperacion=="incluir")
		{
		if ($lbhecho=$lobjmunicipio->fverificarexistencia())
			{
				header("location: ../vista/admin.php?url=maestro_municipio&av=5");
			}
		else 
			{
				$lbhecho=$lobjmunicipio->fincluir();  
				if ($lbhecho)
					{
						header("location: ../vista/admin.php?url=maestro_municipio&av=1");
					}
			}
		}

	if ($lsoperacion=="modificar")
		{
			if ($lbhecho=$lobjmunicipio->fverificarexistencia())
				{
					header("location: ../vista/admin.php?url=maestro_municipio&av=5");
				}
			else 
				{
					$lbhecho=$lobjmunicipio->fmodificar();
					if ($lbhecho)
						{
							header("location: ../vista/admin.php?url=maestro_municipio&av=3");
						}
				}
		}
	if ($lsoperacion=="eliminar")
		{
			$lbhecho=$lobjmunicipio->feliminar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_municipio&av=7");
				}
		}

	if ($lsoperacion=="activar")
		{
			$lbhecho=$lobjmunicipio->factivar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_municipio&av=9");
				}
		}
    
?>
