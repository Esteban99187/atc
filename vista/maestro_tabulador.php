<?php
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidtabulador = isset($_GET['liidtabulador']) ? $_GET['liidtabulador'] : null;
	$lskilometraje_tab = isset($_GET['lskilometraje_tab']) ? $_GET['lskilometraje_tab'] : null;
	$lsprecio_total_tab = isset($_GET['lsprecio_total_tab']) ? $_GET['lsprecio_total_tab'] : null;
	$lsidprecio = isset($_GET['lsidprecio']) ? $_GET['lsidprecio'] : null;
	$lsprecio_pre = isset($_GET['lsprecio_pre']) ? $_GET['lsprecio_pre'] : null;
	$lsdesc_tipo_unid = isset($_GET['lsdesc_tipo_unid']) ? $_GET['lsdesc_tipo_unid'] : null;
	$lscapacidad = isset($_GET['lscapacidad']) ? $_GET['lscapacidad'] : null;
	$lsestatus_tab = isset($_GET['lsestatus_tab']) ? $_GET['lsestatus_tab'] : null;
	$lsmedida = isset($_GET['lsmedida']) ? $_GET['lsmedida'] : null;
	$lsidruta = isset($_GET['lsidruta']) ? $_GET['lsidruta'] : null;
	$lsvia_rut = isset($_GET['lsvia_rut']) ? $_GET['lsvia_rut'] : null;
	$lsidpais_destino_tabulador = isset($_GET['lsidpais_destino_tabulador']) ? $_GET['lsidpais_destino_tabulador'] : null;
	$lsidestado_destino_tabulador = isset($_GET['lsidestado_destino_tabulador']) ? $_GET['lsidestado_destino_tabulador'] : null;
	$lsidmunicipio_destino_tabulador = isset($_GET['lsidmunicipio_destino_tabulador']) ? $_GET['lsidmunicipio_destino_tabulador'] : null;
	$lsidparroquia_destino_tabulador = isset($_GET['lsidparroquia_destino_tabulador']) ? $_GET['lsidparroquia_destino_tabulador'] : null;
	$lsidciudad_destino_tabulador = isset($_GET['lsidciudad_destino_tabulador']) ? $_GET['lsidciudad_destino_tabulador'] : null;
	$lsidpais_origen_tabulador = isset($_GET['lsidpais_origen_tabulador']) ? $_GET['lsidpais_origen_tabulador'] : null;
	$lsidestado_origen_tabulador = isset($_GET['lsidestado_origen_tabulador']) ? $_GET['lsidestado_origen_tabulador'] : null;
	$lsidmunicipio_origen_tabulador = isset($_GET['lsidmunicipio_origen_tabulador']) ? $_GET['lsidmunicipio_origen_tabulador'] : null;
	$lsidparroquia_origen_tabulador = isset($_GET['lsidparroquia_origen_tabulador']) ? $_GET['lsidparroquia_origen_tabulador'] : null;
	$lsidciudad_origen_tabulador = isset($_GET['lsidciudad_origen_tabulador']) ? $_GET['lsidciudad_origen_tabulador'] : null;
