<?php

	require_once("../modelo/class_conductor.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$licedula = isset($_POST['txtcedula']) ? $_POST['txtcedula'] : null;
		$lsnombres_per= isset($_POST['txtnombres_per']) ? $_POST['txtnombres_per'] : null;
		$lsapellidos_per= isset($_POST['txtapellidos_per']) ? $_POST['txtapellidos_per'] : null;
		$lstelefono_movil_per= isset($_POST['txttelefono_movil_per']) ? $_POST['txttelefono_movil_per'] : null;
		$lstelefono_casa_per= isset($_POST['txttelefono_casa_per']) ? $_POST['txttelefono_casa_per'] : null;
		$lstelefono_corp_per= isset($_POST['txttelefono_corp_per']) ? $_POST['txttelefono_corp_per'] : null;
		$lscorreo_per= isset($_POST['txtcorreo_per']) ? $_POST['txtcorreo_per'] : null;
		$lsdireccion_habitacion_per= isset($_POST['txtdireccion_habitacion_per']) ? $_POST['txtdireccion_habitacion_per'] : null;
		$lsfecha_nacimiento_per= isset($_POST['txtfecha_nacimiento_per']) ? $_POST['txtfecha_nacimiento_per'] : null;
		$lsfecha_contratacion_per= isset($_POST['txtfecha_contratacion_per']) ? $_POST['txtfecha_contratacion_per'] : null;
		$lsfecha_ven_lic= isset($_POST['txtfecha_ven_lic']) ? $_POST['txtfecha_ven_lic'] : null;
		$lsfecha_ven_cermed= isset($_POST['txtfecha_ven_cermed']) ? $_POST['txtfecha_ven_cermed'] : null;
		$lsfecha_ven_ci= isset($_POST['txtfecha_ven_ci']) ? $_POST['txtfecha_ven_ci'] : null;
		$lsfecha_ven_cersal= isset($_POST['txtfecha_ven_cersal']) ? $_POST['txtfecha_ven_cersal'] : null;
		$lsfecha_ven_manali= isset($_POST['txtfecha_ven_manali']) ? $_POST['txtfecha_ven_manali'] : null;
		$lssueldo_mensual_per= isset($_POST['txtsueldo_mensual_per']) ? $_POST['txtsueldo_mensual_per'] : null;
		$lsperiodo_pago_per= isset($_POST['txtperiodo_pago_per']) ? $_POST['txtperiodo_pago_per'] : null;
		$lsforma_pago_per= isset($_POST['cmbforma_pago_per']) ? $_POST['cmbforma_pago_per'] : null;
		$lsoperacion= isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lshacer= isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
		$lobjconductor= new class_conductor();
		$lobjconductor->fseticedula($licedula);
		$lobjconductor->fsetsnombres_per($lsnombres_per);
		$lobjconductor->fsetsapellidos_per($lsapellidos_per);
		$lobjconductor->fsetstelefono_movil_per($lstelefono_movil_per);
		$lobjconductor->fsetstelefono_casa_per($lstelefono_casa_per);
		$lobjconductor->fsetstelefono_corp_per($lstelefono_corp_per);
		$lobjconductor->fsetscorreo_per($lscorreo_per);
		$lobjconductor->fsetsdireccion_habitacion_per($lsdireccion_habitacion_per);
		$lobjconductor->fsetsfecha_nacimiento_per($lsfecha_nacimiento_per);
		$lobjconductor->fsetsfecha_contratacion_per($lsfecha_contratacion_per);
		$lobjconductor->fsetsfecha_ven_lic($lsfecha_ven_lic);
		$lobjconductor->fsetsfecha_ven_cermed($lsfecha_ven_cermed);
		$lobjconductor->fsetsfecha_ven_ci($lsfecha_ven_ci);
		$lobjconductor->fsetsfecha_ven_cersal($lsfecha_ven_cersal);
		$lobjconductor->fsetsfecha_ven_manali($lsfecha_ven_manali);
		$lobjconductor->fsetssueldo_mensual_per($lssueldo_mensual_per);
		$lobjconductor->fsetsperiodo_pago_per($lsperiodo_pago_per);
		$lobjconductor->fsetsforma_pago_per($lsforma_pago_per);
	}



	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjconductor->fbuscar();
		if ($lbenc)
		{
			$lsnombres_per=$lobjconductor->fgetsnombres_per();
			$lsapellidos_per=$lobjconductor->fgetsapellidos_per();
			$lstelefono_movil_per=$lobjconductor->fgetstelefono_movil_per();
			$lstelefono_casa_per=$lobjconductor->fgetstelefono_casa_per();
			$lstelefono_corp_per=$lobjconductor->fgetstelefono_corp_per();
			$lscorreo_per=$lobjconductor->fgetscorreo_per();
			$lsdireccion_habitacion_per=$lobjconductor->fgetsdireccion_habitacion_per();
			$lsfecha_nacimiento_per=$lobjconductor->fgetsfecha_nacimiento_per();
			$lsfecha_contratacion_per=$lobjconductor->fgetsfecha_contratacion_per();
			$lsfecha_ven_lic=$lobjconductor->fgetsfecha_ven_lic();
			$lsfecha_ven_cermed=$lobjconductor->fgetsfecha_ven_cermed();
			$lsfecha_ven_ci=$lobjconductor->fgetsfecha_ven_ci();
			$lsfecha_ven_cersal=$lobjconductor->fgetsfecha_ven_cersal();
			$lsfecha_ven_manali=$lobjconductor->fgetsfecha_ven_manali();
			$lssueldo_mensual_per=$lobjconductor->fgetssueldo_mensual_per();
			$lsperiodo_pago_per=$lobjconductor->fgetsperiodo_pago_per();
			$lsforma_pago_per=$lobjconductor->fgetsforma_pago_per();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_conductor&licedula=$licedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_movil_per=$lstelefono_movil_per&lstelefono_casa_per=$lstelefono_casa_per&lstelefono_corp_per=$lstelefono_corp_per&lscorreo_per=$lscorreo_per&lsdireccion_habitacion_per=$lsdireccion_habitacion_per&lsfecha_nacimiento_per=$lsfecha_nacimiento_per&lsfecha_contratacion_per=$lsfecha_contratacion_per&lsfecha_ven_lic=$lsfecha_ven_lic&lsfecha_ven_cermed=$lsfecha_ven_cermed&lsfecha_ven_ci=$lsfecha_ven_ci&lsfecha_ven_cersal=$lsfecha_ven_cersal&lsfecha_ven_manali=$lsfecha_ven_manali&lssueldo_mensual_per=$lssueldo_mensual_per&lsperiodo_pago_per=$lsperiodo_pago_per&lsforma_pago_per=$lsforma_pago_per&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjconductor->fincluir();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjconductor->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjconductor->feliminar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_conductor&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

?>
