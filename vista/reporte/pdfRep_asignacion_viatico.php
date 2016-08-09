<?php

   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_asig_viatico.php");
   include_once "../../phpqrcode/qrlib.php";
	//require_once("../../modelo/class_tabviatico.php");
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   
	$file = 'code.png'; 
	// La data que llevará.
	$data = 'http://localhost/atcsistem/vista/reporte/pdfRep_tabvia.php?lsa='.$lsa; 

	// Y generamos la imagen.
	QRcode::png($data, $file,"L", 4, 4);
   
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   
  
   $viatico = new class_asig_viatico();
  // $tabulador = new class_tabviatico();
   
   
   $asignacion = $viatico->fbuscarAsignacion($lsa);
   $ruta = $viatico->buscarRuta($asignacion['idruta_tabvia']);
   
   $origen = $viatico->buscarCiudad($ruta['idciudad_origen_rut']);
   $destino = $viatico->buscarCiudad($ruta['idciudad_destino_rut']);
   //print_r($asignacion);exit();
   
   $listado_tabvia= $viatico->buscarDetalletabulador($asignacion['idtabulador_viatico_asivia']);
   
   
   												
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(07,90,0);
	   $lobjPdf->Cell(170,6,utf8_decode("Lista de tabulador de viaticos por la Empresa ATC C.A."),0,1,"C");
	   $lobjPdf->SetFont("arial","B",10);
       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(238,235,235);
       $lobjPdf->Cell(50,6,utf8_decode("Orden de Carga:"),1,0,"C",true );
	   $lobjPdf->Cell(50,6,utf8_decode($asignacion['idorden_carga_asivia']),1,1,"C");
	   $lobjPdf->Cell(50,6,utf8_decode("Fecha Asignacion:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($asignacion['fecha_hora_asivia']),1,1,"C");
	   $lobjPdf->Cell(50,6,utf8_decode("Ruta:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($ruta['via_rut']),1,1,"C");
	   $lobjPdf->Cell(50,6,utf8_decode("Ciudad Origen:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($origen),1,1,"C");
       $lobjPdf->Cell(50,6,utf8_decode("Ciudad Destino:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($destino),1,1,"C");
	    $lobjPdf->Cell(50,6,utf8_decode("Dias de Ruta:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($ruta['dias_rut']),1,1,"C");
	   $lobjPdf->Cell(50,6,utf8_decode("Monto Asignado:"),1,0,"C",true);
	   $lobjPdf->Cell(50,6,utf8_decode($asignacion['monto_asignado_asivia'].'  Bs'),1,1,"C");
		
	   $lobjPdf->Ln();
	   $lobjPdf->Cell(170,6,utf8_decode("Detalle asignacion viatico"),0,1,"C");	
	 
	    $lobjPdf->SetFont("arial","I",10);
	    if(isset($listado_tabvia))
	    {
			$lobjPdf->Cell(20,6,utf8_decode("Codigo"),1,0,"C");
			$lobjPdf->Cell(80,6,utf8_decode("Descripcion"),1,0,"C");
			$lobjPdf->Cell(30,6,utf8_decode("Precio"),1,0,"C");
			$lobjPdf->Cell(30,6,utf8_decode("Cantidad"),1,0,"C");
			$lobjPdf->Cell(30,6,utf8_decode("Monto (Bs)"),1,1,"C");
			
			foreach($listado_tabvia as $valor)
			{
				$lobjPdf->Cell(20,6,utf8_decode($valor['codigo']),1,0,"C");
				$lobjPdf->Cell(80,6,utf8_decode($valor['descripcion']),1,0,"C");
				$lobjPdf->Cell(30,6,utf8_decode($valor['precio']),1,0,"C");
				$lobjPdf->Cell(30,6,utf8_decode($valor['cantidad']),1,0,"C");
				$lobjPdf->Cell(30,6,utf8_decode($valor['monto']),1,1,"C");
		   }
		}
		
		$lobjPdf->Image('urlqr.png',170,220,40,40);		
		     $lobjPdf->Output();
?>
