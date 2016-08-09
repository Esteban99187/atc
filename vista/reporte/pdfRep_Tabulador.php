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
   require_once("../../modelo/class_tabulador.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_tabulador= new class_tabulador();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_tabulador->flistar($lsa);
   $laMatriz=$lobjclass_tabulador->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Tabuladores de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(10,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(15,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("Kilometraje"),1,0,"C");
       
       $lobjPdf->Cell(45,6,utf8_decode("Origen"),1,0,"C");
       $lobjPdf->Cell(45,6,utf8_decode("Destino"),1,0,"C");
       $lobjPdf->Cell(18,6,utf8_decode("Precio"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Precio Total"),1,1,"C");
       
       
       
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(10,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][7]) ,1,0,"C");
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][7]) ,1,0,"C");
		$lobjPdf->Cell(18,6,utf8_decode($laMatriz[$liI][6]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][2]) ,1,1,"C");
		
		
		
		
		
	   }
		     $lobjPdf->Output();
?>
