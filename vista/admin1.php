
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
	define("SYSPATH", realpath("system") . "/");
	include_once("../modelo/ClassMenu.php");
	$menu= new ClassMenu;
	include_once("../modelo/ClassSubmenu.php");
	$Submenu= new ClassSubmenu;
	include_once("../modelo/ClassOperacion.php");
	$Operacion= new ClassOperacion;
	require_once("../modelo/class_solicitud.php");
	$us = new class_solicitud;
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(empty($login))
	{
		echo '<script>window.location="session.php?alert=32"</script>';
	}
	else
	{
		$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		date_default_timezone_set("America/Caracas");
		$ahora = date("Y-n-j H:i:s"); 
		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 
		//comparamos el tiempo transcurrido 
		if($tiempo_transcurrido >= $_SESSION["tiempoSession"])
		{ 
			//si pasaron 10 minutos o más 
			session_destroy(); // destruyo la sesión 
			header("Location: ../index.php"); //envío al usuario a la pag. de autenticación 
			//sino, actualizo la fecha de la sesión 
		}
		else 
		{ 
			$_SESSION["ultimoAcceso"] = $ahora; 
		} 
	}
	$nombreusuario=$_SESSION["nombre"];
	$apellidousuario=$_SESSION["apellido"];
	$cedulausuario=$_SESSION["cedula"];
	$idclienteusuario=$_SESSION["idcliente"];
	include('../modelo/hora.php');
	require_once("../modelo/class_bitacora.php");
	require_once("../modelo/class_configuracion.php");
	$b = new bitacora;  
	$con = new configuracion;

	include_once ("../modelo/class_solicitud.php");
	$sol=new class_solicitud;
	$datos = $sol->reportesolicitudemitida();
	$datos1 = $sol->reportesolicitudejecutada();
	$datos2 = $sol->reportesolicitudprocesada();
	$datos3 = $sol->reportesolicitudespera();
	$datos4 = $sol->reportesolicitud();
?>

<!DOCTYPE html> <html lang="en"> 
	<head> 
		<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
		<meta name="description" content="Neon Admin Panel" /> 
		<meta name="author" content="Laborator.co" /> 
		<title> ATCSISTEM | A.T.C C.A </title> 
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" id="style-resource-1"> 
		<link rel="stylesheet" href="css/entypo.css" id="style-resource-2"> 
