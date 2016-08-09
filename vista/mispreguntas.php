<?php
  require_once("../modelo/class_usuarios.php");
  $us = new usuariosex;
  if($us->recibir_datos($_SESSION["idUsuario"]))
  {
      $cadena = $us->getdatos_array();
  }
  
  	include("alertas.php");
	require_once("../modelo/class_usuarios.php");
	$idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : null;
	$u = new usuariosex;
	$preguntas = $u->OlvidoContrasena($cadena[6]);
	$npreguntas = count($preguntas[0]);
?>
<div class="profile-env">
 <header class="row">
	 <div class="col-sm-2"> 
	   <a href="#" class="profile-picture"> <img src="imagenes/user.png" class="img-responsive img-circle" /> </a>
	 </div> 
	  <div class="col-sm-8">
		 <ul class="profile-info-sections"> 
		   <li> <div class="profile-name"> <strong> <a href="#"><?php if(isset($cadena)){ echo strtoupper($cadena[0].' '.$cadena[2]);  } ?></a> 
		        <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
		         </strong>
		         </div>
		    </li>
		   </ul> </div> </header> <section class="profile-info-tabs"> <div class="row"> <div class="col-sm-offset-2 col-sm-10"> 
			   <ul class="user-details"> 
				   <li> <a href="#"> <i class="entypo-user"></i><?php if(isset($cadena)){ echo $cadena[6];} ?></a> </li>
				   <li>	<a href="#"> <i class="entypo-suitcase"></i><?php if(isset($cadena)){ echo $cadena[8];} ?> </a> </li> 
				   <li> <a href="#"> <i class="entypo-phone"></i><?php if(isset($cadena)){ echo $cadena[3];} ?></a> </li> </ul> <!-- tabs for the profile links --> <ul class="nav nav-tabs"> 
<li><a href="?url=miperfil">Editar Perfil</a></li> 
<li><a href="?url=miclave">Editar Contraseña</a></li>
<li class="active"><a href="?url=miclave">Editar Preguntas de Seguridad</a></li>  
</ul> 
</div>
</div> 
</section>
						<form name="form1" id="fUsuarios" method="post" action="../controlador/controlador_verificar_preguntas.php">
							<div class="row">
								<div class="col-lg-4"></div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<?php
									 if($npreguntas>=1)
									{

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
								<input type="button" class="btn btn-primary btn-lg" name="opt" value="Guardar" onclick="fguardar();">
								<input type="button" class="btn btn-primary btn-lg" name="btncancelar" value="Cancelar" onclick="cancelar('olvidoclave')">
							</div>
							<div id="alertasValid"></div>
						</form>
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
