<?php require_once("../controlador_alberto/reportes.php") ?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Repuesto</div>
		<form method="post">
			<table class="table">
				<tr>
					<td>Tipo de Reporte</td>
					<td>
						<select name="txtPor" id="" class="form-control" onchange="cambiarTipo(this.value)">
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
						<select name="txtTipoReporte" id="tipoReporte" class="form-control" onchange="activarparametro(this)">
							<option value="">Seleccione el Parametro</option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="150"><span id="parametro">Nro de Entrada</span></td>
					<td>
						<input type="text" name="txtIdParametro" class="form-control" id="idparametro" disabled="">
					</td>
				</tr>
				<tr>
					<td>Producto</td>
					<td style="position: relative">
						<input type="text" name="txtProducto"  onkeyup="buscarProducto(this.value)" class="form-control" id="producto" disabled>
						<input type="hidden" id="codigo" name="codigo">
						<div id="ajax" class="ajax" style="position: absolute"></div>
					</td> 
				</tr>
				<tr>
					<td>Fecha</td>
					<td>
						<input type="text" id="datepicker" class="form-control" name="txtFecha" onkeypress="return false" readonly>
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
		opcion1 = "<option value=''> SELECCIONE </option><option value='1'> INVENTARIO INICIAL </option><option value='2'> AJUSTE POR ENTRADA </option><option value='3'> NÚMERO DE ENTRADA </option> <option value='4'> HISTORIAL </option>";
		opcion2 = "<option value=''> SELECCIONE </option><option value='1'> FECHA DE VENCIMIENTO </option><option value='2'> DAÑOS </option> <option value='3'> NOTA DE SALIDA </option> <option value='4'> HISTORIAL </option>";
		opcion3 = "<option value=''> SELECCIONE </option><option value='1'> INVENTARIO INICIAL </option><option value='2'> AJUSTE POR ENTRADA </option><option value='3'> FECHA DE VENCIMIENTO </option> <option value='4'> DAÑOS </option> <option value='5'> TODOS </option>";

		if(tp==1){ $("#tipoReporte").html(opcion1); $("#producto").attr("disabled",false); }
		else if(tp==2){ $("#tipoReporte").html(opcion2); $("#producto").attr("disabled",false); }
		else if(tp==3){ $("#tipoReporte").html(opcion3); $("#producto").attr("disabled",true); }
	}
	
	function activarparametro(_this){
		texto = _this.options[_this.selectedIndex].text;
		$("#idparametro").attr("disabled",false);
		$("#producto").attr("disabled",false);
		if(texto=="NÚMERO DE ENTRADA"){
			$("#parametro").html("Nro de Entrada");
			$("#producto").attr("disabled",true);
		}else if(texto=="NOTA DE SALIDA"){
			$("#parametro").html("Nota de Salida");
			$("#producto").attr("disabled",true);
		}else{
			$("#idparametro").attr("disabled",true);
		}
	}
</script>