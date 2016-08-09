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
	$liidorden_carga = isset($_GET['liidorden_carga']) ? $_GET['liidorden_carga'] : null;
	$lsidestatus_ordcar = isset($_GET['lsidestatus_ordcar']) ? $_GET['lsidestatus_ordcar'] : null;
	$lsidempresa = isset($_GET['lsidempresa']) ? $_GET['lsidempresa'] : null;
	$lsnombre_razon_social_emp = isset($_GET['lsnombre_razon_social_emp']) ? $_GET['lsnombre_razon_social_emp'] : null;
	$lsidremolque = isset($_GET['lsidremolque']) ? $_GET['lsidremolque'] : null;
	$lsplaca_rem = isset($_GET['lsplaca_rem']) ? $_GET['lsplaca_rem'] : null;
	$lsidsolicitud = isset($_GET['lsidsolicitud']) ? $_GET['lsidsolicitud'] : null;
	$lsnombre_pro = isset($_GET['lsnombre_pro']) ? $_GET['lsnombre_pro'] : null;
	$lstelefono_emp = isset($_GET['lstelefono_emp']) ? $_GET['lstelefono_emp'] : null;
	$lsplaca_uni = isset($_GET['lsplaca_uni']) ? $_GET['lsplaca_uni'] : null;
	$lsnombre_unimed = isset($_GET['lsnombre_unimed']) ? $_GET['lsnombre_unimed'] : null;
	$lspeso_sol = isset($_GET['lspeso_sol']) ? $_GET['lspeso_sol'] : null;
	$lscedula = isset($_GET['lscedula']) ? $_GET['lscedula'] : null;
	$lsidrelacion_unidad = isset($_GET['lsidrelacion_unidad']) ? $_GET['lsidrelacion_unidad'] : null;
	$lsnombres_per = isset($_GET['lsnombres_per']) ? $_GET['lsnombres_per'] : null;
	$lstelefono_corp_per = isset($_GET['lstelefono_corp_per']) ? $_GET['lstelefono_corp_per'] : null;
	$lsidunidad = isset($_GET['lsidunidad']) ? $_GET['lsidunidad'] : null;
	$lsdireccion_salida = isset($_GET['lsdireccion_salida']) ? $_GET['lsdireccion_salida'] : null;
	$lsdireccion_entrega = isset($_GET['lsdireccion_entrega']) ? $_GET['lsdireccion_entrega'] : null;
	$lsfecha_salida = isset($_GET['lsfecha_salida']) ? $_GET['lsfecha_salida'] : null;
	$lsfecha_entrega = isset($_GET['lsfecha_entrega']) ? $_GET['lsfecha_entrega'] : null;
	$lshora_ord = isset($_GET['lshora_ord']) ? $_GET['lshora_ord'] : null;
	$lsfecha_ord = isset($_GET['lsfecha_ord']) ? $_GET['lsfecha_ord'] : null;
	$lscedula_rep_ord = isset($_GET['lscedula_rep_ord']) ? $_GET['lscedula_rep_ord'] : null;
	$lsnombre_rep_ord = isset($_GET['lsnombre_rep_ord']) ? $_GET['lsnombre_rep_ord'] : null;
	$lsapellido_rep_ord = isset($_GET['lsapellido_rep_ord']) ? $_GET['lsapellido_rep_ord'] : null;
	$lihay1 = isset($_GET['lihay1']) ? $_GET['lihay1'] : null;
	$lihay2 = isset($_GET['lihay2']) ? $_GET['lihay2'] : null;
