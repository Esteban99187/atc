<?php
require_once("fpdf.php"); 
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
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
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
   		 $this->conectar();
			$sql = "select * from usuarios";
			$consulta = $this->filtro($sql);
			$nro = 0;
			while($p = $this->proximo($consulta)){
			$this->Cell(40,5,$nro++,1);
    	    $this->Cell(40,5,$p["nacionalidad"].'-'.$p["cedula"],1);
     		$this->Cell(70,5,strtoupper($p["nombre"].' '.$p["apellido"]),1);
		    $this->Ln();
			}
   }
}
?> 