<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../modelo/clsRep_Ordencarga3.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclsRep_Ordencarga3= new clsRep_Ordencarga3();
   $lsa=$_GET["lsa"];
   $lobjclsRep_Ordencarga3->fSetsbusqueda($lsa);
   $laMatriz=$lobjclsRep_Ordencarga3->fBusqueda();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Orden Carga"),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(9,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(26,6,utf8_decode("N°Orden Carga"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("fecha"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("hora"),1,0,"C");
	   $lobjPdf->Cell(20,6,utf8_decode("N° Unidad"),1,0,"C");
	   $lobjPdf->Cell(35,6,utf8_decode("Producto"),1,0,"C");
	   
	   $lobjPdf->Cell(30,6,utf8_decode("Conductor"),1,0,"C");
	   $lobjPdf->Cell(25,6,utf8_decode("placa"),1,0,"C");
	   $lobjPdf->Cell(60,6,utf8_decode("direccion entrega"),1,0,"C");
	   $lobjPdf->Cell(60,6,utf8_decode("direccion salida"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(9,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(26,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($laMatriz[$liI][9]),1,1,"C");
		
		
	   }
		     $lobjPdf->Output();
?>
