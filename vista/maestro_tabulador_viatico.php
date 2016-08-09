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
	include_once ("../modelo/class_costo.php");
	include_once ("../modelo/class_tabviatico.php");
	defined("SYSPATH") or die("No direct script access.");
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	require_once("../modelo/clscombo.php");
	$lobjcombo= new clscombo();
	
	$lsoperacion = isset($_GET['lsoperacion']) ? $_GET['lsoperacion'] : null;
	$lshacer = isset($_GET['lshacer']) ? $_GET['lshacer'] : null;
	$lihay = isset($_GET['lihay']) ? $_GET['lihay'] : null;
	$idtabulador = isset($_GET['idtabulador']) ? $_GET['idtabulador'] : null;
	$diastabulador = isset($_GET['diastabulador']) ? $_GET['diastabulador'] : null;
	$rutatabulador = isset($_GET['rutatabulador']) ? $_GET['rutatabulador'] : null;
	
	$clsCosto = new class_costo();
	
	$datosCosto=$clsCosto->listarCombo();
	
	$contador = 0;
	$total_tabulador=0;
	if($lsoperacion=='buscar')
	{
		$tabvia= new class_tabviatico();
		$tabvia->buscarDetalle($idtabulador);	
		$detalle =$tabvia->get_detalle();
		$contador = count($detalle);
		//print_r($detalle);
	}	
	$acumulado=0;	
