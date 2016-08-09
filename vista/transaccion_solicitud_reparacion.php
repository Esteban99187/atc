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
	$control = isset($_GET['control']) ? $_GET['control'] : null ;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidsolicitud = isset($_GET['liidsolicitud']) ? $_GET['liidsolicitud'] : null;
	$lsidestatus = isset($_GET['lsidestatus']) ? $_GET['lsidestatus'] : null;
	$lsidempresa = isset($_GET['lsidempresa']) ? $_GET['lsidempresa'] : null;
	$lsnombre_razon_social_emp = isset($_GET['lsnombre_razon_social_emp']) ? $_GET['lsnombre_razon_social_emp'] : null;
	$lscedula_cont = isset($_GET['lscedula_cont']) ? $_GET['lscedula_cont'] : null;
	$lsnombre_cont = isset($_GET['lsnombre_cont']) ? $_GET['lsnombre_cont'] : null;
	$lsidproducto = isset($_GET['lsidproducto']) ? $_GET['lsidproducto'] : null;
	$lsnombre_pro = isset($_GET['lsnombre_pro']) ? $_GET['lsnombre_pro'] : null;
	$lsnombre_tippro = isset($_GET['lsnombre_tippro']) ? $_GET['lsnombre_tippro'] : null;
	$lsnombre_tipuni = isset($_GET['lsnombre_tipuni']) ? $_GET['lsnombre_tipuni'] : null;
	$lsnombre_unimed = isset($_GET['lsnombre_unimed']) ? $_GET['lsnombre_unimed'] : null;
	$lspeso_sol = isset($_GET['lspeso_sol']) ? $_GET['lspeso_sol'] : null;
	$lsidtabulador = isset($_GET['lsidtabulador']) ? $_GET['lsidtabulador'] : null;
	$lsnombre_estado_origen = isset($_GET['lsnombre_estado_origen']) ? $_GET['lsnombre_estado_origen'] : null;
	$lsnombre_estado_destino = isset($_GET['lsnombre_estado_destino']) ? $_GET['lsnombre_estado_destino'] : null;
	$lsprecio_tabulador = isset($_GET['lsprecio_tabulador']) ? $_GET['lsprecio_tabulador'] : null;
	$lsprecio_sol = isset($_GET['lsprecio_sol']) ? $_GET['lsprecio_sol'] : null;
	$lsunidades_req = isset($_GET['lsunidades_req']) ? $_GET['lsunidades_req'] : null;
	$lsdireccion_salida = isset($_GET['lsdireccion_salida']) ? $_GET['lsdireccion_salida'] : null;
	$lsdireccion_entrega = isset($_GET['lsdireccion_entrega']) ? $_GET['lsdireccion_entrega'] : null;
	$lsfecha_salida = isset($_GET['lsfecha_salida']) ? $_GET['lsfecha_salida'] : null;
	$lsfecha_entrega = isset($_GET['lsfecha_entrega']) ? $_GET['lsfecha_entrega'] : null;
	$lsobservaciones_sol = isset($_GET['lsobservaciones_sol']) ? $_GET['lsobservaciones_sol'] : null;
	$lshora_sol = isset($_GET['lshora_sol']) ? $_GET['lshora_sol'] : null;
	$lsfecha_sol = isset($_GET['lsfecha_sol']) ? $_GET['lsfecha_sol'] : null;
	$lscedula_res = isset($_GET['lscedula_res']) ? $_GET['lscedula_res'] : null;
	$lsnombre_res = isset($_GET['lsnombre_res']) ? $_GET['lsnombre_res'] : null;
	$lsapellido_res = isset($_GET['lsapellido_res']) ? $_GET['lsapellido_res'] : null;
	$lihay1 = isset($_GET['lihay1']) ? $_GET['lihay1'] : null;
	$lihay2 = isset($_GET['lihay2']) ? $_GET['lihay2'] : null;
	$lihay3 = isset($_GET['lihay3']) ? $_GET['lihay3'] : null;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Solicitud de Reparacion o Mantenimiento</strong></div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_transaccion_solicitud_reparacion.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthay1" value="<?php print($lihay1);?>">
						<input type="hidden" name="txthay2" value="<?php print($lihay2);?>">
						<input type="hidden" name="txthay3" value="<?php print($lihay3);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<img src="imagenes/ayuda.png" width="30" height="30" style="margin:0px 0px 10px 1060px;" onclick="fayuda();"  id="ayuda_maestro" />
						<div class="row">
							<div class="form-group col-lg-3">
									<input class="form-control" type="text" name="txtidsolicitud" placeholder="Código" title="Ingrese el numero de la solicitud de reparacion" maxlength="3" tabindex="1"  value="<?php print($liidsolicitud);?>" onblur="fperderfocusidsolicitud();">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control" readonly type="text" name="txtfecha_sol" placeholder="Fecha"  maxlength="12" tabindex="2"  value="<?php print($lsfecha_sol);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control" readonly type="text" name="txthora_sol" placeholder="Hora" maxlength="12" tabindex="2"  value="<?php print($lshora_sol);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control" readonly type="text" name="txtidestatus" placeholder="Estatus" maxlength="12" tabindex="2"  value="<?php print($lsidestatus);?>">
							</div>
							<div class="form-group col-lg-4">
									<input class="form-control" class="form-control" readonly  type="text" name="txtcedula_res" placeholder="Cédula Responsable" maxlength="12" tabindex="2"  value="<?php print($lscedula_res);?>">
							</div>
							<div class="form-group col-lg-4">
									<input class="form-control" readonly type="text" name="txtnombre_res" placeholder="Nombre Responsable"  maxlength="12" tabindex="2"  value="<?php print($lsnombre_res);?>">
							</div>
							<div class="form-group col-lg-4">
									<input class="form-control" readonly type="text" name="txtapellido_res" placeholder="Apellido Responsable"  maxlength="12" tabindex="2"  value="<?php print($lsapellido_res);?>">
							</div>
							<div class="form-group col-lg-2">
									<input class="form-control"  type="text" name="txtidempresa" placeholder="Cedula Conductor" onkeypress="return soloNumero(event)" title="Ingrese la cedula del contuctor" maxlength="12" tabindex="2"  onblur="fperderfocusidempresa();" value="<?php print($lsidempresa);?>"> 
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtnombre_razon_social_emp" placeholder="Nombre del Conductor"  readonly maxlength="12" tabindex="2"  value="<?php print($lsnombre_razon_social_emp);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtcedula_cont" placeholder="Apellido del Conductor" maxlength="12" readonly tabindex="2"  value="<?php print($lscedula_cont);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtnombre_cont" placeholder="telefono del Conductor" maxlength="12" readonly tabindex="2"  value="<?php print($lsnombre_cont);?>">
							</div>
							<div class="form-group col-lg-1">
									<INPUT class="btn btn-primary"  type="button" value="..."  title="Buscar Conductor" name="btnAbreempresa"  onclick="abreempresa()">
							</div>
						
							<div class="form-group col-lg-2">
									<input class="form-control"  type="text" name="txtidtabulador" placeholder="N° de Unidad" onkeypress="return soloNumero(event)" title="numero de la unidad a reportar" maxlength="5" tabindex="2"  onblur="fperderfocusidtabulador();" value="<?php print($lsidtabulador);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtnombre_estado_origen" placeholder="Placa" maxlength="12" readonly tabindex="2"  value="<?php print($lsnombre_estado_origen);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtnombre_estado_destino" placeholder="Serial Motor" maxlength="12" readonly tabindex="2"  value="<?php print($lsnombre_estado_destino);?>">
							</div>
							<div class="form-group col-lg-3">
									<input class="form-control"  type="text" name="txtprecio_tabulador" placeholder="Serial Carroceria" maxlength="12" tabindex="2" readonly  value="<?php print($lsprecio_tabulador);?>">
							</div>
							
							
							<div class="form-group col-lg-1">
									<INPUT class="btn btn-primary" type="button" title="Buscar Unidad" value="..."  class="botontab" name="btnAbretabulador"   onclick="abretabulador()">
							</div>
						
							<div class="form-group col-lg-11">
									<textarea class="form-control"  type="text" name="txtdireccion_salida" placeholder="Falla Presentada por la unidad"  title="ingre la falla o desperfecto que este presentando la unidad" maxlength="250" tabindex="2"  value="<?php print($lsdireccion_salida);?>"></textarea>
							</div>
						
							<div class="form-group col-lg-11">
									<textarea class="form-control" name="txtobservaciones_sol" title="detalle la ubicacion donde se encuentre estacionada la uidad" value="<?php print($lsobservaciones_sol);?>" placeholder="Ubicacion de la Unidad "   ></textarea>
							</div>
						</div>
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnguardar" value="Guardar           " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="fcancelar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnbuscar" value="Buscar             " class="btn btn-primary" tabindex="22" onclick="fbuscar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnmodificar" value="Modificar             " class="btn btn-primary" tabindex="23" onclick="fmodificar();" ></div>
							<div class="form-group col-lg-1"><input type="button" name="btneliminar" value="Anular            " class="btn btn-primary" tabindex="7" onclick="feliminar();" ></div>
							<div class="form-group col-lg-1"><input type="button" onclick="flistar();" value="Listar      " class="btn btn-primary" 	/></div>
						 </center> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>		


