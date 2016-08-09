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
   require_once("../../modelo/class_solicitud_reparacion.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Legal");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_solicitud_reparacion= new class_solicitud_reparacion();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_solicitud_reparacion->flistar($lsa);
   $laMatriz=$lobjclass_solicitud_reparacion->flistar();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de Solicitudes de Reparacion de Unidades de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(8,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(18,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(20,6,utf8_decode("Fecha"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("C.I. Responsable"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("C.I. Conductor"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Nombre"),1,0,"C");
       $lobjPdf->Cell(30,6,utf8_decode("Apellido"),1,0,"C");
       $lobjPdf->Cell(85,6,utf8_decode("Falla Presentada"),1,0,"C");
       $lobjPdf->Cell(85,6,utf8_decode("Ubicacion de la Unidad"),1,1,"C");

	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(8,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(18,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][1]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][6]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][7]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][9]) ,1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][10]) ,1,0,"C");
		$lobjPdf->Cell(85,6,utf8_decode($laMatriz[$liI][3]) ,1,0,"C");
		$lobjPdf->Cell(85,6,utf8_decode($laMatriz[$liI][4]) ,1,1,"C");
		
		
		
		
		
	   }
		     $lobjPdf->Output();
?>
