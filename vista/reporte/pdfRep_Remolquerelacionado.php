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
   require_once("../../modelo/class_remolque.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_remolque= new class_remolque();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_remolque->flistar($lsa);
   $laMatriz=$lobjclass_remolque->flistar2();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(15,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Remolques de Transporte con Relacion de Unidad de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Serial Motor"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Placa"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Marca"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Modelo"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Tipo"),1,0,"C");
       $lobjPdf->Cell(70,6,utf8_decode("Observación"),1,1,"C");
       
       
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][3]) ,1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($laMatriz[$liI][7]),1,1,"C");
		
		
		
	   }
		     $lobjPdf->Output();
?>
