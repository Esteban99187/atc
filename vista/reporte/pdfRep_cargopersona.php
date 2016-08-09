<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../modelo/clsRep_cargopersona.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclsRep_cargopersona= new clsRep_cargopersona();
   $lsa=$_GET["lsa"];
   $lobjclsRep_cargopersona->fSetsbusqueda($lsa);
   $laMatriz=$lobjclsRep_cargopersona->fBusqueda();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Personal por Cargo"),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(9,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(26,6,utf8_decode("Cedula"),1,0,"C");
       $lobjPdf->Cell(38,6,utf8_decode("Nombre"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Apellido"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Telf Corporativo"),1,0,"C");
	   $lobjPdf->Cell(40,6,utf8_decode("Cargo"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(9,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(26,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(38,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][6]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
