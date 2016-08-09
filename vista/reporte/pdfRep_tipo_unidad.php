<?php
   /*
   *      Daniela Montes
   */
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_tipo_unidad.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_tipo_unidad= new class_tipo_unidad();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_tipo_unidad->flistar($lsa);
   $laMatriz=$lobjclass_tipo_unidad->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(40,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Reporte de Tipos de Unidades de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(10,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(80,6,utf8_decode("Descripción"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Capacidad"),1,1,"C");
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(10,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(80,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2]) ,1,1,"C");
		
		
		
	   }
		     $lobjPdf->Output();
?>