<!--
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"> 
-->
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
		
		<link href="bootstrap-tour/build/css/bootstrap-tour-standalone.css" rel="stylesheet">
		<link href="bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet">
		<script src="bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
	</head> 
	<body class="page-body">
		<div class="page-container"> 
			<div class="sidebar-menu"> 
				<div class="sidebar-menu-inner"> 
					<header class="logo-env"> 
						<div class="logo"> <a href="admin.php"> 
							<img src="imagenes/about/atc.png" width="120" alt="" /> </a> 
						</div> 
						<div class="sidebar-collapse" id="my-element1"> 
							<a href="#" class="sidebar-collapse-icon">
							<i class="entypo-menu"></i> </a> 
						</div>
						<div class="sidebar-mobile-menu visible-xs"> 
							<a href="#" class="with-animation">
							<i class="entypo-menu"></i> </a> 
						</div> </header> 
						<div class="sidebar-user-info" id="my-element2"> 
							<div class="sui-normal"> 
								<a href="#" class="user-link"> 
								<img src="imagenes/user.png" width="52px" height="52px" alt="" class="img-circle" />
								<span style="color:#BF0000">Bienvenido</span> 
								<strong style="color:#BF0000"><?php echo strtoupper($nombreusuario.' '.$apellidousuario); ?></strong> </a> 
							</div> 
							<div class="sui-hover inline-links animate-in"> 
								<a href="?url=miperfil"> <i class="entypo-pencil"></i>Miperfil</a> 
								<a href="../controlador/logout.php"> <i class="entypo-logout right"></i>Cerrar Sesion</a>
								<span class="close-sui-popup">&times;</span>
							</div> 
						</div> 
						<ul id="main-menu" class="main-menu"> 
							<li class="opened active"> 
								<a href="admin.php">
									<i class="entypo-gauge"></i>
									<span class="title">Escritorio</span>
								</a> 
							</li>  
							
							<!--inicia recorrido dinamico del menu-->
							
						<?php
							if($menu->consulta_por($_SESSION['idPerfil']))
							{
								while($row_modulos=$menu->row())
								{
									echo '<li>';
										echo '<a href="#">';
											echo '<i class="'.$row_modulos['UrlMen'].'"></i>';
											echo '<span class="title">'.strtoupper($row_modulos['NombreMen']).'</span>';
										echo '</a>'; 
								echo '<ul>';
									if($Operacion->ConsultaOperacionPorMenu($row_modulos['IdMenu']))
									{
										while($RowOperacionPorMenu=$Operacion->row())
										{
											echo '<li>';
												echo '<a href="?url='.$RowOperacionPorMenu['UrlOpe'].'">';
													echo '<i class=""></i>';
													echo '<span class="title">'.strtoupper($RowOperacionPorMenu['NombreOpe']).'</span>';
												echo '</a>';
											echo '</li>'; 
										}
									}
									
									if($Submenu->consulta_por($row_modulos['IdMenu']))
									{
										while($row_servicio=$Submenu->row())
										{
											echo '<li>';
													echo '<a href="?url='.$row_servicio['UrlSub'].'">';
														echo '<i class=""></i>';
														echo '<span class="title">'.strtoupper($row_servicio['NombreSub']).'</span>';
													echo	'</a>'; 
												echo '<ul>';
											
													
													if($Operacion->consulta_por($row_servicio['IdSubmenu']))
													{
														while($row_operacion=$Operacion->row())
														{				
															echo '<li>';
																echo '<a href="?url='.$row_operacion['UrlOpe'].'">';
																	echo '<i class=""></i>';
																	echo '<span class="title">'.strtoupper($row_operacion['NombreOpe']).'</span>';
																echo '</a>'; 
															echo '</li>';
														}
													}
												echo '</ul>';
											echo '</li>';
										}
									}
									echo '</ul>';
								}
							}
						?>							
							
							
						</ul> 
					</li> 
				</ul> 
			</div> 
		</div> 
							      
							      
							      
							      <div class="main-content"> <!-- TS14298123311589: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> <div class="row"> <!-- Profile Info and Notifications --> <div class="col-md-6 col-sm-8 clearfix"> <ul class="user-info pull-left pull-none-xsm"> <ul class="user-info pull-left pull-right-xs pull-none-xsm"> <!-- Raw Notifications --> <li class="notifications dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-attention"></i> <span class="badge badge-info">6</span> </a> <ul class="dropdown-menu"> <!-- TS142981233117108: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> <li class="top"> <p class="small"> <a href="#" class="pull-right">Mark all Read</a>
You have <strong>3</strong> new notifications.
</p> </li> <li> <ul class="dropdown-menu-list scroller"> <li class="unread notification-success"> <a href="#"> <i class="entypo-user-add pull-right"></i> <span class="line"> <strong>New user registered</strong> </span> <span class="line small">
30 seconds ago
</span> </a> </li> <li class="unread notification-secondary"> <a href="#"> <i class="entypo-heart pull-right"></i> <span class="line"> <strong>Someone special liked this</strong> </span> <span class="line small">
2 minutes ago
</span> </a> </li> <li class="notification-primary"> <a href="#"> <i class="entypo-user pull-right"></i> <span class="line"> <strong>Privacy settings have been changed</strong> </span> <span class="line small">
3 hours ago
</span> </a> </li> <li class="notification-danger"> <a href="#"> <i class="entypo-cancel-circled pull-right"></i> <span class="line">
John cancelled the event
</span> <span class="line small">
9 hours ago
</span> </a> </li> <li class="notification-info"> <a href="#"> <i class="entypo-info pull-right"></i> <span class="line">
The server is status is stable
</span> <span class="line small">
yesterday at 10:30am
</span> </a> </li> <li class="notification-warning"> <a href="#"> <i class="entypo-rss pull-right"></i> <span class="line">
New comments waiting approval
</span> <span class="line small">
last week
</span> </a> </li> </ul> </li> <li class="external"> <a href="#">View all notifications</a> </li></ul> </li> <!-- Message Notifications --> <li class="notifications dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-mail"></i> <span class="badge badge-secondary">10</span> </a> <ul class="dropdown-menu"> <!-- TS142981233113924: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> <li> <form class="top-dropdown-search"> <div class="form-group"> <input type="text" class="form-control" placeholder="Search anything..." name="s" /> </div> </form> <ul class="dropdown-menu-list scroller"> <li class="active"> <a href="#"> <span class="image pull-right"> 
	<img src="assets/images/thumb-1.png" alt="" class="img-circle" /> </span> <span class="line"> <strong>Luc Chartier</strong>
