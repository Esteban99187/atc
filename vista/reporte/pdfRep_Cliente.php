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
   require_once("../../modelo/class_cliente.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_cliente= new class_cliente();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_cliente->flistar($lsa);
   $laMatriz=$lobjclass_cliente->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(7,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Clientes de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(5,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(23,6,utf8_decode("RIF"),1,0,"C");
       $lobjPdf->Cell(83,6,utf8_decode("Nombre o Razón Social"),1,0,"C");
       $lobjPdf->Cell(28,6,utf8_decode("Teléfono Fijo"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Correo"),1,0,"C");
       
       $lobjPdf->Cell(80,6,utf8_decode("Dirección"),1,1,"C");
       
       
       
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(5,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(23,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(83,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(28,6,utf8_decode($laMatriz[$liI][8]) ,1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][11]) ,1,0,"C");
		
		$lobjPdf->Cell(80,6,utf8_decode($laMatriz[$liI][7]) ,1,1,"C");
		
		
		
		
		
	   }
		     $lobjPdf->Output();
?>
