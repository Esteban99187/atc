<?php
	include_once ("../../../modelo/class_solicitud.php");
	$sol=new class_solicitud;
	$datos = $sol->reportesolicitudemitida();	
	$datos1 = $sol->reportesolicitudejecutada();
	$datos2 = $sol->reportesolicitudprocesada();
	$datos3 = $sol->reportesolicitudespera();	
	$datos4 = $sol->reportesolicitud();
	$datos5 = $sol->reportesolicitudanulada();
	$datos6 = $sol->reportesolicituddevuelta();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<script type="text/javascript" src="../js/jquery-1.8.2.js"></script>
		
		
		<style type="text/css">
            ${demo.css}

            text[style="cursor:pointer;color:#909090;font-size:9px;fill:#909090;"]{
                display: none;
            }
		</style>
		<script type="text/javascript">
			$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Almacenes y Transporte Cerealeros ATC C.A. <br> Estadisticas-Solicitudes de Transporte '
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Porcentaje ',
                data: [
                    ['Nro Solicitudes Ejecutadas <?php print($datos1['ejecutadas']) ?>',   <?php print($datos1['ejecutadas']) ?>],
                    ['Nro Solicitudes Emitidas <?php print($datos['emitidas']) ?>',   <?php print($datos['emitidas']) ?>],
                    ['Nro Solicitudes Procesadas <?php print($datos2['procesadas']) ?>',   <?php print($datos2['procesadas']) ?>],
                    ['Nro Solicitudes en  Espera <?php print($datos3['esperas']) ?>',   <?php print($datos3['esperas']) ?>],
                    ['Nro Solicitudes Anulada<?php print($datos5['anuladas']) ?>',   <?php print($datos5['anuladas']) ?>],
                    ['Nro Solicitudes Devuelta<?php print($datos6['devueltas']) ?>',   <?php print($datos6['devueltas']) ?>],
                    
                ]
            }]
        });
    });

});
            
		</script>
	</head>
	<body>
<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<br><center>
				<h3 style="margin-left:20px;">Total de Solicitudes:   <?php print($datos4['solicitudes']) ?></h3>
				</center><br>
			</div>
		</div>
	</body>
</html>
