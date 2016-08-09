<?php
   /*
   *      clsFpdf.php
   *      
   *      Copyright 2011 José Baldomero Silva Hernández <jobasiher@cantv.net>
   *      
   *      Este programa es software libre, puede redistribuirlo y / o modificar
   *      Bajo los términos de la GNU Licensia Pública General(GPL) publicada por
   *      La Fundación de Software Libre(FSF), bien de la versión 2 o cualquier versión posterior.
   *      
   *      Este programa se distribuye con la esperanza de que sea útil,
   *      Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de
   *      COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.
   */
	require_once("libreria/fpdf/fpdf.php");
	class clsFpdf extends FPDF
	{
		//Cabecera de página
		public function Header()
		{
			//Logo
			$this->Image('images/2atc.jpg',8,10,200,12);
			$this->Ln(20);
			//Arial bold 15
			$this->SetFont("Arial","B",10);
			//Título
			
			$this->Cell(0,0,'CORPORACION VENEZOLANA AGRARIA',0,0,'C');
			//Arial bold 8
			$this->SetFont("Arial","I",8);
			//Fecha
			$lcFecha=date(" d/m/Y  - g:i:s a"); 
			$this->Cell(-34,466,'Fecha:',0,0,"R");
			$this->Cell(0,466,$lcFecha,0,0,"R");
			//Salto de línea
			$this->Ln(5);
		}

		//Pie de página
		public function Footer()
		{
			//Posición: a 2 cm del final
			$this->SetY(-20);
			//Arial italic 8
			$this->SetFont("Arial","I",8);
			//Dirección
			$this->Cell(0,7,"Acarigua, Estado Portuguesa",0,1,"C");
			//Número de página
			$this->Cell(0,7,utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,"C");
		}
	}
?>
