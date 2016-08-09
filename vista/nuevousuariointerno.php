<body style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */">
	<center>
		<div class="container" style="margin-top:150px">
			<div class="row spa">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-lg-4">
									<div class="center-block">
										<img class="img-responsive" src="imagenes/usu1.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-6">
										<h1 style="color:#DB4D4D">FELICITACIONES</h1>
										<h2>Registro Realizado Exitosamente</h2><br>
										<h4>Recuerde que al ingresar por primera vez se le solicitara su nombre de usuario. Y su clave sera su cedula</h4></div>
									</div>
									<div class="form-group col-lg-5">
									</div>
									<center>
										<div class="form-group col-lg-2"><input type="button" name="btnregresar" value="Regresar" class="btn btn-primary btn-lg" tabindex="1" onclick="fregresar();"></div>
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

	function fregresar()
	{
		window.location="admin.php?url=maestro_usuarioatc"
	}
	function fsalir()
	{
				window.close("nuevaclave.php") 
	}


</script>
