<?php
require_once('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página

function Header()
{

    // Logo
    $this->Image('../img/banner.jpg',10,8,190,12);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(3,35,'ORDEN DE INSPECCION',0,1,'C');
    // Salto de línea
    $this->Ln(0);
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
?>
