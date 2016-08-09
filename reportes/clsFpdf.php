<?php
	session_start();
	date_default_timezone_set("America/Caracas");
	require_once("fpdf.php");
	class clsFpdf extends FPDF
	{
		//Cabecera de página
		public function Header()
		{
			//Logo
			$this->Image('../public/img/cats.jpg',3,8,210,40);
			$this->SetY(50);			
			//Fecha
			$this->SetFont("Arial","B",12);
			$this->Cell(0,6,utf8_decode("República Bolivariana de Venezuela"),0,1,"C");
			$this->Cell(0,6,utf8_decode("Alcaldia Bolivariana del Municipio Páez"),0,1,"C");
			$this->Cell(0,6,"Ingenieria Municipal",0,1,"C");
			$this->Cell(0,6,"Acarigua - Estado Portuguea",0,1,"C");
			$lcFecha=@date("d/m/Y");
			$lcHora =@date('g:i:s A');
			$this->Cell(0,6,"Fecha: ".$lcFecha,0,1,"R");
			$this->Cell(0,6,"Hora: ".$lcHora,0,1,"R");
			$this->ln(10);
		}	


		public function Footer()
		{
			//Posición: a 2 cm del final
			$this->SetY(-20);
			//Arial italic 6
			$this->SetFont("Arial","I",9);
			//Número de página
			$this->Cell(0,3,utf8_decode("Página ").$this->PageNo()."/{nb}",0,1,"C");
					
		}	
	}
?>
