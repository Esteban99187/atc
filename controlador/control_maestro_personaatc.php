<?php

	require_once("../modelo/class_personaatc.php");
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
		$lscod_rol=$_POST["cmbcod_rol"];
		$lsiddepartamento=$_POST["cmbiddepartamento"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjpersonal= new class_personaatc();
		$lobjpersonal->fseticedula($licedula);
		$lobjpersonal->fsetsnombres_per($lsnombres_per);
		$lobjpersonal->fsetsapellidos_per($lsapellidos_per);
		$lobjpersonal->fsetstelefono_movil_per($lstelefono_movil_per);
		$lobjpersonal->fsetstelefono_casa_per($lstelefono_casa_per);
		$lobjpersonal->fsetscorreo_per($lscorreo_per);
		$lobjpersonal->fsetsdireccion_habitacion_per($lsdireccion_habitacion_per);
		$lobjpersonal->fsetsobservacion_per($lsobservacion_per);
		$lobjpersonal->fsetsidestatus($lsidestatus);
		$lobjpersonal->fsetscod_rol($lscod_rol);
		$lobjpersonal->fsetsiddepartamento($lsiddepartamento);
	}


	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjpersonal->fbuscar();
		if ($lbenc)
		{
			$lsnombres_per=$lobjpersonal->fgetsnombres_per();
			$lsapellidos_per=$lobjpersonal->fgetsapellidos_per();
			$lstelefono_movil_per=$lobjpersonal->fgetstelefono_movil_per();
			$lstelefono_casa_per=$lobjpersonal->fgetstelefono_casa_per();
			$lscorreo_per=$lobjpersonal->fgetscorreo_per();
			$lsdireccion_habitacion_per=$lobjpersonal->fgetsdireccion_habitacion_per();
			$lsobservacion_per=$lobjpersonal->fgetsobservacion_per();
			$lsidestatus=$lobjpersonal->fgetsidestatus();
			$lscod_rol=$lobjpersonal->fgetscod_rol();
			$lsiddepartamento=$lobjpersonal->fgetsiddepartamento();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=personaatc&licedula=$licedula&lsnombres_per=$lsnombres_per&lsapellidos_per=$lsapellidos_per&lstelefono_movil_per=$lstelefono_movil_per&lstelefono_casa_per=$lstelefono_casa_per&lscorreo_per=$lscorreo_per&lsdireccion_habitacion_per=$lsdireccion_habitacion_per&lsobservacion_per=$lsobservacion_per&lsidestatus=$lsidestatus&lscod_rol=$lscod_rol&lsiddepartamento=$lsiddepartamento&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

    if ($lsoperacion=="incluir")
    {
		if ($lbhecho=$lobjpersonal->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=personaatc&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjpersonal->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=personaatc&av=1");
			}
		}			
	}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjpersonal->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=personaatc&av=5");
		}
		else 
		{
			$lbhecho=$lobjpersonal->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=personaatc&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjpersonal->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=personaatc&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjpersonal->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=personaatc&av=9");
			}
	}   
    
?>
