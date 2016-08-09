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

    $liidrelacion_unidad = isset($_GET['liidrelacion_unidad']) ? $_GET['liidrelacion_unidad'] : null ;
    $lsidestatus= isset($_GET['lsidestatus']) ? $_GET['lsidestatus'] : null ;
    $lsidunidad= isset($_GET['lsidunidad']) ? $_GET['lsidunidad'] : null ;
    $lsplaca_uni= isset($_GET['lsplaca_uni']) ? $_GET['lsplaca_uni'] : null ;
    $lsnombre_mar= isset($_GET['lsnombre_mar']) ? $_GET['lsnombre_mar'] : null ;
    $lsidremolque= isset($_GET['lsidremolque']) ? $_GET['lsidremolque'] : null ;
    $lsplaca_rem= isset($_GET['lsplaca_rem']) ? $_GET['lsplaca_rem'] : null ;
    $lsnombre_marrem= isset($_GET['lsnombre_marrem']) ? $_GET['lsnombre_marrem'] : null ;
    $lsnombre_tipuni= isset($_GET['lsnombre_tipuni']) ? $_GET['lsnombre_tipuni'] : null ;
    $lsnombre_tiprem= isset($_GET['lsnombre_tiprem']) ? $_GET['lsnombre_tiprem'] : null ;
    $lscedula= isset($_GET['lscedula']) ? $_GET['lscedula'] : null ;
    $lsnombres_per= isset($_GET['lsnombres_per']) ? $_GET['lsnombres_per'] : null ;
    $lsapellidos_per= isset($_GET['lsapellidos_per']) ? $_GET['lsapellidos_per'] : null ;
    $lstelefono_corp_per= isset($_GET['lstelefono_corp_per']) ? $_GET['lstelefono_corp_per'] : null ;
    $lshora_rel= isset($_GET['lshora_rel']) ? $_GET['lshora_rel'] : null ;
    $lsfecha_rel= isset($_GET['lsfecha_rel']) ? $_GET['lsfecha_rel'] : null ;
    $lscedula_res= isset($_GET['lscedula_res']) ? $_GET['lscedula_res'] : null ;
    $lsnombre_res= isset($_GET['lsnombre_res']) ? $_GET['lsnombre_res'] : null ;
    $lsapellido_res= isset($_GET['lsapellido_res']) ? $_GET['lsapellido_res'] : null ;
    $lihay= isset($_GET['lihay']) ? $_GET['lihay'] : null ;
    $lihay1= isset($_GET['lihay1']) ? $_GET['lihay1'] : null ;
    $lihay2= isset($_GET['lihay2']) ? $_GET['lihay2'] : null ;
    $lihay3= isset($_GET['lihay3']) ? $_GET['lihay3'] : null ;
    $lshacer= isset($_GET['lshacer']) ? $_GET['lshacer'] : null ;
    $lsoperacion= isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null ;
