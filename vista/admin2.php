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
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ATCSISTEM</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/timeline.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<script src="js/validacionScript.js"></script>
		<script src="js/bootstrapValidator.js"></script>
		<script src="js/validaciones.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">ATCSISTEM</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?url=miperfil"><i class="fa fa-user fa-fw"></i> Mi Perfil</a>
                        </li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-gear fa-fw"></i> Acerca de</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../controlador/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerra Session</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> ESCRITORIO</a>
                        </li>
						<?php
							if($menu->consulta_por($_SESSION['idPerfil']))
							{
								while($row_modulos=$menu->row())
								{
									echo '<li>';
										echo '<a href="#"><i class="'.$row_modulos['UrlMen'].'"></i> '.strtoupper($row_modulos['NombreMen']).'<span class="fa arrow"></span></a>';
										echo '<ul class="nav nav-second-level">';
											if($Operacion->ConsultaOperacionPorMenu($row_modulos['IdMenu']))
											{
												while($RowOperacionPorMenu=$Operacion->row())
												{
													echo '<li>';
														echo '<a href="?url='.$RowOperacionPorMenu['UrlOpe'].'">'.strtoupper($RowOperacionPorMenu['NombreOpe']).'</a>';
													echo '</li>';
												}
											}
											if($Submenu->consulta_por($row_modulos['IdMenu']))
											{
												while($row_servicio=$Submenu->row())
												{
													echo '<li>';
														echo '<a href="?url='.$row_servicio['UrlSub'].'">'.strtoupper($row_servicio['NombreSub']).'<span class="fa arrow"></span></a>';
														echo '<ul class="nav nav-third-level">';
															if($Operacion->consulta_por($row_servicio['IdSubmenu']))
															{
																while($row_operacion=$Operacion->row())
																{				
																	echo '<li>';
																		echo '<a href="?url='.$row_operacion['UrlOpe'].'">'.strtoupper($row_operacion['NombreOpe']).'</a>';
																	echo '</li>';
																}
															}
														echo '</ul>';
													echo '</li>';
												}
											}
										echo'</ul>';
									echo '</li> ';
								}
							}
						?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
						<?php
				if(isset($_GET["av"]))
				{
					$alerta = $b->buscarAlerta($_GET["av"]);
					echo '<br><div class="alert '.$alerta[1].'" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$alerta[0].'</div>';
				}
				if(isset($_GET["url"]))
				{
					echo '<br>';
					include($_GET["url"].".php");
				}
				else
				{ 
					$perfil = $menu->cualPerfil($_SESSION["idPerfil"]);
					if($perfil == 'ADMINISTRADOR')
					{
						echo '	<div class="row">
									<div class="col-lg-12">
										<h1 class="page-header"><i class="fa fa-user fa-fw"></i>Bienvenido Administrador</h1>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<div class="panel panel-primary">
											<div class="panel-heading">
												<div class="row">
													<div class="col-xs-3">
														<i class="fa fa-comments fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
														<div class="huge">26</div>
														<div>Solicitudes Emitidas</div>
													</div>
												</div>
											</div>
											<a href="#">
												<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="panel panel-green">
											<div class="panel-heading">
												<div class="row">
													<div class="col-xs-3">
														<i class="fa fa-cog fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
														<div class="huge">12</div>
														<div>Solicitudes en Espera</div>
													</div>
												</div>
											</div>
											<a href="#">
												<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="panel panel-yellow">
											<div class="panel-heading">
												<div class="row">
													<div class="col-xs-3">
														<i class="fa fa-file fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
														<div class="huge">124</div>
														<div>Solicitudes Procesadas</div>
													</div>
												</div>
											</div>
											<a href="#">
												<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-lg-3 col-md-6">
										<div class="panel panel-red">
											<div class="panel-heading">
												<div class="row">
													<div class="col-xs-3">
														<i class="fa fa-user fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
														<div class="huge">13</div>
														<div>Verificar Usuario</div>
													</div>
												</div>
											</div>
											<a href="#">
												<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
												</div>
											</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<i class="fa fa-bell fa-fw"></i> Notifications Panel
											</div>
											<div class="panel-body">
												<div class="list-group">
													<a href="#" class="list-group-item">
														<i class="fa fa-comment fa-fw"></i> New Comment
														<span class="pull-right text-muted small"><em>4 minutes ago</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-twitter fa-fw"></i> 3 New Followers
														<span class="pull-right text-muted small"><em>12 minutes ago</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-envelope fa-fw"></i> Message Sent
														<span class="pull-right text-muted small"><em>27 minutes ago</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-tasks fa-fw"></i> New Task
														<span class="pull-right text-muted small"><em>43 minutes ago</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-upload fa-fw"></i> Server Rebooted
														<span class="pull-right text-muted small"><em>11:32 AM</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-bolt fa-fw"></i> Server Crashed!
														<span class="pull-right text-muted small"><em>11:13 AM</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-warning fa-fw"></i> Server Not Responding
														<span class="pull-right text-muted small"><em>10:57 AM</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
														<span class="pull-right text-muted small"><em>9:49 AM</em>
														</span>
													</a>
													<a href="#" class="list-group-item">
														<i class="fa fa-money fa-fw"></i> Payment Received
														<span class="pull-right text-muted small"><em>Yesterday</em>
														</span>
													</a>
												</div>
												<a href="#" class="btn btn-default btn-block">View All Alerts</a>
											</div>
										</div>
									</div>
								</div>';
					}
					else if($perfil != 'ADMINISTRADOR')
					{
						echo '	<div class="row">
									<div class="col-lg-12">
										<h1 class="page-header"><i class="fa fa-user fa-fw"></i>Bienvenido</h1>
									</div>
								</div>';
					}

				} 
					?>
      
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Acerca de</h4>
				</div>
				<div class="modal-body text-center">
					<?php
					$datos = $con->datosConfiguracionTodo();
					echo '<h4><b>'.strtoupper($datos[4]).'</b></h4>
					<br>
					<h4>VERSIÓN '.strtoupper($datos[5]).'</h4>
					<br>
					<h4>LENGUAJE '.strtoupper($datos[6]).'</h4>';
					?>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script type="text/javascript">
	document.oncontextmenu = function(){return false;}
</script>

