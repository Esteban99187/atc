<?php
	
	include_once("../libreria/jpgraph/src/jpgraph.php");
	include_once("../libreria/jpgraph/src/jpgraph_bar.php");
	include_once ("../modelo/class_solicitud.php");
	
		
	$fecha1= (isset($_GET['fecha1']))?$_GET['fecha1']:false;
	$fecha2= (isset($_GET['fecha2']))?$_GET['fecha2']:false;
	
	$sol = new class_solicitud();
	$listado = $sol->estadistica_solicitud($fecha1,$fecha2);
	
	$cabecera = array("emitida","ejecutada","espera","procesada","anulada");
	$valores = array();
	$titulo = array();
	for($i=0;$i<count($listado);$i++)
	{
		$valores[]= $listado[$i]['total'];
		$titulo[]= $listado[$i]['sol'];
	}
	 
	 //print_r($valores);exit(); 


// Se define el array de datos
$datosy=array(25,16,24,5,8,31);
 
// Creamos el grafico
$grafico =  new Graph(800,450, "auto"); 
$grafico->SetScale('textlin');
 
// Ajustamos los margenes del grafico-----    (left,right,top,bottom)
$grafico->SetMargin(70,30,50,110);
 

// Creamos barras de datos a partir del array de datos
$bplot = new BarPlot($valores);
 
// Configuramos color de las barras
$bplot->SetFillColor('#479CC9');
 
//Añadimos barra de datos al grafico
$grafico->Add($bplot);
 
// Queremos mostrar el valor numerico de la barra
$bplot->value->Show();
 
// Configuracion de los titulos
$grafico->title->Set('Estadistica de Solicitudes');
$grafico->xaxis->title->Set('Estatus de las Solicitudes');
$grafico->xaxis->SetTitlemargin(55);
$grafico->xaxis->SetFont(FF_ARIAL,FS_NORMAL,9);
$grafico->xaxis->SetTickLabels($titulo);
$grafico->xaxis->SetLabelAngle(50);


$grafico->yaxis->title->Set('Escala');
 
$grafico->title->SetFont(FF_FONT1,FS_BOLD);
$grafico->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$grafico->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Se muestra el grafico
$grafico->Stroke();
		
?>
