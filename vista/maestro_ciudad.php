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
   $liidciudad= isset($_GET['liidciudad']) ? $_GET['liidciudad'] : null ;
   $lsdesc_ciud= isset($_GET['lsdesc_ciud']) ? $_GET['lsdesc_ciud'] : null ;
   $lsidparroquia= isset($_GET['lsidparroquia']) ? $_GET['lsidparroquia'] : null ;
   $lsidmunicipio= isset($_GET['lsidmunicipio']) ? $_GET['lsidmunicipio'] : null ;
   $lsidestado= isset($_GET['lsidestado']) ? $_GET['lsidestado'] : null ;
   $lsidpais= isset($_GET['lsidpais']) ? $_GET['lsidpais'] : null ;
   $lscodi_posta_ciu= isset($_GET['lscodi_posta_ciu']) ? $_GET['lscodi_posta_ciu'] : null ;
   $lsestatus_ciu= isset($_GET['lsestatus_ciu']) ? $_GET['lsestatus_ciu'] : null ;
   $lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
   $lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
   $lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;

?>
<script type="text/javascript">
	function BuscarAjaxciudad(valor)
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
					ajax.send("operacion=BusquedaAjaxciudad&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre
				}
			else
				{ //si no esta tildados ni activos ni inactivos
					ajax.send("operacion=BusquedaAjaxciudad&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
				}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Ciudad</div> 
					<div class="panel-options"><a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a><i class="entypo-help" onclick="abreciudad()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
				</div>
				<div class="panel-body">
					<form method="post" name="fciudad" id="fciudad" action="../controlador/control_maestro_ciudad.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
						<div class="form-group col-lg-2">
						<input class="form-control"  type="hidden" name="txtidciudad" title="ingrese codigo de la ciudad"  maxlength="3" tabindex="1" value="<?php print($liidciudad);?>" onblur="fperderfocusidciudad();">
						</div>
                            <div class="form-group col-lg-2">
								<label>Pais</label>
								<select  class="form-control" title="Seleccione un Pais. Ej: Venezuela"  name="cmbidpais" id="cmbidpais">
									<option value="-" value="<?php print($lsidpais);?>" >Seleccione</option>
										<?php
											$lssql="select idpais,concat(' ',desc_pais) as nombre from pais order by nombre";
											$lobjcombo->fgenerar($lssql,"idpais","nombre","");
										?>
								</select>
							</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="form-group col-lg-2">
								<label>Estado</label>
							<select  class="form-control" title="Seleccione un Estado. Ej: Portuguesa"  name="cmbidestado" id="cmbidestado">
								<option value="-" value="<?php print($lsidestado);?>" >Seleccione</option>
									<?php
										$lssql="select idestado,concat(' ',desc_esta) as nombre from estado order by nombre";
										$lobjcombo->fgenerar($lssql,"idestado","nombre","");
									?>
							</select>
							</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	

							<div class="form-group col-lg-2">
								<label>Municipio</label>

							<select class="form-control" title="Seleccione un Municipio. Ej: Páez"  name="cmbidmunicipio" id="cmbidmunicipio">
								<option value="-" value="<?php print($lsidmunicipio);?>" >Seleccione</option>
									<?php
										$lssql="select idmunicipio,concat(' ',desc_muni) as nombre from municipio order by nombre";
										$lobjcombo->fgenerar($lssql,"idmunicipio","nombre","");
									?>
							</select>
						</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							</div>	
							<div class="form-group col-lg-2">
							</div>	
							<div class="form-group col-lg-2">
								<label>Parroquia</label>
                            
							<select  class="form-control" title="Seleccione un Parroquia. Ej: Acarigua" name="cmbidparroquia" id="cmbidparroquia" >
								<option value="-" value="<?php print($lsidparroquia);?>" >Seleccione</option>
									<?php
										$lssql="select idparroquia,concat(' ',desc_parr) as nombre from parroquia order by nombre";
										$lobjcombo->fgenerar($lssql,"idparroquia","nombre","");
								   ?>
							</select>
							</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="form-group col-lg-3">
								<label >Nombre</label>
							<input class="form-control"  onBlur="cambio_mayus(this)" placeholder="Solo Ingrese Letras" title="Ingrese nombre de la ciudad. Ej: Araure" type="text" name="txtdesc_ciud" onkeypress="return soloLetra(event)" title="ingrese nombre descriptivo de la ciudad" maxlength="50"  tabindex="2"  value="<?php print($lsdesc_ciud);?>"> 
                            </div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							<div class="form-group col-lg-2">
								<label >Codigo Postal:</label>
							<input class="form-control"  type="text" name="txtcodi_posta_ciu" title="Ingrese código postal perteneciente a la Ciudad" maxlength="50"  tabindex="2"  value="<?php print($lscodi_posta_ciu);?>"> 
                              </div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
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
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
								if ($lsestatus_ciu==1)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
									}
								else if ($lsestatus_ciu==0)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
									}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_ciudad')">Cancelar</button>
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
						<label>Una Ciudad forma parte de la división territorial de una Parroquia</label>
					</div>
			</div>
			</div>
			</div>
			</div>

