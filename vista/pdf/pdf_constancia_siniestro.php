<?php
session_start();
  require_once("../clases/class_siniestros.php");
  require('../clases/fpdf.php');
  $si=new siniestro;
  $datos = $si->solicitudSiniestroDatos($_GET["id"]);
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
	$this->Cell(75,15,utf8_decode('CONSTANCIA DE SINIESTRO'));
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
$pdf->Write(5,'CONSTANCIA DE SINIESTRO Nro. : 00'.$_GET["id"].' ');
$pdf->Ln(10);
$pdf->Write(5,'ESTACIONAMIENTO EXTERNO DEL DESTACAMENTO 41, 3ra COMPANIA DE LA GUARDIA NACIONAL BOLIVARIANA, JURISDICCION DEL MUNICIPIO ARAURE, DEL ESTADO PORTUGUESA');
$pdf->Ln(10);
$pdf->Write(5,'CEDULA DEL SINIESTRADO: '.strtoupper($datos[2]).'');
$pdf->Ln(10);
$pdf->Write(5,'NOMBRE: '.strtoupper($datos[3]).'');
$pdf->Ln(10);
$pdf->Write(5,'TIPO DE SINIESTRO: '.strtoupper($datos[5]).'');
$pdf->Ln(10);
$pdf->Write(5,'PLACA DEL VEHICULO O DIRECCION DE INMUEBLE: '.strtoupper($datos[6]).'');
$pdf->Ln(10);
$pdf->Write(5,'FECHA DEL SINIESTRO: '.strtoupper($datos[7]).'');
$pdf->Ln(10);
$pdf->Write(5,'CAUSA DEL SINIESTRO: '.strtoupper($datos[9]).'');
$pdf->Ln(10);
$pdf->Write(5,'POR FAVOR LLAME AL 0255-6223346 SI TIENE ALGUNA DUDA O ALGUN PROBLEMA');
$pdf->Ln(5);
$pdf->Write(5,'ESTE DOCUMENTO DEBE ESTAR SELLEDO Y FIRMADO POR EL INBERP PARA QUE SEA VALIDO');
$pdf->Output();
?>

?>
