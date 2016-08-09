<?php
	include_once ("../../../modelo/class_ordcar.php");
	$sol=new class_ordcar;
	$datos = $sol->reporteordencargaemitida();	
	$datos1 = $sol->reporteordencargaejecutada();	
	$datos2 = $sol->reporteordencarga();	

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
                text: 'Almacenes y Transporte Cerealeros ATC C.A. <br> Estadisticas-Ordenes de Carga '
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
                    ['Nro de Ordenes de Cargas Emitidas <?php print($datos['emitidas']) ?>',   <?php print($datos['emitidas']) ?>],
                    ['Nro de Ordenes de Cargas Ejecutadas <?php print($datos1['ejecutadas']) ?>',   <?php print($datos1['ejecutadas']) ?>],
                    
                    
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
				<h3 style="margin-left:20px;">Total Ordenes de Carga:   
				<?php print($datos2['ordenes']) ?>
				</h3>
				</center><br>
			</div>
		</div>
	</body>
</html>
