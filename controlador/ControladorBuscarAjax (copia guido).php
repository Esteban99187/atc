<?php 
error_reporting(0);
session_start();
include_once('../modelo/ModeloBuscarAjax.php');

if(isset($_POST["operacion"]))
{
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
	//~ CONSULTA AJAX ** maestro_cliente ** //
	if($_POST["operacion"]=="BusquedaAjaxmaestro_cliente")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxmaestro_cliente($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getmaestro_cliente($tupla))
	{
		if($rs["estatus_cli"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idcliente"];
		$idb = $rs["nombre_cli"];
		$idt = $rs["idtipo_cliente"];
		$idc = $rs["idtipo_contribuyente_cli"];
		$ip = $rs["idtipo_proveedor_cli"];
		$se = $rs["sector_cli"];
		$oc = $rs["origen_cli"];
		$dir = $rs["direccion_cli"];
		$tl = $rs["telefono_cli"];
		$tm = $rs["telefono_movil_cli"];
		$pw = $rs["pag_web_cli"];
		$cc = $rs["correo_cli"];
		$nf = $rs["nro_fax_cli"];
		$est = $rs["estatus_cli"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$idb','$idt','$idc','$ip','$se','$oc','$dir','$tl','$tm','$pw','$cc','$nf','$est')>
						<td> ".$rs['idcliente']."</td>
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

	//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxTabulador")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxTabulador($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettabulador($tupla))
	{
		if($rs["estatus_tab_vto"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["IdVTabuladorOrigen"];
		$des = $rs["ciudad_origen_vto"];
		$ori = $rs["ciudad_destino_vtd"];
		$est = $rs["estatus_tab_vto"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
						<td> ".$rs['ciudad_origen_vto']."</td>
						<td> ".$rs['ciudad_destino_vtd']."</td>
						<td> ".$rs['via_vto']."</td>
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
	//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxPais")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxPais($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getPais($tupla))
	{
		if($rs["estatus_pai"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idpais"];
		$des = $rs["desc_pais"];
		$est = $rs["estatus_pai"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
						<td> ".$rs['desc_pais']."</td>
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

	//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxRegion")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxRegion($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getRegion($tupla))
	{
		if($rs["estatus_reg"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idregion"];
		$des = $rs["desc_regi"];
		$est = $rs["estatus_reg"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
						<td> ".$rs['desc_regi']."</td>
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
	//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxProducto")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxProducto($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getProducto($tupla))
	{
		if($rs["estatus_pro"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idproducto"];
		$des = $rs["desc_prod"];
		$est = $rs["estatus_pro"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
						<td> ".$rs['desc_prod']."</td>
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
	
	
	//zora//

//~ CONSULTA AJAX ** marca_unidad ** //
	if($_POST["operacion"]=="BusquedaAjaxmarca_unidad")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxmarca_unidad($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getmarca_unidad($tupla))
	{
		if($rs["estatus_maruni"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idmarca_unidad"];
		$des = $rs["desc_marc"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_marc']."</td>
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
	//~ fin de la consulta ** marca_unidad ** ~//

	
//~ CONSULTA AJAX ** tipo_unidad ** //		
	if($_POST["operacion"]=="BusquedaAjaxtipo_unidad")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxtipo_unidad($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipo_unidad($tupla))
	{
		if($rs["estatus_tipuni"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_unidad"];
		$des = $rs["desc_tipo_unid"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_unid']."</td>
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
	//~ fin de la consulta ** tipo_unidad ** ~//



//~ CONSULTA AJAX ** banco ** //
	if($_POST["operacion"]=="BusquedaAjaxbanco")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxbanco($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getbanco($tupla))
	{
		if($rs["estatus_ban"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idbanco"];
		$des = $rs["desc_banc"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_banc']."</td>
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
	//~ fin de la consulta ** banco ** ~//



//~ CONSULTA AJAX ** precio ** //
	if($_POST["operacion"]=="BusquedaAjaxprecio")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxprecio($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getprecio($tupla))
	{
		if($rs["estatus_pre"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_unidad"];
		$des = $rs["precio_pre"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['precio_pre']."</td>
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
	//~ fin de la consulta ** precio ** ~//



//~ CONSULTA AJAX ** modelo_unidad ** //    
	if($_POST["operacion"]=="BusquedaAjaxmodelo_unidad")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxmodelo_unidad($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getmodelo_unidad($tupla))
	{
		if($rs["estatus_moduni"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idmodelo_unidad"];
		$des = $rs["desc_mode"];
		$ano = $rs["ano_mode"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$ano')>
						<td> ".$rs['desc_mode']."</td>
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
	//~ fin de la consulta ** modelo_unidad ** ~//



//~ CONSULTA AJAX ** tipo_cuenta ** //
	if($_POST["operacion"]=="BusquedaAjaxtipo_cuenta")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxtipo_cuenta($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipo_cuenta($tupla))
	{
		if($rs["estatus_tipcue"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_cuenta"];
		$des = $rs["desc_tipo_cuen"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_cuen']."</td>
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
	//~ fin de la consulta ** tipo_cuenta ** ~//

//zoraa//



//JT//

//~ CONSULTA AJAX ** personaatc ** //
	if($_POST["operacion"]=="BusquedaAjaxpersonaatc")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxpersonaatc($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getpersonaatc($tupla))
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
		$ape = $rs["apellidos_per"];
		$telfm = $rs["telefono_movil_per"];
		$telfca = $rs["telefono_casa_per"];
		$cor = $rs["correo_per"];
		$dir = $rs["direccion_habitacion_per"];
		$obs = $rs["observacion_per"];
		$cod = $rs["cod_rol"];
		$ide = $rs["idestatus"];
		$idd = $rs["iddepartamento"];
		
		
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$ape','$telfm','$telfca','$cor','$dir','$obs','$cod','$ide','$idd')>
						<td> ".$rs['nombres_per']."</td>
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
	//~ fin de la consulta ** personaatc ** ~//
	


//~ CONSULTA AJAX ** maestro_cuenta ** //
	if($_POST["operacion"]=="BusquedaAjaxmaestro_cuenta")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxmaestro_cuenta($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getmaestro_cuenta($tupla))
	{
		if($rs["estatus_cuenta"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idcuenta"];
		$idb = $rs["banco_idbanco"];
		$idt = $rs["idtipo_cuenta"];
		$idc = $rs["idcliente"];
		$est = $rs["estatus_cuenta"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$idb','$idt','$idc','$est')>
						<td> ".$rs['idcuenta']."</td>
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
	//~ fin de la consulta ** maestro_cuenta ** ~//

//JTT//


//MM//


//~ CONSULTA AJAX ** tipoproducto ** //
	if($_POST["operacion"]=="BusquedaAjaxTipoproducto")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxTipoproducto($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipoproducto($tupla))
	{
		if($rs["estatus_tippro"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_producto"];
		$des = $rs["desc_tipo_prod"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_prod']."</td>
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
	//~ fin de la consulta ** tipoproducto ** ~//

//~ CONSULTA AJAX ** tipoproveedor ** //
	if($_POST["operacion"]=="BusquedaAjaxtipoproveedor")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxtipoproveedor($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipoproveedor($tupla))
	{
		if($rs["estatus_tippro"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_proveedor"];
		$des = $rs["desc_tipo_prov"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_prov']."</td>
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
	//~ fin de la consulta ** tipoproveedor ** ~//

//~ CONSULTA AJAX ** estatus ** //
	if($_POST["operacion"]=="BusquedaAjaxestatus")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxestatus($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getestatus($tupla))
	{
		if($rs["estatus_est"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idestatus"];
		$des = $rs["nombre_est"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['nombre_est']."</td>
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
	//~ fin de la consulta ** estatus ** ~//

//~ CONSULTA AJAX ** departamento ** //
	if($_POST["operacion"]=="BusquedaAjaxdepartamento")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxdepartamento($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getdepartamento($tupla))
	{
		if($rs["estatus_dep"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["iddepartamento"];
		$des = $rs["desc_depa"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_depa']."</td>
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
	//~ fin de la consulta ** departamento ** ~//

//~ CONSULTA AJAX ** capacidad ** //
	if($_POST["operacion"]=="BusquedaAjaxcapacidad")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxcapacidad($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getcapacidad($tupla))
	{
		if($rs["estatus_cap"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idcapacidad"];
		$des = $rs["capacidad"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['capacidad']."</td>
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
	//~ fin de la consulta ** capacidad ** ~//
	
//~ CONSULTA AJAX ** roles ** //	
	if($_POST["operacion"]=="BusquedaAjaxroles")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxroles($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getroles($tupla))
	{
		if($rs["estatus_rol"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["cod_rol"];
		$des = $rs["nombre_rol"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['nombre_rol']."</td>
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
	//~ fin de la consulta ** roles ** ~//
//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxtipocontri")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxtipocontri($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipocontri($tupla))
	{
		if($rs["estatus_tipcont"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_contribuyente"];
		$des = $rs["desc_tipo_cont"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_cont']."</td>
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
//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxtipo_cliente")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxtipo_cliente($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->gettipo_cliente($tupla))
	{
		if($rs["estatus_tipcli"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idtipo_cliente"];
		$des = $rs["desc_tipo_clie"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_tipo_clie']."</td>
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


//MM//
//~ inicia la consulta ajax de un registro
	if($_POST["operacion"]=="BusquedaAjaxunidad_medida")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxunidad_medida($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getunidad_medida($tupla))
	{
		if($rs["estatus_unimed"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idunidad_medida"];
		$des = $rs["desc_unid_medi"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des')>
						<td> ".$rs['desc_unid_medi']."</td>
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
	//~ CONSULTA AJAX ** personaatc ** //
	if($_POST["operacion"]=="BusquedaAjaxremolque")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxremolque($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getremolque($tupla))
	{
		if($rs["estatus_rem"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idremolque"];
		$des = $rs["serial_rem"];
		$ape = $rs["placa_rem"];
		$est = $rs["estatus_rem"];
	
		
		
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id')>
						<td> ".$rs['serial_rem']."</td>
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
	//~ fin de la consulta ** personaatc ** ~//
	
	//~ CONSULTA AJAX ** estado ** //	
	if($_POST["operacion"]=="BusquedaAjaxestado")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxestado($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getestado($tupla))
	{
		if($rs["estatus_est"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idestado"];
		$des = $rs["desc_esta"];
		$pais = $rs["idpais"];
		$esta = $rs["estatus_est"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$pais','$esta')>
						<td> ".$rs['desc_esta']."</td>
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
	//~ fin de la consulta ** estado ** ~//
	
	
	//~ CONSULTA AJAX ** ciudad ** //	
	if($_POST["operacion"]=="BusquedaAjaxciudad")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxciudad($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getciudad($tupla))
	{
		if($rs["estatus_ciu"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idciudad"];
		$des = $rs["desc_ciud"];
		$est = $rs["estatus_ciu"];
		$muni = $rs["idparroquia"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est','$muni')>
						<td> ".$rs['desc_ciud']."</td>
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
	//~ fin de la consulta ** ciudad ** ~//
	
	//~ CONSULTA AJAX ** parroquia ** //	
	if($_POST["operacion"]=="BusquedaAjaxparroquia")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxparroquia($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getparroquia($tupla))
	{
		if($rs["estatus_par"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idparroquia"];
		$des = $rs["desc_parr"];
		$est = $rs["estatus_parr"];
		$muni = $rs["idmunicipio"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est','$muni')>
						<td> ".$rs['desc_parr']."</td>
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
//~ fin de la consulta ** parroquia ** ~//
//~ CONSULTA AJAX ** municipio ** //	
	if($_POST["operacion"]=="BusquedaAjaxmunicipio")
	{
	$obj_estado = new ModeloBuscarAjax();
	$tupla = $obj_estado->ConsultarTodoAjaxmunicipio($_POST["status"],$_POST["estado"]);
	$c=1;
	$contenido="";
	while($rs = $obj_estado->getmunicipio($tupla))
	{
		if($rs["estatus_mun"]==1)
		{ 
			$status= "Activo";
		}
		else
		{
			$status= "Inactivo"; 
		} 
		$id = $rs["idmunicipio"];
		$des = $rs["desc_muni"];
		$est = $rs["estatus_mun"];
		$muni = $rs["idestado"];
		$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est','$muni')>
						<td> ".$rs['desc_muni']."</td>
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
	//~ fin de la consulta ** municipio ** ~//
}
?>