?>
<script type="text/javascript">
	function BuscarAjaxdepartamento(valor){
		var ajax = new XMLHttpRequest();
		ajax.open("POST","../controlador/ControladorBuscarAjax.php",true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState==4){
				document.getElementById("datosAjax").innerHTML=ajax.responseText;
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

		if(document.getElementById('est1').checked){ //si esta tildado la caja de activos
			
			ajax.send("operacion=BusquedaAjaxdepartamento&status=1&estado="+valor); //paso variable con estatus activo(1) y nombre

		}else if(document.getElementById('est2').checked){ //si esta tildado la caja de inactivos

			ajax.send("operacion=BusquedaAjaxdepartamento&status=0&estado="+valor); //paso variable con estatus inactivo(0) y nombre

		}else{ //si no esta tildados ni activos ni inactivos
			ajax.send("operacion=BusquedaAjaxdepartamento&status=Null&estado="+valor); //paso variable con estatus Nulo y nombre
		}	
	}
</script>
<link href="css/maestro.css" type="text/css" rel="stylesheet" />
<script src="js/validaciones.js"></script>
<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Registro de Tabulador Viatico</strong></div>
				<div class="panel-body">
					<form method="post" name="fproducto" id="fproducto" action="../controlador/control_maestro_tabviatico.php" >
						<input type="hidden" name="txtoperacion" value="<?php print($lsoperacion);?>">
						<input type="hidden" name="txthay" value="<?php print($lihay);?>">
						<input type="hidden" name="txthacer" value="<?php print($lshacer);?>">
						<div class="row">
							<div class="form-group col-lg-2">
								<label >Código:</label>
								<input class="form-control"  type="text" name="txtidtabulador" onkeypress="return soloNumero(event)" title="Ingrese código del tabulador"   tabindex="1"  onblur="fperderfocusidproducto();" size="5" value="<?php echo $idtabulador; ?>" disabled="true" />
							</div>
							<div class="form-group col-lg-2">
								<label >Dias:</label>
								<input class="form-control"  type="text"  name="txtdias" id="txtdias" onkeypress="return soloNumero(event)" title="Ingrese el numero de dias"  maxlength="3" tabindex="1"  onblur="recalcular()" size="5" value="<?php echo $diastabulador; ?>" />
							</div>
							<div class="form-group col-lg-4">
								<label >Ruta:</label>
								<select  class="form-control"  name="cmb_ruta" id="cmb_ruta">
									<option value="0" >seleccione</option>
								<?php
									$lssql="select * from ruta";
									$lobjcombo->fgenerar($lssql,"idruta","via_rut",$rutatabulador);
								?>
								</select>
							</div>
						</div>
						
						<div class="row">
							<hr><h4><center> Viatico </h4></center><hr>
							<button type="button"  class="btn btn-success"  onclick="addRow('table_viatico');" disabled="true"  name="agrfila"    ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger" onclick="deleteRow('table_viatico');" disabled="true" name="delfila"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
							<table class="table table-striped" id="table_viatico">
								<tr>
									<td></td>
									<td >Descripción</td>
									<td >Costo</td>
									<td >Cantidad</td>
									<td >Subtotal</td>
									<td></td>
									
								</tr>
								<?php $i = 0 ; ?> 
								<?php if(isset($detalle) && count($detalle)): ?> 
									<?php foreach($detalle as $val) :?>
									<?php  
											$monto = $val['detprecio_tabvia'] * $val['candet_tabvia']; 
											$acumulado = $acumulado + $monto;
											$i++;	
									?>
										<tr>
											<td align="center"><input  id="opt" type="checkbox" </td>
											<td >
												<select  class="form-control"  name="descripcion[]" id="des<?php echo $i  ?>" onChange="cargarPrecio(this.id)">
													<option value="" value="" >Seleccione</option>
													<?php
														$lssql="select * from centro_costo";
														$lobjcombo->fgenerar($lssql,"idcentro_costo","descripcion_cencos",$val['iddet_cencos']);
													?>
												</select>
											</td>
											<td ><input class="form-control" name="precio[]" id="pvp<?php echo $i  ?>" value="<?php if(isset($val['detprecio_tabvia']))echo $val['detprecio_tabvia']  ?>" size="3" readOnly="true" /></td>
											<td ><input class="form-control" name="cantidad[]" id="can<?php echo $i  ?>" value="<?php if(isset($val['candet_tabvia']))echo $val['candet_tabvia']  ?>" size="3" onChange="recalcular()"  /></td>
											<td ><input class="form-control" name="monto[]" id="mto<?php echo $i  ?>" value="<?php echo $monto  ?>" size="3"  /></td>
											<td><input id="cod<?php echo $i  ?>" name="codigo[]" type="hidden" value="<?php echo $val['iddet_tabvia'];  ?>" /></td>
											
										</tr>
									<?php endforeach; ?>
									<?php $total_tabulador = $acumulado * $diastabulador ?> 
								<?php endif; ?>
							</table>
							<input type="hidden" id="contador" value="<?php if(isset($contador)) echo $contador;  ?>"/>
							<hr>
							<div class="col-md-4 col-md-offset-4"></div>
							<div class="form-group col-lg-2 col-md-3 col-md-offset-4">
							</div>
							<div class="form-group col-lg-2 col-md-3 col-md-offset-4">
								<label>Total Viaticos:</label>
								<input name="totalviatico" id="totalviatico"  class="form-control"  type="text" size="10" disabled="true" value="<?php echo $acumulado ?>"/>
								<label>Total Tabulador:</label>
								<input name="totaltabulador" id="totaltabulador"  class="form-control"  type="text" size="10" disabled="true" value="<?php if(isset($total_tabulador))echo $total_tabulador ?>"/>
							</div>
							<br>
						</div>	
						<div class="form-group col-lg-3">
						</div>
						<center>
							<div class="form-group col-lg-1"><input type="button" name="btnnuevo" value="Registrar             " class="btn btn-primary" tabindex="19" onclick="fnuevo();"></div>
							<div class="form-group col-lg-1"><input type="submit" name="btnguardar" value="Guardar " class="btn btn-primary" tabindex="20" onclick="fguardar();"></div>
							<div class="form-group col-lg-1"><input type="reset" name="btncancelar" value="Cancelar            " class="btn btn-primary" tabindex="21" onclick="cancelar('maestro_tabulador_viatico')"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnbuscar" value="Consultar" class="btn btn-primary" tabindex="22" data-toggle="chat" data-collapse-sidebar="1"></div>
							<div class="form-group col-lg-1"><input type="button" name="btnmodificar" value="Modificar             " class="btn btn-primary" tabindex="23" onclick="fmodificar();" ></div>
							<div class="form-group col-lg-1"><input type="button" name="btneliminar" value="Eliminar              " class="btn btn-primary" tabindex="7" onclick="feliminar();" ></div>
							<div class="form-group col-lg-1"><input type="button" onclick="flistar();" value="Listar      " class="btn btn-primary" 	/></div>
						 </center> 
					</form>
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
				lof.txtidtabulador.disabled=true;
				lof.txtdias.disabled=false;
				lof.cmb_ruta.disabled=false;
				lof.txtdias.focus();
						lof.agrfila.disabled=false;
		lof.delfila.disabled=false;
				
				lof.btnguardar.disabled=false;
				lof.btncancelar.disabled=false;
				lof.btnnuevo.disabled=true;
				lof.btnbuscar.disabled=true;
				lof.btnmodificar.disabled=true;
				lof.btneliminar.disabled=true;
				
			}
		}
	}
	function fexiste()
	{
		lof=document.fproducto;
		lof.txtidtabulador.disabled=true;
		lof.txtdias.disabled=true;
		lof.cmb_ruta.disabled=true;
		
		//lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=false;
		lof.btneliminar.disabled=false;
		lof.btnAbreproducto.disabled=true;
	}
	function fnuevo()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="nuevo";
		lof.txthacer.value="incluir";
		
		lof.txtidtabulador.disabled=false;
		lof.txtdias.disabled=false;
		lof.cmb_ruta.disabled=false;
		lof.submit();
		lof.txtdias.focus();
		
		lof.agrfila.disabled=false;
		lof.delfila.disabled=false;
		
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		//lof.btnAbreproducto.disabled=true;
	}
	function fcancelar()
	{
		lof=document.fproducto;
		
		lof.txtidtabulador.value="";
		lof.txtruta.value="";
		lof.txtdias.value="";
		
		lof.txtoperacion.value="";
		lof.txthacer.value="";
		lof.txthay.value="0";
		lof.totaltabulador.value="0";
		lof.totalviatico.value="0";
		
		lof.txtidtabulador.disabled=true;
		lof.txtruta.disabled=true;
		lof.txtdias.disabled=true,
		
		//lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=true;
		lof.btnnuevo.disabled=false;
		lof.btnbuscar.disabled=false;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		//lof.btnAbreproducto.disabled=true;
	}
	function fbuscar()
	{
		lof=document.fproducto;
		lof.txtidtabulador.disabled=false;
		lof.txtidtabulador.focus();
		lof.txtdias.disabled=true;
		lof.cmb_ruta.disabled=true,
		
		//lof.btnguardar.disabled=true;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		//lof.btnAbreproducto.disabled=false;
	}
	function fmodificar()
	{
		lof=document.fproducto;
		lof.txtoperacion.value="modificar";
		lof.txtidtabulador.disabled=true;
		lof.txtdias.disabled=false;
		lof.txtdias.focus();
		lof.cmb_ruta.disabled=false,
		
		lof.agrfila.disabled=false;
		lof.delfila.disabled=false;
		
		lof.btnguardar.disabled=false;
		lof.btncancelar.disabled=false;
		lof.btnnuevo.disabled=true;
		lof.btnbuscar.disabled=true;
		lof.btnmodificar.disabled=true;
		lof.btneliminar.disabled=true;
		
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
		if (lof.txtidtabulador.value!="")
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
		lof.txtidtabulador.disabled=false;
		
		
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
	 function addRow(tableID) {
			   var contador="";
			   var datos = <?php echo $datosCosto  ?>;
               var table = document.getElementById(tableID);
			   
			   if(document.getElementById('contador'))
			   {
					contador = document.getElementById('contador').value;
				} 
				contador++;
				
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount);
               var cell1 = row.insertCell(0);
               cell1.align="center";

               var element1 = document.createElement("input");
               element1.type = "checkbox";
               element1.id='opt'+contador;
              
               cell1.appendChild(element1);

 

               var cell2 = row.insertCell(1);
               var element2 = document.createElement("select");
               element2.setAttribute("name", "descripcion[]");
			   element2.id='des'+contador;
			   element2.className="form-control";
			   element2.setAttribute("onChange", "cargarPrecio(this.id)");
               var option;

				option = document.createElement("option");
				option.setAttribute("value", "");
				option.innerHTML = "-Seleccione-";
				element2.appendChild(option);              
				for(i=0; i < datos.length;i++ )
				{
					option = document.createElement("option");
					option.setAttribute("value", datos[i].idcentro_costo);
					
					option.innerHTML = datos[i].descripcion_cencos;
					element2.appendChild(option);
				}	
				cell2.appendChild(element2);
				
			   var cell3 = row.insertCell(2);
               var element3 = document.createElement("input");
               element3.type = "text";
               element3.maxlength="3";
               element3.size="3";
               element3.name="precio[]";
			   element3.className="form-control"; 
			   element3.id='pvp'+contador;
			   element3.value="0.0";
			   element3.readOnly = true;
               cell3.appendChild(element3);
               
               var cell4 = row.insertCell(3);
               var element4 = document.createElement("input");
               element4.type = "text";
               element4.maxlength="3";
               element4.size="3";
               element4.name="cantidad[]";
			   element4.className="form-control";
			   element4.id='can'+contador; 
			   element4.value="0";
			    element4.setAttribute("onChange", "recalcular()");
               cell4.appendChild(element4);
               
               var cell5 = row.insertCell(4);
               var element5 = document.createElement("input");

               element5.type = "text";
               element5.size="3";
               element5.className="form-control"; 
               element5.name="monto[]";
			   element5.id='mto'+contador;
			   element5.disabled=true;
               cell5.appendChild(element5);
               
               var cell6 = row.insertCell(5);
               var element6 = document.createElement("input");
               
               element6.type="hidden";
               element6.name="codigo[]";
               element6.id="cod"+contador;
               element6.value="0";
               cell6.appendChild(element6);
               
               document.getElementById('contador').value=contador;
               
          }

 

          function deleteRow(tableID) {

               try {

               var table = document.getElementById(tableID);

               var rowCount = table.rows.length;

 

               for(var i=0; i<rowCount; i++) {

                    var row = table.rows[i];

                    var chkbox = row.cells[0].childNodes[0];

                    if(null != chkbox && true == chkbox.checked) {

                         table.deleteRow(i);

                         rowCount--;

                         i--;

                    }

               }

               }catch(e) {

                    alert(e);

               }

          }
          function validarCboDescripcion()
		  {
				var combos=[];
				var elemento=[];
				var frm = document.getElementById("fproducto");
				var j=0;
				for (i=0;i<frm.elements.length;i++)
				{
					if(frm.elements[i].type=='select-one') 
					{
						if(frm.elements[i].name=="descripcion")
						{
							combos[j] = frm.elements[i].value;
							elemento[j] = i;
							j++;
						}			
					}	
				}
				
				if(combos.length >1)
				{
					aux = combos[0];
					for (i=1;i<=combos.length;i++)
					{
						if(combos[i] == aux)	
						{
							alert('Valor repetido .......');
							 frm.elements[elemento[i]].value=0;
							return false;	
						}
					}
				}	
				return true; 
		  }
		  function cargarPrecio(id)
		  {
				var cadena = id;
				var pos =0;
				var valor = 0;
				var objact = document.getElementById(id);
				var datos = <?php echo $datosCosto  ?>;
				
				if(validarCboDescripcion())
				{
					pos=cadena.substring(3);
					valor = objact.value;
					for (i=0;i<datos.length;i++)
					{
						if(datos[i].idcentro_costo == valor)
						{
							document.getElementById('pvp'+pos).value = datos[i].precio_cencos;
							break;	
						}
					}
					document.getElementById('can'+pos).focus();
				}else
					{
						objact.focus();
					}
		   }
		   function recalcular()
		   {
			   var precio = 0;
			   var cantidad =0;
			   var monto = 0;
			   var contador = 0;
			   var acumulador = 0;
			   var dias = 0;
			    if(document.getElementById('contador'))
			    {
					contador = document.getElementById('contador').value;
				}
			   
			   for (i=1;i<=contador;i++)
			   {
					if(document.getElementById('can'+i).value > 0)
					{
						precio = document.getElementById('pvp'+i).value;
						cantidad = document.getElementById('can'+i).value;
						monto = precio * cantidad;
						acumulador = acumulador + monto;
					}
					document.getElementById('mto'+i).value= monto;
				}
				dias=document.getElementById('txtdias').value;
				document.getElementById('totalviatico').value= acumulador;
				document.getElementById('totaltabulador').value= acumulador * dias;
			   
			}
</script>
