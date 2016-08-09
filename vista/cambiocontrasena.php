<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">

<body style="background:#FAFAFA">
	<center>
	<div class="form-group col-md-3"></div><center>
		<div class="container" style="margin-top:15px">
				<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-md-2"></div>
								<div class="form-group col-lg-8">
										<img class="img-responsive" src="imagenes/camb.jpg" alt="">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<br><h1 style="color:#DB4D4D">¡FELICITACIONES!</h1>
										<h2>Su Contraseña ha sido Modificada Exitosamente</h2><br>
										</div>
									</div>
									
										<input type="button" name="btnguardar" value="Iniciar Sesion" class="btn btn-primary btn-lg" tabindex="1" onclick="fsesion();">
										<input type="button" name="btncancelar" value="Salir" class="btn btn-primary btn-lg" tabindex="2" onclick="fsalir();"></div>
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

</html>

<script language="javascript">

	function fsesion()
	{
		window.location="session.php"
	}
	function fsalir()
	{
				window.close("cambiocontrasena.php") 
	}


</script>
