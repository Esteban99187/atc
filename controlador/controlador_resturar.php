<?php
	require_once("../clases/class_respaldo.php");
	require_once("../clases/class_bitacora.php");
	$b = new bitacora;
	$res = new Respaldo;
	$datos = $res->detalleRespaldo($id);

	echo '<h3>Ud. a decidido restaurar el sistema verifique la siguiente información </h3>

		
			Punto de restauracion : <b>'.$datos[0].'</b><br>
			Archivo de datos : <b>'.$datos[1].'</b><br>
			Esta restauracion fue : <b>'.$datos[2].'</b><br>
<form id="fRestaurar" name="fRestaurar">
	  <div class="alert alert-danger fade in" role="alert">
      <h4><b>Aviso importante!</b></h4>
      <p>Despues de terminar el proceso, el sistema cerrara su sesion para que ingrese nuevamente al sistema</p>
      <p>
        <button type="button" class="btn btn-danger" onClick="accionRestaurar('.$id.')">Restaurar sistema</button>
        <button type="button" class="btn btn-default">Cerrar</button>
      </p>
    </div>
</form>
	';
?>