<?php
	require_once("../modelo/class_reluni.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidrelacion_unidad=$_POST["txtidrelacion_unidad"];
		$lsidestatus=$_POST["txtidestatus"];
		$lsidunidad=$_POST["txtidunidad"];
		$lsplaca_uni=$_POST["txtplaca_uni"];
		$lsnombre_mar=$_POST["txtnombre_mar"];
		$lsidremolque=$_POST["txtidremolque"];
		$lsplaca_rem=$_POST["txtplaca_rem"];
		$lsnombre_marrem=$_POST["txtnombre_marrem"];
		$lsnombre_tipuni=$_POST["txtnombre_tipuni"];
		$lsnombre_tiprem=$_POST["txtnombre_tiprem"];
		$lscedula=$_POST["txtcedula"];
		$lsnombres_per=$_POST["txtnombres_per"];
		$lsapellidos_per=$_POST["txtapellidos_per"];
		$lstelefono_corp_per=$_POST["txttelefono_corp_per"];
		$lshora_rel=$_POST["txthora_rel"];
		$lsfecha_rel=$_POST["txtfecha_rel"];
		$lscedula_res=$_POST["txtcedula_res"];
		$lsnombre_res=$_POST["txtnombre_res"];
		$lsapellido_res=$_POST["txtapellido_res"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjreluni= new class_reluni();
		$lobjreluni->fsetiidrelacion_unidad($liidrelacion_unidad);
		$lobjreluni->fsetsidestatus($lsidestatus);
		$lobjreluni->fsetsidunidad($lsidunidad);
		$lobjreluni->fsetsplaca_uni($lsplaca_uni);
		$lobjreluni->fsetsnombre_mar($lsnombre_mar);
		$lobjreluni->fsetsidremolque($lsidremolque);
		$lobjreluni->fsetsplaca_rem($lsplaca_rem);
		$lobjreluni->fsetsnombre_marrem($lsnombre_marrem);
		$lobjreluni->fsetsnombre_tipuni($lsnombre_tipuni);
		$lobjreluni->fsetsnombre_tiprem($lsnombre_tiprem);
		$lobjreluni->fsetscedula($lscedula);
		$lobjreluni->fsetsnombres_per($lsnombres_per);
		$lobjreluni->fsetsapellidos_per($lsapellidos_per);
		$lobjreluni->fsetstelefono_corp_per($lstelefono_corp_per);
		$lobjreluni->fsetshora_rel($lshora_rel);
		$lobjreluni->fsetsfecha_rel($lsfecha_rel);
		$lobjreluni->fsetscedula_res($lscedula_res);
		$lobjreluni->fsetsnombre_res($lsnombre_res);
		$lobjreluni->fsetsapellido_res($lsapellido_res);
	}
	if ($lsoperacion=="nuevo")
	{
		$liidrelacion_unidad=$lobjreluni->fnuevo();
		$lsidunidad=$lobjreluni->fgetsidunidad();
		$lsplaca_uni=$lobjreluni->fgetsplaca_uni();
		$lsnombre_mar=$lobjreluni->fgetsnombre_mar();
		$lsnombre_tipuni=$lobjreluni->fgetsnombre_tipuni();
		$lsidremolque=$lobjreluni->fgetsidremolque();
		$lsplaca_rem=$lobjreluni->fgetsplaca_rem();
		$lsnombre_marrem=$lobjreluni->fgetsnombre_marrem();
		$lsnombre_tiprem=$lobjreluni->fgetsnombre_tiprem();
		$lscedula=$lobjreluni->fgetscedula();
		$lsnombres_per=$lobjreluni->fgetsnombres_per();
		$lsapellidos_per=$lobjreluni->fgetsapellidos_per();
		$lstelefono_corp_per=$lobjreluni->fgetstelefono_corp_per();
		$lihay=0;
		header("location: ../vista/admin.php?url=transaccion_reluni&liidrelacion_unidad=$liidrelacion_unidad&lsidunidad=$lsidunidad&lsplaca_uni=$lsplaca_uni&lsnombre_mar=$lsnombre_mar&lsnombre_tipuni=$lsnombre_tipuni&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsnombre_marrem=$lsnombre_marrem&lsnombre_tiprem=$lsnombre_tiprem&lscedula=$lscedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_corp_per=$lstelefono_corp_per&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjreluni->fbuscar();
		if ($lbenc)
		{
			$lsidestatus=$lobjreluni->fgetsidestatus();
			$lsidunidad=$lobjreluni->fgetsidunidad();
			$lsplaca_uni=$lobjreluni->fgetsplaca_uni();
			$lsnombre_mar=$lobjreluni->fgetsnombre_mar();
			$lsidremolque=$lobjreluni->fgetsidremolque();
			$lsplaca_rem=$lobjreluni->fgetsplaca_rem();
			$lsnombre_marrem=$lobjreluni->fgetsnombre_marrem();
			$lsnombre_tipuni=$lobjreluni->fgetsnombre_tipuni();
			$lsnombre_tiprem=$lobjreluni->fgetsnombre_tiprem();
			$lscedula=$lobjreluni->fgetscedula();
			$lsnombres_per=$lobjreluni->fgetsnombres_per();
			$lsapellidos_per=$lobjreluni->fgetsapellidos_per();
			$lstelefono_corp_per=$lobjreluni->fgetstelefono_corp_per();
			$lshora_rel=$lobjreluni->fgetshora_rel();
			$lsfecha_rel=$lobjreluni->fgetsfecha_rel();
			$lscedula_res=$lobjreluni->fgetscedula_res();
			$lsnombre_res=$lobjreluni->fgetsnombre_res();
			$lsapellido_res=$lobjreluni->fgetsapellido_res();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=transaccion_reluni&liidrelacion_unidad=$liidrelacion_unidad&lsidestatus=$lsidestatus&lsidunidad=$lsidunidad&lsplaca_uni=$lsplaca_uni&lsnombre_mar=$lsnombre_mar&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsnombre_marrem=$lsnombre_marrem&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_tiprem=$lsnombre_tiprem&lscedula=$lscedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_corp_per=$lstelefono_corp_per&lshora_rel=$lshora_rel&lsfecha_rel=$lsfecha_rel&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar1")
	{
		$lihay1=0;
		$lbenc=$lobjreluni->fbuscar1();
		if ($lbenc)
		{
			$lsidestatus=$lobjreluni->fgetsidestatus();
			$lsidunidad=$lobjreluni->fgetsidunidad();
			$lsplaca_uni=$lobjreluni->fgetsplaca_uni();
			$lsnombre_mar=$lobjreluni->fgetsnombre_mar();
			$lsidremolque=$lobjreluni->fgetsidremolque();
			$lsplaca_rem=$lobjreluni->fgetsplaca_rem();
			$lsnombre_marrem=$lobjreluni->fgetsnombre_marrem();
			$lsnombre_tipuni=$lobjreluni->fgetsnombre_tipuni();
			$lsnombre_tiprem=$lobjreluni->fgetsnombre_tiprem();
			$lscedula=$lobjreluni->fgetscedula();
			$lsnombres_per=$lobjreluni->fgetsnombres_per();
			$lsapellidos_per=$lobjreluni->fgetsapellidos_per();
			$lstelefono_corp_per=$lobjreluni->fgetstelefono_corp_per();
			$lshora_rel=$lobjreluni->fgetshora_rel();
			$lsfecha_rel=$lobjreluni->fgetsfecha_rel();
			$lscedula_res=$lobjreluni->fgetscedula_res();
			$lsnombre_res=$lobjreluni->fgetsnombre_res();
			$lsapellido_res=$lobjreluni->fgetsapellido_res();
			$lihay1=1;
		}
		header("location: ../vista/admin.php?url=transaccion_reluni&liidrelacion_unidad=$liidrelacion_unidad&lsidestatus=$lsidestatus&lsidunidad=$lsidunidad&lsplaca_uni=$lsplaca_uni&lsnombre_mar=$lsnombre_mar&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsnombre_marrem=$lsnombre_marrem&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_tiprem=$lsnombre_tiprem&lscedula=$lscedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_corp_per=$lstelefono_corp_per&lshora_rel=$lshora_rel&lsfecha_rel=$lsfecha_rel&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay1=$lihay1&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar2")
	{
		$lihay2=0;
		$lbenc=$lobjreluni->fbuscar2();
		if ($lbenc)
		{
			$lsidunidad=$lobjreluni->fgetsidunidad();
			$lsplaca_uni=$lobjreluni->fgetsplaca_uni();
			$lsnombre_mar=$lobjreluni->fgetsnombre_mar();
			$lsnombre_tipuni=$lobjreluni->fgetsnombre_tipuni();
			$lihay2=1;
		}
		header("location: ../vista/admin.php?url=transaccion_reluni&liidrelacion_unidad=$liidrelacion_unidad&lsidestatus=$lsidestatus&lsidunidad=$lsidunidad&lsplaca_uni=$lsplaca_uni&lsnombre_mar=$lsnombre_mar&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsnombre_marrem=$lsnombre_marrem&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_tiprem=$lsnombre_tiprem&lscedula=$lscedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_corp_per=$lstelefono_corp_per&lshora_rel=$lshora_rel&lsfecha_rel=$lsfecha_rel&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay2=$lihay2&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar3")
	{
		$lihay3=0;
		$lbenc=$lobjreluni->fbuscar3();
		if ($lbenc)
		{
			$lsidestatus=$lobjreluni->fgetsidestatus();
			$lsidunidad=$lobjreluni->fgetsidunidad();
			$lsplaca_uni=$lobjreluni->fgetsplaca_uni();
			$lsnombre_mar=$lobjreluni->fgetsnombre_mar();
			$lsidremolque=$lobjreluni->fgetsidremolque();
			$lsplaca_rem=$lobjreluni->fgetsplaca_rem();
			$lsnombre_marrem=$lobjreluni->fgetsnombre_marrem();
			$lsnombre_tipuni=$lobjreluni->fgetsnombre_tipuni();
			$lsnombre_tiprem=$lobjreluni->fgetsnombre_tiprem();
			$lscedula=$lobjreluni->fgetscedula();
			$lsnombres_per=$lobjreluni->fgetsnombres_per();
			$lsapellidos_per=$lobjreluni->fgetsapellidos_per();
			$lstelefono_corp_per=$lobjreluni->fgetstelefono_corp_per();
			$lshora_rel=$lobjreluni->fgetshora_rel();
			$lsfecha_rel=$lobjreluni->fgetsfecha_rel();
			$lscedula_res=$lobjreluni->fgetscedula_res();
			$lsnombre_res=$lobjreluni->fgetsnombre_res();
			$lsapellido_res=$lobjreluni->fgetsapellido_res();
			$lihay3=1;
		}
		header("location: ../vista/admin.php?url=transaccion_reluni&liidrelacion_unidad=$liidrelacion_unidad&lsidestatus=$lsidestatus&lsidunidad=$lsidunidad&lsplaca_uni=$lsplaca_uni&lsnombre_mar=$lsnombre_mar&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsnombre_marrem=$lsnombre_marrem&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_tiprem=$lsnombre_tiprem&lscedula=$lscedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_corp_per=$lstelefono_corp_per&lshora_rel=$lshora_rel&lsfecha_rel=$lsfecha_rel&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay3=$lihay3&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjreluni->fincluir();
		if ($lbhecho)
		{
						echo '<script type="text/javascript"> alert("Seleccione el equipo"); </script>';
			header("location: ../vista/admin.php?url=transaccion_reluni&av=1");
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjreluni->fmodificar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=transaccion_reluni&av=3");
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjreluni->feliminar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	
?>
