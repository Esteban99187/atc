<?php 
	include_once("../modelo_alberto/clsGenerarCombos.php");
    $comboPg = new CombosDinamicos;
    require_once("../controlador_alberto/corasalida.php");
	include_once("componentes_alberto.php");
?>

<div id='contenedor_formulario' >
	<div id='titulo_form'>Salida de productos de inventario</div>
	<form method="post">
		<table class="table">
			<tr>
				<td style="width: 180px;"><b>Tipo de producto: </b></td>
				<td>
					<select title="Seleccione el tipo de producto" name="txtTipoProducto" id="tipoproducto" class="form-control requerido" onchange="mostrarTabla(this.value)">
						<option value="">Seleccione una Opción</option>
						<option value="1">Repuesto</option>
						<option value="2">Lubricante</option>
					</select>
				</td>
				<td style="width: 180px;"><b>Tipo de salida:</b></td>
				<td>
					<select name="txtOpcion" class=" show-menu-arrow form-control" data-size="10" title="Seleccione salida">
						<option value="">Seleccione una Opción</option>
						<option value="1">Robo o Perdida</option>
						<option value="2">Daños</option>
					</select>
				</td>
				<td><b>Nota de Salida: </b></td>
				<td><input type="text" name="txtNotaSalida" class="form-control requerido" title="Número de salida asignada" readonly="readonly" value="<?php if(isset($notaSalida)) echo $notaSalida ?>" style="width: 20%"></td>
			</tr>
			<!--
			<tr id="responsableTR" style="display: table-row;">
				<td><b>Responsable:</b></td>
				<td style="position: relative;">
					<input placeholder="ESCRIBA SOLO LETRAS" title="Ingrese el número de cédula o nombre del responsable de la transferencia" type="text" name="txtResponsable" class="form-control requerido" id="personal" onkeyup="buscarPersonal(this.value,0)" validar="requerido,letra,40">
					<input type="hidden" name="cedula[]" id="cedula">
						<div id="ajax" class="ajax"></div>
				</td>
			</tr>
			-->
		</table>
		<div id="GridRepuesto" style="display: none;">
			<table id="tableAddRepuesto">
				<tr>
					<td>
						<button type="button" class="btn btn-primary" value="+" onclick="agregarRepuesto()"/>
							Agregar
						</button>
					</td>
				</tr>
			</table>
			<table id="tableRepuesto" class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th>Marca</th>
	                    <th>Modelo</th>
	                    <th>Repuesto</th>
						<th>Existencia inicial</th>
						<th>Cantidad</th>
						<th>Existencia actual</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="transaccionRepuesto">
				</tbody>
			</table>
		</div>
		<div id="GridLubricante" style="display: none;">
			<table id="tableAddLubricante">
				<tr>
					<td>
						<button type="button" class="btn btn-primary" value="+" onclick="agregarLubricante()"/>
							Agregar
						</button>
					</td>
				</tr>
			</table>
			<table id="tableLubricante" class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
	                    <th>Lubricante</th>
						<th>Existencia inicial</th>
						<th>Cantidad</th>
						<th>Existencia actual</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody id="transaccionLubricante">
				</tbody>
			</table>
		</div>
		<table width="100%">
			<tr>
				<td width="100"><b>Motivo:</b></td>
				<td>
					<textarea title="Ingrese el motivo de la desincorporación" class="form-control requerido" name="txtMotivo" placeholder="Escriba el motivo de la desincorporación"></textarea>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td><button type="submit" value="incluir" name="evento" onclick="validarCamposTransaccion(event)" class="btn btn-primary">Aceptar</button></td>
			</tr>
		</table>
        <input type="hidden" name="codigoPro" >
	</form>
