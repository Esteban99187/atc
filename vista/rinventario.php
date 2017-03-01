<?php require_once("../controlador_alberto/reportes.php") ?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Repuesto</div>
		<form method="post">
			<table class="table">
				<tr>
					<td>Tipo de Reporte</td>
					<td>
						<select name="txtPor" id="" class="form-control" onchange="cambiarTipo(this.value)" required>
							<option value="">Seleccione el Parametro</option>
							<option value="1">Entrada</option>
							<option value="2">Salida</option>ç
							<option value="3">Todos(Historial)</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="150">Por: </td>
					<td>
						<select name="txtTipoReporte" id="tipoReporte" class="form-control" required>
							<option value="">Seleccione el Parametro</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Fecha Desde</td>
					<td>
						<input type="date" id="datepicker" class="form-control" name="txtFechaDesde">
					</td>
				</tr>
				<tr>
					<td>Fecha Hasta</td>
					<td>
						<input type="date" id="datepicker" class="form-control" name="txtFechaHasta">
					</td>
				</tr>
			</table>
			<div class="row">
				<div class="col-md-12">
					<button class="btn-sm btn-primary" type="submit" name="evento" value="GenerarMovimiento">Generar</button>
				</div>
			</div>
			<div class="row">
				<div class="pull-right">
					<div id="grafica"></div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function cambiarTipo(tp){
		opcion1 = "<option value=''> SELECCIONE </option><option value='1'> INVENTARIO INICIAL </option><option value='2'> AJUSTE POR ENTRADA </option><option value='3'> REQUISICIÓN </option> <option value='4'> NRO ENTRADA </option> <option value='5'> HISTORIAL </option>";
		opcion2 = "<option value=''> SELECCIONE </option><option value='1'> ROBO O PERDIDA </option><option value='2'> DAÑOS </option> <option value='3'> MANTENIMIENTO PREVENTIVO A UNIDAD </option> <option value='4'> REPARACIÓN A UNIDAD </option> <option value='5'> HISTORIAL </option>";
		opcion3 = "<option value=''> SELECCIONE </option><option value='5'> TODOS </option>";

		if(tp==1){ $("#tipoReporte").html(opcion1); $("#producto").attr("disabled",false); }
		else if(tp==2){ $("#tipoReporte").html(opcion2); $("#producto").attr("disabled",false); }
		else if(tp==3){ $("#tipoReporte").html(opcion3); $("#producto").attr("disabled",true); }
	}
</script>