<?php 
error_reporting(0);
session_start();
include_once('../modelo/ModeloBuscarAjax.php');

if(isset($_POST["operacion"]))
{

//~ CONSULTA AJAX ** TIPO PRODUCTO ** //
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


//~ CONSULTA AJAX ** TIPO CONTRIBUYENTE ** //
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



//~ CONSULTA AJAX ** TIPO PROVEEDOR ** //
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

















}
?>
