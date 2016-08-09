<?php
	require_once("../modelo/class_solicitud_cliente.php");
	if(array_key_exists('txtoperacion',$_POST))
	{
		//print_r($_POST);exit();
		$idsolicitud=(isset($_POST['txtidsolicitud']))?$_POST['txtidsolicitud']:null;
		
		//~ cliente
		$lsidcliente = isset($_POST['txtidcliente']) ? $_POST['txtidcliente'] : null;
		$lsnombre_cli = isset($_POST['txtnombre_cli']) ? $_POST['txtnombre_cli'] : null;
		$lstelefono_cli = isset($_POST['txttelefono_cli']) ? $_POST['txttelefono_cli'] : null;
		$lscorreo_cli = isset($_POST['txtcorreo_cli']) ? $_POST['txtcorreo_cli'] : null;
		//~ fin cliente
		
		
		//~ tabulador
		
		$lsidtabulador = isset($_POST['txtidtabulador']) ? $_POST['txtidtabulador'] : null;
		$lsprecio_tabulador = isset($_POST['txtprecio_tabulador']) ? $_POST['txtprecio_tabulador'] : null;
		$lsidpais_destino_tabulador = isset($_POST['cmbidpais_destino_tabulador']) ? $_POST['cmbidpais_destino_tabulador'] : null;
		$lsidestado_destino_tabulador = isset($_POST['cmbidestado_destino_tabulador']) ? $_POST['cmbidestado_destino_tabuladorr'] : null;
		$lsidmunicipio_destino_tabulador = isset($_POST['cmbidmunicipio_destino_tabulador']) ? $_POST['cmbidmunicipio_destino_tabulador'] : null;
		$lsidparroquia_destino_tabulador = isset($_POST['cmbidparroquia_destino_tabulador']) ? $_POST['cmbidparroquia_destino_tabulador'] : null;
		$lsidciudad_destino_tabulador = isset($_POST['cmbidciudad_destino_tabulador']) ? $_POST['cmbidciudad_destino_tabulador'] : null;
		$lsidpais_origen_tabulador = isset($_POST['cmbidpais_origen_tabulador']) ? $_POST['cmbidpais_origen_tabulador'] : null;
		$lsidestado_origen_tabulador = isset($_POST['cmbidestado_origen_tabulador']) ? $_POST['cmbidestado_origen_tabulador'] : null;
		$lsidmunicipio_origen_tabulador = isset($_POST['cmbidmunicipio_origen_tabulador']) ? $_POST['cmbidmunicipio_origen_tabulador'] : null;
		$lsidparroquia_origen_tabulado = isset($_POST['cmbidparroquia_origen_tabulado']) ? $_POST['cmbidparroquia_origen_tabulado'] : null;
		$lsidciudad_origen_tabulador = isset($_POST['cmbidciudad_origen_tabulador']) ? $_POST['cmbidciudad_origen_tabulador'] : null;
		$lsprecio_sol = isset($_POST['txtprecio_sol']) ? $_POST['txtprecio_sol'] : null;
		$lsunidades_req = isset($_POST['txtunidades_req']) ? $_POST['txtunidades_req'] : null;
		$lsdireccion_salida = isset($_POST['txtdireccion_salida']) ? $_POST['txtdireccion_salida'] : null;
		$lsdireccion_entrega = isset($_POST['txtdireccion_entrega']) ? $_POST['txtdireccion_entrega'] : null;
		$lsfecha_salida= isset($_POST['txtfecha_salida']) ? $_POST['txtfecha_salida'] : null;
		$lsfecha_entrega= isset($_POST['txtfecha_entrega']) ? $_POST['txtfecha_entrega'] : null;
		$lsobservaciones_sol= isset($_POST['txtobservaciones_sol']) ? $_POST['txtobservaciones_sol'] : null;
		
		$lsidtipo_unidad = isset($_POST['txtidtipo_unidad']) ? $_POST['txtidtipo_unidad'] : null;
		$lsdesc_tipo_unid= isset($_POST['txtdesc_tipo_unid']) ? $_POST['txtdesc_tipo_unid'] : null;
		$lscapacidad= isset($_POST['txtcapacidad']) ? $_POST['txtcapacidad'] : null;
		$lsdesc_unid_medi= isset($_POST['txtdesc_unid_medi']) ? $_POST['txtdesc_unid_medi'] : null;
		
		//~ fin tabulador
		
		$lsoperacion=$_POST['txtoperacion'];
		$lshacer=$_POST["txthacer"];
		
		$objtabulador= new class_solicitud_cliente();
		
		$objtabulador->set_idsolicitud($idsolicitud);
		
		//~ cliente
		$objtabulador->fsetsidcliente($lsidcliente);
		$objtabulador->fsetsnombre_cli($lsnombre_cli);
		$objtabulador->fsetstelefono_cli($lstelefono_cli);
		$objtabulador->fsetscorreo_cli($lscorreo_cli);
		//~ fin cliente
		
		//~ tabulador
		$objtabulador->fsetsidtabulador($lsidtabulador);
		$objtabulador->fsetsprecio_tabulador($lsprecio_tabulador);
		$objtabulador->fsetsidpais_destino_tabulador($lsidpais_destino_tabulador);
		$objtabulador->fsetsidestado_destino_tabulador($lsidestado_destino_tabulador);
		$objtabulador->fsetsidmunicipio_destino_tabulador($lsidmunicipio_destino_tabulador);
		$objtabulador->fsetsidparroquia_destino_tabulador($lsidparroquia_destino_tabulador);
		$objtabulador->fsetsidciudad_destino_tabulador($lsidciudad_destino_tabulador);
		$objtabulador->fsetsidpais_origen_tabulador($lsidpais_origen_tabulador);
		$objtabulador->fsetsidestado_origen_tabulador($lsidestado_origen_tabulador);
		$objtabulador->fsetsidmunicipio_origen_tabulador($lsidmunicipio_origen_tabulador);
		$objtabulador->fsetsidparroquia_origen_tabulador($lsidparroquia_origen_tabulador);
		$objtabulador->fsetsidciudad_origen_tabulador($lsidciudad_origen_tabulador);
		$objtabulador->fsetsprecio_sol($lsprecio_sol);
		$objtabulador->fsetsunidades_req($lsunidades_req);
		$objtabulador->fsetsdireccion_salida($lsdireccion_salida);
		$objtabulador->fsetsdireccion_entrega($lsdireccion_entrega);
		$objtabulador->fsetsfecha_salida($lsfecha_salida);
		$objtabulador->fsetsfecha_entrega($lsfecha_entrega);
		$objtabulador->fsetsobservaciones_sol($lsobservaciones_sol);
		
		$objtabulador->fsetsidtipo_unidad($lsidtipo_unidad);
		$objtabulador->fsetsdesc_tipo_unid($lsdesc_tipo_unid);
		$objtabulador->fsetscapacidad($lscapacidad);
		$objtabulador->fsetsdesc_unid_medi($lsdesc_unid_medi);
		//~ fin tabulador
		
	}
	if ($lsoperacion=="nuevo")
	{
		$idsolicitud=$objtabulador->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=transaccion_solicitud_cliente&idsolicitud=$idsolicitud&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$objtabulador->fbuscar();
		if ($lbenc)
		{
			$idsolicitud=$objtabulador->get_idsolicitud();
			
			//~ cliente
			
			$lsidcliente=$objtabulador->fgetsidcliente();
			$lsnombre_cli=$objtabulador->fgetsnombre_cli();
			$lstelefono_cli=$objtabulador->fgetstelefono_cli();
			$lscorreo_cli=$objtabulador->fgetscorreo_cli();
			
			//~ fin cliente
			
			//~ tabulador
			
			$lsidtabulador=$objtabulador->fgetsidtabulador();
			$lsprecio_tabulador=$objtabulador->fgetsprecio_tabulador();
			$lsidpais_destino_tabulador=$objtabulador->fgetsidpais_destino_tabulador();
			$lsidestado_destino_tabulador=$objtabulador->fgetsidestado_destino_tabulador();
			$lsidmunicipio_destino_tabulador=$objtabulador->fgetsidmunicipio_destino_tabulador();
			$lsidparroquia_destino_tabulador=$objtabulador->fgetsidparroquia_destino_tabulador();
			$lsidciudad_destino_tabulador=$objtabulador->fgetsidciudad_destino_tabulador();
			$lsidpais_origen_tabulador=$objtabulador->fgetsidpais_origen_tabulador();
			$lsidestado_origen_tabulador=$objtabulador->fgetsidestado_origen_tabulador();
			$lsidmunicipio_origen_tabulador=$objtabulador->fgetsidmunicipio_origen_tabulador();
			$lsidparroquia_origen_tabulador=$objtabulador->fgetsidparroquia_origen_tabulador();
			$lsidciudad_origen_tabulador=$objtabulador->fgetsidciudad_origen_tabulador();
			$lsprecio_sol=$objtabulador->fgetsprecio_sol();
			$lsunidades_req=$objtabulador->fgetsunidades_req();
			$lsdireccion_salida=$objtabulador->fgetsdireccion_salida();
			$lsdireccion_entrega=$objtabulador->fgetsdireccion_entrega();
			$lsfecha_salida=$objtabulador->fgetsfecha_salida();
			$lsfecha_entrega=$objtabulador->fgetsfecha_entrega();
			$lsobservaciones_sol=$objtabulador->fgetsobservaciones_sol();

			$lsidtipo_unidad=$objtabulador->fgetsidtipo_unidad();
			$lsdesc_tipo_unid=$objtabulador->fgetsdesc_tipo_unid();
			$lscapacidad=$objtabulador->fgetscapacidad();
			$lsdesc_unid_medi=$objtabulador->fgetsdesc_unid_medi();
			
			//~ fin tabulador
			
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=transaccion_solicitud_cliente&idsolicitud=$idsolicitud&lsidcliente=$lsidcliente&lsnombre_cli=$lsnombre_cli&lstelefono_cli=$lstelefono_cli&lscorreo_cli=$lscorreo_cli&lsidtabulador=$lsidtabulador&lsprecio_sol=$lsprecio_sol&lsprecio_tabulador=$lsprecio_tabulador&lsidpais_destino_tabulador=$lsidpais_destino_tabulador&lsidestado_destino_tabulador=$lsidestado_destino_tabulador&lsidmunicipio_destino_tabulador=$lsidmunicipio_destino_tabulador&lsidparroquia_destino_tabulador=$lsidparroquia_destino_tabulador&lsidciudad_destino_tabulador=$lsidciudad_destino_tabulador&lsidpais_origen_tabulador=$lsidpais_origen_tabulador&lsidestado_origen_tabulador=$lsidestado_origen_tabulador&lsidmunicipio_origen_tabulador=$lsidmunicipio_origen_tabulador&lsidparroquia_origen_tabulador=$lsidparroquia_origen_tabulador&lsidciudad_origen_tabulador=$lsidciudad_origen_tabulador&lsunidades_req=$lsunidades_req&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservaciones_sol=$lsobservaciones_sol&lsidtipo_unidad=$lsidtipo_unidad&lsdesc_tipo_unid=$lsdesc_tipo_unid&lscapacidad=$lscapacidad&lsdesc_unid_medi=$lsdesc_unid_medi&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{	
		$datos = array();
		$descripcion = $_POST['descripcion'];
		$cantidad = $_POST['cantidad'];
		for($i=0; $i < count($descripcion); $i++)
		{
			$datos[] = array("cencos"=>$descripcion[$i],"cantidad"=>$cantidad[$i]);
		}
		
		$objtabulador->set_detalle($datos);
		$lbhecho=$objtabulador->fincluir();  
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=solicitudregistrada_cliente&idsolicitud=$idsolicitud");
			//~ header("location: ../vista/reporte/pdfRep_solicitud6.php?lsa=$idsolicitud");
		}
	}
	if ($lsoperacion=="modificar")
	{
		$datos = array();
		$descripcion = $_POST['descripcion'];
		$cantidad = $_POST['cantidad'];
		$codigo = $_POST['codigo'];
		for($i=0; $i < count($descripcion); $i++)
		{
			$datos[] = array("cencos"=>$descripcion[$i],"cantidad"=>$cantidad[$i],"iddet_tab"=>$codigo[$i]);
		}
		//print_r($datos);exit();
		$objtabulador->set_detalle($datos);
		
		$lbhecho=$objtabulador->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcosto->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	} 
?>