- yesterday
</span> <span class="line desc small">
This ain’t our first item, it is the best of the rest.
</span> </a> </li> <li class="active"> <a href="#"> <span class="image pull-right"> 
	<img src="assets/images/thumb-2.png" alt="" class="img-circle" /> </span> <span class="line"> <strong>Salma Nyberg</strong>
- 2 days ago
</span> <span class="line desc small">
Oh he decisively impression attachment friendship so if everything. 
</span> </a> </li> <li> <a href="#"> <span class="image pull-right"> 
	<img src="assets/images/thumb-3.png" alt="" class="img-circle" /> </span> <span class="line">
Hayden Cartwright
- a week ago
</span> <span class="line desc small">
Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
</span> </a> </li> <li> <a href="#"> <span class="image pull-right"> 
	<img src="assets/images/thumb-4.png" alt="" class="img-circle" /> </span> <span class="line">
Sandra Eberhardt
- 16 days ago
</span> <span class="line desc small">
On so attention necessary at by provision otherwise existence direction.
</span> </a> </li> </ul> </li> <li class="external"> <a href="mailbox/main/">All Messages</a> </li></ul> 
</li>
<li class="notifications dropdown" id="my-element"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="entypo-list"></i> <span class="badge badge-warning">1</span> </a> <ul class="dropdown-menu"> <!-- TS142981233112214: Xenon - Boostrap Admin Template created by Laborator / Please buy this theme and support the updates --> <li class="top"> <p>You have 6 pending tasks</p> </li> <li> <ul class="dropdown-menu-list scroller"> <li> <a href="#"> <span class="task"> <span class="desc">Procurement</span> <span class="percent">27%</span> </span> <span class="progress"> <span style="width: 27%;" class="progress-bar progress-bar-success"> <span class="sr-only">27% Complete</span> </span> </span> </a> </li> <li> <a href="#"> <span class="task"> <span class="desc">App Development</span> <span class="percent">83%</span> </span> <span class="progress progress-striped"> <span style="width: 83%;" class="progress-bar progress-bar-danger"> <span class="sr-only">83% Complete</span> </span> </span> </a> </li> <li> <a href="#"> <span class="task"> <span class="desc">HTML Slicing</span> <span class="percent">91%</span> </span> <span class="progress"> <span style="width: 91%;" class="progress-bar progress-bar-success"> <span class="sr-only">91% Complete</span> </span> </span> </a> </li> <li> <a href="#"> <span class="task"> <span class="desc">Database Repair</span> <span class="percent">12%</span> </span> <span class="progress progress-striped"> <span style="width: 12%;" class="progress-bar progress-bar-warning"> <span class="sr-only">12% Complete</span> </span> </span> </a> </li> <li> <a href="#"> <span class="task"> <span class="desc">Backup Create Progress</span> <span class="percent">54%</span> </span> <span class="progress progress-striped"> <span style="width: 54%;" class="progress-bar progress-bar-info"> <span class="sr-only">54% Complete</span> </span> </span> </a> </li> <li> <a href="#"> <span class="task"> <span class="desc">Upgrade Progress</span> <span class="percent">17%</span> </span> <span class="progress progress-striped"> <span style="width: 17%;" class="progress-bar progress-bar-important"> <span class="sr-only">17% Complete</span> </span> </span> </a> </li> </ul> </li> <li class="external"> <a href="#">See all tasks</a> </li></ul> </li> </ul> </div> <!-- Raw Links -->
 <div class="col-md-6 col-sm-4 clearfix hidden-xs" > 
	<ul class="list-inline links-list pull-right" id="my-other-element">
		
		<li class="sep"></li> <li> <a href="../controlador/logout.php">Cerrar Sesión <i class="entypo-logout right"></i> </a> </li> 
	</ul> 
