<?php
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSISTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                                                                                           *
	*  Este programa es software libre, puede redistribuirlo y / o modificar                    *
	*  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
	*  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
	*                                                                                           *
	*  Este programa se distribuye con la esperanza de que sea útil,                            *
	*  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
	*  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
	*                                                                                           *
	********************************************************************************************/
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}


	 require_once("../modelo/clscombo.php");
   $lobjcombo= new clscombo();


	$liidmunicipio= isset($_GET['liidmunicipio']) ? $_GET['liidmunicipio'] : null ;
	$lsdesc_muni= isset($_GET['lsdesc_muni']) ? $_GET['lsdesc_muni'] : null ;
	$lsidestado= isset($_GET['lsidestado']) ? $_GET['lsidestado'] : null ;
	$lsidpais= isset($_GET['lsidpais']) ? $_GET['lsidpais'] : null ;
	$lsestatus_mun= isset($_GET['lsestatus_mun']) ? $_GET['lsestatus_mun'] : null ;

	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<script type="text/javascript">
	function BuscarAjaxmunicipio(valor)
	{
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function()
		{
			if(ajax.readyState==4)
			{
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			if(document.getElementById('est1').checked)
				{ //si esta tildado la caja de activos
					ajax.send("operacion=BusquedaAjaxciudad&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre
				}
			else if(document.getElementById('est2').checked)
				{ //si esta tildado la caja de inactivos
					ajax.send("operacion=BusquedaAjaxmunicipio&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre
				}
			else
				{ //si no esta tildados ni activos ni inactivos
					ajax.send("operacion=BusquedaAjaxmunicipio&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
				}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Municipio</div> 
					<div class="panel-options"><a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a><i class="entypo-help" onclick="abremunicipio()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
				</div>
					<div class="panel-body">
					<form method="post" name="fmunicipio" action="../controlador/control_maestro_municipio.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
								<input class="form-control"  type="hidden" name="txtidmunicipio" title="ingrese codigo de municipio"  maxlength="3" tabindex="1" value="<?php print($liidmunicipio);?>" onblur="fperderfocusidmunicipio();">
     						<div class="form-group col-lg-1">
								</div>

                           <div class="col-lg-2">
								<div class="form-group has-error">
								<label>Pais</label>
								<select id="cmbpais" class="form-control">
									<option title="Seleccione un Pais" value="" value="<?php print($lsidpais);?>"> Seleccione</option>;
										<?php
											include '../modelo/conexion.php';
											fconectar();
											$consulta = "select * from pais";
											$resultado = mysql_query($consulta);
											if($fila=mysql_fetch_array($resultado)){
												do{
													echo '<option value="'.$fila['idpais'].'">'.$fila['desc_pais'].'</option>';
												}while($fila = mysql_fetch_array($resultado));
											}
											desconectar();

										?>
								</select>
								</div>
								</div><div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="form-group col-lg-2">
								<label>Estado</label>
								<select  class="form-control"  name="cmbidestado" id="cmbidestado">									
								<option title="Seleccione un Estado" value="" value="<?php print($lsidestado);?>" >Seleccione</option>


									<?php
										$lssql="select idestado,concat(' ',desc_esta) as nombre from estado order by nombre";
										$lobjcombo->fgenerar($lssql,"idestado","nombre","");

									?>

							</select>
							</div><div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
								<div class="form-group col-lg-3">
								<label >Nombre:</label>
								<input class="form-control"  type="text" name="txtdesc_muni" title="Ingrese nombre del Municipio"  maxlength="30" onkeypress="return soloLetra(event)"value="<?php print($lsdesc_muni);?>" onblur="fperderfocusdesc_muni();">
                           </div>			
									<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>								</div>
						<div class="row">
							<div class="form-group col-lg-2"></div>
							<div class="form-group col-lg-9">
							<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado</label>
							</div>
							</div>

						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
								if ($lsestatus_mun==1)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
									}
								else if ($lsestatus_mun==0)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
									}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_municipio')">Cancelar</button>
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
					<div class="panel-title"><i class="entypo-info"></i>Información</div> 
					<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
				</div>
					<div class="panel-body"> <div class="col-md-1"><i class="entypo-basket" style="font-size:30px;"></i></div>
					<div class="col-md-3"></div>
					<div class="col-md-15">
						<label>Una Municipio forma parte de la división territorial de un Estado</label>
					</div>
			</div>
			</div>
			</div>
			</div>


<script language="javascript">
	finicio();
	function finicio()
		{
		lof=document.fmunicipio;
		if (lof.txtoperacion.value=="buscar")
			{
				lof=document.fmunicipio;
                    lof.txtdesc_muni.disabled=true;
                    lof.txtdesc_muni.focus();
                    lof.cmbidestado.value="<?php print($lsidestado);?>";
                    lof.cmbidestado.disabled=true;
                    lof.cmbpais.value="<?php print($lsidpais);?>";
                    lof.cmbpais.disabled=true;
				lof.btnguardar.disabled=true;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=false;
				lof.btneliminar.disabled=false;
			}
		else
			{
			fcancelar();
			}
		}


	function fnuevo()
		{
			lof=document.fmunicipio;
			lof.txtoperacion.value="incluir";
			
			lof.txtdesc_muni.disabled=false;
            lof.cmbpais.focus();
            lof.cmbidestado.disabled=false;
            lof.cmbpais.disabled=false;
                     
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}
		
	function fcancelar()
		{
			lof=document.fmunicipio;
				lof.txtdesc_muni.value="";
				lof.cmbidestado.value="-";
				lof.cmbpais.value="-";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
				lof.txtdesc_muni.disabled=true;
				lof.cmbidestado.disabled=true;
				lof.cmbpais.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}

	function fmodificar()
		{
			lof=document.fmunicipio;
			lof.txtoperacion.value="modificar";
				lof.txtdesc_muni.disabled=false;
				lof.txtdesc_muni.focus();
				lof.cmbidestado.value="<?php print($lsidestado);?>";
				lof.cmbidestado.disabled=false;
				lof.cmbpais.value="<?php print($lsidpais);?>";
				lof.cmbpais.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}


	function feliminar()
		{
			lof=document.fmunicipio;
			if (confirm("¿Desea Desactivar el registro?"))
				{
					lof.txtidmunicipio.disabled=false;
					lof.txtoperacion.value="eliminar";
					lof.submit();
				}
			else
			{
				fcancelar();
			}
		}

	function factivar()
		{
			lof=document.fmunicipio;
			lof.txtidmunicipio.disabled=false;
			if (confirm("¿Desea Activar el registro?"))
				{
					lof.txtoperacion.value="activar";
					lof.submit();
				}
			else
				{
					fcancelar();
				}
		}
	//~ Funcion del onclick , este me permite abrir la ventana emergente, tiene que estar declarado igual que en la parte de arrriba
	var miPopup
		function abremunicipio(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudamunicipio.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>

	<script language="javascript" src="jquery-1.3.2.min.js"></script>
	<script language="javascript">
		$(document).ready(function(){
   			$("#cmbpais").change(function () {
   				$("#cmbpais option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/estados.php", { elegido: elegido }, function(da){
					$("#cmbidestado").html(da);
					$("#cmbciudades").html(data);
					$("#cmbciudades").html("");
					});
        		});
   			})
			// Este puede ponerse en comentario si no se dispone de un 3er combo:
			$("#cmbidestado").change(function () {
   				$("#cmbidestado option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/municipio.php", { elegido: elegido }, function(da){
					$("#cmbciudades").html(da);

					});
        		});
   			})

			$("#cmbciudades").change(function () {
   				$("#cmbciudades option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/parroquias.php", { elegido: elegido }, function(data){
					$("#cmbparroquias").html(data);

					});
        		});
   			})

   			$("#cmbparroquias").change(function () {
   				$("#cmbparroquias option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/ciudad.php", { elegido: elegido }, function(datas){
					$("#cmbsectores").html(datas);

					});
        		});
   			})

		});
	</script>
</script>
</fieldset>
</html>
