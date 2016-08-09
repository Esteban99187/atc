<?php


    require_once("../modelo/class_ordcar.php");

    if(array_key_exists(txtoperacion,$_POST))
    {
    $liidorden_carga = isset($_POST['txtidorden_carga']) ? $_POST['txtidorden_carga'] : null;
    $lsidestatus_ordcar = isset($_POST['txtidestatus_ordcar']) ? $_POST['txtidestatus_ordcar'] : null;
    $lsidempresa = isset($_POST['txtidempresa']) ? $_POST['txtidempresa'] : null;
    $lsnombre_razon_social_emp = isset($_POST['txtnombre_razon_social_emp']) ? $_POST['txtnombre_razon_social_emp'] : null;
    $lsidremolque = isset($_POST['txtidremolque']) ? $_POST['txtidremolque'] : null;
    $lsplaca_rem = isset($_POST['txtplaca_rem']) ? $_POST['txtplaca_rem'] : null;
    $lsidsolicitud = isset($_POST['txtidsolicitud']) ? $_POST['txtidsolicitud'] : null;
    $lsnombre_pro = isset($_POST['txtnombre_pro']) ? $_POST['txtnombre_pro'] : null;
    $lstelefono_emp = isset($_POST['txttelefono_emp']) ? $_POST['txttelefono_emp'] : null;
    $lsplaca_uni = isset($_POST['txtplaca_uni']) ? $_POST['txtplaca_uni'] : null;
    $lsnombre_unimed = isset($_POST['txtnombre_unimed']) ? $_POST['txtnombre_unimed'] : null;
    $lspeso_sol = isset($_POST['txtpeso_sol']) ? $_POST['txtpeso_sol'] : null;
    $lscedula = isset($_POST['txtcedula']) ? $_POST['txtcedula'] : null;
    $lsidrelacion_unidad = isset($_POST['txtidrelacion_unidad']) ? $_POST['txtidrelacion_unidad'] : null;
    $lsnombres_per = isset($_POST['txtnombres_per']) ? $_POST['txtnombres_per'] : null;
    $lstelefono_corp_per = isset($_POST['txttelefono_corp_per']) ? $_POST['txttelefono_corp_per'] : null;
    $lsidunidad = isset($_POST['txtidunidad']) ? $_POST['txtidunidad'] : null;
    $lsdireccion_salida = isset($_POST['txtdireccion_salida']) ? $_POST['txtdireccion_salida'] : null;
    $lsdireccion_entrega = isset($_POST['txtdireccion_entrega']) ? $_POST['txtdireccion_entrega'] : null;
    $lsfecha_salida = isset($_POST['txtfecha_salida']) ? $_POST['txtfecha_salida'] : null;
    $lsfecha_entrega = isset($_POST['txtfecha_entrega']) ? $_POST['txtfecha_entrega'] : null;
    $lshora_ord = isset($_POST['txthora_ord']) ? $_POST['txthora_ord'] : null;
    $lsfecha_ord = isset($_POST['txtfecha_ord']) ? $_POST['txtfecha_ord'] : null;
    $lsoperacion = isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
    $lshacer = isset($_POST['txthacer']) ? $_POST['txthacer'] : null;

	$lobjordcar= new class_ordcar();
	$lobjordcar->fsetiidorden_carga($liidorden_carga);
	$lobjordcar->fsetsidestatus_ordcar($lsidestatus_ordcar);
	$lobjordcar->fsetsidempresa($lsidempresa);
	$lobjordcar->fsetsnombre_razon_social_emp($lsnombre_razon_social_emp);
	$lobjordcar->fsetsidremolque($lsidremolque);
	$lobjordcar->fsetsplaca_rem($lsplaca_rem);
	$lobjordcar->fsetsidsolicitud($lsidsolicitud);
	$lobjordcar->fsetsnombre_pro($lsnombre_pro);
	$lobjordcar->fsetstelefono_emp($lstelefono_emp);
	$lobjordcar->fsetsplaca_uni($lsplaca_uni);
	$lobjordcar->fsetsnombre_unimed($lsnombre_unimed);
	$lobjordcar->fsetspeso_sol($lspeso_sol);
	$lobjordcar->fsetscedula($lscedula);
	$lobjordcar->fsetsidrelacion_unidad($lsidrelacion_unidad);
	$lobjordcar->fsetsnombres_per($lsnombres_per);
	$lobjordcar->fsetstelefono_corp_per($lstelefono_corp_per);
	$lobjordcar->fsetsidunidad($lsidunidad);
	$lobjordcar->fsetsdireccion_salida($lsdireccion_salida);
	$lobjordcar->fsetsdireccion_entrega($lsdireccion_entrega);
	$lobjordcar->fsetsfecha_salida($lsfecha_salida);
	$lobjordcar->fsetsfecha_entrega($lsfecha_entrega);
	$lobjordcar->fsetshora_ord($lshora_ord);
	$lobjordcar->fsetsfecha_ord($lsfecha_ord);
    }

    if ($lsoperacion=="nuevo")
    {
        $liidorden_carga=$lobjordcar->fnuevo();
		$lsidempresa=$lobjordcar->fgetsidempresa();
		$lsnombre_razon_social_emp=$lobjordcar->fgetsnombre_razon_social_emp();
		$lsidremolque=$lobjordcar->fgetsidremolque();
		$lsplaca_rem=$lobjordcar->fgetsplaca_rem();
		$lsidsolicitud=$lobjordcar->fgetsidsolicitud();
		$lsnombre_pro=$lobjordcar->fgetsnombre_pro();
		$lstelefono_emp=$lobjordcar->fgetstelefono_emp();
		$lsplaca_uni=$lobjordcar->fgetsplaca_uni();
		$lsnombre_unimed=$lobjordcar->fgetsnombre_unimed();
		$lspeso_sol=$lobjordcar->fgetspeso_sol();
		$lscedula=$lobjordcar->fgetscedula();
		$lsidrelacion_unidad=$lobjordcar->fgetsidrelacion_unidad();
		$lsnombres_per=$lobjordcar->fgetsnombres_per();
		$lstelefono_corp_per=$lobjordcar->fgetstelefono_corp_per();
		$lsidunidad=$lobjordcar->fgetsidunidad();
		$lsdireccion_salida=$lobjordcar->fgetsdireccion_salida();
		$lsdireccion_entrega=$lobjordcar->fgetsdireccion_entrega();
		$lsfecha_salida=$lobjordcar->fgetsfecha_salida();
		$lsfecha_entrega=$lobjordcar->fgetsfecha_entrega();
		$lshora_ord=$lobjordcar->fgetshora_ord();
		$lsfecha_ord=$lobjordcar->fgetsfecha_ord();
		$lscedula_rep_ord=$lobjordcar->fgetscedula_rep_ord();
		$lsnombre_rep_ord=$lobjordcar->fgetsnombre_rep_ord();
		$lsapellido_rep_ord=$lobjordcar->fgetsapellido_rep_ord();

	$lihay=0;
	header("location: ../vista/admin.php?url=transaccion_ordcar&liidorden_carga=$liidorden_carga&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidsolicitud=$lsidsolicitud&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lshora_ord=$lshora_ord&lsfecha_ord=$lsfecha_ord&lscedula_rep_ord=$lscedula_rep_ord&lsnombre_rep_ord=$lsnombre_rep_ord&lsapellido_rep_ord=$lsapellido_rep_ord&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

    if ($lsoperacion=="buscar")
    {
    $lihay=0;
	$lbenc=$lobjordcar->fbuscar();
	if ($lbenc)
	{
            $lsidestatus_ordcar=$lobjordcar->fgetsidestatus_ordcar();
            $lsidempresa=$lobjordcar->fgetsidempresa();
            $lsnombre_razon_social_emp=$lobjordcar->fgetsnombre_razon_social_emp();
            $lsidremolque=$lobjordcar->fgetsidremolque();
            $lsplaca_rem=$lobjordcar->fgetsplaca_rem();
            $lsidsolicitud=$lobjordcar->fgetsidsolicitud();
            $lsnombre_pro=$lobjordcar->fgetsnombre_pro();
            $lstelefono_emp=$lobjordcar->fgetstelefono_emp();
            $lsplaca_uni=$lobjordcar->fgetsplaca_uni();
            $lsnombre_unimed=$lobjordcar->fgetsnombre_unimed();
            $lspeso_sol=$lobjordcar->fgetspeso_sol();
            $lscedula=$lobjordcar->fgetscedula();
            $lsidrelacion_unidad=$lobjordcar->fgetsidrelacion_unidad();
            $lsnombres_per=$lobjordcar->fgetsnombres_per();
            $lstelefono_corp_per=$lobjordcar->fgetstelefono_corp_per();
            $lsidunidad=$lobjordcar->fgetsidunidad();
            $lsdireccion_salida=$lobjordcar->fgetsdireccion_salida();
            $lsdireccion_entrega=$lobjordcar->fgetsdireccion_entrega();
            $lsfecha_salida=$lobjordcar->fgetsfecha_salida();
            $lsfecha_entrega=$lobjordcar->fgetsfecha_entrega();
            $lshora_ord=$lobjordcar->fgetshora_ord();
            $lsfecha_ord=$lobjordcar->fgetsfecha_ord();
            $lscedula_rep_ord=$lobjordcar->fgetscedula_rep_ord();
            $lsnombre_rep_ord=$lobjordcar->fgetsnombre_rep_ord();
            $lsapellido_rep_ord=$lobjordcar->fgetsapellido_rep_ord();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=transaccion_ordcar&liidorden_carga=$liidorden_carga&lsidestatus_ordcar=$lsidestatus_ordcar&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidsolicitud=$lsidsolicitud&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lshora_ord=$lshora_ord&lsfecha_ord=$lsfecha_ord&lscedula_rep_ord=$lscedula_rep_ord&lsnombre_rep_ord=$lsnombre_rep_ord&lsapellido_rep_ord=$lsapellido_rep_ord&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
    if ($lsoperacion=="buscar1")
    {
    $lihay1=0;
	$lbenc=$lobjordcar->fbuscar1();
	if ($lbenc)
	{
            $lsidestatus_ordcar=$lobjordcar->fgetsidestatus_ordcar();
            $lsidempresa=$lobjordcar->fgetsidempresa();
            $lsnombre_razon_social_emp=$lobjordcar->fgetsnombre_razon_social_emp();
            $lsidremolque=$lobjordcar->fgetsidremolque();
            $lsplaca_rem=$lobjordcar->fgetsplaca_rem();
            $lsidsolicitud=$lobjordcar->fgetsidsolicitud();
            $lsnombre_pro=$lobjordcar->fgetsnombre_pro();
            $lstelefono_emp=$lobjordcar->fgetstelefono_emp();
            $lsplaca_uni=$lobjordcar->fgetsplaca_uni();
            $lsnombre_unimed=$lobjordcar->fgetsnombre_unimed();
            $lspeso_sol=$lobjordcar->fgetspeso_sol();
            $lscedula=$lobjordcar->fgetscedula();
            $lsidrelacion_unidad=$lobjordcar->fgetsidrelacion_unidad();
            $lsnombres_per=$lobjordcar->fgetsnombres_per();
            $lstelefono_corp_per=$lobjordcar->fgetstelefono_corp_per();
            $lsidunidad=$lobjordcar->fgetsidunidad();
            $lsdireccion_salida=$lobjordcar->fgetsdireccion_salida();
            $lsdireccion_entrega=$lobjordcar->fgetsdireccion_entrega();
            $lsfecha_salida=$lobjordcar->fgetsfecha_salida();
            $lsfecha_entrega=$lobjordcar->fgetsfecha_entrega();
            $lshora_ord=$lobjordcar->fgetshora_ord();
            $lsfecha_ord=$lobjordcar->fgetsfecha_ord();
            $lscedula_rep_ord=$lobjordcar->fgetscedula_rep_ord();
            $lsnombre_rep_ord=$lobjordcar->fgetsnombre_rep_ord();
            $lsapellido_rep_ord=$lobjordcar->fgetsapellido_rep_ord();
            $lihay1=1;
	}
	header("location: ../vista/admin.php?url=transaccion_ordcar&liidorden_carga=$liidorden_carga&lsidestatus_ordcar=$lsidestatus_ordcar&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidsolicitud=$lsidsolicitud&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lshora_ord=$lshora_ord&lsfecha_ord=$lsfecha_ord&lscedula_rep_ord=$lscedula_rep_ord&lsnombre_rep_ord=$lsnombre_rep_ord&lsapellido_rep_ord=$lsapellido_rep_ord&lihay1=$lihay1&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

    if ($lsoperacion=="buscar2")
    {
    $lihay2=0;
	$lbenc=$lobjordcar->fbuscar2();
	if ($lbenc)
	{
            $lsidestatus_ordcar=$lobjordcar->fgetsidestatus_ordcar();
            $lsidempresa=$lobjordcar->fgetsidempresa();
            $lsnombre_razon_social_emp=$lobjordcar->fgetsnombre_razon_social_emp();
            $lsidremolque=$lobjordcar->fgetsidremolque();
            $lsplaca_rem=$lobjordcar->fgetsplaca_rem();
            $lsidsolicitud=$lobjordcar->fgetsidsolicitud();
            $lsnombre_pro=$lobjordcar->fgetsnombre_pro();
            $lstelefono_emp=$lobjordcar->fgetstelefono_emp();
            $lsplaca_uni=$lobjordcar->fgetsplaca_uni();
            $lsnombre_unimed=$lobjordcar->fgetsnombre_unimed();
            $lspeso_sol=$lobjordcar->fgetspeso_sol();
            $lscedula=$lobjordcar->fgetscedula();
            $lsidrelacion_unidad=$lobjordcar->fgetsidrelacion_unidad();
            $lsnombres_per=$lobjordcar->fgetsnombres_per();
            $lstelefono_corp_per=$lobjordcar->fgetstelefono_corp_per();
            $lsidunidad=$lobjordcar->fgetsidunidad();
            $lsdireccion_salida=$lobjordcar->fgetsdireccion_salida();
            $lsdireccion_entrega=$lobjordcar->fgetsdireccion_entrega();
            $lsfecha_salida=$lobjordcar->fgetsfecha_salida();
            $lsfecha_entrega=$lobjordcar->fgetsfecha_entrega();
            $lshora_ord=$lobjordcar->fgetshora_ord();
            $lsfecha_ord=$lobjordcar->fgetsfecha_ord();
            $lscedula_rep_ord=$lobjordcar->fgetscedula_rep_ord();
            $lsnombre_rep_ord=$lobjordcar->fgetsnombre_rep_ord();
            $lsapellido_rep_ord=$lobjordcar->fgetsapellido_rep_ord();
            $lihay2=1;
	}
	header("location: ../vista/admin.php?url=transaccion_ordcar&liidorden_carga=$liidorden_carga&lsidestatus_ordcar=$lsidestatus_ordcar&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidsolicitud=$lsidsolicitud&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lshora_ord=$lshora_ord&lsfecha_ord=$lsfecha_ord&lscedula_rep_ord=$lscedula_rep_ord&lsnombre_rep_ord=$lsnombre_rep_ord&lsapellido_rep_ord=$lsapellido_rep_ord&lihay2=$lihay2&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjordcar->fincluir();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="IncluirOrden")
	{
		$lbhecho=$lobjordcar->IncluirOrden();
		if ($lbhecho)
		{
			header("location: ../vista/reporte/pdfRep_Ordencarga.php?lsa=$liidorden_carga");
		}
	}
    if ($lsoperacion=="modificar")
    {
        $lbhecho=$lobjordcar->fmodificar();
		if ($lbhecho)
		{
				$lshacer="listo";
		}
    }

    if ($lsoperacion=="eliminar")
    {
        $lbhecho=$lobjordcar->feliminar();
	if ($lbhecho)
	{
            $lshacer="listo";
	}
    }

    if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo")&&($lsoperacion!="buscar1")&&($lsoperacion!="buscar2")&&($lsoperacion!="IncluirOrden"))
    {
        header("location: ../vista/admin.php?url=transaccion_ordcar&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

?>
