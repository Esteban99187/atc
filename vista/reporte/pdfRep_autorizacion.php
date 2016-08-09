<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf5.php");
   require_once("../modelo/clsRep_autorizacion.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Letter");
   $lobjPdf->SetMargins(20,20,20);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclsRep_autorizacion= new clsRep_autorizacion();
   $lsa=$_GET["lsa"];
   $lobjclsRep_autorizacion->fSetsbusqueda($lsa);
   $laMatriz=$lobjclsRep_autorizacion->fBusqueda();
													
      $lobjPdf->SetY(20);
	   $lobjPdf->SetMargins(10,30,0);
	   
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

$lobjPdf->Ln(10);
		$lobjPdf->SetFont("arial","B",14);
$lobjPdf->Cell(270,12,utf8_decode("AUTORIZACION"),0,1,"C");
$lobjPdf->Ln(15);//para salto de linea
    
       $lobjPdf->SetFillColor(39,239,260);
       
       $lobjPdf->Cell(20,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("N° UNIDAD"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("PLACA"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("N° REMOLQUE"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("PLACA REMOLQUE"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("NOMBRE"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("APELLIDO"),1,0,"C");
       $lobjPdf->Cell(24,6,utf8_decode("CEDULA"),1,1,"C");
         
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
		   
			   $lobjPdf->SetFont("arial","I",10);
			       
		
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(24,6,utf8_decode($laMatriz[$liI][7]),1,1,"C");
		$lobjPdf->Cell(13);
		$lobjPdf->Ln(4);
		
 $lobjPdf->Ln(50);
		$lobjPdf->Cell(270,6,utf8_decode("____________________ "),0,1,"C");
		$lobjPdf->Cell(270,6,utf8_decode("AUT.POR: "),0,0,"C");
		$lobjPdf->Ln(4);
		$lobjPdf->Cell(270,6,utf8_decode("RAFAEL NELO "),0,0,"C");
		
	
	
			   
	   
		
	   }
	   
   
		     $lobjPdf->Output();
?>
