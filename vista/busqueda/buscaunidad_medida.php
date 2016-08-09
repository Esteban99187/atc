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

?>

<html> 
	
	<head> 
	
		<title>ATCSISTEM</title> 
		
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
		<script> 
			var ventana_secundaria 
			function cerrarVentana()
			{ 
				//la referencia de la ventana es el objeto window del popup.Se utiliza para acceder al método close 
				window.close("buscaunidad_medida.php") 
				}
				var miPopup
				function abreVentana(){
					window.close(this);
					miPopup = window.open("../vista/viscohvestsolicitud.php","miwin","width=700,height=600,scrollbars=yes,toolbar=No")
					miPopup.focus()
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
<link rel="stylesheet" href="../css/bootstrap.css">

	</head> 

	<body style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */"> 
	
	<div class="row spa">
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Consulta de unidad de medida</strong></div>
				<div class="panel-body">
			<form action="../../controlador/corcatalogo.php" method="post" name="formulario" id="formulario" OnSubmit="return validar(this)">
			  <table class="table table-bordered table-striped table-hover">
    <tbody>
      <tr>
        <th>Código</th>
        <th><input name="cod" type="text" class="form-control"  disabled id="cod"></th>
        <th><input type="checkbox" name="checkbox" value="checkbox" onClick="desactivar(this)"></th>
      </tr>
    </tbody>
    
    <tbody>
      <tr>
        <th>Nombre</th>
        <th><input name="nom" type="text" class="form-control" disabled id="nom"></th>
        <th><input type="checkbox" name="checkbox2" value="checkbox" onClick="desactivar2(this)"></th>
      </tr>
    </tbody> 
		</table>	 
			 
					<tr>
					  <th><div align="center"><br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
						<input type="submit" name="Submit" class="btn btn-primary" value="Buscar         ">
						<input type="reset" name="Submit2" class="btn btn-primary"  value="Cancelar                     " onClick="activar(this)">
						<input name="button" type="button" class="btn btn-primary" onClick="cerrarVentana()" value="Cerrar       ">
						<input name="catalogo" type="hidden" id="catalogo" value="22">
						</div></td>
					  </tr>
				  </table></td>
				</tr>
			
		</form>
		  </fieldset>
		</div>
	  </div>
	</div>
	</body> 
</html> 
