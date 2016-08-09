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



	$liidparroquia= isset($_GET['liidparroquia']) ? $_GET['liidparroquia'] : null ;
	$lsdesc_parr= isset($_GET['lsdesc_parr']) ? $_GET['lsdesc_parr'] : null ;
	$lsidmunicipio= isset($_GET['lsidmunicipio']) ? $_GET['lsidmunicipio'] : null ;
	$lsidestado= isset($_GET['lsidestado']) ? $_GET['lsidestado'] : null ;
	$lsidpais= isset($_GET['lsidpais']) ? $_GET['lsidpais'] : null ;
	$lsestatus_par= isset($_GET['lsestatus_par']) ? $_GET['lsestatus_par'] : null ;

	$lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
	$lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
	$lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>

<script type="text/javascript">
	function BuscarAjaxparroquia(valor)
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
					ajax.send("operacion=BusquedaAjaxparroquia&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre
				}
			else if(document.getElementById('est2').checked)
				{ //si esta tildado la caja de inactivos
					ajax.send("operacion=BusquedaAjaxparroquia&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre
				}
			else
				{ //si no esta tildados ni activos ni inactivos
					ajax.send("operacion=BusquedaAjaxparroquia&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
				}	
	}
</script>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Parroquia</div> 
					<div class="panel-options"><a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a><i class="entypo-help" onclick="abreparroquia()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
				</div>
				<div class="panel-body">
					<form method="post" name="fparroquia" action="../controlador/control_maestro_parroquia.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
		<div class="form-group col-lg-1">
	<input type="hidden" name="txtidparroquia" title="Ingrese código de la Región"  maxlength="3" tabindex="1" value="<?php print($liidparroquia);?>" onblur="fperderfocusidparroquia();">
	</div>         

		<div class="form-group col-lg-2">
	<label >País:</label> <br>
	<select id="cmbidpais">

		 <option class="form-control" title="Seleccione un Pais" value="" value="<?php print($lsidpais);?>" >Seleccione</option>;

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
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	

		<div class="form-group col-lg-2">
			<label >Estado:</label>
			<select   name="cmbidestado" id="cmbidestado" >
				<option class="form-control" value="" value="<?php print($lsidestado);?>">Seleccione</option>
				<?php
					$lssql="select idestado,concat(' ',desc_esta) as nombre from estado order by nombre";
					$lobjcombo->fgenerar($lssql,"idestado","nombre","");
				?>
			</select>
		</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
				</div>			</div>		
								<div class="form-group col-lg-2">
			<label >Municipio:</label>
			<select  name="cmbidmunicipio" id="cmbidmunicipio">
				<option class="form-control" value="" value="<?php print($lsidmunicipio);?>" >Seleccione</option>
				<?php
					$lssql="select idmunicipio,concat(' ',desc_muni) as nombre from municipio order by nombre";
					$lobjcombo->fgenerar($lssql,"idmunicipio","nombre","");
				?>
			</select> 
		</div>
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
							 <div class="form-group col-lg-2">
								<label >Nombre:</label>
								<input class="form-control" type="text" name="txtdesc_parr" title="ingrese nombre descriptivo de la región"  maxlength="20" tabindex="1" value="<?php print($lsdesc_parr);?>" onblur="fperderfocusdesc_parr();">
							</div>   
						<div class="form-group col-lg-1">
								<p style="margin-top:28px;text-left;font-size:30px;color:#C60404;">*</p>
							</div>	
						<div class="row">
						<div class="form-group col-lg-3"></div>
							<div class="form-group col-lg-8">
								<label>El campo que contenga un aterisco (*) es un campo obligatorio y debe ser llenado.</label>
							</div>
						</div>
					
						<center>
							<button type="button" name="btnnuevo"     class="btn btn-lg btn-primary"  title="Clic para Registrar" onclick="fnuevo();">Nuevo</button>
							<button type="button" name="btnbuscar"    class="btn btn-lg btn-primary"  title="Clic para Consultar" data-toggle="chat" data-collapse-sidebar="1">Consultar</button>
							<button type="submit" name="btnguardar"   class="btn btn-lg btn-primary"  title="Clic para Guardar" onclick="fguardar();">Guardar</button>
							<button type="button" name="btnmodificar" class="btn btn-lg btn-primary"  title="Clic para Modificar" onclick="fmodificar();" >Modificar</button>
							<?php
								if ($lsestatus_par==1)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Desactivar" onclick="feliminar();" >Desactivar</button>';
									}
								else if ($lsestatus_par==0)
									{
										echo '<button type="button" name="btneliminar" class="btn btn-lg btn-primary" title="Clic para Activar"  onclick="factivar();" >Activar</button>';
									}
							?>
							<button type="reset"  name="btncancelar"  class="btn btn-lg btn-primary" title="Clic para Cancelar"  onclick="cancelar('maestro_parroquia')">Cancelar</button>
						</center>					
					</form>
				
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
						<label>Una Parroquia forma parte de la división territorial de un Municipio</label>
					</div>
			</div>
			</div>
			</div>
			</div>