?>
<script type="text/javascript">
	function BuscarAjaxTabulador(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxTabulador&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxTabulador&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxTabulador&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/select_dependiente_origen_tabulador.js"></script>
<script type="text/javascript" src="js/select_dependiente_destino_tabulador.js"></script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Tabulador Listado de Precios</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abretabulador()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
			<div class="panel-body">
					<form method="post" name="ftabulador" action="../controlador/control_maestro_tabulador.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txtidprecio" value="<?php print($lsidprecio);?>" >
						<input type="hidden" name="txtidtabulador" value="<?php print($liidtabulador);?>" onblur="fperderfocusidtabulador()">
						<input type="hidden" name="txtidruta"  value="<?php print($lsidruta);?>">
						<div class="row">
						<div class="col-lg-3">
						<div class="form-group has-error">
								<label >Unidad de Transporte:</label>
								<input class="form-control"  type="text" name="txtdesc_tipo_unid"  onkeypress="return soloLetra(event)" readonly title="ingrese la unidad de transporte" maxlength="50"    value="<?php print($lsdesc_tipo_unid);?>"> 
						</div>	
						</div>	
						
						<div class="col-lg-4">
								<div class="form-group has-error">
								<label >Capacidad:</label>
								<input class="form-control"  type="text" name="txtcapacidad"  readonly  onkeypress="return soloLetra(event)"  maxlength="50"    value="<?php print($lscapacidad.''.$lsmedida);?>"> 
						</div>
						</div>
						<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Precio por Kilometraje:</label>
								<input class="form-control"  type="text" name="txtprecio_pre"  readonly onkeypress="return soloLetra(event)"  maxlength="50"   value="<?php print($lsprecio_pre);?>"> 
						</div>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
								<div class="form-group col-lg-1">
							<br><button class="btn btn-primary" name="btnAbrePrecio" type="button" value="..." title="Buscar Precio" onclick="AbrePrecio()"   ><i class="glyphicon glyphicon-search"></i></button>
						</div>	
						</div>	

						<div class="row">
							<div class="col-lg-10">
								<div class="form-group has-error">
									<label >Via:</label>
									<input class="form-control" readonly type="text" name="txtvia_rut"  value="<?php print($lsvia_rut);?>">
							</div>
							</div>
							<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="form-group col-lg-1">
									<br><button class="btn btn-primary" name="btnAbreRuta" type="button" value="..."  title="Buscar Ruta"  onclick="AbreRuta()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Pais Origen:</label>
								<input class="form-control" readonly type="text" name="cmbidpais_origen_tabulador" id="cmbidpais_origen_tabulador" value="<?php print($lsidpais_origen_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Estado Origen:</label>
								<input class="form-control" readonly type="text" name="cmbidestado_origen_tabulador" id="cmbidestado_origen_tabulador" value="<?php print($lsidestado_origen_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Municipio Origen:</label>
								<input class="form-control" readonly type="text" name="cmbidmunicipio_origen_tabulador" id="cmbidmunicipio_origen_tabulador" value="<?php print($lsidmunicipio_origen_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Parroquia Origen:</label>
								<input class="form-control" readonly type="text" name="cmbidparroquia_origen_tabulador" id="cmbidparroquia_origen_tabulador" value="<?php print($lsidparroquia_origen_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Ciudad Origen:</label>
								<input class="form-control" readonly type="text"  name="cmbidciudad_origen_tabulador" id="cmbidciudad_origen_tabulador" value="<?php print($lsidciudad_origen_tabulador);?>">
							</div>
							</div>
						</div>
						<!--********************************************************************-->
						<!--inican los select dependientes de la direccion destino del tabulador-->
						<div class="row">
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Pais Destino:</label>
								<input class="form-control" readonly type="text" name="cmbidpais_destino_tabulador" id="cmbidpais_destino_tabulador" value="<?php print($lsidpais_destino_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Estado Destino:</label>
								<input class="form-control" readonly type="text" name="cmbidestado_destino_tabulador" id="cmbidestado_destino_tabulador" value="<?php print($lsidestado_destino_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Municipio Destino:</label>
								<input class="form-control" readonly type="text" name="cmbidmunicipio_destino_tabulador" id="cmbidmunicipio_destino_tabulador" value="<?php print($lsidmunicipio_destino_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group has-error">
								<label >Parroquia Destino:</label>
								<input class="form-control" readonly type="text" name="cmbidparroquia_destino_tabulador" id="cmbidparroquia_destino_tabulador" value="<?php print($lsidparroquia_destino_tabulador);?>">
							</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group has-error">
								<label >Ciudad Destino:</label>
								<input class="form-control" readonly type="text" name="cmbidciudad_destino_tabulador" id="cmbidciudad_destino_tabulador" value="<?php print($lsidciudad_destino_tabulador);?>">
							</div>
							</div>
							
							<div class="col-lg-5">
								<div class="form-group has-error">
								<label >Kilometraje:</label>
								<input class="form-control" readonly type="text" name="txtkilometraje_tab"  title="ingrese la unidad de transporte"    value="<?php print($lskilometraje_tab);?>"> 
							</div>
							</div>
								<div class="form-group col-lg-1">
								<label >Procesar</label>
								<button class="btn btn-primary"  name="btnSuma" onClick="multiplica()" type="button" value=""> &nbsp; = &nbsp;</button>
							</div>
							
						<div class="form-group col-lg-4">
								<label >Precio Total:</label>
								<input class="form-control"  type="text" name="txtprecio_total_tab" readonly  title="ingrese la unidad de transporte" maxlength="50"   value="<?php print($lsprecio_total_tab);?>"></div>
								<div class="form-group col-lg-1"> <br><br><label>Bf</label>
						</div>	
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
						<div class="row">
							<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-8">
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado</label>
							</div>
						</div>
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="button" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
							 if ($lsestatus_tab==1)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
							}
							else if ($lsestatus_tab==0)
							{
							 echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
							}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_tabulador')">Cancelar</button>
						</center>
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
				<label>Un tabulador de precios no es más que un catálogo donde podremos encontrar los precios de los viajes que pueden ser realizados por los transportistas de la empresa ATC, el cual es usado para calcular el precio de un viaje que solicite un cliente </label>
			</div> 
		</div>
	</div> 
