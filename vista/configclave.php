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
	require_once("../modelo/class_usuarios.php");
	$idUsuario = isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : null ;
	$us=new usuariosex;
	$cantidadPreguntas = $us->ConfiguracionSistema('preguntasSecretas');
?>

<script src="js/validaciones.js"></script>
<body style="background:#FAFAFA;">
<div class="container">

	<div class="col-md-12">
		<?php 
		include("alertas.php");
		?>
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Configuración de seguridad</div></div>
			<div class="panel-body">
				<form name="form1" id="fUsuarios" method="post" action="../controlador/controlador_configuracion_cuenta.php">
					
						<div class="col-md-12">
							<h3 style="color:#BF0000">Has ingresado por primera vez, debes configurar la seguridad de tu cuenta.</h3><br></div>
							<p>En el Campo "Contraseña Actual" debe ingresar la contraseña con que accedio al sistema, es decir la cédula</p>
							<p>En el Campo "Nueva Contraseña" debe ingresar una nueva contraseña que contenga por lo menos un numero,una letra mayuscula y un caracter especial ($%#!¡&/+_.,)</p>
							<p>En el Campo "Repita Contraseña Nueva" debe ingresar nuevamente la contraseña actual</p>
							<p>Recuerde que en los Campo de "Pregunta" y "Respuesta" debe colocar preguntas y respuestas faciles de recordar</p>
							<br>
					
					<div class="row">
						<div class="col-md-12">
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="password" name="contrasenaActual" placeholder="Contraseña actual"  maxlength="9" onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false" id="contrasenaActual"  class="form-control" value="" /></td>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">    
										
										<input type="password" name="contrasenaNueva" placeholder="Nueva contraseña " onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false" id="contrasenaNueva"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[2]; } ?>" /></td>
									</div>
								</div>
							
							
								<div class="col-md-4">
									<div class="form-group">
										
										<input type="password" name="repiteContrasena" placeholder="Repita la contraseña nueva " onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false" id="repiteContrasena" class="form-control"  value="<?php if(isset($cadena)){ echo $cadena[4]; } ?>"/></td>
									</div>
								</div>
							</div>
							
							<div id="alertasValid"></div>
							</div>   
							<div class="col-md-12">
								<div class="row">
									<?php 
										if($us->hayPreguntas($idUsuario))
										{
											$pre = $us->traerPreguntas($idUsuario);
											$cantidad = count($pre);
											$ii=0;
											for($i=0;$i<=$cantidad-1;$i++){
											$ii++;
											echo '
											<div class="col-md-6">
												<div class="form-group">    
													<label>'.$ii.' - Ingresa una pregunta :</label>
													<input type="text" name="pregunta[]" id="pregunta" placeholder="Repita la contraseña " class="form-control" value="'.$pre[$i][0].'" disabled/>
													<label>'.$ii.' - Respuesta :</label>
													<input type="text" name="respuesta[]" id="respuesta" placeholder="Repita la contraseña "  class="form-control" value="'.$pre[$i][1].'" disabled/>
												</div>
											</div>
											';
											}
											echo '<input type="hidden" name="hay" value="1">';
										}
										else
										{
											for($i=1;$i<=$cantidadPreguntas;$i++)
											{
											echo '
												<div class="col-md-6">
												<div class="form-group">    
												
												<input type="text" name="pregunta[]" id="pregunta" placeholder="'.$i.' - Ingresa una pregunta" class="form-control" value="" />
												<br>
												<input type="text" name="respuesta[]" id="respuesta" placeholder="'.$i.' - Respuesta "  class="form-control" value="" />
												</div>
												</div>
												';
											}
											echo '<input type="hidden" name="hay" value="2">';
										}
									?>
								</div>
								<center>
									<input type="text" name="idUsuario" value="<?php echo $idUsuario ?>">
									<input type="button" class="btn btn-primary btn-lg" name="opt" value="Registrar" onclick="fguardar();">
									<input type="button" class="btn btn-primary btn-lg" name="Cancelar" value="Cancelar" onclick="cancelar('configclave')">
									<input type="button" class="btn btn-primary btn-lg" name="btnregresar" value="Regresar" onclick="fregresar();">
									<input type="button" class="btn btn-primary btn-lg" name="btncancelar" value="Salir"   onclick="fsalir();">
								</center> 
								
						
				</form>
			</div>
		</div>
	</div>
</div>
</body>
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
					window.location="../vista/nuevaclave.php"
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
		if (lof.contrasenaActual.value=="")
		{
			alert("Ingrese Su Contraseña actual");
			lof.contrasenaActual.focus();
		}
		else if (lof.contrasenaActual.value.length<7)
		{
			alert("Contraseña actual inferior a 7 digitos");
			lof.contrasenaActual.focus();
		}
		else if (lof.contrasenaNueva.value=="")
		{
			alert("nueva contraseña en blanco");
			lof.contrasenaNueva.focus();
		}
		else if (lof.contrasenaNueva.value.length<8)
		{
			alert("La Contraseña nueva debe superar los 8 Caracteres");
			lof.contrasenaNueva.focus();
		}
		else if (lof.repiteContrasena.value=="")
		{
			alert("repita la nueva contraseña");
			lof.repiteContrasena.focus();
		}
		else if (lof.repiteContrasena.value.length<8)
		{
			alert("La repeticions de la nueva Contraseña debe superar los 8 Caracteres");
			lof.repiteContrasena.focus();
		}
		else if (lof.contrasenaNueva.value!=lof.repiteContrasena.value)
		{
			alert("la contraseña no Coincide");
		}
		else if (lof.contrasenaNueva.value=lof.repiteContrasena.value)
		{
			var m = document.getElementById("contrasenaNueva").value;
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
							fntValidar();
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
		if(confirm('Desea almacenar los datos actuales?'))
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
	function fregresar()
	{
		window.location="session.php"
	}
	function fsalir()
	{
		window.close("configclave.php") 
	}
</script>

