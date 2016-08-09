<?php
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSYSTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2015 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
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
	require_once("modelo/class_bitacora.php");
	$b = new bitacora;
	require_once("modelo/class_atc.php");
	$lobj_atc= new class_atc();
	$atc= $lobj_atc->fatc();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ATC</title>
		<link href="vista/css/css/bootstrap.min.css" rel="stylesheet">
		<link href="vista/css/css/font-awesome.min.css" rel="stylesheet">
		<link href="vista/css/css/animate.min.css" rel="stylesheet">
		<link href="vista/css/css/prettyPhoto.css" rel="stylesheet">
		<link href="vista/css/css/main.css" rel="stylesheet">
		<link href="vista/css/css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="vista/imagenes/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="vista/imagenes/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="vista/imagenes/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="vista/imagenes/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="vista/imagenes/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<body id="page-top"  class="homepage">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="vista/imagenes/about/atc.png"></a>
				</div>
				<div class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="#page-top" >Inicio</a></li>
						<li><a href="#atcsystem">ATCSYSTEM</a></li>
						<li><a href="#services">Conocenos</a></li>
						<li><a href="#feature">Servicios</a></li>
						<li><a href="#recent-works">Galeria</a></li>
						<li><a href="#contact-info">Contactanos</a></li>
						<li><a href="" onclick="atcsesion()">ingresar Ejemplo</li>                        
					</ul>
				</div>
			</div>
		</nav>
		<section id="main-slider" class="no-margin">
			<div class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#main-slider" data-slide-to="0" class="active"></li>
					<li data-target="#main-slider" data-slide-to="1"></li>
					<li data-target="#main-slider" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item active" style="background-image: url(vista/imagenes/slider/fo3.jpg)">
						<div class="container">
							<div class="row slide-margin">
								<div class="col-sm-6">
									<div class="carousel-content">
										<h1 class="animation animated-item-1">Almacenes y Transporte Cerealeros A.T.C. C.A</h1>
										<h2 class="animation animated-item-2"><?php for($i=0;$i<count($atc);$i++){ $quienes_somos=$atc[$i][3]; echo "".$quienes_somos.""; } ?></h2>
										<a class="btn-slide animation animated-item-3" href="#services">Lee Mas Aqui</a>
									</div>
								</div>
								<div class="col-sm-6 hidden-xs animation animated-item-4">
									<div class="slider-img">
										<img src="vista/imagenes/slider/cam.png" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item" style="background-image: url(vista/imagenes/slider/bg2.jpg)">
						<div class="container">
							<div class="row slide-margin">
								<div class="col-sm-6">
									<div class="carousel-content">
										<h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
										<h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
										<a class="btn-slide animation animated-item-3" href="#">Read More</a>
									</div>
								</div>
								<div class="col-sm-6 hidden-xs animation animated-item-4">
									<div class="slider-img">
										<img src="vista/imagenes/slider/img2.png" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item" style="background-image: url(vista/imagenes/slider/fo22.jpg)">
						<div class="container">
							<div class="row slide-margin">
								<div class="col-sm-6">
									<div class="carousel-content">
										<h1 class="animation animated-item-1">Deseas contactarnos</h1>
										<h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
										<a class="btn-slide animation animated-item-3" href="#">Read More</a>
									</div>
								</div>
								<div class="col-sm-6 hidden-xs animation animated-item-4">
									<div class="slider-img">
										<img src="vista/imagenes/slider/img3.png" class="img-responsive">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
				<i class="fa fa-chevron-left"></i>
			</a>
			<a class="next hidden-xs" href="#main-slider" data-slide="next">
				<i class="fa fa-chevron-right"></i>
			</a>
		</section>
		<section id="atcsystem">
			<div class="container">
				<div class="center wow fadeInDown">
					<h2>ATCSYSTEM</h2>
				</div>
				<div class="row" style="background:#E5E5E5;">
					<div class="col-xs-12 col-sm-4 col-md-10">
						<br><br>
						<h2> Es una aplicación web que se ocupa de llevar el control 
						opreacional de la Empresa Almacenes y Transporte Cerealeros, ATC, C.A,
						</h2>
					</div>   
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="col-md-12">
							<div class="recent-work-wrap">
								<a class="btn btn-primary btn-lg" style="margin-left:30px;" onclick="atcsystem()"><i class="fa fa-laptop fa-3x"></i></a>
							</div>
						</div>
						<div class="col-md-12">
							<div class="recent-work-wrap">
								<a  href="vista/session.php" class="btn btn-primary btn-lg" >Iniciar Sesión</a><br><br>
							</div>
						</div> 
					</div>   
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="recent-work-wrap">
							<br><i class="fa fa-envelope-o fa-5x fa-border"></i>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-10">
						<h4><i class="fa fa-check-circle-o"></i> ¿Deseas Realizar una Solicitud de Transporte?</h4>
						<h5 style="color:#D86060"> Si no se encuentra registrado en el sistema debe ir a la empresa para hacer dicha operación llevando los requisitos exigidos</h5>
						<h5 style="color:#D86060"> Ingresa al sistema de atc "ATCSYSTEM" en el formulario que se encuentra en la vista principal dando click en "Registrarme" podrás obtener tu usuario y contraseña</h5>
						<h5 style="color:#D86060"> Para que se haga efectiva su solicitud deberá aprobar la cotización</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-10">
						<h4 class="text-right"><i class="fa fa-check-circle-o"></i> Requisitos para ser cliente de atc, c.a.</h4>
						<h5 class="text-right" style="color:#D86060"> Persona Natural:Cedula de Identidad, Rif</h5>
						<h5 class="text-right" style="color:#D86060">Persona Jurídica:Copia Registro Mercantil, Copia C.I Representante, Copia Rif, 1 Copia de Rubros, Copia SADA, copia de inscripción, del INSAI</h5>
						<h5 class="text-right" style="color:#D86060">Si representa alguna empresa debe poseer Autorización legal de la empresa que pertenezca</h5>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="recent-work-wrap">
							<br><i class="fa fa-user fa-5x fa-border"></i>
						</div>
						<div class="recent-work-wrap">
							<a class="btn btn-primary btn-lg" href="vista/RECAUDOS.pdf">Imprimir <br>Recaudos</a><br><br>
						</div>
					</div> 
				</div>
			</div>
		</section>
		<section id="services" class="service-item">
			<div class="container">
				<div class="center wow fadeInDown">
					<h2>Conocenos</h2>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<div class="media services-wrap wow fadeInDown">
							<div class="pull-left">
								<img class="img-responsive" src="vista/imagenes/about/ca3.png">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Visión</h3>
								<p><?php for($i=0;$i<count($atc);$i++){ $vision=$atc[$i][1]; echo "".$vision."<"; } ?></p>
							</div>
						</div>
					</div> 
					<div class="col-sm-6 col-md-6">
						<div class="media services-wrap wow fadeInDown">
							<div class="pull-left">
								<img class="img-responsive" src="vista/imagenes/about/ca2.png">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Misión</h3>
								<p><?php for($i=0;$i<count($atc);$i++){ $mision=$atc[$i][0]; echo "".$mision.""; } ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="media services-wrap wow fadeInDown">
							<div class="pull-left">
								<img class="img-responsive" src="vista/imagenes/about/ca1.png">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Objetivos</h3>
								<p><?php for($i=0;$i<count($atc);$i++){ $objetivos=$atc[$i][4]; echo "".$objetivos.""; } ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="media services-wrap wow fadeInDown">
							<div class="pull-left">
								<img class="img-responsive" src="vista/imagenes/about/hoja.png">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Historia</h3>
								<p><?php for($i=0;$i<count($atc);$i++){ $historia=$atc[$i][2]; echo "".$historia.""; } ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="feature" >
			<div class="container">
				<div class="center wow fadeInDown">
					<h2>Servicios</h2>
					<p class="lead">Almacenes y Transporte Cerealeros, ATC, C.A; tiene una estructura organizativa bien definida la cual facilita las funciones, actividades y cumplimiento de las labores responsablemente. Dicha estructura cuenta con un excelente ambiente de trabajo de colaboración y con buenas relaciones.</p>
				</div>
				<div class="row">
					<div class="features">
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-cog"></i>
								<h2>Flota</h2>
								<h3>Este departamento se encarga de llevar toda la relación de la flota de camiones que tiene la empresa</h3>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-map-marker"></i>
								<h2>Satelite</h2>
								<h3>En este departamento se monitorea toda la flota de camiones que tiene la empresa, por toda Venezuela</h3>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-road"></i>
								<h2>Trafico I y II</h2>
								<h3>Es el responsable de la entrada y salida de mercancía para conseguir que las operaciones de carga y descarga se lleven a cabo con el máximo rigor posible.</h3>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-laptop"></i>
								<h2>Sistemas</h2>
								<h3>Se encarga de implementación de los sistemas de informática estableciendo las normas y procedimientos para los sistemas de computación o informática de la empresa.</h3>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-list-alt"></i>
								<h2>Servicios Generales</h2>
								<h3>Le corresponde proporcionar oportuna y eficientemente, los servicios que requiera la organización en materia de comunicaciones.</h3>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="feature-wrap">
								<i class="fa fa-shopping-cart"></i>
								<h2>Facturación y Cobranza</h2>
								<h3>Tiene como responsabilidad generar la factura correspondiente, asegurándose de la cantidad a cobrar sea la correcta y toda la información sea llenada apropiadamente.</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-inbox"></i>
							<h2>Consultoria Juridica</h2>
							<h3>Se encarga de llevar a cabo el proceso de asesoramiento legal de la empresa</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-usd"></i>
							<h2>Compras</h2>
							<h3>Este es responsable de gestionar las compras de materiales que necesitan la empresa</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-lock"></i>
							<h2>Seguridad Integral</h2>
							<h3>Constituye el conjunto de actividades orientadas a resguardar la integridad física de las personas y de las instalaciones</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-check"></i>
							<h2>Seguridad Industrial</h2>
							<h3>Revisar,aprobar las políticas de seguridad y realizar inspecciones periódicas de seguridad</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-wrench"></i>
							<h2>Taller</h2>
							<h3>Este departamento se encarga de todos los vehículos de la empresa esten en optimas condiciones, tanto internas como externas</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-plus"></i>
							<h2>Autogestión de Salud</h2>
							<h3>Definir las estrategias y acciones a desarrollar para realización del autodiagnóstico y la implementación y operación del Sistema de Autogestión de Salud y Seguridad en el Trabajo</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-folder-open"></i>
							<h2>Administración</h2>
							<h3>Se encarga de organizar, planificar y controlar las diferentes funciones de la empresa</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-credit-card"></i>
							<h2>Contabilidad</h2>
							<h3>Es la actividad administrativa que tiene como objetivo llevar el registro de los movimientos contables efectuados en la empresa</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-barcode"></i>
							<h2>Almacen</h2>
							<h3>Es una unidad de servicio en la estructura orgánica y funcional con objetivos bien definidos de resguardo, custodia, control y abastecimiento de materiales y productos</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-user"></i>
							<h2>Talento Humano</h2>
							<h3>Esta se ocupa de planificar, organizar, dirigir controlar y supervisar todos los movimientos que involucren al bienestar social y el desarrollo del recurso mas importante de la empresa, el recurso humano</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-book"></i>
							<h2>Gestión Comunitria</h2>
							<h3>Diseñar, planear, programar, monitorear y asesorar el desempeño formativo y comunitario de la empresa hacia la Comunidad</h3>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="feature-wrap">
							<i class="fa fa-globe"></i>
							<h2>Planificación y Presupuesto</h2>
							<h3>Proponer a la Alta Dirección los planes, programas y proyectos sectoriales e institucionales, presupuestos y acciones de nacionalización administrativa, en coordinación con los Órganos de línea correspondientes</h3>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="recent-works">
			<div class="container">
				<div class="center wow fadeInDown">
					<h2>Galeria</h2>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo4.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo4.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i>Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i>Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo3.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo3.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i> Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo2.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo2.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i> Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo5.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo5.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i> Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="recent-work-wrap">
							<img class="img-responsive" src="vista/imagenes/portfolio/fo6.JPG" alt="">
							<div class="overlay">
								<div class="recent-work-inner">
									<h1>
									<a class="preview" href="vista/imagenes/portfolio/fo6.JPG" rel="prettyPhoto"><i class="fa fa-eye"></i> Ver</a></h1>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="contact-info">
			<div class="center">
				<h2>Contactanos</h2>
			</div>
			<div class="gmap-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-5 text-center">
							<div class="gmap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31476.693151877476!2d-69.21402800000001!3d9.544594!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e7dc16b21500a8f%3A0x8fbee8cb2c70ba33!2sLa+Espiga%2C+Araure!5e0!3m2!1ses!2sve!4v1430143722258" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
							</div>
						</div>
						<div class="col-sm-7 map-content">
							<ul class="row">
								<li class="col-sm-6">
									<br>
									<address>
										<h5><i class="fa fa-phone"></i>Telf Empresa</h5>
										<p>621-49-55, 621-23-18</p>
										<p>Extension :118-117</p>
									</address>
								</li>
								<li class="col-sm-6">
									<address>
										<h5><i class="fa fa-laptop"></i>Area de Sistema</h5>
										<p>Yeline Mogollon:   Tlf: 0412-3002389<br>
										E-mail:   yalinem@gproarepa.com.ve </p>                                
										<p>Zaida Ontiveros:   Tlf: 0412-3002382<br>
										E-mail:   zaida@gproarepa.com.ve</p>
									</address>
								</li>
								<li class="col-sm-12">
									<address>
										<h5><i class="fa fa-map-marker"></i>Dirección</h5>
										<p>Avenida los Agricultores sector Bella Vista Frente al Monumento la Espiga, Sede Profinca</p>
									</address>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-11">
						<span class="copyright"> Almacenes y Transporte Cerealeros A.T.C. C.A 2014 | RIF: J-30762485-0 | &copy;  Copyleft</span>
					</div>
					<div class="col-md-1">
						<ul class="list-inline social-buttons">
							
							<li><a href="https://www.facebook.com/pages/Almacenes-y-Transporte-Cerealeros-ATC/150454385037519?fref=ts"><i class="fa fa-facebook"></i></a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<script src="vista/js/js1/jquery.js"></script>
		<script src="vista/js/js1/bootstrap.min.js"></script>
		<script src="vista/js/js1/jquery.prettyPhoto.js"></script>
		<script src="vista/js/js1/jquery.isotope.min.js"></script>
		<script src="vista/js/js1/main.js"></script>
		<script src="vista/js/js1/wow.min.js"></script>
	</body>
</html>
<script type="text/javascript">
document.oncontextmenu = function()
	{
		return false;
	}
	var miPopup
	function atcsystem()
	{
		miPopup = window.open("vista/session.php","SESSION","width=1366px,height=870px,scrollbars=yes,toolbar=No") 
		miPopup.focus()
	}

	function atcsesion()
	{
		miPopup = window.open("vista/atc_session.php","SESSION","width=1366px,height=870px,scrollbars=yes,toolbar=No") 
		miPopup.focus()
	}
</script>
