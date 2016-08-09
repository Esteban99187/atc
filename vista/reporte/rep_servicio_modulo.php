<?   require_once("libreria/fpdf/clsFpdf.php");
   require_once("modelo/class_servicio_modulo.php");
   $servicio_modulo = new servicio_modulo;
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("R","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Lista de servicio_modulo",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
		 
			 $nombre_cod_servicio_modulo=cod_servicio_modulo;
			 $suma_mayor_cod_servicio_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_servicio_modulo)); 
			 $nombre_nombre_ser_mod=nombre_ser_mod;
			 $suma_mayor_nombre_ser_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre_ser_mod)); 
			 $nombre_url_ser_mod=url_ser_mod;
			 $suma_mayor_url_ser_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_url_ser_mod)); 
			 $nombre_estatus_ser_mod=estatus_ser_mod;
			 $suma_mayor_estatus_ser_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_estatus_ser_mod)); 
			 $nombre_cod_modulo=cod_modulo;
			 $suma_mayor_cod_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_modulo));$suma_mayor=0;    
   $servicio_modulo->listar();
      while ($row=$servicio_modulo->row()){
		$suma_cod_servicio_modulo=$lobjPdf->GetStringWidth($row["cod_servicio_modulo"]);
		if($suma_cod_servicio_modulo>$suma_mayor_cod_servicio_modulo)
			$suma_mayor_cod_servicio_modulo=$suma_cod_servicio_modulo;
		$suma_cod_servicio_modulo=0;
		$suma_nombre_ser_mod=$lobjPdf->GetStringWidth($row["nombre_ser_mod"]);
		if($suma_nombre_ser_mod>$suma_mayor_nombre_ser_mod)
			$suma_mayor_nombre_ser_mod=$suma_nombre_ser_mod;
		$suma_nombre_ser_mod=0;
		$suma_url_ser_mod=$lobjPdf->GetStringWidth($row["url_ser_mod"]);
		if($suma_url_ser_mod>$suma_mayor_url_ser_mod)
			$suma_mayor_url_ser_mod=$suma_url_ser_mod;
		$suma_url_ser_mod=0;
		$suma_estatus_ser_mod=$lobjPdf->GetStringWidth($row["estatus_ser_mod"]);
		if($suma_estatus_ser_mod>$suma_mayor_estatus_ser_mod)
			$suma_mayor_estatus_ser_mod=$suma_estatus_ser_mod;
		$suma_estatus_ser_mod=0;
		$suma_cod_modulo=$lobjPdf->GetStringWidth($row["cod_modulo"]);
		if($suma_cod_modulo>$suma_mayor_cod_modulo)
			$suma_mayor_cod_modulo=$suma_cod_modulo;
		$suma_cod_modulo=0;
   } 
			 $lobjPdf->Cell(($suma_mayor_cod_servicio_modulo+2),6,utf8_decode($nombre_cod_servicio_modulo),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_nombre_ser_mod+2),6,utf8_decode($nombre_nombre_ser_mod),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_url_ser_mod+2),6,utf8_decode($nombre_url_ser_mod),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_estatus_ser_mod+2),6,utf8_decode($nombre_estatus_ser_mod),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_cod_modulo+2),6,utf8_decode($nombre_cod_modulo),1,0,"C");
   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $servicio_modulo->listar();
   while ($row=$servicio_modulo->row()){
		 $lobjPdf->Cell(($suma_mayor_cod_servicio_modulo+2),6,$row["cod_servicio_modulo"],1,0,"R");
		 $lobjPdf->Cell(($suma_mayor_nombre_ser_mod+2),6,$row["nombre_ser_mod"],1,0,"R");
		 $lobjPdf->Cell(($suma_mayor_url_ser_mod+2),6,$row["url_ser_mod"],1,0,"R");
		 $lobjPdf->Cell(($suma_mayor_estatus_ser_mod+2),6,$row["estatus_ser_mod"],1,0,"R");
		 $lobjPdf->Cell(($suma_mayor_cod_modulo+2),6,$row["cod_modulo"],1,1,"R");
   }
   $lobjPdf->Output(); ?>