<?php

   
	//COMBO
	require_once("../modelo/clscombo.php");
	$lobjCombo= new clsCombo();
	
   
	@$laMatriz=$_SESSION['matriz'];//se recibe la matriz con la busqueda
	$nombreT=$laMatriz[0][4];
	@$lsbusqueda=$_GET["lsbusqueda"];
	@$lsfini=$_GET["lsfini"];
	@$lsfin=$_GET["lsfin"];
	@$liHay=$_GET["liHay"];
	@$lsOperacion=$_GET["lsOperacion"];
	
	 
?>
<!DOCTYPE html> <html lang="en"> 
	<head> 
		<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
		<meta name="description" content="Neon Admin Panel" /> 
		<meta name="author" content="Laborator.co" /> 
		<title> ATCSISTEM | A.T.C C.A </title> 
<link rel="stylesheet" href="css/bootstrap.css" id="style-resource-4"> 
		<link rel="stylesheet" href="css/neon-core.css" id="style-resource-5"> 
		<link rel="stylesheet" href="css/neon-theme.css" id="style-resource-6"> 
		<link rel="stylesheet" href="css/neon-forms.css" id="style-resource-7"> 
		<link rel="stylesheet" href="css/custom.css" id="style-resource-8"> 
		<script src="js/jquery-1.11.0.min.js"></script>
		<script>$.noConflict();</script>		
		<link rel="shortcut icon" href="../public/img/favicon/favicon_cicpc.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<script>$.noConflict();</script>		
		<link rel="shortcut icon" href="../public/img/favicon/favicon_cicpc.ico" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/ventanas_modales.css">
		<link rel="stylesheet" type="text/css" href="css/formularioYBotonera.css">
		<link rel="stylesheet" type="text/css" href="css/sistema.css">
		<!-- ****************** script **************** -->
		<script type="text/javascript" src="js/jquery/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="js/jquery/main.js"></script>
		<script type="text/javascript" src="js/libreria.js"></script>
		<script type="text/javascript" src="js/botonera.js"></script>
		<script type="text/javascript" src="js/validar_L_N.js"></script>
		<script type="text/javascript" src="js/maestras/GestionarEstado.js"></script>
		
		<script src="js/validacionScript.js"></script>
		<script src="js/bootstrapValidator.js"></script>
		<script src="js/validaciones.js"></script>
		<script src="js/ajax.js"></script>
	<br><br><br>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Reporte de Solicitudes por Fecha</div> </div> 
			 <br>
	 <p align="center" style="color:#AB0000;">Ingrese fecha y a continuación de click en el boton buscar</p>						
	<!--------------------------------------------------CONTIENE EL FORMULARIO DE BUSQUEDA------------------------------------------------------------------------------------------>								
	<!---->						 		<div class="panel-body">
										<div name="form" id="form"  align="center" >                                                                   <!---->
	<!---->									<form name="form1" method="POST" action="../controlador/corRep_Solicitud_fecha.php">                                                       <!---->	
	<!---->										<INPUT type="hidden" name="txtoperacion" value="<?php print($lsOperacion);?>">                                                <!---->	
	<!---->										<INPUT type="hidden" name="txthay" value="<?php print($liHay);?>">			                                                  <!---->	
	                                                                                                 <!---->	
	<!---->										<div class="form-group col-lg-3"><center>
													<label>Fecha Inicio</label>
													<input class="form-control"  type="text" name="txtfini" id="datepicker" readonly tabindex="2" >
                                                                                                      <!---->	
	<!---->												</center> </div>                                                                                                              <!---->	
	<!---->										<div class="form-group col-lg-3"><center>
												<label>Fecha Fin</label>
													<input class="form-control"  type="text" name="txtfin" id="datepicker1" readonly  tabindex="2" >                                                                                    <!---->	
	<!---->													                                                                                <!---->	
	<!---->												</center> </div>                                                                                                              <!---->	
	<!---->										<div class="form-group col-lg-6"><center>
													<label>Introduzca el Rif del Cliente</label>
													<input type="text" name="cmbbusqueda" class="form-control">                                                                                       <!---->	
	<!---->													                                                                                <!---->	
	<!---->												</center> </div>                                                                                                              <!---->	
	<!---->										<div class="form-group col-lg-11"></div>                                                                                                 <!---->	
	<!---->										<div class="form-group col-lg-1"><center>																						<!---->	
													<input type="button"  class="btn btn-lg btn-primary" id="atras" name="btnenviar" value="Buscar       " onclick="fBusqueda()">        <!---->	
	                                                  </center>                             <!---->	
	<!---->										</form>                                                                                                                       <!---->	
	<!---->									</div>                                                                                                                            <!---->	
	<!---->									</div>                                                                                                                            <!---->	
	<!--------------------------------------------------------------------FIN FORMULARIO DE BUSQUEDA--------------------------------------------------------------------------------->

								
