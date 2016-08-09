<?php

	require_once("../pdf/fpdf.php");
	class clsFpdf extends FPDF
	{

		//Cabecera de página
		public function Header()
		{

			//Logo
			$this->SetMargins(20,30,30);
			$this->Image('../../vista/imagenes/cintillo1.png',5,12,205,20);
			$this->Image('../../vista/imagenes/atc12.JPG',25,90,170,100);
			$this->SetY(35);

		}

		//Pie de página
		public function Footer()
		{

			//Posición: a 2 cm del final
			$this->SetY(-20);
			//Arial italic 8
			$this->SetFont("Arial","I",10);

			//Dirección
			//$this->Image('../images/cap.jpg',10,165,260,30);
			//Número de página
			$this->Cell(0,5,utf8_decode("     Página").$this->PageNo()."/{nb}",0,1,"C");
			//Fecha
			$lcFecha=date("d/m/Y");
			$this->Cell(0,3,$lcFecha,0,0,"C");

		}

	}

?>
