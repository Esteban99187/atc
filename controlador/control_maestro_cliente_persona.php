<?php
	require_once("../modelo/class_cliente_persona.php");	
	if(array_key_exists(txtoperacion,$_POST))
	{
		$lscliente_idcliente=$_POST["cmbcliente_idcliente"];
		$lspersona_cedula=$_POST["cmbpersona_cedula"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjcliente_persona= new class_cliente_persona()
		$lobjcliente_persona->fsetscliente_idcliente($lscliente_idcliente);
		$lobjcliente_persona->fsetspersona_cedula($lspersona_cedula);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidcliente_persona=$lobjcliente_persona->fnuevo();
		$lihay=0;
		header("location: ../vista/administradortodo.php?url=maestro_cliente_persona&lscliente_idcliente=$lscliente_idcliente&lspersona_cedula=$lspersona_cedula&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjcliente_persona->fbuscar();
		if ($lbenc)
		{
			$lscliente_idcliente=$lobjcliente_persona->fgetscliente_idcliente();
			$lspersona_cedula=$lobjcliente_persona->fgetspersona_cedula();
			$lihay=1;
		}
		header("location: ../vista/administradortodo.php?url=maestro_cliente_persona&lscliente_idcliente=$lscliente_idcliente&lspersona_cedula=$lspersona_cedula&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjcliente_persona->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjcliente_persona->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcliente_persona->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/administradortodo.php?url=maestro_cliente_persona&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
