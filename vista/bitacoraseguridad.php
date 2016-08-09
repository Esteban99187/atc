<?php
require_once("../modelo/class_reportes.php");
$rep = new Reportes;
?>
<div clas="row">
	<form name="busqueda" class="form-inline">
			<div class="input-group">
  			
			</div>
	</form>
</div>
</br>
<div id="busquedadiv">
<table class="table" >
	<tr>
    <th>#</th>
	<th>Fecha</th>
	<th>Cedula</th>
	<th>Nombre</th>
	<th>IP</th>
	<th>Actividad</th>
	<th>Hora</th>
	<th>Modulo</th>
	</tr>
	<?php
		$rep->ActividadBitacora('s');
	?>
</table>
</div>
