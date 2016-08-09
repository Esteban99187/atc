  <?php
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSISTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                                                                                           *
	*  Este programa es software libre, puede redistribuirlo y / o modificar                    *
	*  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
	*  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
	*                                                                                           *
	*  Este programa se distribuye con la esperanza de que sea útil,                            *
	*  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
	*  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
	*                                                                                           *
	********************************************************************************************/
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	require_once("../modelo/clscombo.php");
    $lobjcombo= new clscombo();

	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$licedula = isset($_GET['licedula']) ? $_GET['licedula'] : null;
	$lsnombres_per = isset($_GET['lsnombres_per']) ? $_GET['lsnombres_per'] : null;
	$lsapellidos_per = isset($_GET['lsapellidos_per']) ? $_GET['lsapellidos_per'] : null;
	$lstelefono_movil_per = isset($_GET['lstelefono_movil_per']) ? $_GET['lstelefono_movil_per'] : null;
	$lstelefono_casa_per = isset($_GET['lstelefono_casa_per']) ? $_GET['lstelefono_casa_per'] : null;
	$lscorreo_per = isset($_GET['lscorreo_per']) ? $_GET['lscorreo_per'] : null;
	$lsdireccion_habitacion_per = isset($_GET['lsdireccion_habitacion_per']) ? $_GET['lsdireccion_habitacion_per'] : null;
	$lsidestatus = isset($_GET['lsidestatus']) ? $_GET['lsidestatus'] : null;
	$lsestatus_con = isset($_GET['lsestatus_con']) ? $_GET['lsestatus_con'] : null;
	$lsobservacion_per = isset($_GET['lsobservacion_per']) ? $_GET['lsobservacion_per'] : null;
	$lstelefono_corp_per = isset($_GET['lstelefono_corp_per']) ? $_GET['lstelefono_corp_per'] : null;
	$lsfecha_ven_lic = isset($_GET['lsfecha_ven_lic']) ? $_GET['lsfecha_ven_lic'] : null;
	$lsfecha_ven_cermed = isset($_GET['lsfecha_ven_cermed']) ? $_GET['lsfecha_ven_cermed'] : null;
	$lsfecha_ven_ci = isset($_GET['lsfecha_ven_ci']) ? $_GET['lsfecha_ven_ci'] : null;
	$lsfecha_ven_cersal = isset($_GET['lsfecha_ven_cersal']) ? $_GET['lsfecha_ven_cersal'] : null;
	$lsfecha_ven_manali = isset($_GET['lsfecha_ven_manali']) ? $_GET['lsfecha_ven_manali'] : null;
		
