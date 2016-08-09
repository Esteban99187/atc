<?php
	require_once("../modelo/class_asig_viatico.php");
	if(array_key_exists('txtoperacion',$_POST))
	{
		$id_orden_carga=(isset($_POST["txtorden_carga"]))?$_POST["txtorden_carga"]:null;
		$fecha=(isset($_POST["txt_fecha"]))?$_POST["txt_fecha"]:date('Y-m-d');
		$id_tabulador = (isset($_POST["tabulador_viatico"]))?$_POST["tabulador_viatico"]:null;
		$monto_asivia = (isset($_POST["txtmonto"]))?$_POST["txtmonto"]:0;
		
		$operacion=(isset($_POST["txtoperacion"]))?$_POST["txtoperacion"]:null;
		
		//print_r($_POST);exit();
		
		$lobjtab = new class_asig_viatico();
		
		$lobjtab->set_valor('fecha_asigvia',$fecha);
		$lobjtab->set_valor('monto_asivia',$monto_asivia);
		$lobjtab->set_valor('tabulador_viatico',$id_tabulador);
		$lobjtab->set_valor('orden_carga',$id_orden_carga);
			
	}else
		{
			if(array_key_exists('operacion',$_GET))
			{
				$operacion=(isset($_GET["operacion"]))?$_POST["operacion"]:null;
				$id_orden_carga=(isset($_GET["orden_carga"]))?$_GET["orden_carga"]:null;
			}
		}
   
	if ($operacion=="nuevo")
	{
		
		header("location: ../vista/admin.php?url=maestro_asignacion_viatico&operacion=incluir&orden_carga=$id_orden_carga");						
	}	
		   
	if ($operacion=="incluir")
	{
		$ult = 0;
		if($lobjtab->fincluir())
		{
			$ult = $lobjtab->get_valor('ult_asignacion');
			//header("location: ../vista/admin.php?url=maestro_asignacion_viatico&operacion=cerrar&ult=".$ult);
			header("location: ../vista/reporte/pdfRep_asignacion_viatico.php?lsa=".$ult['ultimo']);
			exit();	
		}
					
	}
    	
	
?>
