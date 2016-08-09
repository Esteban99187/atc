<?php

   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_producto.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_producto= new class_producto();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_producto->flistar($lsa);
   $laMatriz=$lobjclass_producto->flistaractivs();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(07,90,0);
	   $lobjPdf->Cell(170,6,utf8_decode("Lista de Productos Activos transportados por la Empresa ATC C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Descripción"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Tipo de Producto"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Unidad de Medida"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Tipo de Unidad"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][5]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
