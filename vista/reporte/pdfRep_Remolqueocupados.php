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
   require_once("../modelo/class_remolque.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_remolque= new class_remolque();
   $lsa=$_GET["lsa"];
   $lobjclass_remolque->flistar($lsa);
   $laMatriz=$lobjclass_remolque->flistarocupados();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Remolques Ocupadas de Transporte de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(5,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Serial Motor"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Serial Carroceria"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Placa"),1,0,"C");
       
       $lobjPdf->Cell(40,6,utf8_decode("Modelo"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("Tipo"),1,0,"C");
       $lobjPdf->Cell(45,6,utf8_decode("Observación"),1,0,"C");
       $lobjPdf->Cell(70,6,utf8_decode("Conductor Asignado"),1,1,"C");
       
       
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(5,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2]) ,1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($laMatriz[$liI][8]).' '.($laMatriz[$liI][9]).' '.($laMatriz[$liI][10]) ,1,1,"C");
		
		
		
	   }
		     $lobjPdf->Output();
?>
