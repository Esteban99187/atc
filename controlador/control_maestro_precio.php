<?php

	require_once("../modelo/class_precio.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidprecio=$_POST["txtidprecio"];
		$lsprecio_pre=$_POST["txtprecio_pre"];
		$lsidtipo_unidad=$_POST["cmbidtipo_unidad"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjprecio= new class_precio();
		$lobjprecio->fsetiidprecio($liidprecio);
		$lobjprecio->fsetsprecio_pre($lsprecio_pre);
		$lobjprecio->fsetsidtipo_unidad($lsidtipo_unidad);
	}
	if ($lsoperacion=="nuevo")
	{
		$liidprecio=$lobjprecio->fnuevo();
		$lihay=0;
			header("location: ../vista/admin.php?url=maestro_precio&liidprecio=$liidprecio&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjprecio->fbuscar();
		if ($lbenc)
		{
			$lsprecio_pre=$lobjprecio->fgetsprecio_pre();
			$lsidtipo_unidad=$lobjprecio->fgetsidtipo_unidad();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_precio&liidprecio=$liidprecio&lsprecio_pre=$lsprecio_pre&lsidtipo_unidad=$lsidtipo_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
	 {
		if ($lbhecho=$lobjprecio->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_precio&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjprecio->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_precio&av=1");
			}
		}			
	}

	if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjprecio->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_precio&av=5");
		}
		else 
		{
			$lbhecho=$lobjprecio->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_precio&av=3");
			}
		}
	}   

	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjprecio->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_precio&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjprecio->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_precio&av=9");
			}
	}   

?>
