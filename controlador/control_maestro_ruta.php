<?php

	require_once("../modelo/class_ruta.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidtabulador=$_POST["txtidtabulador"];
		$lskilometraje_tab=$_POST["txtkilometraje_tab"];
		$lsprecio_total_tab=$_POST["txtprecio_total_tab"];
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
		$lobjtabulador= new class_ruta();
		$lobjtabulador->fsetiidtabulador($liidtabulador);
		$lobjtabulador->fsetskilometraje_tab($lskilometraje_tab);
		$lobjtabulador->fsetsprecio_total_tab($lsprecio_total_tab);
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
				header("location: ../vista/admin.php?url=maestro_ruta&liidtabulador=$liidtabulador&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}



	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjtabulador->fbuscar();
		if ($lbenc)
		{
			$lskilometraje_tab=$lobjtabulador->fgetskilometraje_tab();
			$lsprecio_total_tab=$lobjtabulador->fgetsprecio_total_tab();
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
		header("location: ../vista/admin.php?url=maestro_ruta&liidtabulador=$liidtabulador&lskilometraje_tab=$lskilometraje_tab&lsprecio_total_tab=$lsprecio_total_tab&lsidpais_destino_tabulador=$lsidpais_destino_tabulador&lsidestado_destino_tabulador=$lsidestado_destino_tabulador&lsidmunicipio_destino_tabulador=$lsidmunicipio_destino_tabulador&lsidparroquia_destino_tabulador=$lsidparroquia_destino_tabulador&lsidciudad_destino_tabulador=$lsidciudad_destino_tabulador&lsidpais_origen_tabulador=$lsidpais_origen_tabulador&lsidestado_origen_tabulador=$lsidestado_origen_tabulador&lsidmunicipio_origen_tabulador=$lsidmunicipio_origen_tabulador&lsidparroquia_origen_tabulador=$lsidparroquia_origen_tabulador&lsidciudad_origen_tabulador=$lsidciudad_origen_tabulador&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjtabulador->fincluir();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjtabulador->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtabulador->feliminar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}

	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/admin.php?url=maestro_ruta&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

?>
