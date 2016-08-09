<?php

	require_once("../modelo/class_cliente.php");
	if(array_key_exists(txtoperacion,$_POST))
	{

		$liidcliente = isset($_POST['txtidcliente']) ? $_POST['txtidcliente'] : null;
		$lsnombre_cli = isset($_POST['txtnombre_cli']) ? $_POST['txtnombre_cli'] : null;
		$lsapellido_cli = isset($_POST['txtapellido_cli']) ? $_POST['txtapellido_cli'] : null;
		$lsidtipo_cliente_cli = isset($_POST['cmbidtipo_cliente_cli']) ? $_POST['cmbidtipo_cliente_cli'] : null;
		$lsidtipo_contribuyente_cli = isset($_POST['cmbidtipo_contribuyente_cli']) ? $_POST['cmbidtipo_contribuyente_cli'] : null;
		$lsidtipo_proveedor_cli = isset($_POST['cmbidtipo_proveedor_cli']) ? $_POST['cmbidtipo_proveedor_cli'] : null;
		$lssector_cli = isset($_POST['cmbsector_cli']) ? $_POST['cmbsector_cli'] : null;
		$lsorigen_cli = isset($_POST['cmborigen_cli']) ? $_POST['cmborigen_cli'] : null;
		$lsdireccion_cli = isset($_POST['txtdireccion_cli']) ? $_POST['txtdireccion_cli'] : null;
		$lstelefono_cli = isset($_POST['txttelefono_cli']) ? $_POST['txttelefono_cli'] : null;
		$lstelefono_movil_cli = isset($_POST['txttelefono_movil_cli']) ? $_POST['txttelefono_movil_cli'] : null;
		$lspag_web_cli = isset($_POST['txtpag_web_cli']) ? $_POST['txtpag_web_cli'] : null;
		$lscorreo_cli = isset($_POST['txtcorreo_cli']) ? $_POST['txtcorreo_cli'] : null;
		$lsnro_fax_cli = isset($_POST['txtnro_fax_cli']) ? $_POST['txtnro_fax_cli'] : null;
		$lsoperacion = isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lshacer = isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
		$lobjcliente= new class_cliente();
		$lobjcliente->fsetiidcliente($liidcliente);
		$lobjcliente->fsetsnombre_cli($lsnombre_cli);
		$lobjcliente->fsetsapellido_cli($lsapellido_cli);
		$lobjcliente->fsetsidtipo_cliente_cli($lsidtipo_cliente_cli);
		$lobjcliente->fsetsidtipo_contribuyente_cli($lsidtipo_contribuyente_cli);
		$lobjcliente->fsetsidtipo_proveedor_cli($lsidtipo_proveedor_cli);
		$lobjcliente->fsetssector_cli($lssector_cli);
		$lobjcliente->fsetsorigen_cli($lsorigen_cli);
		$lobjcliente->fsetsdireccion_cli($lsdireccion_cli);
		$lobjcliente->fsetstelefono_cli($lstelefono_cli);
		$lobjcliente->fsetstelefono_movil_cli($lstelefono_movil_cli);
		$lobjcliente->fsetspag_web_cli($lspag_web_cli);
		$lobjcliente->fsetscorreo_cli($lscorreo_cli);
		$lobjcliente->fsetsnro_fax_cli($lsnro_fax_cli);

	}
	if ($lsoperacion=="nuevo")
	{
		$liidcuenta=$lobjcliente->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=maestro_cliente&liidcliente=$liidcliente&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}


	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjcliente->fbuscar();
		if ($lbenc)
		{
			$lsnombre_cli=$lobjcliente->fgetsnombre_cli();
			$lsapellido_cli=$lobjcliente->fgetsapellido_cli();
			$lsidtipo_cliente_cli=$lobjcliente->fgetsidtipo_cliente_cli();
			$lsidtipo_contribuyente_cli=$lobjcliente->fgetsidtipo_contribuyente_cli();
			$lsidtipo_proveedor_cli=$lobjcliente->fgetsidtipo_proveedor_cli();
			$lssector_cli=$lobjcliente->fgetssector_cli();
			$lsorigen_cli=$lobjcliente->fgetsorigen_cli();
			$lsdireccion_cli=$lobjcliente->fgetsdireccion_cli();
			$lstelefono_cli=$lobjcliente->fgetstelefono_cli();
			$lstelefono_movil_cli=$lobjcliente->fgetstelefono_movil_cli();
			$lspag_web_cli=$lobjcliente->fgetspag_web_cli();
			$lscorreo_cli=$lobjcliente->fgetscorreo_cli();
			$lsnro_fax_cli=$lobjcliente->fgetsnro_fax_cli();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=maestro_cliente&liidcliente=$liidcliente&lsidtipo_cliente_cli=$lsidtipo_cliente_cli&lsnombre_cli=$lsnombre_cli&lsidtipo_contribuyente_cli=$lsidtipo_contribuyente_cli&lsidtipo_proveedor_cli=$lsidtipo_proveedor_cli&lssector_cli=$lssector_cli&lsorigen_cli=$lsorigen_cli&lsdireccion_cli=$lsdireccion_cli&lstelefono_cli=$lstelefono_cli&lstelefono_movil_cli=$lstelefono_movil_cli&lspag_web_cli=$lspag_web_cli&lscorreo_cli=$lscorreo_cli&lsnro_fax_cli=$lsnro_fax_cli&lsestatus_cli=$lsestatus_cli&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}

	if ($lsoperacion=="incluir")
    {
	if ($lbhecho=$lobjcliente->fverificarexistencia())
	{
		header("location: ../vista/admin.php?url=maestro_cliente&av=5");
	}
	else 
	{
	
	$lbhecho=$lobjcliente->fincluir();  
		if ($lbhecho)
		{
			header("location: ../vista/admin.php?url=maestro_cliente&av=1");
		}
		else 
		{
			header("location: ../vista/admin.php?url=maestro_cliente&av=33");
		}
	}			
}
    
    if ($lsoperacion=="modificar")
  {
		if ($lbhecho=$lobjcliente->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_cliente&av=5");
		}
		else 
		{
			$lbhecho=$lobjcliente->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cliente&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjcliente->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cliente&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjcliente->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_cliente&av=9");
			}
	}   
	
	//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxConductoratc")
	{
		$obj_estado = new ModeloBuscarAjax();
		$tupla = $obj_estado->ConsultarTodoAjaxConductoratc($_POST["status"],$_POST["estado"]);
		$c=1;
		$contenido="";
		while($rs = $obj_estado->gettabulador($tupla))
		{
			if($rs["estatus_con"]==1)
			{ 
				$status= "Activo";
			}
			else
			{
				$status= "Inactivo"; 
			} 
			$id = $rs["cedula"];
			$des = $rs["nombres_per"];
			$ori = $rs["apellidos_per"];
			$est = $rs["estatus_con"];
			$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
							<td> ".$rs['cedula']."</td>
							<td> ".$rs['nombres_per']."</td>
							<td> ".$rs['apellidos_per']."</td>
							<td> <span id='".$status."'>".$status." </span></td>
						</tr>";
			$c++; 
		}
		if($contenido!="")
		{
			echo $contenido;
		}
		else
		{
			echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; 
		}
	}
	//~ fin de la consulta **********************************************************
    
?>
