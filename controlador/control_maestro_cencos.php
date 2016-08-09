<?php
	require_once("../modelo/class_costo.php");
	if(array_key_exists('txtoperacion',$_POST))
	{
		//print_r($_POST);exit();
		$liidcosto=$_POST['txtidcosto'];
		$lsdesc_costo=$_POST['txtdesc_costo'];
		$lsimto_costo=$_POST['txtmto_costo'];
		
		$lsoperacion=$_POST['txtoperacion'];
		$lshacer=$_POST["txthacer"];
		$lobjcosto= new class_costo();
		$lobjcosto->fsetiidcosto($liidcosto);	
		$lobjcosto->fsetsdesc_costo($lsdesc_costo);
		$lobjcosto->fsetimto_costo($lsimto_costo);
		
	}
	if ($lsoperacion=="nuevo")
	{
		$liidcosto=$lobjcosto->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_centro_costo&liidcto=$liidcosto&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjcosto->fbuscar();
		if ($lbenc)
		{
			$liidcosto=$lobjcosto->fgetiidcosto();
			$lsdesc_costo=$lobjcosto->fgetsdesc_costo();
			$lsimto_costo=$lobjcosto->fgetimto_costo();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_centro_costo&liidcto=$liidcosto&lsdesc_cto=$lsdesc_costo&lsmto_cto=$lsimto_costo&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjcosto->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjcosto->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcosto->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_centro_costo&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
