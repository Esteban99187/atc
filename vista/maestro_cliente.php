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

	$liidcliente = isset($_GET['liidcliente']) ? $_GET['liidcliente'] : null;
	$lsnombre_cli = isset($_GET['lsnombre_cli']) ? $_GET['lsnombre_cli'] : null;
	
	$lsidtipo_cliente_cli = isset($_GET['lsidtipo_cliente_cli']) ? $_GET['lsidtipo_cliente_cli'] : null;
	$lsidtipo_contribuyente_cli = isset($_GET['lsidtipo_contribuyente_cli']) ? $_GET['lsidtipo_contribuyente_cli'] : null;
	$lsidtipo_proveedor_cli = isset($_GET['lsidtipo_proveedor_cli']) ? $_GET['lsidtipo_proveedor_cli'] : null;
	$lssector_cli = isset($_GET['lssector_cli']) ? $_GET['lssector_cli'] : null;
	$lsorigen_cli = isset($_GET['lsorigen_cli']) ? $_GET['lsorigen_cli'] : null;
	$lsdireccion_cli = isset($_GET['lsdireccion_cli']) ? $_GET['lsdireccion_cli'] : null;
	$lstelefono_cli = isset($_GET['lstelefono_cli']) ? $_GET['lstelefono_cli'] : null;
	$lstelefono_movil_cli = isset($_GET['lstelefono_movil_cli']) ? $_GET['lstelefono_movil_cli'] : null;
	$lspag_web_cli = isset($_GET['lspag_web_cli']) ? $_GET['lspag_web_cli'] : null;
	$lscorreo_cli = isset($_GET['lscorreo_cli']) ? $_GET['lscorreo_cli'] : null;
	$lsnro_fax_cli = isset($_GET['lsnro_fax_cli']) ? $_GET['lsnro_fax_cli'] : null;
	$lsestatus_cli = isset($_GET['lsestatus_cli']) ? $_GET['lsestatus_cli'] : null;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
?>

<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.9.1.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.ui.datepicker-es.js"></script>
		

