<?php
	$_SESSION["operativa-vista"] = "estado"; // variable para saber en que vista esta y asi no destruir sus variables de trabajo
	include_once('../modelo/m_limpiar_variables_sessiones.php');
?>
<script type="text/javascript">
	function buscarAjax(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/c_estado.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=busquedaAjax&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=busquedaAjax&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=busquedaAjax&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Estado</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
			</div>
			<div class="panel-body">
				<form method="POST" action="../controlador/c_estado.php" name="envio_form" id="formulario_estilo">
					<input type="hidden"  name="cod_est" value="<?php if(isset($_SESSION['cod_est'])) echo $_SESSION['cod_est'];?>" />
						<div class="row">
							<div class="form-group col-lg-1"></div>
							<div class="form-group col-lg-10">
								<h4>Nombre</h4>
								<input type="text" class="form-control" onkeyup="quitarValidacion()" onFocus="mostrarMensajeInteractivo(this.id)" title="Ingrese el nombre del estado" readonly="readonly" onBlur="cambio_mayus(this)" placeholder="Ingrese solo letras" id="nom_est" name="nom_est" value="<?php if(isset($_SESSION['nom_est'])) echo $_SESSION['nom_est'];?>" onkeypress="return SoloLetras(event)" />
							</div>
						</div>
						<input type="hidden" name="NoEncon" value="<?php if(isset($_SESSION["res"])) echo $_SESSION["res"]; ?>">
						<input type="hidden" name="opActDes" value="<?php if(isset($_SESSION["opActDesEstado"])) echo $_SESSION["opActDesEstado"]; ?>">
						<input type="hidden" name="tipoMod" value="<?php if(isset($_SESSION["tipoMod"])) echo $_SESSION["tipoMod"]; ?>">
						<input type="hidden" name="modificar" >
						<input type="hidden" name="temp">
						<input type="hidden" name="op">
						<div class="row">
							<center>
								<button class="btn btn-primary" type="button"  name="inc" value="Incluir" onclick="General_estado(this.value)"><span id="iconos" class="icon-file-empty"></span><span>Nuevo</span></button>								
								<button class="btn btn-primary" data-toggle="chat" data-collapse-sidebar="1" type="button" title="Clic para Consultar un estado" value="Consultar" name="bus"  ><span id="iconos" class="icon-search"></span>Consutar</button>
								<button class="btn btn-primary" type="button" title="Clic para guardar un estado" value="Grabar" name="grab" onclick="General_estado(this.value)" disabled="disabled"><span id="iconos" class="icon-clipboard"></span><span>Guardar</span></button>					
								<button class="btn btn-primary" type="button" title="Clic para modificar un estado" value="Modificar" name="mod" onclick="General_estado(this.value)" disabled="disabled"><span id="iconos" class="icon-pencil"></span><span>Modificar</span></button>	
								<button class="btn btn-primary" type="button" value="" name="sta" onclick="General_estado(this.value)" disabled="disabled"><span id="iconos-1" class="icon-checkmark"></span><span id="act" title="clic para activar el estado">Activar</span><span id="iconos-2" class="icon-cancel-circle"></span><span id="des" title="clic para descargar el estado">Desactivar</span></button>		
								<button class="btn btn-primary" type="button" title="Clic para Cancelar la operación" value="Cancelar" name="cancel" onclick="General_estado(this.value)" disabled="disabled"><span id="iconos" class="icon-cross"></span><span>Cancelar</span></button>
							</center>
						</div>
				</form>
			</div>
		</div> 
	</div>
</div>				
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title"><i class="entypo-info"></i>Información
				</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div>
			</div>
			<div class="panel-body"> <div class="col-md-1">
					<i class="entypo-basket" style="font-size:30px;"></i>
			</div>
			<div class="col-md-11">
				<label>Un producto es el elemento principal en el servicio de transporte por lo tanto es un registro obligatorio que debe estar disponible en el registro de la solicitud de transporte</label>
			</div> 
		</div>
	</div> 
</div>
</div>		
			
			
			
			<script>
				frm = document.envio_form;
				
				if(frm.cod_est.value!=""){
					Encontrado_si();
					frm.nom_est.style.cursor = "not-allowed";
				
					if(frm.opActDes.value != ""){
						if(frm.opActDes.value == "act" ){
							frm.sta.value = "Desactivar";
							document.getElementById('act').style.display = "none";
							document.getElementById('iconos-1').style.display = "none";
							document.getElementById('nClave').style.display = "none";
						}else{
							frm.mod.disabled = true;
							frm.mod.style.background = "#ccc";
							frm.mod.style.color = "#666666";
							frm.sta.value = "Activar";
							document.getElementById('des').style.display = "none";
							document.getElementById('iconos-2').style.display = "none";
							document.getElementById('nClave').style.display = "none"
							document.getElementById('act').style.display = "inline-block";
							document.getElementById('iconos-1').style.display = "inline-block";
						}
					}else{
						frm.sta.value = "Desactivar";
						document.getElementById('act').style.display = "none";
						document.getElementById('iconos-1').style.display = "none";
					}
				}else if(frm.NoEncon.value == "NO"){
					consultar();
					frm.nom_est.style.cursor = "not-allowed";
					frm.nom_est.readOnly = false;
					frm.nom_est.style.border = "1px solid #0F0FA6";	
					frm.nom_est.style.cursor = "pointer";
					frm.nom_est.focus();
				
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}else{
					Inicio_Deafault();
					frm.nom_est.style.cursor = "not-allowed";
					
					document.getElementById('act').style.display = "none";
					document.getElementById('iconos-1').style.display = "none";
				}
			</script>
<?php
include_once("v_modales.php");
	if(isset($_SESSION['res'])){ // existe un msj
		if($_SESSION['res']=="logAdmin"){
			echo "<script>openVentana2();</script>";
		}else if($_SESSION['res']=='registrado'){
			echo "<script>openVentana4();</script>";
		}else if($_SESSION['res']=='yaexiste'){
			echo "<script>closeVentana6();</script>"; 
		}else if($_SESSION['res']=='mod'){
			echo "<script>openVentana11();</script>";
		}else if($_SESSION['res']=='NO'){
			echo "<script>openVentana5();</script>";
		}else if($_SESSION['res']=='des'){
			echo "<script>openVentana9();</script>";
		}else if($_SESSION['res']=='act'){
			echo "<script>openVentana10();</script>";
		}else if($_SESSION["res"]=='staUno'){
			echo "<script>alert('El Registro se encuetra desactivado, porfavor activar');</script>";
		}else if($_SESSION["res"]=='yesCed'){
			echo "<script>alert('La Cédula Ya se Encuentra Registrada');</script>";
		}else if($_SESSION["res"]=='NotCed'){
			echo "<script>alert('Cédula No Registrada');</script>";
		}else if($_SESSION['res']=="error_mod"){
			echo "<script>openVentana12();</script>";
		}else if($_SESSION['res']=='error_des'){
			echo "<script>openVentana13();</script>";
		}else if($_SESSION['res']=='des_e_No'){
			echo "<script>alert('no se puede desactivar');</script>";
		}else if($_SESSION['res']=='ClaveModificada'){
			echo "<script>openVentana15();</script>";
		}else if($_SESSION['res']=='NoClaveIgualAntIntra'){
			echo "<script>openVentana16();</script>";
		}else if($_SESSION['res']=='UserIncorrerIntranet'){
			echo "<script>openVentana14();</script>";
		}else if($_SESSION['res']=='NoClaveIgualIntra'){
			echo  "<script>openVentana17();</script>";
		}else if($_SESSION['res']=='PregModificada'){
			echo  "<script>openVentana18();</script>";
		}else if($_SESSION['res']=='CorreoModificada'){
			echo  "<script>openVentana23();</script>";
		}else if($_SESSION['res']=='TelfModificada'){
			echo  "<script>openVentana24();</script>";
		}else if($_SESSION['res']=='userBloqueado'){
			echo  "<script>openVentana22();</script>";
		}else if($_SESSION['res']=='userDesBloqueado'){
			echo  "<script>openVentana21();</script>";
		}else if($_SESSION['res']=='ExisPeriAbrir'){
			echo  "<script>openVentana30();</script>";
		}else if($_SESSION['res']=='NoHayPerioAbrir'){
			echo  "<script>openVentana29();</script>";
		}else if($_SESSION['res']=='ExitoAbiertPeriodo'){
			echo  "<script>openVentana28();</script>";
		}else if($_SESSION['res']=='NoExisPerPaCerrar'){
			echo  "<script>openVentana27();</script>";
		}else if($_SESSION['res']=='ExitoCerrarPeriodo'){
			echo  "<script>openVentana26();</script>";
		}else if($_SESSION['res'] == 'ElPeriodIgaulFechaActual'){
			echo  "<script>openVentana25();</script>";
		}else if($_SESSION['res'] == 'periodoCreado'){
			echo  "<script>openVentana31();</script>";
		}
		unset($_SESSION["res"]); //destruyo la variable para que no siga apareciendo al pulsar f5 
	}
?>
