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

?>

<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <title>::..Recuperar contraseña..::</title>
	</head>
	<body>
		<table width="600" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td  align="center">
					<form name="busca_usuario" method="post" action="../controlador/control_maestro_usuario.php">
						<input type="hidden" name="txtoperacion" value="<? print($lcoperacion);?>">
						<input type="hidden" name="txthay" value="<? print($lnhay);?>"> 
						<table width="36%" height="50" border="1" align="center">
							<tr>
								<td width="39%">Usuario</td>
								<td align="center" width="61%"><input type="text" name="txtusuario" id="txtusuario"></td>
							</tr>
						</table>
						<table width="32%" height="33" border="0" align="center">
							<tr>
								<td width="50%" align="center"><input type="button" name="btnenviar" value="Enviar" onclick="enviar()"></td>
								<td align="center"><input type="reset" name="btncancelar" value="Cancelar" ></td>
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

	function inicio()
	{
		f=document.busca_usuario;
		if (f.txthay.value==2)
		{
			alert("Este usuario no existe");   
		}
	}
	function enviar()
	{
		f=document.busca_usuario;
		f.txtoperacion.value="busca_usuario";
		f.submit();
	}
</script>
