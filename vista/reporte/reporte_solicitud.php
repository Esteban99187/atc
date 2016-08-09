<?php

	setlocale(LC_ALL,"es_VE.UTF8");

	require_once("../pdf/pdf_3.php");
	require_once("../../modelo/clase_reporte_solicitud.php");   
	$lobjPdf=new clsFpdf();
	$lobjPdf->AliasNbPages();
	$lobjPdf->AddPage("P","Legal");
	$lobjPdf->SetMargins(30,30,30);
	$lobjPdf->SetFont("arial","B",12);
	$lobjclsRep_solicitudt= new clsRep_solicitudt();
	$lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
	$lobjclsRep_solicitudt->fSetsbusqueda($lsa);
	$laMatriz=$lobjclsRep_solicitudt->fBusqueda();

	$lobjPdf->SetY(50);
	$lobjPdf->SetMargins(10,30,0);
	$lobjPdf->Cell(150,6,utf8_decode("SOLICITUD DE SERVICIO DE TRANSPORTE TERRESTRE "),1,1,"C");
	$lobjPdf->SetFont("arial","B",10);
	$lobjPdf->SetFillColor(255,0,140);

	$lobjPdf->Ln(2);
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->Cell(150);
	$lobjPdf->Cell(25,6,utf8_decode("N°solicitante"),1,1,"C");

	$liI=0;
	$N=0;
	for($liI=0;$liI<count($laMatriz);$liI++)
	{

		$N++;
		$lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(150);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][0]),1,1,"C");
		$lobjPdf->Ln(3);

	}

	$lobjPdf->Ln();
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->SetFont("arial","",12);
	$lobjPdf->Cell(15);
	$lobjPdf->Cell(40,6,utf8_decode("Yo ;"),0,0,"C");

	$liI=0;
	$N=0;
	for($liI=0;$liI<count($laMatriz);$liI++)
	{
		$N++;
		$lobjPdf->SetFont("arial","I",10);
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][1]),0,0,"C");

		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(100,6,utf8_decode("; en mi condicion de representante legal "),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->Cell(1);
		$lobjPdf->Cell(80,6,utf8_decode("de la empresa"),0,0,"C");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(1);
		$lobjPdf->Cell(1,6,utf8_decode($laMatriz[$liI][3]),0,0,"C");
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(100,6,utf8_decode(", mediante  la  presente, realizo la solicitud, del "),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->Cell(197,6,utf8_decode("Servicios de Transporte Terrestre a esta empresa,Almacenes y Transportes"),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->Cell(149,6,utf8_decode("Cerealeros ATC,C.A para trasladar el producto(s): "),0,0,"C");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(1,6,utf8_decode($laMatriz[$liI][4]),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(110,6,utf8_decode("hacia los siguiente destino(s):"),0,1,"C");
		$lobjPdf->Ln(5);
		$lobjPdf->Cell(120,6,utf8_decode("Direccion Entrega:"),0,0,"C");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(60,6,utf8_decode($laMatriz[$liI][5]),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->SetFont("arial","",12);
		$lobjPdf->Cell(117,6,utf8_decode("Direccion Salida:"),0,0,"C");
		$lobjPdf->SetFont("arial","B",12);
		$lobjPdf->Cell(60,6,utf8_decode($laMatriz[$liI][6]),0,1,"C");

		$lobjPdf->Ln(35);
		$lobjPdf->Cell(200,6,utf8_decode("ATENTAMENTE:"),0,0,"C");
		$lobjPdf->Ln(15);
		$lobjPdf->Cell(110,6,utf8_decode("Nombre y Apellido:"),0,0,"C");
		$lobjPdf->Cell(1,6,utf8_decode($laMatriz[$liI][1]),0,0,"C");
		$lobjPdf->Ln(5);
		$lobjPdf->Cell(111,6,utf8_decode("Cedula de Identidad:"),0,0,"C");
		$lobjPdf->Cell(1,6,utf8_decode($laMatriz[$liI][7]),0,1,"C");
		$lobjPdf->Ln(2);
		$lobjPdf->Cell(171,6,utf8_decode("Firma                                        __________________"),0,0,"C");
	}
	$lobjPdf->Output();
?>
