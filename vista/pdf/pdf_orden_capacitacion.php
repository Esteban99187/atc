<?php
session_start();
require('../clases/fpdf.php');
require_once("../clases/class_capacitacion.php");
$ss = new capacitacion;
$idSolicitud=$_GET["id"];
$datos= $ss->planificacionAsignada2($idSolicitud);


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/banner.jpg',15,8,180,15);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Ln(15);
	$this->Cell(75,15,utf8_decode('SOLICITUD DE CAPACITACIÓN'));
	$this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',12);
$pdf->Ln(5);
$pdf->Write(5,utf8_decode('ORDEN DE CAPACITACIÓN Nro. : 00'.$idSolicitud.' '));
$pdf->Ln(10);
$pdf->Write(5,'ESTACIONAMIENTO EXTERNO DEL DESTACAMENTO 41, 3ra COMPANIA DE LA GUARDIA NACIONAL BOLIVARIANA, JURISDICCION DEL MUNICIPIO ARAURE, DEL ESTADO PORTUGUESA');
$pdf->Ln(10);
$pdf->Write(5,'FECHA ASIGNADA PARA LA CAPACITACION DIA '.strtoupper($datos[0]).'');
$pdf->Ln(10);
$pdf->Write(5,'FACILITADOR ASIGNADO : '.strtoupper($datos[2]).'');
$pdf->Ln(10);
$pdf->Write(5,''.strtoupper($datos[3]).' '.strtoupper($datos[4]).'');
$pdf->Ln(10);
$pdf->Write(5,'POR FAVOR LLAME AL 0255-6223346 Y CONFIRME SU ASISTENCIA');
$pdf->Ln(5);
$pdf->Write(5,'IMPRIMA ESTE COMPROBANTE Y PRESENTELO EL DIA DE LA ASISTENCIA');
$pdf->Output();

?>
