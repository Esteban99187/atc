<?php

    setlocale(LC_ALL,"es_VE.UTF8");
	include "../../phpqrcode/qrlib.php";
	require_once("../pdf/clsFpdf6.php");
	require_once("../../modelo/class_reluni.php");   
	$lobjPdf=new clsFpdf();
	$lobjPdf->AliasNbPages();
	$lobjPdf->AddPage("P","Legal");
	$lobjPdf->SetMargins(30,30,30);
	$lobjPdf->SetFont("arial","B",12);
	$lobjrelacion_unidad= new class_reluni();
	$lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
	$maria='http://localhost/atcsistem/vista/reporte/pdfRep_Relacion1.php?lsa=';
	QRcode::png("$maria"."$lsa", "urlqr.png", "L", 4, 4);
	$lobjPdf->Image('urlqr.png',170,220,40,40);//aqui llamas la imagen qr y la vas rotando a donde lo quieras ubicar
	$lobjrelacion_unidad->fsetiidrelacion_unidad($lsa);
	$lobjrelacion_unidad->flistarpdf();
	$laMatriz=$lobjrelacion_unidad->flistarpdf();
													
    $lobjPdf->SetY(50);
	$lobjPdf->SetMargins(10,30,0);
	$lobjPdf->SetFont("arial","B",13);
	$lobjPdf->Cell(200,6,utf8_decode("RELACIÓN DE UNIDADES"),0,1,"C");
	$lobjPdf->SetFont("arial","",10);
	$lobjPdf->SetFillColor(255,0,140);

 	$lobjPdf->Ln(2);
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->Cell(130);
	$lobjPdf->Cell(45,6,utf8_decode("Fecha/ Hora"),1,1,"C");
	$liI=0;
	$N=0;
	 {
		$N++;
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(130);
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][0]),1,1,"C");

	}
	
	$lobjPdf->Ln(10);
	
        //OTRA
    $lobjPdf->Cell(10);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",12);
       $lobjPdf->Cell(40,8,utf8_decode("CEDULA"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",12);
		
	$lobjPdf->Cell(127,8,utf8_decode($laMatriz[$liI][1]),1,1,"C");
	
		
   //~ }
   
	  //OTRA
    
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",12);
       $lobjPdf->Cell(10);
       $lobjPdf->Cell(40,8,utf8_decode("CONDUCTOR"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",12);
		   
	$lobjPdf->Cell(127,8,utf8_decode($laMatriz[$liI][2]).''.($laMatriz[$liI][3]),1,0,"C");

	//~ 
	
	   
   
    //~ }
	   $lobjPdf->Ln(10);
        $lobjPdf->SetFont("arial","B",12);
        $lobjPdf->Cell(10);
        $lobjPdf->Cell(25,8,utf8_decode("Nº Unidad "),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(15,8,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		$lobjPdf->SetFont("arial","B",12);
        $lobjPdf->Cell(35,8,utf8_decode("Placa"),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(35,8,utf8_decode($laMatriz[$liI][6]),1,0,"C");
        $lobjPdf->SetFont("arial","B",12);
        $lobjPdf->Cell(30,8,utf8_decode("Serial Motor "),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(28,8,utf8_decode($laMatriz[$liI][8]),1,1,"C");
        $lobjPdf->SetFont("arial","B",12);
          $lobjPdf->Cell(10);
		$lobjPdf->Cell(50,8,utf8_decode("Serial carroceria"),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(40,8,utf8_decode($laMatriz[$liI][7]),1,0,"C");
        $lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(42,8,utf8_decode("Tipo de Unidad "),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(36,8,utf8_decode($laMatriz[$liI][5]),1,1,"C");
         $lobjPdf->Ln(4);
        $lobjPdf->Cell(10);
        $lobjPdf->Cell(30,8,utf8_decode("Nº Remolque "),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(10,8,utf8_decode($laMatriz[$liI][9]),1,0,"C");
		$lobjPdf->SetFont("arial","B",12);
        $lobjPdf->Cell(35,8,utf8_decode("Placa Remolque"),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(25,8,utf8_decode($laMatriz[$liI][10]),1,0,"C");
        $lobjPdf->SetFont("arial","B",12);
        $lobjPdf->Cell(35,8,utf8_decode("Serial Remolque"),1,0,"C");
        $lobjPdf->SetFont("arial","",12);
        $lobjPdf->Cell(33,8,utf8_decode($laMatriz[$liI][11]),1,1,"C");
      
		     $lobjPdf->Output();
		     ?>
