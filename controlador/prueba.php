<?php
require('../clases/fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("../img/banner.jpg" , 10 ,8, 35 , 38 , "JPG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',10);
    //Movernos a la derecha
    $this->Cell(50);
    //Título
    $this->Cell(60,10,'Titulo del archivo',1,0,'C');
    //Salto de línea
    $this->Ln(20);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera

    $this->Cell(20,7,$header[0],1);
    $this->Cell(35,7,$header[1],1);
    $this->Cell(50,7,$header[2],1);
    $this->Cell(40,7,$header[3],1);
    $this->Cell(30,7,$header[4],1);
    $this->Ln();
    
      $this->Cell(20,5,"hola",1);
      $this->Cell(35,5,"hola2",1);
      $this->Cell(50,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Cell(30,5,"hola4",1);
      $this->Ln();
   }
   
   //Tabla coloreada
function TablaColores($header)
{
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(255,0,0);
$this->SetTextColor(255);
$this->SetDrawColor(128,0,0);
$this->SetLineWidth(.3);
$this->SetFont('','B');
//Cabecera

for($i=0;$i<count($header);$i++)
$this->Cell(40,7,$header[$i],1,0,'C',1);
$this->Ln();
//Restauración de colores y fuentes
$this->SetFillColor(224,235,255);
$this->SetTextColor(0);
$this->SetFont('');
//Datos
   $fill=false;
$this->Cell(40,6,"hola",'LR',0,'L',$fill);
$this->Cell(40,6,"hola2",'LR',0,'L',$fill);
$this->Cell(40,6,"hola3",'LR',0,'R',$fill);
$this->Cell(40,6,"hola4",'LR',0,'R',$fill);
$this->Ln();
      $fill=!$fill;
      $this->Cell(40,6,"col",'LR',0,'L',$fill);
$this->Cell(40,6,"col2",'LR',0,'L',$fill);
$this->Cell(40,6,"col3",'LR',0,'R',$fill);
$this->Cell(40,6,"col4",'LR',0,'R',$fill);
$fill=true;
   $this->Ln();
   $this->Cell(160,0,'','T');
}

   
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('NRO','TIPO SOLICITUD','SOLICITANTE','FECHA DE SOLICITUD','ESTATUS');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->TablaSimple($header);
/*//Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);*/
$pdf->Output();
?>