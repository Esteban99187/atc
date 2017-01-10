<?php 	
	include_once("../controlador_alberto/corDiagnosticoMantenimiento.php");
	include_once("componentes_alberto.php");
	require_once("../modelo_alberto/clsGenerarCombo.php");
	$combo = new CombosDinamicos;
	$i = 0;
?>
<div id='contenedor_formulario' >
	<div id='titulo_form'>Diagnóstico</div>
	<form action=''  id='formulario_maestro' method='POST' autocomplete="off">
		<table width='100%' id='formulario_persona'>
			<tr>
				<td>Nro. de Orden</td>
			</tr>
			<tr>
			 	<td style="width:400px; position: relative">
			 		<input type='text' style="width: 72%" onkeyup="buscarOrden(this.value)" id="ordenNro" name="nroOrden">
			 		<div class="ajax" id="ajaxOrden">
			 		</div>
			 	</td>
			</tr>
			<tr>
				<td>Placa</td>
				<td>Modelo</td>
				<td>Km</td>
			</tr>
			<tr>
				<td><span id="placa"></span></td>
				<td><input type="hidden" id="idmodelo_unidad" name="idmodelo_unidad"><span id="modelo"></span></td>
				<td><span id="km"></span> </td>
			</tr>
			<tr>
				<td>Mecánico</td>
			</tr>
			<tr>
				<td style="position: relative">
					<input type="text" style="width: 72%" id="mecanico" onkeyup="buscarMecanico(this.value)"> <input type="hidden" name="cedMecanico" id="cedMecanico">
					<div class="ajax" id="ajaxMecanico">
						
					</div>
				</td>
			</tr>
		</table>
		<br>
		<div id='titulo_form' style="border:1px solid black !important;">Detalle</div>
		<table width='100%' id='transaccion'>
			<thead>
				<tr>
					<td>Falla</td>
					<td>Repuesto</td>
					<td>Cantidad</td>
					<td></td>
				</tr>
				<tr>
					<td><select id="falla"  style="width:200px;" onchange="buscarRepuestos(this.value)" class='nobligatorio'></select></td>
					<td><select id="repuesto" style="width:200px;" onchange="colocarMaximo(this)" class='nobligatorio'></select></td>
					<td><input id="cantidad"  type="number" min="0" onkeypress="return false" ></td>
					<td><input type="button" value="+" onclick="agregar()" class="btn btn-info"></td>
				</tr>				
			</thead>
			<tbody id="detalle">
			</tbody>
		</table>
		<ol id='botonera'>
			<li><input type='submit' class='grabar' name='evento' id='incluir' disabled="true" value='Guardar'></li>
			
		</ol>
	</form>
</div>
<?php if($guardado): ?>
	<script> 
		$(function(){
			divMensajeConfirm = document.getElementById('msjConfirm');
			btnAceptarConfirm = document.getElementById('acceptConfirm2');
			btnCancelConfirm = document.getElementById('cancelConfirm');
			mensajeConfirmar("<?php print($msj); ?>, \xbf Desea imprimir el comprobante?",function(){
				AgregarEvento(btnAceptarConfirm,"click",function(){
					window.open("../reportes/entradaMantenimiento.php?nroOrden="+<?php echo $nroOrdenRegistrado ?>+"&estatus="+<?php echo $estatus ?>+" ");
					ocultarMensaje(2);
				});

				AgregarEvento(btnCancelConfirm,"click",function(event){ 
					ocultarMensaje(2);
				});
			});
		});
	</script>
	<?php endif; ?>
