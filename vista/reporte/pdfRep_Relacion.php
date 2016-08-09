<?php
	setlocale(LC_ALL,"es_VE.UTF8");
	require_once("../pdf/clsFpdf1.php");
	require_once("../../modelo/clsRep_Relacion_estatus.php");   
	$lobjPdf=new clsFpdf();
	$lobjPdf->AliasNbPages();
	$lobjPdf->AddPage("L","Legal");
	$lobjPdf->SetMargins(20,20,20);
	$lobjPdf->SetFont("arial","B",12);
	$lobjclsRep_Relacion_estatus= new clsRep_Relacion_estatus();
	$lsbusqueda= isset($_GET['lsbusqueda']) ? $_GET['lsbusqueda'] : null;
	$lobjclsRep_Relacion_estatus->fSetsbusqueda($lsbusqueda);
	$lobjclsRep_Relacion_estatus->fBusqueda($lsbusqueda);
	$laMatriz=$lobjclsRep_Relacion_estatus->fBusqueda(); 

	$lobjPdf->SetY(40);
	$lobjPdf->SetMargins(10,10,0);
	$lobjPdf->Cell(0,6,utf8_decode("Listado de Relación de Unidades por Estatus"),0,1,"C");
	$lobjPdf->SetFont("arial","B",10);
	$lobjPdf->SetFillColor(255,0,140);
	$lobjPdf->Ln();
	$lobjPdf->SetFillColor(30,239,260);
	$lobjPdf->Cell(45,6,utf8_decode("Fecha/Hora"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("Cédula"),1,0,"C");
	$lobjPdf->Cell(40,6,utf8_decode("Conductor"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("N° Unidad"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("Placa"),1,0,"C");
	$lobjPdf->Cell(50,6,utf8_decode("Serial"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("N° Remolque"),1,0,"C");
	$lobjPdf->Cell(30,6,utf8_decode("Placa"),1,0,"C");
	$lobjPdf->Cell(50,6,utf8_decode("Serial"),1,1,"C");

	$liI=0;
	$N=0;
	for($liI=0;$liI<count($laMatriz);$liI++)
	{
		$N++;
		$lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(45,6,utf8_decode($laMatriz[$liI][0]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][1]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][2]).' '.($laMatriz[$liI][3]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][4]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		$lobjPdf->Cell(50,6,utf8_decode($laMatriz[$liI][9]),1,1,"C");
	}
	$lobjPdf->Output();
?>