</div>
</div>
<script language="javascript">
			finicio();
		    function finicio()
		    {
			    lof=document.ftabulador;
				if (lof.txtoperacion.value=="buscar")
				{
					lof=document.ftabulador;
					lof.txtkilometraje_tab.disabled=true;
					lof.txtprecio_total_tab.disabled=true;
					lof.txtprecio_pre.disabled=true;
					lof.btnAbrePrecio.disabled=true;
					lof.btnAbreRuta.disabled=true;
					lof.btnSuma.disabled=true;
					lof.txtdesc_tipo_unid.disabled=true;
					lof.txtcapacidad.disabled=true;
					lof.cmbidpais_origen_tabulador.disabled=true;
					lof.cmbidestado_origen_tabulador.disabled=true;
					lof.cmbidmunicipio_origen_tabulador.disabled=true;
					lof.cmbidparroquia_origen_tabulador.disabled=true;
					lof.cmbidciudad_origen_tabulador.disabled=true;
					lof.cmbidpais_destino_tabulador.disabled=true;
					lof.cmbidestado_destino_tabulador.disabled=true;
					lof.cmbidmunicipio_destino_tabulador.disabled=true;
					lof.cmbidparroquia_destino_tabulador.disabled=true;
					lof.cmbidciudad_destino_tabulador.disabled=true;
					lof.btnnuevo.disabled=true;
					lof.btnbuscar.disabled=true;
					lof.btnguardar.disabled=true;
					lof.btnmodificar.disabled=false;
					lof.btneliminar.disabled=false;
					lof.btncancelar.disabled=false;
				}
				else 
				{
					 fcancelar()
				}
		    }
		function fnuevo()
		{
			lof=document.ftabulador;
			lof.txtoperacion.value="incluir";
			lof.txtkilometraje_tab.disabled=false;
			lof.txtprecio_total_tab.disabled=false;
			lof.txtprecio_pre.disabled=false;
			lof.txtdesc_tipo_unid.disabled=false;
			lof.txtcapacidad.disabled=false;
			lof.btnAbrePrecio.disabled=false;
			lof.btnAbreRuta.disabled=false;
			lof.btnSuma.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnguardar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btncancelar.disabled=false;
		}

			function fcancelar()
			{
			   lof=document.ftabulador;

			   lof.btnAbrePrecio.value="";
			   lof.btnAbreRuta.value="";
			   lof.btnSuma.value="";
			   lof.txtdesc_tipo_unid.value="";

			   lof.txthacer.value="";
			   lof.txthay.value=0;

			   lof.txtprecio_pre.disabled=true;
			   lof.btnAbrePrecio.disabled=true;
			   lof.btnAbreRuta.disabled=true;
			   lof.btnSuma.disabled=true;

				lof.btnnuevo.disabled=false;
				lof.btnbuscar.disabled=false;
				lof.btnguardar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=true;
			}


			function fmodificar()
			{
				lof=document.ftabulador;
				lof.txtoperacion.value="modificar";
				lof.txtkilometraje_tab.disabled=false;
				lof.txtprecio_total_tab.disabled=false;
				lof.txtprecio_pre.disabled=false;
				lof.btnAbrePrecio.disabled=false;
				lof.btnAbreRuta.disabled=false;
				lof.btnSuma.disabled=false;
				lof.txtdesc_tipo_unid.disabled=false;
				lof.txtcapacidad.disabled=false;
				lof.cmbidpais_origen_tabulador.disabled=false;
				lof.cmbidpais_destino_tabulador.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnguardar.disabled=false;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btncancelar.disabled=false;
			}

			function feliminar()
			{
				lof=document.ftabulador;
					lof.txtoperacion.value="eliminar";
					lof.submit();

			}
			function factivar()
			{
				lof=document.ftabulador;
				lof.txtoperacion.value="activar";
				lof.submit();
			}
			
			function fguardar()
			{
				lof=document.ftabulador;
				if (fvalidar())
				{
					lof.submit();
				}
			}
			
			function fvalidar()
			{
				lbbueno=false;
				lof=document.ftabulador;
				if (lof.txtidprecio.value=="")
				{
					alert("Debe Seleccionar un precio por kilometro");
					lof.btnAbrePrecio.focus();
				}
				else if (lof.txtidruta.value=="")
				{
					alert("Seleccione una ruta");
					lof.btnAbreRuta.focus();
				}
				else if (lof.txtprecio_total_tab.value=="")
				{
					alert("Calcule el precio total");
					lof.btnSuma.focus();
				}
				else
				{
					lbbueno=true;
				}
				return lbbueno;
			}
		</script>


		<script type="text/javascript">
			fInicio();
			<!-- Abre una Ventana Emergente -->
			var miPopup
			function AbrePrecio(){
				miPopup = window.open("busqueda/CatalogoPrecio.php","precioklm","width=650px,height=270px,scrollbars=yes,toolbar=No")
				miPopup.focus()
			}
			var miPopup
			function AbreRuta(){
				miPopup = window.open("busqueda/CatalogoRuta.php","ruta","width=650px,height=270px,scrollbars=yes,toolbar=No")
				miPopup.focus()
			}
			function multiplica()
			{
				var a = document.ftabulador.txtprecio_pre.value //en el DOM esto referencia el valor del primer cuadro
				var b = document.ftabulador.txtkilometraje_tab.value //esto referencia el valor del segundo cuadro
				document.ftabulador.txtprecio_total_tab.value=parseFloat(a)*parseFloat(b) //convertimos a números
				//los valores de los cuadros de texto se interpretan siempre como cadenas de caracteres
			}
			//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abretabulador(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudatabulador.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
		</script><