<script language="javascript">
	finicio();
	function finicio()
		{
		lof=document.fciudad;
		if (lof.txtoperacion.value=="buscar")
			{
				lof=document.fciudad;
					lof.txtdesc_ciud.disabled=true;
                    lof.txtdesc_ciud.focus();
                    lof.cmbidparroquia.value="<?php print($lsidparroquia);?>";
                    lof.cmbidparroquia.disabled=true;
                    lof.cmbidmunicipio.value="<?php print($lsidmunicipio);?>";
                    lof.cmbidmunicipio.disabled=true;
                    lof.cmbidestado.value="<?php print($lsidestado);?>";
                    lof.cmbidestado.disabled=true;
                    lof.cmbidpais.value="<?php print($lsidpais);?>";
                    lof.cmbidpais.disabled=true;
                    lof.txtcodi_posta_ciu.disabled=true;		
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
			lof=document.fciudad;
			lof.txtoperacion.value="incluir";
			lof.txtdesc_ciud.disabled=false;
            lof.txtdesc_ciud.focus();
            lof.cmbidparroquia.disabled=false;
            lof.cmbidmunicipio.disabled=false;
            lof.cmbidestado.disabled=false;
            lof.cmbidpais.disabled=false;
            lof.txtcodi_posta_ciu.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}
		
	function fcancelar()
		{
			lof=document.fciudad;
				lof.txtdesc_ciud.value="";
				lof.cmbidparroquia.value="-";
				lof.cmbidmunicipio.value="-";
				lof.cmbidestado.value="-";
				lof.cmbidpais.value="-";
				lof.txtcodi_posta_ciu.value="";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
				lof.txtdesc_ciud.disabled=true;
				lof.cmbidparroquia.disabled=true;
				lof.cmbidmunicipio.disabled=true;
				lof.cmbidestado.disabled=true;
				lof.cmbidpais.disabled=true;
				lof.txtcodi_posta_ciu.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}
		

	function fmodificar()
		{
			lof=document.fciudad;
			lof.txtoperacion.value="modificar";
				lof.txtdesc_ciud.disabled=false;
				lof.txtdesc_ciud.focus();
				lof.cmbidparroquia.value="<?php print($lsidparroquia);?>";
				lof.cmbidparroquia.disabled=false;
				lof.cmbidmunicipio.value="<?php print($lsidmunicipio);?>";
				lof.cmbidmunicipio.disabled=false;
				lof.cmbidestado.value="<?php print($lsidestado);?>";
				lof.cmbidestado.disabled=false;
				lof.cmbidpais.value="<?php print($lsidpais);?>";
				lof.cmbidpais.disabled=false;
				lof.txtcodi_posta_ciu.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}

	function feliminar()
		{
			lof=document.fciudad;
			if (confirm("¿Desea Desactivar el registro?"))
				{
					lof.txtidciudad.disabled=false;
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
			lof=document.fciudad;
			lof.txtidciudad.disabled=false;
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
		function abreciudad(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaciudad.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
		miPopup.focus()
	}
</script>
<script language="javascript" src="jquery-1.3.2.min.js"></script>
	<script language="javascript">
		$(document).ready(function(){
   			$("#cmbidpais").change(function () {
   				$("#cmbidpais option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/estados.php", { elegido: elegido }, function(da){
					$("#cmbidestado").html(da);
					$("#cmbidmunicipio").html(data);
					$("#cmbidmunicipio").html("");
					});
        		});
   			})
			// Este puede ponerse en comentario si no se dispone de un 3er combo:
			$("#cmbidestado").change(function () {
   				$("#cmbidestado option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/municipio.php", { elegido: elegido }, function(da){
					$("#cmbidmunicipio").html(da);

					});
        		});
   			})

			$("#cmbidmunicipio").change(function () {
   				$("#cmbidmunicipio option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/parroquias.php", { elegido: elegido }, function(data){
					$("#cmbidparroquia").html(data);

					});
        		});
   			})

   			$("#cmbidparroquia").change(function () {
   				$("#cmbidparroquia option:selected").each(function () {
					elegido=$(this).val();
					$.post("../modelo/ciudad.php", { elegido: elegido }, function(datas){
					$("#cmbsectores").html(datas);

					});
        		});
   			})

		});
	</script>
</fieldset>
</html>