</div> 
</div> <hr /> 


	<?php
				if(isset($_GET["av"]))
				{
					$alerta = $b->buscarAlerta($_GET["av"]);
					echo '<br><div class="alert '.$alerta[1].'" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$alerta[0].'</div>';
				}
				if(isset($_GET["url"]))
				{
					include($_GET["url"].".php");
				}
				else
				{ 
						$perfil = $menu->cualPerfil($_SESSION["idPerfil"]);
						if($perfil == 'ADMINISTRADOR')
						{
							echo '
							
							 <div class="row"> 
								<div class="col-sm-12"> 
									<div class="well"> 
										<h1><i class="entypo-user"></i>Bienvenido</h1>
									</div> 
								</div>
							 </div> 
							<div class="row"> 
									<div class="col-sm-3 col-xs-6"> 
										<div class="tile-stats tile-green"> 
											<div class="icon">
												<i class="entypo-clock"></i>
											</div> 
										<div class="num" data-start="0" data-end='.$datos3["esperas"].' data-postfix="" data-duration="1500" data-delay="600">0</div> 
										<h3>Solicitudes en Espera</h3> <a href="?url=solicitud_en_espera">Ver Detalles</a>
										</div> 
									</div> 
									<div class="col-sm-3 col-xs-6">
										<div class="tile-stats tile-aqua"> 
											<div class="icon">
												<i class="entypo-cog"></i>
											</div> 
											<div class="num" data-start="0" data-end='.$datos2["procesadas"].' data-postfix="" data-duration="1500" data-delay="1200">
												 0
											</div> <h3>Solicitudes Procesadas</h3> <a href="?url=solicitud_procesada">Ver Detalles</a>
										</div> 
									</div>
									<div class="col-sm-3 col-xs-6"> 
										<div class="tile-stats tile-blue"> 
											<div class="icon">
												<i class="entypo-rss"></i>
											</div> 
										<div class="num" data-start="0" data-end='.$datos["emitidas"].' data-postfix="" data-duration="1500" data-delay="1800">0</div> 
										<h3>Solicitudes Emitidas</h3> <a href="?url=solicitud_emitida">Ver Detalles</a>
										</div>
									</div> 
									 <div class="col-sm-3 col-xs-6">
										<div class="tile-stats tile-red"> 
											 <div class="icon">
												 <i class="entypo-rocket"></i>
											</div> 
											<div class="num" data-start="0" data-end='.$datos1['ejecutadas'].' data-postfix="" data-duration="1500" data-delay="0">
												0
											</div> <h3>Solicitudes Ejecutadas</h3>  <p>Solicitudes Culminadas</p>
										</div> 
									</div>
								</div>
								<footer class="main">
	<center>&copy; 2015 <strong>ATCSISTEM</strong> | Almacenes y Transportes Cerealeros A.T.C. C.A | RIF: J-30762485-0 | Avenida los Agricultores sector Bella Vista Frente al Monumento la Espiga, Sede Profinca</center> 
	</footer>
								';
						}
						else if($perfil == 'EXTERNO')
						{
							echo '<div class="row spa">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Solicitudes en Espera</div>
				<div class="panel-options">  <a href="" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> <i class="entypo-help" onclick="abrepais()"></i></div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
			</div>
				<div class="panel-body">
					<table class="table  table-striped table-hover">
						<thead>
							<tr>
								<th>Nro</th>
								<th>RIF</th>
								<th>Cliente</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Precio por Unidad</th>
								<th>Unidades Requeridas</th>
								<th>Precio Total</th>
								<th>Aceptar</th>
								<th>Rechazar</th>
							</tr>
						</thead>
						<tbody>						
							'.$us->listar_solicitud_espera($idclienteusuario).'
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>';
						}
						else if($perfil != 'ADMINISTRADOR')
						{
							echo '<h1>Bienvenido</h1>';
						}

				} 
					?>
 
