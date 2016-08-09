<?php
	setlocale(LC_ALL,"es_VE.UTF8");
	require_once("../pdf/clsFpdf9.php");
	require_once("../../modelo/clsRep_Recepcion_fecha.php");   
	$lobjPdf=new clsFpdf();
	$lobjPdf->AliasNbPages();
	$lobjPdf->AddPage("L","Legal");
	$lobjPdf->SetMargins(20,20,20);
	$lobjPdf->SetFont("arial","B",12);
	$lobjclsRep_Recepcion_fecha= new clsRep_Recepcion_fecha();
	$lsbusqueda= isset($_GET['lsbusqueda']) ? $_GET['lsbusqueda'] : null;
	$lsfini= isset($_GET['lsfini']) ? $_GET['lsfini'] : null;
	$lsfin= isset($_GET['lsfin']) ? $_GET['lsfin'] : null;
	$lobjclsRep_Recepcion_fecha->fSetsbusqueda($lsbusqueda);
	$lobjclsRep_Recepcion_fecha->fSetsfini($lsfini);
	$lobjclsRep_Recepcion_fecha->fSetsfin($lsfin);
	$laMatriz=$lobjclsRep_Recepcion_fecha->fBusqueda(); 
	
	$lobjPdf->SetY(40);
	$lobjPdf->SetMargins(20,20,20);
	$lobjPdf->Cell(0,6,utf8_decode("Listado de Recepción de Guia por Fechas"),0,1,"C");
	$lobjPdf->SetFont("arial","B",8);
	$lobjPdf->SetFillColor(255,0,140);
	$lobjPdf->Ln();
	$lobjPdf->SetFillColor(30,239,260);
	$lobjPdf->Cell(20,6,utf8_decode("Fecha"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("N° Guia"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("N° Orden de Carga"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("Cédula"),1,0,"C");
	$lobjPdf->Cell(60,6,utf8_decode("Conductor"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("N° Unidad"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("Placa"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("N° Remolque"),1,0,"C");
	$lobjPdf->Cell(20,6,utf8_decode("Placa"),1,0,"C");
	$lobjPdf->Cell(50,6,utf8_decode("Razón Social"),1,0,"C");
	$lobjPdf->Cell(40,6,utf8_decode("Rif"),1,1,"C");
	
	$liI=0;
	$N=0;
	for($liI=0;$liI<count($laMatriz);$liI++)
	{
		$N++;
		$lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][2]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][11]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(60,6,utf8_decode($laMatriz[$liI][4]).' '.($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][9]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][12]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][13]),1,1,"C");
	}
	$lobjPdf->Output();
?>
