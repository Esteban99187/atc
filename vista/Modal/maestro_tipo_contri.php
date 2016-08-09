<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25"> 
	<div class="chat-inner"> 
		<h2 class="chat-header">
			<a href="#" class="chat-close">
				<i class="entypo-cancel"></i>
			</a>
			Consulta Tipo Contribuyente<span class="badge badge-success is-hidden">0</span></h2> 
			<form method="POST" action="../controlador/ControladorBuscarAjax.php" id="envio_Modal" name="envio_Modal">
				<div class="row">
					<br>
					<div class="form-group col-lg-1"></div>
					<div class="form-group col-lg-10">
						<input type="text" class="form-control" onkeypress="return soloLetra(event)" onkeyup="BuscarAjaxtipocontri(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxtipocontri('')" name="est1" value="1" id="est1"/> Activo
					</div>
					<div class="form-group col-lg-4"><input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxtipocontri('')" name="est1" value="0" id="est2"/> Inactivo 
					</div>
				</div>
				<?php 
					include_once("../modelo/ModeloBuscarAjax.php"); 
					$obj_estado = new ModeloBuscarAjax();
					$tupla = $obj_estado->ConsultarTodotipocontri();
					$c = 1;
					$contenido = "";
				?>
				<div class="chat-group" id="group-1"> 
				<table class="table table-bordered datatable">
					 <thead> 
						<tr>
							<th>Tipo Contribuyente</th> 
							<th>Estatus</th>
						</tr> 
					 </thead>			
					<tbody id="datosAjax">
					<?php 
						while($rs = $obj_estado->gettipocontri($tupla))
						{
							if($rs["estatus_tipcont"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
							$id = $rs["idtipo_contribuyente"];
							$des = $rs["desc_tipo_cont"];
							$est = $rs["estatus_tipcont"];
							$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$est')>
											<td> ".$rs['desc_tipo_cont']."</td>
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
			window.location='../vista/admin.php?url=maestro_tipo_contri&liidtipo_contribuyente='+valor+'&lsdesc_tipo_cont='+desc+'&lsestatus_tipcont='+est+'&lihay=1&lsoperacion=buscar';
	}

</script>


