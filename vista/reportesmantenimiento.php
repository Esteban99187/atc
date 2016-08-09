<?php 	
	include_once("componentes_alberto.php");
	$i = 0;
?>
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
	<div id='titulo_form'>Reportes de Mantenimiento</div>
	<form action=''  id='formulario_maestro' method='POST' autocomplete="off">
		<table width='100%' id='formulario_persona'>
			<thead>
				<tr>
					<th colspan="2">Reportes de Entrada de Unidad</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">Nro. de Orden</td>
				</tr>
				<tr>
				 	<td style="width:400px; position: relative">
				 		<input type='text' style="width: 72%" onkeyup="buscarOrden(this.value,this,1)" id="ordenNro1" name="nroOrden">
				 		<div class="ajax" id="ajaxOrden1">
				 			
				 		</div>
				 	</td>
				 	<td>
				 		<input type="button" value="Ver Reporte" style="width:100px;" id="rpEntrada" onclick="verReporte(1)">
				 	</td>
				</tr>
			</tbody>
		</table>
		<br>
		<hr />
		<table width='100%' id='formulario_persona'>
			<thead>
				<tr>
					<th colspan="2">Reportes de Diagnóstico de Unidad</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">Nro. de Orden</td>
				</tr>
				<tr>
				 	<td style="width:400px; position: relative">
				 		<input type='text' style="width: 72%" onkeyup="buscarOrden(this.value,this,2)" id="ordenNro2" name="nroOrden">
				 		<div class="ajax" id="ajaxOrden2">
				 			
				 		</div>
				 	</td>
				 	<td>
				 		<input type="button" value="Ver Reporte" style="width:100px;" id="rpDiagnos" onclick="verReporte(2)">
				 	</td>
				</tr>
			</tbody>
		</table>
		<hr />
		<br>
		<table width='100%' id='formulario_persona'>
			<thead>
				<tr>
					<th colspan="2">Reportes de Salida de Unidad</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">Nro. de Orden</td>
				</tr>
				<tr>
				 	<td style="width:400px; position: relative">
				 		<input type='text' style="width: 72%" onkeyup="buscarOrden(this.value,this,3)" id="ordenNro3" name="nroOrden">
				 		<div class="ajax" id="ajaxOrden3">
				 			
				 		</div>
				 	</td>
				 	<td>
				 		<input type="button" value="Ver Reporte" style="width:100px;" id="rpSalida" onclick="verReporte(3)">
				 	</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<?php if($msj){ ?> <script> alert("<?php print($msj); ?>"); </script> <?php }; ?>
<script type="text/javascript">
	var divAjax;
	function buscarOrden(dato,that,nro) {
		divAjax = document.getElementById('ajaxOrden'+nro);
		var datosAjax="";
		if(dato==""){
			divAjax.style.display="none";
            divAjax.innerHTML="";
		}
		
		$.post("../controlador_alberto/corMantenimiento.php",{evento:"busquedaRapida",valor:dato},function(data){
			if(dato=!"") {
				console.log(data);
				datos = JSON.parse(data);
				for(var datum in datos) {
					var miobjeto = datos[datum];
                    miobjeto2= JSON.stringify(miobjeto);
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarO('+miobjeto2+',"'+miobjeto.idmantenimiento+'",'+nro+')\'>'+miobjeto.idmantenimiento+' - Unidad: '+miobjeto.placa+' </a>';
				}
				divAjax.style.display="block";
                divAjax.innerHTML=datosAjax;
			}else{
				divAjax.style.display="none";
                divAjax.innerHTML="";
			}
		});
		
	}
	function colocarO(objeto,valor,nro) {
		divAjax = document.getElementById('ajaxOrden'+nro);
        divAjax.style.display="none";
        divAjax.innerHTML="";
        document.getElementById("ordenNro"+nro).value=objeto.idmantenimiento;
    }
    function verReporte(nro){

    	id = document.getElementById("ordenNro"+nro).value;
    	if(id!=""){
    		if(nro==3)
    			window.open("http://localhost/atcsistemNUEVA%20(1)/atcsistemNUEVA/reportes/salidaMantenimiento.php?nroOrden="+id);
    		else
    			window.open("http://localhost/atcsistemNUEVA%20(1)/atcsistemNUEVA/reportes/entradaMantenimiento.php?nroOrden="+id);
    	}else{
    		alert("Escriba el Nro. de Orden");
    	}
    }
</script>
<?php if($msj){ ?> <script> alert("<?php print($msj); ?>"); </script> <?php }; ?>