?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Relacion de Unidades</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a></div>
			</div>
			<div class="panel-body">
					<form method="post" name="freluni" id="freluni" action="../controlador/control_transaccion_reluni.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthay1" value="<?php print($lihay1);?>">
						<input type="hidden" name="txthay2" value="<?php print($lihay2);?>">
						<input type="hidden" name="txthay3" value="<?php print($lihay3);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<input type="hidden" name="txtcedula_res" value="<?php print($lscedula_res);?>">
						<input type="hidden" name="txtnombre_res" value="<?php print($lsnombre_res);?>">
						<input type="hidden" name="txtapellido_res" value="<?php print($lsapellido_res);?>">
						<input type="hidden" name="txthora_rel" value="<?php print($lshora_rel);?>">
						<div class="row">
							<div class="form-group col-lg-3">
							</div>
							<div class="form-group col-lg-3">
							</div>
							<div class="form-group col-lg-3">
									<label>Fecha</label>
									<input class="form-control" readonly type="text" name="txtfecha_rel" value="<?php print($lsfecha_rel);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Estatus</label>
									<input class="form-control" readonly type="text" name="txtidestatus" value="<?php print($lsidestatus);?>">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos del Conductor</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>Cedula</label>
									<input class="form-control" disabled type="text" name="txtcedula"  value="<?php print($lscedula);?>" onblur="fperderfocusidrelacion_unidad();">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<button class="btn btn-primary"  type="button" value="..."  title="Buscar Persona" name="btnAbrepersona"  onclick="abrepersona()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<div class="form-group col-lg-3">
									<label>Nombre</label>
									<input class="form-control" type="text" name="txtnombres_per" readonly value="<?php print($lsnombres_per);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Apellido</label>
									<input class="form-control" readonly type="text" name="txtapellidos_per" value="<?php print($lsapellidos_per);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Telefono</label>
									<input class="form-control" readonly type="text" name="txttelefono_corp_per" value="<?php print($lstelefono_corp_per);?>">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos de la Unidad de Transporte</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>Codigo</label>
									<input class="form-control" readonly type="text" name="txtidunidad" value="<?php print($lsidunidad);?>" onblur="fperderfocusidunidad();">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<button class="btn btn-primary"  type="button" value="..."  title="Buscar Unidad" name="btnAbreunidad"  onclick="abreunidad()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<div class="form-group col-lg-2">
									<label>Placa</label>
									<input class="form-control" readonly type="text" name="txtplaca_uni" value="<?php print($lsplaca_uni);?>" >
							</div>
							<div class="form-group col-lg-3">
									<label>Marca</label>
									<input class="form-control" readonly type="text" name="txtnombre_mar" value="<?php print($lsnombre_mar);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Tipo Unidad</label>
									<input class="form-control" readonly type="text" name="txtnombre_tipuni" value="<?php print($lsnombre_tipuni);?>">
							</div>
							<div class="form-group col-lg-1">
								<label>Borrar</label>
								<button type="button" name="btnBorrarUnidad" class="btn btn-primary" onclick="BorrarUnidad();"><i class='glyphicon glyphicon glyphicon-remove-sign'></i></button>
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos del Remloque</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>Codigo</label>
									<input class="form-control" readonly type="text" name="txtidremolque" value="<?php print($lsidremolque);?>" onblur="fperderfocusidremolque();">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<button class="btn btn-primary"  type="button" value="..."  title="Buscar Remolque" name="btnAbreremolque"  onclick="abreremolque()"><i class="glyphicon glyphicon-search"></i></button>
							</div>
							<div class="form-group col-lg-2">
									<label>Placa</label>
									<input class="form-control" readonly type="text" name="txtplaca_rem" value="<?php print($lsplaca_rem);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Marca</label>
									<input class="form-control" readonly type="text" name="txtnombre_marrem" value="<?php print($lsnombre_marrem);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Tipo Remolque</label>
									<input class="form-control" readonly type="text" name="txtnombre_tiprem" value="<?php print($lsnombre_tiprem);?>">
							</div>
							<div class="form-group col-lg-1">
								<label>Borrar</label>
								<button type="button" name="btnBorrarRemolque" class="btn btn-primary" onclick="BorrarRemolque();"><i class='glyphicon glyphicon glyphicon-remove-sign'></i></button>
							</div>
						

						</div>
						
						<center>
							<input type="button" name="btnnuevo" value="Registrar" class="btn btn-lg btn-primary" tabindex="19" onclick="fnuevo();">
							<input type="button" name="btnguardar" value="Guardar" class="btn btn-lg btn-primary" tabindex="20" onclick="fguardar();">
							<input type="reset" name="btncancelar" value="Cancelar " class="btn btn-lg btn-primary" tabindex="21" onclick="cancelar('transaccion_reluni')">
							<input type="button" name="btnbuscar" value="Buscar" class="btn btn-lg btn-primary" tabindex="22" onclick="fbuscar();">
							<input type="button" name="btnmodificar" value="Modificar" class="btn btn-lg btn-primary" tabindex="23" onclick="fmodificar();" >
							<input type="button" name="btneliminar" value="Eliminar" class="btn btn-lg btn-primary" tabindex="7" onclick="feliminar();" >
							<input type="button" onclick="flistar();" value="Listar" class="btn btn-lg btn-primary" 	/>
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
				<label>Un producto es el elemento principal en el servicio de transporte por lo tanto es un registro obligatorio que debe estar disponible en el registro de la solicitud de transporte</label>
			</div> 
		</div>
	</div> 
