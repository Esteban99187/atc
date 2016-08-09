<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">


<body style="background:#FAFAFA">
	<div class="form-group col-md-3"></div><center>
		<div class="container" style="margin-top:15px">
				<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-md-3"></div>
								<div class="form-group col-lg-7">
								<img class="img-responsive" src="imagenes/usu.jpg" alt="">
									
								</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<h1 style="color:#BF0000">FELICITACIONES</h1>
										<h2>Registro Realizado Exitosamente</h2><br>
										<h4>Recuerde que al ingresar por primera vez se le solicitara su nombre de usuario. Y su clave sera su cedula</h4></div>
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
