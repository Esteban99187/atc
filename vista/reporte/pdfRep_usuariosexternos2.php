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
   require_once("../../modelo/class_usuarioatc.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_usuarioatc= new class_usuarios();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_usuarioatc->flistar3($lsa);
   $laMatriz=$lobjclass_usuarioatc->flistar4();
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(10,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Lista de usuarios Externos Juridicos de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(8,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Nombre de Usuario"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Cedula"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Nombre y Apellido"),1,0,"C");
       $lobjPdf->Cell(25,6,utf8_decode("Teléfono"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Correo"),1,0,"C");
       $lobjPdf->Cell(23,6,utf8_decode("RIF"),1,0,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Razón Social"),1,1,"C");
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(8,6,utf8_decode($N),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2])." ".($laMatriz[$liI][3]) ,1,0,"C");
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][4]) ,1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][5]) ,1,0,"C");
		$lobjPdf->Cell(23,6,utf8_decode($laMatriz[$liI][6]) ,1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][7]) ,1,1,"C");
	   }
		     $lobjPdf->Output();
?>
