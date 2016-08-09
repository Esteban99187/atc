<?php

	setlocale(LC_ALL,"es_VE.UTF8");
	include "../../phpqrcode/qrlib.php";
	require_once("../pdf/clsFpdf.php");
	require_once("../../modelo/class_solicitud.php");   
	$lobjPdf=new clsFpdf();
	$lobjPdf->AliasNbPages();
	$lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
	$carballo='http://localhost/atcsistem/vista/reporte/pdfRep_solicitud1.php?lsa=';
	$lobjPdf->AddPage("P","Legal");
	QRcode::png("$carballo"."$lsa", "urlqr.png", "L", 4, 4);
	$lobjPdf->Image('urlqr.png',170,300,40,40);//aqui llamas la imagen qr y la vas rotando a donde lo quieras ubicar
	$lobjPdf->SetMargins(30,30,30);
	$lobjPdf->SetFont("arial","B",12);
	$lobjsolicitud= new class_solicitud();
	$lobjsolicitud->set_idsolicitud($lsa);
	$lobjsolicitud->flistarpdf();
	$laMatriz=$lobjsolicitud->flistarpdf();
	
	if(count($laMatriz)<=0){
		
		header("location: ../admin.php?url=busqueda/busqueda_solicitud&msj=Solicitud No Existe o se Encuentra en Espera.");
	}else{												
   $lobjPdf->SetY(50);
	$lobjPdf->SetMargins(10,30,0);
	$lobjPdf->Cell(165,6,utf8_decode("SOLICITUD DE SERVICIO DE TRANSPORTE TERRESTRE "),0,1,"C");
	$lobjPdf->SetFont("arial","B",10);
	$lobjPdf->SetFillColor(255,0,140);

	$lobjPdf->Ln(5);
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->Cell(130);
	$lobjPdf->Cell(40,3,utf8_decode("N°solicitud"),0,1,"C");
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->Cell(70);
	
	$liI=0;
	$N=0;
	{

		$N++;
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(60);
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(50,3,utf8_decode($laMatriz[$liI][0]),0,1,"C");
		

	}
	$lobjPdf->Cell(130);
	$lobjPdf->Cell(40,6,utf8_decode("___________________"),0,1,"C");
	$lobjPdf->Cell(130);
	$lobjPdf->SetFont("arial","B",10);
	$lobjPdf->Cell(40,3,utf8_decode("Fecha / Hora"),0,1,"C");
	$lobjPdf->SetFillColor(39,239,260);
	$liI=0;
	$N=0;
	{
		$lobjPdf->Cell(130);
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(40,3,utf8_decode($laMatriz[$liI][1]),0,1,"C");
		}
	//daos del cliente
	$lobjPdf->Ln(2);
	$lobjPdf->SetFillColor(39,239,260);
	$lobjPdf->SetFont("arial","B",12);
	$lobjPdf->Cell(20);
	$lobjPdf->Cell(165,5,utf8_decode("Datos del Cliente "),0,1,"C");
	

		$lobjPdf->Ln(1);
		$lobjPdf->SetFont("arial","",11);
		$lobjPdf->Cell(40);
		$lobjPdf->Ln(1);
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(45,6,utf8_decode("Rif:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][2]),0,0,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(87,6,utf8_decode("Teléfono:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(10,6,utf8_decode($laMatriz[$liI][3]),0,1,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(62,6,utf8_decode("Razón Social:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][4]),0,1,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(70,6,utf8_decode("Correo Electrónico:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(10,6,utf8_decode($laMatriz[$liI][25]),0,1,"C");
		//~ //datos tabulador de precios por kilometro
		$lobjPdf->Ln(2);
		$lobjPdf->SetFillColor(39,239,260);
		$lobjPdf->SetFont("arial","B",11);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(165,5,utf8_decode("Direccion Origen/Destino "),0,1,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode("País Origen"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("Estado Origen"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("Municipio Origen"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("Parroquia Origen"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("Ciudad Origen"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][5]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][6]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][7]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][8]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][9]),1,1,"C");
		$lobjPdf->Cell(20);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(25,6,utf8_decode("Fecha salida"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(140,6,utf8_decode("Dirección salida"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][27]),1,0,"C");
		$lobjPdf->Cell(140,6,utf8_decode($laMatriz[$liI][29]),1,0,"C");
		$lobjPdf->Ln(8);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode("País Destino"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("Estado Destino"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("Municipio Destino"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(40,6,utf8_decode("Parroque Destino"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(30,6,utf8_decode("Ciudad Destino"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][10]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][11]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][12]),1,0,"C");
		$lobjPdf->Cell(40,6,utf8_decode($laMatriz[$liI][13]),1,0,"C");
		$lobjPdf->Cell(30,6,utf8_decode($laMatriz[$liI][14]),1,1,"C");
		$lobjPdf->Cell(20);
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(25,6,utf8_decode("Fecha entrega"),1,0,"C");
		$lobjPdf->SetFont("arial","B",8);
		$lobjPdf->Cell(140,6,utf8_decode("Dirección entrega"),1,1,"C");
		$lobjPdf->SetFont("arial","",8);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(25,6,utf8_decode($laMatriz[$liI][26]),1,0,"C");
		$lobjPdf->Cell(140,6,utf8_decode($laMatriz[$liI][28]),1,0,"C");
		$lobjPdf->Ln(8);
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(64,6,utf8_decode("Tipo de Unidad:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][15]),0,0,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(70,6,utf8_decode("Capacidad:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(10,6,utf8_decode($laMatriz[$liI][16]),0,1,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(69,6,utf8_decode("Unidad de Medida:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][17]),0,0,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(69,6,utf8_decode("Unidades Requieridas:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][30]),0,1,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(60,6,utf8_decode("Precio Total:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][31]),0,1,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Cell(65,6,utf8_decode("Observaciones:"),0,0,"C");
		$lobjPdf->SetFont("arial","",10);
		$lobjPdf->Cell(8,6,utf8_decode($laMatriz[$liI][18]),0,0,"C");
		$lobjPdf->SetFont("arial","B",10);
		$lobjPdf->Ln(5);
		//datos producto
		$lobjPdf->Ln(2);
		$lobjPdf->SetFillColor(39,239,260);
		$lobjPdf->SetFont("arial","B",11);
		$lobjPdf->Cell(20);
		$lobjPdf->Cell(165,5,utf8_decode("Producto "),0,1,"C");
		
		$i=1;
		for($x=0; $x< count($laMatriz); $x++){
			$lobjPdf->Cell(20);
			$lobjPdf->SetFont("arial","",11);
			//~ $lobjPdf->Cell(10,6,utf8_decode($x),1,0,"C");
			$lobjPdf->Cell(165,6,utf8_decode($laMatriz[$x][19]),1,1,"C");
			$i++;
		}
	}
		
	$lobjPdf->Output();
?>
