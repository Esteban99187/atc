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
   require_once("../../modelo/class_recgui.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_recgui= new class_recgui();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_recgui->flistar($lsa);
   $laMatriz=$lobjclass_recgui->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Recepcion de Guia de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(7,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(13,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(15,6,utf8_decode("Fecha"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Responsable"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("N° Guia"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Orden Carga"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Fecha"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Responsable"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Solicitud"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("RIF"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("Razón Social"),1,0,"C");
       $lobjPdf->Cell(15,6,utf8_decode("R/U"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Conductor"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Unidad"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Remolque"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(7,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(13,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][9]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][10]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][11]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][12]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][20]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][21]),1,0,"C");
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][24]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][25]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][27]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][26]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
