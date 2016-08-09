<?   require_once("libreria/fpdf/clsFpdf_transaccion.php");
   require_once("modelo/class_modulo.php");
   $modulo = new modulo;
   
@include_once("clases/class_servicio_modulo.php");
	$servicio_modulo = new servicio_modulo;
	
  $codigo_principal=$_GET["codigo_principal"];
  $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetFont("arial","B",12);
   $lobjPdf->Ln(10);
   $lobjPdf->Cell(0,6,"Detalle de Modulo",0,1,"C");
   $lobjPdf->Ln();
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
		 
			 $nombre_cod_modulo="Código";
			 $suma_mayor_cod_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_modulo)); 
			 $nombre_nombre_mod="Nombre";
			 $suma_mayor_nombre_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre_mod)); 
			 $nombre_url_mod="Dirección URL";
			 $suma_mayor_url_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_url_mod)); 
   $modulo->set_cod_modulo($codigo_principal);    
   $modulo->consultar();
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
    $modulo->set_cod_modulo($codigo_principal);   
      $modulo->consultar();
   while ($row=$modulo->row()){
		 $lobjPdf->Cell(($suma_mayor_cod_modulo+2),6,$row["cod_modulo"],1,0,"C");
		 $lobjPdf->Cell(($suma_mayor_nombre_mod+2),6,$row["nombre_mod"],1,0,"C");
		 $lobjPdf->Cell(($suma_mayor_url_mod+2),6,$row["url_mod"],1,1,"C");
   }//-----------------DETALLES--------------------

   $lobjPdf->SetFont("arial","B",12);

$lobjPdf->Ln(5);
$lobjPdf->Cell(0,6,"Servicios del Modulo",0,1,"C");
   $lobjPdf->Ln(2);
         //analizamos los nombres de las tablas con mas longitud para colocar de ese tamaño las celdas
		 
			 $nombre_cod_servicio_modulo="Código";
			 $suma_mayor_cod_servicio_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_servicio_modulo)); 
			 $nombre_nombre_ser_mod="Nombre";
			 $suma_mayor_nombre_ser_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_nombre_ser_mod)); 
			 $nombre_url_ser_mod="Dirección URL";
			 $suma_mayor_url_ser_mod=$lobjPdf->GetStringWidth(utf8_decode($nombre_url_ser_mod)); 
			 $nombre_cod_modulo=cod_modulo;
			 $suma_mayor_cod_modulo=$lobjPdf->GetStringWidth(utf8_decode($nombre_cod_modulo));$suma_mayor=0;    
   $servicio_modulo->consulta_por("cod_modulo",$codigo_principal);
      while ($row=$modulo->row()){
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
		$suma_cod_modulo=$lobjPdf->GetStringWidth($row["cod_modulo"]);
		if($suma_cod_modulo>$suma_mayor_cod_modulo)
			$suma_mayor_cod_modulo=$suma_cod_modulo;
		$suma_cod_modulo=0;
   } 
			 $lobjPdf->Cell(($suma_mayor_cod_servicio_modulo+10),6,utf8_decode($nombre_cod_servicio_modulo),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_nombre_ser_mod+35),6,utf8_decode($nombre_nombre_ser_mod),1,0,"C"); 
			 $lobjPdf->Cell(($suma_mayor_url_ser_mod+65),6,utf8_decode($nombre_url_ser_mod),1,0,"C"); 

   $lobjPdf->SetFont("arial","",12);
   $lobjPdf->Ln();
      $servicio_modulo->consulta_por("cod_modulo",$codigo_principal);
   while ($row=$servicio_modulo->row()){
		 $lobjPdf->Cell(($suma_mayor_cod_servicio_modulo+10),6,$row["cod_servicio_modulo"],1,0,"C");
		 $lobjPdf->Cell(($suma_mayor_nombre_ser_mod+35),6,$row["nombre_ser_mod"],1,0,"L");
		 $lobjPdf->Cell(($suma_mayor_url_ser_mod+65),6,$row["url_ser_mod"],1,1,"L");
   }
   
   $lobjPdf->Output(); ?>
