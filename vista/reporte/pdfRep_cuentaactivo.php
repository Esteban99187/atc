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
   require_once("../../modelo/class_cuenta.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(5,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_cuenta= new class_cuenta();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_cuenta->flistar($lsa);
   $laMatriz=$lobjclass_cuenta->flistaractvos();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(20,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Reporte de Cuentas Activas de los Clientes de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(10,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("N° Cuenta"),1,0,"C");
       $lobjPdf->Cell(45,6,utf8_decode("Banco"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Tipo de Cuenta"),1,0,"C");
       $lobjPdf->Cell(45,6,utf8_decode("Cliente"),1,1,"C");
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(10,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][5]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][6]) ,1,0,"C");
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][7]) ,1,1,"C");
		
		
		
	   }
		     $lobjPdf->Output();
?>