<script type="text/javascript">
	function BuscarAjaxcliente(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/control_maestro_cliente.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxCliente&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxCliente&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxCliente&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
	</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Cliente</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrecliente()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fcliente" id="fcliente" action="../controlador/control_maestro_cliente.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						
						<div class="row">
							<hr><h5><center>Datos Fiscales</h5></center><hr>							
						<div class="col-lg-3">
								<div class="form-group has-error">
								<label >RIF:</label>
								<input class="form-control"  type="text" name="txtidcliente" title="Ingrese el Rif"  placeholder="Solo Ingrese Números" maxlength="20" minlength="20" value="<?php print($liidcliente);?>" onblur="fperderfocusidcliente();">
						</div>	
						</div>	
								<div class="form-group col-lg-1">
								<label>Buscar</label>
								<button  name="btnAbrecliente" value="..." class="btn btn-primary"  onclick="abrecliente()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						<div class="form-group col-lg-7">
							<label>Razón Social</label>
								<input class="form-control"  onBlur="cambio_mayus(this)"  type="text" name="txtnombre_cli" title="Ingrese la Razón Social"  value="<?php print($lsnombre_cli);?>" >
						</div>
					
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="col-lg-6">
								<div class="form-group has-error">
							<label>Dirección</label>
								<input class="form-control"  onBlur="cambio_mayus(this)" type="text" name="txtdireccion_cli" title="Ingrese la dirección"  maxlength="300"  value="<?php print($lsdireccion_cli);?>" onblur="fperderfocusdireccion_cli();">
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
<!--
						<div class="form-group col-lg-4">
							<label>Apellido</label>
								<input class="form-control"  type="text" name="txtapellido_cli" title="Ingrese apellido"  value="<?php print($lsapellido_cli);?>" >
						</div>
-->

						<div class="row">
							<div class="col-lg-4">
								<div class="form-group has-error">
							<label>Tipo de Contribuyente</label>
								<select  class="form-control" onBlur="cambio_mayus(this)"  name="cmbidtipo_contribuyente_cli" id="cmbidtipo_contribuyente_cli">
									<option value="" value="<?php print($lsidtipo_contribuyente_cli);?>" >Seleccione</option>
										<?php
											$lssql="select idtipo_contribuyente,concat(' ',desc_tipo_cont) as nombre from tipo_contribuyente order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_contribuyente","nombre","");
										?>
								</select>
						</div>
						</div>
						
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
						<div class="col-lg-5">
								<div class="form-group has-error">
							<label>Sector Empresarial</label>
								<select  class="form-control" onBlur="cambio_mayus(this)" name="cmbsector_cli" id="cmbsector_cli">
									<option value="" value="<?php print($lssector_cli);?>" >Seleccione</option>
										<option value="privado">Privado</option>
										<option value="publico">Público</option>
								</select> 
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
						<div class="col-lg-5">
								<div class="form-group has-error">
							<label>Tipo de cliente</label>
								<select  class="form-control" onBlur="cambio_mayus(this)" name="cmbidtipo_cliente_cli" id="cmbidtipo_cliente_cli">
									<option value="" value="<?php print($lsidtipo_cliente_cli);?>" >Seleccione</option>
										<?php
											$lssql="select idtipo_cliente,concat(' ',desc_tipo_clie) as nombre from tipo_cliente order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_cliente","nombre","");
										?>
								</select> 
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
						
					<div class="col-lg-5">
								<div class="form-group has-error">
							<label>Rubro</label>
								<select  class="form-control" onBlur="cambio_mayus(this)" name="cmbidtipo_proveedor_cli" id="cmbidtipo_proveedor_cli">
									<option value="" value="<?php print($lsidtipo_proveedor_cli);?>" >Seleccione</option>
										<?php
											$lssql="select idtipo_proveedor,concat(' ',desc_tipo_prov) as nombre from tipo_proveedor order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_proveedor","nombre","");
										?>
								</select>
								</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							
						
							<div class="col-lg-5">
								<div class="form-group has-error">
							<label>Origen Empresarial</label>
								<select  class="form-control" onBlur="cambio_mayus(this)" name="cmborigen_cli" id="cmborigen_cli">
									<option value="" value="<?php print($lsorigen_cli);?>" >Seleccione</option>
										<option value="Nacional">Nacional</option>
										<option value="Extranjero">Extranjero</option>
								</select>
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
						<hr><h5><center>Datos de Contactos</h5></center><hr>							
						<div class="col-lg-3">
								<div class="form-group has-error">
							<label>Teléfono fijo</label>
								<input class="form-control" placeholder="Solo Ingrese Números" onkeypress="return soloNumero(event)" type="text" name="txttelefono_cli" title="Ingrese el teléfono fijo"    maxlength="11" minlength="20" value="<?php print($lstelefono_cli);?>" onblur="fperderfocustelefono_cli();">
						</div>
						</div>
						<div class="col-lg-3">
								<div class="form-group has-error">
							<label>Teléfono móvil</label>
								<input class="form-control"  placeholder="Solo Ingrese Números" onkeypress="return soloNumero(event)" type="text" name="txttelefono_movil_cli" title="Ingrese el teléfono móvil"   maxlength="11" minlength="20" value="<?php print($lstelefono_movil_cli);?>" onblur="fperderfocustelefono_movil_cli();">
						</div>
						</div>
						<div class="col-lg-3">
								<div class="form-group has-error">
							<label>Nro Fax</label>
								<input class="form-control" placeholder="Solo Ingrese Números" onkeypress="return soloNumero(event)"  type="text" name="txtnro_fax_cli" title="Ingrese el número de fax"  maxlength="20" minlength="13" value="<?php print($lsnro_fax_cli);?>" onblur="fperderfocusnro_fax_cli();">
						</div>	
						</div>		
						<div class="col-lg-3">
								<div class="form-group has-error">
							<label>Página Web</label>
								<input class="form-control" onBlur="cambio_mayus(this)" type="text" name="txtpag_web_cli" title="Ingrese la pagina web"  maxlength="300" value="<?php print($lspag_web_cli);?>" onblur="fperderfocuspag_web_cli();">
						</div>
						</div>
						<div class="col-lg-4">
								<div class="form-group has-error">
							<label>Correo</label>
								<input class="form-control"  onBlur="cambio_mayus(this)" type="text" name="txtcorreo_cli" title="Ingrese correo"  maxlength="300"  value="<?php print($lscorreo_cli);?>" onblur="fperderfocuscorreo_cli();">
						</div>
						</div>
							</div>	
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_cli==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_cli==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_cliente')">Cancelar</button>
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
			<label>El software permite registrar los datos de los clientes que deseen solicitar el envío de cualquier producto o mercancía a transportar. </label>
		</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">
