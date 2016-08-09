<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">



<body>
	<center>
		<div class="container" style="margin-top:5px">
			<div class="row spa">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
								<div class="panel-heading" style="background:#BFBFBF"><strong>Configuración</strong></div>
							<br>	<div class="row">
							<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/his.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=configuracion_historia"><h3 style="color:#000000">Historia</h3></a>
							</div>
							<div class="form-group col-lg-2"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/mi.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=configuracion_mision"><h3 style="color:#000000">Misión</h3></a>
							</div>
							<div class="form-group col-lg-2"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/vis.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=configuracion_vision"><h3 style="color:#000000">Visión</h3></a>
							</div>
								
								</div>
								<div class="row">
									<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/qui.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=configuracion_quienes_somos"><h3 style="color:#000000">Quienes Somos</h3></a>
							</div>
							<div class="form-group col-lg-2"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/conf.jpg" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=sistemaConfiguracion"><h3 style="color:#000000">Configuración</h3></a>
							</div>
							<div class="form-group col-lg-2"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/vi.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href="admin.php?url=configuracion_objetivos"><h3 style="color:#000000">Objetivos</h3></a>
							</div>
							
<!--
							<div class="form-group col-lg-1"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/vis.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href=""><h3 style="color:#000000">Visión</h3></a>
							</div>
							<div class="form-group col-lg-1"></div>
								<div class="form-group col-lg-1">
							   <img class="img-responsive" src="imagenes/vi.png" alt="">
							</div>
							<div class="form-group col-lg-1">
							   <a href=""><h3 style="color:#000000">Objetivos</h3></a>
							</div>
-->
									</div>
									<center>
<!--
										<div class="form-group col-lg-2"><input type="button" name="btnguardar" value="Iniciar Sesion" class="btn btn-primary btn-lg" tabindex="1" onclick="fsesion();"></div>
-->
<!--
										<div class="form-group col-lg-2"><input type="button" name="btncancelar" value="Salir" class="btn btn-primary btn-lg" tabindex="2" onclick="fsalir();"></div>
-->
									</center> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</center>	
</body>

<script language="javascript">

	function fsesion()
	{
		window.location="session.php"
	}
	function fsalir()
	{
				window.close("nuevaclave.php") 
	}


</script>