<div class="row"> 
	<div class="col-sm-9"> 
		<div class="row"> 
			<div class="col-sm-6">  
			</div> 
			<div class="col-sm-6">  
			</div> 
		</div> 
	</div> 
</div> 

</div>
<!--
 aqui chat
-->
<div class="modal invert fade" id="sample-modal-dialog-2"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				 <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4> 
			</div> 
			<div class="modal-body"> 
				<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p> 
			</div> 
			<div class="modal-footer"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary">Save changes</button> 
			</div> 
		</div> 
	</div> 
</div>
<div class="modal gray fade" id="sample-modal-dialog-3"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
				<h4 class="modal-title">Widget Options - Gray Skin Modal</h4> 
			</div> 
			<div class="modal-body"> 
				<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p> 
			</div> 
			<div class="modal-footer"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary">Save changes</button> 
			</div> 
		</div> 
	</div>
</div>
<?php
				if(isset($_GET["url"]))
				{
					@include("Modal/".$_GET["url"].".php");
				}

	?>
		<link rel="stylesheet" href="css/jquery-jvectormap-1.2.2.css" id="style-resource-1"> 
		<link rel="stylesheet" href="css/rickshaw.min.css" id="style-resource-2"> 
		<script src="js/main-gsap.js" id="script-resource-1"></script> 
		<script src="js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script> 
		<script src="js/bootstrap.js" id="script-resource-3"></script> 
		<script src="js/joinable.js" id="script-resource-4"></script> 
		<script src="js/resizeable.js" id="script-resource-5"></script> 
		<script src="js/neon-api.js" id="script-resource-6"></script> 
		<script src="js/cookies.min.js" id="script-resource-7"></script> 
		<script src="js/jquery-jvectormap-1.2.2.min.js" id="script-resource-8"></script> 
		<script src="js/jquery-jvectormap-europe-merc-en.js" id="script-resource-9"></script> 
		<script src="js/jquery-jvectormap-world-mill-en.js" id="script-resource-10"></script> 
		<script src="js/jquery.sparkline.min.js" id="script-resource-11"></script> 
		<script src="js/d3.v3.js" id="script-resource-12"></script> 
		<script src="js/rickshaw.min.js" id="script-resource-13"></script> 
		<script src="js/neon-chat.js" id="script-resource-14"></script>
		<script src="js/neon-custom.js" id="script-resource-15"></script> <!-- Demo Settings --> 
		<script src="js/neon-demo.js" id="script-resource-16"></script> 
		<script src="js/neon-skins.js" id="script-resource-17"></script> 
		<script type="text/javascript">
// Instance the tour
var tour = new Tour({
  steps: [
  {
    element: "#my-element1",
    title: "Boton para Ocultar o Mostrar el Menu Lateral",
    content: "Permite ver el contenido de la Páguina de manera mas amplia"
  },
  {
    element: "#my-element2",
    title: "Mi Perfil ",
    content: "Muestra las opciones para configurar tu perfil y cerrar sesion"
  },
  {
    element: "#main-menu",
    title: "Menu del Sistema",
    content: "Esta barra lateral permite mostrar las distintas transaciones presentes en el sistema para determinados usuarios"
  },
  {
    element: "#my-element",
    title: "Botones de Acceso Rapido",
    content: ""
  },
  {
    element: "#my-other-element",
    title: "Boton Cerrar Sesión",
    content: "Clausura la Sesión del Usuario Online"
  }
]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();

</script>
		
		</body> </html>
