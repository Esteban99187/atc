<?php
	include_once("../controlador/corLogueo.php");

 ?>


<!DOCTYPE html> <html lang="en">
	 <head> <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <title>ATCSISTEM</title> 
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
    <link rel="stylesheet" href="css/entypo.css" id="style-resource-2"> 
    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"> -->
    <link rel="stylesheet" href="css/bootstrap.css" id="style-resource-4"> 
    <link rel="stylesheet" href="css/neon-core.css" id="style-resource-5"> 
    <link rel="stylesheet" href="neon-theme.css" id="style-resource-6">
     <link rel="stylesheet" href="css/neon-forms1.css" id="style-resource-7">
      <link rel="stylesheet" href="css/custom.css" id="style-resource-8"> 
      <script src="js/jquery-1.11.0.min.js"></script>
      <!--[if lt IE 9]><script src="http://demo.neontheme.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]--> <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]--> <!-- TS1430162706: Neon - Responsive Admin Template created by Laborator --> </head> <body class="page-body login-page login-form-fall" data-url="http://demo.neontheme.com"> <!-- TS143016270614672: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates -->
	 
	 	
	 <div class="login-container"> 
		 <?php
			if(isset($_GET["alert"]))
			{
				$alerta = $b->buscarAlerta($_GET["alert"]);
				echo '<br><div class="alert '.$alerta[1].'" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$alerta[0].'</div>';
			}
		?>
	<div class="login-header login-caret">
	 <div class="login-content">
		 <img src="imagenes/about/atc.png"  alt="" /> </a> 
		 <p class="description">Almacenes y Transporte Cerealeros A.T.C. C.A </p> <!-- progress bar indicator --> 
		 <div class="login-progressbar-indicator">
			  <h3>85%</h3> <span>logging in...</span> 
			  </div>
			   </div>
			    </div>
			     <div class="login-progressbar"> <div>
			     </div>
			      </div>


<!--aqui abre el login-->

			       <div class="login-form">
					    <div class="login-content">
							 <div class="form-login-error"> <h3>Invalid login</h3> <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p> </div>
								
							 	<!--abriendo el formulario-->
								 <form action ="" method="post" autocomplete="off" role="form" >
								   <div class="form-group"> 
									   <div class="input-group">
										    <div class="input-group-addon"> <i class="entypo-user"></i>
										     </div> 
										     <input class="form-control" placeholder="Nombre de Usuario" onpaste="alert('No Debe Pegar el Nombre de Usuario, Porfavor Escribalo');return false"  name="login" type="text" >
<!--
										     <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
-->
										      </div>
										      </div>
										      <div class="form-group">
												  <div class="input-group">
													 <div class="input-group-addon"> <i class="entypo-key"></i>
													 </div>
													 <input class="form-control" placeholder="Contraseña" onpaste="alert('No Debe Pegar la Contraseña , Porfavor Escribala');return false" name="pass" type="password" autocomplete="off">
<!--
													  <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
-->
													  </div>
													</div>
						
													  <div class="form-group">
													 <button type="submit" name="submit" class="btn btn-primary btn-block btn-login"> <i class="entypo-login"></i>Iniciar Sesión</button> 
													 </div>
													  </form>

													  <!--cierre del form-->
													 <div class="login-bottom-links">
														  <a href="olvidoclave.php">¿Olvido su contraseña?</a> <br /> 
														  <a href="registrarusuarios.php">Registrarme</a>
														  </div> 
														 </div> 
														 </div> 



<!--cierre del login-->


														 </div>
<script src="js/main-gsap.js" id="script-resource-1"></script>
<script src="js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
<script src="js/bootstrap.js" id="script-resource-3"></script>
<script src="js/joinable.js" id="script-resource-4"></script>
<script src="js/resizeable.js" id="script-resource-5"></script>
<script src="js/neon-api.js" id="script-resource-6"></script>
<script src="js/cookies.min.js" id="script-resource-7"></script>
<script src="js/jquery.validate.min.js" id="script-resource-8"></script>
<script src="js/neon-login.js" id="script-resource-9"></script> 
<script src="js/neon-custom.js" id="script-resource-10"></script>
<script src="js/neon-demo.js" id="script-resource-11"></script>
 