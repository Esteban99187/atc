<?php
	ini_set("display_errors","off");
	error_reporting(0);
	include_once("dompdf/dompdf_config.inc.php");
	if(isset($_GET["nro"])){
		include("../modelo_alberto/clsSolicitud.php");
		$objSolicitud = new clsSolicitud;
		$datos = $objSolicitud->generarReporte($_GET["nro"]);
	}
$codigo = ' 
<html>
<head>
<style>
	body {
		background-image:url("tico.png");
		background-repeat:no-repeat;
		background-position:center center;
		background-size: 600px 200px;
	}
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    @media print {
    thead {
    display: table-header-group;
  }
   .table td,
  .table th {
    background-color: #fff !important;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }
}
.table {
  width: 100%;
  margin-bottom: 17px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid black;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid black;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid black;
}
.table .table {
  background-color: #ffffff;
}
.table-bordered {
  border: 1px solid black;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid black;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  background-color: #f5f5f6;
  border-bottom-width: 1px;
  color: #a6a7aa;
}
.table-bordered > tfoot > tr > th,
.table-bordered > tfoot > tr > td {
  background-color: #f5f5f6;
  border-top-width: 1px;
  color: #a6a7aa;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
</style>
</head>
<body>
<script type="text/php"> 
        if ( isset($pdf) ) { 
          $font = Font_Metrics::get_font("helvetica", "bold"); 
          $pdf->page_text(260, 765, "pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0)); 
        } 
</script> 

<img src="2atc.jpg" style="width:100%; height:60px;">
<br>
<br>
<div>
	<table width="100%" align="center">
	<tr>
		<td align="center">
		<center style="font-size:20px; font-weight:bold;"e>
			República Bolivariana de Venezuela<br>
			Ministerio del Poder Popular para Transporte Terrestre <br>
			Almacenes y Transporte Cerealeros<br>
			Acarigua - Estado Portuguesa
		</center>
		</td>
	</tr>
	
	</table>
    <center>
        <p style="font-size:20px; font-weight:bold;">Solicitud de Repuestos / Requisición</p>
    <center>
	<p style="font-size:20px; font-weight:bold;">Fecha:<?php  print(date("d-m-Y"));  ?></p>
    
	<table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th width="25">
                                Nro
                            </th>
                            <th>
                                Marca
                            </th>
                            <th>
                                Modelo
                            </th>
                            <th>
                                Repuesto
                            </th>
                            <th>
                                Cantidad Solicitada
                            </th>
                            <th>
                                Cantidad Aprobada
                            </th>
                        </tr>
                    </thead>
                    <tbody cl ass="detalle" id="transaccion">';
                         if($datos) foreach($datos as $index => $dato): 
                     $codigo .='
                            <tr>
                                <td>
                                    <input type="hidden" name="codigoDetalle[]" value="  '.$dato["iddetalle"].' ">   '.intval($index+1).'
                                </td>
                                <td>
                                    '.$dato["marca"].'
                                </td>
                                <td>
                                    '.$dato["modelo"].'
                                </td>
                                <td>
                                    '.$dato["repuesto"].'
                                </td>
                                <td>
                                    '.$dato["cantidad"].'
                                </td>
                                <td>
									'.$dato["cantidadaprobada"].'
                                </td>
                            </tr>
                        ';
                         endforeach; 
                        $codigo .='
                    </tbody>
                </table>
                <hr />
                <table class="table">
                    <tr>
                        <td>
                            Observación:   '.$datos[0]["observacion"].'
                        </td>
                    </tr>
                </table>
	<center style="position:absolute; aling:center !important; bottom:0; margin-left:50px;">Av. 31 entre calles 32 y 33, edificio rental Municipio Paez, Ciudad Acarigua, Estado Portuguesa</center>
	</div>
</body>
</html>
';
$codigo=utf8_decode($codigo);
$dompdf=new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->render();
$dompdf->stream("orden".".pdf",array('Attachment'=>0));
?>