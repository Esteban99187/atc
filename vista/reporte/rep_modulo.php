<?   require_once("libreria/fpdf/clsFpdfv.php");
   require_once("modelo/class_modulo.php");
   $modulo = new modulo;
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Lista de Modulo",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
		 
			 $nombre_cod_modulo="Código";
			 $suma_mayor_cod_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_modulo)); 
			 $nombre_nombre_mod="Módulo";
			 $suma_mayor_nombre_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre_mod)); 
			 $nombre_url_mod="Dirección URL";
			 $suma_mayor_url_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_url_mod)); 
   $modulo->listar();
      while ($row=$modulo->row()){
		$suma_cod_modulo=$lobjPdf->GetStringWidth($row["cod_modulo"]);
		if($suma_cod_modulo>$suma_mayor_cod_modulo)
			$suma_mayor_cod_modulo=$suma_cod_modulo;
		$suma_cod_modulo=0;
		$suma_nombre_mod=$lobjPdf->GetStringWidth($row["nombre_mod"]);
		if($suma_nombre_mod>$suma_mayor_nombre_mod)
			$suma_mayor_nombre_mod=$suma_nombre_mod;
		$suma_nombre_mod=0;
		$suma_url_mod=$lobjPdf->GetStringWidth($row["url_mod"]);
		if($suma_url_mod>$suma_mayor_url_mod)
			$suma_mayor_url_mod=$suma_url_mod;
		$suma_url_mod=0;
   } 
			 $lobjPdf->Cell(($suma_mayor_cod_modulo+2),6,utf8_decode($nombre_cod_modulo),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_nombre_mod+2),6,utf8_decode($nombre_nombre_mod),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_url_mod+2),6,utf8_decode($nombre_url_mod),1,0,"C"); 
   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $modulo->listar();
   while ($row=$modulo->row()){
		 $lobjPdf->Cell(($suma_mayor_cod_modulo+2),6,$row["cod_modulo"],1,0,"C");
		 $lobjPdf->Cell(($suma_mayor_nombre_mod+2),6,$row["nombre_mod"],1,0,"R");
		 $lobjPdf->Cell(($suma_mayor_url_mod+2),6,$row["url_mod"],1,1,"R");
   }
   $lobjPdf->Output(); ?>
