<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
    require_once("../pdf/mc_table.php");
   require_once("../modelo/clsRep_asignacion.php");   
	$lobjPdf=new PDF_MC_Table('L','mm','Letter');
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(20,20,20);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclsRep_asignacion= new clsRep_asignacion();
   $lsa=$_GET["lsa"];
   $lobjclsRep_asignacion->fSetsbusqueda($lsa);
   $laMatriz=$lobjclsRep_asignacion->fBusqueda();
													
      $lobjPdf->SetY(20);
	   
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);


$lobjPdf->Ln(30);//para salto de linea

    
       $lobjPdf->SetFillColor(39,239,260);
       
       
       
       $lobjPdf->Cell(40,6,utf8_decode("N° Unidad"),1,0,"C");
        $lobjPdf->Cell(40,6,utf8_decode("Placa"),1,0,"C");
       $lobjPdf->Cell(40,6,utf8_decode("Serial"),1,1,"C");
	   $liI=0;
	   $N=0;

		   
			   $lobjPdf->SetFont("arial","I",10);
			     
		
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][6]),1,1,"C");
		
		$lobjPdf->Ln(4);
	   
	   //OTRA$lobjPdf->SetFont("arial","B",12);
//OTRA
       $lobjPdf->SetFont("arial","B",10);
       $lobjPdf->SetWidths(array(40,40,40,40));// ancho del cuadro
       $lobjPdf->SetAligns(array('C','C','C','C'));// alineacion dentro del cuadro

       //arreglo con todos los cuadros
       $lobjPdf->Row(array(utf8_decode("N° ASIGNACION"),utf8_decode("EQUIPO"),utf8_decode("CANTIDAD"),utf8_decode("OBSERVACION")));
       	   
	   $liI=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   
			 $lobjPdf->SetFont("arial","I",10);
			 $lobjPdf->SetWidths(array(40,40,40,40));
			$lobjPdf->SetAligns(array('C','C','C','C'));
			$lobjPdf->Row(array(utf8_decode($laMatriz[$liI][0]),utf8_decode($laMatriz[$liI][1]),utf8_decode($laMatriz[$liI][2]),utf8_decode($laMatriz[$liI][3])));
		  
		
   }
   
	 $lobjPdf->Ln(50);
		$lobjPdf->Cell(80,6,utf8_decode("____________________ "),0,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode("____________________"),0,0,"C");
		$lobjPdf->Cell(80,6,utf8_decode("____________________ "),0,1,"C");
		$lobjPdf->Cell(80,6,utf8_decode("AUT.POR: "),0,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode("REVISADO POR: "),0,O,"C");
		$lobjPdf->Cell(80,6,utf8_decode("RECIBIDO POR: "),0,1,"C");
		$lobjPdf->Cell(80,6,utf8_decode("MIGUEL PARRA "),0,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode("JOSE MOTA "),0,0,"C");
		$lobjPdf->Cell(80,6,utf8_decode("CONDUCTOR "),0,1,"C");
		     $lobjPdf->Output();
?>
