<?php
	include_once ("../../../modelo/class_unidad.php");
	$sol=new class_unidad;
	$datos = $sol->reporteunidaactiva();	
	$datos1 = $sol->reporteunidainactiva();	
	$datos2 = $sol->reporteunida();	
	

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
                text: 'Almacenes y Transporte Cerealeros ATC C.A. <br> Estadisticas-Unidades '
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
                    ['Nro de Unidades Disponibles <?php print($datos['activas']) ?>',   <?php print($datos['activas']) ?>],
                    ['Nro de Unidades Inactivas <?php print($datos1['inactivas']) ?>',   <?php print($datos1['inactivas']) ?>],
                    
                    
                    
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
				<h3 style="margin-left:20px;">Total Unidades:   
				<?php print($datos2['unidades']) ?>
				</h3>
				</center><br>
			</div>
		</div>
	</body>
</html>
