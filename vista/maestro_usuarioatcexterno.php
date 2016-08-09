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
	
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	$lsidusuario= isset($_GET['lsidusuario']) ? $_GET['lsidusuario'] : null ;
	$lsnombre= isset($_GET['lsnombre']) ? $_GET['lsnombre'] : null ;
	$lsapellido= isset($_GET['lsapellido']) ? $_GET['lsapellido'] : null ;
	$lstelefono= isset($_GET['lstelefono']) ? $_GET['lstelefono'] : null ;
	$lscedula= isset($_GET['lscedula']) ? $_GET['lscedula'] : null ;
	$lscorreo= isset($_GET['lscorreo']) ? $_GET['lscorreo'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<script src="js/validacionScript.js"></script>
<!DOCTYPE html> <html lang="en">
	 <head> <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <title>ATCSISTEM</title> 
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
    <link rel="stylesheet" href="css/entypo.css" id="style-resource-2"> 
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"> 
    <link rel="stylesheet" href="css/bootstrap.css" id="style-resource-4"> 
    <link rel="stylesheet" href="css/neon-core.css" id="style-resource-5"> 
    <link rel="stylesheet" href="neon-theme.css" id="style-resource-6">
     <link rel="stylesheet" href="css/neon-forms1.css" id="style-resource-7">
      <link rel="stylesheet" href="css/custom.css" id="style-resource-8"> 
      <script src="js/jquery-1.11.0.min.js"></script>

       
<body class="page-body login-page login-form-fall">
<div class="login-container"> 
	<div class="login-header login-caret">
	 <div class="login-content">
		 <img src="imagenes/about/atc.png"  alt="" /> </a> 
		 <p class="description">Almacenes y Transporte Cerealeros A.T.C. C.A </p> <!-- progress bar indicator --> 
		</div>
	</div>
</div>
	<center>
		<div class="container" style="margin-top:50px"><h2>Registro Usuarios Externos</h2>
		<h4>Para ser usuario del sistema que le brinda ATC C.A. debe llenar los siguientes campos</h4>
					<form method="post" name="fusuarioexterno" id="fusuarioexterno" action="../controlador/control_maestro_usuarioatcexterno.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="form-group">
										<div class="row">
							<div class="form-group col-lg-12">
								<label >Usuario:</label>
								<input class="form-control" type="text" name="txtidusuario"  tabindex="1"  value="<?php print($lsidusuario);?>" onblur="fperderfocusidusuario();"/>
							</div></div>
							</div><div class="row">
							<div class="form-group col-lg-5">
								<label >Cédula:</label>
								<input class="form-control"  type="text" name="txtcedula"  title="ingrese un nombre de usuario"   tabindex="2"  value="<?php print($lscedula);?>" onblur="fperderfocuspersona();"/>
							</div>

							<div class="form-group col-lg-1">
									<label >Catalogo</label><button class="btn btn-primary"  type="button" value="..."  title="Buscar Cliente" name="btnAbreempresa"  onclick="abreempresa()"><i class="glyphicon glyphicon-folder-open"></i></button>
							</div>

							<div class="form-group col-lg-6">
								<label >Nombre:</label>
								<input class="form-control" type="text" readonly name="txtnombre"  title="ingrese el nombre" value="<?php print($lsnombre);?>"/>
							</div>
							</div>
							<div class="row">
<!--
							<div class="form-group col-lg-6">
								<label >Apellido:</label>
								<input class="form-control" type="text" readonly name="txtapellido"  title="ingrese el apellido" value="<?php print($lsapellido);?>"/>
							</div>
-->
							<div class="form-group col-lg-6">
								<label >Teléfono:</label>
								<input class="form-control" type="text" readonly name="txttelefono"  title="ingrese teléfono" value="<?php print($lstelefono);?>"/>
							</div>
							<div class="form-group col-lg-6">
								<label >Correo:</label>
								<input class="form-control" type="text" readonly name="txtcorreo"  title="ingrese correo" value="<?php print($lscorreo);?>"/>
							</div>
						</div>
						
						<center>
							<input type="submit" class="btn btn-primary btn-lg" name="btnguardar" tabindex="7" value="Guardar"  onclick="fguardar();">
							<input type="reset" class="btn btn-primary btn-lg" name="btncancelar" tabindex="8" value="Cancelar"  onclick="fcancelar();">
							<input type="button" class="btn btn-primary btn-lg" name="btnregresar" tabindex="9" value="Regresar" onclick="fregresar();">
							<input type="button" class="btn btn-primary btn-lg" name="btncancelar" tabindex="10" value="Salir"   onclick="fsalir();">
							<input type="button" class="btn btn-primary btn-lg"  value="Ayuda"   onclick="fayuda();"></div>
						</center> 
					</form>
				
			</div>
		</div>
	</div>
</div>

<script language="javascript">
	finicio();
	function finicio()
	{
		lof=document.fusuarioexterno;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo")&&(lof.txtoperacion.value!="buscar_nombre_usuario"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					window.location="../vista/vista.php?url=nuevousuario"
				}

			}
				fnuevo();
		}

			else if (lof.txtoperacion.value=="buscar")
            {
                if ((lof.txthay.value==1)&&(lof.txthacer.value="incluir"))
                {
				fcancelar();
				alert("¡Nombre de usuario ya existe, intente con uno diferente! ");
                }
                else if ((lof.txthay.value==0)&&(lof.txthacer.value="incluir"))
                {
					lof=document.fusuarioexterno;
					lof.txtoperacion.value="incluir";
					lof.txthacer.value="incluir";
					lof.txtidusuario.disabled=false;
					lof.txtnombre.disabled=false;
					lof.txtapellido.disabled=false;
					lof.txttelefono.disabled=false;
					lof.txtcedula.disabled=false;
					lof.txtcorreo.disabled=false;
					lof.btnguardar.disabled=false;
					lof.btncancelar.disabled=false;
                }
                else if ((lof.txthay.value==3)&&(lof.txthacer.value="incluir"))
                {
					lof=document.fusuarioexterno;
					lof.txtoperacion.value="incluir";
					lof.txthacer.value="incluir";
					lof.txtidusuario.disabled=false;
					lof.txtnombre.disabled=false;
					lof.txtapellido.disabled=false;
					lof.txttelefono.disabled=false;
					lof.txtcedula.disabled=false;
					lof.txtcorreo.disabled=false;
					lof.btnguardar.disabled=false;
					lof.btncancelar.disabled=false;
                }
            }
			else if (lof.txtoperacion.value=="buscarpersona")
            {
                if ((lof.txthay.value==5)&&(lof.txthacer.value="incluir"))
                {
				alert("¡Nombre de usuario ya existe, intente con uno diferente! ");
                }
                else if ((lof.txthay.value==4)&&(lof.txthacer.value="incluir"))
                {
					lof=document.fusuarioexterno;
					lof.txtoperacion.value="incluir";
					lof.txthacer.value="incluir";
					lof.txtidusuario.disabled=false;
					lof.txtnombre.disabled=false;
					lof.txtapellido.disabled=false;
					lof.txttelefono.disabled=false;
					lof.txtcedula.disabled=false;
					lof.txtcorreo.disabled=false;
					lof.btnguardar.disabled=false;
					lof.btncancelar.disabled=false;
                }
            }
	}

	function fnuevo()
	{
		lof=document.fusuarioexterno;
		lof.txtoperacion.value="incluir";
		lof.txthacer.value="incluir";
		lof.txtidusuario.disabled=false;
		lof.txtnombre.disabled=false;
		lof.txtapellido.disabled=false;
		lof.txttelefono.disabled=false;
		lof.txtcedula.disabled=false;
		lof.txtcorreo.disabled=false;
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
	}
	
	
	function fcancelar()
	{
		lof=document.fusuarioexterno;
		lof.txtidusuario.value="";
		lof.txtnombre.value="";
		lof.txtapellido.value="";
		lof.txttelefono.value="";
		lof.txtcedula.value="";
		lof.txtcorreo.value="";
	}

	function fcrearusuario()
	{
		lof=document.fusuarioexterno;
		lof.txtoperacion.value="incluir";
		lof.txtidusuario.disabled=true;
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

	function fperderfocusidusuario()
	{
		lof=document.fusuarioexterno;
		if (lof.txtidusuario.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtnombre.focus();
		}
	}
		function fperderfocuspersona()
	{
		lof=document.fusuarioexterno;
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
	function fperderfocusnombre_usuario()
	{
		lof=document.fusuarioexterno;
		if (lof.txtcedula.value!="")
		{
			lof.txtoperacion.value="buscar_nombre_usuario";
			lof.submit();
		}
		else
		{
			lof.txtidusuario.focus();
		}
	}
	function fguardar()
	{
		lof=document.fusuarioexterno;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	
		function fregresar()
	{
		window.location="session.php"
	}
	function fsalir()
	{
				window.close("maestro_usuarioatcexterno.php") 
	}
		function abreempresa(){
		miPopup = window.open("busqueda/busca_cliente.php","empresa","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	var miPopup
	function fayuda(){
		miPopup = window.open("ayudaexternonatural.php","empresa","width=650px,height=300px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
