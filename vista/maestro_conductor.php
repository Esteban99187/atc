<?php

	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();

	$licedula = isset($_GET['licedula']) ? $_GET['licedula'] : null;
	$lsnombres_per = isset($_GET['lsnombres_per']) ? $_GET['lsnombres_per'] : null;
	$lsapellidos_per = isset($_GET['lsapellidos_per']) ? $_GET['lsapellidos_per'] : null;
	$lstelefono_movil_per = isset($_GET['lstelefono_movil_per']) ? $_GET['lstelefono_movil_per'] : null;
	$lstelefono_casa_per = isset($_GET['lstelefono_casa_per']) ? $_GET['lstelefono_casa_per'] : null;
	$lstelefono_corp_per = isset($_GET['lstelefono_corp_per']) ? $_GET['lstelefono_corp_per'] : null;
	$lscorreo_per = isset($_GET['lscorreo_per']) ? $_GET['lscorreo_per'] : null;
	$lsdireccion_habitacion_per = isset($_GET['lsdireccion_habitacion_per']) ? $_GET['lsdireccion_habitacion_per'] : null;
	$lsfecha_nacimiento_per = isset($_GET['lsfecha_nacimiento_per']) ? $_GET['lsfecha_nacimiento_per'] : null;
	$lsfecha_contratacion_per = isset($_GET['lsfecha_contratacion_per']) ? $_GET['lsfecha_contratacion_per'] : null;
	$lsfecha_ven_lic = isset($_GET['lsfecha_ven_lic']) ? $_GET['lsfecha_ven_lic'] : null;
	$lsfecha_ven_cermed = isset($_GET['lsfecha_ven_cermed']) ? $_GET['lsfecha_ven_cermed'] : null;
	$lsfecha_ven_ci = isset($_GET['lsfecha_ven_ci']) ? $_GET['lsfecha_ven_ci'] : null;
	$lsfecha_ven_cersal = isset($_GET['lsfecha_ven_cersal']) ? $_GET['lsfecha_ven_cersal'] : null;
	$lsfecha_ven_manali = isset($_GET['lsfecha_ven_manali']) ? $_GET['lsfecha_ven_manali'] : null;
	$lssueldo_mensual_per = isset($_GET['lssueldo_mensual_per']) ? $_GET['lssueldo_mensual_per'] : null;
	$lsperiodo_pago_per = isset($_GET['lsperiodo_pago_per']) ? $_GET['lsperiodo_pago_per'] : null;
	$lsforma_pago_per = isset($_GET['lsforma_pago_per']) ? $_GET['lsforma_pago_per'] : null;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;

?>

<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Consulta de Conductor</strong></div>
				<div class="panel-body">
					<form method="post" name="fmaestro_conductor" id="fmaestro_conductor" action="../controlador/control_maestro_conductor.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3">		
						<input class="form-control"  type="text" name="txtcedula" placeholder="Cédula" title="Ingrese cédula"   maxlength="8" tabindex="1" value="<?php print($licedula);?>" onblur="fperderfocuscedula();">
							</div>
							<div class="form-group col-lg-3">
						<input class="form-control" type="text" name="txtnombres_per" placeholder="Nombres"  title="Ingrese nombres" maxlength="50"  tabindex="1"  value="<?php print($lsnombres_per);?>"> 
						</div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txtapellidos_per" placeholder="Apellidos"   title="Ingrese apellidos" maxlength="50"  tabindex="2"  value="<?php print($lsapellidos_per);?>"> 
							</div>
					
							<div class="form-group col-lg-3">
								<input class="form-control"  type="date" name="txtfecha_nacimiento_per" placeholder="Fecha de Nacimiento" title="Ingrese fecha de nacimiento" maxlength="10" value="<?php print($lsfecha_nacimiento_per);?>"> 
							</div>
							</div><div class="row">
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txttelefono_movil_per" placeholder="Teléfono móvil"  title="Ingrese teléfono móvil" maxlength="11"  tabindex="2"  value="<?php print($lstelefono_movil_per);?>"> 
							</div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txttelefono_casa_per" placeholder="Teléfono Casa" title="Ingrese teléfono de casa" maxlength="11"  tabindex="2"  value="<?php print($lstelefono_casa_per);?>"> 
							</div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txttelefono_corp_per" placeholder="Teléfono Coorporativo"  title="Ingrese Teléfono Coorporativo" maxlength="11"  tabindex="2" value="<?php print($lstelefono_corp_per);?>"> 
							</div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txtcorreo_per" placeholder="Correo"  title="Ingrese Correo Electrónico" maxlength="50"  tabindex="2"  value="<?php print($lscorreo_per);?>"> 
							</div>
							</div><div class="row">
							<div class="form-group col-lg-11">
								<input class="form-control"  type="text" name="txtdireccion_habitacion_per" placeholder="Dirección" title="Ingrese Dirección" maxlength="50"  tabindex="2"  value="<?php print($lsdireccion_habitacion_per);?>"> 
							</div>
							</div><div class="row">
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txtfecha_contratacion_per" placeholder="Fecha de Contratación"  title="Ingrese Fecha Contratación " maxlength="10"  id="datepicker1" value="<?php print($lsfecha_contratacion_per);?>"> 
							
			</div>
							
							<div class="form-group col-lg-3">
			<select  class="form-control"  name="cmbperiodo_pago_per" id="cmbperiodo_pago_per">
				<option value="" selected="selected" >Seleccione Período de Pago</option>
				<option value="diario">Diario</option>
				<option value="semanal">Semanal</option>
				<option value="quincenal">Quincenal</option>
				<option value="mensual">Mensual</option>
		    </select> 
