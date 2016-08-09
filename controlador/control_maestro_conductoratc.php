<?php

	require_once("../modelo/class_conductoratc.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$licedula=$_POST["txtcedula"];
		$lsnombres_per=$_POST["txtnombres_per"];
		$lsapellidos_per=$_POST["txtapellidos_per"];
		$lstelefono_movil_per=$_POST["txttelefono_movil_per"];
		$lstelefono_casa_per=$_POST["txttelefono_casa_per"];
		$lscorreo_per=$_POST["txtcorreo_per"];
		$lsdireccion_habitacion_per=$_POST["txtdireccion_habitacion_per"];
		$lsobservacion_per=$_POST["txtobservacion_per"];
		$lsidestatus=$_POST["cmbidestatus"];
		$lsestatus_con=$_POST["txtestatus_con"];
		
		
		$lstelefono_corp_per= isset($_POST['txttelefono_corp_per']) ? $_POST['txttelefono_corp_per'] : null;
		$lsfecha_ven_lic= isset($_POST['txtfecha_ven_lic']) ? $_POST['txtfecha_ven_lic'] : null;
		$lsfecha_ven_cermed= isset($_POST['txtfecha_ven_cermed']) ? $_POST['txtfecha_ven_cermed'] : null;
		$lsfecha_ven_ci= isset($_POST['txtfecha_ven_ci']) ? $_POST['txtfecha_ven_ci'] : null;
		$lsfecha_ven_cersal= isset($_POST['txtfecha_ven_cersal']) ? $_POST['txtfecha_ven_cersal'] : null;
		$lsfecha_ven_manali= isset($_POST['txtfecha_ven_manali']) ? $_POST['txtfecha_ven_manali'] : null;
		
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjconductor= new class_conductoratc();
		$lobjconductor->fseticedula($licedula);
		$lobjconductor->fsetsnombres_per($lsnombres_per);
		$lobjconductor->fsetsapellidos_per($lsapellidos_per);
		$lobjconductor->fsetstelefono_movil_per($lstelefono_movil_per);
		$lobjconductor->fsetstelefono_casa_per($lstelefono_casa_per);
		$lobjconductor->fsetscorreo_per($lscorreo_per);
		$lobjconductor->fsetsdireccion_habitacion_per($lsdireccion_habitacion_per);
		$lobjconductor->fsetsobservacion_per($lsobservacion_per);
		$lobjconductor->fsetsidestatus($lsidestatus);		
		$lobjconductor->fsetsestatus_con($lsestatus_con);
		
		$lobjconductor->fsetstelefono_corp_per($lstelefono_corp_per);
		$lobjconductor->fsetsfecha_ven_lic($lsfecha_ven_lic);
		$lobjconductor->fsetsfecha_ven_cermed($lsfecha_ven_cermed);
		$lobjconductor->fsetsfecha_ven_ci($lsfecha_ven_ci);
		$lobjconductor->fsetsfecha_ven_cersal($lsfecha_ven_cersal);
		$lobjconductor->fsetsfecha_ven_manali($lsfecha_ven_manali);
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
			$lscorreo_per=$lobjconductor->fgetscorreo_per();
			$lsdireccion_habitacion_per=$lobjconductor->fgetsdireccion_habitacion_per();
			$lsobservacion_per=$lobjconductor->fgetsobservacion_per();
			$lsidestatus=$lobjconductor->fgetsidestatus();
			$lsestatus_con=$lobjconductor->fgetsestatus_con();
			$lstelefono_corp_per=$lobjconductor->fgetstelefono_corp_per();
			$lsfecha_ven_lic=$lobjconductor->fgetsfecha_ven_lic();
			$lsfecha_ven_cermed=$lobjconductor->fgetsfecha_ven_cermed();
			$lsfecha_ven_ci=$lobjconductor->fgetsfecha_ven_ci();
			$lsfecha_ven_cersal=$lobjconductor->fgetsfecha_ven_cersal();
			$lsfecha_ven_manali=$lobjconductor->fgetsfecha_ven_manali();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=conductoratc&licedula=$licedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_movil_per=$lstelefono_movil_per&lstelefono_casa_per=$lstelefono_casa_per&lscorreo_per=$lscorreo_per&lsdireccion_habitacion_per=$lsdireccion_habitacion_per&lsobservacion_per=$lsobservacion_per&lsidestatus=$lsidestatus&lsestatus_con=$lsestatus_con&lstelefono_corp_per=$lstelefono_corp_per&lsfecha_ven_lic=$lsfecha_ven_lic&lsfecha_ven_cermed=$lsfecha_ven_cermed&lsfecha_ven_ci=$lsfecha_ven_ci&lsfecha_ven_cersal=$lsfecha_ven_cersal&lsfecha_ven_manali=$lsfecha_ven_manali&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjconductor->fincluir();
		if ($lbhecho)
		{
				header("location: ../vista/admin.php?url=conductoratc&av=1");
		}
	}

	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjconductor->fmodificar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=conductoratc&av=3");
		}
		else 
		{
				header("location: ../vista/admin.php?url=conductoratc&av=33");

		}
	}

	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjconductor->feliminar();
		if ($lbhecho)
		{
				header("location: ../vista/admin.php?url=conductoratc&av=7");
		}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjconductor->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=conductoratc&av=9");
			}
	}  

?>
