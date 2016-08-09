<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../modelo/clsRep_Chodepar.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclsRep_Chodepar= new clsRep_Chodepar();
   $lsa=$_GET["lsa"];
   $lobjclsRep_Chodepar->fSetsbusqueda($lsa);
   $laMatriz=$lobjclsRep_Chodepar->fBusqueda();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Personal por Departamento"),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(9,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(26,6,utf8_decode("Cédula"),1,0,"C");
       $lobjPdf->Cell(38,6,utf8_decode("Nombre"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Apellido"),1,0,"C");
	   $lobjPdf->Cell(40,6,utf8_decode("Teléfono"),1,0,"C");
	   $lobjPdf->Cell(40,6,utf8_decode("Departamento"),1,1,"C");
	   
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
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][4]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
