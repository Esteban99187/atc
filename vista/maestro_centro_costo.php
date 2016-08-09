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
	
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$liidcto = isset($_GET['liidcto']) ? $_GET['liidcto'] : null;
	$lsdesc_cto = isset($_GET['lsdesc_cto']) ? $_GET['lsdesc_cto'] : null;
	$lsmto_cto = isset($_GET['lsmto_cto']) ? $_GET['lsmto_cto'] : null;
	
?>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script src="js/validaciones.js"></script>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading"> 
				<div class="panel-title">Relacion de Gastos</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<form method="post" name="fproducto" id="fproducto" action="../controlador/control_maestro_cencos.php" >
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
					<div class="form-group col-lg-4">
						<label >Código:</label>
						<input class="form-control"  type="text" name="txtidcosto" onkeypress="return soloNumero(event)" title="Ingrese código de producto"  maxlength="3" tabindex="1" value="<?php print($liidcto);?>" onblur="fperderfocusidproducto();">
					</div>
					<div class="form-group col-lg-4">
						<label >Nombre:</label>
						<input class="form-control" onBlur="cambio_mayus(this)" type="text" name="txtdesc_costo"  onkeypress="return soloLetra(event)" title="Ingrese nombre del producto"  maxlength="20" tabindex="1" value="<?php print($lsdesc_cto);?>" onblur="fperderfocusdesc_prod();">
					</div>
					<div class="form-group col-lg-4">
						<label >Monto:</label>
						<input class="form-control"  type="text" name="txtmto_costo"  onkeypress="return soloNumero(event)" title="Ingrese monto"  maxlength="20" tabindex="1" value="<?php print($lsmto_cto);?>" onblur="fperderfocusdesc_prod();">
					</div>
				
						</div>
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="submit" name="btnguardar" value="Guardar " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="reset" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="cancelar('maestro_centro_costo')"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnbuscar" value="Buscar             " class="btn btn-primary" tabindex="22" onclick="fbuscar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnmodificar" value="Modificar             " class="btn btn-primary" tabindex="23" onclick="fmodificar();" ></div>
							<div class="form-group col-lg-1"><input type="button" name="btneliminar" value="Eliminar              " class="btn btn-primary" tabindex="7" onclick="feliminar();" ></div>
							<div class="form-group col-lg-1"><input type="button" onclick="flistar();" value="Listar      " class="btn btn-primary" 	/></div>
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
				<label> La relacion de gastos es un objeto utilizado dentro del tabulador de viaticos para establecer los gastos de pago en una asignacion de viaticos</label>
			</div> 
		</div>
	</div> 
</div>
</div>	
		<script src="js/validaciones.js"></script>
		
		
<script language="javascript">
	finicio();
	function finicio()
	{
		lof=document.fproducto;
		if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo"))
		{
			if (lof.txthacer.value=="listo")
			{
				if (lof.txtoperacion.value=="incluir")
				{
					alert("registro incluido");
				}
				else if (lof.txtoperacion.value=="modificar")
				{
					alert("registro modificado");
				}
				else if (lof.txtoperacion.value=="eliminar")
				{
					alert("registro eliminado");
				}
			}
			if (lof.txthacer.value!="listo"&&lof.txthacer.value!="")
			{
				alert("no se pudo realizar la operación");
			}
			fcancelar();
		}
		else
		{
			if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
			{
				alert("Producto no existe");
				fcancelar();
			}
			else if ((lof.txthay.value==1)&&(lof.txthacer.value=="incluir"))
			{
				fexiste();
			}
			else if ((lof.txthay.value==0)&&(lof.txthacer.value=="incluir"))
			{
				lof.txtoperacion.value="incluir";
				lof.txtidcosto.disabled=true;
				lof.txtdesc_costo.disabled=false;
				lof.txtmto_costo.disabled=false;
				lof.txtdesc_costo.focus();
				
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				lof.btnAbreproducto.disabled=true;
			}
		}
	}
	function fexiste()
	{
		lof=document.fproducto;
		llof.txtidcosto.disabled=true;
		lof.txtdesc_costo.disabled=true;
		lof.txtmto_costo.disabled=true;
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
	}
	function fnuevo()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		
		lof.txtidcosto.value=true;
		lof.txtdesc_costo.disabled=false;
		lof.txtmto_costo.disabled=false;
		lof.submit();
		lof.txtdesc_costo.focus();
		
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreproducto.disabled=true;
	}
	function fcancelar()
	{
		lof=document.fproducto;
		
		lof.txtidcosto.value="";
		lof.txtdesc_costo.value="";
		lof.txtmto_costo.value="";
		
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value="";
		
		lof.txtidcosto.disabled=true;
		lof.txtdesc_costo.disabled=true;
		lof.txtmto_costo.disabled=true,
		
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreproducto.disabled=true;
	}
	function fbuscar()
	{
		lof=document.fproducto;
		lof.txtidcosto.disabled=false;
		lof.txtidcosto.focus();
		lof.txtdesc_costo.disabled=true;
		lof.txtmto_costo.disabled=true,
		
		lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreproducto.disabled=false;
	}
	function fmodificar()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="modificar";
		lof.txtidcosto.disabled=true;
		lof.txtdesc_costo.disabled=false;
		lof.txtdesc_costo.focus();
		lof.txtmto_costo.disabled=false,
		
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		lof.btnAbreproducto.disabled=true;
	}
	function feliminar()
	{
		lof=document.fproducto;
		if (confirm("desea eliminar"))
		{
			lof.txtidcosto.disabled=false;
			lof.txtoperacion.value="eliminar";
			lof.submit();
		}
		else
		{
			fcancelar();
		}
	}
	function fperderfocusidproducto()
	{
		lof=document.fproducto;
		if (lof.txtidcosto.value!="")
		{
			lof.txtoperacion.value="buscar";
			lof.submit();
		}
		else
		{
			lof.txtidcosoto.focus();
		}
	}
	function fguardar()
	{
		lof=document.fproducto;
		lof.txtidcosto.disabled=false;
		
		
	}
	
	
	function flistar()
	{
		mipopup = window.open("lista/listadocencos.php","listacosto","width=1300,height=650,scrollbars=yes");
		mipopup.focus();
	}
	function fayuda()
	{
		mipopup = window.open("ayuda/ayudaproducto.php","ventanaayuda","width=550,height=650,scrollbars=yes");
		mipopup.focus();
	}
	var miPopup
		function abreproducto(){
		miPopup = window.open("busqueda/buscaproducto.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
		miPopup.focus()
	}
</script>
