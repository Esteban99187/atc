<?php
	require_once("../modelo/class_tabulador.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtabulador=$_POST["txtidtabulador"];
		$lskilometraje_tab=$_POST["txtkilometraje_tab"];
		$lsprecio_total_tab=$_POST["txtprecio_total_tab"];
		$lsestatus_tab=$_POST["txtestatus_tab"];
		$lsidprecio=$_POST["txtidprecio"];
		$lsprecio_pre=$_POST["txtprecio_pre"];
		$lsdesc_tipo_unid=$_POST["txtdesc_tipo_unid"];
		$lscapacidad=$_POST["txtcapacidad"];
		$lsmedida=$_POST["txtmedida"];
		$lsidruta=$_POST["txtidruta"];
		$lsvia_rut=$_POST["txtvia_rut"];
		$lsidpais_destino_tabulador=$_POST["cmbidpais_destino_tabulador"];
		$lsidestado_destino_tabulador=$_POST["cmbidestado_destino_tabulador"];
		$lsidmunicipio_destino_tabulador=$_POST["cmbidmunicipio_destino_tabulador"];
		$lsidparroquia_destino_tabulador=$_POST["cmbidparroquia_destino_tabulador"];
		$lsidciudad_destino_tabulador=$_POST["cmbidciudad_destino_tabulador"];
		
		$lsidpais_origen_tabulador=$_POST["cmbidpais_origen_tabulador"];
		$lsidestado_origen_tabulador=$_POST["cmbidestado_origen_tabulador"];
		$lsidmunicipio_origen_tabulador=$_POST["cmbidmunicipio_origen_tabulador"];
		$lsidparroquia_origen_tabulador=$_POST["cmbidparroquia_origen_tabulador"];
		$lsidciudad_origen_tabulador=$_POST["cmbidciudad_origen_tabulador"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtabulador= new class_tabulador();
		$lobjtabulador->fsetiidtabulador($liidtabulador);
		$lobjtabulador->fsetskilometraje_tab($lskilometraje_tab);
		$lobjtabulador->fsetsprecio_total_tab($lsprecio_total_tab);
		$lobjtabulador->fsetsestatus_tab($lsestatus_tab);
		$lobjtabulador->fsetsidprecio($lsidprecio);
		$lobjtabulador->fsetsprecio_pre($lsprecio_pre);
		$lobjtabulador->fsetsdesc_tipo_unid($lsdesc_tipo_unid);
		$lobjtabulador->fsetscapacidad($lscapacidad);
		$lobjtabulador->fsetsmedida($lsmedida);
		$lobjtabulador->fsetsidruta($lsidruta);
		$lobjtabulador->fsetsvia_rut($lsvia_rut);
		$lobjtabulador->fsetsidpais_destino_tabulador($lsidpais_destino_tabulador);
		$lobjtabulador->fsetsidestado_destino_tabulador($lsidestado_destino_tabulador);
		$lobjtabulador->fsetsidmunicipio_destino_tabulador($lsidmunicipio_destino_tabulador);
		$lobjtabulador->fsetsidparroquia_destino_tabulador($lsidparroquia_destino_tabulador);
		$lobjtabulador->fsetsidciudad_destino_tabulador($lsidciudad_destino_tabulador);
		$lobjtabulador->fsetsidpais_origen_tabulador($lsidpais_origen_tabulador);
		$lobjtabulador->fsetsidestado_origen_tabulador($lsidestado_origen_tabulador);
		$lobjtabulador->fsetsidmunicipio_origen_tabulador($lsidmunicipio_origen_tabulador);
		$lobjtabulador->fsetsidparroquia_origen_tabulador($lsidparroquia_origen_tabulador);
		$lobjtabulador->fsetsidciudad_origen_tabulador($lsidciudad_origen_tabulador);

	}


		if ($lsoperacion=="nuevo")
		{
			$liidtabulador=$lobjtabulador->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_tabulador&liidtabulador=$liidtabulador&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}



	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjtabulador->fbuscar();
		if ($lbenc)
		{
			$lskilometraje_tab=$lobjtabulador->fgetskilometraje_tab();
			$lsprecio_total_tab=$lobjtabulador->fgetsprecio_total_tab();
			$lsestatus_tab=$lobjtabulador->fgetsestatus_tab();
			$lsidprecio=$lobjtabulador->fgetsidprecio();
			$lsprecio_pre=$lobjtabulador->fgetsprecio_pre();
			$lsdesc_tipo_unid=$lobjtabulador->fgetsdesc_tipo_unid();
			$lscapacidad=$lobjtabulador->fgetscapacidad();
			$lsmedida=$lobjtabulador->fgetsmedida();
			$lsidruta=$lobjtabulador->fgetsidruta();
			$lsvia_rut=$lobjtabulador->fgetsvia_rut();
			$lsidpais_destino_tabulador=$lobjtabulador->fgetsidpais_destino_tabulador();
			$lsidestado_destino_tabulador=$lobjtabulador->fgetsidestado_destino_tabulador();
			$lsidmunicipio_destino_tabulador=$lobjtabulador->fgetsidmunicipio_destino_tabulador();
			$lsidparroquia_destino_tabulador=$lobjtabulador->fgetsidparroquia_destino_tabulador();
			$lsidciudad_destino_tabulador=$lobjtabulador->fgetsidciudad_destino_tabulador();
			$lsidpais_origen_tabulador=$lobjtabulador->fgetsidpais_origen_tabulador();
			$lsidestado_origen_tabulador=$lobjtabulador->fgetsidestado_origen_tabulador();
			$lsidmunicipio_origen_tabulador=$lobjtabulador->fgetsidmunicipio_origen_tabulador();
			$lsidparroquia_origen_tabulador=$lobjtabulador->fgetsidparroquia_origen_tabulador();
			$lsidciudad_origen_tabulador=$lobjtabulador->fgetsidciudad_origen_tabulador();
			
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_tabulador&liidtabulador=$liidtabulador&lskilometraje_tab=$lskilometraje_tab&lsprecio_total_tab=$lsprecio_total_tab&lsestatus_tab=$lsestatus_tab&lsidprecio=$lsidprecio&lsprecio_pre=$lsprecio_pre&lsdesc_tipo_unid=$lsdesc_tipo_unid&lscapacidad=$lscapacidad&lsmedida=$lsmedida&lsidruta=$lsidruta&lsvia_rut=$lsvia_rut&lsidpais_destino_tabulador=$lsidpais_destino_tabulador&lsidestado_destino_tabulador=$lsidestado_destino_tabulador&lsidmunicipio_destino_tabulador=$lsidmunicipio_destino_tabulador&lsidparroquia_destino_tabulador=$lsidparroquia_destino_tabulador&lsidciudad_destino_tabulador=$lsidciudad_destino_tabulador&lsidpais_origen_tabulador=$lsidpais_origen_tabulador&lsidestado_origen_tabulador=$lsidestado_origen_tabulador&lsidmunicipio_origen_tabulador=$lsidmunicipio_origen_tabulador&lsidparroquia_origen_tabulador=$lsidparroquia_origen_tabulador&lsidciudad_origen_tabulador=$lsidciudad_origen_tabulador&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjtabulador->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_tabulador&av=5");
		}
		else 
		{
			$lbhecho=$lobjtabulador->fincluir();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tabulador&av=1");
			}
		}
	}

	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjtabulador->fmodificar();
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_tabulador&av=3");
		}
		else 
		{
				header("location: ../vista/admin.php?url=maestro_tabulador&av=33");

		}
	}

	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtabulador->feliminar();
		if ($lbhecho)
		{
				header("location: ../vista/admin.php?url=maestro_tabulador&av=7");
		}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjtabulador->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_tabulador&av=9");
			}
	}   


?>
