<?php

   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
  require_once("../../modelo/class_tabviatico.php");
  
   
   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("L","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
  
   $objtabvia= new class_tabviatico();
   $listado_tabvia = $objtabvia->flistar();
  
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(07,90,0);
	   $lobjPdf->Cell(170,6,utf8_decode("Lista de tabulador de viaticos por la Empresa ATC C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(238,235,235);
       $lobjPdf->Cell(25,6,utf8_decode("Código"),1,0,"C",true );
       $lobjPdf->Cell(50,6,utf8_decode("Ruta"),1,0,"C",true);
       $lobjPdf->Cell(50,6,utf8_decode("Ciudad Origen"),1,0,"C",true);
       $lobjPdf->Cell(50,6,utf8_decode("Ciudad Destino"),1,0,"C",true);
       $lobjPdf->Cell(40,6,utf8_decode("Dias de Ruta"),1,0,"C",true);
	   $lobjPdf->Cell(40,6,utf8_decode("Total Viaticos"),1,1,"C",true);
	   
	 
	    $lobjPdf->SetFont("arial","I",10);
	    
	    foreach($listado_tabvia as $valor)
	    {
			$lobjPdf->Cell(25,6,utf8_decode($valor['codigo']),1,0,"C");
			$lobjPdf->Cell(50,6,utf8_decode($valor['ruta']),1,0,"C");
			$lobjPdf->Cell(50,6,utf8_decode($valor['origen']),1,0,"C");
			$lobjPdf->Cell(50,6,utf8_decode($valor['destino']),1,0,"C");
			$lobjPdf->Cell(40,6,utf8_decode($valor['dias']),1,0,"C");
			$lobjPdf->Cell(40,6,utf8_decode($valor['total']),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
