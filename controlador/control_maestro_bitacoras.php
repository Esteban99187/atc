<?php
	require_once("../modelo/class_bitacoras.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidBitacora=$_POST["txtidBitacora"];
		$lsidUsuario=$_POST["txtidUsuario"];
		$lsip=$_POST["txtip"];
		$lsActividad=$_POST["txtActividad"];
		$lsfecha=$_POST["txtfecha"];
		$lshora=$_POST["txthora"];
		$lspanel=$_POST["txtpanel"];
		$lstipoBitacora=$_POST["txttipoBitacora"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjbitacoras= new class_bitacoras();
		$lobjbitacoras->fsetiidBitacora($liidBitacora);	
		$lobjbitacoras->fsetsidUsuario($lsidUsuario);
		$lobjbitacoras->fsetsip($lsip);
		$lobjbitacoras->fsetsActividad($lsActividad);
		$lobjbitacoras->fsetsfecha($lsfecha);
		$lobjbitacoras->fsetshora($lshora);
		$lobjbitacoras->fsetspanel($lspanel);
		$lobjbitacoras->fsetstipoBitacora($lstipoBitacora);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidBitacora=$lobjbitacoras->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_bitacoras&liidBitacora=$liidBitacora&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjbitacoras->fbuscar2();
		if ($lbenc)
		{
			$lsidUsuario=$lobjbitacoras->fgetsidUsuario();
			$lsip=$lobjbitacoras->fgetsip();
			$lsActividad=$lobjbitacoras->fgetsActividad();
			$lsfecha=$lobjbitacoras->fgetsfecha();
			$lshora=$lobjbitacoras->fgetshora();
			$lspanel=$lobjbitacoras->fgetspanel();
			$lstipoBitacora=$lobjbitacoras->fgetstipoBitacora();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_bitacoras&liidBitacora=$liidBitacora&lsidUsuario=$lsidUsuario&lsip=$lsip&lsActividad=$lsActividad&lsfecha=$lsfecha&lshora=$lshora&lspanel=$lspanel&lstipoBitacora=$lstipoBitacora&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjbitacoras->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjbitacoras->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjbitacoras->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_bitacoras&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
