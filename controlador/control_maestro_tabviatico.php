<?php
	require_once("../modelo/class_tabviatico.php");
	if(array_key_exists('txtoperacion',$_POST))
	{
		//print_r($_POST);exit();
		$id_tab=(isset($_POST['txtidtabulador']))?$_POST['txtidtabulador']:null;
		$dias_tab=(isset($_POST['txtdias']))?$_POST['txtdias']:null;
		$ruta_tab=(isset($_POST['cmb_ruta']))?$_POST['cmb_ruta']:null;
		
		$lsoperacion=$_POST['txtoperacion'];
		$lshacer=$_POST["txthacer"];
		
		$objtabulador= new class_tabviatico();
		
		$objtabulador->set_idtab($id_tab);	
		$objtabulador->set_ruta($ruta_tab);
		
	}
	if ($lsoperacion=="nuevo")
	{
		$id_tab=$objtabulador->fnuevo();
		$lihay=0;
		$lsoperacion='incluir';
		header("location: ../vista/admin.php?url=transaccion_tabulador_viatico&idtabulador=$id_tab&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$objtabulador->fbuscar();
		if ($lbenc)
		{
			$idtabulador=$objtabulador->get_idtab();
			$dias_tab=$objtabulador->get_dias();
			$ruta_tab=$objtabulador->get_ruta();
			$origen = $objtabulador->get_origen();
			$destino = $objtabulador->get_destino();
			
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=transaccion_tabulador_viatico&idtabulador=$id_tab&diastabulador=$dias_tab&rutatabulador=$ruta_tab&origen=$origen&destino=$destino&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{	
		$datos = array();
		$descripcion = $_POST['descripcion'];
		$cantidad = $_POST['cantidad'];
		for($i=0; $i < count($descripcion); $i++)
		{
			$datos[] = array("cencos"=>$descripcion[$i],"cantidad"=>$cantidad[$i]);
		}
		
		$objtabulador->set_detalle($datos);
		$lbhecho=$objtabulador->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		//print_r($_POST);exit();
		$datos = array();
		$ruta = $_POST['cmb_ruta'];
		$descripcion = $_POST['descripcion'];
		$cantidad = $_POST['cantidad'];
		$codigo = $_POST['codigo'];
		for($i=0; $i < count($descripcion); $i++)
		{
			$datos[] = array("cencos"=>$descripcion[$i],"cantidad"=>$cantidad[$i],"iddet_tab"=>$codigo[$i]);
		}
		
		$objtabulador->set_detalle($datos);
		$objtabulador->set_ruta($ruta);
		
		$lbhecho=$objtabulador->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
		$lshacer="listo";
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$objtabulador->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location: ../vista/admin.php?url=transaccion_tabulador_viatico&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
