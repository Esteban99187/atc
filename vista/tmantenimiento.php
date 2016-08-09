<?php 
	//el controlador lo llamaremos aqui
	include_once("../modelo_alberto/clsGenerarCombos.php");
	$comboPg = new CombosDinamicos;
	include_once("../controlador_alberto/cormantenimiento_preventivo.php");
	include_once("componentes_alberto.php");
	//nos traeremos el modelo de repuesto de la unidad
	include_once("../modelo_alberto/clstunidad.php");
	if(isset($_GET["placa"])){
		//esto sera solo para buscar el modelo de la unidad
		$unidad = new clstunidad();
		$unidad->placa_unidad = $_GET['placa'];
		$miunidad = $unidad->buscar();

		//ahora traeremos los lubricantes / repuestos de la unidad elegida
		include_once("../modelo_alberto/clstdetalle_unidades_repuesto.php");
		$unidades_repuesto = new clstdetalle_unidades_repuesto();
		$unidades_repuesto->idmodelo_unidad = $miunidad['idmodelo_unidad'];
		$repuestos = $unidades_repuesto->buscar_lubricantes();
		
		//veremos si tiene mantenimientos preventivos en espera
		include_once("../modelo_alberto/clsdetalle_registro_diario.php");
		$midetallediario = new clsdetalle_registro_diario();
		$midetallediario->buscar_pendiente_manteniento($_GET['placa']);
		$tam = $midetallediario->cont();
	}
	//traeremos el codigo del mantenimiento preventivo
	include_once("../modelo_alberto/clspreventivo.php");
	$preventivo = new preventivo();
	$mipreventivo = $preventivo->traer_codigo();
	//AQUI VEREMOS SI LA PLACA TIENE SI NO MOSTRARA EL MENSAJE
	if($_GET['placa']){
		if($tam>0){
			$existe = "yes";
		}else{
			$msj = "Esta unidad no tiene mantenimiento preventivo pendiente";
		}
	}
