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
  require_once("clases/class_respaldo.php");
  $us=new Respaldo;
  $datos = $us->dias_transcurridos();
?>
<div class="row spa">
<div class="col-md-6">
<?php 
include("alertas.php");
?>
<!-- PANEL FORMULARIOS -->
<div class="panel panel-default">
     <div class="panel-heading">Configuración de respaldo</div>
      <div class="panel-body">
      <form name="fConfigRespaldo" method="post" action="controlador/controlador_configuracion_respaldo.php">

        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        Respaldo automatico para el <b><?php echo $datos[1] ?></b> restan <b>
        (<?php
          echo $datos[0];
        ?>) dias
        </b>.

        </div>
        </div>  
        <div class="col-md-6">
        <div class="form-group">
        <label>Realizar respaldo automatico cada :</label>
        <select name="dias" class="form-control">
          <option value="0">Ninguno</option>
          <option value="7">Cada 7 dias a partir de <?php echo date("d/m/Y");?></option>
          <option value="15">Cada 15 dias a partir de <?php echo date("d/m/Y");?></option>
          <option value="30">Cada 30 dias a partir de <?php echo date("d/m/Y");?></option>
        </select>
        </div>
        </div>
        </div>
        <br>
        <div clas="row">
          <input type="hidden" id="myId" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
          <input type="hidden" name="id" value="<?php echo $datos[2]?>">
          <input type="submit" class="btn btn-primary" name="opt" value="Guardar"></input>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </div>
      </form>
      </div>
      </div>

<!-- SEGUNDO FORMULARIO -->

<div class="panel panel-default">
     <div class="panel-heading">Respaldar Información</div>
      <div class="panel-body">
      <form name="fHacerRespaldo" id="fPlanificacion" method="post" action="controlador/controlador_planificacion.php">

        <div class="row">  
        </div>
        <div class="row">
        <div class="col-md-12 text-center">
       ¿ Desea realizar un respaldo hoy
      <?php
      setlocale(LC_TIME, 'spanish');
      print strftime("%A %#d de %B del %Y")." a las ".date("h:i:s A")." ?
      <br> si realiza un respaldo la fecha del respaldo automatico cambiara por la fecha de hoy";
      ?>
        <div id="cargando" style="display:none; color: green;"><br>Procesando datos para el respaldo espere... <br><img src="img/carga.gif"></div>
        <br>
        <div id="destino"></div> 
        </div>
    
        </div>
    
        <br>
        <div clas="row">
          <div class="col-md-12 text-center">
          <input type="button" class="btn btn-primary" name="opt" id="HacerRespaldo" value="Respaldar informacion"></input>
        </div>
        </div>
      </form>
      </div>
      </div>


<!-- FIN DE PANEL FORMULARIOS -->

</div>

<div class="col-md-6">
  
    <!-- FIN DE OPERACIONES -->
      <div class="panel panel-default">
        <div class="panel-heading">Control de respaldo</div>
        <div class="panel-body">
        <div id="restaurarDiv" class="mygrid-wrapper-div text-center" style="height:314px;"> 
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Fecha</th>
        <th>Datos</th>
        <th>Respaldo</th>
        <th>Restaurar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $us->mostrar_respaldos();
    ?>
         </tbody>
        </table>
        </div>
        <div id="cargandoRes" style="display:none; color: green; text-align:center;"><br>Se esta retaurando el sistema espere...<br><img src="img/carga.gif"></div>
        </div>
      </div>
    </div>

</div>

<div class="modal fade" id="myModalClave">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p>Disculpe, debe ingresar clave de operaciones especiales</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
