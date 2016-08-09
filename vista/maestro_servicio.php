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
   
	$liidservicio= isset($_GET['liidservicio']) ? $_GET['liidservicio'] : null ;
	$lsdescripcion_ser= isset($_GET['lsdescripcion_ser']) ? $_GET['lsdescripcion_ser'] : null ;
	$lsidtipo_servicio_ser= isset($_GET['lsidtipo_servicio_ser']) ? $_GET['lsidtipo_servicio_ser'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Registro de Servicio</strong></div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_maestro_servicio.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-1"></div>
							<div class="form-group col-lg-3">
								<label >Código:</label>
								<input class="form-control"  type="text" name="txtidservicio" onkeypress="return soloNumero(event)" title="ingrese nombre descriptivo del forma_pago"  maxlength="3" tabindex="1" value="<?php print($liidservicio);?>" onblur="fperderfocusidservicio();">
							</div>
							<div class="form-group col-lg-3">
								<label >Nombre:</label>
								<input class="form-control"  type="text" name="txtdescripcion_ser" onkeypress="return soloLetra(event)" title="ingrese nombre codigo" maxlength="50"  tabindex="2"  value="<?php print($lsdescripcion_ser);?>"> 
							</div>
							<div class="form-group col-lg-3">
								<label>tipo de servicio</label>
								<select  class="form-control"  name="cmbidtipo_servicio_ser" id="cmbidtipo_servicio_ser">
									<option value="-" value="<?php print($lsidtipo_servicio_ser);?>" >seleccione</option>
										<?php
											$lssql="select idtipo_servicio,concat(' ',descripcion_tipser) as nombre from tipo_servicio order by nombre";
											$lobjcombo->fgenerar($lssql,"idtipo_servicio","nombre","");

										?>
								</select>
							</div>		
							<div class="form-group col-lg-2">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbreservicio" value="..." class="btn btn-primary"  onclick="abreservicio()">
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
<script src="js/validaciones.js"></script>
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
				alert("No existe servicio");
				fcancelar();
			}
		}
		else if (lof.txtoperacion.value=="nuevo")
		{
			lof.txtoperacion.value="incluir";
			lof.txtidservicio.disabled=true;
			lof.txtdescripcion_ser.disabled=false;
			lof.txtdescripcion_ser.focus();
			lof.cmbidtipo_servicio_ser.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbreservicio.disabled=true;
		}
	}
	function fexiste()
	{
		lof=document.form1;
		lof.txtidservicio.disabled=true;
		lof.txtdescripcion_ser.disabled=true;
		lof.cmbidtipo_servicio_ser.value="<?php print($lsidtipo_servicio_ser);?>";
		lof.cmbidtipo_servicio_ser.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
		lof.btnAbreservicio.disabled=true;
	}
	function fnuevo()
	{
		lof=document.form1;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		lof.submit();
		lof.txtidservicio.disabled=true;
		lof.txtdescripcion_ser.disabled=false;
		lof.txtdescripcion_ser.focus();
		lof.cmbidtipo_servicio_ser.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreservicio.disabled=true;
	}
	function fcancelar()
	{
		lof=document.form1;
		lof.txtidservicio.value="";
		lof.txtdescripcion_ser.value="";
		lof.cmbidtipo_servicio_ser.value="-";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtidservicio.disabled=true;
		lof.txtdescripcion_ser.disabled=true;
		lof.cmbidtipo_servicio_ser.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreservicio.disabled=true;
	}
	function fbuscar()
	{
		lof=document.form1;
		lof.txtidservicio.disabled=false;
		lof.txtidservicio.focus();
		lof.txtdescripcion_ser.disabled=true;
		lof.cmbidtipo_servicio_ser.value="<?php print($lsidtipo_servicio_ser);?>";
        lof.cmbidtipo_servicio_ser.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreservicio.disabled=false;
	}
	function fmodificar()
	{
		lof=document.form1;
		lof.txtoperacion.value="modificar";
		lof.txtidservicio.disabled=true;
		lof.txtdescripcion_ser.disabled=false;
		lof.txtdescripcion_ser.focus();
		lof.cmbidtipo_servicio_ser.value="<?php print($lsidtipo_servicio_ser);?>";
        lof.cmbidtipo_servicio_ser.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreservicio.disabled=true;
	}
	function feliminar()
	{
		lof=document.form1;
		if (confirm("¿Desea Eliminar?"))
		{
			lof.txtidservicio.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}
	function fperderfocusidservicio()
	{
		lof=document.form1;
		if (lof.txtidservicio.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidservicio.focus();
		}
	}
	function fguardar()
	{
		lof=document.form1;
		lof.txtidservicio.disabled=false;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	function fvalidar()
	{
		lbbueno=false;
		lof=document.form1;
		if (lof.txtidservicio.value=="")
		{
			alert("Código en blanco");
			lof.txtidservicio.focus();
		}
		else if (lof.txtdescripcion_ser.value=="")
		{
			alert("Nombre en blanco");
			lof.txtidservicio.disabled=true;
			lof.txtdescripcion_ser.focus();
		}
		else if (lof.txtdescripcion_ser.value.length<3)
		{
			alert("Debe ingresar más de dos letras");
		}
		else if (lof.cmbidtipo_servicio_ser.value=="-")
	    {
                alert("Seleccione un tipo de servicio ");
                lof.txtidservicio.disabled=true;
			lof.cmbidtipo_servicio_ser.focus();
            }
		else
		{
			lbbueno=true;
		}
		return lbbueno;
	}
	function flistar()
	{
		mipopup = window.open("lista/listaservicio.php","miwin","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}

	function fayuda()
	{
		mipopup = window.open("ayuda/ayudaservicio.php","miwin","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}

	var miPopup
		function abreservicio(){
		miPopup = window.open("busqueda/buscaservicio.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
