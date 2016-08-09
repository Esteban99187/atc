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
	session_start();
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
	else
	{
	   //sino, calculamos el tiempo transcurrido 
		$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		$ahora = date("Y-n-j H:i:s"); 
		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 
		//comparamos el tiempo transcurrido 
		 if($tiempo_transcurrido >= 450) { 
		 //si pasaron 10 minutos o más 
		  session_destroy(); // destruyo la sesión 
		  header("Location: ../index.php"); //envío al usuario a la pag. de autenticación 
		  //sino, actualizo la fecha de la sesión 
		}else { 
		$_SESSION["ultimoAcceso"] = $ahora; 
	   } 
	} 
	$datosUsuarioLogin=array($_SESSION["idUsuario"],$_SESSION["nombreUsuario"]);
	require_once("clases/class_bitacora.php");
	require_once("clases/class_solicitudes.php");
	require_once("clases/class_respaldo.php");
	$res = new Respaldo;
	$sl = new solicitud;
	$b = new bitacora;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Sistema Bomberos</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="js/bootstrapValidator.css" rel="stylesheet">
        <link href="../css/mainSis.css" rel="stylesheet">
        <script src="js/main.js"></script>
        <script src="js/ajax.js"></script>
        <style type="text/css">
            body {
  padding-top: 50px;
}

        </style>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body >


 <!-- INICIO MENU FIXED -->    

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="collapse navbar-collapse">
		
		<ul class="nav navbar-nav">
			<li><a href=""><img src="img/logo.png"></a></li>
		</ul>
		<div class=" col-md-5 pull-right">
		 <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo strtoupper($datosUsuarioLogin[1]); ?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">Cofiguración de mi cuenta</a></li>
          </ul>
        </li>
        <li><a href="controlador/logout.php"><i class="glyphicon glyphicon-lock"></i> Cerrar Sesión</a></li>
      </ul>
    </div>
		</div>
		
	</div>
</div>
<!-- FIN DE MENU -->
<!-- CONTENIDO DE LA PAGINA-->
<div class="container col-md-12">
    <?php
       if(isset($_GET["url"])){
            include($_GET["url"].".php");
       }else{ ?>
<div class="jumbotron text-center">
  <h1>Bienvenido Administrador</h1>
</div>
      <?php 
    } 
    ?>
</div>

<!-- /.container -->
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script type='text/javascript' src="../js/vendor/bootstrap.js"></script>
        <script src="js/validacionScript.js"></script>
        <script src="js/bootstrapValidator.js"></script>
        <script src="js/highcharts.js"></script>
        <script src="js/modules/exporting.js"></script>
        <script src="js/graficos.js"></script>
       
        <!-- JavaScript jQuery code from Bootply.com editor -->
     
     <script type="text/javascript">
    $(document).ready(function(){
        $("#botonAsignar").click(function(){
            $('#asignar').show(1000); //oculto mediante id
        });
    });
    </script>
  
  <?php
    if($res->VerificaRespaldoAutomatico()){
          if($res->cambioFecha()){
              if($res->respaldar(a)){
  ?>
    <script>
    $(document).ready(function() {
      $('#myModal').modal('show')
      });
    </script>
   <?php
              }
            }
          }
   ?> 

    </body>
</html>
