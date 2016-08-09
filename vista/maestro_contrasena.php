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

	$lnhay = isset($_GET['lnhay']) ? $_GET['lnhay'] : null;
	$lcusuario = isset($_GET['lcusuario']) ? $_GET['lcusuario'] : null;

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>::..Indique Nueva Contraseña..::</title>  
	
	</head>
	<body>
		<table width="600" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td  align="center">
					<form name="modificar_contrasena" method="post" action="../controlador/control_maestro_usuario.php">
						<input type="hidden" name="txtoperacion" value="<? print($lcoperacion);?>">
						<input type="hidden" name="txtusuario" value="<? print($lcusuario);?>">
						<table width="49%" height="90" border="1" align="center">
							<br>
							<br>
							<br>
							<tr>
								<td  align="center" width="43%">Clave</td>
								<td width="57%" align="center" ><input type="password" name="txtcontrasena" id="txtcontrasena"></td>
							</tr>
							<tr>
								<td align="center" width="43%">Confirme Clave</td>
								<td align="center"><input type="password" name="txtcontrasena2" id="txtcontrasena2" onblur="igual()"></td>
							</tr>
						</table>
						<table width="31%" height="47" border="0" align="center">
							<tr>
								<td width="50%" align="center"><input type="button" name="btnenviar" value="Enviar" onclick="enviar()"></td>
								<td align="center"><input type="reset" name="btncancelar" value="Cancelar" </td>
							</tr>
						</table>
					</form>
				</td>
			<tr>
		</table>
	</body>
</html>

<script language="javascript">
	inicio();

	function igual()
	{
		f=document.modificar_contrasena;
		if (f.txtcontrasena2.value!=f.txtcontrasena.value)
		{
			alert("Sus Contraseña NO coinciden verifique la Contraseña ingresada");
			f.txtcontrasena2.focus();
		}
		else if(f.txtcontrasena.value.length < 8)
		{
			alert("Su nueva Contraseña debe tener un minimo de 8 digitos");
			document.f.txtcontrasena.focus();
		}
	}
	function enviar()
	{
		f=document.modificar_contrasena;
		f.txtoperacion.value="modificar_contrasena";
		alert("Su Contraseña ha sido modificada exitosamente");
		f.submit();
	}
</script>
