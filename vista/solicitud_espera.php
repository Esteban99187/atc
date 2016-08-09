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
  require_once("../modelo/class_solicitud.php");
  $us = new class_solicitud;
  


?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Solicitudes en Espera</div>
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<table class="table  table-striped table-hover">
						<thead>
							<tr>
								<th>Nro</th>
								<th>RIF</th>
								<th>Cliente</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Precio por Unidad</th>
								<th>Unidades Requeridas</th>
								<th>Precio Total</th>
								<th>Aceptar</th>
								<th>Rechazar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$us->listar_solicitud_espera($idclienteusuario);
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<script language="javascript">
function aceptar_orden_carga(id){
  if (confirm('Esta seguro de confirmar esta solicitud?')) {
  window.location='admin.php?url=solicitud_procesada&id='+id;
  }else{
  alert('Se ha cacelado la accion');  
  }
}
function anular_orden_carga(anu){
  if (confirm('Esta seguro de anular esta solicitud?')) {
  window.location='admin.php?url=solicitud_procesada&anu='+anu;
  }else{
  alert('Se ha cacelado la accion');  
  }
}
	</script>
