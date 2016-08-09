<?php
 
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_marca_unidad.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(20,20,20);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_marca_unidad= new class_marca_unidad();
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_marca_unidad->flistar($lsa);
   $laMatriz=$lobjclass_marca_unidad->flistaractivos(); //aqui solo cambia el llamado del listar que esta en la clase, tiene que hacerse diferentes listar para cada pdf
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(70,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Listado de las Marcas de Unidades Activas de la Empresa ATC .C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C");
       $lobjPdf->Cell(70,6,utf8_decode("Nombre"),1,1,"C");
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(70,6,utf8_decode($laMatriz[$liI][1]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