?>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Orden de Carga</strong></div>
				<div class="panel-body">
                        <form method="post" name="form1" action="../controlador/control_transaccion_ordcar.php">
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthay1" value="<?php print($lihay1);?>">
						<input type="hidden" name="txthay2" value="<?php print($lihay2);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-3">
									<label>Numero</label>
									<input class="form-control" type="text" name="txtidorden_carga"   value="<?php print($liidorden_carga);?>" onblur="fperderfocusidorden_carga();">
							</div>
							<div class="form-group col-lg-3">
									<label>Fecha</label>
									<input class="form-control" readonly type="text" name="txtfecha_ord"  value="<?php print($lsfecha_ord);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Hora</label>
									<input class="form-control" readonly type="text" name="txthora_ord"  value="<?php print($lshora_ord);?>">
							</div>
							
							<div class="form-group col-lg-2">
									<label>Estatus</label>
									<input class="form-control" readonly type="text" name="txtidestatus_ordcar"   value="<?php print($lsidestatus_ordcar);?>" >
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<INPUT class="btn btn-primary" type="button" value="..."  title="Buscar Orden de Carga" name="btnAbreorden_carga" onclick="abreorden_carga()">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos de la Solicitud</h5></center><hr>
							<div class="form-group col-lg-2">
									<label>Numero</label>
									<input class="form-control" type="text" name="txtidsolicitud"   value="<?php print($lsidsolicitud);?>"  onblur="fperderfocusidsolicitud();">
							</div>
							<div class="form-group col-lg-3">
									<label>Nombre o Razon Social</label>
									<input class="form-control" readonly type="text" name="txtnombre_razon_social_emp"  value="<?php print($lsnombre_razon_social_emp);?>" >
							</div>
							<div class="form-group col-lg-3">
									<label>RIF</label>
									<input class="form-control" readonly type="text" name="txtidempresa"  value="<?php print($lsidempresa);?>">
							</div>
							
							<div class="form-group col-lg-3">
									<label>Telefono</label>
									<input class="form-control" readonly type="text" name="txttelefono_emp"  value="<?php print($lstelefono_emp);?>">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<INPUT class="btn btn-primary" type="button" value="..."   name="btnAbresolicitud" onclick="abresolicitud()">
							</div>
							<div class="form-group col-lg-4">
									<label>Nombre</label>
									<input class="form-control" readonly type="text" name="txtnombre_pro" value="<?php print($lsnombre_pro);?>">
							</div>
							<div class="form-group col-lg-4">
									<label>Peso</label>
									<input class="form-control" readonly type="text" name="txtpeso_sol"  value="<?php print($lspeso_sol);?>">
							</div>
							<div class="form-group col-lg-4">
									<label>Unidad de Medida</label>
									<input class="form-control" readonly type="text" name="txtnombre_unimed"  value="<?php print($lsnombre_unimed);?>"> 
							</div>
							<div class="form-group col-lg-3">
									<label>Fecha Salida</label>
									<input class="form-control" readonly type="text" name="txtfecha_salida"   value="<?php print($lsfecha_salida);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Dirección Salida</label>
									<input class="form-control" readonly type="text" name="txtdireccion_salida"   value="<?php print($lsdireccion_salida);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Fecha Entrega</label>
									<input class="form-control" readonly type="text" name="txtfecha_entrega"   value="<?php print($lsfecha_entrega);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Direccion Entrega</label>
									<input class="form-control" readonly type="text" name="txtdireccion_entrega"   value="<?php print($lsdireccion_entrega);?>">
							</div>
						</div>
						<div class="row"><hr><h5><center>Datos del Conductor</h5></center><hr>
							<div class="form-group col-lg-3">
									<label>Cedula</label>
									<input class="form-control" type="text" name="txtcedula"  value="<?php print($lscedula);?>" onblur="fperderfocuscedula();">
							</div>
							<div class="form-group col-lg-5">
									<label>Nombre</label>
									<input class="form-control" readonly type="text" name="txtnombres_per"   value="<?php print($lsnombres_per);?>">
							</div>
							<div class="form-group col-lg-3">
									<label>Telefono</label>
									<input class="form-control" readonly type="text" name="txttelefono_corp_per" value="<?php print($lstelefono_corp_per);?>">
							</div>
							<div class="form-group col-lg-1">
									<label>Catalogo</label>
									<INPUT class="btn btn-primary" type="button" value="..."   name="btnAbrereluni" onclick="abrereluni()">
							</div>
							<div class="form-group col-lg-3">
									<label>Codigo Relacion de Unidad</label>
									<input class="form-control" readonly type="text" name="txtidrelacion_unidad"  value="<?php print($lsidrelacion_unidad);?>" >
							</div>
							<div class="form-group col-lg-2">
									<label>Codigo Unidad</label>
									<input class="form-control" readonly type="text" name="txtidunidad" value="<?php print($lsidunidad);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Placa Unidad</label>
									<input class="form-control" readonly type="text" name="txtplaca_uni" value="<?php print($lsplaca_uni);?>"> 
							</div>
							<div class="form-group col-lg-3">
									<label>Codigo Remolque</label>
									<input class="form-control" readonly type="text" name="txtidremolque" value="<?php print($lsidremolque);?>">
							</div>
							<div class="form-group col-lg-2">
									<label>Placa Remolque</label>
									<input class="form-control" readonly type="text" name="txtplaca_rem" value="<?php print($lsplaca_rem);?>">
							</div>
						</div>
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnguardar" value="Guardar" class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btncancelar" value="Cancelar" class="btn btn-primary" tabindex="21" onclick="fcancelar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnbuscar" value="Buscar" class="btn btn-primary" tabindex="22" onclick="fbuscar();"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnmodificar" value="Modificar" class="btn btn-primary" tabindex="23" onclick="fmodificar();" ></div>
							<div class="form-group col-lg-1"><input type="button" name="btneliminar" value="Eliminar" class="btn btn-primary" tabindex="7" onclick="feliminar();" ></div>
							<div class="form-group col-lg-1"><input type="button" onclick="flistar();" value="Listar" class="btn btn-primary" 	/></div>
						 </center> 

            </form>
            	</div>
			</div>
		</div>
	</div>
