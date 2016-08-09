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
	$idTrabajador = isset($_POST['idTrabajador']) ? $_POST['idTrabajador'] : null;
	$cadena = isset($_POST['cadena']) ? $_POST['cadena'] : null;
	require_once("../modelo/class_usuarios.php");
	require_once("../modelo/class_personal.php");
	require_once("../modelo/class_selects.php");
	$us=new usuariosex;
	$sl=new selects;
	$pr=new usuarios;
	if(isset($_POST["idTrabajador"]))
	{
	  if($us->recibir_datos($_POST["idTrabajador"]))
	  {
		$cadena= $us->getdatos_array();
	  }
	}

	if(isset($_GET["act"]) and isset($_GET["ect"]))
	{
		if($us->ActivarUsuario($_GET["act"],$_GET["ect"]))
		{
			echo '<script>window.location="admin.php?url=desactivarusuario&av=10"</script>';
		}
		else
		{
			echo '<script>window.location="admin.php?url=desactivarusuario&av=8"</script>';
		}
	}
?>
<div class="row spa">
<div class="col-md-6">
<!-- PANEL FORMULARIOS -->
      <div class="panel panel-default">
     <div class="panel-heading"><div class="panel-title">Desactivar o activar usuario</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-xs-8">
          <label>Seleccione un trabajador:</label>
        </div>
        </div>
        <form name="buscarPersonal" action="#" method="post">
        <div class="row">
        <div class="col-xs-12">
        <div class="input-group">
        <select name="idTrabajador" class="form-control">
                  <?php
                    $sl->selectUsuariosInternos();
                  ?>
              </select> 
        <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Seleccionar</button>
        </span>
        </div><!-- /input-group -->
        </div>
        </div>
        </form>
         <form name="formUsuarios" id="fUsuarios" method="post" action="../controlador/controlador_usuario.php">
        <br>
        <div class="row">
        <div class="col-xs-12">
        <div class="form-group">
        <label>Nombre de Usuario :</label>
        <input type="text" name="nombre" id="nombre"  class="form-control" value="<?php echo strtoupper($idTrabajador); ?>" disabled /></td>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6">
        <div class="form-group">
        <label>Nombre :</label>
        <input type="text" name="nombre" id="nombre"  class="form-control" value="<?php echo strtoupper($cadena[0]); ?>" disabled /></td>
        </div>
        </div>
        <div class="col-xs-6">
        <div class="form-group">
        <label>Apellido :</label>
        <input type="text" name="apellido" id="apellido"   class="form-control" value="<?php echo strtoupper($cadena[1]);?>" disabled/></td>
        </div>
        </div>
        </div>

        <hr></hr>
        <div class="row">
          <div class="col-xs-12">
            <label>Seleccione un motivo o razon :</label>
            <select name="motivo" class="form-control">
                  <?php
                    $sl->selectMotivoRazon(2);
                  ?>
              </select> 
          </div>
        </div>  

        <br>
        <div clas="row">
           <input type="hidden" name="envio" value="b">
           <input type="hidden" name="tipo" value="2">
           <input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
          <input type="hidden" name="idTrabajador" value="<?php echo $_POST["idTrabajador"]; ?>">
          <input type="submit" class="btn btn-primary" name="opt" value="Desactivar"></input>
          <button type="reset" class="btn btn-primary" onclick="cancelar('desactivarusuario')">Cancelar</button>
        </div>
        <div id="alertasValid"></div>
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
				<div class="panel-heading"><div class="panel-title">Usuarios Desactivados</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
				<div class="panel-body">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Nro</th>
							<th>Usuario</th>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$us->listar_usuarios_desactivados()
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
  