<!--------------------------------------------------------------------DIV QUE CONTIENE BUSQUEDA DE TODOS LOS TIPOS DE EVALUACION---------------------------------------------------------->
											<div id="reportes" style="display: none;" align="center">
											
											<div class="form-group col-lg-12">
												<h4>Solicitudes por Estatus </h4>
												<button type="button" id="atras" name="existe" onclick="fnExiste()" class="btn btn-lg btn-primary" value="Atras"><i class="glyphicon glyphicon-chevron-left" style="color:#FFFFFF;"></i></a></button>
	<!---->										<input type="button"  class="btn btn-lg btn-primary" id="atras" name="btnimp" value="imprimir" onclick="Imprimir()" >
	<!---->							
	<table class="table datatable">
		<thead>
												<tr>
													
													<th><strong>N°</strong></th>
													<th><strong>Fecha</strong></th>
													<th><strong>Rif</strong></th>
													<th><strong>Razón Social</strong></th>
													<th><strong>Teléfono</strong></th>
													<th><strong>Direccion Entrega</strong></th>
													<th><strong>Direccion Salida</strong></th>
													
													
												</tr>
													<?php 
													$N=0;
													for ($liI = 0; $liI < count($laMatriz); $liI++){
														$N++;
														printf("<tr>");
													
															printf("<td>");
															printf ($laMatriz[$liI][0]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][1]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][2]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][3]); 
															printf("</td>");
															
															printf("<td>");
															printf ($laMatriz[$liI][6]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][5]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][4]); 
															printf("</td>");
															
															
														printf("</tr>");
													}										
													
													?>
													</thead>
												</div>										
												</div>										
<!--------------------------------------------------------------------FIN DIV QUE CONTIENE BUSQUEDA DE TODOS LOS TIPOS DE EVALUACION---------------------------------------------------------->
										</div>
								</div>	
							
							</body>
	<script type="text/javascript"> 
	
	fInicio();
	loF=document.form1;
       function fInicio(){
		  loF=document.form1;
		  
		  if (loF.txtoperacion.value!="buscar")
		  {
			  
	      }
	      else
	      {
			 if ((loF.txthay.value==1)&&(loF.cmbbusqueda.value=="-"))
			 {
				 //traer todos
				fExiste();
		     }
		     else if((loF.txthay.value==1)&&(loF.cmbbusqueda.value!="-"))
			 {
				 
				 fExiste();
			 }
		     else if(loF.txthay.value==0)
			 {
					alert("No Hay Registros")
			 }
		  }
	   }
	   function fExiste(){
			document.getElementById("form").style.display="none";
			document.getElementById("reportes").style.display="block";
			
			
	   }
	   
	   //boton atras
	   function fnExiste(){
			document.getElementById("form").style.display="block";
			document.getElementById("reportes").style.display="none";
			
			
	   }
	   
	   function fBusqueda(){
				document.form1.txtoperacion.value="buscar";	
				document.form1.submit();
			}
		
		function Imprimir()
	{
		miPopup = window.open('../vista/reporte/pdfRep_Solicitud_fecha.php?lsbusqueda=<?php print($lsbusqueda);?>&lsfini=<?php print($lsfini);?>&lsfin=<?php print($lsfin);?>');
	}
		
	</script>
	<link rel="stylesheet" href="../jquery/jquery-ui.css">
	<script src="../jquery/jquery-ui.min.js"></script>
	<script src="../jquery/jquery-ui.js"></script>
	<link rel="stylesheet" href="../jquery/jquery-ui.theme.css">
	<script>
		$(function() 
		{ 
			//Array para dar formato en español
			$.datepicker.regional['es'] = 
			{
				closeText: 'Cerrar', 
				prevText: 'Previo', 
				nextText: 'Próximo',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
				dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
				dateFormat: 'dd/mm/yy', firstDay: 0, 
				initStatus: 'Selecciona la fecha', isRTL: false
			};
			$.datepicker.setDefaults($.datepicker.regional['es']);
			//miDate: fecha de comienzo D=días | M=mes | Y=año
			//maxDate: fecha tope D=días | M=mes | Y=año
			$( "#datepicker" ).datepicker({ minDate: '', maxDate: "+1M +10D" });  
			$( "#datepicker1" ).datepicker({ minDate: '', maxDate: "+1M +10D" });
		});
	</script>
	
	<?php unset($_SESSION['matriz']); ?>