</div>	

             <script language="javascript">

                               function flistar()
                                   {
                                           mipopup = window.open("lista/listaordencar.php","miwin","width=1300,height=650,scrollbars=yes");
                                           mipopup.focus();
                                   }
                   </script>
                         <script language="javascript">

                                function fayuda()
                                    {
                                            mipopup = window.open("ayuda/ayudaordcar.php","miwin","width=550,height=650,scrollbars=yes");
                                            mipopup.focus();
                                    }
                    </script>


    <script language="javascript">

        finicio();

        function finicio()
        {
            lof=document.form1;
            if ((lof.txtoperacion.value!="buscar")&&(lof.txtoperacion.value!="nuevo")&&(lof.txtoperacion.value!="buscar1")&&(lof.txtoperacion.value!="buscar2"))
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
                    alert("no existe este ordcar");
                    fcancelar();

                }
            }
            else if (lof.txtoperacion.value=="buscar1")
            {
                if ((lof.txthay1.value==1)&&(lof.txthacer.value="incluir"))
                {
                    fnuevo();
                }
                else if ((lof.txthay1.value==0)&&(lof.txthacer.value="incluir"))
                {
                    alert("No existe esta solicitud");
                    fcancelar();

                }
            }
            else if (lof.txtoperacion.value=="buscar2")
            {
                if ((lof.txthay2.value==1)&&(lof.txthacer.value="incluir"))
                {
                    fnuevo();
                }
                else if ((lof.txthay2.value==0)&&(lof.txthacer.value="incluir"))
                {
                    alert("No existe este conductor");
                    fcancelar();

                }
            }

            else if (lof.txtoperacion.value=="nuevo")
            {
                lof.txtoperacion.value="incluir";
                lof.txtidorden_carga.disabled=true;
                lof.txtidestatus_ordcar.value="Emitida";
                lof.txtidempresa.disable=false;
                lof.txtnombre_razon_social_emp.disable=false;
                lof.txtidremolque.disable=false;
                lof.txtplaca_rem.disable=false;
                lof.txtidsolicitud.disable=false;
                lof.txtnombre_pro.disable=false;
                lof.txttelefono_emp.disable=false;
                lof.txtplaca_uni.disable=false;
                lof.txtnombre_unimed.disable=false;
                lof.txtpeso_sol.disable=false;
                lof.txtcedula.disable=false;
                lof.txtnombres_per.disable=false;
                lof.txttelefono_corp_per.disable=false;
                lof.txtidunidad.disable=false;
                lof.txtdireccion_salida.disable=false;
                lof.txtdireccion_entrega.disable=false;
                lof.txtfecha_salida.disable=false;
                lof.txtfecha_entrega.disable=false;
				lof.txthora_ord.value="<? print date("h:i:s"); ?>"
				lof.txtfecha_ord.value="<? print date("d/m/Y"); ?>"
				lof.txtcedula_rep_ord.value="<?=$cedulausuario?>"
				lof.txtnombre_rep_ord.value="<?=$nombreusuario?>"
				lof.txtapellido_rep_ord.value="<?=$apellidousuario?>"
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
            lof=document.form1;
            lof.txtidorden_carga.disabled=true;
            lof.txtidestatus_ordcar.value="<?php print($lsidestatus_ordcar);?>";
			lof.txtidestatus_ordcar.disabled=true;
            lof.txtidempresa.disabled=true;
            lof.txtnombre_razon_social_emp.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtidsolicitud.disabled=true;
            lof.txtnombre_pro.disabled=true;
            lof.txttelefono_emp.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_unimed.disabled=true;
            lof.txtpeso_sol.disabled=true;
            lof.txtcedula.disabled=true;
            lof.txtnombres_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtdireccion_salida.disabled=true;
            lof.txtdireccion_entrega.disabled=true;
            lof.txtfecha_salida.disabled=true;
            lof.txtfecha_entrega.disabled=true;
            lof.txthora_ord.disabled=true;
            lof.txtfecha_ord.disabled=true;
            lof.txtcedula_rep_ord.disabled=true;
            lof.txtnombre_rep_ord.disabled=true;
            lof.txtapellido_rep_ord.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=false;
            lof.btneliminar.disabled=false;

        }

        function fnuevo()
        {
            lof=document.form1;
            lof.txtoperacion.value="nuevo";
            lof.txthacer.value="incluir";
            lof.submit();
            lof.txtidorden_carga.disabled=true;
            lof.txtidestatus_ordcar.disabled=false;
            lof.txtidestatus_ordcar.focus();
            lof.txtidempresa.disabled=false;
            lof.txtnombre_razon_social_emp.disabled=false;
            lof.txtidremolque.disabled=false;
            lof.txtplaca_rem.disabled=false;
            lof.txtidsolicitud.disabled=false;
            lof.txtnombre_pro.disabled=false;
            lof.txttelefono_emp.disabled=false;
            lof.txtplaca_uni.disabled=false;
            lof.txtnombre_unimed.disabled=false;
            lof.txtpeso_sol.disabled=false;
            lof.txtcedula.disabled=false;
            lof.txtnombres_per.disabled=false;
            lof.txttelefono_corp_per.disabled=false;
            lof.txtidunidad.disabled=false;
            lof.txtdireccion_salida.disabled=false;
            lof.txtdireccion_entrega.disabled=false;
            lof.txtfecha_salida.disabled=false;
            lof.txtfecha_entrega.disabled=false;
            lof.txthora_ord.disabled=false;
            lof.txtfecha_ord.disabled=false;
            lof.txtcedula_rep_ord.disabled=false;
            lof.txtnombre_rep_ord.disabled=false;
            lof.txtapellido_rep_ord.disabled=false;
            lof.btnguardar.disabled=false;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
        }

        function fcancelar()
        {
            lof=document.form1;
            lof.txtidorden_carga.value="";
            lof.txtidestatus_ordcar.value="";
            lof.txtidempresa.value="";
            lof.txtnombre_razon_social_emp.value="";
            lof.txtidremolque.value="";
            lof.txtplaca_rem.value="";
            lof.txtidsolicitud.value="";
            lof.txtnombre_pro.value="";
            lof.txttelefono_emp.value="";
            lof.txtplaca_uni.value="";
            lof.txtnombre_unimed.value="";
            lof.txtpeso_sol.value="";
            lof.txtcedula.value="";
            lof.txtnombres_per.value="";
            lof.txttelefono_corp_per.value="";
            lof.txtidunidad.value="";
            lof.txtdireccion_salida.value="";
            lof.txtdireccion_entrega.value="";
            lof.txtfecha_salida.value="";
            lof.txtfecha_entrega.value="";
            lof.txthora_ord.value="";
            lof.txtfecha_ord.value="";
            lof.txtoperacion.value="";
            lof.txthacer.value="";
            lof.txthay.value=0;
            lof.txthay1.value=0;
            lof.txthay2.value=0;
            lof.txtidorden_carga.disabled=true;
            lof.txtidestatus_ordcar.disabled=true;
            lof.txtidempresa.disabled=true;
            lof.txtnombre_razon_social_emp.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtidsolicitud.disabled=true;
            lof.txtnombre_pro.disabled=true;
            lof.txttelefono_emp.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_unimed.disabled=true;
            lof.txtpeso_sol.disabled=true;
            lof.txtcedula.disabled=true;
            lof.txtnombres_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtdireccion_salida.disabled=true;
            lof.txtdireccion_entrega.disabled=true;
            lof.txtfecha_salida.disabled=true;
            lof.txtfecha_entrega.disabled=true;
            lof.txthora_ord.disabled=true;
            lof.txtfecha_ord.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=true;
            lof.btnnuevo.disabled=false;
            lof.btnbuscar.disabled=false;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
        }

        function fbuscar()
        {
            lof=document.form1;
            lof.txtidorden_carga.disabled=false;
            lof.txtidorden_carga.focus();
            lof.txtidestatus_ordcar.disabled=true;
            lof.txtidempresa.disabled=true;
            lof.txtnombre_razon_social_emp.disabled=true;
            lof.txtidremolque.disabled=true;
            lof.txtplaca_rem.disabled=true;
            lof.txtidsolicitud.disabled=true;
            lof.txtnombre_pro.disabled=true;
            lof.txttelefono_emp.disabled=true;
            lof.txtplaca_uni.disabled=true;
            lof.txtnombre_unimed.disabled=true;
            lof.txtpeso_sol.disabled=true;
            lof.txtcedula.disabled=true;
            lof.txtnombres_per.disabled=true;
            lof.txttelefono_corp_per.disabled=true;
            lof.txtidunidad.disabled=true;
            lof.txtdireccion_salida.disabled=true;
            lof.txtdireccion_entrega.disabled=true;
            lof.txtfecha_salida.disabled=true;
            lof.txtfecha_entrega.disabled=true;
            lof.txthora_ord.disabled=true;
            lof.txtfecha_ord.disabled=true;
            lof.txtcedula_rep_ord.disabled=true;
            lof.txtnombre_rep_ord.disabled=true;
            lof.txtapellido_rep_ord.disabled=true;
            lof.btnguardar.disabled=true;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
        }

        function fmodificar()
        {
            lof=document.form1;
            lof.txtoperacion.value="modificar";
            lof.txtidorden_carga.disabled=true;
            lof.txtidestatus_ordcar.disabled=false;
            lof.txtidestatus_ordcar.focus();
            lof.txtidempresa.disabled=false;
            lof.txtnombre_razon_social_emp.disabled=false;
            lof.txtidremolque.disabled=false;
            lof.txtplaca_rem.disabled=false;
            lof.txtidsolicitud.disabled=true;
            lof.txtnombre_pro.disabled=false;
            lof.txttelefono_emp.disabled=false;
            lof.txtplaca_uni.disabled=false;
            lof.txtnombre_unimed.disabled=false;
            lof.txtpeso_sol.disabled=false;
            lof.txtcedula.disabled=false;
            lof.txtnombres_per.disabled=false;
            lof.txttelefono_corp_per.disabled=false;
            lof.txtidunidad.disabled=false;
            lof.txtdireccion_salida.disabled=false;
            lof.txtdireccion_entrega.disabled=false;
            lof.txtfecha_salida.disabled=false;
            lof.txtfecha_entrega.disabled=false;
            lof.txthora_ord.disabled=false;
            lof.txtfecha_ord.disabled=false;
            lof.txtcedula_rep_ord.disabled=false;
            lof.txtnombre_rep_ord.disabled=false;
            lof.txtapellido_rep_ord.disabled=false;
            lof.btnguardar.disabled=false;
            lof.btncancelar.disabled=false;
            lof.btnnuevo.disabled=true;
            lof.btnbuscar.disabled=true;
            lof.btnmodificar.disabled=true;
            lof.btneliminar.disabled=true;
        }

        function feliminar()
        {
            lof=document.form1;
            if (confirm("desea eliminar"))
            {
                lof.txtidorden_carga.disabled=false;
                lof.txtoperacion.value="eliminar";
                lof.submit();
            }
            else
            {
                fcancelar();
            }
        }

        function fperderfocusidorden_carga()
        {
            lof=document.form1;
            if (lof.txtidorden_carga.value!="")
            {
                lof.txtoperacion.value="buscar";
                lof.submit();
            }
            else
            {
                lof.txtidorden_carga.focus();
            }
        }
        function fperderfocusidsolicitud()
        {
            lof=document.form1;
            if (lof.txtidsolicitud.value!="")
            {
                lof.txtoperacion.value="buscar1";
                lof.submit();
            }
            else
            {
                lof.txtidsolicitud.focus();
            }
        }
        function fperderfocuscedula()
        {
            lof=document.form1;
            if (lof.txtcedula.value!="")
            {
                lof.txtoperacion.value="buscar2";
                lof.submit();
            }
            else
            {
                lof.txtcedula.focus();
            }
        }

        function fguardar()
        {
            lof=document.form1;
            lof.txtidorden_carga.disabled=false;
            if (fvalidar())
            {
                lof.submit();
            }
        }

        function fvalidar()
        {
            lbbueno=false;
            lof=document.form1;
            if (lof.txtidorden_carga.value=="")
            {
                alert("Código orden de carga en blanco");
                lof.txtidorden_carga.focus();
            }

            else if (lof.txtidestatus_ordcar.value=="-")
            {
                alert("Estatus orden de carga en blanco");
                lof.txtidorden_carga.disabled=true;
                lof.txtidestatus_ordcar.focus();
            }
            else if (lof.txtidsolicitud.value=="")
            {
                alert("Código de la Solicitud en blanco");
                lof.txtidsolicitud.focus ();
            }

            else if (lof.txtcedula.value=="")
            {
                alert("Cédula del Conductor en blanco");
                lof.txtcedula.focus ();
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
	f = document.form_ordcar;
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
function abreorden_carga(){
    miPopup = window.open("busqueda/buscaorden_carga.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}
var miPopup
function abresolicitud(){
    miPopup = window.open("busqueda/buscasolicitud.php","solicitud","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}

var miPopup
function abrereluni(){
    miPopup = window.open("busqueda/buscareluni.php","relaciondeunidad","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}


var miPopup
function abretabulador(){
    miPopup = window.open("busqueda/buscatabulador.php","tabulador","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}


function abreSolicitante(){
    miPopup = window.open("buscaPersona.php","miwin","width=650px,height=270px,scrollbars=yes,toolbar=No")
    miPopup.focus()
}

function addProducto(){
	f = document.form_ordcar;
	f.action='viscohvestordcar.php';
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
	f.action="viscohvestordcar.php";
	f.eliminar.value="eliminar";
	f.equipo_eliminar.value=e;
	f.submit();
}
</script><!-- Finaliza la Funcion Javascript -->


</fieldset>