?>
<style type="text/css">
	.ajax{
	    background: white; 
	    display: none;
	    border: 1px solid #ccc;
	    border-top: none;
	    z-index: 50; position: absolute; top: 189px; height: auto; width: 280px;
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
	<div id='titulo_form'>Mantenimiento Preventivo</div>
	<form action=''  id='formulario_maestro' method='<?php if($existe=="yes") print("POST"); else print("GET") ?>'>
		<!--esta tabla es para el registro de mantenimiento preventivo-->
		<?php if($existe=="yes"){ ?>

		<table width="100%" id='formulario_persona'>
			<input type="hidden" name="idpreventivo" value="<?php print($mipreventivo['idpreventivo']+1); ?>">
			<tr>
				<td style="width:20% !important;">
					<p>Fecha:</p>
					<input type="text" name="fecha" value="<?php print(date("Y-m-d")); ?>">
				</td>

				<td style="width:20% !important;">
					<p>Placa:</p>	
					<input type="text" id="placa_mantenimiento_correctivo" name="placa" value="<?php print($miunidad['placa']); ?>">
				</td>
				<td style="width:20% !important;">
					<p>Kilometraje Actual:</p>
					<input type="text" id="kilometraje_actual" name="kilometraje" value="0" readonly="readonly">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>Observaciones</p>
					<textarea  class="solovacio" id="observaciones" name="observaciones" style="height:50px;"></textarea>
				</td>
			</tr>
			<input type="hidden" id="busqueda_ajax" value="<?php print($miunidad['idmodelo_unidad']); ?>">
		</table>
		<?php  } ?>

		<?php if($existe=="yes"){ ?> 
		<br>
		<br>
		<div id='titulo_form'>Lubricantes</div> 
		<?php } ?>

		<table width='100%' border="1" id='formulario_persona'>
			<?php if($existe!="yes"){ ?>
			<tr>
				<td>Placa</td>
				<td>
					<input type="hidden" name="url" value="tmantenimiento">
					<!-- <input type="text" name="placa" style="width:30%;"> -->
					<input class="solovacio" type="text" style="width: 30%" onkeyup="buscarUnidad(this.value)" id="placa" name="placa">
					<div id="ajaxPlaca" class="ajax">
						
					</div>
					<input style="width:80px;" type="button" onclick="buscarMantenimiento()" value="Buscar">
				</td>
			</tr>

			<?php }else{ ?>

			<!--aqui colocaremos los datos necesarios-->
			<tr>
				<td>--</td>
				<td>Repuesto/Lubricante</td>
				<td>Cantidad</td>
				<td>Fecha</td>
				<td>Mecanico</td>
				<td>Kilometraje</td>
			</tr>

			<?php foreach($repuestos as $Irepu => $misrepuestos ){ 

			//esto solo sera para buscar el estatus del kilometraje
				include_once("../modelo_alberto/clsdetalle_registro_diario.php");
				$detalle_registro_diario = new clsdetalle_registro_diario();
				$detalle_registro_diario->placa_unidad = $_GET['placa'];
				$detalle_registro_diario->idmodelo_unidad = $misrepuestos['idmodelo_unidad'];
				$detalle_registro_diario->id_repuesto = $misrepuestos['id_repuesto'];
				$midetalle_registro = $detalle_registro_diario->buscar();
				//	buscamos el stock disponible del repuesto
				include_once("../modelo_alberto/clsInventario.php");
				$inventario = new Inventario();
				$stock_repuesto = $inventario->buscarStockRepuesto($midetalle_registro['id_repuesto']);
				$estatus = "";
				//kilometraje actual
				$ki_actual = $midetalle_registro['kactual'];
				//condiciones para saber el mensaje del mantenimiento
				if($midetalle_registro['estatus_mantenimiento']=="1"){
					$estatus ="1";
				}else if($midetalle_registro['estatus_mantenimiento']=="2"){
					$estatus ="2";
				}
				$id_repuesto = $midetalle_registro['id_repuesto'];
			?>
				<?php if($estatus!=""){ ?>
				<tr>
					<td><input type="checkbox" name="repuestos[]" value="<?php print($midetalle_registro['id_repuesto']); ?>">
					</td>
					<td><?php print($misrepuestos['nombre_repuesto']); ?></td>
					<td>
					<?php 
						if($stock_repuesto['stock']>0 && $stock_repuesto['stock']<$misrepuestos['cantidad']){
					?>
						<input style="width:50%;" id="cantidad_<?php print($id_repuesto); ?>" onchange="evento(<?php print($id_repuesto); ?>)" type="range" min="1" max="<?php print($stock_repuesto['stock']); ?>" value="" placeholder="Cantidad a colocar">
						<input type="text" id="cant_<?php print($id_repuesto); ?>" readonly="readonly" style="width:50%; float:left;" value="1" name="cantidad_<?php print($id_repuesto); ?>" >
					<?php
						}else if($stock_repuesto['stock']>0 && $stock_repuesto['stock']>$misrepuestos['cantidad']){
					?>
						<input style="width:50%;" id="cantidad_<?php print($id_repuesto); ?>" onchange="evento(<?php print($id_repuesto); ?>)" type="range" min="1" max="<?php print($misrepuestos['cantidad']); ?>" value="" placeholder="Cantidad a colocar">
						<input type="text" id="cant_<?php print($id_repuesto); ?>" readonly="readonly" style="width:50%; float:left;" value="1" name="cantidad_<?php print($id_repuesto); ?>" >
					<?php
						}else{
							echo "El Repuesto/Lubricante ".$misrepuestos['nombre_repuesto']." no tiene existencia en inventario, favor actualizar el inventario. <br />";
					?>
						<input type="text" id="cant_<?php print($id_repuesto); ?>" readonly="readonly" style="width:50%; float:left;" value="0" name="cantidad_<?php print($id_repuesto); ?>" >
					<?php
						}
					?>
					</td>
					<td><input type="date" name="fecha_<?php print($id_repuesto); ?>" value="<?php print(date('Y-m-d')); ?>"></td>
					<td>
						<select class="" id="mecanico_<?php print($id_repuesto); ?>" name="mecanico_<?php print($id_repuesto); ?>">
							<?php $comboPg->generarCombo("SELECT idmecanico,concat(idmecanico,'-',TRIM(nombre1),' ',TRIM(apellido1)) as mecanico FROM tmecanico","idmecanico","mecanico"); ?>
						</select>
					</td>
					<td><input readonly="readonly" class="kilometraje_preventivo" type="text" name="kilometraje_<?php print($id_repuesto); ?>" value="<?php print($midetalle_registro['kactual']); ?>"></td>
					</tr>
					<?php } 
				}//cierre del while
			}//cierre de el if de existe
		?>
		</table>
		<ol id='botonera'>
			<input type='hidden' class='estado_form' value='<?php if($existe=="yes"){ print("1"); }?>' >
			<?php if($existe=="yes"){ ?><li><input type='submit' name='incluir' onclick="return registro()"  id='incluir' value='Aceptar'></li> <?php } ?>
			<li><a href="../vista/admin.php"><input type='button'   value='Volver'></li></a>
		</ol>
	</form>
</div><?php if($msj){ ?>  <script> crearMsj("<?php print($msj); ?>"); </script>   <?php  };  ?>
<script type="text/javascript">
	//	Función de Autocompletado para la placa
	function buscarMantenimiento(){
		if($('#placa').val()==""){
			crearMsj("Debe ingresar una placa a buscar");
		}
		else $('#formulario_maestro').submit();
	}

	var divAjax = document.getElementById('ajaxPlaca');
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
				divAjax.style.display="none";
                divAjax.innerHTML="";
			}
		});
	}
	function colocarP(objeto,valor){
        divAjax.style.display="none";
        divAjax.innerHTML="";
        $("#placa").val(valor);
    }
	//	Fin Función
 	//colocamos el valor de una ves
 	function registro(){
 		var ch = document.getElementsByName("repuestos[]");
 		var cant = ch.length;
 		var contact = 0;
 		var cont_errores = 0;
 		var cont_inventario = 0;
 		var valor_repuesto = 0;

 		for(var i=0;i<cant;i++){
 			if(ch[i].checked){
 				//obtenemos la id del repuesto
 				valor_repuesto = ch[i].value;
 				valor_mecanico = document.getElementById("mecanico_"+valor_repuesto).value;
 				cantidad_repuesto = document.getElementById("cant_"+valor_repuesto).value;
 				contact++;
 				//	Validamos que se haya escogido un mecanico
 				if(valor_mecanico=="")
 					cont_errores++;
 				//	Validamos productos con existencia.
 				if(cantidad_repuesto==0)
 					cont_inventario++;
 			}
 		}
 		if(contact==0){
 			crearMsj("Debe tildar almenos un Repuesto/Lubricante");
 			return false;
 		}else if(cont_inventario>0){
			crearMsj("La cantidad del repuesto seleccionado debe ser mayor que 0");
			return false;
		}else if(cont_errores>0){
			crearMsj("No ha seleccionado el mecánico en una de las opciones");
			return false;
		}else{
			return true;
		}
 	}
 	function evento(valor){
 		document.getElementById("cant_"+valor).value = document.getElementById("cantidad_"+valor).value;
 	}
 	</script>