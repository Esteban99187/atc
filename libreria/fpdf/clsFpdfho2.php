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
			$this->Image('images/banner_infocentro.jpg',10,7,19,19);
			$this->Image('images/ivss.png',270,7,70,20);
			//Arial bold 15
			$this->SetFont("Arial","B",10);
			//Título
			$this->Cell(0,0,'MINISTERIO DEL PODER POPULAR PARA EL TRABAJO Y SEGURIDAD SOCIAL',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'INSTITUTO VENEZOLANO DE LOS SEGUROS SOCIALES',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'DIRECCION GENERAL DE SALUD',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'DIRECCION DE SERVICIOS TECNICOS ASISTENCIALES',0,0,'C');
			$this->Ln(4);
			$this->Cell(0,0,'DIVISION NACIONAL BANCO DE SANGRE',0,0,'C');
			//Arial bold 8
			$this->SetFont("Arial","B",10);
			//Fecha
			$lcFecha=date("d/m/Y");
			$this->Cell(-280,05,'Fecha:',0,0,"R");
			$this->Cell(-0,05,$lcFecha,0,0,"c");
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
