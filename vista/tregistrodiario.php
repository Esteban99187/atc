<?php 
include_once("../modelo_alberto/clsGenerarCombos.php");
$comboPg = new CombosDinamicos;
include_once('../controlador_alberto/cortregistro_diario.php');
include_once("componentes_alberto.php");
include_once("../modelo_alberto/clstregistro_diario.php");
$tregistro_diario = new clstregistro_diario();

	//condicion para
if(isset($_GET['ad']) && $_GET["ad"]=="y"){
	$mitregistro_diario = $tregistro_diario->buscar_registro_diario($_GET['idrd']);
	$existe = "yes";
}else{
	$mitregistro_diario = $tregistro_diario->traer_codigo();
}
?>
<style type="text/css">
	.ajax{
	    background: white; 
	    display: none;
	    border: 1px solid #ccc;
	    border-top: none;
	    z-index: 50; position: absolute; top: 298px; height: auto; width: 400px;
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
	<div id='titulo_form'>Registro Diario</div>
	<form autocomplete="off" action='?url=tregistrodiario&ad=y&idrd=<?php print($mitregistro_diario["id_tregistro_diario"]+1); ?>'  id='formulario_maestro' method='POST'>
		<table width='100%' id='formulario_persona'>
			<tr>
				<td>Número de Registro Diario</td>
				<td><input type='text' class='solonumeros'  name='id_tregistro_diario' value='<?php if($existe!="yes"){print($mitregistro_diario["id_tregistro_diario"]+1);}else{ print($mitregistro_diario["id_tregistro_diario"]);} ?>' ></td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type='date' class='solofecha'  name='fecha' value='<?php if($mitregistro_diario["fecha"]){ print($mitregistro_diario["fecha"]); }else{ print(date("Y-m-d")) ;}; ?>' ></td>
			</tr>
			<tr>
				<td>Placa </td>
				<td>
					<!-- Cambio de Select Option por Autocompletado -->
					<input class="solovacio" type="text" style="width: 72%" onkeyup="buscarUnidad(this.value)" id="txtplaca" name="txtplaca" value='<?php print($mitregistro_diario["placa_unidad"]); ?>'>
					<input type="hidden" name="placa" id="placa_unidad_registro_diario" value='<?php print($mitregistro_diario["placa_unidad"]); ?>'>
					<div id="ajaxPlaca" class="ajax">
						
					</div>
					<!-- <select class='solovacio' name='placa' id="placa_unidad_registro_diario">
						<?php $comboPg->generarCombo("SELECT * FROM unidad where estatus_uni = '1'","placa","placa"); ?>
					</select> -->
				</td>
			</tr>
			<tr>
				<td>Kilometraje Anterior</td>
				<td><input readonly="readonly" type='text' class='solonumeros' id="kilometraje_anterior" name='kilometraje_anterior' value='<?php print($mitregistro_diario["kilometraje_anterior"]); ?>' ></td>
			</tr>
			<!--consumo diario-->
			<input type="hidden" name="consumo_diario" id="consumo_diario" value='<?php print($mitregistro_diario["kilometraje"]-$mitregistro_diario["kilometraje_anterior"]); ?>'>
			<tr>
				<td>Kilometraje Actual</td>
				<td><input type='text' onkeypress="return solonumeros()" class='solonumeros' id="kilometraje_actual_registrodiario" name='kilometraje' value='<?php print($mitregistro_diario["kilometraje"]); ?>' ></td>
			</tr>
			<tr>
				<td>Conductor</td>
				<td>
					<select class='solovacio' name='id_chofer'>
						<?php $comboPg->generarCombo("SELECT TRIM(id_chofer) AS id_chofer,concat(TRIM(id_chofer),'-',TRIM(nombre1),' ',TRIM(apellido1)) as chofer FROM tchofer","id_chofer","chofer",$mitregistro_diario["id_chofer"]); ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Observación</td>
				<td><textarea class='letranumeros' name='observacion'><?php print($mitregistro_diario["observacion"]); ?></textarea></td>
			</tr>
		</table>
		<!--aqui colocaremos la tabla para traernos todos lo lubricantes de la unidad dependiendo del modelo de este-->
		<?php if($_GET['ad']){ 
			//nos traeremos el modelo de repuesto de la unidad
			include_once("../modelo_alberto/clstunidad.php");
			$unidad = new clstunidad();
			if($existe=="yes"){
				$unidad->placa_unidad = $mitregistro_diario['placa_unidad'];
			}
			$miunidad = $unidad->buscar();
			//esto sera solo para buscar el modelo de la unidad

			//ahora traeremos los lubricantes / repuestos de la unidad elegida
			include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
			$unidades_repuesto = new clstdetalle_unidades_repuesto();
			$unidades_repuesto->idmodelo_unidad = $miunidad['idmodelo_unidad'];
			$misrepuesto = $unidades_repuesto->buscar_lubricantes();
		?>

		<table id="transaccion" style="width:100%;">
			<tr>
				<td>Repuesto / Lubricante</td>
				<td>Cantidad</td>
				<td>UM</td>
				<td>KI-Mínimo</td>
				<td>KI-Máximo</td>
				<td>KI-Actual</td>
				<td>Nota</td>
				<td></td>
			</tr>
			<?php if($misrepuesto) foreach($misrepuesto as $irepuestos => $misrepuestos){ ?>
			<tr>
				<td><?php print($misrepuestos['nombre_repuesto']); ?></td>
				<td><?php print($misrepuestos['cantidad']); ?></td>
				<td><?php print($misrepuestos['unidad_medida']); ?></td>
				<td><?php print($misrepuestos['kmin']); ?></td>
				<td><?php print($misrepuestos['kmax']); ?></td>
				<!--hacemos una pausa aqui en kilometraje-->
				<!--en este campo es en donde traeremos el dato -->
				<?php

				//esto solo sera para buscar el estatus del kilometraje
				include_once("../modelo_alberto/clsdetalle_registro_diario.php");
				$detalle_registro_diario = new clsdetalle_registro_diario();
				$detalle_registro_diario->placa_unidad = $mitregistro_diario['placa_unidad'];
				$detalle_registro_diario->idmodelo_unidad = $misrepuestos['idmodelo_unidad'];
				$detalle_registro_diario->id_repuesto = $misrepuestos['id_repuesto'];
				$midetalle_registro = $detalle_registro_diario->buscar();

				$msj_kilometraje = "";
				//kilometraje actual
				$ki_actual = $midetalle_registro['kactual'];
				//condiciones para saber el mensaje del mantenimiento
				if($midetalle_registro['estatus_mantenimiento']==1){
					$msj_kilometraje = "Se recomienda relizar un cambio de repuesto/lubricante ";
					$style = "color:#BF3030; font-weight:bold;";
				}else if($midetalle_registro['estatus_mantenimiento']=="2"){
					$style = "color:red; font-weight:bold;";
					$msj_kilometraje = "Ha llegado o sobrepasado el límite, por favor realizar cambio de repuesto/lubricante";
				}
				else{
					$msj_kilometraje = "Consumo normal";
				}
				?>
				<!--cierre del dato-->	

				<td><?php print($ki_actual); ?></td>
				<td style="<?php print($style); ?>"><?php print($msj_kilometraje); ?></td>
				
			</tr>
			<?php } ?>
		</table>
		<?php } ?>
		<ol id='botonera'>
			<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
			<?php if(!$_GET['ad']){ ?>
				<li><input type='submit'  name='incluir' class="btn btn-primary"  id='incluir' value='Guardar'></li>
				<?php }else{ ?>
				<li><a href="../reportes/reporte_ventana_registrodiario.php?placa_unidad=<?php print($mitregistro_diario['placa_unidad']); ?>&fecha=<?php print($mitregistro_diario["fecha"]); ?>&chofer=<?php print($mitregistro_diario["chofer"]); ?>" target='_BLANK'><input type='button'  name='aceptar'  value='Imprimir'></li></a>
			<?php  } ?>
			<li><a href="../vista/admin.php"><input type='button'   value='Volver'></li></a>
		</ol>
	</form>
</div>
<?php if($msj){ ?>   <script> mensajeConfirmar("<?php print($msj); ?>",function(){
	AgregarEvento(btnAceptarConfirm,"click",function(){
		var pathname = window.location.pathname; // Returns path only
		ocultarMensaje(2);
		window.location.href = pathname+"?url=tregistrodiario";
	});

	AgregarEvento(btnCancelConfirm,"click",function(event){ 
		ocultarMensaje(2);
	});
}); </script>   <?php  };  ?>

<script type="text/javascript">	
	//	Función de Autocompletado para la placa
	var divAjax = document.getElementById('ajaxPlaca');

	$('#txtplaca').focusout(function(){
		$.post("../controlador_alberto/corunidad.php",{evento:"busquedaRapida",valor:$('#txtplaca').val(),validarEntrada:0},function(data){
			if(data=="null"){
				crearMsj("La placa: "+$('#txtplaca').val()+" no existe!");
				$('#txtplaca').val("");
			}
		});
	});

	function buscarUnidad(dato){
		var datosAjax="";	
		$.post("../controlador_alberto/corunidad.php",{evento:"busquedaRapida",valor:dato,validarEntrada:0},function(data){
			if(dato!=""){
				//console.log(data);
				datos = JSON.parse(data);
				for(var datum in datos){
					var miobjeto = datos[datum];
                    miobjeto2= JSON.stringify(miobjeto);
                    datosAjax +='<a href="javascript:void(0)" onclick=\'colocarP('+miobjeto2+',"'+miobjeto.placa+'")\'>'+miobjeto.placa+' - '+miobjeto.modelo+' </a>';
				}
				divAjax.style.display="block";
                divAjax.innerHTML=datosAjax;
			}else{
				$("#kilometraje_anterior").val(0);	
				divAjax.style.display="none";
                divAjax.innerHTML="";
			}
		});
	}

	function colocarP(objeto,valor){
        divAjax.style.display="none";
        divAjax.innerHTML="";
        $("#placa_unidad_registro_diario").val(objeto.placa);
        $("#txtplaca").val(valor);
        $("#kilometraje_anterior").val(objeto.kilometraje);
    }
	//	Fin Función
	function solonumeros(e){
		var key = window.Event ? e.which : e.keyCode
		return (key >= 48 && key <= 57 || key==8)
	}
</script>