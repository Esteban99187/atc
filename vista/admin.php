<?php
	ob_start();
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
	if(empty($login)){
		echo '<script>window.location="session.php?alert=32"</script>';
	}else{
		$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		date_default_timezone_set("America/Caracas");
		$ahora = date("Y-n-j H:i:s"); 
		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 
		//comparamos el tiempo transcurrido 
		if($tiempo_transcurrido >= $_SESSION["tiempoSession"]){
			//si pasaron 10 minutos o más 
			session_destroy(); // destruyo la sesión 
			header("Location: ../index.php"); //envío al usuario a la pag. de autenticación 
			//sino, actualizo la fecha de la sesión 
		}else{ 
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

	//buscamos las notificaciones
	include_once("../modelo_alberto/clsNotificacion.php");
	$notify = new notificacion;
	$notificaciones = $notify->buscarNotificaciones();
	$cantNotificaciones = count($notificaciones);
	
	// Otras notificaciones
	include_once("../modelo_alberto/clsdetalle_registro_diario.php");
	$mpp = new clsdetalle_registro_diario();
	$mantenimientos = $mpp->buscar_pendiente_manteniento();
	$cantMPP = count($mantenimientos);
	
	include_once("../modelo_alberto/clsMantenimiento.php");
	$dp = new clsMantenimiento();
	$diagnosticos = $dp->diagnostico_pendiente();
	$cantDP = count($diagnosticos);

	include_once("../modelo_alberto/clsInventario.php");
	$spr = new Inventario();
	$stock = $spr->stock_por_reponer();
	$cantSPR = count($stock);	
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
		<!--link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3">-->
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
		<div class="mensajeAlerta" id="msjConfirm" style="top: 20px; visibility: hidden;">
			<div class="contentMsj">
				<span id="messageConfirm"> </span>
				<div align="center" style="margin: 1px auto; padding: 0">
					<button id="acceptConfirm2" class="btn-sm btn-primary">Aceptar</button>
					<button id="cancelConfirm" class="btn-sm btn-danger">Cancelar</button>
				</div>
			</div>
		</div>
		<div id="msjAlerta" class="mensajeAlerta" style="visibility: hidden; opacity:0;"></div>

		<!--mascara-->
		<div id="mascara"></div>

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
						</div> 
					</header> 
					<!--<div class="sidebar-user-info" id="my-element2"> 
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
					</div>--> 
					<ul id="main-menu" class="main-menu"> 
						<li class="opened active"> 
							<a href="admin.php">
								<i class="entypo-gauge"></i>
								<span class="title">Escritorio</span>
							</a> 
						</li>  
						<!--inicia recorrido dinamico del menu-->
						<?php
							if($menu->consulta_por($_SESSION['idPerfil'])){
								while($row_modulos=$menu->row()){
									echo '<li>';
										echo '<a href="#">';
											echo '<i class="'.$row_modulos['UrlMen'].'"></i>';
											echo '<span class="title">'.strtoupper($row_modulos['NombreMen']).'</span>';
										echo '</a>'; 
								echo '<ul>';
									if($Operacion->ConsultaOperacionPorMenu($row_modulos['IdMenu'])){
										while($RowOperacionPorMenu=$Operacion->row()){
											echo '<li>';
												echo '<a href="?url='.$RowOperacionPorMenu['UrlOpe'].'">';
													echo '<i class=""></i>';
													echo '<span class="title">'.strtoupper($RowOperacionPorMenu['NombreOpe']).'</span>';
												echo '</a>';
											echo '</li>'; 
										}
									}
									
									if($Submenu->consulta_por($row_modulos['IdMenu'])){
										while($row_servicio=$Submenu->row()){
											echo '<li>';
													echo '<a href="?url='.$row_servicio['UrlSub'].'">';
														echo '<i class=""></i>';
														echo '<span class="title">'.strtoupper($row_servicio['NombreSub']).'</span>';
													echo	'</a>'; 
												echo '<ul>';
											
													
													if($Operacion->consulta_por($row_servicio['IdSubmenu'])){
														while($row_operacion=$Operacion->row()){
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
		<div class="main-content">  
			<div class="row">  
				<div class="col-md-6 col-sm-8 clearfix"> 
					<ul class="user-info pull-left pull-none-xsm">
						<li class="profile-info dropdown">
							<a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="#" alt="" class="img-circle" width="44">
								<img src="imagenes/user.png" width="52px" height="52px" alt="" class="pull-left img-circle" />
								<?php echo strtoupper($nombreusuario.' '.$apellidousuario); ?>
							</a>

							<ul class="dropdown-menu">
								<li class="caret"></li>
								<li> 
									<a href="?url=miperfil"> 
										<i class="entypo-user"></i>
										Editar Perfil
									</a> 
								</li> 
								<li> 
									<a href="../controlador/logout.php"> 
										<i class="entypo-logout"></i>
										Cerrar Sesión
									</a> 
								</li> 
							</ul>
							<br>Ultima Conexión: 
						</li> 
					</ul>
					<!--
					<ul class="user-info pull-left pull-right-xs pull-none-xsm">
						<li class="notifications dropdown"> 
							<a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> 
								<i class="entypo-mail"></i> 
								<span class="badge badge-secondary"><?php echo $cantNotificaciones ?></span> 
							</a> 
							<ul class="dropdown-menu">  
								<li> 
									<ul tabindex="5002" style="overflow: hidden;" class="dropdown-menu-list scroller"> 
										<?php if($notificaciones): ?>
										<?php foreach($notificaciones as $idxNoti => $notificacion): ?>
										<li class="active"> 
											<a href="<?php  ?>"> 
												<span class="image pull-right"> 
													<img src="#" alt="" class="img-circle" width="44"> 
												</span> 
												<span class="line"> <strong><?php $notificacion["usuario"] ?></strong>- <?php $notificacion["tiempo"] ?></span> 
												<span class="line desc small">
													<?php echo $notificacion["msj"] ?>
												</span> 
											</a> 
										</li> 
										<?php endforeach; ?>
										<?php endif; ?>
									</ul> 
								</li> 
								<li class="external"> 
									<a href="http://demo.neontheme.com/mailbox/main/">Ver Todos</a> 
								</li>
								<div style="padding-right: 3px; width: 8px; z-index: 1000; cursor: default; position: absolute; top: 0px; left: -8px; height: 0px; display: none;" class="nicescroll-rails" id="ascrail2002">
									<div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(212, 212, 212); border: 1px solid rgb(204, 204, 204); background-clip: padding-box; border-radius: 1px;"></div>
								</div>
								<div style="height: 5px; z-index: 1000; top: -5px; left: 0px; position: absolute; cursor: default; display: none;" class="nicescroll-rails" id="ascrail2002-hr">
									<div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(212, 212, 212); border: 1px solid rgb(204, 204, 204); background-clip: padding-box; border-radius: 1px;"></div>
								</div>
							</ul> 
						</li>
					</ul> 
					-->
				</div> 
				<div class="col-md-6 col-sm-4 clearfix hidden-xs" > 
					<ul class="list-inline links-list pull-right" id="my-other-element">
						<li class="sep"></li> <li> <a href="../controlador/logout.php">Cerrar Sesión <i class="entypo-logout right"></i> </a> </li> 
					</ul> 
				</div> 
			</div> 
			<hr>
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
					</footer>';
				}
				else if($perfil == 'EXTERNO')
				{
					echo '
					<div class="col-md-4">
						<div class="col-sm-12 col-xs-12"> 
							<div class="tile-stats tile-green"> 
								<div class="icon">
									<i class="entypo-clock"></i>
								</div> 
								<h3>Solicitudes en Espera</h3> <h4><a href="?url=solicitud_espera">Ver Detalles</a></h4>
							</div> 
						</div> 
						<div class="col-sm-12 col-xs-12">
							<div class="tile-stats tile-aqua"> 
								<div class="icon">
									<i class="entypo-cog"></i>
								</div> 
								<h3>Solicitudes Procesadas</h3> <h4><a href="?url=solicitud_procesada">Ver Detalles</a></h4>
							</div> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title"><i class="entypo-cog"></i>Proceso de Transporte</div>
								<div class="panel-options">  <a href="" data-rel="collapse"><i class="entypo-down-open"></i></a>  <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div> <!-- agregar este linea depues del icono close (despues del ultimo </a>) y cambiar el nombre de la funcion onclick<i class="entypo-help" onclick="abreproducto()"></i> luego al final dentro del <script> colocar la funcion onclick -> revisar el final para ver funcion onclick-->
							</div>
							<div class="panel-body">
								<div class="page-container"> 
									<div class="main-content"> 
										<div class="row">
											<div class="timeline-centered"> 
												<article class="timeline-entry"> 
													<div class="timeline-entry-inner"> 
														<time class="timeline-time">
															<span>1er Proceso</span>
															<span>Solicitud</span>
														</time>
														<div class="timeline-icon bg-success"> <i class="entypo-docs"></i> </div>
														<div class="timeline-label"> <h2><a>Solicitud de Transporte</a></h2>
															<p>Para iniciar este proceso se debe indicar la fecha, la dirección origen donde el producto será cargado, la direccion destino donde el producto será despachado y que producto que desea transportar. </p> 
														</div>
													</div>
												</article> 
												<article class="timeline-entry left-aligned"> 
													<div class="timeline-entry-inner"> 
														<time class="timeline-time">
															<span>2do Proceso</span>
															<span>Aprobación</span>
														</time> 
														<div class="timeline-icon bg-secondary"> <i class="entypo-basket"></i> 
														</div> 
														<div class="timeline-label"> <h2><a>Aprobación de la Solcitud</a></h2> 
															<p>En este proceso se aceptará el presupuesto emitido por la empresa, seguidamente si acepta dicha cotización debe cancelar en el departamento de facturación para luego dar inicio a la orden de carga. </p> </div>
														</div>
													</div>
												</article> 
												<article class="timeline-entry">
													<div class="timeline-entry-inner"> 
														<time class="timeline-time">
															<span>3er Proceso</span>
															<span>Inicio</span>
														</time>
														<div class="timeline-icon bg-info"> <i class="entypo-location"></i> 
														</div> 
														<div class="timeline-label"> <h2><a>Inicio del Viaje</a> <span></a></h2>
															<p>Luego de tener los datos de la solicitud y la empresa haya generado la orden para que su producto sea llevado al sitio acordado, usted debe esperar mientras un conductor asignado por la empresa realiza el viaje desde la dirección origen a la dirección destino proporcionado con antelación por la solicitud de trasnporte. </p> 
														</div>
													</div> 
												</article> 
												<article class="timeline-entry left-aligned">
													<div class="timeline-entry-inner"> 
														<time class="timeline-time">
															<span>4to Proceso</span> 
															<span>Culminación</span>
														</time> 
														<div class="timeline-icon bg-warning"> <i class="entypo-newspaper"></i> 
														</div>
														<div class="timeline-label"> <h2><a>Culminación del Viaje</a></h2>
															<P>Por último en este proceso, se asegura que su producto haya llegado al lugar destinado, cumpliendo así su solicitud emitida a la empresa. </P>
														</div>
													</div> 
												</article>
												<article class="timeline-entry begin"> 
													<div class="timeline-entry-inner"> 
														<div class="timeline-icon"> <i class="entypo-check"></i> 
														</div>
													</div>
												</article> 
											</div> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
				}
				else if($perfil == 'ADMINISTRADOR DE ATC')
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
							<div class="num" data-start="0" data-end='.$cantMPP.' data-postfix="" data-duration="1500" data-delay="600">0</div> 
								<h3>Mantenimientos Preventivos Pendientes</h3>
							</div> 
						</div> 
						<div class="col-sm-3 col-xs-6">
							<div class="tile-stats tile-aqua"> 
								<div class="icon">
									<i class="entypo-cog"></i>
								</div> 
								<div class="num" data-start="0" data-end='.$cantDP.' data-postfix="" data-duration="1500" data-delay="1200">0</div>
								<h3>Diagnosticos Pendientes</h3>
							</div> 
						</div>
					</div>
					<footer class="main">
						<center>&copy; 2015 <strong>ATCSISTEM</strong> | Almacenes y Transportes Cerealeros A.T.C. C.A | RIF: J-30762485-0 | Avenida los Agricultores sector Bella Vista Frente al Monumento la Espiga, Sede Profinca
						</center> 
					</footer>';
				}
				else if($perfil == 'ALMACEN')
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
							<div class="num" data-start="0" data-end='.$cantSPR.' data-postfix="" data-duration="1500" data-delay="600">0</div> 
								<h3>Repuestos / Lubricantes por Reponer</h3>
							</div> 
						</div> 
						<div class="col-sm-3 col-xs-6">
							<div class="tile-stats tile-aqua"> 
								<div class="icon">
									<i class="entypo-cog"></i>
								</div> 
								<div class="num" data-start="0" data-end='.$cantDP.' data-postfix="" data-duration="1500" data-delay="1200">0</div>
								<h3>Diagnosticos Realizados</h3>
							</div> 
						</div>
					</div>
					<footer class="main">
						<center>&copy; 2015 <strong>ATCSISTEM</strong> | Almacenes y Transportes Cerealeros A.T.C. C.A | RIF: J-30762485-0 | Avenida los Agricultores sector Bella Vista Frente al Monumento la Espiga, Sede Profinca
						</center> 
					</footer>';
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
		<!--<script src="js/neon-chat.js" id="script-resource-14"></script>-->
		<script src="js/neon-custom.js" id="script-resource-15"></script>
		<!--<script src="js/neon-demo.js" id="script-resource-16"></script> 
		<script src="js/neon-skins.js" id="script-resource-17"></script> -->
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
	</body> 
</html>
<?php ob_end_flush(); ?>