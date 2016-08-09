<?php 	
	include_once("../controlador_alberto/corMantenimiento.php");
	include_once("componentes_alberto.php");
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
	<div id='titulo_form'>Entrada de Unidad</div>
	<form action=''  id='formulario_maestro' method='POST' autocomplete="off">
		<table width='100%' id='formulario_persona'>
			<tr>
			 	<td style="width:400px;">
			 		<p>Nro. de Orden</p>
			 		<input type='text' value='<?php echo $nroOrden ?>' name="txtNroOrden" readonly>
			 	</td>
			 	<td>
			 		<p>Fecha de Entrada</p>
			 		<input type="text" name="txtFechaEntrada" id="FechaEntrada">
			 	</td>
			</tr>
			<tr>
				<td>Placa</td>
				<td>Modelo</td>
				<td>Km</td>
			</tr>
			<tr>
				<td style="position: relative">
					<input type="text" style="width: 72%" onkeyup="buscarUnidad(this.value)" id="txtplaca" name="txtplaca"><input type="hidden" name="idUnidad" id="idUnidad">
					<div id="ajaxUnidad" class="ajax">
						
					</div>
				</td>
				<td><span id="modelo"></span> </td>
				<td><span id="km"></span> </td>
			</tr>
			<tr>
				<td>Conductor</td>
			</tr>
			<tr>
				<td  style="position: relative">
					<input type="text" style="width: 72%" onkeyup="buscarConductor(this.value)" name="txtConductor" id="txtConductor"> <input type="hidden" name="cedulaConductor" id="cedConductor"> 
					<div id="ajaxConductor" class="ajax">
						
					</div>
				</td>
			</tr>
			<tr>
				<td>Observación</td>
			</tr>	
			<tr>
				<td colspan="3">
					<textarea name="txtObservacion" rows="4" style="resize: none"></textarea>
				</td>
			</tr>
		</table>
		<ol id='botonera'>
			<li><input type='submit' class='grabar' name='evento' value='Guardar'></li>
		</ol>
	</form>
</div>
<script type="text/javascript">
	var divAjax = document.getElementById('ajaxUnidad');
	var divAjaxC = document.getElementById('ajaxConductor');
	function buscarUnidad(dato){
		var datosAjax="";	
		$.post("../controlador_alberto/corunidad.php",{evento:"busquedaRapida",valor:dato,validarEntrada:1},function(data){
			if(dato!=""){
				console.log(data);
				datos = JSON.parse(data);
				for(var datum in datos){
					var miobjeto = datos[datum];
                    miobjeto2= JSON.stringify(miobjeto);
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarP('+miobjeto2+',"'+miobjeto.placa+'")\'>'+miobjeto.placa+' - '+miobjeto.modelo+' </a>';
				}
				divAjax.style.display="block";
                divAjax.innerHTML=datosAjax;
			}else{
				divAjax.style.display="none";
                divAjax.innerHTML="";
			}
		});
	}
	function colocarP(objeto,valor){
        divAjax.style.display="none";
        divAjax.innerHTML="";
        document.getElementById("idUnidad").value=objeto.idunidad;
        document.getElementById("txtplaca").value=valor;
        document.getElementById('modelo').innerHTML=objeto.modelo;
        buscarKm(objeto.placa);
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

    function buscarConductor(dato){
		var datosAjax="";	
		$.post("../controlador_alberto/corchofer.php",{evento:"busquedaRapida",valor:dato},function(data){
			if(dato!=""){
				console.log(data);
				datos = JSON.parse(data);
				for(var datum in datos){
					var miobjeto = datos[datum];
                    miobjeto2= JSON.stringify(miobjeto);
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarC('+miobjeto2+',"'+miobjeto.cedula+'")\'>'+miobjeto.cedula+' - '+miobjeto.conductor+' </a>';
				}
				divAjaxC.style.display="block";
                divAjaxC.innerHTML=datosAjax;
			}else{
				divAjaxC.style.display="none";
                divAjaxC.innerHTML="";
			}
		});
	}
	function colocarC(objeto,valor){
        divAjaxC.style.display="none";
        divAjaxC.innerHTML="";
        document.getElementById("txtConductor").value=objeto.conductor;
        document.getElementById('cedConductor').value=valor;

    }
    
</script>
<script>
    $('#FechaEntrada').datepicker({
        format: "dd-mm-yyyy",
        startDate: '-3d',
        endDate: '-0d',
        language: "es",
        orientation: "top left",
        todayHighlight: true,
        autoclose: true
    });
</script>
<?php if($msj){ ?> <script> crearMsj("<?php print($msj); ?>"); </script> <?php }; ?>