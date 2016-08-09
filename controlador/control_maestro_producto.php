<?php
	require_once("../modelo/class_producto.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidproducto=$_POST["txtidproducto"];
		$lsdesc_prod=$_POST["txtdesc_prod"];
		$lsidtipo_producto=$_POST["cmbidtipo_producto"];
		$lsidtipo_unidad=$_POST["cmbidtipo_unidad"];
		$lsidunidad_medida=$_POST["cmbidunidad_medida"];
		$lsestatus_pro=$_POST["txtestatus_pro"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjproducto= new class_producto();
		$lobjproducto->fsetiidproducto($liidproducto);	
		$lobjproducto->fsetsdesc_prod($lsdesc_prod);
		$lobjproducto->fsetsidtipo_producto($lsidtipo_producto);
		$lobjproducto->fsetsidtipo_unidad($lsidtipo_unidad);
		$lobjproducto->fsetsidunidad_medida($lsidunidad_medida);
		$lobjproducto->fsetsestatus_pro($lsestatus_pro);
	}
	if ($lsoperacion=="nuevo")
	{
		$liidproducto=$lobjproducto->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_producto&liidproducto=$liidproducto&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjproducto->fbuscar();
		if ($lbenc)
		{
			$liidproducto=$lobjproducto->fgetiidproducto();
			$lsdesc_prod=$lobjproducto->fgetsdesc_prod();
			$lsidtipo_producto=$lobjproducto->fgetsidtipo_producto();
			$lsidtipo_unidad=$lobjproducto->fgetsidtipo_unidad();
			$lsidunidad_medida=$lobjproducto->fgetsidunidad_medida();
			$lsestatus_pro=$lobjproducto->fgetsestatus_pro();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_producto&liidproducto=$liidproducto&lsdesc_prod=$lsdesc_prod&lsidtipo_producto=$lsidtipo_producto&lsidtipo_unidad=$lsidtipo_unidad&lsidunidad_medida=$lsidunidad_medida&lsestatus_pro=$lsestatus_pro&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjproducto->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_producto&av=5");
		}
		else 
		{
			$lbhecho=$lobjproducto->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_producto&av=1");
			}
		}
	}
	if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjproducto->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_producto&av=5");
		}
		else 
		{
			$lbhecho=$lobjproducto->fmodificar();
			if ($lbhecho)
			{
					header("location: ../vista/admin.php?url=maestro_producto&av=3");
			}
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjproducto->feliminar();   
		if ($lbhecho)
		{
				header("location: ../vista/admin.php?url=maestro_producto&av=7");
		}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjproducto->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_producto&av=9");
			}
	} 
?>
