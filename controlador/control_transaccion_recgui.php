<?php


    require_once("../modelo/class_recgui.php");

    if(array_key_exists(txtoperacion,$_POST))
    {


	$liidrecepcion_guia = isset($_POST['txtidrecepcion_guia']) ? $_POST['txtidrecepcion_guia'] : null;
  $lsn_guia = isset($_POST['txtn_guia']) ? $_POST['txtn_guia'] : null;
  $lsidempresa = isset($_POST['txtidempresa']) ? $_POST['txtidempresa'] : null;
	$lsnombre_razon_social_emp = isset($_POST['txtnombre_razon_social_empa']) ? $_POST['txtnombre_razon_social_emp'] : null;
  $lsidremolque = isset($_POST['txtidremolque']) ? $_POST['txtidremolque'] : null;
  $lsplaca_rem = isset($_POST['txtplaca_rem']) ? $_POST['txtplaca_rem'] : null;
  $lsidorden_carga = isset($_POST['txtidorden_carga']) ? $_POST['txtidorden_carga'] : null;
  $lsnombre_pro = isset($_POST['txtnombre_pro']) ? $_POST['txtnombre_pro'] : null;
  $lstelefono_emp = isset($_POST['txttelefono_emp']) ? $_POST['txttelefono_emp'] : null;
  $lsplaca_uni = isset($_POST['txtplaca_uni']) ? $_POST['txtplaca_uni'] : null;
  $lsnombre_unimed= isset($_POST['txtnombre_unimed']) ? $_POST['txtnombre_unimed'] : null;
  $lspeso_sol= isset($_POST['txtpeso_sol']) ? $_POST['txtpeso_sol'] : null;
  $lscedula= isset($_POST['txtcedula']) ? $_POST['txtcedula'] : null;
  $lsidrelacion_unidad= isset($_POST['txtidrelacion_unidad']) ? $_POST['txtidrelacion_unidad'] : null;
	$lsnombres_per= isset($_POST['txtnombres_per']) ? $_POST['txtnombres_per'] : null;
  $lstelefono_corp_per= isset($_POST['txttelefono_corp_per']) ? $_POST['txttelefono_corp_per'] : null;
	$lsidunidad= isset($_POST['txtidunidad']) ? $_POST['txtidunidad'] : null;
  $lsdireccion_salida= isset($_POST['txtdireccion_salida']) ? $_POST['txtdireccion_salida'] : null;
  $lsdireccion_entrega= isset($_POST['txtdireccion_entrega']) ? $_POST['txtdireccion_entrega'] : null;
  $lsfecha_salida= isset($_POST['txtfecha_salida']) ? $_POST['txtfecha_salida'] : null;
  $lsfecha_entrega= isset($_POST['txtfecha_entrega']) ? $_POST['txtfecha_entrega'] : null;
  $lsobservacion_rec= isset($_POST['txtobservacion_rec']) ? $_POST['txtobservacion_rec'] : null;
  $lshora_rec= isset($_POST['txthora_rec']) ? $_POST['txthora_rec'] : null;
  $lsfecha_rec= isset($_POST['txtfecha_rec']) ? $_POST['txtfecha_rec'] : null;
  $lscedula_rep_rec= isset($_POST['txtcedula_rep_rec']) ? $_POST['txtcedula_rep_rec'] : null;
  $lsnombre_rep_rec= isset($_POST['txtnombre_rep_rec']) ? $_POST['txtnombre_rep_rec'] : null;
  $lsapellido_rep_rec= isset($_POST['txtapellido_rep_rec']) ? $_POST['txtapellido_rep_rec'] : null;
  $lsoperacion= isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
	$lshacer= isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
	$lobjrecgui= new class_recgui();
	$lobjrecgui->fsetiidrecepcion_guia($liidrecepcion_guia);
	$lobjrecgui->fsetsn_guia($lsn_guia);
	$lobjrecgui->fsetsidempresa($lsidempresa);
	$lobjrecgui->fsetsnombre_razon_social_emp($lsnombre_razon_social_emp);
	$lobjrecgui->fsetsidremolque($lsidremolque);
	$lobjrecgui->fsetsplaca_rem($lsplaca_rem);
	$lobjrecgui->fsetsidorden_carga($lsidorden_carga);
	$lobjrecgui->fsetsnombre_pro($lsnombre_pro);
	$lobjrecgui->fsetstelefono_emp($lstelefono_emp);
	$lobjrecgui->fsetsplaca_uni($lsplaca_uni);
	$lobjrecgui->fsetsnombre_unimed($lsnombre_unimed);
	$lobjrecgui->fsetspeso_sol($lspeso_sol);
	$lobjrecgui->fsetscedula($lscedula);
	$lobjrecgui->fsetsidrelacion_unidad($lsidrelacion_unidad);
	$lobjrecgui->fsetsnombres_per($lsnombres_per);
	$lobjrecgui->fsetstelefono_corp_per($lstelefono_corp_per);
	$lobjrecgui->fsetsidunidad($lsidunidad);
	$lobjrecgui->fsetsdireccion_salida($lsdireccion_salida);
	$lobjrecgui->fsetsdireccion_entrega($lsdireccion_entrega);
	$lobjrecgui->fsetsfecha_salida($lsfecha_salida);
	$lobjrecgui->fsetsfecha_entrega($lsfecha_entrega);
	$lobjrecgui->fsetsobservacion_rec($lsobservacion_rec);
	$lobjrecgui->fsetshora_rec($lshora_rec);
	$lobjrecgui->fsetsfecha_rec($lsfecha_rec);
	$lobjrecgui->fsetscedula_rep_rec($lscedula_rep_rec);
	$lobjrecgui->fsetsnombre_rep_rec($lsnombre_rep_rec);
	$lobjrecgui->fsetsapellido_rep_rec($lsapellido_rep_rec);
    }

    if ($lsoperacion=="nuevo")
    {
        $liidrecepcion_guia=$lobjrecgui->fnuevo();
		$lsidempresa=$lobjrecgui->fgetsidempresa();
		$lsn_guia=$lobjrecgui->fgetsn_guia();
		$lsnombre_razon_social_emp=$lobjrecgui->fgetsnombre_razon_social_emp();
		$lsidremolque=$lobjrecgui->fgetsidremolque();
		$lsplaca_rem=$lobjrecgui->fgetsplaca_rem();
		$lsidorden_carga=$lobjrecgui->fgetsidorden_carga();
		$lsnombre_pro=$lobjrecgui->fgetsnombre_pro();
		$lstelefono_emp=$lobjrecgui->fgetstelefono_emp();
		$lsplaca_uni=$lobjrecgui->fgetsplaca_uni();
		$lsnombre_unimed=$lobjrecgui->fgetsnombre_unimed();
		$lspeso_sol=$lobjrecgui->fgetspeso_sol();
		$lscedula=$lobjrecgui->fgetscedula();
		$lsidrelacion_unidad=$lobjrecgui->fgetsidrelacion_unidad();
		$lsnombres_per=$lobjrecgui->fgetsnombres_per();
		$lstelefono_corp_per=$lobjrecgui->fgetstelefono_corp_per();
		$lsidunidad=$lobjrecgui->fgetsidunidad();
		$lsdireccion_salida=$lobjrecgui->fgetsdireccion_salida();
		$lsdireccion_entrega=$lobjrecgui->fgetsdireccion_entrega();
		$lsfecha_salida=$lobjrecgui->fgetsfecha_salida();
		$lsfecha_entrega=$lobjrecgui->fgetsfecha_entrega();
		$lsobservacion_rec=$lobjrecgui->fgetsobservacion_rec();
		$lshora_rec=$lobjrecgui->fgetshora_rec();
		$lsfecha_rec=$lobjrecgui->fgetsfecha_rec();
		$lscedula_rep_rec=$lobjrecgui->fgetscedula_rep_rec();
		$lsnombre_rep_rec=$lobjrecgui->fgetsnombre_rep_rec();
		$lsapellido_rep_rec=$lobjrecgui->fgetsapellido_rep_rec();

	$lihay=0;
	header("location: ../vista/admin.php?url=transaccion_recgui&liidrecepcion_guia=$liidrecepcion_guia&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidorden_carga=$lsidorden_carga&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservacion_rec=$lsobservacion_rec&lshora_rec=$lshora_rec&lsfecha_rec=$lsfecha_rec&lscedula_rep_rec=$lscedula_rep_rec&lsnombre_rep_rec=$lsnombre_rep_rec&lsapellido_rep_rec=$lsapellido_rep_rec&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

    if ($lsoperacion=="buscar")
    {
    $lihay=0;
	$lbenc=$lobjrecgui->fbuscar();
	if ($lbenc)
	{
            $lsn_guia=$lobjrecgui->fgetsn_guia();
            $lsidempresa=$lobjrecgui->fgetsidempresa();
            $lsnombre_razon_social_emp=$lobjrecgui->fgetsnombre_razon_social_emp();
            $lsidremolque=$lobjrecgui->fgetsidremolque();
            $lsplaca_rem=$lobjrecgui->fgetsplaca_rem();
            $lsidorden_carga=$lobjrecgui->fgetsidorden_carga();
            $lsnombre_pro=$lobjrecgui->fgetsnombre_pro();
            $lstelefono_emp=$lobjrecgui->fgetstelefono_emp();
            $lsplaca_uni=$lobjrecgui->fgetsplaca_uni();
            $lsnombre_unimed=$lobjrecgui->fgetsnombre_unimed();
            $lspeso_sol=$lobjrecgui->fgetspeso_sol();
            $lscedula=$lobjrecgui->fgetscedula();
            $lsidrelacion_unidad=$lobjrecgui->fgetsidrelacion_unidad();
            $lsnombres_per=$lobjrecgui->fgetsnombres_per();
            $lstelefono_corp_per=$lobjrecgui->fgetstelefono_corp_per();
            $lsidunidad=$lobjrecgui->fgetsidunidad();
            $lsdireccion_salida=$lobjrecgui->fgetsdireccion_salida();
            $lsdireccion_entrega=$lobjrecgui->fgetsdireccion_entrega();
            $lsfecha_salida=$lobjrecgui->fgetsfecha_salida();
            $lsfecha_entrega=$lobjrecgui->fgetsfecha_entrega();
            $lsobservacion_rec=$lobjrecgui->fgetsobservacion_rec();
            $lshora_rec=$lobjrecgui->fgetshora_rec();
            $lsfecha_rec=$lobjrecgui->fgetsfecha_rec();
            $lscedula_rep_rec=$lobjrecgui->fgetscedula_rep_rec();
            $lsnombre_rep_rec=$lobjrecgui->fgetsnombre_rep_rec();
            $lsapellido_rep_rec=$lobjrecgui->fgetsapellido_rep_rec();
            $lihay=1;
	}
	header("location: ../vista/admin.php?url=transaccion_recgui&liidrecepcion_guia=$liidrecepcion_guia&lsn_guia=$lsn_guia&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidorden_carga=$lsidorden_carga&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservacion_rec=$lsobservacion_rec&lshora_rec=$lshora_rec&lsfecha_rec=$lsfecha_rec&lscedula_rep_rec=$lscedula_rep_rec&lsnombre_rep_rec=$lsnombre_rep_rec&lsapellido_rep_rec=$lsapellido_rep_rec&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }
    if ($lsoperacion=="buscar1")
    {
    $lihay1=0;
	$lbenc=$lobjrecgui->fbuscar1();
	if ($lbenc)
	{
            $lsn_guia=$lobjrecgui->fgetsn_guia();
            $lsidempresa=$lobjrecgui->fgetsidempresa();
            $lsnombre_razon_social_emp=$lobjrecgui->fgetsnombre_razon_social_emp();
            $lsidremolque=$lobjrecgui->fgetsidremolque();
            $lsplaca_rem=$lobjrecgui->fgetsplaca_rem();
            $lsidorden_carga=$lobjrecgui->fgetsidorden_carga();
            $lsnombre_pro=$lobjrecgui->fgetsnombre_pro();
            $lstelefono_emp=$lobjrecgui->fgetstelefono_emp();
            $lsplaca_uni=$lobjrecgui->fgetsplaca_uni();
            $lsnombre_unimed=$lobjrecgui->fgetsnombre_unimed();
            $lspeso_sol=$lobjrecgui->fgetspeso_sol();
            $lscedula=$lobjrecgui->fgetscedula();
            $lsidrelacion_unidad=$lobjrecgui->fgetsidrelacion_unidad();
            $lsnombres_per=$lobjrecgui->fgetsnombres_per();
            $lstelefono_corp_per=$lobjrecgui->fgetstelefono_corp_per();
            $lsidunidad=$lobjrecgui->fgetsidunidad();
            $lsdireccion_salida=$lobjrecgui->fgetsdireccion_salida();
            $lsdireccion_entrega=$lobjrecgui->fgetsdireccion_entrega();
            $lsfecha_salida=$lobjrecgui->fgetsfecha_salida();
            $lsfecha_entrega=$lobjrecgui->fgetsfecha_entrega();
            $lsobservacion_rec=$lobjrecgui->fgetsobservacion_rec();
            $lshora_rec=$lobjrecgui->fgetshora_rec();
            $lsfecha_rec=$lobjrecgui->fgetsfecha_rec();
            $lscedula_rep_rec=$lobjrecgui->fgetscedula_rep_rec();
            $lsnombre_rep_rec=$lobjrecgui->fgetsnombre_rep_rec();
            $lsapellido_rep_rec=$lobjrecgui->fgetsapellido_rep_rec();
            $lihay1=1;
	}
	header("location: ../vista/admin.php?url=transaccion_recgui&liidrecepcion_guia=$liidrecepcion_guia&lsn_guia=$lsn_guia&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lsidremolque=$lsidremolque&lsplaca_rem=$lsplaca_rem&lsidorden_carga=$lsidorden_carga&lsnombre_pro=$lsnombre_pro&lstelefono_emp=$lstelefono_emp&lsplaca_uni=$lsplaca_uni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lscedula=$lscedula&lsidrelacion_unidad=$lsidrelacion_unidad&lsnombres_per=$lsnombres_per&lstelefono_corp_per=$lstelefono_corp_per&lsidunidad=$lsidunidad&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservacion_rec=$lsobservacion_rec&lshora_rec=$lshora_rec&lsfecha_rec=$lsfecha_rec&lscedula_rep_rec=$lscedula_rep_rec&lsnombre_rep_rec=$lsnombre_rep_rec&lsapellido_rep_rec=$lsapellido_rep_rec&lihay1=$lihay1&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }



	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjrecgui->fincluir();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	
	if ($lsoperacion=="IncluirGuia")
	{
		$lbhecho=$lobjrecgui->IncluirGuia();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=ListaOrdcarEmitida");
		}
	}

    if ($lsoperacion=="modificar")
    {
        $lbhecho=$lobjrecgui->fmodificar();
	if ($lbhecho)
	{
            $lshacer="listo";
	}
    }

    if ($lsoperacion=="eliminar")
    {
        $lbhecho=$lobjrecgui->feliminar();
	if ($lbhecho)
	{
            $lshacer="listo";
	}
    }

    if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo")&&($lsoperacion!="buscar1")&&($lsoperacion!="buscar2")&&($lsoperacion!="IncluirGuia"))
    {
        header("location: ../vista/admin.php?url=transaccion_recgui&lshacer=$lshacer&lsoperacion=$lsoperacion");
    }

?>
