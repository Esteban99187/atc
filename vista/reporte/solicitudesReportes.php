<?php
    require_once("../modelo/class_solicitudes.php");
    $rs = new solicitud;

    $cap = $rs->cantidadSolicitudesporTipo(1);
    $ins = $rs->cantidadSolicitudesporTipo(2);
    $sin = $rs->cantidadSolicitudesporTipo(6);
?>

<div class="row">

<div class="col-lg-6">

  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">TOTAL DE SOLICITUDES AÑO 2014</div>
  <table class="table text-center">
    <tr>
        <th>CAPACITACIÓN</th>
        <th>INSPECCIÓN</th>
        <th>SINIESTROS</th>
    </tr>
    <tr>
        <td><h4><b><?php echo $cap; ?></b></h4></td><td><h4><b><?php echo $ins; ?></b></h4></td><td><h4><b><?php echo $sin; ?></b></h4></td>
    </tr>
    </tr>
  </table>
</div>

 <div class="panel panel-default text-center">
  <!-- Default panel contents -->
  <div class="panel-heading">GENERAR REPORTE</div>
  <form method = "POST" name="generarReporte" action="controlador/controlador_genera_reporteSolicitud.php">

  <p><b>Selecciones los tipos de solicitudes</b></p>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea1" name="opcion[]" value="1"> CAPACITACIÓN
  </label>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea2" name="opcion[]" value="2"> INSPECCIÓN
  </label>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea3" name="opcion[]" value="6"> SINIESTRO
  </label>

  <p><b>Estatus de solicitudes</b></p>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea1" name="opcion2[]" value="p"> PENDIENTES
  </label>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea1" name="opcion2[]" value="a"> APROBADAS
  </label>
  <label class="checkbox-inline">
  <input type="checkbox" id="checkboxEnLinea2" name="opcion2[]" value="n"> RECHAZADAS
  </label>
  <br><br>
  <div class="col-xs-6">
  <input type="date" name="fechamin" class="form-control" value="">
  </div>
  <div class="col-xs-6">
  <input type="date" name="fechamax"class="form-control" value="">
  </div> 
  <br><br>
   <button class="btn btn-primary" name="boton" type="submit">Generar reporte</button>
<br><br>
  </form>
 </div>
 </div>

<div class="col-lg-6">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'PORCENTAJE DE SOLICITUDES TOTALES AÑO 2014'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
                ['CAPACITACIÓN',   <?php echo $cap; ?>],
                ['INSPECCIÓN',    <?php echo $ins; ?>],
                ['SINIESTROS',   <?php echo $sin; ?>]
            ]
        }]
    });
});


		</script>
	</head>
	<body>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>
</div>
