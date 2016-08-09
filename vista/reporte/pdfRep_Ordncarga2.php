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
   require_once("../modelo/class_ordcar.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_ordcar= new class_ordcar();
   $lsa=$_GET["lsa"];
   $lobjclass_ordcar->flistar2($lsa);
   $laMatriz=$lobjclass_ordcar->flistar2();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(35,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Orden de Carga Pendientes de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(8,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(15,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Fecha"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Responsable"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Solicitud"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Relacion de Unidades"),1,1,"C");

	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(8,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][3]).'    '.($laMatriz[$liI][4]).' '.($laMatriz[$liI][5]) ,1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][7]) ,1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][8]) ,1,1,"C");
		
		
		
		
		
	   }
		     $lobjPdf->Output();
?>
