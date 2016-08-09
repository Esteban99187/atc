<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25"> 
	<div class="chat-inner"> 
		<h2 class="chat-header">
			<a href="#" class="chat-close">
				<i class="entypo-cancel"></i>
			</a>
			<i class="entypo-users"></i>Consulta Personal<span class="badge badge-success is-hidden">0</span></h2> 
			<form method="POST" action="../controlador/ControladorBuscarAjax.php" id="envio_Modal" name="envio_Modal">
				<div class="row">
					<br>
					<div class="form-group col-lg-1"></div>
					<div class="form-group col-lg-10">
						<input type="text" class="form-control" onkeyup="BuscarAjaxpersonaatc(this.value)" placeholder="Busqueda por aproximidad" name="" id="frm-buqueda-Aprox"/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-2"></div>
					<div class="form-group col-lg-4">
						<input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxpersonaatc('')" name="est1" value="1" id="est1"/> Activo
					</div>
					<div class="form-group col-lg-4"><input type="checkbox" onclick="validarSeleccion(this.value);BuscarAjaxpersonaatc('')" name="est1" value="0" id="est2"/> Inactivo 
					</div>
				</div>
				<?php 
					include_once("../modelo/ModeloBuscarAjax.php"); 
					$obj_estado = new ModeloBuscarAjax();
					$tupla = $obj_estado->ConsultarTodopersonaatc();
					$c = 1;
					$contenido = "";
				?>
				<div class="chat-group" id="group-1"> 
				<table class="table table-bordered datatable">
					 <thead> 
						<tr>
							<th>Personal</th> 
							<th>Estatus</th>
						</tr> 
					 </thead>			
					<tbody id="datosAjax">
					<?php 
						while($rs = $obj_estado->getpersonaatc($tupla))
						{
							if($rs["estatus_con"]==1){ $status= "Activo";}else{ $status= "Inactivo"; } 
									$id = $rs["cedula"];
									$des = $rs["nombres_per"];
									$ape = $rs["apellidos_per"];
									$telfm = $rs["telefono_movil_per"];
									$telfca = $rs["telefono_casa_per"];
									$cor = $rs["correo_per"];
									$dir = $rs["direccion_habitacion_per"];
									$obs = $rs["observacion_per"];
									$cod = $rs["cod_rol"];
									$ide = $rs["idestatus"];
									$idd = $rs["iddepartamento"];
									
							$contenido.="<tr class='odd gradeX' onclick=EnviarDatos('$id','$des','$ape','$telfm','$telfca','$cor','$dir','$obs','$cod','$ide','$idd')>
											<td> ".$rs['nombres_per']."</td>
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
	function EnviarDatos(valor,des,ape,telfm,telfca,cor,dir,obs,cod,ide,idd){window.location='../vista/admin.php?url=personaatc&licedula='+valor+'&lsnombres_per='+des+'&lsapellidos_per='+ape+'&lstelefono_movil_per='+telfm+'&lstelefono_casa_per='+telfca+'&lscorreo_per='+cor+'&lsdireccion_habitacion_per='+dir+'&lsobs_academica_per='+obs+'&lscod_rol='+cod+'&lsidestatus='+ide+'&lsiddepartamento='+idd+'&lihay=1&lsoperacion=buscar';
	}

</script>


