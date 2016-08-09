<?php
	require_once("../modelo/class_remolque.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidremolque=$_POST["txtidremolque"];
		$lsserial_carroceria_rem=$_POST["txtserial_carroceria_rem"];
		$lsobservaciones_rem=$_POST["txtobservaciones_rem"];
		$lsactivado_rem=$_POST["txtactivado_rem"];
		$lsidmarca_remolque=$_POST["cmbidmarca_remolque"];
		$lsidmodelo_remolque=$_POST["cmbidmodelo_remolque"];
		$lsidtipo_remolque=$_POST["cmbidtipo_remolque"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjremolque= new class_remolque();
		$lobjremolque->fsetiidremolque($liidremolque);
		$lobjremolque->fsetsserial_carroceria_rem($lsserial_carroceria_rem);
		$lobjremolque->fsetsobservaciones_rem($lsobservaciones_rem);
		$lobjremolque->fsetsactivado_rem($lsactivado_rem);
		$lobjremolque->fsetsidmarca_remolque($lsidmarca_remolque);
		$lobjremolque->fsetsidmodelo_remolque($lsidmodelo_remolque);
		$lobjremolque->fsetsidtipo_remolque($lsidtipo_remolque);
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjremolque->fbuscar();
		if ($lbenc)
		{
			$lsserial_carroceria_rem=$lobjremolque->fgetsserial_carroceria_rem();
			$lsobservaciones_rem=$lobjremolque->fgetsobservaciones_rem();
			$lsactivado_rem=$lobjremolque->fgetsactivado_rem();
			$lsidmodelo_remolque=$lobjremolque->fgetsidmodelo_remolque();
			$lsidmarca_remolque=$lobjremolque->fgetsidmarca_remolque();
			$lsidtipo_remolque=$lobjremolque->fgetsidtipo_remolque();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_remolque&liidremolque=$liidremolque&lsserial_carroceria_rem=$lsserial_carroceria_rem&lsobservaciones_rem=$lsobservaciones_rem&lsactivado_rem=$lsactivado_rem&lsidmarca_remolque=$lsidmarca_remolque&&lsidmodelo_remolque=$lsidmodelo_remolque&lsidtipo_remolque=$lsidtipo_remolque&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjremolque->fincluir();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_remolque&av=1");
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjremolque->fmodificar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_remolque&av=3");
		}
	}
	if ($lsoperacion=="desactivar")
	{
		$lbhecho=$lobjremolque->fdesactivar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_remolque&av=7");
		}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjremolque->factivar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_remolque&av=9");
		}
	}
?>
