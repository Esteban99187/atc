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
			$this->Image('../imagenes/cintillo1.png',3,5,330,20);
			
			$this->SetY(35);
			//Arial bold 8
			$this->SetFont("Arial","I",8);
			//Fecha
			$lcFecha=date(" d/m/Y    -     g:i:s a"); 
			$this->Cell(-34,456,'Fecha:',0,0,"R");
			$this->Cell(0,456,$lcFecha,0,0,"R");
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
			$this->Cell(300,7,"Acarigua, Estado Portuguesa",0,1,"C");
			//Número de página
			$this->Cell(300,7,utf8_decode("Página ").$this->PageNo()."/{nb}",0,0,"C");
		}
	}
?>
