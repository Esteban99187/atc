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
  require_once("../modelo/class_reportes.php");
  $us = new Reportes;
  if(isset($_GET["edit"])){
  if($us->RevisionReporte($_GET["edit"])){
  $cadena= $us->datosRerporte($_GET["edit"]);
  }else{
   echo '<script>window.location="admin.php?url=roles&tipo=1&av=13"</script>';
    }
  }

  if(isset($_GET["del"])){
      if($us->RevisionReporte($_GET["del"])){
      if($b->addActividad(3,5,$_SESSION["idUsuario"])){
      if(isset($_GET["acc"]) and $_GET["acc"] == 'r'){
        $estatus = 1;
        $mn = 9;
      }else if(isset($_GET["acc"]) and $_GET["acc"] != 'r'){
        $estatus = 0;
        $mn = 7;
      }
      if($b->EliminacionLogica('treportes',$estatus,$_GET["del"],'idReporte')){
      echo '<script>window.location="admin.php?url=crearReportes&tipo=1&av='.$mn.'"</script>';
      }else{
      echo '<script>window.location="admin.php?url=crearReportes&tipo=1&av=8"</script>';
      }
      }
    }else{
      echo '<script>window.location="admin.php?url=roles&tipo=1&av=12"</script>';
    }
  }
?>
<div class="row spa">
<div class="col-md-4">
<!-- PANEL FORMULARIOS -->
      <div class="panel panel-default">
     <div class="panel-heading">Crear reportes</div>
      <div class="panel-body">
      <form name="fRoles2" id="fRoles2" method="post" action="../controlador/controlador_reportes.php">

        <div class="row">
        <div class="col-lg-12">
        <div class="form-group">
        <label>Nombre del reporte:</label>
        <input type="text" name="nombreReporte"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[0]; } ?>"/>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group">
        <label>Url:</label>
        <input type="text" name="url"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[1]; } ?>"/>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
        <div class="form-group">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control"><?php if(isset($cadena)){ echo $cadena[2]; } ?></textarea> 
        </div>
        </div>
        </div>
        <br>
        <div class="row">
			<center>
          <input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
          <input type="hidden" name="id" value="<?php if(isset($_GET['edit'])){ echo $_GET['edit'];}?>">
          <input type="submit" class="btn btn-lg btn-primary" name="opt" value="<?php if(isset($cadena)){ echo "Modificar";}else{ echo "Registrar"; } ?>"></input>
          <button type="reset" class="btn btn-lg btn-primary" onclick="cancelar('crearReportes')">Cancelar</button>
			</center>
        </div>
      </form>
      </div>
      </div>


<!-- FIN DE PANEL FORMULARIOS -->

</div>

<div class="col-md-8">
    <!-- BITACORA DE OPERACIONES -->
     <div class="panel panel-default">
        <div class="panel-heading">Ultima actividad realizada</div>
        <div class="panel-body"><i class="glyphicon glyphicon-pencil">- </i> <?php $b->ShowBitacora(); ?></div>
      </div>
    <!-- FIN DE OPERACIONES -->
      <div class="panel panel-default">
        <div class="panel-heading">Reporte registrados</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Reporte</th>
        <th>Url</th>
        <th>Editar</th>
        <th>Desactivar/Activar</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $us->listarReportes();
    ?>
    </tbody>
  </table>
        </div>
      </div>
    </div>
</div>
