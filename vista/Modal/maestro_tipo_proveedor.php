<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25"> 
	<div class="chat-inner"> 
		<h2 class="chat-header">
			<a href="#" class="chat-close">
				<i class="entypo-cancel"></i>
			</a>
			Consulta Tipo de Proveedor<span class="badge badge-success is-hidden">0</span></h2> 
			<form method="POST" action="../controlador/ControladorBuscarAjax.php" id="envio_Modal" name="envio_Modal">
				<div class="row">
					<br>
					<div class="form-group col-lg-1"></div>
					<div class="form-group col-lg-10">
						<input type="text" class="form-control" onkeypress="return soloLetra(event)" onkeyup="BuscarAjaxtipoproveedor(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxtipoproveedor('')" name="est1" value="1" id="est1"/> Activo
					</div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxtipoproveedor('')" name="est1" value="0" id="est2"/> Inactivo 
					</div>
				</div>
				<?php 
					include_once("../modelo/ModeloBuscarAjax.php"); 
					$obj_estado = new ModeloBuscarAjax();
					$tupla = $obj_estado->ConsultarTodotipoproveedor();
					$c = 1;
					$contenido = "";
				?>
				<div class="chat-group" id="group-1"> 
				<table class="table table-bordered datatable">
					 <thead> 
						<tr>
							<th>Tipo de Proveedor</th> 
							<th>Estatus</th>
						</tr> 
					 </thead>			
					<tbody id="datosAjax">
					<?php 
						while($rs = $obj_estado->gettipoproveedor($tupla))
						{
							if($rs["estatus_tippro"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
							$id = $rs["idtipo_proveedor"];
							$des = $rs["desc_tipo_prov"];
							$est = $rs["estatus_tippro"];
							$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
											<td> ".$rs['desc_tipo_prov']."</td>
											<td> <span id='".$status."'>".$status." </span></td>
										</tr>";
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
			</form>
		</div> 
	</div>
</div>
<script type="text/javascript">

	function EnviarDatos(valor,desc,est){
			window.location='../vista/admin.php?url=maestro_tipo_proveedor&liidtipo_proveedor='+valor+'&lsdesc_tipo_prov='+desc+'&lsestatus_tippro='+est+'&lihay=1&lsoperacion=buscar';
	}

</script>


