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
	$liidBitacora= isset($_GET['liidBitacora']) ? $_GET['liidBitacora'] : null ;
	$lsidUsuario= isset($_GET['lsidUsuario']) ? $_GET['lsidUsuario'] : null ;
	$lsip= isset($_GET['lsip']) ? $_GET['lsip'] : null ;
	$lsActividad= isset($_GET['lsActividad']) ? $_GET['lsActividad'] : null ;
	$lsfecha= isset($_GET['lsfecha']) ? $_GET['lsfecha'] : null ;
	$lshora= isset($_GET['lsfecha']) ? $_GET['lsfecha'] : null ;
	$lspanel= isset($_GET['lsfecha']) ? $_GET['lsfecha'] : null ;
	$lstipoBitacora= isset($_GET['lstipoBitacora']) ? $_GET['lstipoBitacora'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Registro de Bitácora</strong></div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_maestro_bitacoras.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-4">
								<label >Código:</label>
								<input class="form-control"  type="text" name="txtidBitacora" title="Ingrese código"  maxlength="3" tabindex="1" value="<?php print($liidBitacora);?>" onblur="fperderfocusidBitacora();">
							</div>
							<div class="form-group col-lg-4">
								<label >Usuario:</label>
								<input class="form-control"  type="text" name="txtidUsuario" title="Ingrese el usuario" maxlength="50"  tabindex="2"  value="<?php print($lsidUsuario);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Ip:</label>
								<input class="form-control"  type="text" name="txtip" title="Ingrese la Ip" maxlength="50"  tabindex="2"  value="<?php print($lsip);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Actividad:</label>
								<input class="form-control"  type="text" name="txtActividad" title="Ingrese la actividad" maxlength="50"  tabindex="2"  value="<?php print($lsActividad);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Fecha:</label>
								<input class="form-control"  type="text" name="txtfecha" title="Ingrese la fecha" maxlength="50"  tabindex="2"  value="<?php print($lsfecha);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Hora:</label>
								<input class="form-control"  type="text" name="txthora" title="Ingrese la hora" maxlength="50"  tabindex="2"  value="<?php print($lshora);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Panel:</label>
								<input class="form-control"  type="text" name="txtpanel" title="Ingrese el panel" maxlength="50"  tabindex="2"  value="<?php print($lspanel);?>"> 
							</div>
							<div class="form-group col-lg-4">
								<label >Tipo de Bitacora:</label>
								<input class="form-control"  type="text" name="txttipoBitacora" title="Ingrese el tipo de bitacora" maxlength="50"  tabindex="2"  value="<?php print($lstipoBitacora);?>"> 
							</div>
							<div class="form-group col-lg-2">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbrebitacora" value="..." class="btn btn-primary"  onclick="abrebitacora()">
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
	finicio();
	function finicio()
	{
		lof=document.form1;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					alert("Registro Incluído");
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
				alert("No se pudo realizar la Operación");
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
				alert("No existe este Departamento");
				fcancelar();
			}
		}
		else if (lof.txtoperacion.value=="nuevo")
		{
			lof.txtoperacion.value="incluir";
			lof.txtidBitacora.disabled=true;
			lof.txtidUsuario.disabled=false;
			lof.txtidUsuario.focus();
			lof.txtip.disabled=false;
			lof.txtActividad.disabled=false;
			lof.txtfecha.disabled=false;
			lof.txthora.disabled=false;
			lof.txtpanel.disabled=false;
			lof.txttipoBitacora.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebitacora.disabled=true;
		}
	}
	function fexiste()
	{
		lof=document.form1;
		lof.txtidBitacora.disabled=true;
		lof.txtidUsuario.disabled=true;
		lof.txtip.disabled=true;
		lof.txtActividad.disabled=true;
		lof.txtfecha.disabled=true;
		lof.txthora.disabled=true;
		lof.txtpanel.disabled=true;
		lof.txttipoBitacora.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
		lof.btnAbrebitacora.disabled=true;
	}
	function fnuevo()
	{
		lof=document.form1;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		lof.submit();
		lof.txtidBitacora.disabled=true;
		lof.txtidUsuario.disabled=false;
		lof.txtidUsuario.focus();
		lof.txtip.disabled=false;
		lof.txtActividad.disabled=false;
		lof.txtfecha.disabled=false;
		lof.txthora.disabled=false;
		lof.txtpanel.disabled=false;
		lof.txttipoBitacora.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=true;
		lof.btnAbrebitacora.disabled=true;
	}
	function fcancelar()
	{
		lof=document.form1;
		lof.txtidBitacora.value="";
		lof.txtidUsuario.value="";
		lof.txtip.value="";
		lof.txtActividad.value="";
		lof.txtfecha.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtidBitacora.disabled=true;
		lof.txtidUsuario.disabled=true;
		lof.txtip.disabled=true;
		lof.txtActividad.disabled=true;
		lof.txtfecha.disabled=true;
		lof.txthora.disabled=true;
		lof.txtpanel.disabled=true;
		lof.txttipoBitacora.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbrebitacora.disabled=true;
	}
	function fbuscar()
	{
		lof=document.form1;
		lof.txtidBitacora.disabled=false;
		lof.txtidBitacora.focus();
		lof.txtidUsuario.disabled=true;
		lof.txtip.disabled=true;
		lof.txtActividad.disabled=true;
		lof.txtfecha.disabled=true;
		lof.txthora.disabled=true;
		lof.txtpanel.disabled=true;
		lof.txttipoBitacora.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbrebitacora.disabled=false;
	}
	function fmodificar()
	{
		lof=document.form1;
		lof.txtoperacion.value="modificar";
		lof.txtidBitacora.disabled=true;
		lof.txtidUsuario.disabled=false;
		lof.txtidUsuario.focus();
		lof.txtip.disabled=false;
		lof.txtActividad.disabled=false;
		lof.txtfecha.disabled=false;
		lof.txthora.disabled=false;
		lof.txtpanel.disabled=false;
		lof.txttipoBitacora.disabled=false;
		lof.btnAbrebitacora.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=true;
		lof.btnAbrebitacora.disabled=true;
	}
	function feliminar()
	{
		lof=document.form1;
		if (confirm("¿Desea Eliminar?"))
		{
			lof.txtidBitacora.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}
	function fperderfocusidBitacora()
	{
		lof=document.form1;
		if (lof.txtidBitacora.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidBitacora.focus();
		}
	}
	function fguardar()
	{
		lof=document.form1;
		lof.txtidBitacora.disabled=false;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	function fvalidar()
	{
		lbbueno=false;
		lof=document.form1;
		if (lof.txtidBitacora.value=="")
		{
			alert("Código en blanco");
			lof.txtidBitacora.focus();
		}
		else if (lof.txtidUsuario.value=="")
		{
			alert("Nombre en blanco");
			lof.txtidBitacora.disabled=true;
			lof.txtidUsuario.focus();
		}
		else
		{
			lbbueno=true;
		}
		return lbbueno;
	}
	function flistar()
	{
		mipopup = window.open("lista/listabitacora.php","miwin","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}

	function fayuda()
	{
		mipopup = window.open("ayuda/ayudabitacora.php","miwin","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}

	var miPopup
		function abreforma_pago(){
		miPopup = window.open("busqueda/buscabitacora.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
