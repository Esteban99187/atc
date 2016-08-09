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
	session_start();
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
    require_once("../modelo/clscombo.php");
    $lobjcombo= new clscombo();
   
	$lscliente_idcliente= isset($_GET['lscliente_idcliente']) ? $_GET['lscliente_idcliente'] : null ;
	$lspersona_cedula= isset($_GET['lspersona_cedula']) ? $_GET['lspersona_cedula'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Registro de Cliente-Persona</div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_maestro_cliente_persona.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							
							<div class="form-group col-lg-2">
								<label>Cliente</label>
								<select  class="form-control"  name="cmbcliente_idcliente" id="cmbcliente_idcliente" tabindex="3" style="width:150px;">
									<option value="-" value="<?php print($lscliente_idcliente);?>" >seleccione</option>
										<?php
											$lssql="select idcliente,concat(' ',nombre_razon_social_emp) as nombre from cliente order by nombre";
											$lobjcombo->fgenerar($lssql,"idcliente","nombre","");

										?>
								</select>
							</div>		
							<div class="form-group col-lg-2">
								<label>Persona</label>
								<select  class="form-control"  name="cmbpersona_cedula" id="cmbpersona_cedula" tabindex="3" style="width:150px;">
									<option value="-" value="<?php print($lspersona_cedula);?>" >seleccione</option>
										<?php
											$lssql="select cedula,concat(' ',nombres_per) as nombre from persona order by nombre";
											$lobjcombo->fgenerar($lssql,"cedula","nombre","");

										?>
								</select>
							</div>		
							<div class="form-group col-lg-2">
								<label > Buscar</label>
								<br>
								<INPUT   type="button"  name="btnAbrecuenta" value="..." class="btn btn-primary"  onclick="abrecuenta()">
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

                                function fayuda()
                                    {
                                            mipopup = window.open("ayuda/ayudapersonal.php","miwin","width=550,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>
                    
		<script language="javascript">

			finicio();
		    function finicio()
		    {
			    lof=document.form1;
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
						alert("Cuenta no existe");
						fcancelar();
					}
					else if ((lof.txthay.value==1)&&(lof.txthacer.value=="incluir"))
					{
						fexiste();
					}
					else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
					{
						lof.txtoperacion.value="incluir";
						lof.cmbcliente_idcliente.disabled=false;
						lof.cmbpersona_cedula.disabled=false;
						lof.btnguardar.disabled=false;
						lof.btncancelar.disabled=false;
						lof.btnnuevo.disabled=true;
						lof.btnbuscar.disabled=true;
						lof.btnmodificar.disabled=true;
						lof.btneliminar.disabled=true;
					}

				}
		    }

		   function fexiste()
		   {
				lof=document.form1;
				lof.cmbcliente_idcliente.value="<?php print($lscliente_idcliente);?>";
				lof.cmbcliente_idcliente.disabled=true;
				lof.cmbpersona_cedula.value="<?php print($lspersona_cedula);?>";
				lof.cmbpersona_cedula.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=true;

			}

			function fnuevo()
			{
				lof=document.form1;
				lof.txthacer.value="incluir";
				lof.cmbcliente_idcliente.disabled=false;
				lof.cmbpersona_cedula.disabled=false;
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
			}

			function fcancelar()
			{
			   lof=document.form1;
			   lof.cmbcliente_idcliente.value="-";
			   lof.cmbpersona_cedula.value="-";
			   lof.txtoperacion.value="";
			   lof.txthacer.value="";
			   lof.txthay.value=0;
			   lof.cmbcliente_idcliente.disabled=true;
			   lof.cmbpersona_cedula.disabled=true;
			   lof.btnguardar.disabled=true;
			   lof.btncancelar.disabled=true;
			   lof.btnnuevo.disabled=false;
			   lof.btnbuscar.disabled=false;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			}

			function fbuscar()
			{
			   lof=document.form1;
			   lof.cmbcliente_idcliente.disabled=true;
			   lof.cmbpersona_cedula.disabled=true;
			   lof.btnguardar.disabled=true;
			   lof.btncancelar.disabled=false;
			   lof.btnnuevo.disabled=true;
			   lof.btnbuscar.disabled=false;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			}

			function fmodificar()
			{
			   lof=document.form1;
			   lof.txtoperacion.value="modificar";
			   lof.cmbcliente_idcliente.disabled=false;
			   lof.cmbpersona_cedula.disabled=false;
			   lof.btnguardar.disabled=false;
			   lof.btncancelar.disabled=false;
			   lof.btnnuevo.disabled=true;
			   lof.btnbuscar.disabled=true;
			   lof.btnmodificar.disabled=true;
			   lof.btneliminar.disabled=true;
			}

			function feliminar()
			{
				lof=document.form1;
				if (confirm("desea eliminar"))
				{
					lof.cmbcliente_idcliente.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
				else
				{
					fcancelar();
				}
			}

			function fperderfocuscliente_idcliente()
			{
				lof=document.form1;
				if (lof.cmbcliente_idcliente.value!="")
				{
					lof.txtoperacion.value="buscar";
					lof.submit();
				}
				else
				{
					lof.cmbcliente_idcliente.focus();
				}
			}

			function fguardar()
			{
				lof=document.form1;
				lof.cmbcliente_idcliente.disabled=false;
				if (fvalidar())
				{
					lof.submit();
				}
			}

			function fvalidar()
			{
				lbbueno=false;
				lof=document.form1;
				if (lof.cmbcliente_idcliente.value=="")
				{
					alert("nº de Cuenta en Blanco");
					lof.cmbcliente_idcliente.focus();
				}
				
				else
				{
					lbbueno=true;
				}
				return lbbueno;
			}

		</script>


		<script type="text/javascript">

			fInicio();
			<!-- Abre una Ventana Emergente -->
			var miPopup
			function abrepersonal()
			{
				miPopup = window.open("buscapersonal.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
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
