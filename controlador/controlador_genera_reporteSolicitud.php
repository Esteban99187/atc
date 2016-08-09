<?php
	
require('../clases/fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
 function Header()
{
	$fechaMin = $_POST["fechamin"];
	$fechaMax = $_POST["fechamax"];
	// Logo
	$this->Image('../img/banner.jpg',15,8,180,15);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Ln(15);
	$this->Cell(75,15,'REPORTE DE SOLICITUDES                                  FECHA: '.date("d/m/Y").'',0,3,'T');
	$this->Ln(1);
	if($fechaMin == "" OR $fechaMax == ""){
	  $this->SetFont('Arial','B',10);
	  $this->Cell(75,15,'EXISTENTE HASTA LA FECHA DE HOY',0,3,'T');
	}else if($fechaMin != " " OR $fechaMax != " "){
      $this->SetFont('Arial','B',10);
	  $this->Cell(75,15,'EXISTENTE ENTRE EL '.$fechaMin.' HASTA EL '.$fechaMax ,0,3,'T');
	}

	// Salto de línea
	$this->Ln(5);
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

    require_once("../clases/class_reportes.php");

	$re = new Reportes;
	$ck = $_POST["opcion"];
	$cantidad = count($ck);

	$st = $_POST["opcion2"];
	$cantidadestatus = count($st);

	$fechaMin = $_POST["fechamin"];
	$fechaMax = $_POST["fechamax"];

	if($fechaMin == "" OR $fechaMax == ""){
		$fechas = array(0);
	}else{
		$fechas = array(1,$fechaMin,$fechaMax);
	}

	$datos = $re->GeneraReporte($cantidad,$ck,$cantidadestatus,$st,$fechas);
	$cCan = count($datos);

     $this->Cell(20,7,$header[0],1);
    $this->Cell(35,7,$header[1],1);
    $this->Cell(50,7,$header[2],1);
    $this->Cell(40,7,$header[3],1);
    $this->Cell(30,7,$header[4],1);
    $this->Ln();
    
    for($i=0;$i<=$cCan;$i++){

      $this->Cell(20,5,"".$datos[$i][0]."",1);
      $this->Cell(35,5,"".utf8_decode($datos[$i][1])."",1);
      $this->Cell(50,5,"".$datos[$i][2]."",1);
      $this->Cell(40,5,"".$datos[$i][3]."",1);
      $this->Cell(30,5,"".$datos[$i][4]."",1);
      $this->Ln();

  	}
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





/*class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	$fechaMin = $_POST["fechamin"];
	$fechaMax = $_POST["fechamax"];
	// Logo
	$this->Image('../img/banner.jpg',15,8,180,15);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Ln(15);
	$this->Cell(75,15,'REPORTE DE SOLICITUDES                                  FECHA: '.date("d/m/Y").'',0,3,'T');
	$this->Ln(1);
	if($fechaMin == "" OR $fechaMax == ""){
	  $this->SetFont('Arial','B',10);
	  $this->Cell(75,15,'EXISTENTE HASTA LA FECHA DE HOY',0,3,'T');
	}else if($fechaMin != " " OR $fechaMax != " "){
      $this->SetFont('Arial','B',10);
	  $this->Cell(75,15,'EXISTENTE ENTRE EL '.$fechaMin.' HASTA EL '.$fechaMax ,0,3,'T');
	}

	// Salto de línea
	$this->Ln(5);
}

 function TablaSimple($header)
   {
    //Cabecera

    $this->Cell(20,7,$header[0],1);
    $this->Cell(35,7,$header[1],1);
    $this->Cell(50,7,$header[2],1);
    $this->Cell(40,7,$header[3],1);
    $this->Cell(30,7,$header[4],1);
    $this->Ln();
    
    for($i=0;$i<=$cCan;$i++){

      $this->Cell(20,5,"".$datos[$i][0]."",1);
      $this->Cell(35,5,"".$datos[$i][1]."",1);
      $this->Cell(50,5,"".$datos[$i][2]."",1);
      $this->Cell(40,5,"".$datos[$i][3]."",1);
      $this->Cell(30,5,"".$datos[$i][4]."",1);
      $this->Ln();

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
//Segunda página
$pdf->AddPage();
$pdf->SetY(65);
$pdf->TablaColores($header);
$pdf->Output();


/*
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
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'NRO.     TIPO SOLICITUD      SOLICITANTE                FECHA DE SOLICITUD           ESTATUS '.$i,0,1);
for($i=0;$i<=$cCan;$i++)
	$pdf->Cell(0,10,'   '.$datos[$i][0].'          '.$datos[$i][1].'           '.$datos[$i][2].'                  '.$datos[$i][3].'                   '.$datos[$i][4].' ',0,1);
$pdf->Output();
	*/
?>