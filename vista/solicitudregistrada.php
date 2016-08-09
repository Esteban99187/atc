<?php
	$idsolicitud = isset($_GET['idsolicitud']) ? $_GET['idsolicitud'] : null;
?>
<div class="col-md-12">
	<div class="row spa">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group col-lg-4">
					<div class="center-block">
						<img class="img-responsive" src="imagenes/sol.png" alt="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<h1 style="color:#DB4D4D">SU SOLICITUD HA SIDO REGISTRADA EXITOSAMENTE</h1>
						<h2>BAJO EL SIGUIENTE NUMERO: <?php echo $idsolicitud; ?></h2><br>
					</div>
					<center>
						<button type="button" class="btn btn-primary btn-lg" name="btnregresar" value="Regresar" onclick="fregresar();"><i class="glyphicon glyphicon-chevron-left"></i></button>
						<button type="button" class="btn btn-primary btn-lg" name="btnregresar" value="Imprimir" onclick="Imprimir()"><i class="glyphicon glyphicon-print"></i></button>
					</center> 
				</div>
			</div>
		</div>
	</div>
</div>
<script language="javascript">
	function fregresar()
	{
		window.location="admin.php?url=transaccion_solicitud"
	}
	
	function Imprimir()
	{
		miPopup = window.open('../vista/reporte/pdfRep_solicitud1.php?lsa=<?php print($idsolicitud);?>');
	}
	
	
</script>