</div>
</div>            
<script language="javascript">

			function flistar()
				{
						mipopup = window.open("lista/listareluni.php","miwin","width=1300,height=650,scrollbars=yes");
						mipopup.focus();
				}
		</script>
    <script language="javascript">

        finicio();

        function finicio()
        {
            lof=document.freluni;
            if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo")&&(lof.txtoperacion.value!="buscar1")&&(lof.txtoperacion.value!="buscar2")&&(lof.txtoperacion.value!="buscar3"))
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
            else if (lof.txtoperacion.value=="buscar")
            {
                if ((lof.txthay.value==1)&&(lof.txthacer.value!="incluir"))
                {
                    fexiste();
                }
                else if ((lof.txthay.value==0)&&(lof.txthacer.value!="incluir"))
                {
                    alert("no existe este reluni");
                    fcancelar();

                }
            }
            else if (lof.txtoperacion.value=="buscar1")
            {
                if ((lof.txthay1.value==1)&&(lof.txthacer.value=="incluir"))
                {
                    fnuevo();
                }
                else if ((lof.txthay1.value==0)&&(lof.txthacer.value="incluir"))
                {
                    alert("Remolque presente o asignado en una relacion de unidad");
                    fcancelar();

                }
            }
            else if (lof.txtoperacion.value=="buscar2")
            {
                if ((lof.txthay2.value==1)&&(lof.txthacer.value=="incluir"))
                {
                    fnuevo();
                }
                else if ((lof.txthay2.value==0)&&(lof.txthacer.value="incluir"))
                {
                    alert("Unidad presente o asignada en una relacion de unidad");
                    fcancelar();

                }
            }
            else if (lof.txtoperacion.value=="buscar3")
            {
                if ((lof.txthay3.value==1)&&(lof.txthacer.value=="incluir"))
                {
                    fnuevo();
                }
                else if ((lof.txthay3.value==0)&&(lof.txthacer.value="incluir"))
                {
                    alert("chofer presente en una relacion de unidad");
                    fcancelar();

                }
            }


            else if (lof.txtoperacion.value=="nuevo")
            {
                lof.txtoperacion.value="incluir";
				lof.txtidestatus.value="activa";
                lof.txtidestatus.disabled=true;
				lof.txtidunidad.disabled=false;
				lof.txtplaca_uni.disabled=false;
				lof.txtnombre_mar.disabled=false;
				lof.txtidremolque.disabled=false;
				lof.txtplaca_rem.disabled=false;
				lof.txtnombre_marrem.disabled=false;
				lof.txtnombre_tipuni.disabled=false;
				lof.txtnombre_tiprem.disabled=false;
				lof.txtcedula.disabled=false;
				lof.txtnombres_per.disabled=false;
				lof.txtapellidos_per.disabled=false;
				lof.txttelefono_corp_per.disabled=false;
				lof.txthora_rel.value="<? print date("h:i:s"); ?>"
				lof.txtfecha_rel.value="<? print date("d/m/Y"); ?>"
				lof.txtcedula_res.value="<?=$cedulausuario?>"
				lof.txtnombre_res.value="<?=$nombreusuario?>"
				lof.txtapellido_res.value="<?=$apellidousuario?>";
				lof.btnAbreunidad.disabled=false;
                lof.btnAbreremolque.disabled=false;
                lof.btnAbrepersona.disabled=false;
                lof.btnguardar.disabled=false;
                lof.btncancelar.disabled=false;
                lof.btnnuevo.disabled=true;
                lof.btnbuscar.disabled=true;
                lof.btnmodificar.disabled=true;
                lof.btneliminar.disabled=true;

            }
        }

        function fexiste()
        {
            lof=document.freluni;
            lof.txtoperacion.value="incluir";
            lof.txtidestatus.value="<?php print($lsidestatus);?>";
            lof.txtidestatus.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_mar.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtnombre_marrem.disabled=true;
            lof.txtnombre_tipuni.disabled=true;
            lof.txtnombre_tiprem.disabled=true;
            lof.txtcedula.disabled=true;
            lof.txtnombres_per.disabled=true;
            lof.txtapellidos_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txthora_rel.disabled=true;
            lof.txtfecha_rel.disabled=true;
            lof.txtcedula_res.disabled=true;
            lof.txtnombre_res.disabled=true;
            lof.txtapellido_res.disabled=true;
            lof.btnAbreunidad.disabled=true;
            lof.btnAbreremolque.disabled=true;
            lof.btnAbrepersona.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=false;
            lof.btneliminar.disabled=false;
            lof.btnBorrarUnidad.disabled=true;
            lof.btnBorrarRemolque.disabled=true;

        }


        function fnuevo()
        {
			lof=document.freluni;
			lof.txtoperacion.value="incluir";
			lof.txthacer.value="incluir";
			lof.txtidestatus.value="activa";
			lof.txtidestatus.disabled=true;
			lof.txtidunidad.disabled=false;
			lof.txtplaca_uni.disabled=false;
			lof.txtnombre_mar.disabled=false;
			lof.txtidremolque.disabled=false;
			lof.txtplaca_rem.disabled=false;
			lof.txtnombre_marrem.disabled=false;
			lof.txtnombre_tipuni.disabled=false;
			lof.txtnombre_tiprem.disabled=false;
			lof.txtcedula.disabled=false;
			lof.txtcedula.readOnly=true;
			lof.txtnombres_per.disabled=false;
			lof.txtapellidos_per.disabled=false;
			lof.txttelefono_corp_per.disabled=false;
			lof.txthora_rel.disabled=false;
			lof.txthora_rel.value="<? print date("y/m/d h:i:s"); ?>";
			lof.txtfecha_rel.value="<? print date("d/m/Y "); ?>";
			lof.btnAbreunidad.disabled=false;
			lof.btnAbreremolque.disabled=false;
			lof.btnAbrepersona.disabled=false;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnBorrarUnidad.disabled=false;
            lof.btnBorrarRemolque.disabled=false;
        }

        function fcancelar()
        {
            lof=document.freluni;
            lof.txtidestatus.value="";
            lof.txtidunidad.value="";
            lof.txtplaca_uni.value="";
            lof.txtnombre_mar.value="";
            lof.txtidremolque.value="";
            lof.txtplaca_rem.value="";
            lof.txtnombre_marrem.value="";
            lof.txtnombre_tipuni.value="";
            lof.txtnombre_tiprem.value="";
            lof.txtcedula.value="";
            lof.txtnombres_per.value="";
            lof.txtapellidos_per.value="";
            lof.txttelefono_corp_per.value="";
            lof.txthora_rel.value="";
            lof.txtfecha_rel.value="";
            lof.txtoperacion.value="";
            lof.txthacer.value="";
            lof.txthay.value=0;
            lof.txthay1.value=0;
            lof.txthay2.value=0;
            lof.txthay3.value=0;
            lof.txtidestatus.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_mar.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtnombre_marrem.disabled=true;
            lof.txtnombre_tipuni.disabled=true;
            lof.txtnombre_tiprem.disabled=true;
            lof.txtcedula.disabled=true;
            lof.txtnombres_per.disabled=true;
            lof.txtapellidos_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txthora_rel.disabled=true;
            lof.txtfecha_rel.disabled=true;
            lof.btnAbreunidad.disabled=true;
            lof.btnAbreremolque.disabled=true;
            lof.btnAbrepersona.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=true;
            lof.btnnuevo.disabled=false;
            lof.btnbuscar.disabled=false;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
            lof.btnBorrarUnidad.disabled=true;
            lof.btnBorrarRemolque.disabled=true;
        }

		function BorrarUnidad()
		{
			lof=document.freluni;
			lof.txtidunidad.value="";
			lof.txtplaca_uni.value="";
			lof.txtnombre_mar.value="";
			lof.txtnombre_tipuni.value="";
		}
		function BorrarRemolque()
		{
			lof=document.freluni;
			lof.txtidremolque.value="";
			lof.txtplaca_rem.value="";
			lof.txtnombre_marrem.value="";
			lof.txtnombre_tiprem.value="";
		  
		}

        function fbuscar()
        {
            lof=document.freluni;
            lof.txtcedula.focus();
            lof.txtidestatus.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_mar.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtnombre_marrem.disabled=true;
            lof.txtnombre_tipuni.disabled=true;
            lof.txtnombre_tiprem.disabled=true;
            lof.txtcedula.disabled=false;
            lof.txtcedula.readOnly=false;
            lof.txtnombres_per.disabled=true;
            lof.txtapellidos_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txthora_rel.disabled=true;
            lof.txtfecha_rel.disabled=true;
            lof.txtcedula_res.disabled=true;
            lof.txtnombre_res.disabled=true;
            lof.txtapellido_res.disabled=true;
            lof.btnAbreunidad.disabled=true;
            lof.btnAbreremolque.disabled=true;
            lof.btnAbrepersona.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
        }

		function fmodificar()
		{
			lof=document.freluni;
			lof.txtoperacion.value="modificar";
			lof.txtcedula.disabled=false;
			lof.txtcedula.readOnly=true;
			lof.txtidunidad.disabled=false;
			lof.txtplaca_uni.disabled=false;
			lof.txtnombre_mar.disabled=false;
			lof.txtidremolque.disabled=false;
			lof.txtplaca_rem.disabled=false;
			lof.txtnombre_marrem.disabled=false;
			lof.txtnombre_tipuni.disabled=false;
			lof.txtnombre_tiprem.disabled=false;
			lof.btnAbreunidad.disabled=false;
			lof.btnAbreremolque.disabled=false;
			lof.btnAbrepersona.disabled=true;
			lof.btnguardar.disabled=false;
			lof.btncancelar.disabled=false;
			lof.btnnuevo.disabled=true;
			lof.btnbuscar.disabled=true;
			lof.btnmodificar.disabled=true;
			lof.btneliminar.disabled=true;
			lof.btnBorrarUnidad.disabled=false;
			lof.btnBorrarRemolque.disabled=false;
		}

        function feliminar()
        {
            lof=document.freluni;
            if (confirm("desea eliminar"))
            {
                lof.txtidrelacion_unidad.disabled=false;
                lof.txtoperacion.value="eliminar";
                lof.submit();
            }
            else
            {
                fcancelar();
            }
        }

        function fperderfocusidrelacion_unidad()
        {
            lof=document.freluni;
            if (lof.txtcedula.value!="")
            {
                lof.txtoperacion.value="buscar";
                lof.submit();
            }
            else
            {
                lof.txtcedula.focus();
            }
        }
        function fperderfocusidremolque()
        {
            lof=document.freluni;
            if (lof.txtidremolque.value!="")
            {
                lof.txtoperacion.value="buscar1";
                lof.submit();
            }
            else
            {
                lof.txtidremolque.focus();
            }
        }
        function fperderfocusidunidad()
        {
            lof=document.freluni;
            if (lof.txtidunidad.value!="")
            {
                lof.txtoperacion.value="buscar2";
                lof.submit();
            }
            else
            {
                lof.txtidunidad.focus();
            }
        }
        function fperderfocuscedula()
        {
            lof=document.freluni;
            if (lof.txtcedula.value!="")
            {
                lof.txtoperacion.value="buscar3";
                lof.submit();
            }
            else
            {
                lof.txtcedula.focus();
            }
        }
		function fguardar()
		{
			lof=document.freluni;
			lof.txtidestatus.disabled=false;
			if (fvalidar())
			{
				lof.submit();
			}
		}
        function fvalidar()
        {
            lbbueno=false;
            lof=document.freluni;
            if (lof.txtcedula.value=="")
            {
                alert("Código Relación de Unidad en blanco");
                lof.txtcedula.focus();
            }
            else if (lof.txtidestatus.value=="")
            {
                alert("estatus relacion_unidad en blanco");
                lof.txtidrelacion_unidad.disabled=true;
                lof.txtidestatus.focus();
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
function fInicio(){
	f = document.form_reluni;
	if(f.foco.value=="1"){
		f.btnAbreEquipo.focus();
	}
	if(f.hacer.value=="Listo"){
		alert("Registro Exitoso");
	}
	else if((f.operacion.value=="buscarCliente")&&(f.existe.value==0)){
		f.nombre.focus();
	}
	if((f.operacion.value=="registrarPago")&&(f.existe.value==1)){

	}
}
<!-- Abre una Ventana Emergente -->
var miPopup
function abreunidad(){
    miPopup = window.open("busqueda/CatalogoUnidadReluni.php","unidad","width=850px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}

var miPopup
function abreremolque(){
    miPopup = window.open("busqueda/CatalogoRemolqueReluni.php","remolque","width=850px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}


var miPopup
function abrepersona(){
    miPopup = window.open("busqueda/CatalogoConductorReluni.php","conductor","width=850px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}


function abreSolicitante(){
    miPopup = window.open("buscaPersona.php","miwin","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}

function addProducto(){
	f = document.form_reluni;
	f.action='viscohvestreluni.php';
	if(f.id_equipo.value==""){
		alert("Seleccione el equipo");
		f.id_equipo.focus();
	}
	else if (f.error.value.length==0){
		alert("Indique el Error");
		f.error.focus();
	}
	else if (f.actividad.value.length==0){
		alert("Indique que estuvo realizando antes de que se estropeara el equipo");
		f.actividad.focus();
	}
	else{
		f.submit();
	}
}
function fEliminar(e){
	f = document.pagos;
	f.action="viscohvestreluni.php";
	f.eliminar.value="eliminar";
	f.equipo_eliminar.value=e;
	f.submit();
}
</script><!-- Finaliza la Funcion Javascript -->

</fieldset>