<script language="javascript">
	finicio();
	function finicio()
		{
		lof=document.fparroquia;
		if (lof.txtoperacion.value=="buscar")
			{
				lof=document.fparroquia;
		            lof.txtdesc_parr.disabled=false;
		            lof.txtdesc_parr.focus();
                    lof.cmbidmunicipio.value="<?php print($lsidmunicipio);?>";
                    lof.cmbidmunicipio.disabled=false;
                    lof.cmbidestado.value="<?php print($lsidestado);?>";
                    lof.cmbidestado.disabled=false;
                    lof.cmbidpais.value="<?php print($lsidpais);?>";
                    lof.cmbidpais.disabled=false;
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
			lof=document.fparroquia;
			lof.txtoperacion.value="incluir";
            lof.txtdesc_parr.disabled=false;
            lof.txtdesc_parr.focus();
            lof.cmbidmunicipio.disabled=false;
            lof.cmbidestado.disabled=false;
            lof.cmbidpais.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}

	function fcancelar()
		{
            lof=document.fparroquia;
            lof.txtdesc_parr.value="";
            lof.cmbidmunicipio.value="-";
            lof.cmbidestado.value="-";
            lof.cmbidpais.value="-";
			lof.txtoperacion.value="";
			lof.txthacer.value="";
			lof.txthay.value=0;
            lof.txtdesc_parr.disabled=true;
            lof.cmbidmunicipio.disabled=true;
            lof.cmbidestado.disabled=true;
            lof.cmbidpais.disabled=true;
			lof.btnguardar.disabled=true;
			lof.btncancelar.disabled=true;
			lof.btnnuevo.disabled=false;
			lof.btnbuscar.disabled=false;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}
	function fmodificar()
		{
			lof=document.fparroquia;
			lof.txtoperacion.value="modificar";
            lof.txtdesc_parr.disabled=false;
            lof.txtdesc_parr.focus();
            lof.cmbidmunicipio.value="<?php print($lsidmunicipio);?>";
            lof.cmbidmunicipio.disabled=false;
            lof.cmbidestado.value="<?php print($lsidestado);?>";
            lof.cmbidestado.disabled=false;
            lof.cmbidpais.value="<?php print($lsidpais);?>";
            lof.cmbidpais.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
		}


	function feliminar()
		{
			lof=document.fparroquia;
			if (confirm("¿Desea Desactivar el registro?"))
				{
					lof.txtidparroquia.disabled=false;
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
			lof=document.fparroquia;
			lof.txtidparroquia.disabled=false;
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
		function abreparroquia(){ //~ luego de 'funcion' se le coloca el nombre que se le dio en el onclick de arriba
		miPopup = window.open("ayuda/ayudaparroquia.php","solicitud","width=450px,height=870px,scrollbars=yes,toolbar=No") //~ aqui se debe colocar la direccion del archivo de la ayuda
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
	<script type="text/javascript">

	fInicio();

	<!-- Abre una Ventana Emergente -->
	var miPopup
	function abreparroquia(){
		miPopup = window.open("busqueda/buscaparroquia.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}

</script>

</fieldset>
</html>
