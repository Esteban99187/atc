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
	$liidbanco = isset($_GET['liidbanco']) ? $_GET['liidbanco'] : null;
	$lsdesc_banc = isset($_GET['lsdesc_banc']) ? $_GET['lsdesc_banc'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;

?>

<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Registro de Banco</strong></div>
				<div class="panel-body">
					<form method="post" name="fmaestro_banco" id="fmaestro_banco" action="../controlador/control_maestro_banco.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<label >Código:</label>
				<input class="form-control"  type="text" name="txtidbanco" title="ingrese nombre de banco"  maxlength="3" tabindex="1" value="<?php print($liidbanco);?>" onblur="fperderfocusidbanco();">
				</div>
							<div class="form-group col-lg-4">
				<label >Nombre:</label>
				<input class="form-control"  type="text" name="txtdesc_banc" title="ingrese nombre descriptivo del banco"  maxlength="50"  tabindex="2"  value="<?php print($lsdesc_banc);?>">
</div>
							<div class="form-group col-lg-2">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbrebanco" value="..." class="btn btn-primary"  onclick="abrebanco()">
							</div>
						</div>
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="submit" name="btnguardar" value="Guardar           " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="reset" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="cancelar('maestro_banco')"></div>
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
                                            mipopup = window.open("lista/listabanco.php","miwin","width=1300,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>
                    <script language="javascript">

                                function fayuda()
                                    {
                                            mipopup = window.open("ayuda/ayudabanco.php","miwin","width=550,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>
<script language="javascript">

	finicio();

	function finicio()
	{
		lof=document.fmaestro_banco;
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
						alert("no existe este banco");

						fcancelar();

					}
				}

		else if (lof.txtoperacion.value=="nuevo")
		{
			lof.txtoperacion.value="incluir";
			lof.txtidbanco.disabled=true;
			lof.txtdesc_banc.disabled=false;
			lof.txtdesc_banc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebanco.disabled=true;
		}
	}

		function fexiste()
		{
			lof=document.fmaestro_banco;
			lof.txtidbanco.disabled=true;
			lof.txtdesc_banc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=false;
			lof.btneliminar.disabled=false;
			lof.btnAbrebanco.disabled=true;
		}

		function fnuevo()
		{
			lof=document.fmaestro_banco;
			lof.txtoperacion.value="nuevo";
			lof.txthacer.value="incluir";
			lof.submit();
			lof.txtidbanco.disabled=true;
			lof.txtdesc_banc.disabled=false;
			lof.txtdesc_banc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebanco.disabled=true;
		}

		function fcancelar()
		{
			lof=document.fmaestro_banco;
			lof.txtidbanco.value="";
			lof.txtdesc_banc.value="";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
			lof.txtidbanco.disabled=true;
			lof.txtdesc_banc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebanco.disabled=true;
		}

		function fbuscar()
		{
			lof=document.fmaestro_banco;
			lof.txtidbanco.disabled=false;
			lof.txtidbanco.focus();
			lof.txtdesc_banc.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebanco.disabled=false;
		}

		function fmodificar()
		{
			lof=document.fmaestro_banco;
			lof.txtoperacion.value="modificar";
			lof.txtidbanco.disabled=true;
			lof.txtdesc_banc.disabled=false;
			lof.txtdesc_banc.focus();
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnAbrebanco.disabled=true;
		}

		function feliminar()
		{
			lof=document.fmaestro_banco;
				if (confirm("desea eliminar"))
				{
					lof.txtidbanco.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
		}

		function fperderfocusidbanco()
		{
			lof=document.fmaestro_banco;
				if (lof.txtidbanco.value!="")
				{
					lof.txtoperacion.value="buscar";
					lof.submit();
				}
				else
				{
					lof.txtidbanco.focus();
				}
		}

		function fguardar()
		{
			lof=document.fmaestro_banco;
			lof.txtidbanco.disabled=false;
				
		}

	
function flistar()
	{
		mipopup = window.open("lista/listabanco.php","miwin","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}

	function fayuda()
	{
		mipopup = window.open("ayuda/ayudabanco.php","miwin","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}

	var miPopup
		function abrebanco(){
		miPopup = window.open("busqueda/buscabanco.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

</script>
<script type="text/javascript">

	fInicio();

	<!-- Abre una Ventana Emergente -->
	var miPopup
	function abrebanco(){
		miPopup = window.open("busqueda/buscabanco.php","Banco","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

</script>
</fieldset>