finicio();

       function finicio()
       {
		lof=document.fcliente;
		
			if (lof.txtoperacion.value=="buscar")
			{
			lof=document.fcliente;

				lof.txtidcliente.disabled=true;
				lof.txtnombre_cli.disabled=true;
				lof.cmbidtipo_cliente_cli.value="<?php print($lsidtipo_cliente_cli);?>";
				lof.cmbidtipo_cliente_cli.disabled=true;
				lof.cmbidtipo_contribuyente_cli.value="<?php print($lsidtipo_contribuyente_cli);?>";
				lof.cmbidtipo_contribuyente_cli.disabled=true;
				lof.cmbidtipo_proveedor_cli.value="<?php print($lsidtipo_proveedor_cli);?>";
				lof.cmbidtipo_proveedor_cli.disabled=true;
				lof.cmbsector_cli.value="<?php print($lssector_cli);?>";
				lof.cmbsector_cli.disabled=true;
				lof.cmborigen_cli.value="<?php print($lsorigen_cli);?>";
				lof.cmborigen_cli.disabled=true;
				lof.txtdireccion_cli.disabled=true;
				lof.txttelefono_cli.disabled=true;
				lof.txttelefono_movil_cli.disabled=true;
				lof.txtpag_web_cli.disabled=true;
				lof.txtcorreo_cli.disabled=true;
				lof.txtnro_fax_cli.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=false;
				}
				else
				{
					fcancelar();		
				}			

		}

	function fnuevo()
	{
		lof=document.fcliente;
		lof.txtoperacion.value="incluir";
	
			lof.txtidcliente.disabled=false;
			lof.txtidcliente.focus();
			lof.txtnombre_cli.disabled=false;
			lof.cmbidtipo_cliente_cli.disabled=false;
			lof.cmbidtipo_contribuyente_cli.disabled=false;
			lof.cmbidtipo_proveedor_cli.disabled=false;
			lof.cmbsector_cli.disabled=false;
			lof.cmborigen_cli.disabled=false;
			lof.txtdireccion_cli.disabled=false;
			lof.txttelefono_cli.disabled=false;
			lof.txttelefono_movil_cli.disabled=false;
			lof.txtpag_web_cli.disabled=false;
			lof.txtcorreo_cli.disabled=false;
			lof.txtnro_fax_cli.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
	}
	function fcancelar()
	{
		lof=document.fcliente;
		   lof.txtidcliente.value="";
		   lof.txtnombre_cli.value="";
		   lof.cmbidtipo_cliente_cli.value="-";
			lof.cmbidtipo_contribuyente_cli.value="-";
			lof.cmbidtipo_proveedor_cli.value="-";
			lof.cmbsector_cli.value="-";
			lof.cmborigen_cli.value="-";
			lof.txtdireccion_cli.value="";
			lof.txttelefono_cli.value="";
			lof.txttelefono_movil_cli.value="";
			lof.txtpag_web_cli.value="";
			lof.txtcorreo_cli.value="";
			lof.txtnro_fax_cli.value="";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
			 lof.txtidcliente.disabled=true;
			 lof.txtnombre_cli.disabled=true;
			lof.cmbidtipo_cliente_cli.disabled=true;
		   lof.cmbidtipo_contribuyente_cli.disabled=true;
		   lof.cmbidtipo_proveedor_cli.disabled=true;
		   lof.cmbsector_cli.disabled=true;
		   lof.cmborigen_cli.disabled=true;
		   lof.txtdireccion_cli.disabled=true;
			lof.txttelefono_cli.disabled=true;
			lof.txttelefono_movil_cli.disabled=true;
			lof.txtpag_web_cli.disabled=true;
			lof.txtcorreo_cli.disabled=true;
			lof.txtnro_fax_cli.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
	} 

	function fmodificar()
	{
		lof=document.fcliente;
		lof.txtoperacion.value="modificar";
		lof.txtidcliente.disabled=false;
			   lof.txtnombre_cli.disabled=false;
			   lof.txtnombre_cli.focus();
			   lof.cmbidtipo_cliente_cli.disabled=false;
			   lof.cmbidtipo_contribuyente_cli.disabled=false;
			   lof.cmbidtipo_proveedor_cli.disabled=false;
			   lof.cmbsector_cli.disabled=false;
			   lof.cmborigen_cli.disabled=false;
			   lof.txtdireccion_cli.disabled=false;
			   lof.txttelefono_cli.disabled=false;
			   lof.txttelefono_movil_cli.disabled=false;
			   lof.txtpag_web_cli.disabled=false;
			   lof.txtcorreo_cli.disabled=false;
			   lof.txtnro_fax_cli.disabled=false;
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
	}

function feliminar()
	{
		lof=document.fcliente;
			if (confirm("¿Desea desactivar el registro?"))
			{
				lof.txtidcliente.disabled=false;
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
		lof=document.fcliente;
		lof.txtidcliente.disabled=false;
			if (confirm("¿Desea activar el registro?"))
			{
				lof.txtoperacion.value="activar";
				lof.submit();
			}
			else
			{
				fcancelar();
			}
	}
	//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abrecliente(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudacliente.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>

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
		<script>
			$(function () {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker7").datepicker({
			firstDay: 1
			});
			});
		</script>

	</fieldset>
