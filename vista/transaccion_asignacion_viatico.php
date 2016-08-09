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
	include_once ("../modelo/class_asig_viatico.php");
	include_once ("../modelo/class_tabviatico.php");
	
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	$tipo_lista = (isset($_POST['tlista']))?$_POST['tlista']:3;
	$tabvia= new class_tabviatico();
	
	
	
	$viatico = new class_asig_viatico();
	
	if($tipo_lista==1)
		$listado = $viatico->asignados();
	if($tipo_lista==2)
		$listado = $viatico->sinasignar();
	if($tipo_lista==3)
		$listado = $viatico->flistar();	
	
	//print_r($listado);exit();
	
?>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script src="js/validaciones.js"></script>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Asignacion Viatico</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					
						<div class="row">
							<hr><h3><center> Ordenes de Carga </h3></center><hr>
							<form name="fasigna" id="fasigna" method="post" action="" >
							<p class="form-group col-lg-4">
								<label></label>
								<select name="tlista" id="tlista" onChange="cargar_asignacion()">
									<option value="1" <?php if($tipo_lista==1) echo 'selected' ?>>Con viatico</option>
									<option value="2" <?php if($tipo_lista==2) echo 'selected' ?> >Sin viatico</option>
									<option value="3" <?php if($tipo_lista==3) echo 'selected' ?> >Todos</option>
								</select>
							</p>
							</form>
							<hr>
							<table class="table table-striped" id="table_viatico">
								<tr>
									<td >Nro Orden</td>
									<td >Fecha</td>
									<td >Solicitud</td>
									<td >Chofer</td>
									<td>Nro Viatico</td>
									<td>Monto Asignado</td>
									<td></td>
									<td></td>
								</tr>
								<?php $i = 0 ; ?> 
								<?php if(isset($listado) && count($listado)): ?> 
									<?php foreach($listado as $val) :?>
										<tr>
											<td align="center"><?php echo $val['codigo'] ?></td>
											<td ><?php echo $val['fecha'] ?></td>
											<td ><?php echo $val['solicitud'] ?></td>
											<td ><?php echo $val['nom_chofer'].'  '.$val['ape_chofer']  ?></td>
											<td ><?php echo $val['viatico'] ?></td>
											<td><?php echo $val['monto_viatico'] ?></td>
											<td><button class="btn " onClick="fimprimir(<?php echo $val['viatico'] ?>)" ><i class="glyphicon glyphicon-print"></i></button></td>
											<td>
												<?php if($val['viatico']>0): ?>
													<button class="btn "  ><i class="glyphicon glyphicon-transfer"></i></button>
												<?php else:  ?>
													<button class="btn btn-success" onClick="flistar('<?php echo $val['codigo'] ?>')"><i class="glyphicon glyphicon-transfer"></i></button>
												<?php endif;  ?>
											</td>
											<td>
											</td>
										</tr>
									<?php endforeach; ?>
									 
								<?php endif; ?>
							</table>
							<hr>
							<div class="col-md-4 col-md-offset-4"></div>
							<div class="form-group col-lg-2 col-md-3 col-md-offset-4">
							</div>
							<br>
						</div>	
						<div class="form-group col-lg-3">
						</div> 
					
			</div>
		</div> 
	</div>
</div>				
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title"><i class="entypo-info"></i>Información
				</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div>
			</div>
			<div class="panel-body"> <div class="col-md-1">
					<i class="entypo-basket" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label> La asignacion de viaticos permite tomar las ordenes de carga y aignarle el monto en bolivares de los viaticos que seran cancelados al conductor </label>
			</div> 
		</div>
	</div> 
</div>
</div>
			
		<script src="js/validaciones.js"></script>
		
		
<script language="javascript">
	function flistar(dato)
	{
		mipopup = window.open("maestro_asignacion_viatico.php?operacion=incluir&orden_carga="+dato,"listaviatico","width=450,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fmodificar(dato)
	{
		mipopup = window.open("maestro_asignacion_viatico.php?operacion=modificar&asignacion="+dato,"listaviatico","width=450,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fimprimir(dato)
	{
		mipopup = window.open("reporte/pdfRep_asignacion_viatico.php?lsa="+dato,"listaviatico","width=950,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fayuda()
	{
		mipopup = window.open("ayuda/ayudaproducto.php","ventanaayuda","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}
	var miPopup
		function abreproducto(){
		miPopup = window.open("busqueda/buscaproducto.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
	function cargar_asignacion()
	{
		var lof=document.getElementById('fasigna');
		
		lof.submit();
	} 
</script>