<?php if(!$guardado && $msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php }; ?>
<script type="text/javascript">
	var divAjax = document.getElementById('ajaxOrden');
	function buscarOrden(dato) {
		var datosAjax="";
		if(dato==""){
			divAjax.style.display="none";
            divAjax.innerHTML="";
		}	
		if(dato!=""){
			$.post("../controlador_alberto/corMantenimiento.php",{evento:"busquedaRapida",valor:dato,estatus:1},function(data){
				if(dato=!"") {
					//console.log(data);
					datos = JSON.parse(data);
					for(var datum in datos) {
						var miobjeto = datos[datum];
	                    miobjeto2= JSON.stringify(miobjeto);
	                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarO('+miobjeto2+',"'+miobjeto.idmantenimiento+'")\'>'+miobjeto.idmantenimiento+' - Unidad: '+miobjeto.placa+' </a>';
					}
					divAjax.style.display="block";
	                divAjax.innerHTML=datosAjax;
				}else{
					divAjax.style.display="none";
	                divAjax.innerHTML="";
				}
			});
			if($('#detalle >tr').length>0)
				$("#incluir").prop("disabled",false);
		}
		else{
	        document.getElementById("ordenNro").value="";
	        document.getElementById("idmodelo_unidad").value="";
	        document.getElementById("placa").innerHTML="";
	        document.getElementById('modelo').innerHTML="";
        	$("#incluir").prop("disabled",true);
		}
	}
	function colocarO(objeto,valor) {
        divAjax.style.display="none";
        divAjax.innerHTML="";
        document.getElementById("ordenNro").value=objeto.idmantenimiento;
        document.getElementById("idmodelo_unidad").value=objeto.idmodelo_unidad;
        document.getElementById("placa").innerHTML=objeto.placa;
        document.getElementById('modelo').innerHTML=objeto.modelo;
        buscarKm(objeto.placa);
        buscarFallas(objeto.idmodelo_unidad);
    }
    function buscarFallas(idunidad){
    	$.get("../controlador_alberto/corCombos.php",{peticion:"buscarFallasModelo",data:idunidad},function(data){
    		datos = JSON.parse(data);
    		opciones = "<option value=''> Seleccione </option>";
    		
    		for(var da in datos["respuesta"]){
    			opciones += "<option value='"+datos["respuesta"][da].id+"'>"+datos["respuesta"][da].descripcion+"</option>";
    		}
    		$("#falla").html(opciones);
    	});
    }
    function buscarRepuestos(idFalla,idModeloUnidad){
    	$.get("../controlador_alberto/corCombos.php",{peticion:"buscarRepuestoConFalla",falla:idFalla,modelounidad:$('#idmodelo_unidad').val()},function(data){
    		datos = JSON.parse(data);
    		opciones = "<option value=''> Seleccione </option>";
    		for(var da in datos["respuesta"]){
    			opciones += "<option value='"+datos["respuesta"][da].id+"'>"+datos["respuesta"][da].descripcion+":"+datos["respuesta"][da].cantidad+"</option>";
    		}
    		$("#repuesto").html(opciones);
    	});	
    }
    function colocarMaximo(that){
    	_this = that;
    	valor = _this.options[_this.selectedIndex].text;
    	arrValor = valor.split(":");
    	maximo = parseInt(arrValor[1]);
    	$("#cantidad").prop("max",maximo);
    }
    function buscarKm(placa){
		var valor = "buscar_kilometraje_diario";
		//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){
			//console.log("KM: "+data);
			if(data!=""){
				$("#km").html(data);		
			}else{
				$("#km").html(0);	
			}
		});
    }
    var divAjaxM = document.getElementById('ajaxMecanico');
    function buscarMecanico(dato){
		var datosAjax="";
		if(dato!=""){
			$.post("../controlador_alberto/cormecanico.php",{evento:"busquedaRapida",valor:dato},function(data){
				if(dato=!""){
					//console.log(data);
					datos = JSON.parse(data);
					for(var datum in datos){
						var miobjeto = datos[datum];
	                    miobjeto2= JSON.stringify(miobjeto);
	                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarM('+miobjeto2+')\'>'+miobjeto.mecanico+' </a>';
					}
					divAjaxM.style.display="block";
	                divAjaxM.innerHTML=datosAjax;
				}else{
					divAjaxM.style.display="none";
	                divAjaxM.innerHTML="";
				}
			});
			if($('#detalle >tr').length>0)
				$("#incluir").prop("disabled",false);
		}
		else{
        	document.getElementById("cedMecanico").value="";
        	document.getElementById("mecanico").value="";
        	$("#incluir").prop("disabled",true);
		}
	}
	function colocarM(objeto) {
        divAjaxM.style.display="none";
        divAjaxM.innerHTML="";
        document.getElementById("cedMecanico").value=objeto.cedula;
        document.getElementById("mecanico").value=objeto.mecanico;
    }
    function elimnar(td) {
    	tr = td.parentNode;
    	tbody = tr.parentNode;
    	tr.remove(td);
    	if(tbody.rows.length<=0) $("#incluir").prop("disabled",true);
    }
    function agregar() {
    	falla = document.getElementById("falla");
    	cantidad = document.getElementById("cantidad");
    	repuesto = document.getElementById("repuesto");
    	tbody = document.getElementById("detalle");
    	if(falla.value!="" && repuesto.value!="" && (cantidad.value!="" && parseInt(cantidad.value)!=0)){
    		FallaTexto = falla.options[falla.selectedIndex].text;
	    	RepuestoTexto = repuesto.options[repuesto.selectedIndex].text;
	    	arrRepuesto = RepuestoTexto.split(":");
			RepuestoTexto = arrRepuesto[0].trim();
    		//ahora veremos si existe el valor ingresado en la transaccion
	    	cant_filas = tbody.rows.length;
	        cont_existe = 0;
	        //aqui mostraremos sus textos
	        for(z=0; z<cant_filas; z++){
	       		if(document.all){
	       			if(tbody.rows[z].cells[0].childNodes[0].innerText == FallaTexto && tbody.rows[z].cells[1].childNodes[0].innerText==RepuestoTexto){
		              	cont_existe++;
		           	}
		       	}else{
		       		if(tbody.rows[z].cells[0].childNodes[0].textContent == FallaTexto && tbody.rows[z].cells[1].childNodes[0].textContent==RepuestoTexto){
		              	cont_existe++;
		           	}
		       	}
	        }
	    	if(cont_existe==0){
		    	tr = tbody.insertRow(-1);
		    	td0 = tr.insertCell(0);
		    	td1 = tr.insertCell(1);
		    	td2 = tr.insertCell(2);
		    	td3 = tr.insertCell(3);

		    	td0.innerHTML = "<span>"+FallaTexto+"</span> <input type='hidden' name='txtFalla[]' value='"+falla.value+"'>";
		    	td1.innerHTML = "<span>"+RepuestoTexto+"</span> <input type='hidden' name='txtRepuesto[]' value='"+repuesto.value+"'>";
		    	td2.innerHTML = "<span>"+cantidad.value+"</span> <input type='hidden' name='txtCantidad[]' value='"+cantidad.value+"'>";
		    	td3.innerHTML = "<input type='button' class='btn btn-warning' onclick='elimnar(this.parentNode)' style='width:50px;' value='X'>";

		    	document.getElementById("falla").value="";
				document.getElementById("cantidad").value="";
				document.getElementById("repuesto").value="";
				validar();
		    }else{
		    	crearMsj("la Falla: "+FallaTexto+" Ya existe con el Repuesto: "+RepuestoTexto+" Asignado");
		    }

	    }else if(parseInt(cantidad.value)==0){
	    	RepuestoTexto = repuesto.options[repuesto.selectedIndex].text;
	    	arrRepuesto = RepuestoTexto.split(":");
			RepuestoTexto = arrRepuesto[0].trim();
	    	crearMsj("La cantidad debe ser mayor que 0, actualice el inventario del repuesto "+RepuestoTexto);
	    }
	    else{
	    	crearMsj("por favor escriba todo los datos para agregar");
	    }
    }
    function validar(){
    	if($('#ordenNro').val()==""){
    		crearMsj("Debe seleccionar una Orden");
    		$("#incluir").prop("disabled",true);
    	}else if($('#mecanico').val()==""){
    		crearMsj("Debe seleccionar un Mecánico");
    		$("#incluir").prop("disabled",true);
    	}
    	else
    		$("#incluir").prop("disabled",false);
    }
</script>