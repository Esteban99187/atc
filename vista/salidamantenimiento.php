<?php 	
	include_once("../controlador_alberto/corSalidaMantenimiento.php");
	include_once("componentes_alberto.php");
	require_once("../modelo_alberto/clsGenerarCombo.php");
	$combo = new CombosDinamicos;
	$i = 0;
?>
<link rel="stylesheet" type="text/css" href="public/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="public/css/bootstrap-select.min.css">
<script type="text/javascript" src="public/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="public/js/bootstrap-datepicker.es.min.js"></script>
<style type="text/css">
	.ajax{
	    background: white; 
	    display: none;
	    border: 1px solid #ccc;
	    border-top: none;
	    z-index: 50; position: absolute; top: 38px; height: auto; width: 400px;
	}
	.ajax a{
	    display: block;
	    padding: 6px;
	    color: black;
	    text-transform: uppercase;
	    text-decoration: none;
	    border-bottom: 1px solid #aaa;
	}
	.ajax a:hover{
	    background: #ddd;
	}
</style>
<div id='contenedor_formulario' >
	<div id='titulo_form'>Salida de la Unidad</div>
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
				<td><span id="modelo"></span></td>
				<td><span id="km"></span> </td>
			</tr>
			<tr>
				<td>Mecánico</td>
			</tr>
			<tr>
				<td> <span id="mecanico"></span> </td>
			</tr>
			<tr>
				<td>Fecha de Salida</td>
				<td>Hora de Oficina</td>
				<td>Hora de Vigilancia</td>
			</tr>
			<tr>
				<td> <input type="text" name="txtFechaSalida" id="fechaSalida"> </td>
				<td> <input type="text" name="txtHoraOficina" id="txtHoraOficina" readonly > </td>
				<td> <input type="text" name="txtHoraVigilancia" id="horaVigilancia"> </td>
			</tr>
		</table>
		<div>
			<div id='titulo_form' style="border:1px solid black !important;">Repuestos Utilizados</div>
			<table width="100%" class="transaccion">
				<thead>
					<tr>
						<th>Nro</th>
						<th>Repuesto</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody id="repuestosutilizados" style="text-transformation: uppercase">

				</tbody>
			</table>
		</div>
		<br>		
		<ol id='botonera'>
			<li><input type='submit' class='grabar' name='evento'  id='incluir' value='Guardar' ></li>
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
					window.open("../reportes/salidaMantenimiento.php?nroOrden="+<?php echo $nroOrdenRegistrado ?>+" ");
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
			$.post("../controlador_alberto/corMantenimiento.php",{evento:"busquedaRapida",valor:dato,estatus:2},function(data){
				if(dato=!"") {
					console.log(data);
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
		}
	}
	function buscarRepuestosUtilizados(nroOrden){
		$.get("../controlador_alberto/corMantenimiento.php",{evento:"buscarRepuestosOrden",valor:nroOrden},function(data){
			console.log(data);
			datos = JSON.parse(data);
			tabla = document.getElementById("repuestosutilizados");
			a = 1;
			for(var datum in datos){
				tr = tabla.insertRow(-1);
				td0 = tr.insertCell(0);
				td1 = tr.insertCell(1);
				td2 = tr.insertCell(2);
				td0.innerHTML = "<input type='hidden' value='"+datos[datum][0]+"' name='repuestoUtilizado[]'>"+parseInt(a);
				td1.innerHTML = datos[datum][1];
				td2.innerHTML = "<input type='hidden' value='"+datos[datum][2]+"' name='cantidadRepuesto[]'>"+datos[datum][2];
				a++;
			}
		});
	}
	function colocarO(objeto,valor) {
        divAjax.style.display="none";
        divAjax.innerHTML="";
        document.getElementById("ordenNro").value=objeto.idmantenimiento;
        document.getElementById("placa").innerHTML=objeto.placa;
        document.getElementById('modelo').innerHTML=objeto.modelo;
        buscarKm(objeto.placa);
        //sbuscarFallas(objeto.idunidad);
        buscarRepuestosUtilizados(objeto.idmantenimiento);
    }    
    function buscarKm(placa){
		var valor = "buscar_kilometraje_diario";
		//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){
			console.log("KM: "+data);
			if(data!=""){
				$("#km").html(data);		
			}else{
				$("#km").html(0);	
			}
		});
    }
    $('#fechaSalida').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-2d',
        endDate: '-0d',
        language: "es",
        orientation: "top left",
        todayHighlight: true,
        autoclose: true
    });
    //	Soporte para la fecha actual 
    function show5(){
		if (!document.layers&&!document.all&&!document.getElementById)
			return

		var Digital=new Date()
		var hours=Digital.getHours()
		var minutes=Digital.getMinutes()
		var seconds=Digital.getSeconds()

		var dn="PM"
		if (hours<12)
			dn="AM"
		if (hours>12)
			hours=hours-12
		if (hours==0)
			hours=12

		if (minutes<=9)
			minutes="0"+minutes
		if (seconds<=9)
			seconds="0"+seconds
		//change font size here to your desire
		myclock=hours+":"+minutes+":"+seconds+" "+dn;
		document.getElementById("txtHoraOficina").value=myclock
		setTimeout("show5()",1000)
    }
    window.onload=show5
</script>