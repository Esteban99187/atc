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
   
	$liidcuenta= isset($_GET['liidcuenta']) ? $_GET['liidcuenta'] : null ;
	$lsbanco_idbanco= isset($_GET['lsbanco_idbanco']) ? $_GET['lsbanco_idbanco'] : null ;
	$lsidtipo_cuenta= isset($_GET['lsidtipo_cuenta']) ? $_GET['lsidtipo_cuenta'] : null ;
	$lsidcliente= isset($_GET['lsidcliente']) ? $_GET['lsidcliente'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
	$lsestatus_cuenta = isset($_GET['lsestatus_cuenta']) ? $_GET['lsestatus_cuenta'] : null;
?>
  <script type="text/javascript">
	function BuscarAjaxmaestro_cuenta(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxmaestro_cuenta&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxmaestro_cuenta&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxmaestro_cuenta&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Cuentas Bancarias</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrecuenta()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fcuenta" id="fcuenta" action="../controlador/control_maestro_cuenta.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Código:</label>
								<input class="form-control"  type="text" name="txtidcuenta"  title="Ingrese el Código"  onkeypress="return soloNumero(event)" placeholder="Solo Ingrese Números" maxlength="20" minlength="20" tabindex="1" value="<?php print($liidcuenta);?>" onblur="fperderfocusidcuenta();">
							</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label>Banco</label>
								<select  title="Seleccione la Entidad Bancaria"  class="form-control"  name="cmbbanco_idbanco" id="cmbbanco_idbanco" >
									<option value="" value="<?php print($lsbanco_idbanco);?>" >seleccione</option>
										<?php
											$lssql="select idbanco,concat(' ',desc_banc) as nombre from banco order by nombre";
											$lobjcombo->fgenerar($lssql,"idbanco","nombre","");

										?>
								</select>
							</div>		
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							
						<div class="col-lg-3">
								<div class="form-group has-error">
								<label>Tipo de Cuenta</label>
								<select  title="Seleccion un tipo de cuenta"  class="form-control"  name="cmbidtipo_cuenta" id="cmbidtipo_cuenta" >
									<option value="" value="<?php print($lsidtipo_cuenta);?>" >seleccione</option>
										<?php
											$lssql="select idtipo_cuenta,concat(' ',desc_tipo_cuen) as nombre from tipo_cuenta order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_cuenta","nombre","");

										?>
								</select>
							</div>		
							</div>	
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>		
							<div class="col-lg-4">
								<div class="form-group has-error">
								<label>Cliente</label>
								<select  title="Indique un cliente" class="form-control"  name="cmbidcliente" id="cmbidcliente">
									<option value="" value="<?php print($lsidcliente);?>" >seleccione</option>
										<?php
											$lssql="select idcliente,concat(' ',nombre_cli) as nombre from cliente order by nombre";
											$lobjcombo->fgenerar($lssql,"idcliente","nombre","");

										?>
								</select>
							</div>		
							</div>		
							
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>		
							</div>		
						<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-8">
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado</label>
							</div>
						</div>
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_cuenta==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_cuenta==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_cuenta')">Cancelar</button>
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
			<label>Requisito priomordial el registro de la cuenta bancaria  </label>
		</div> 
		</div>
	</div> 
</div>
</div>

<script language="javascript">


  finicio();

       function finicio()
       {
		lof=document.fcuenta;
		
			if (lof.txtoperacion.value=="buscar")
			{
			lof=document.fcuenta;

				lof.txtidcuenta.readOnly=true;
				lof.cmbbanco_idbanco.value="<?php print($lsbanco_idbanco);?>";
				lof.cmbbanco_idbanco.disabled=true;
				lof.cmbidtipo_cuenta.value="<?php print($lsidtipo_cuenta);?>";
				lof.cmbidtipo_cuenta.disabled=true;
				lof.cmbidcliente.value="<?php print($lsidcliente);?>";
				lof.cmbidcliente.disabled=true;

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
		lof=document.fcuenta;
		lof.txtoperacion.value="incluir";
	
			lof.txtidcuenta.disabled=false;
			lof.txtidcuenta.focus();
			lof.cmbbanco_idbanco.disabled=false;
			lof.cmbidtipo_cuenta.disabled=false;
			lof.cmbidcliente.disabled=false;
	
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	
  function fcancelar()
	{
		lof=document.fcuenta;
		   lof.txtidcuenta.value="";
		   lof.cmbbanco_idbanco.value="-";
		   lof.cmbidtipo_cuenta.value="-";
		   lof.cmbidcliente.value="-";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		   lof.txtidcuenta.disabled=true;
		   lof.cmbbanco_idbanco.disabled=true;
		   lof.cmbidtipo_cuenta.disabled=true;
		   lof.cmbidcliente.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	} 

 function fmodificar()
	{
		lof=document.fcuenta;
		lof.txtoperacion.value="modificar";
		   lof.txtidcuenta.readOnly=true;
		   lof.cmbbanco_idbanco.disabled=false;
		   lof.cmbidtipo_cuenta.disabled=false;
		   lof.cmbidcliente.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}

       function feliminar()
	{
		lof=document.fcuenta;
			if (confirm("¿Desea desactivar el registro?"))
			{
				lof.txtidcuenta.disabled=false;
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
		lof=document.fcuenta;
		lof.txtidcuenta.disabled=false;
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
		function abrecuenta(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudacuenta.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