?>
<script type="text/javascript">
	function BuscarAjaxConductoratc(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxConductoratc&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxConductoratc&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxConductoratc&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Conductor</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abreconductoratc()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
		  <form method="post" name="fconductoratc" id="fconductoratc" action="../controlador/control_maestro_conductoratc.php">
			<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
			<input type="hidden" name="txthay" value="<?php print($lihay);?>">
			<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">

			<div class="row">
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>Cédula</label>
						<input type="text" name="txtcedula"  class="form-control"  maxlength="8" value="<?php print($licedula);?>" onblur="fperderfocuscedula();" />
					</div>
				</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
					
				<div class="col-lg-3">
			<div class="form-group has-error">
					<label>Nombres</label>
						<input type="text" name="txtnombres_per" class="form-control"  value="<?php print($lsnombres_per);?>"/>
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
			<div class="form-group has-error">
					<label>Apellidos</label>
						<input type="text" name="txtapellidos_per" class="form-control"   value="<?php print($lsapellidos_per);?>"/>
					</div>
				</div>
			<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
			<div class="form-group has-error">
					<label>Teléfono Movil</label>
						<input type="text" class="form-control" name="txttelefono_movil_per" title="Ingrese el teléfono móvil"  value="<?php print($lstelefono_movil_per);?>"/>
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>Teléfono casa</label>
						<input type="text" class="form-control" title="Ingrese el teléfono de casa" name="txttelefono_casa_per"  value="<?php print($lstelefono_casa_per);?>"/>
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>Teléfono Corporativo</label>
						<input type="text" class="form-control" title="Ingrese el teléfono corporativo" name="txttelefono_corp_per" value="<?php print($lstelefono_corp_per);?>"/>
					</div>
				</div>
        <div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>Correo electrónico</label>
						<input type="text" class="form-control" title="Ingrese el correo electrónico" name="txtcorreo_per" onkeypress="return email(event)" value="<?php print($lscorreo_per);?>" />
					</div>
				</div>
          <div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>Estatus</label>
						<select class="form-control" name="cmbidestatus" id="cmbidestatus" >
							<option value="" value="<?php print($lsidestatus);?>" >Seleccione estatus</option>
							<?php
								$lssql="select idestatus,concat(' ',nombre_est) as nombre from estatus order by nombre";
								$lobjcombo->fgenerar($lssql,"idestatus","nombre","");
							?>
						</select>
					</div>
				</div>       
					<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>F/V. Cédula</label>
						<input class="form-control"  type="text"  name="txtfecha_ven_ci"  title="Ingrese Fecha de Vencimiento de la Cédula"  id="datepicker2" value="<?php print($lsfecha_ven_ci);?>"> 
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>F/V.Licencia</label>
						<input class="form-control"  type="text"  name="txtfecha_ven_lic"  title="Ingrese Fecha de Vencimiento de la Licencia"  id="datepicker2" value="<?php print($lsfecha_ven_lic);?>"> 
					</div>
				</div>
		<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>F/V.Certif.Médico</label>
						<input class="form-control"  type="text"  name="txtfecha_ven_cermed"  title="Ingrese la fecha de vencimiento del certificado medico" id="datepicker2" value="<?php print($lsfecha_ven_cermed);?>"> 
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>F/V.Certif.Salud</label>
						<input class="form-control"  type="text"  name="txtfecha_ven_cersal"  title="Ingrese Fecha de Vencimiento de salud" id="datepicker2" value="<?php print($lsfecha_ven_cersal);?>"> 
					</div>
				</div>
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
				<div class="col-lg-3">
				<div class="form-group has-error">
					<label>F/V.Manipulación</label>
						<input class="form-control"  type="text" name="txtfecha_ven_manali" title="Ingrese Fecha de Vencimiento de Manipulacion"  id="datepicker6"  value="<?php print($lsfecha_ven_manali);?>"> 
					</div>
				</div>    
				<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	  
				<div class="form-group col-lg-7">
					<label>Dirección</label>
						<input type="text" class="form-control" title="Ingrese la dirección" name="txtdireccion_habitacion_per" value="<?php print($lsdireccion_habitacion_per);?>"/>
					</div>
					<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	  
							</div>	  
			<div class="row">
				<div class="form-group col-lg-12">
					<label>Observación</label>
					<input type="text" class="form-control" title="Ingrese la observación académica"name="txtobservacion_per" value="<?php print($lsobservacion_per);?>"> 
				</div>
			</div>
        
				<div class="row">
				
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-9">
						<label>¡El campo que contenga un asterísco (*) es un campo obligatorio y debe ser llenado!</label>
					</div>
				</div>         
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_con==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_con==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('conductoratc')">Cancelar</button>
						</center>
		</form>
		</div>
		</div> 
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title"><i class="entypo-info"></i>Información
				</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div>
			</div>
			<div class="panel-body"> <div class="col-md-1">
					<i class="entypo-basket" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label>Un producto es el elemento principal en el servicio de transporte por lo tanto es un registro obligatorio que debe estar disponible en el registro de la solicitud de transporte</label>
			</div> 
		</div>
	</div> 
</div>
</div>
	<script language="javascript">

			finicio();
		    function finicio()
		    {
			    lof=document.fconductoratc;
			    if (lof.txtoperacion.value!="buscar")
			    {
				    if (lof.txthacer.value=="listo")
				    {
						if (lof.txtoperacion.value=="incluir")
						{
							alert("Registro Incluido");
						}
						else if (lof.txtoperacion.value=="modificar")
						{
							alert("Registro Modificado");
						}
						else if (lof.txtoperacion.value=="eliminar")
						{
							alert("Registro Eliminado");
						}
					}
					if (lof.txthacer.value!="listo"&&lof.txthacer.value!="")
					{
						alert("No se pudo realizar la operación");
					}
					fcancelar();
				  }

				else
				{
					if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
					{
						fexiste();
					}
					else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
					{
						alert("Conductor no existe");
						fcancelar();
					}
					else if ((lof.txthay.value==1)&&(lof.txthacer.value=="incluir"))
					{
						fexiste();
					}
					else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
					{
						lof.txtoperacion.value="incluir";
						lof.txtcedula.disabled=false;
						lof.txtnombres_per.disabled=false;
						lof.txtnombres_per.focus();
						lof.txtapellidos_per.disabled=false;
						lof.txttelefono_movil_per.disabled=false;
						lof.txttelefono_casa_per.disabled=false;
						lof.txtcorreo_per.disabled=false;
						lof.txtdireccion_habitacion_per.disabled=false;
						lof.txtobservacion_per.disabled=false;
						lof.cmbidestatus.disabled=true;
						lof.cmbidestatus.value="1";
						lof.txttelefono_corp_per.disabled=false;
						lof.txtfecha_ven_lic.disabled=false;
						lof.txtfecha_ven_cermed.disabled=false;
						lof.txtfecha_ven_ci.disabled=false;
						lof.txtfecha_ven_cersal.disabled=false;
						lof.txtfecha_ven_manali.disabled=false;
						lof.btnguardar.disabled=false;
						lof.btncancelar.disabled=false;
						lof.btnnuevo.disabled=true;
						lof.btnbuscar.disabled=true;
						lof.btnmodificar.disabled=true;
						lof.btneliminar.disabled=true;
						lof.btnAbrepersonaatc.disabled=true;
					}

				}
		    }

		   function fexiste()
		   {
				lof=document.fconductoratc;
				lof.txtcedula.disabled=true;
				lof.txtnombres_per.disabled=true;
				lof.txtapellidos_per.disabled=true;
				lof.txttelefono_movil_per.disabled=true;
				lof.txttelefono_casa_per.disabled=true;
				lof.txtcorreo_per.disabled=true;
				lof.txtdireccion_habitacion_per.disabled=true;
				lof.txtobservacion_per.disabled=true;
				lof.cmbidestatus.value="<?php print($lsidestatus);?>";
				lof.cmbidestatus.disabled=true;
				lof.txttelefono_corp_per.disabled=true;
				lof.txtfecha_ven_lic.disabled=true;
				lof.txtfecha_ven_cermed.disabled=true;
				lof.txtfecha_ven_ci.disabled=true;
				lof.txtfecha_ven_cersal.disabled=true;
				lof.txtfecha_ven_manali.disabled=true;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=false;
				lof.btncancelar.disabled=false;

			}

			function fnuevo()
			{
				lof=document.fconductoratc;
				lof.txthacer.value="incluir";
				lof.txtcedula.disabled=false;
				lof.txtcedula.focus();
				lof.txtnombres_per.disabled=false;
				lof.txtapellidos_per.disabled=false;
				lof.txttelefono_movil_per.disabled=false;
				lof.txttelefono_casa_per.disabled=false;
				lof.txtcorreo_per.disabled=false;
				lof.txtdireccion_habitacion_per.disabled=false;
				lof.txtobservacion_per.disabled=false;
				lof.cmbidestatus.disabled=true;
				lof.cmbidestatus.value="1";
				lof.txttelefono_corp_per.disabled=false;
				lof.txtfecha_ven_lic.disabled=false;
				lof.txtfecha_ven_cermed.disabled=false;
				lof.txtfecha_ven_ci.disabled=false;
				lof.txtfecha_ven_cersal.disabled=false;
				lof.txtfecha_ven_manali.disabled=false;
				lof.txtsueldo_mensual_per.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnguardar.disabled=false;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=false;
			}

			function fcancelar()
			{
			   lof=document.fconductoratc;
			   lof.txtcedula.value="";
			   lof.txtnombres_per.value="";
			   lof.txtapellidos_per.value="";
			   lof.txttelefono_movil_per.value="";
			   lof.txttelefono_casa_per.value="";
			   lof.txtcorreo_per.value="";
			   lof.txtdireccion_habitacion_per.value="";
			   lof.txtobservacion_per.value="";
			   lof.cmbidestatus.value="-";
			   lof.txttelefono_corp_per.value="";
			   lof.txtfecha_ven_lic.value="";
			   lof.txtfecha_ven_cermed.value="";
			   lof.txtfecha_ven_ci.value="";
			   lof.txtfecha_ven_cersal.value="";
			   lof.txtfecha_ven_manali.value="";
			   lof.txtoperacion.value="";
			   lof.txthacer.value="";
			   lof.txthay.value=0;
			   lof.txtcedula.disabled=true;
			   lof.txtnombres_per.disabled=true;
			   lof.txtapellidos_per.disabled=true;
			   lof.txttelefono_movil_per.disabled=true;
			   lof.txttelefono_casa_per.disabled=true;
			   lof.txtcorreo_per.disabled=true;
			   lof.txtdireccion_habitacion_per.disabled=true;
			   lof.txtobservacion_per.disabled=true;
			   lof.cmbidestatus.disabled=true;
			   lof.txttelefono_corp_per.disabled=true;
			   lof.txtfecha_ven_lic.disabled=true;
			   lof.txtfecha_ven_cermed.disabled=true;
			   lof.txtfecha_ven_ci.disabled=true;
			   lof.txtfecha_ven_cersal.disabled=true;
			   lof.txtfecha_ven_manali.disabled=true;
				lof.btnnuevo.disabled=false;
				lof.btnbuscar.disabled=false;
				lof.btnguardar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=true;
			}

			function fmodificar()
			{
				lof=document.fconductoratc;
				lof.txtoperacion.value="modificar";
				lof.txtcedula.disabled=false;
				lof.txtnombres_per.disabled=false;
				lof.txtnombres_per.focus();
				lof.txtapellidos_per.disabled=false;
				lof.txttelefono_movil_per.disabled=false;
				lof.txttelefono_casa_per.disabled=false;
				lof.txtcorreo_per.disabled=false;
				lof.txtdireccion_habitacion_per.disabled=false;
				lof.txtobservacion_per.disabled=false;
				lof.cmbidestatus.disabled=false;
				lof.txttelefono_corp_per.disabled=false;
				lof.txtfecha_ven_lic.disabled=false;
				lof.txtfecha_ven_cermed.disabled=false;
				lof.txtfecha_ven_ci.disabled=false;
				lof.txtfecha_ven_cersal.disabled=false;
				lof.txtfecha_ven_manali.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnguardar.disabled=false;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=false;
			}
			function feliminar()
			{
				lof=document.fconductoratc;
				if (confirm("desea eliminar"))
				{
					lof.txtcedula.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
			}
			function factivar()
			{
				lof=document.fconductoratc;
				if (confirm("desea Activar"))
				{
					lof.txtcedula.disabled=false;
					lof.txtoperacion.value="activar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
			}
			function fperderfocuscedula()
			{
				lof=document.fconductoratc;
				if (lof.txtcedula.value!="")
				{
					lof.txtoperacion.value="buscar";
					lof.submit();
				}
				else
				{
					lof.txtcedula.focus();
				}
			}
			//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abreconductoratc(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaconductoratc.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
		</script>
