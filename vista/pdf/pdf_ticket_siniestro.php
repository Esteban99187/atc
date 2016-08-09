<?php
session_start();
require_once("../clases/class_siniestros.php");
$ss = new siniestro;
$idUsuario=$_GET["id"];
$tipo = $_GET["t"];
$listo = $ss->TicketSiniestro($idUsuario,$tipo);
if($listo){
  $datos = $ss->enviardatos();
}
// Creación del objeto de la clase heredada
require_once("../clases/clsFpdf3.php");
$pdf = new PDFS();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',12);
$pdf->Write(5,'RETIRAR POR : ESTACIONAMIENTO EXTERNO DEL DESTACAMENTO 41, 3ra COMPANIA DE LA GUARDIA NACIONAL BOLIVARIANA, JURISDICCION DEL MUNICIPIO ARAURE, DEL ESTADO PORTUGUESA , BOMBEROS');
$pdf->Ln(20);
$pdf->Write(5,'CODIGO DE SOLICITUD DE CONSTANCIA : 00'.strtoupper($datos[0]).'');
$pdf->Ln(15);
$pdf->Write(5,'FECHA '.date("d/m/Y").'');
$pdf->Ln(15);
$pdf->Write(5,'NUMERO DE CEDULA DE IDENTIDAD : V-'.strtoupper($datos[1]).'');
$pdf->Ln(15);
$pdf->Write(5,'TITULAR DE LA CONSTANCIA : '.strtoupper($datos[2]).'    TIPO DE SINIESTRO : '.strtoupper($datos[3]).'');
$pdf->Ln(20);
$pdf->Write(5,'DEBE PRESENTAR SU CEDULA LAMINADA AL MOMENTO DE RETIRAR LAS CONSTANCIA ');
$pdf->Output();
?>
