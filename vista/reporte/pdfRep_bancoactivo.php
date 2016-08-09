<?php
   /*
   *      pdfestudianteslista.php
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
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
	include "../../phpqrcode/qrlib.php";
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_banco.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $carballo='alejandro'.'1';
   $lobjPdf->AddPage("P","Letter");
   QRcode::png("$carballo", "urlqr.png", "L", 4, 4);
   $lobjPdf->Image('urlqr.png',170,220,40,40);//aqui llamas la imagen qr y la vas rotando a donde lo quieras ubicar
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_banco= new class_banco();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_banco->flistar($lsa);
   $laMatriz=$lobjclass_banco->flistaractvos(); 
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(75,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Listado de Bancos Activos"),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(70,6,utf8_decode("Nombre"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($laMatriz[$liI][1]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
		   
?>
