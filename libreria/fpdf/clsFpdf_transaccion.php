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
			$this->Image('images/1cv.jpg',18,11,18,20);
			$this->Image('images/2atc.jpg',180,11,22,18);
			$this->Ln(8);
			//Arial bold 15
			$this->SetFont("Arial","B",10);
			//Título
			$this->Cell(0,0,'REPUBLICA BOLIVARIANA DE VENEZUELA',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'MINISTERIO DEL PODER POPULAR PARA LA AGRICULTURA Y TIERRAS',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'CORPORACION VENEZOLANA AGRARIA',0,0,'C');
			//Arial bold 8
			$this->SetFont("Arial","B",10);
			//Fecha
			$lcFecha=date("d/m/Y");  
			$this->Cell(-20,40,'Fecha:                                 ',0,0,"C");
			$this->Cell(0,40,$lcFecha,0,0,"c");
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
