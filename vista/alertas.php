<?php 
  if(isset($_GET["av"]) and $_GET["av"] == 1){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> Registro correcto.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 2){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> Registro modificado.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 3){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> Registro eliminado.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 4){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> Su solicitud fue enviada.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 5){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Disculpe!</strong> Ocurrio un error con su solicitud.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 6){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> se ha asignado la inspección correctamente.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 7){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> la solicitud ha sido negada.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 8){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> Inspeccion modificada correctamente
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 9){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Disculpe!</strong> Ocurrio un error.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 10){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Exito!</strong> se realizo el respaldo automatico con exito
          </div>';
        }else if(isset($_GET["av"]) and $_GET["av"] == 11){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Disculpe!</strong> Esta empresa ya tiene una solicitud pendiente.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 12){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Disculpe!</strong> Este numero de cedula <b>'.$_GET["c"].'</b> ya existe en la base de datos.
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 13){
    echo '<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          SU CONTRSEÑA FUE ENVIADA A SU CORREO
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 14){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          OCURRIO UN ERRO CON EL PROCESO
          </div>';
  }else if(isset($_GET["av"]) and $_GET["av"] == 15){
    echo '<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          RESPUESTAS INCORRECTAS
          </div>';
  }
?>