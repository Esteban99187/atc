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
   require_once("../../modelo/class_ciudad.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(10,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_ciudad= new class_ciudad();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_ciudad->flistarpdf($lsa);
   $laMatriz=$lobjclass_ciudad->flistainactivos();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(20,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Listado de Ciudades Inactivas en Venezuela de la Empresa ATC C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(15,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Nombre"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Parroquia"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Municipio"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Estado"),1,1,"C");
	   

	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][4]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
