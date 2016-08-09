<?php

  /********************************************************************************************
  *                                                                                           *
  *  Nombre: ATCSISTEM                                                                        *
  *  Descripci�n: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
  *  Fecha de Creacion: A�o 2014 Acarigua, Venezuela.                                         *
  *                                                                                           *
  *  Programador (a): Carballo Jes�s <jesusalejandrocarballo@gmail.com>                       *
  *                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
  *                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
  *                   Mogoll�n Jos�  <josetomas_033@hotmail.com>                              *
  *                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
  *                   Sanchez Jes�s  <jesussh7@gmail.com>                                     *
  *                                                                                           *
  *  Este programa es software libre, puede redistribuirlo y / o modificar                    *
  *  Bajo los t�rminos de la GNU Licencia P�blica General(GPL) publicada por                  *
  *  La Fundaci�n de Software Libre (FSF), en su versi�n 2 o cualquier versi�n posterior.     *
  *                                                                                           *
  *  Este programa se distribuye con la esperanza de que sea �til,                            *
  *  Pero SIN NINGUNA GARANT�A, incluso sin la garant�a impl�cita de                          *
  *  COMERCIALIZACI�N o IDONEIDAD PARA UN PROP�SITO PARTICULAR.                               *
  *                                                                                           *
  ********************************************************************************************/

  session_start();
  $msj = isset($_GET['msj']) ? $_GET['msj'] : null ;
  $login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
  if(!$login)
    {
  	 exit('<script> alert("Acceso Denegado!"); window.location.href="../../adsertrans.php" </script>');
  	}
  if($msj)
  	{
  		echo "<script> alert('".$msj."') </script>";
  	}

?>
<html> 
	
	<head> 
	
		<title>ATCSISTEM</title> 
		
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
		<script> 
			var ventana_secundaria 
			function cerrarVentana()
			{ 
				//la referencia de la ventana es el objeto window del popup.Se utiliza para acceder al m�todo close 
				window.close("buscaordcar.php") 
				} 
			 
		</script> 
		
		<script type="text/javascript">
			
			function validar(formulario) 
			{
				if((formulario.checkbox.checked==false)&&(formulario.checkbox2.checked==false))
				{
					alert("Seleccione un criterio de busqueda");
					return false;
				}
				if(formulario.checkbox.checked)
				{
					if (formulario.cod.value.length < 1) 
					{
						alert("Ingrese el Serial del equipo");
						formulario.cod.focus();
						return (false);
					}
				}
				if(formulario.checkbox2.checked)
				{
					  if (formulario.nom.value.length < 1) 
					  {
						alert("Ingrese el Tipo de Equipo a buscar");
						formulario.nom.focus();
						return (false);
					  }
				}
				else
					return true;
			}
			
			function desactivar(id){
				document.getElementById('cod').disabled=false;
				document.getElementById('nom').disabled=true;
				document.getElementById('checkbox').disabled=true;
				document.getElementById('checkbox2').disabled=true;
			}
			function desactivar2(id){
				document.getElementById('cod').disabled=true;
				document.getElementById('nom').disabled=false;
				document.getElementById('checkbox').disabled=true;
				document.getElementById('checkbox2').disabled=true;
			}
			function desactivar3(id){
				document.getElementById('cod').disabled=true;
				document.getElementById('nom').disabled=true;
				document.getElementById('checkbox').disabled=true;
				document.getElementById('checkbox2').disabled=true;
			}
			function activar(id){
				document.getElementById('cod').disabled=true;
				document.getElementById('nom').disabled=true;
				document.getElementById('checkbox2').disabled=false;
				document.getElementById('checkbox3').disabled=false;
			}
					  
		</script>
<link href="../css/maestro.css" type="text/css" rel="stylesheet" />

	</head> 

	<body style="background:url(../imagenes/fondo2.png);"> 
	
		  <fieldset style="width:470;background:#F7F7F7;" id="formu">		
			<form action="../../controlador/corcatalogo.php" method="post" name="formulario" id="formulario" OnSubmit="return validar(this)">
			 <table border="0" align="left" cellspacing="0" >
			  <tr>
				<td colspan="1" style="background:url(../imagenes/colores3.jpg);radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius : 5px 4px 0px 0px;" width="470"><p style="font-family:arial;color:#FFFFFF;margin:0px 35px 0px 55px;">Consultar de orden de carga</p></td>
			  </tr>
			  <tr>
				<td colspan="2">
				  <table border="0" align="left" >
					<tr>
					  <td>&nbsp </td>
					  <td><br><p style="font-family:arial;margin:0px 0px 0px 70px;">Codigo de la orden de carga:</p></td>
					  <td ><br><input name="cod" type="text" style="margin:0px 0px 0px 10px;" class="txt1" disabled id="cod"></td>
					  <td><div align="center">
					<br>&nbsp <input type="checkbox" name="checkbox" value="checkbox" onClick="desactivar(this)">
					  </div></td>
					</tr>
					<tr>
					  <td>&nbsp </td>
					  <td><p style="font-family:arial;margin:0px 0px 0px 85px;">cedula del chofer:</p></td>
					  <td><input name="nom" type="text" style="margin:0px 0px 0px 10px;" class="txt1" disabled id="nom"></td>
					  <td><div align="center">
					&nbsp <input type="checkbox" name="checkbox2" value="checkbox" onClick="desactivar2(this)">
					  </div></td>
					</tr>
					<tr>
					  <td colspan="3"><div align="center"><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
						<input type="submit" name="Submit" class="boton3" value="Buscar         ">
						<input type="reset" name="Submit2" class="boton4"  value="Cancelar                     " onClick="activar(this)">
						<input name="button" type="button" class="boton6" onClick="cerrarVentana()" value="Cerrar       ">
						<input name="catalogo" type="hidden" id="catalogo" value="35">
						</div></td>
					  </tr>
				  </table></td>
				</tr>
			</table>
		</form>
		  </fieldset>
		</div>
	  </div>
	</div>
	</body> 
</html> 
