<?php
session_start();
require('../clases/fpdf.php');
require_once("../clases/class_inspeccion.php");
$ss = new inspeccion;
$idSolicitud=$_GET["id"];
$listo = $ss->DetalleInspeccion2($idSolicitud);
      if($listo){
        $datos = $ss->ReciboInspeccion();
 }

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
	$this->Cell(75,15,utf8_decode('SOLICITUD DE INSPECCIÓN'));
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
// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','',12);
$pdf->Ln(5);
$pdf->Write(5,'ORDEN DE INSPECCION Nro. : 00'.$idSolicitud.' ');
$pdf->Ln(10);
$pdf->Write(5,'ESTACIONAMIENTO EXTERNO DEL DESTACAMENTO 41, 3ra COMPANIA DE LA GUARDIA NACIONAL BOLIVARIANA, JURISDICCION DEL MUNICIPIO ARAURE, DEL ESTADO PORTUGUESA');
$pdf->Ln(10);
$pdf->Write(5,'FECHA ASIGNADA PARA LA INSPECCION : '.strtoupper($datos[0]).'');
$pdf->Ln(10);
$pdf->Write(5,'INSPECTOR ASIGNADO : '.strtoupper($datos[1]).'');
$pdf->Ln(10);
$pdf->Write(5,'POR FAVOR LLAME AL 0255-6223346 SI TIENE ALGUNA DUDA O ALGUN PROBLEMA CON LA FECHA');
$pdf->Output();
?>
