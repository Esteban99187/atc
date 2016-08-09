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
   require_once("../../modelo/class_solicitud.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_solicitud= new class_solicitud();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_solicitud->flistar($lsa);
   $laMatriz=$lobjclass_solicitud->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(7,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Solicitudes de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(8,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(16,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Fecha"),1,0,"C");
       $lobjPdf->Cell(18,6,utf8_decode("Unidades"),1,0,"C");
       $lobjPdf->Cell(18,6,utf8_decode("Peso"),1,0,"C");
       $lobjPdf->Cell(26,6,utf8_decode("Fecha Entrega"),1,0,"C");
       $lobjPdf->Cell(24,6,utf8_decode("Fecha Salida"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("Razón Social"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Producto"),1,0,"C");
       $lobjPdf->Cell(75,6,utf8_decode("Dirección Entrega"),1,0,"C");
       $lobjPdf->Cell(75,6,utf8_decode("Dirección Salida"),1,1,"C");

	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(8,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(16,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(18,6,utf8_decode($laMatriz[$liI][5]) ,1,0,"C");
		$lobjPdf->Cell(18,6,utf8_decode($laMatriz[$liI][13]) ,1,0,"C");
		$lobjPdf->Cell(26,6,utf8_decode($laMatriz[$liI][6]) ,1,0,"C");
		$lobjPdf->Cell(24,6,utf8_decode($laMatriz[$liI][7]) ,1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][10]) ,1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][11]) ,1,0,"C");
		$lobjPdf->Cell(75,6,utf8_decode($laMatriz[$liI][8]) ,1,0,"C");
		$lobjPdf->Cell(75,6,utf8_decode($laMatriz[$liI][9]) ,1,1,"C");
		
		
		
		
		
	   }
		     $lobjPdf->Output();
?>
