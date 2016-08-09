<?php

   
	//COMBO
	require_once("../modelo/clscombo.php");
	$lobjCombo= new clsCombo();
	
   
	@$laMatriz=$_SESSION['matriz'];//se recive la matriz con la busqueda
	$nombreT=$laMatriz[0][4];
	@$lsbusqueda=$_GET["lsbusqueda"];
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
	<br><br><br><div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title">Reporte de Recepción de Guia por Orden de Carga</div> </div> 
			 <br>
	 				
	<!--------------------------------------------------CONTIENE EL FORMULARIO DE BUSQUEDA------------------------------------------------------------------------------------------>								
	<!---->						 		<div class="panel-body"><p align="center" style="color:#AB0000;">Ingrese Número de la Orden de Carga y a continuación de click en el boton buscar</p>		
										<div name="form" id="form"  align="center" >                                                                   <!---->
	<!---->									<form name="form1" method="POST" action="../controlador/corRep_Recepcion.php">                                                       <!---->	
	<!---->										<INPUT type="hidden" name="txtoperacion" value="<?php print($lsOperacion);?>">                                                <!---->	
	<!---->										<INPUT type="hidden" name="txthay" value="<?php print($liHay);?>">			                                                  <!---->	
	<!---->										 <div class="form-group col-lg-2"></div>                                                                                                 <!---->	
	<!---->										<div class="form-group col-lg-8"><center>
													<input type="text" name="cmbbusqueda" class="form-control">                                                                                       <!---->	
	<!---->													                                                                                <!---->	
	<!---->												</center> </div>                                                                                                              <!---->	
	<!---->										<div class="form-group col-lg-9"></div>                                                                                                 <!---->	
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
												<h4>Recepción de guia por orden de carga</h4>
												<button type="button" id="atras" name="existe" onclick="fnExiste()" class="btn btn-lg btn-primary" value="Atras"><i class="glyphicon glyphicon-chevron-left" style="color:#FFFFFF;"></i></a></button>
	<!---->										<input type="button"  class="btn btn-lg btn-primary" id="atras" name="btnimp" value="imprimir" onclick="Imprimir()" >
	<!---->							
	<table class="table datatable">
		<thead>
												<tr>
													
													<th><strong>N°</strong></th>
													<th><strong>Fecha</strong></th>
													<th><strong>N° Guia</strong></th>
													<th><strong>N° Orden de Carga</strong></th>
													<th><strong>Cédula</strong></th>
													<th><strong>Conductor</strong></th>
													<th><strong>N° Unidad</strong></th>
													<th><strong>Placa</strong></th>
													<th><strong>N° Remolque</strong></th>
													<th><strong>Placa</strong></th
													
													
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
															printf ($laMatriz[$liI][11]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][3]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][4].' '.$laMatriz[$liI][5]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][6]); 
															printf("</td>");
															
															printf("<td>");
															printf ($laMatriz[$liI][7]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][8]); 
															printf("</td>");
															printf("<td>");
															printf ($laMatriz[$liI][9]); 
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
		miPopup = window.open('../vista/reporte/pdfRep_Recepcion.php?lsbusqueda=<?php print($lsbusqueda);?>');
	}
		
		
		
	</script>
	
	
	<?php unset($_SESSION['matriz']); ?>
</html>