</div>
							<div class="form-group col-lg-3">
			<select  class="form-control"  name="cmbforma_pago_per" id="cmbforma_pago_per">
				<option value="" selected="selected">Seleccione Forma de Pago</option>
				<option value="deposito">Depósito</option>
				<option value="transferencia">Transferencia</option>
				<option value="efectivo">Efectivo</option>
				<option value="cheque">Cheque</option>
		    </select>
		    </div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txtsueldo_mensual_per" placeholder="Sueldo Mensual"   title="Ingrese Sueldo Mensual" maxlength="50" value="<?php print($lssueldo_mensual_per);?>"> 
								</div>
							</div><div class="row">
							<div class="form-group col-lg-2">
								<input class="form-control"  type="date"  name="txtfecha_ven_ci" placeholder="F/V.Cédula" title="Ingrese Fecha de Vencimiento de la Cédula" maxlength="10"  tabindex="2" id="datepicker2" value="<?php print($lsfecha_ven_ci);?>"> 
						</div>
							<div class="form-group col-lg-2">
								<input class="form-control"  type="date"  name="txtfecha_ven_lic" placeholder="F/V.Licencia" title="Ingrese Fecha de Vencimiento de la Licencia" maxlength="10" id="datepicker2" value="<?php print($lsfecha_ven_lic);?>"> 
						</div>
							<div class="form-group col-lg-2">
								<input class="form-control"  type="text"  name="txtfecha_ven_cermed" placeholder="F/V.Certif.Médico" title="Ingrese la fecha de vencimiento del certificado medico" maxlength="10" id="datepicker2" value="<?php print($lsfecha_ven_cermed);?>"> 

							</div>
							<div class="form-group col-lg-2">
								<input class="form-control"  type="text"  name="txtfecha_ven_cersal" placeholder="F/V.Certif.Salud" title="Ingrese Fecha de Vencimiento de salud" maxlength="10" id="datepicker2" value="<?php print($lsfecha_ven_cersal);?>"> 
							</div>
							<div class="form-group col-lg-3">
								<input class="form-control"  type="text" name="txtfecha_ven_manali" placeholder="F/V.Manipulación" title="Ingrese Fecha de Vencimiento de Manipulacion" maxlength="10" id="datepicker6"  value="<?php print($lsfecha_ven_manali);?>"> 
					</div>
					
					
							<div class="form-group col-lg-1">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbreconductor" value="..." class="btn btn-primary"  onclick="abreconductor()">
							</div>
						</div>
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="submit" name="btnguardar" value="Guardar           " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="reset" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="cancelar('maestro_conductor')"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnbuscar" value="Buscar             " class="btn btn-primary" tabindex="22" onclick="fbuscar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnmodificar" value="Modificar             " class="btn btn-primary" tabindex="23" onclick="fmodificar();" ></div>
							<div class="form-group col-lg-1"><input type="button" name="btneliminar" value="Eliminar              " class="btn btn-primary" tabindex="7" onclick="feliminar();" ></div>
							<div class="form-group col-lg-1"><input type="button" onclick="flistar();" value="Listar      " class="btn btn-primary" 	/></div>
						 </center> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<script language="javascript">
						function flistar()
	{
		mipopup = window.open("lista/listapersonal2.php","miwin","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}
                    </script>
          <script language="javascript">

                                function fayuda()
                                    {
                                            mipopup = window.open("ayuda/ayudaconductor.php","miwin","width=550,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>


		<script language="javascript">

			finicio();
		    function finicio()
		    {
			    lof=document.fmaestro_conductor;
			    if (lof.txtoperacion.value!="buscar")
			    {
				    if (lof.txthacer.value=="listo")
				    {
						if (lof.txtoperacion.value=="incluir")
						{
							alert("registro incluido");
						}
						else if (lof.txtoperacion.value=="modificar")
						{
							alert("registro modificado");
						}
						else if (lof.txtoperacion.value=="eliminar")
						{
							alert("registro eliminado");
						}
					}
					if (lof.txthacer.value!="listo"&&lof.txthacer.value!="")
					{
						alert("no se pudo realizar la operación");
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
					else if ((lof.txthay.value==0)&&(lof.txtcedula.value.length<7)&&(lof.txthacer.value=="incluir"))
					{
						alert("Digitos insuficentes, numero de cedula debe ser mayor a 7 digitos");
						lof.btnguardar.disabled=false;
						lof.btncancelar.disabled=false;
						lof.btnnuevo.disabled=true;
						lof.btnbuscar.disabled=true;
						lof.btnmodificar.disabled=true;
						lof.btneliminar.disabled=true
					}
					else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
					{
						lof.txtoperacion.value="incluir";
						lof.txtcedula.disabled=true;
						lof.txtnombres_per.disabled=false;
						lof.txtnombres_per.focus();
						lof.txtapellidos_per.disabled=false;
						lof.txttelefono_movil_per.disabled=false;
						lof.txttelefono_casa_per.disabled=false;
						lof.txttelefono_corp_per.disabled=false;
						lof.txtcorreo_per.disabled=false;
						lof.txtdireccion_habitacion_per.disabled=false;
						lof.txtfecha_nacimiento_per.disabled=false;
						lof.txtfecha_contratacion_per.disabled=false;
						lof.txtfecha_ven_lic.disabled=false;
						lof.txtfecha_ven_cermed.disabled=false;
						lof.txtfecha_ven_ci.disabled=false;
						lof.txtfecha_ven_cersal.disabled=false;
						lof.txtfecha_ven_manali.disabled=false;
						lof.txtsueldo_mensual_per.disabled=false;
						lof.cmbperiodo_pago_per.disabled=false;
						lof.cmbforma_pago_per.disabled=false;
						lof.btnguardar.disabled=false;
						lof.btncancelar.disabled=false;
						lof.btnnuevo.disabled=true;
						lof.btnbuscar.disabled=true;
						lof.btnmodificar.disabled=true;
						lof.btneliminar.disabled=true;
						lof.btnAbreconductor.disabled=true;
					}

				}
		    }

		   function fexiste()
		   {
				lof=document.fmaestro_conductor;
				lof.txtcedula.disabled=true;
				lof.txtnombres_per.disabled=true;
				lof.txtapellidos_per.disabled=true;
				lof.txttelefono_movil_per.disabled=true;
				lof.txttelefono_casa_per.disabled=true;
				lof.txttelefono_corp_per.disabled=true;
				lof.txtcorreo_per.disabled=true;
				lof.txtdireccion_habitacion_per.disabled=true;
				lof.txtfecha_nacimiento_per.disabled=true;
				lof.txtfecha_contratacion_per.disabled=true;
				lof.txtfecha_ven_lic.disabled=true;
				lof.txtfecha_ven_cermed.disabled=true;
				lof.txtfecha_ven_ci.disabled=true;
				lof.txtfecha_ven_cersal.disabled=true;
				lof.txtfecha_ven_manali.disabled=true;
				lof.txtsueldo_mensual_per.disabled=true;
				lof.cmbperiodo_pago_per.value="<?php print($lsperiodo_pago_per);?>";
				lof.cmbperiodo_pago_per.disabled=true;
				lof.cmbforma_pago_per.value="<?php print($lsforma_pago_per);?>";
				lof.cmbforma_pago_per.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=false;
				lof.btnAbreconductor.disabled=true;

			}

			function fnuevo()
			{
				lof=document.fmaestro_conductor;
				lof.txthacer.value="incluir";
				lof.txtcedula.disabled=false;
				lof.txtcedula.focus();
				lof.txtnombres_per.disabled=false;
				lof.txtapellidos_per.disabled=false;
				lof.txttelefono_movil_per.disabled=false;
				lof.txttelefono_casa_per.disabled=false;
				lof.txttelefono_corp_per.disabled=false;
				lof.txtcorreo_per.disabled=false;
				lof.txtdireccion_habitacion_per.disabled=false;
				lof.txtfecha_nacimiento_per.disabled=false;
				lof.txtfecha_contratacion_per.disabled=false;
				lof.txtfecha_ven_lic.disabled=false;
				lof.txtfecha_ven_cermed.disabled=false;
				lof.txtfecha_ven_ci.disabled=false;
				lof.txtfecha_ven_cersal.disabled=false;
				lof.txtfecha_ven_manali.disabled=false;
				lof.txtsueldo_mensual_per.disabled=false;
				lof.cmbperiodo_pago_per.disabled=false;
				lof.cmbforma_pago_per.disabled=false;
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btnAbreconductor.disabled=true;
			}

			function fcancelar()
			{
			   lof=document.fmaestro_conductor;
			   lof.txtcedula.value="";
			   lof.txtnombres_per.value="";
			   lof.txtapellidos_per.value="";
			   lof.txttelefono_movil_per.value="";
			   lof.txttelefono_casa_per.value="";
			   lof.txttelefono_corp_per.value="";
			   lof.txtcorreo_per.value="";
			   lof.txtdireccion_habitacion_per.value="";
			   lof.txtfecha_nacimiento_per.value="";
			   lof.txtfecha_contratacion_per.value="";
			   lof.txtfecha_ven_lic.value="";
			   lof.txtfecha_ven_cermed.value="";
			   lof.txtfecha_ven_ci.value="";
			   lof.txtfecha_ven_cersal.value="";
			   lof.txtfecha_ven_manali.value="";
			   lof.txtsueldo_mensual_per.value="";
			   lof.cmbperiodo_pago_per.value="-";
			   lof.cmbforma_pago_per.value="-";
			   lof.txtoperacion.value="";
			   lof.txthacer.value="";
			   lof.txthay.value=0;
			   lof.txtcedula.disabled=true;
			   lof.txtnombres_per.disabled=true;
			   lof.txtapellidos_per.disabled=true;
			   lof.txttelefono_movil_per.disabled=true;
			   lof.txttelefono_casa_per.disabled=true;
			   lof.txttelefono_corp_per.disabled=true;
			   lof.txtcorreo_per.disabled=true;
			   lof.txtdireccion_habitacion_per.disabled=true;
			   lof.txtfecha_nacimiento_per.disabled=true;
			   lof.txtfecha_contratacion_per.disabled=true;
			   lof.txtfecha_ven_lic.disabled=true;
			   lof.txtfecha_ven_cermed.disabled=true;
			   lof.txtfecha_ven_ci.disabled=true;
			   lof.txtfecha_ven_cersal.disabled=true;
			   lof.txtfecha_ven_manali.disabled=true;
			   lof.txtsueldo_mensual_per.disabled=true;
			   lof.cmbperiodo_pago_per.disabled=true;
			   lof.cmbforma_pago_per.disabled=true;
			   lof.btnguardar.disabled=true;
			   lof.btncancelar.disabled=true;
			   lof.btnnuevo.disabled=true;
			   lof.btnbuscar.disabled=false;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			   lof.btnAbreconductor.disabled=true;
			}

			function fbuscar()
			{
			   lof=document.fmaestro_conductor;
			   lof.txtcedula.disabled=false;
			   lof.txtcedula.focus();
			   lof.txtnombres_per.disabled=true;
			   lof.txtapellidos_per.disabled=true;
			   lof.txttelefono_movil_per.disabled=true;
			   lof.txttelefono_casa_per.disabled=true;
			   lof.txttelefono_corp_per.disabled=true;
			   lof.txtcorreo_per.disabled=true;
			   lof.txtdireccion_habitacion_per.disabled=true;
			   lof.txtfecha_nacimiento_per.disabled=true;
			   lof.txtfecha_contratacion_per.disabled=true;
			   lof.txtfecha_ven_lic.disabled=true;
			   lof.txtfecha_ven_cermed.disabled=true;
			   lof.txtfecha_ven_ci.disabled=true;
			   lof.txtfecha_ven_cersal.disabled=true;
			   lof.txtfecha_ven_manali.disabled=true;
			   lof.txtsueldo_mensual_per.disabled=true;
			   lof.cmbperiodo_pago_per.disabled=true;
			   lof.btnguardar.disabled=true;
			   lof.btncancelar.disabled=false;
			   lof.btnnuevo.disabled=true;
			   lof.btnbuscar.disabled=false;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			   lof.btnAbreconductor.disabled=false;
			}

			function fmodificar()
			{
			   lof=document.fmaestro_conductor;
			   lof.txtoperacion.value="modificar";
			   lof.txtcedula.disabled=true;
			   lof.txtnombres_per.disabled=true;
			   lof.txtapellidos_per.disabled=true;
			   lof.txttelefono_movil_per.disabled=true;
			   lof.txttelefono_casa_per.disabled=true;
			   lof.txttelefono_corp_per.disabled=false;
			   lof.txtcorreo_per.disabled=true;
			   lof.txtdireccion_habitacion_per.disabled=true;
			   lof.txtfecha_nacimiento_per.disabled=true;
			   lof.txtfecha_contratacion_per.disabled=true;
			   lof.txtfecha_ven_lic.disabled=false;
			   lof.txtfecha_ven_cermed.disabled=false;
			   lof.txtfecha_ven_ci.disabled=false;
			   lof.txtfecha_ven_cersal.disabled=false;
			   lof.txtfecha_ven_manali.disabled=false;
			   lof.txtsueldo_mensual_per.disabled=true;
			   lof.cmbperiodo_pago_per.disabled=true;
			   lof.cmbforma_pago_per.disabled=true;
			   lof.btnguardar.disabled=false;
			   lof.btncancelar.disabled=false;
			   lof.btnnuevo.disabled=true;
			   lof.btnbuscar.disabled=true;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			   lof.btnAbreconductor.disabled=true;
			}

			function feliminar()
			{
				lof=document.fmaestro_conductor;
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

			function fperderfocuscedula()
			{
				lof=document.fmaestro_conductor;
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

			function fguardar()
			{
				lof=document.fmaestro_conductor;
				lof.txtcedula.disabled=false;
				
			}

						

	function fayuda()
	{
		mipopup = window.open("ayuda/ayudaconductor.php","miwin","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}

	var miPopup
		function abreconductor(){
		miPopup = window.open("busqueda/buscaconductor.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

		</script>
		<script type="text/javascript">

	fInicio();

	<!-- Abre una Ventana Emergente -->
	var miPopup
	function abreconductor(){
		miPopup = window.open("busqueda/buscaconductor.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}


		</script>

		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker").datepicker({
			firstDay: 1
			});
			});
		</script>
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker1").datepicker({
			firstDay: 1
			});
			});
		</script>
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker2").datepicker({
			firstDay: 1
			});
			});
		</script>
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker3").datepicker({
			firstDay: 1
			});
			});
		</script>
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker4").datepicker({
			firstDay: 1
			});
			});
		</script>
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker5").datepicker({
			firstDay: 1
			});
			});
		</script>

		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker6").datepicker({
			firstDay: 1
			});
			});
		</script>

	</fieldset>
