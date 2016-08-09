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
	$liidusuario= isset($_GET['liidusuario']) ? $_GET['liidusuario'] : null ;
	$lsclave= isset($_GET['lsclave']) ? $_GET['lsclave'] : null ;
	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
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
		<div class="container" style="margin-top:30px"><h2>Registra Nueva Contraseña</h2></div>
				<div class="panel-body">
					<form method="post" name="form1" action="../controlador/control_nueva_clave.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txtidusuario"    value="<?php print($liidusuario);?>" >
						<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-6">
								<input class="form-control"  type="password" name="txtclave" id="txtclave"  placeholder="Contraseña" onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false" maxlength="50"  tabindex="1"  value="<?php print($lsclave);?>"> 
							</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-6">
								
								<input class="form-control"  type="password" name="txtrepite"  placeholder="Repita Contraseña" onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false"  maxlength="50"  tabindex="2"> 
							</div>
						</div>
						<div class="form-group col-lg-12">
						</div>
						<center>
							<input type="button" name="btnguardar" value="Guardar           " class="btn btn-primary btn-lg" tabindex="20" onclick="fguardar();">
							<input type="button" name="btncancelar" value="Cancelar            " class="btn btn-primary btn-lg" tabindex="21" onclick="fcancelar();">
							<input type="button" name="btncancelar" value="Salir" class="btn btn-primary btn-lg" tabindex="2" onclick="fsalir();"></div>
						</center> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
        <script src="js/validaciones1.js"></script>

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
					window.location="../vista/vista.php?url=nuevaclave"
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
			
				fnuevo();
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

	}
	function fnuevo()
	{
		lof=document.form1;
		lof.txtoperacion.value="incluir";
		lof.txthacer.value="incluir";
		lof.txtidusuario.disabled=false;
		lof.txtclave.disabled=false;
		lof.txtidusuario.focus();
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
		lof.txtclave.value="";
		lof.txtrepite.value="";
		lof.txtoperacion.value="";
		lof.txthacer.value="";
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
		if (lof.txtclave.value=="")
		{
			alert("contraseña en blanco");
			lof.txtclave.focus();
		}
		else if (lof.txtclave.value.length<8)
		{
			alert("La Contraseña debe superar los 8 Caracteres");
			lof.txtclave.focus();
		}
		else if (lof.txtrepite.value=="")
		{
			alert("repita la contraseña");
			lof.txtrepite.focus();
		}
		else if (lof.txtrepite.value.length<8)
		{
			alert("La repeticion de la Contraseña debe superar los 8 Caracteres");
			lof.txtrepite.focus();
		}
		else if (lof.txtclave.value!=lof.txtrepite.value)
		{
			alert("la contraseña no Coincide");
			lof.txtclave.focus();
		}
		else if (lof.txtclave.value=lof.txtrepite.value)
		{
			var m = document.getElementById("txtclave").value;
			var expreg = new RegExp("(?=^.{1,}$)((?=.*[0-9]))^.*");
			if(expreg.test(m))
			{
				var let = new RegExp("(?=^.{1,}$)((?=.*[a-z]))^.*");
				if(let.test(m))
				{
					var letm = new RegExp("(?=^.{1,}$)((?=.*[A-Z]))^.*");
					if(letm.test(m))
					{
						var sim = new RegExp("(?=^.{1,}$)((?=.*[$%#!¡&/+_.,]))^.*");
						if(sim.test(m))
						{
							lbbueno=true;
						}
						else
						{
							alert("Su Contraseña Debe Incluir Simbolos Ejemplo:($%#!¡&/+_.,)");
						}
					}
					else
					{
						alert("Su Contraseña Debe Incluir Letras Mayusculas");
					}
				}
				else
				{
					alert("Su Contraseña Debe Incluir Letras Minusculas");
				}
				
			}
			else
			{
				alert("Su Contraseña Debe Incluir Numeros");
			}
		}
		else
		{
			lbbueno=true;
		}
		return lbbueno;
	}
	
	function fsesion()
	{
		window.location="session.php"
	}
	function fsalir()
	{
				window.close("maestro_nueva_clave.php") 
	}

</script>
