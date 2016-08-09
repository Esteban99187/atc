<?php

   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_estado.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_estado= new class_estado();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_estado->flistar($lsa);
   $laMatriz=$lobjclass_estado->flistaractvos();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(30,90,0);
	   $lobjPdf->Cell(170,6,utf8_decode("Lista de Estados Activos de la Empresa ATC .C.A."),0,1,"C");
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
