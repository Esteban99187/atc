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
  require_once("../modelo/class_roles_responsabilidades.php");
  $us = new roles;
  if(isset($_GET["edit"])){
  if($us->RevisionUsoPerfil($_GET["edit"])){
  $cadena = $us->RecibirDatos($_GET["edit"]);
  }else{
   echo '<script>window.location="admin.php?url=perfiles&tipo=1&av=13"</script>';
  }  
}
	if(isset($_GET["del"]))
	{
		if($us->RevisionUsoPerfil($_GET["del"]))
		{
			if($b->addActividad(3,'perfil',$_SESSION["idUsuario"],'sistema',$_SESSION["ip"]))
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
				if($b->EliminacionLogica('Perfil','EstatusPer',$estatus,$_GET["del"],'IdPerfil'))
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
				if($b->EliminacionLogica('Perfil','EstatusPer',$estatus,$_GET["rea"],'idPerfil'))
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
<div class="row spa">
<div class="col-md-6">
<!-- PANEL FORMULARIOS -->
      <div class="panel panel-default">
     <div class="panel-heading"><div class="panel-title">Registro de perfiles</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
      <div class="panel-body">
      <form name="fPerfiles" id="fPerfiles" method="post" action="../controlador/controlador_perfiles.php">

        <div class="row">
        <div class="col-xs-6">
        <div class="form-group">
        <label>Descripción:</label>
        <input type="text" name="perfil"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena; } ?>"/>
        </div>
        </div>
        </div>
        <br>
        <div clas="row">
          <input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
          <input type="hidden" name="id" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit'];}?>">
          <input type="submit" class="btn btn-primary" name="opt" value="<?php if(isset($cadena)){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>
          <button type="reset" class="btn btn-primary" onclick="cancelar('perfiles')">Cancelar</button>
        </div>
      </form>
      </div>
      </div>


<!-- FIN DE PANEL FORMULARIOS -->

</div>

<div class="col-md-6">
    <!-- BITACORA DE OPERACIONES -->
     <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Ultima actividad realizada</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
        <div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
      </div>
    <!-- FIN DE OPERACIONES -->
	<div class="panel panel-default">
	<div class="panel-heading"><div class="panel-title">Perfiles registrados</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div></div>
		<div class="panel-body">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Perfil</th>
						<th>Editar</th>
						<th>Desactivar/Activar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$us->listarPerfiles();
					?>
				</tbody>
			</table>
		</div>
      </div>
    </div>
</div>