<script language="javascript">

	finicio();

	function finicio()
	{
		lof=document.form1;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo")&&(lof.txtoperacion.value!="buscar1")&&(lof.txtoperacion.value!="buscar2")&&(lof.txtoperacion.value!="buscar3"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					alert("Registro Incluido exitosamente");
				}
				else if (lof.txtoperacion.value=="modificar")
				{
					alert("Registro Modificado correctamente");
				}
				else if (lof.txtoperacion.value=="eliminar")
				{
					alert("Registro anulado");
				}
			}
			if (lof.txthacer.value!="listo"&&lof.txthacer.value!="")
			{
				alert("no se pudo realizar la operación");
			}

			fcancelar();
		}
		else if (lof.txtoperacion.value=="buscar")
		{
			if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
			{
				alert("no existe este solicitud");
				fcancelar();

			}
		}
		else if (lof.txtoperacion.value=="buscar1")
		{
			if ((lof.txthay1.value==1)&&(lof.txthacer.value="incluir"))
			{
				fnuevo();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value="incluir"))
			{
				alert("cedula de identidad no asociado a un conductor");				
				lof.txtidempresa.value="";
				lof.txtnombre_razon_social_emp.value="";
				lof.txtcedula_cont.value="";
				lof.txtnombre_cont.value="";
				fnuevo();
			}
		}
		else if (lof.txtoperacion.value=="buscar2")
		{
			if ((lof.txthay2.value==1)&&(lof.txthacer.value="incluir"))
			{
				fnuevo();
			}
			else if ((lof.txthay2.value==0)&&(lof.txthacer.value="incluir"))
			{
				alert("Este producto no se encuentra");
				fnuevo();

			}
		}
		else if (lof.txtoperacion.value=="buscar3")
		{
			if ((lof.txthay3.value==1)&&(lof.txthacer.value="incluir"))
			{
				fnuevo();
			}
			else if ((lof.txthay3.value==0)&&(lof.txthacer.value="incluir"))
			{
				alert("esta unidad no existe");
				lof.txtidtabulador.value="";
				lof.txtnombre_estado_origen.value="";
				lof.txtnombre_estado_destino.value="";
				lof.txtprecio_tabulador.value="";
				fnuevo();

			}
		}

		else if (lof.txtoperacion.value=="nuevo")
		{
			lof.txtoperacion.value="incluir";
			lof.txtidsolicitud.disabled=true;
			lof.txtidestatus.value="espera";
			lof.txtidestatus.disabled=true;
			lof.txtidempresa.disable=false;
			lof.txtnombre_razon_social_emp.disable=false;
			lof.txtcedula_cont.disable=false;
			lof.txtnombre_cont.disable=false;
			lof.txtidtabulador.disable=false;
			lof.txtnombre_estado_origen.disable=false;
			lof.txtnombre_estado_destino.disable=false;
			lof.txtprecio_tabulador.disable=false;
			lof.txtdireccion_salida.disable=false;
			lof.txtobservaciones_sol.disable=false;
			lof.txthora_sol.value="<? print date("h:i:s"); ?>"
			lof.txtfecha_sol.value="<? print date("d/m/Y"); ?>"
			lof.txtcedula_res.value="<?=$cedulausuario?>"
			lof.txtnombre_res.value="<?=$nombreusuario?>"
			lof.txtapellido_res.value="<?=$apellidousuario?>"
			lof.btnAbreempresa.disabled=false;
			lof.btnAbretabulador.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.buscar_reporte.disabled=true;


		}
	}

	function fexiste()
	{
		lof=document.form1;
		lof.txtidsolicitud.disabled=true;
		lof.txtidestatus.value="<?php print($lsidestatus);?>";
		lof.txtidestatus.disabled=true;
		lof.txtidempresa.disabled=true;
		lof.txtnombre_razon_social_emp.disabled=true;
		lof.txtcedula_cont.disabled=true;
		lof.txtnombre_cont.disabled=true;
		lof.txtidtabulador.disabled=true;
		lof.txtnombre_estado_origen.disabled=true;
		lof.txtnombre_estado_destino.disabled=true;
		lof.txtprecio_tabulador.disabled=true;
		lof.txtdireccion_salida.value="<?php print($lsdireccion_salida);?>";
		lof.txtdireccion_salida.disabled=true;
		lof.txtobservaciones_sol.value="<?php print($lsobservaciones_sol);?>";
		lof.txtobservaciones_sol.disabled=true;
		lof.txthora_sol.disabled=true;
		lof.txtfecha_sol.disabled=true;
		lof.txtcedula_res.disabled=true;
		lof.txtnombre_res.disabled=true;
		lof.txtapellido_res.disabled=true;
		lof.btnAbreempresa.disabled=true;
		lof.btnAbretabulador.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;

	}

	function fnuevo()
	{
		lof=document.form1;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		lof.submit();


	}

	function fcancelar()
	{
		lof=document.form1;
		lof.txtidsolicitud.value="";
		lof.txtidestatus.value="";
		lof.txtidempresa.value="";
		lof.txtnombre_razon_social_emp.value="";
		lof.txtcedula_cont.value="";
		lof.txtnombre_cont.value="";
		lof.txtidtabulador.value="";
		lof.txtnombre_estado_origen.value="";
		lof.txtnombre_estado_destino.value="";
		lof.txtprecio_tabulador.value="";
		lof.txtdireccion_salida.value="";
		lof.txtobservaciones_sol.value="";
		lof.txthora_sol.value="";
		lof.txtfecha_sol.value="";
		lof.txtcedula_res.value="";
		lof.txtnombre_res.value="";
		lof.txtapellido_res.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txthay1.value=0;
		lof.txthay2.value=0;
		lof.txthay3.value=0;
		lof.txtidsolicitud.disabled=true;
		lof.txtidestatus.disabled=true;
		lof.txtidempresa.disabled=true;
		lof.txtnombre_razon_social_emp.disabled=true;
		lof.txtcedula_cont.disabled=true;
		lof.txtnombre_cont.disabled=true;
		lof.txtidtabulador.disabled=true;
		lof.txtnombre_estado_origen.disabled=true;
		lof.txtnombre_estado_destino.disabled=true;
		lof.txtprecio_tabulador.disabled=true;
		lof.txtdireccion_salida.disabled=true;
		lof.txtobservaciones_sol.disabled=true;
		lof.txthora_sol.disabled=true;
		lof.txtfecha_sol.disabled=true;
		lof.txtcedula_res.disabled=true;
		lof.txtnombre_res.disabled=true;
		lof.txtapellido_res.disabled=true;
		lof.btnAbreempresa.disabled=true;
		lof.btnAbretabulador.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.buscar_reporte.disabled=true;

	}

	function fbuscar()
	{
		lof=document.form1;
		lof.txtidsolicitud.disabled=false;
		lof.txtidsolicitud.focus();
		lof.txtidestatus.disabled=true;
		lof.txtidempresa.disabled=true;
		lof.txtnombre_razon_social_emp.disabled=true;
		lof.txtcedula_cont.disabled=true;
		lof.txtnombre_cont.disabled=true;
		lof.txtidtabulador.disabled=true;
		lof.txtnombre_estado_origen.disabled=true;
		lof.txtnombre_estado_destino.disabled=true;
		lof.txtprecio_tabulador.disabled=true;
		lof.txtdireccion_salida.disabled=true;
		lof.txtobservaciones_sol.disabled=true;
		lof.txthora_sol.disabled=true;
		lof.txtfecha_sol.disabled=true;
		lof.txtcedula_res.disabled=true;
		lof.txtnombre_res.disabled=true;
		lof.txtapellido_res.disabled=true;
		lof.btnAbreempresa.disabled=true;
		lof.btnAbretabulador.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreempresa.disabled=true;


	}

	function fmodificar()
	{
		lof=document.form1;
		lof.txtoperacion.value="modificar";
		lof.txtidsolicitud.disabled=true;
		lof.txtidestatus.disabled=false;
		lof.txtidempresa.disabled=true;
		lof.txtnombre_razon_social_emp.disabled=true;
		lof.txtcedula_cont.disabled=true;
		lof.txtnombre_cont.disabled=true;
		lof.txtidtabulador.disabled=true;
		lof.txtnombre_estado_origen.disabled=true;
		lof.txtnombre_estado_destino.disabled=true;
		lof.txtprecio_tabulador.disabled=true;
		lof.txtdireccion_salida.disabled=false;
		lof.txtobservaciones_sol.disabled=false;
		lof.txthora_sol.disabled=false;
		lof.txtfecha_sol.disabled=false;
		lof.txtcedula_res.disabled=false;
		lof.txtnombre_res.disabled=false;
		lof.txtapellido_res.disabled=false;
		lof.btnAbreempresa.disabled=true;
		lof.btnAbretabulador.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.buscar_reporte.disabled=true;

	}

	function feliminar()
	{
		lof=document.form1;
		if (confirm("desea eliminar"))
		{
			lof.txtidsolicitud.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}

	function fperderfocusidsolicitud()
	{
		lof=document.form1;
		if (lof.txtidsolicitud.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidsolicitud.focus();
		}
	}
	function fperderfocusidempresa()
	{
		lof=document.form1;
		if (lof.txtidempresa.value!="")
		{
			lof.txtoperacion.value="buscar1";
			lof.submit();
		}
		else
		{
			lof.txtidempresa.focus();
		}
	}
	function fperderfocusidproducto()
	{
		lof=document.form1;
		if (lof.txtidproducto.value!="")
		{
			lof.txtoperacion.value="buscar2";
			lof.submit();
		}
		else
		{
			lof.txtidproducto.focus();
		}
	}

	function fperderfocusidtabulador()
	{
		lof=document.form1;
		if (lof.txtidtabulador.value!="")
		{
			lof.txtoperacion.value="buscar3";
			lof.submit();
		}
		else
		{
			lof.txtidtabulador.focus();
		}
	}

	function fguardar()
	{
		lof=document.form1;
		lof.txtidsolicitud.disabled=false;
		lof.txtidestatus.disabled=false;
		if (fvalidar())
		{
			lof.submit();
		}
	}

	function fvalidar()
	{
		lbbueno=false;
		lof=document.form1;
		if (lof.txtidsolicitud.value=="")
		{
			alert("codigo solicitud en blanco");
			lof.txtidsolicitud.focus();
		}
		else if (lof.txtidempresa.value=="")
		{
			alert("indiqe la cedula del conductor");
			lof.txtidempresa.focus();
		}
		else if (lof.txtidtabulador.value=="")
		{
			alert("indiqe el numero de la unidad afectada");
			lof.txtidtabulador.focus();
		}
		else if (lof.txtidtabulador.value=="")
		{
			alert("indiqe el numero de la unidad afectada");
			lof.txtidtabulador.focus();
		}
		else if (lof.txtdireccion_salida.value=="")
		{
			alert("debe indicar la falla presentada por el vehiculo");
			lof.txtdireccion_salida.focus();
		}
		else if (lof.txtdireccion_salida.value.length<10)
		{
			alert("debes ingresar mínimo 10 letras");
			lof.txtdireccion_salida.focus();
		}
		else if (lof.txtobservaciones_sol.value=="")
		{
			alert("escriba el lugar donde se encuentra estacionado el vehiculo ");
			lof.txtobservaciones_sol.focus();
		}
		

		


		else
		{
			lbbueno=true;
		}

		return lbbueno;
	}
	
	function fayuda()
	{
			mipopup = window.open("ayuda/ayudasolicitud.php","miwin","width=550,height=650,scrollbars=yes");
			mipopup.focus();
	}
	function flistar()
	{
			mipopup = window.open("lista/listasolicitudreparacion.php","miwin","width=1300,height=650,scrollbars=yes");
			mipopup.focus();
	}
	
	var miPopup
	function abreempresa(){
		miPopup = window.open("busqueda/buscaempresa.php","empresa","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

	var miPopup
	function abreproducto(){
		miPopup = window.open("busqueda/buscaproducto.php","producto","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}


	var miPopup
	function abretabulador(){
		miPopup = window.open("busqueda/buscatabulador.php","tabulador","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}


	function abreSolicitante(){
		miPopup = window.open("buscaPersona.php","persona","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	
	function multiplica()
{
	var a = document.form1.txtprecio_tabulador.value //en el DOM esto referencia el valor del primer cuadro
	var b = document.form1.txtunidades_req.value //esto referencia el valor del segundo cuadro
	document.form1.txtprecio_sol.value=parseFloat(a)*parseFloat(b) //convertimos a números
	//los valores de los cuadros de texto se interpretan siempre como cadenas de caracteres
}

</script>
