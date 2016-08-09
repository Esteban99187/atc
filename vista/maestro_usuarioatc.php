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
	$lsidusuario= isset($_GET['lsidusuario']) ? $_GET['lsidusuario'] : null ;
	$lstipo= isset($_GET['lstipo']) ? $_GET['lstipo'] : null ;
	$lsnombre= isset($_GET['lsnombre']) ? $_GET['lsnombre'] : null ;
	$lsapellido= isset($_GET['lsapellido']) ? $_GET['lsapellido'] : null ;
	$lstelefono= isset($_GET['lstelefono']) ? $_GET['lstelefono'] : null ;
	$lscedula= isset($_GET['lscedula']) ? $_GET['lscedula'] : null ;
	$lscorreo= isset($_GET['lscorreo']) ? $_GET['lscorreo'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Registro Usuarios Internos</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a><i class="entypo-help" onclick="abretipo_contribuyente()"></i></div>
				</div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_maestro_usuarioatc.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-12">
								<input class="form-control" type="text" name="txtidusuario" placeholder="Nombre de Usuario"  maxlength="18" tabindex="1"   value="<?php print($lsidusuario);?>" onblur="fperderfocusidusuario();"/>
							</div>
							<div class="form-group col-lg-6">
								<input class="form-control" type="text" name="txtcedula" placeholder="Cedula" title="ingrese un nombre de usuario"  maxlength="18" tabindex="3"  value="<?php print($lscedula);?>" onblur="fperderfocuspersona();"/>
							</div>
							<div class="form-group col-lg-6">
								<input class="form-control" type="text" readonly name="txtnombre" placeholder="Nombre" title="ingrese telefono del departamento" onkeypress="return soloNumero(event)" maxlength="11" tabindex="3"  value="<?php print($lsnombre);?>"/>
							</div>
							<div class="form-group col-lg-6">
								<input class="form-control" type="text" readonly name="txtapellido" placeholder="Apellido" title="ingrese telefono del departamento" maxlength="11" tabindex="3"  value="<?php print($lsapellido);?>"/>
							</div>
							<div class="form-group col-lg-6">
								<input class="form-control" type="text" readonly name="txttelefono" placeholder="Telefono" title="ingrese telefono del departamento" maxlength="13" tabindex="3"  value="<?php print($lstelefono);?>"/>
							</div>
							<div class="form-group col-lg-6">
								<input class="form-control" type="text" readonly name="txtcorreo" placeholder="Correo Electronico" title="ingrese un nombre de usuario"  maxlength="35" tabindex="3"  value="<?php print($lscorreo);?>"/>
							</div>
							<div class="form-group col-lg-6">
								<select class="form-control" name="txttipo" placeholder="tipo de perfil"  id="txttipo" tabindex="9" >
								<option value="" value="<?php print($lstipo);?>" >seleccione</option>
									<?php
										$lssql="select IdPerfil,concat(' ',NombrePer) as nombre from Perfil order by nombre";
										$lobjcombo->fgenerar($lssql,"IdPerfil","nombre","");
									?>
								</select> 
							</div>
						</div>
						<center>
							<input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();">
							<input type="button" name="btnguardar" value="Guardar           " class="btn btn-primary" tabindex="20" onclick="fguardar();">
							<input type="button" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="fcancelar();">
							<input type="button" name="btnbuscar" value="Buscar             " class="btn btn-primary" tabindex="22" onclick="fbuscar();">
							<input type="button" name="btnmodificar" value="Modificar             " class="btn btn-primary" tabindex="23" onclick="fmodificar();" >
							<input type="button" onclick="flistar();" value="Listar      " class="btn btn-primary" 	/></div>
						 </center> 
					</form>
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
					<i class="entypo-user" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label>editar este</label>
			</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">

                                function flistar()
                                    {
                                           mipopup = window.open("lista/listausuariosinternos.php","miwin","width=1300,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>
<script language="javascript">
	finicio();
	function finicio()
	{
		lof=document.form1;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo")&&(lof.txtoperacion.value!="buscarpersona"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					window.location="../vista/admin.php?url=nuevousuariointerno"
					
					
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
			if ((lof.txthay.value==1)&&(lof.txthacer.value="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==2)&&(lof.txthacer.value="incluir"))
			{
			alert("NOMBRE DE USUARIO NO DISPONLIBLE ");
			fcancelar();
			}
			else if ((lof.txthay.value==3)&&(lof.txthacer.value="incluir"))
			{
				fincluir();
			}
		}
		else if (lof.txtoperacion.value=="buscarpersona")
		{
			if ((lof.txthay.value==4)&&(lof.txthacer.value="incluir"))
			{
				lof=document.form1;
				lof.txthacer.value="incluir";
				lof.txtoperacion.value="incluir";
				lof.txtidusuario.disabled=false;
				lof.txtnombre.focus();
				lof.txttipo.disabled=false;
				lof.txtnombre.disabled=false;
				lof.txtapellido.disabled=false;
				lof.txttelefono.disabled=false;
				lof.txtcedula.disabled=false;
				lof.txtcorreo.disabled=false;
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
			}
			else if ((lof.txthay.value==5)&&(lof.txthacer.value="incluir"))
			{
				alert("cedula de identidad no asociado a un personal activo de atc c.a ");
				lof=document.form1;
				lof.txtcedula.value="";
				lof.txthacer.value="incluir";
				lof.txtoperacion.value="incluir";
				lof.txtidusuario.disabled=false;
				lof.txtcedula.focus();
				lof.txttipo.disabled=false;
				lof.txtnombre.disabled=false;
				lof.txtapellido.disabled=false;
				lof.txttelefono.disabled=false;
				lof.txtcedula.disabled=false;
				lof.txtcorreo.disabled=false;
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
		lof.txtidusuario.disabled=true;
		lof.txttipo.value="<?php print($lstipo);?>";
		lof.txttipo.disabled=true;
		lof.txtnombre.disabled=true;
		lof.txtapellido.disabled=true;
		lof.txttelefono.disabled=true;
		lof.txtcedula.disabled=true;
		lof.txtcorreo.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
	}
	function fincluir()
	{
		lof=document.form1;
		lof.txthacer.value="incluir";
		lof.txtoperacion.value="incluir";
		lof.txtidusuario.disabled=false;
		lof.txtcedula.focus();
		lof.txttipo.disabled=false;
		lof.txtnombre.disabled=false;
		lof.txtapellido.disabled=false;
		lof.txttelefono.disabled=false;
		lof.txtcedula.disabled=false;
		lof.txtcorreo.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	function fnuevo()
	{
		lof=document.form1;
		lof.txthacer.value="incluir";
		lof.txtidusuario.disabled=false;
		lof.txtidusuario.focus();
		lof.txttipo.disabled=false;
		lof.txtnombre.disabled=false;
		lof.txtapellido.disabled=false;
		lof.txttelefono.disabled=false;
		lof.txtcedula.disabled=false;
		lof.txtcorreo.disabled=false;
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
		lof.txtidusuario.value="";
		lof.txttipo.value="";
		lof.txtnombre.value="";
		lof.txtapellido.value="";
		lof.txttelefono.value="";
		lof.txtcedula.value="";
		lof.txtcorreo.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value=0;
		lof.txtidusuario.disabled=true;
		lof.txttipo.disabled=true;
		lof.txtnombre.disabled=true;
		lof.txtapellido.disabled=true;
		lof.txttelefono.disabled=true;
		lof.txtcedula.disabled=true;
		lof.txtcorreo.disabled=true;
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
		lof.txtidusuario.disabled=false;
		lof.txtidusuario.focus();
		lof.txttipo.disabled=true;
		lof.txtnombre.disabled=true;
		lof.txtapellido.disabled=true;
		lof.txttelefono.disabled=true;
		lof.txtcedula.disabled=true;
		lof.txtcorreo.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	function fmodificar()
	{
		lof=document.form1;
		lof.txtoperacion.value="modificar";
		lof.txtidusuario.disabled=true;
		lof.txttipo.disabled=false;
		lof.txttipo.focus();
		lof.txtnombre.disabled=true;
		lof.txtapellido.disabled=true;
		lof.txttelefono.disabled=true;
		lof.txtcedula.disabled=true;
		lof.txtcorreo.disabled=true;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
	}
	function fcrearusuario()
	{
		lof=document.form1;
		lof.txtoperacion.value="incluir";
		lof.txtidusuario.disabled=true;
		lof.txttipo.disabled=false;
		lof.txttipo.focus();
		lof.txtnombre.disabled=false;
		lof.txtapellido.disabled=false;
		lof.txttelefono.disabled=false;
		lof.txtcedula.disabled=false;
		lof.txtcorreo.disabled=false;
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
		if (confirm("¿Desea Eliminar?"))
		{
			lof.txtidusuario.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}
	function fperderfocusidusuario()
	{
		lof=document.form1;
		if (lof.txtidusuario.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidusuario.focus();
		}
	}
	function fperderfocuspersona()
	{
		lof=document.form1;
		if (lof.txtcedula.value!="")
		{
			lof.txtoperacion.value="buscarpersona";
			lof.submit();
		}
		else
		{
			lof.txtcedula.focus();
		}
	}
	function fguardar()
	{
		lof=document.form1;
		lof.txtidusuario.disabled=false;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	function fvalidar()
	{
		lbbueno=false;
		lof=document.form1;
		if (lof.txtidusuario.value=="")
		{
			alert("nombre de usuario en blanco");
			lof.txtidusuario.focus();
		}
		else if (lof.txtcedula.value=="")
		{
			alert("ingrese numero de cedula");
			lof.txtcedula.focus();
		}
		else if (lof.txtnombre.value=="")
		{
			alert("nombre en blanco");
			lof.txtnombre.focus();
		}
		else if (lof.txtapellido.value=="")
		{
			alert("apellido en blanco");
			lof.txtapellido.focus();
		}
		else if (lof.txttelefono.value=="")
		{
			alert("telefono en blanco");
			lof.txttelefono.focus();
		}
		else if (lof.txtcorreo.value=="")
		{
			alert("correo en blanco");
			lof.txtcorreo.focus();
		}
		else if (lof.txttipo.value=="")
		{
			alert("seleccione un tipo de usuario");
		}
		else
		{
			lbbueno=true;
		}

		return lbbueno;
	}
	
	//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abretipo_contribuyente(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudatipo_contribuyente.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
