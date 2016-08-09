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
	require_once("fpdf.php");
	class clsFpdf extends FPDF
	{
		//Cabecera de página
		public function Header()
		{
			//Logo
			$this->Image('../imagenes/logo2.jpg',10,8,200,25);
			$this->SetY(35);			
		}

		//Pie de página
		public function Footer()
		{
			//Posición: a 2 cm del final
			$this->SetY(-20);
			//Arial italic 8
			$this->SetFont("Arial","I",6);
			//Dirección
			$this->Cell(0,5,utf8_decode("Avenida Circunvalación Sur. Sector Bellas Artes. Diagonal a la Cruz Roja. Acarigua, Portuguesa. 3301. Venezuela. Telefonos: (0255) 623.7538 - 804.4751 "),0,1,"C");
			//Número de página
			$this->Cell(0,5,utf8_decode("Página ").$this->PageNo()."/{nb}",0,1,"C");
			//Fecha
			$lcFecha=date("d/m/Y  h:m a");
			$this->Cell(0,3,$lcFecha,0,0,"C");
		}
	}
?>
