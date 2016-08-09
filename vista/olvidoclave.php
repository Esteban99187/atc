<?php 
	include("alertas.php");
	require_once("../modelo/class_usuarios.php");
	$idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
	$u = new usuariosex;
	$preguntas = $u->OlvidoContrasena($idUsuario);
	$npreguntas = count($preguntas[0]);
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
       </head>
       
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
		<div class="container" style="margin-top:50px">
				<h2>Olvido Contraseña</h2>
					<h4>Ingrese los siguientes Datos para Recuperar su Contraseña</h4><br>
						<form name="form1" id="fUsuarios" method="post" action="<?php if(isset($_POST["idUsuario"])){ echo '../controlador/controlador_verificar_preguntas.php';}else{echo '#'; } ?>">
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-6">
									<div class="form-group">
										
										<input type="text" name="idUsuario" placeholder="Nombre de Usuario" id="idUsuario" class="form-control "  value="<?php if(isset($_POST["idUsuario"])){ echo $_POST["idUsuario"];} ?>" <?php if(isset($_POST["idUsuario"])){echo "disabled";} ?>/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<?php
									if (empty($idUsuario))
									{
									}
									else if($npreguntas>=1)
									{
										echo '<i class="glyphicon glyphicon-info-sign"> </i> Debe responder las preguntas de seguridad de forma correcta de lo contrario el usuario sera bloqueado. 
										<hr></hr>';
										for($i=0;$i<=$npreguntas-1;$i++)
										{
											echo '<b>'.strtoupper($preguntas[$i][0]).' ?</b></h4>
											<input type="text" name="respuesta[]" id="cedula" class="form-control col-lg-12 "  value=""/>
											';
										}
									}
									else if ($npreguntas==0)
									{
										echo '<i class="glyphicon glyphicon-info-sign"> </i> usted no posee preguntas secretas registradas .
										<hr></hr>';
									}
								?>
								</div>
							</div>
							<br>
							<div class="row">
								<input type="hidden" name="id" value="<?php echo $_POST["idUsuario"] ?>">
								<input type="button" class="btn btn-primary btn-lg" name="opt" value="Recuperar" onclick="fguardar();">
								<input type="button" class="btn btn-primary btn-lg" name="btncancelar" value="Cancelar" onclick="cancelar('olvidoclave')">
								<input type="button" class="btn btn-primary btn-lg" name="btnregresar" value="Regresar" onclick="fregresar();">
								<input type="button" class="btn btn-primary btn-lg" name="btncancelar" value="Salir"   onclick="fsalir();">
							</div>
							<div id="alertasValid"></div>
						</form>
					</div>
				</div>
			</div>
		
	</div>
</div>
<script language="javascript">
	function fregresar()
	{
		window.location="session.php"
	}
	function fsalir()
	{
				window.close("olvidoclave.php") 
	}
	function fcancelar()
	{
		lof=document.form1;
		lof.idUsuario.value="";
	}
	function fguardar()
	{
		lof=document.form1;
		if (fvalidar())
		{
			lof.submit();
		}
	}
	function fvalidar()
	{
		lbbueno=false;
		lof=document.form1;
		if (lof.idUsuario.value=="")
		{
			alert("Ingrese su Nombre de Usuario");
			lof.idUsuario.focus();
		}
		else if (lof.idUsuario.value.length<4)
		{
			alert("nombre de usuario menor a 4 digitos");
			lof.idUsuario.focus();
		}
		else
		{
			fntValidar();
		}

		return lbbueno;
	}
		//funcion que es llamada en el evento submit del formulario
	function fntValidar()
	{
		//obtener el formulario para utilizarlo en la validacion
		var frmFormulario=document.forms['form1'];
		//contar la cantidad de elementos que contiene el formulario
		var iElementos=frmFormulario.elements.length;
		//recorrer todos los elementos del formulario
		for(var iCont=0;iCont<iElementos;iCont++)
		{
			//obtener el elemento actual para utilizarlo
			var objElemento=frmFormulario.elements[iCont];
			//validar unicamente los elementos del tipo &quot;text&quot; (campos de texto)
			if(objElemento.type=='text')
			{
				/*estamos utilizando la funcion trim (funcion no propia de JavaScript)
				para eliminar los espacios en blanco al inicio y final de una cadena*/
				if(trim(objElemento.value)=='')
				{
					//mostramos un mensaje al usuario
					alert('Por favor, complete todos los campos del formulario.');
					//enfocamos el campo que exta vacio
					objElemento.focus();
					//borramos el contenido del campo (podria contener espacios en blanco)
					objElemento.value='';
					//devolvemos false para que el formulario no sea procesado
					return false;
				}
			}
		}
		//llegamos hasta aqui solo en caso de que todos los campos no esten vacios
		//le preguntamos al usuario si desea almacenar los datos
		if(confirm('Desea enviar los datos actuales?'))
		{
			//el usuario indica que no desea almacenar los datos
			//entonces devolvemos false para que el formulario no sea procesado
			lbbueno=true;
		}
	}
	//funcion para eliminar los espacios al inicio y final de cualquier cadena
	//en otros lenguajes se conoce como &quot;trim&quot;, JavaScript no cuenta con ella
	function trim(strTexto)
	{
		//eliminamos los espacios iniciales y finales, con expresiones regulares
		return strTexto.replace(/^\s+/g,'').replace(/\s+$/g,'');
	}
</script>
