<?php
	require_once("../modelo/class_unidad.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidunidad=$_POST["txtidunidad"];
		$lsserial_motor=$_POST["txtserial_motor"];
		$lsserial_carroceria=$_POST["txtserial_carroceria"];
		$lsplaca=$_POST["txtplaca"];
		$lsobservaciones=$_POST["txtobservaciones"];
		$lsactivado_uni=$_POST["txtactivado_uni"];
		$lsidmarca_unidad=$_POST["cmbidmarca_unidad"];
		$lsidmodelo_unidad=$_POST["cmbidmodelo_unidad"];
		$lsidtipo_unidad=$_POST["cmbidtipo_unidad"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjunidad= new class_unidad();
		$lobjunidad->fsetiidunidad($liidunidad);
		$lobjunidad->fsetsserial_motor($lsserial_motor);
		$lobjunidad->fsetsserial_carroceria($lsserial_carroceria);
		$lobjunidad->fsetsplaca($lsplaca);
		$lobjunidad->fsetsobservaciones($lsobservaciones);
		$lobjunidad->fsetsactivado_uni($lsactivado_uni);
		$lobjunidad->fsetsidmarca_unidad($lsidmarca_unidad);
		$lobjunidad->fsetsidmodelo_unidad($lsidmodelo_unidad);
		$lobjunidad->fsetsidtipo_unidad($lsidtipo_unidad);
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjunidad->fbuscar();
		if ($lbenc)
		{
			$lsserial_motor=$lobjunidad->fgetsserial_motor();
			$lsserial_carroceria=$lobjunidad->fgetsserial_carroceria();
			$lsplaca=$lobjunidad->fgetsplaca();
			$lsobservaciones=$lobjunidad->fgetsobservaciones();
			$lsactivado_uni=$lobjunidad->fgetsactivado_uni();
			$lsidmodelo_unidad=$lobjunidad->fgetsidmodelo_unidad();
			$lsidmarca_unidad=$lobjunidad->fgetsidmarca_unidad();
			$lsidtipo_unidad=$lobjunidad->fgetsidtipo_unidad();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_unidad&liidunidad=$liidunidad&lsserial_motor=$lsserial_motor&lsserial_carroceria=$lsserial_carroceria&lsplaca=$lsplaca&lsobservaciones=$lsobservaciones&lsactivado_uni=$lsactivado_uni&lsidmarca_unidad=$lsidmarca_unidad&&lsidmodelo_unidad=$lsidmodelo_unidad&lsidtipo_unidad=$lsidtipo_unidad&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjunidad->fincluir();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_unidad&av=1");
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjunidad->fmodificar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_unidad&av=3");
		}
	}
	if ($lsoperacion=="desactivar")
	{
		$lbhecho=$lobjunidad->fdesactivar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_unidad&av=7");
		}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjunidad->factivar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_unidad&av=9");
		}
	}
?>
