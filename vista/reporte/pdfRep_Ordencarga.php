<?php
   
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vistas/vissalir.php");
    //}
    include "../../phpqrcode/qrlib.php";
   require_once("../pdf/clsFpdf2.php");
   require_once("../../modelo/class_ordcar.php");   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   	$lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $daniela='http://localhost/atcsistem/vista/reporte/pdfRep_Ordencarga.php?lsa=';
   $lobjPdf->AddPage("P","Legal");
   QRcode::png("$daniela"."$lsa", "urlqr.png", "L", 4, 4);
   $lobjPdf->Image('urlqr.png',170,220,40,40);//aqui llamas la imagen qr y la vas rotando a donde lo quieras ubicar

   $lobjPdf->SetMargins(20,20,20);
   $lobjPdf->SetFont("arial","B",12);
	$lobjclass_ordcar= new class_ordcar();

   $lobjclass_ordcar->fsetiidorden_carga($lsa);
   $laMatriz=$lobjclass_ordcar->flistarpdf();
													
      $lobjPdf->SetY(20);
	   $lobjPdf->SetMargins(10,30,0);
	   
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);


$lobjPdf->Ln(1);//para salto de linea
    $lobjPdf->Cell(120);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Ln(30);
       $lobjPdf->Cell(120);
       $lobjPdf->Cell(15,6,utf8_decode("N°"),1,0,"C");
       $lobjPdf->Cell(35,6,utf8_decode("FECHA/ HORA"),1,1,"C");
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","I",10);
			       $lobjPdf->Cell(120);
		
		$lobjPdf->Cell(15,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(35,6,utf8_decode($laMatriz[$liI][1]),1,1,"C");
		$lobjPdf->Cell(13);
		$lobjPdf->Ln(4);
		

		
	
	
			   $lobjPdf->Ln(10);
		$lobjPdf->SetFont("arial","B",14);
$lobjPdf->Cell(100,12,utf8_decode("ORDEN DE CARGA"),0,1,"C");
	   
		
	   //~ }
	   
	   //OTRA$lobjPdf->SetFont("arial","B",12);
//OTRA
    $lobjPdf->Cell(10);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("CEDULA"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",10);
		
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][2]),1,0,"C");
	
		
   //~ }
   
	  //OTRA
    
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("CONDUCTOR"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		   
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][12]),1,0,"C");
	$lobjPdf->Cell(1,8,utf8_decode($laMatriz[$liI][13]),0,1,"R");
	
	
	   
   
    //~ }
	   
	   //OTRA$lobjPdf->SetFont("arial","B",12);
//para salto de linea
    $lobjPdf->Cell(10);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("N° UNIDAD"),1,0,"C");
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
			       
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][3]),1,0,"C");
//~ }

//otra
    
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("PLACA UNIDAD"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][4]),1,0,"C");
	
		$lobjPdf->Cell(13);
		$lobjPdf->Ln(8);
	   
	   
   //~ }

//otra
    $lobjPdf->Cell(10);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("N° REMOLQUE"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][5]),1,0,"C");
	
		
	   
	   
   //~ }
	    
	  //otro
    
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(40,8,utf8_decode("PLACA REMOLQUE"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(44,8,utf8_decode($laMatriz[$liI][6]),1,1,"C");
	
	   
   //~ }
    //otro
  $lobjPdf->Cell(10);
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(30,8,utf8_decode("RIF EMPRESA"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(30,8,utf8_decode($laMatriz[$liI][7]),1,0,"C");
	
		
	   
	   
   //~ }
   
    //otro
   
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(25,8,utf8_decode("EMPRESA"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	 
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(30,8,utf8_decode($laMatriz[$liI][8]),1,0,"C");
	
		

	   
	   
   //~ }
   
   
    //OTRA
    
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->SetFont("arial","B",8);
       $lobjPdf->Cell(27,8,utf8_decode("TLF EMPRESA"),1,0,"C");
       
       
         
	   
	   $liI=0;
	   $N=0;
	   //~ for($liI=0;$liI<count($laMatriz);$liI++){
		   //~ $N++;
		   
			   $lobjPdf->SetFont("arial","",8);
		
	$lobjPdf->Cell(26,8,utf8_decode($laMatriz[$liI][9]),1,1,"C");
	
		
	   $lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(25,6,utf8_decode("PAIS ORIGEN"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("ESTADO ORIGEN"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("MUNICIPIO ORIGEN"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("PARROQUIA ORIGEN"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(33,6,utf8_decode("CIUDAD ORIGEN"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][19]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][20]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][21]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][22]),1,0,"C");
		$lobjPdf->Cell(33,6,utf8_decode($laMatriz[$liI][23]),1,1,"C");
		$lobjPdf->Cell(10);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(28,6,utf8_decode("FECHA ENTREGA"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(140,6,utf8_decode("DIRECCION ENTREGA"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(28,6,utf8_decode($laMatriz[$liI][16]),1,0,"C");
		$lobjPdf->Cell(140,6,utf8_decode($laMatriz[$liI][29]),1,1,"C");
	   $lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(25,6,utf8_decode("PAIS DESTINO"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("ESTADO DESTINO"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("MUNICIPIO DESTINO"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("PARROQUIA DESTINO"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(33,6,utf8_decode("CIUDAD DESTINO"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][24]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][25]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][26]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][27]),1,0,"C");
		$lobjPdf->Cell(33,6,utf8_decode($laMatriz[$liI][28]),1,1,"C");
		$lobjPdf->Cell(10);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(28,6,utf8_decode("FECHA SALIDA"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(140,6,utf8_decode("DIRECCIÓN SALIDA"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(28,6,utf8_decode($laMatriz[$liI][17]),1,0,"C");
		$lobjPdf->Cell(140,6,utf8_decode($laMatriz[$liI][30]),1,0,"C");
	   
  

		
       
         
	   
	   $liI=0;
	   $N=0;
	   
	   
	   
 
	   
	   
   //~ }
   //~ }   
     
    $lobjPdf->Ln(6);
		$lobjPdf->SetFillColor(39,239,260);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(10);
		$lobjPdf->Cell(168,5,utf8_decode("PRODUCTO "),1,1,"C");
		
		$i=1;
		for($x=0; $x< count($laMatriz); $x++){
			$lobjPdf->Cell(10);
			$lobjPdf->Cell(10,6,utf8_decode($x),1,0,"C");
			$lobjPdf->SetFont("arial","",8);
			$lobjPdf->Cell(158,6,utf8_decode($laMatriz[$x][14]),1,1,"C");
			$i++;
		}
   
   
		     $lobjPdf->Output();
?>
