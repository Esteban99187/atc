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
	require_once("../pdf/fpdf.php");
	class clsFpdf extends FPDF
	{
		//Cabecera de página
		public function Header()
		{
			//Logo
			$this->SetMargins(20,30,30);
			$this->Image('../../vista/imagenes/cintillo1.png',5,12,205,20);
			$this->Image('../../vista/imagenes/cuadro.JPEG',15,40,180,150);
			$this->Image('../../vista/imagenes/atcc.jpg',25,43,68,40);
			
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
