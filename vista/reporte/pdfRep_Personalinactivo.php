<?php
   /*
   *      Daniela Montes
   */
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vistas/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_personaatc.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_personaatc= new class_personaatc();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_personaatc->flistar($lsa);
   $laMatriz=$lobjclass_personaatc->flistar2();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(20,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista del Personal Inactivo de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(10,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Cedula"),1,0,"C");
       $lobjPdf->Cell(100,6,utf8_decode("Nombre y Apellido"),1,0,"C");
       
       $lobjPdf->Cell(25,6,utf8_decode("Teléf Movil"),1,0,"C");
       //~ $lobjPdf->Cell(25,6,utf8_decode("Teléf Casa"),1,0,"C");
       $lobjPdf->Cell(55,6,utf8_decode("Cargo"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Departamento"),1,0,"C");
       
       
       
       $lobjPdf->Cell(50,6,utf8_decode("Dirección"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(10,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(100,6,utf8_decode($laMatriz[$liI][1])." ".($laMatriz[$liI][2]) ,1,0,"C");
		
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		//~ $lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(55,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][14]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
