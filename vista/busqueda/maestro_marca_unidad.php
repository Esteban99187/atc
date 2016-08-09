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
  	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidmarca_unidad = isset($_GET['liidmarca_unidad']) ? $_GET['liidmarca_unidad'] : null;
	$lsdesc_marc = isset($_GET['lsdesc_marc']) ? $_GET['lsdesc_marc'] : null;

?>

<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Registro de Marca de la Unidad</strong></div>
				<div class="panel-body">
					<form method="post" name="fmaestro_marca_unidad" id="fmaestro_marca_unidad" action="../controlador/control_maestro_marca_unidad.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<label >Código:</label>
						<input class="form-control"  type="text" name="txtidmarca_unidad" onkeypress="return soloNumero(event)" title="ingrese codigo de la marca de Unidad"  maxlength="3" tabindex="1" value="<?php print($liidmarca_unidad);?>" onblur="fperderfocusidmarca_unidad();">
			</div>
				<div class="form-group col-lg-4">
				<label >Nombre:</label>
				<input class="form-control"  type="text" name="txtdesc_marc" title="ingrese nombre descriptivo de la marca de unidad" maxlength="50" onkeypress="return soloLetra(event)" tabindex="2"  value="<?php print($lsdesc_marc);?>">
						</div>
							<div class="form-group col-lg-2">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbremarca_unidad" value="..." class="btn btn-primary"  onclick="abremarca_unidad()">
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

                                function flistar()
                                    {
                                            mipopup = window.open("lista/listamarcaunidad.php","miwin","width=1300,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>        <script language="javascript">

                                function fayuda()
                                    {
                                            mipopup = window.open("ayuda/ayudamarca_unidad.php","miwin","width=550,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>

<script language="javascript">

	finicio();

	function finicio()
	{
		lof=document.fmaestro_marca_unidad;
			if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo"))
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
				else if (lof.txtoperacion.value=="buscar")
				{
					if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
					{
						fexiste();
					}
					else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
					{
						alert("no existe esta marca de unidad");

						fcancelar();

					}
				}

		else if (lof.txtoperacion.value=="nuevo")
		{
			lof.txtoperacion.value="incluir";
			lof.txtidmarca_unidad.disabled=true;
			lof.txtdesc_marc.disabled=false;
			lof.txtdesc_marc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbremarca_unidad.disabled=true;
		}
	}

		function fexiste()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtidmarca_unidad.disabled=true;
			lof.txtdesc_marc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=false;
			lof.btneliminar.disabled=false;
			lof.btnAbremarca_unidad.disabled=true;
		}

		function fnuevo()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtoperacion.value="nuevo";
			lof.txthacer.value="incluir";
			lof.submit();
			lof.txtidmarca_unidad.disabled=true;
			lof.txtdesc_marc.disabled=false;
			lof.txtdesc_marc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbremarca_unidad.disabled=true;
		}

		function fcancelar()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtidmarca_unidad.value="";
			lof.txtdesc_marc.value="";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
			lof.txtidmarca_unidad.disabled=true;
			lof.txtdesc_marc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbremarca_unidad.disabled=true;
		}

		function fbuscar()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtidmarca_unidad.disabled=false;
			lof.txtidmarca_unidad.focus();
			lof.txtdesc_marc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbremarca_unidad.disabled=false;
		}

		function fmodificar()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtoperacion.value="modificar";
			lof.txtidmarca_unidad.disabled=true;
			lof.txtdesc_marc.disabled=false;
			lof.txtdesc_marc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbremarca_unidad.disabled=true;
		}

		function feliminar()
		{
			lof=document.fmaestro_marca_unidad;
				if (confirm("desea eliminar"))
				{
					lof.txtidmarca_unidad.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
		}

		function fperderfocusidmarca_unidad()
		{
			lof=document.fmaestro_marca_unidad;
				if (lof.txtidmarca_unidad.value!="")
				{
					lof.txtoperacion.value="buscar";
					lof.submit();
				}
				else
				{
					lof.txtidmarca_unidad.focus();
				}
		}

		function fguardar()
		{
			lof=document.fmaestro_marca_unidad;
			lof.txtidmarca_unidad.disabled=false;
				if (fvalidar())
				{
					lof.submit();
				}
		}

		function fvalidar()
		{
			lbbueno=false;
			lof=document.fmaestro_marca_unidad;
				if (lof.txtidmarca_unidad.value=="")
				{
					alert("Código de la Marca de Unidad en blanco");
					lof.txtidmarca_unidad.focus();
				}

					else if (lof.txtdesc_marc.value=="")
					{
						alert("Nombre de la Marca de Unidad en blanco");
						lof.txtidmarca_unidad.disabled=true;
						lof.txtdesc_marc.focus();
					}
					
							else if (lof.txtdesc_marc.value.length<3)
							{
								alert("Debe ingresar más de 3 carácteres");
							}

				else
				{
					lbbueno=true;
				}

					return lbbueno;
		}
function flistar()
	{
		mipopup = window.open("lista/listamarca_unidad.php","miwin","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}

	function fayuda()
	{
		mipopup = window.open("ayuda/ayudamarca_unidad.php","miwin","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}

	var miPopup
		function abreforma_pago(){
		miPopup = window.open("busqueda/buscamarca_unidad.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

</script>
<script type="text/javascript">

	fInicio();

	<!-- Abre una Ventana Emergente -->
	var miPopup
	function abremarca_unidad(){
		miPopup = window.open("busqueda/buscamarca_unidad.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

</script>
</fieldset>
