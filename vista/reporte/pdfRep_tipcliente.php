<?php
   /*
   *      pdfestudianteslista.php
   *      
   *      Copyright 2011 José Baldomero Silva Hernández <jobasiher@cantv.net>
   *      
   *      Este programa es software libre, puede redistribuirlo y / o modificar
   *      Bajo los términos de la GNU Licensia Pública General(GPL) publicada por
   *      La Fundación de Software Libre(FSF), bien de la versión 2 o cualquier versión posterior.
   *      
   *      Este programa se distribuye con la esperanza de que sea útil,
   *      Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de
   *      COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.
   */
   setlocale(LC_ALL,"es_VE.UTF8");
  
  //if(!array_key_exists(nombre,$_SESSION)) 
   //{
	 //  header("location: ../vista/vissalir.php");
    //}
   require_once("../pdf/clsFpdf1.php");
   require_once("../../modelo/class_tipo_cliente.php");   //se define la clase que se debe llamar (que contenga el istar con la instruccion sql debida)
   $lobjPdf=new clsFpdf();
   $lobjPdf->AliasNbPages();
   $lobjPdf->AddPage("P","Letter");
   $lobjPdf->SetMargins(30,30,30);
   $lobjPdf->SetFont("arial","B",12);
   $lobjclass_tipo_cliente= new class_tipo_cliente(); //se cambia de acuerdo a la case que estan llamando (si es producto ya no iria 'class_tipo_cliente sino' 'class_producto')
   $lsa= isset($_GET['lsa']) ? $_GET['lsa'] : null;
   $lobjclass_tipo_cliente->flistar($lsa); //se define la clase y 'flistar' es la funcion que se creo en la clase para el listado
   $laMatriz=$lobjclass_tipo_cliente->flistar(); //se vuele a definir el parametro
													
      $lobjPdf->SetY(40);
	   $lobjPdf->SetMargins(75,30,0);
	   $lobjPdf->Cell(0,6,utf8_decode("Listado de Tipos de Clientes de la Empresa ATC .C.A."),0,1,"C"); //titulo del pdf
	   $lobjPdf->SetFont("arial","B",10);
	   $lobjPdf->SetFillColor(255,0,140);

       $lobjPdf->Ln();
       $lobjPdf->SetFillColor(39,239,260);
       $lobjPdf->Cell(20,6,utf8_decode("Código"),1,0,"C"); //celdas definidas
       $lobjPdf->Cell(70,6,utf8_decode("Nombre"),1,1,"C"); //celdas (si quiero mas celdas se duplica y se debe dejar la ultima celda en '1,1, "C"' la diferencia es el segundo 1 que permite que baje la celdas)
	   
	   
	   
	   
	   $liI=0;
	   $N=0;
	   for($liI=0;$liI<count($laMatriz);$liI++){
		   $N++;
			   $lobjPdf->SetFont("arial","I",10);
		$lobjPdf->Cell(20,6,utf8_decode($laMatriz[$liI][0]),1,0,"C"); //se colocan los parametros del listado de la clase
		$lobjPdf->Cell(70,6,utf8_decode($laMatriz[$liI][1]),1,1,"C");
		
	   }
		     $lobjPdf->Output();
?>
