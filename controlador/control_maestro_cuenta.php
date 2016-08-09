<?php
	require_once("../modelo/class_cuenta.php");	
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidcuenta=$_POST["txtidcuenta"];
		$lsbanco_idbanco=$_POST["cmbbanco_idbanco"];
		$lsidtipo_cuenta=$_POST["cmbidtipo_cuenta"];
		$lsidcliente=$_POST["cmbidcliente"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjcuenta= new class_cuenta();
		$lobjcuenta->fsetiidcuenta($liidcuenta);	
		$lobjcuenta->fsetsbanco_idbanco($lsbanco_idbanco);
		$lobjcuenta->fsetsidtipo_cuenta($lsidtipo_cuenta);
		$lobjcuenta->fsetsidcliente($lsidcliente);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidcuenta=$lobjcuenta->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_cuenta&liidcuenta=$liidcuenta&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjcuenta->fbuscar();
		if ($lbenc)
		{
			$liidcuenta=$lobjcuenta->fgetiidcuenta();
			$lsbanco_idbanco=$lobjcuenta->fgetsbanco_idbanco();
			$lsidtipo_cuenta=$lobjcuenta->fgetsidtipo_cuenta();
			$lsidcliente=$lobjcuenta->fgetsidcliente();
			$lsestatus_cuenta=$lobjcuenta->fgetsestatus_cuenta();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_cuenta&liidcuenta=$liidcuenta&lsbanco_idbanco=$lsbanco_idbanco&lsidtipo_cuenta=$lsidtipo_cuenta&lsidcliente=$lsidcliente&lsestatus_cuenta=$lsestatus_cuenta&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	  if ($lsoperacion=="incluir")
    {
	if ($lbhecho=$lobjcuenta->fverificarexistencia())
	{
		header("location: ../vista/admin.php?url=maestro_cuenta&av=5");
	}
	else 
	{
	
	$lbhecho=$lobjcuenta->fincluir();  
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_cuenta&av=1");
		}
		else 
		{
			header("location: ../vista/admin.php?url=maestro_cuenta&av=33");
		}
	}			
}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjcuenta->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_cuenta&av=5");
		}
		else 
		{
			$lbhecho=$lobjcuenta->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cuenta&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcuenta->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cuenta&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjcuenta->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cuenta&av=9");
			}
	}   
    
?>
