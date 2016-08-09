<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25"> 
	<div class="chat-inner"> 
		<h2 class="chat-header">
			<a href="#" class="chat-close">
				<i class="entypo-cancel"></i>
			</a>
			Consulta Tabulador<span class="badge badge-success is-hidden">0</span></h2> 
			<form method="POST" action="../controlador/ControladorBuscarAjax.php" id="envio_Modal" name="envio_Modal">
				<div class="row">
					<br>
					<div class="form-group col-lg-1"></div>
					<div class="form-group col-lg-10">
						<input type="text" class="form-control" onkeypress="return soloLetra(event)" onkeyup="BuscarAjaxTabulador(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxTabulador('')" name="est1" value="1" id="est1"/> Activo
					</div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxTabulador('')" name="est1" value="0" id="est2"/> Inactivo 
					</div>
				</div>
			</form>
				<?php 
					include_once("../modelo/ModeloBuscarAjax.php"); 
					$obj_estado = new ModeloBuscarAjax();
					$tupla = $obj_estado->ConsultarTodoTabulador();
					$c = 1;
					$contenido = "";
				?>
				<div class="chat-group" id="group-1"> 
				<table class="table table-bordered datatable">
					 <thead> 
						<tr>
							<th>Ciudad Origen</th> 
							<th>Ciudad Destino</th>
							<th>Via</th>
							<th>Estatus</th>
						</tr> 
					 </thead>			
					<tbody id="datosAjax">
					<?php 
						while($rs = $obj_estado->gettabulador($tupla))
						{
							if($rs["estatus_tab_vto"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
							$id = $rs["IdVTabuladorOrigen"];
							$des = $rs["ciudad_origen_vto"];
							$ori = $rs["ciudad_destino_vtd"];
							$est = $rs["estatus_tab_vto"];
							$contenido.="
								

										<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$ori','$est')>
											<td> ".$rs['ciudad_origen_vto']."</td>
											<td> ".$rs['ciudad_destino_vtd']."</td>
											<td> ".$rs['via_vto']."</td>
											<td> <span id='".$status."'>".$status." </span></td>
										</tr>
										";
							$c++; 
						}
						if($contenido!="")
							echo $contenido;
						else
							echo "<td colspan='6'> <span class='no-hay-datos-mostrar'>NO HAY DATOS PARA MOSTRAR</span> </td>"; ?>
					</tbody>
					<input type="hidden" name="ident">
				</table>
				</div>
<form method='post' name='fbuscartabulador' action='../controlador/control_maestro_tabulador.php'>
<input type='hidden' name='txtoperacion' value='buscar'>
<input type='hidden' name='txtidtabulador' value=''>
</form>
		</div> 
	</div>
</div>
<script type="text/javascript">

	function EnviarDatos(valor,desc,ori,est){
			lof=document.fbuscartabulador;
			lof.txtidtabulador.value=valor;
			lof.submit();
	}

</script>
