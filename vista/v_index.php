<?php session_start();
	//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED); // opcional. 

	if (isset($_SESSION['nivel'])){
		if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
			header("location: vista/protegidas/v_Perfil_Admin.php");
		}
	}
	include_once('modelo/configuracion/m_sistema.php');
	include_once('modelo/seguridad/sacarHoraFechaServer.php');
	$obj_sistema = new clsSistema();
	$datos_sistema = $obj_sistema->mostrarDatos();

	if(!empty($_GET['accion'])){
		$accion = $_GET['accion'];
	}else{
		$accion = "vista/sistema/v_inicio.php";
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido Al CICPC Sub Delegación Acarigua</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script type="text/javascript" src="public/js/jquery/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="public/css/home_page.css"> 
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<link rel="shortcut icon" href="public/img/favicon/favicon_cicpc.ico"/>
	<link rel="stylesheet" type="text/css" href="public/css/ventanas_modales.css">
	<link rel="stylesheet" type="text/css" href="public/css/formularioYBotonera.css">
	<link rel="stylesheet" type="text/css" href="public/css/msj_iconos.css">
	<link rel="stylesheet" type="text/css" href="public/css/sistema.css">
	<link rel="stylesheet" type="text/css" href="public/css/header.css">
	<!-- <link rel="stylesheet" type="text/css" href="public/css/slide.css"> -->
	<link rel="stylesheet" type="text/css" href="public/css/media_screen.css">
	<link rel="stylesheet" type="text/css" href="public/css/footer.css">
	
	<!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>-->
	<script type="text/javascript" src="public/js/libreria.js"></script>
	<script type="text/javascript" src="public/js/validar_L_N.js"></script>
	<script type="text/javascript" src="public/js/acceso.js"></script>
	<script type="text/javascript" src="public/js/jquery/seleccionMenu.js"></script>
	<!--<script type="text/javascript" src="public/js/slide.js"></script>-->
	<!-- <script type="text/javascript" src="public/js/jquery/btn_ir_arriba.js"></script>-->
	<style type="text/css">
		.activo{
			background-color: #fff;
			color: #000;
		}
	</style>
</head>
<body>
<noscript>Para utilizar las funcionalidades completas de este Sistema es necesario tener JavaScript habilitado. Aquí están las <a href="http://www.enable-javascript.com/es/" target="_blank"> <br> instrucciones para habilitar JavaScript en tu navegador web</a>.</noscript>
<div class="contenedor"><!-- Contenedor General -->
	<div class="header"><!-- cabezera -->
		<div class="logo-barra"><img src="public/img/logo-barra.png"></div>
		<div class="nav" id="menu">
			<div class="logo"><img src="public/img/logo23.png"><span><p>Sistema &nbsp;de &nbsp;Bienes &nbsp;Nacionales &nbsp;<?php if(isset($datos_sistema["abreviatura_sede"])) echo $datos_sistema["abreviatura_sede"]; if(isset($datos_sistema["nom_sed"])) echo " ".$datos_sistema["nom_sed"]; ?></p></span></div>
			<div class="menu_bar">
				<a href="#" class="bt-menu"><span class="icon-menu"></span></a>
			</div> 
			<ul >
				<li id="menu" class="activo"><a class="activo" href="?accion=inicio"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="?accion=informacion"><span class="icon-file-text"></span>Nosotros</a></li>
				<li><a href="?accion=contact"><span class="icon-mail4"></span>Contacto</a></li>
			</ul>
		</div>
	</div>	<!-- cierre cabecera -->
	<div class="main"><!-- Contenido Principal -->
		<?php 
			if(is_file("vista/sistema/v_".$accion.".php")){
				include_once("vista/sistema/v_".$accion.".php");
			}else{
				include_once("vista/sistema/v_inicio.php");
			}
		?>
	</div> <!-- cierre contenido principal -->
	<div class="footer"><!-- pie de página (footer) -->
		<?php include_once("vista/sistema/v_footer.php"); ?>
	</div>
</div><!-- Cierre del contenedor General -->
</body>
</html>
<script>
$(document).on("ready",function(){
	//$('li#menu').on('click', function(){
	    $('li.activo').removeClass('activo');
	    $(this).first().addClass('activo');
	    var seleccion = $(".activo");
	    $("menu").not('li .activo').css({
	 		'color':'#fff',
	 	});
	 	if(seleccion.length == 1){
	 		$("a.activo").css({
	 			'color':'#000',
	 		});
	 	}
	// });
});
</script>