</div>
<script type="text/javascript">
	<?php if($guardado): ?>
	$(function(){
		divMensajeConfirm = document.getElementById('msjConfirm');
		btnAceptarConfirm = document.getElementById('acceptConfirm2');
		btnCancelConfirm = document.getElementById('cancelConfirm');
		mensajeConfirmar("Salida registrada con exito, \xbf Desea imprimir el comprobante de salida?",function(){
			AgregarEvento(btnAceptarConfirm,"click",function(){
				window.open("../reportes/rpmovimineto.php?id="+<?php echo $idMovimiento ?>+" ");
				ocultarMensaje(2);
			});
			AgregarEvento(btnCancelConfirm,"click",function(event){ 
				ocultarMensaje(2);
			});
		});
	});
	<?php endif; ?>
	var i=0;
	var ExistenciaActual = [];
	function buscarPersonal(valor,nro){
		ajax = new XMLHttpRequest();
		div = document.getElementById('ajax');
		ajax.open("POST","controlador/corpersonal.php",true);
		ajax.onreadystatechange=function(){
			if(valor!=""){
				div.style.display="block";
				if(ajax.readyState==4){
					div.innerHTML = ajax.responseText;
				}
			}else{
				div.style.display="none";
			}
		};
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("operacion=buscarPersonal&dato="+valor);
	}
	function mandarDatos(nodoPadre,json){
		nodo = nodoPadre.id;
		nod = nodo.substr(4,1);
		document.getElementById("cedula").value=json.cedula;
		document.getElementById("personal").value=json.nombre1+" "+json.apellido1;
		document.getElementById('ajax').style.display="none";
	}
	function validarCantidad(nroId,cantidad){
		total = 0;
		existencia = document.getElementById("existencia-"+nroId).value;
		if(parseInt(cantidad)>parseInt(existencia)){
			alert("la cantidad no puede ser mayor a la existencia");
			document.getElementById("cantidad-"+nroId).value="";
			total = existencia;
		}else{
			total = parseInt(existencia)-parseInt(cantidad);
		}
		document.getElementById("total-"+nroId).value=total;
	}
	function comprobar(_this){
		error = 0;
		var is = 0;
		posicion = _this.id.split("-")[1];
		SelectsRepuestos = document.getElementsByClassName('selectrepuestos');

		for(sls=0;sls<SelectsRepuestos.length;sls++){
			if(sls!=posicion){
				sel = SelectsRepuestos[sls];
				if(sel.value==_this.value){
					crearMsj("Este Producto ya está Seleccionado");
					_this.value="";
					error = 1;
					break;
				}
			}
		}
		if(!error){
			existencia = _this.options[_this.selectedIndex].text.split(":")[1];
			ExistenciaActual[posicion] = existencia;
			document.getElementById("existencia-"+posicion).value=parseInt(existencia);
		}
	}
	function borrar(index){
        var parent = document.getElementById(index).parentNode;
        parent.removeChild(document.getElementById(index));
    }
	function agregarRepuesto(){
		i++;
		dis = "";
		tabla = document.getElementById('transaccionRepuesto');
		if(revisarVacios("transaccionRepuesto")){
			tr = tabla.insertRow(-1);
			tr.setAttribute("id","tr_"+i);
			td_0=tr.insertCell(0);
			td_1=tr.insertCell(1);
			td_2=tr.insertCell(2);
			td_3=tr.insertCell(3);
			td_4=tr.insertCell(4);
			td_5=tr.insertCell(5);
			td_6=tr.insertCell(6);
			
			td_0.innerHTML = "<select class='form-control' id='marca-"+i+"' onchange='buscarCombo(this.value,\"modelo\",\"modelo-"+i+"\")'> <?php $comboPg->generarCombo('SELECT * FROM tmarca_repuesto where estatus = 1 ','id_marca_repuesto','nombre_marca_repuesto'); ?> </select>";
			td_1.innerHTML = "<select class='form-control' id='modelo-"+i+"' onchange='buscarCombo(this.value,\"repuesto\",\"repuesto-"+i+"\")'></select>";
			td_2.innerHTML = '<select class="form-control selectrepuestos" id="repuesto-'+i+'" name="repuesto[]" onchange="comprobar(this)"></select>';
			td_3.innerHTML = '<input type="text" name="txtExistencia[]" readonly="readonly" class="form-control requerido" id="existencia-'+i+'">';
			td_4.innerHTML = '<input type="text" name="txtCantidad[]" onblur="validarCantidad('+i+',this.value)" id="cantidad-'+i+'" class="form-control requerido">';
			td_5.innerHTML = '<input type="text" name="txtTotal[]" id="total-'+i+'" class="form-control requerido" value="0" readonly="readonly">';
			td_6.innerHTML='<button type="button" class="btn btn-primary" value="X" onclick="borrar(\'tr_'+i+'\')"/>-</button>';
		}else{
			crearMsj("Para agregar una fila debe llenar los campos");
		}
	}

	function agregarLubricante(){
		i++;
		dis = "";
		tabla = document.getElementById('transaccionLubricante');
		if(revisarVacios("transaccionLubricante")){
			tr = tabla.insertRow(-1);
			tr.setAttribute("id","tr_"+i);
			td_0=tr.insertCell(0);
			td_1=tr.insertCell(1);
			td_2=tr.insertCell(2);
			td_3=tr.insertCell(3);
			td_4=tr.insertCell(4);
			
			td_0.innerHTML = "<select class='form-control selectrepuestos' id='lubricante-"+i+"' name='repuesto[]'  onchange='comprobar(this)'> <?php $comboPg->generarCombo('SELECT id_repuesto,nombre_repuesto||\'- STOCK:\'||stock AS nombre_repuesto FROM trepuesto_lubricante WHERE tipo_repuesto = 2 AND estatus = \'1\'','id_repuesto','nombre_repuesto'); ?> </select>";
			td_1.innerHTML = '<input type="text" name="txtExistencia[]" readonly="readonly" class="form-control requerido" id="existencia-'+i+'">';
			td_2.innerHTML = '<input type="text" name="txtCantidad[]" onblur="validarCantidad('+i+',this.value)" id="cantidad-'+i+'" class="form-control requerido">';
			td_3.innerHTML = '<input type="text" name="txtTotal[]" id="total-'+i+'" class="form-control requerido" value="0" readonly="readonly">';
			td_4.innerHTML='<button type="button" class="btn btn-primary" value="X" onclick="borrar(\'tr_'+i+'\')"/>-</button>';
		}else{
			crearMsj("Para agregar una fila debe llenar los campos");
		}
	}
	
	function validarCamposTransaccion(e) {
		var formulario = document.forms[0];
		validado = true;
		camposTotales = formulario.elements.length;
		for(var ta in formulario.elements) {
			if(hasClass(formulario.elements[ta],"requerido")) {
				if( formulario.elements[ta].value=="" || /^\s+$/.test(formulario.elements[ta].value) || formulario.elements[ta].value=="-" ) {
					formulario.elements[ta].style="border: 1px solid red";
					validado = false;
				}else{
					formulario.elements[ta].style="border: 1px solid #ccc";
				}
			}
		}
		if(document.getElementById('tipoproducto').value=='1'){
			if(!revisarVacios("transaccionRepuesto")){
				validado = false;
			}	
		}else if(document.getElementById('tipoproducto').value=='2'){
			if(!revisarVacios("transaccionLubricante")){
				validado = false;
			}
		}else
			validado = false;

		if(!validado){
			e.preventDefault();
			crearMsj("HAY CAMPOS VACIOS EN LA TRANSACCIÓN");
		}
	}
	//	Función para mostrar la tabla de repuestos o lubricantes
	function mostrarTabla(value){
		var Repuesto = "<tr id='tr_0'>"+
						"<td>"+
							"<select class='form-control requerido' id='marca' onchange='buscarCombo(this.value,\"modelo\",\"modelo-0\")'>"+
	                            "<?php $comboPg->generarCombo('SELECT * FROM tmarca_repuesto where estatus = \'1\'','id_marca_repuesto','nombre_marca_repuesto'); ?>"+
	                        "</select>"+
						"</td>"+
						"<td>"+
							"<select class='form-control requerido' id='modelo-0' onchange='buscarCombo(this.value,\"repuesto\",\"repuesto-0\")'></select>"+
						"</td>"+
						"<td>"+
							"<select class='form-control selectrepuestos requerido' id='repuesto-0' name='repuesto[]' onchange='comprobar(this)'></select>"+
						"</td>"+
						"<td>"+
							"<input type='text' class='form-control requerido' id='existencia-0' readonly='readonly' name='txtExistencia[]'>"+
						"</td>"+
						"<td>"+
							"<input title='Ingrese la cantidad de producto' placeholder='Ej:123' validar='requerido,numerico,3' type='text' class='form-control requerido'  onblur='validarCantidad(0,this.value)' id='cantidad-0' name='txtCantidad[]' value='0'>"+
						"</td>"+
						"<td>"+
							"<input type='text' class='form-control requerido' id='total-0' name='txtTotal[]' value='0' readonly='readonly'>"+
						"</td>"+
						"<td>"+
							'<button type="button" class="btn btn-primary" value="X" onclick="borrar(\'tr_0\')"/>-</button>'+
						"</td>"+
					"</tr>";
		var Lubricante = "<tr id='tr_0'>"+
						"<td>"+
							"<select class='form-control selectrepuestos requerido' id='lubricante-0' name='repuesto[]' onchange='comprobar(this)'>"+
	                            "<?php $comboPg->generarCombo('SELECT id_repuesto,nombre_repuesto||\'- STOCK:\'||stock AS nombre_repuesto FROM trepuesto_lubricante WHERE tipo_repuesto = \'2\' AND estatus = \'1\'','id_repuesto','nombre_repuesto'); ?>"+
	                        "</select>"+
						"</td>"+
						"<td>"+
							"<input type='text' class='form-control requerido' id='existencia-0' readonly='readonly' name='txtExistencia[]'>"+
						"</td>"+
						"<td>"+
							"<input title='Ingrese la cantidad de producto' placeholder='Ej:123' validar='requerido,numerico,3' type='text' class='form-control requerido'  onblur='validarCantidad(0,this.value)' id='cantidad-0' name='txtCantidad[]' value='0'>"+
						"</td>"+
						"<td>"+
							"<input type='text' class='form-control requerido' id='total-0' name='txtTotal[]' value='0' readonly='readonly'>"+
						"</td>"+
						"<td>"+
							'<button type="button" class="btn btn-primary" value="X" onclick="borrar(\'tr_0\')"/>-</button>'+
						"</td>"+
					"</tr>";
		if(value=="1"){
			$('#GridRepuesto').show();
			$('#GridRepuesto #transaccionRepuesto').append(Repuesto);
			$('#GridLubricante').hide();
			$('#GridLubricante #transaccionLubricante').empty();
		}else if(value=="2"){
			$('#GridRepuesto').hide();
			$('#GridRepuesto #transaccionRepuesto').empty();
			$('#GridLubricante').show();
			$('#GridLubricante #transaccionLubricante').append(Lubricante);
		}else{
			$('#GridRepuesto').hide();
			$('#GridRepuesto #transaccionRepuesto').empty();
			$('#GridLubricante').hide();
			$('#GridLubricante #transaccionLubricante').empty();
		}
	}
	//	Fin función
</script>
