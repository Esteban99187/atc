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
  require_once("../modelo/class_usuarioatc.php");
  $us = new class_usuarios;
  if(isset($_GET["edit"])){
  if($us->RevisionUsoPerfil($_GET["edit"])){
  $cadena = $us->RecibirDatos($_GET["edit"]);
  }else{
   echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=13"</script>';
  }  
}
	if(isset($_GET["id"]))
	{
		
			//~ if($b->addActividad(3,'solicitud',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
			//~ {

				if($us->VerificarUsuario($_GET["id"]))
				{
					echo '<script>alert("Usuario Verificado Correctamente");</script>';
				}
			
		//~ }
		//~ else
		//~ {
			//~ echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=12"</script>';
		//~ }
	}
	if(isset($_GET["anu"]))
	{
		
			//~ if($b->addActividad(3,'solicitud',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
			//~ {

				if($us->RechazarUsuario($_GET["anu"]))
				{
					echo '<script>alert("Usuario Eliminado Correctamente");</script>';
				}
			
		//~ }
		//~ else
		//~ {
			//~ echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=12"</script>';
		//~ }
	}
	if(isset($_GET["rea"]))
	{
		if($us->RevisionUsoPerfil($_GET["rea"]))
		{
			if($b->addActividad(12,'perfil',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
			{
				if(isset($_GET["acc"]) and $_GET["acc"] == 'r')
				{
					$estatus = 1;
					$mn = 9;
				}
				else if(isset($_GET["acc"]) and $_GET["acc"] != 'r')
				{
					$estatus = 0;
					$mn = 7;
				}
				if($b->EliminacionLogica('tperfiles',$estatus,$_GET["rea"],'idPerfil'))
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av='.$mn.'"</script>';
				}
				else
				{
					echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=8"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=12"</script>';
		}
	}
?>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><div class="panel-title">Usuarios Por Verificacion</div></div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Usuario</th>
								<th>Cedula</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Rif</th>
								<th>Aceptar</th>
								<th>Rechazar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$us->ListaVerificarUsuario();
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>




<script language="javascript">
function VerificarUsuario(id){
  if (confirm('Esta seguro que desea Aprobar este Usuario?')) {
  window.location='admin.php?url=VerificarUsuario&id='+id;
  }else{
  alert('Se ha cacelado la accion');  
  }
}
function RechazarUsuario(anu){
  if (confirm('Esta seguro que desea Rechazar este Usuario?')) {
  window.location='admin.php?url=VerificarUsuario&anu='+anu;
  }else{
  alert('Se ha cacelado la accion');  
  }
}
	</script>
