<?php
	require_once("../modelo/class_solicitud_reparacion.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidsolicitud = isset($_POST['txtidsolicitud']) ? $_POST['txtidsolicitud'] : null;
		$lsidestatus = isset($_POST['txtidestatus']) ? $_POST['txtidestatus'] : null;
		$lsidempresa = isset($_POST['txtidempresa']) ? $_POST['txtidempresa'] : null;
		$lsnombre_razon_social_emp = isset($_POST['txtnombre_razon_social_emp']) ? $_POST['txtnombre_razon_social_emp'] : null;
		$lscedula_cont = isset($_POST['txtcedula_cont']) ? $_POST['txtcedula_cont'] : null;
		$lsnombre_cont = isset($_POST['txtnombre_cont']) ? $_POST['txtnombre_cont'] : null;
		$lsidproducto = isset($_POST['txtidproducto']) ? $_POST['txtidproducto'] : null;
		$lsnombre_pro = isset($_POST['txtnombre_pro']) ? $_POST['txtnombre_pro'] : null;
		$lsnombre_tippro = isset($_POST['txtnombre_tippro']) ? $_POST['txtnombre_tippro'] : null;
		$lsnombre_tipuni = isset($_POST['txtnombre_tipuni']) ? $_POST['txtnombre_tipuni'] : null;
		$lsnombre_unimed = isset($_POST['txtnombre_unimed']) ? $_POST['txtnombre_unimed'] : null;
		$lspeso_sol = isset($_POST['txtpeso_sol']) ? $_POST['txtpeso_sol'] : null;
		$lsidtabulador = isset($_POST['txtidtabulador']) ? $_POST['txtidtabulador'] : null;
		$lsnombre_estado_origen = isset($_POST['txtnombre_estado_origen']) ? $_POST['txtnombre_estado_origen'] : null;
		$lsnombre_estado_destino = isset($_POST['txtnombre_estado_destino']) ? $_POST['txtnombre_estado_destino'] : null;
		$lsprecio_tabulador = isset($_POST['txtprecio_tabulador']) ? $_POST['txtprecio_tabulador'] : null;
		$lsprecio_sol = isset($_POST['txtprecio_sol']) ? $_POST['txtprecio_sol'] : null;
		$lsunidades_req = isset($_POST['txtunidades_req']) ? $_POST['txtunidades_req'] : null;
		$lsdireccion_salida = isset($_POST['txtdireccion_salida']) ? $_POST['txtdireccion_salida'] : null;
		$lsdireccion_entrega = isset($_POST['txtdireccion_entrega']) ? $_POST['txtdireccion_entrega'] : null;
		$lsfecha_salida= isset($_POST['txtfecha_salida']) ? $_POST['txtfecha_salida'] : null;
		$lsfecha_entrega= isset($_POST['txtfecha_entrega']) ? $_POST['txtfecha_entrega'] : null;
		$lsobservaciones_sol= isset($_POST['txtobservaciones_sol']) ? $_POST['txtobservaciones_sol'] : null;
		$lshora_sol= isset($_POST['txthora_sol']) ? $_POST['txthora_sol'] : null;
		$lsfecha_sol= isset($_POST['txtfecha_sol']) ? $_POST['txtfecha_sol'] : null;
		$lscedula_res= isset($_POST['txtcedula_res']) ? $_POST['txtcedula_res'] : null;
		$lsnombre_res= isset($_POST['txtnombre_res']) ? $_POST['txtnombre_res'] : null;
		$lsapellido_res= isset($_POST['txtapellido_res']) ? $_POST['txtapellido_res'] : null;
		$lsoperacion= isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lshacer= isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
		$lobjsolicitud= new class_solicitud_reparacion();
		$lobjsolicitud->fsetiidsolicitud($liidsolicitud);
		$lobjsolicitud->fsetsidestatus($lsidestatus);
		$lobjsolicitud->fsetsidempresa($lsidempresa);
		$lobjsolicitud->fsetsnombre_razon_social_emp($lsnombre_razon_social_emp);
		$lobjsolicitud->fsetscedula_cont($lscedula_cont);
		$lobjsolicitud->fsetsnombre_cont($lsnombre_cont);
		$lobjsolicitud->fsetsidproducto($lsidproducto);
		$lobjsolicitud->fsetsnombre_pro($lsnombre_pro);
		$lobjsolicitud->fsetsnombre_tippro($lsnombre_tippro);
		$lobjsolicitud->fsetsnombre_tipuni($lsnombre_tipuni);
		$lobjsolicitud->fsetsnombre_unimed($lsnombre_unimed);
		$lobjsolicitud->fsetspeso_sol($lspeso_sol);
		$lobjsolicitud->fsetsidtabulador($lsidtabulador);
		$lobjsolicitud->fsetsnombre_estado_origen($lsnombre_estado_origen);
		$lobjsolicitud->fsetsnombre_estado_destino($lsnombre_estado_destino);
		$lobjsolicitud->fsetsprecio_tabulador($lsprecio_tabulador);
		$lobjsolicitud->fsetsprecio_sol($lsprecio_sol);
		$lobjsolicitud->fsetsunidades_req($lsunidades_req);
		$lobjsolicitud->fsetsdireccion_salida($lsdireccion_salida);
		$lobjsolicitud->fsetsdireccion_entrega($lsdireccion_entrega);
		$lobjsolicitud->fsetsfecha_salida($lsfecha_salida);
		$lobjsolicitud->fsetsfecha_entrega($lsfecha_entrega);
		$lobjsolicitud->fsetsobservaciones_sol($lsobservaciones_sol);
		$lobjsolicitud->fsetshora_sol($lshora_sol);
		$lobjsolicitud->fsetsfecha_sol($lsfecha_sol);
		$lobjsolicitud->fsetscedula_res($lscedula_res);
		$lobjsolicitud->fsetsnombre_res($lsnombre_res);
		$lobjsolicitud->fsetsapellido_res($lsapellido_res);
	}
	if ($lsoperacion=="nuevo")
	{
		$liidsolicitud=$lobjsolicitud->fnuevo();
		$lihay=0;
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&liidsolicitud=$liidsolicitud&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lscedula_cont=$lscedula_cont&lsnombre_cont=$lsnombre_cont&lsidproducto=$lsidproducto&lsnombre_pro=$lsnombre_pro&lsnombre_tippro=$lsnombre_tippro&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_unimed=$lsnombre_unimed&lsidtabulador=$lsidtabulador&lsnombre_estado_origen=$lsnombre_estado_origen&lsnombre_estado_destino=$lsnombre_estado_destino&lsprecio_tabulador=$lsprecio_tabulador&lspeso_sol=$lspeso_sol&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjsolicitud->fbuscar();
		if ($lbenc)
		{
			$lsidestatus=$lobjsolicitud->fgetsidestatus();
			$lsidempresa=$lobjsolicitud->fgetsidempresa();
			$lsnombre_razon_social_emp=$lobjsolicitud->fgetsnombre_razon_social_emp();
			$lscedula_cont=$lobjsolicitud->fgetscedula_cont();
			$lsnombre_cont=$lobjsolicitud->fgetsnombre_cont();
			$lsidproducto=$lobjsolicitud->fgetsidproducto();
			$lsnombre_pro=$lobjsolicitud->fgetsnombre_pro();
			$lsnombre_tippro=$lobjsolicitud->fgetsnombre_tippro();
			$lsnombre_tipuni=$lobjsolicitud->fgetsnombre_tipuni();
			$lsnombre_unimed=$lobjsolicitud->fgetsnombre_unimed();
			$lspeso_sol=$lobjsolicitud->fgetspeso_sol();
			$lsidtabulador=$lobjsolicitud->fgetsidtabulador();
			$lsnombre_estado_origen=$lobjsolicitud->fgetsnombre_estado_origen();
			$lsnombre_estado_destino=$lobjsolicitud->fgetsnombre_estado_destino();
			$lsprecio_tabulador=$lobjsolicitud->fgetsprecio_tabulador();
			$lsprecio_sol=$lobjsolicitud->fgetsprecio_sol();
			$lsunidades_req=$lobjsolicitud->fgetsunidades_req();
			$lsdireccion_salida=$lobjsolicitud->fgetsdireccion_salida();
			$lsdireccion_entrega=$lobjsolicitud->fgetsdireccion_entrega();
			$lsfecha_salida=$lobjsolicitud->fgetsfecha_salida();
			$lsfecha_entrega=$lobjsolicitud->fgetsfecha_entrega();
			$lsobservaciones_sol=$lobjsolicitud->fgetsobservaciones_sol();
			$lshora_sol=$lobjsolicitud->fgetshora_sol();
			$lsfecha_sol=$lobjsolicitud->fgetsfecha_sol();
			$lscedula_res=$lobjsolicitud->fgetscedula_res();
			$lsnombre_res=$lobjsolicitud->fgetsnombre_res();
			$lsapellido_res=$lobjsolicitud->fgetsapellido_res();
			$lihay=1;
		}
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&liidsolicitud=$liidsolicitud&lsidestatus=$lsidestatus&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lscedula_cont=$lscedula_cont&lsnombre_cont=$lsnombre_cont&lsidproducto=$lsidproducto&lsnombre_pro=$lsnombre_pro&lsnombre_tippro=$lsnombre_tippro&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lsidtabulador=$lsidtabulador&lsprecio_sol=$lsprecio_sol&lsnombre_estado_origen=$lsnombre_estado_origen&lsnombre_estado_destino=$lsnombre_estado_destino&lsprecio_tabulador=$lsprecio_tabulador&lsunidades_req=$lsunidades_req&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservaciones_sol=$lsobservaciones_sol&lshora_sol=$lshora_sol&lsfecha_sol=$lsfecha_sol&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar1")
	{
		$lihay1=0;
		$lbenc=$lobjsolicitud->fbuscar1();
		if ($lbenc)
		{
			$lsidempresa=$lobjsolicitud->fgetsidempresa();
			$lsnombre_razon_social_emp=$lobjsolicitud->fgetsnombre_razon_social_emp();
			$lscedula_cont=$lobjsolicitud->fgetscedula_cont();
			$lsnombre_cont=$lobjsolicitud->fgetsnombre_cont();
			$lihay1=1;
		}
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&liidsolicitud=$liidsolicitud&lsidestatus=$lsidestatus&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lscedula_cont=$lscedula_cont&lsnombre_cont=$lsnombre_cont&lsidproducto=$lsidproducto&lsnombre_pro=$lsnombre_pro&lsnombre_tippro=$lsnombre_tippro&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lsidtabulador=$lsidtabulador&lsnombre_estado_origen=$lsnombre_estado_origen&lsnombre_estado_destino=$lsnombre_estado_destino&lsprecio_tabulador=$lsprecio_tabulador&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservaciones_sol=$lsobservaciones_sol&lshora_sol=$lshora_sol&lsfecha_sol=$lsfecha_sol&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay1=$lihay1&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar2")
	{
		$lihay2=0;
		$lbenc=$lobjsolicitud->fbuscar2();
		if ($lbenc)
		{
			$lsidproducto=$lobjsolicitud->fgetsidproducto();
			$lsnombre_pro=$lobjsolicitud->fgetsnombre_pro();
			$lsnombre_tippro=$lobjsolicitud->fgetsnombre_tippro();
			$lsnombre_tipuni=$lobjsolicitud->fgetsnombre_tipuni();
			$lsnombre_unimed=$lobjsolicitud->fgetsnombre_unimed();
			$lspeso_sol=$lobjsolicitud->fgetspeso_sol();
			$lihay2=1;
		}
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&liidsolicitud=$liidsolicitud&lsidestatus=$lsidestatus&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lscedula_cont=$lscedula_cont&lsnombre_cont=$lsnombre_cont&lsidproducto=$lsidproducto&lsnombre_pro=$lsnombre_pro&lsnombre_tippro=$lsnombre_tippro&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lsidtabulador=$lsidtabulador&lsnombre_estado_origen=$lsnombre_estado_origen&lsnombre_estado_destino=$lsnombre_estado_destino&lsprecio_tabulador=$lsprecio_tabulador&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservaciones_sol=$lsobservaciones_sol&lshora_sol=$lshora_sol&lsfecha_sol=$lsfecha_sol&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay2=$lihay2&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar3")
	{
		$lihay3=0;
		$lbenc=$lobjsolicitud->fbuscar3();
		if ($lbenc)
		{
			$lsidtabulador=$lobjsolicitud->fgetsidtabulador();
			$lsnombre_estado_origen=$lobjsolicitud->fgetsnombre_estado_origen();
			$lsnombre_estado_destino=$lobjsolicitud->fgetsnombre_estado_destino();
			$lsprecio_tabulador=$lobjsolicitud->fgetsprecio_tabulador();
			$lihay3=1;
		}
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&liidsolicitud=$liidsolicitud&lsidestatus=$lsidestatus&lsidempresa=$lsidempresa&lsnombre_razon_social_emp=$lsnombre_razon_social_emp&lscedula_cont=$lscedula_cont&lsnombre_cont=$lsnombre_cont&lsidproducto=$lsidproducto&lsnombre_pro=$lsnombre_pro&lsnombre_tippro=$lsnombre_tippro&lsnombre_tipuni=$lsnombre_tipuni&lsnombre_unimed=$lsnombre_unimed&lspeso_sol=$lspeso_sol&lsidtabulador=$lsidtabulador&lsnombre_estado_origen=$lsnombre_estado_origen&lsnombre_estado_destino=$lsnombre_estado_destino&lsprecio_tabulador=$lsprecio_tabulador&lsdireccion_salida=$lsdireccion_salida&lsdireccion_entrega=$lsdireccion_entrega&lsfecha_salida=$lsfecha_salida&lsfecha_entrega=$lsfecha_entrega&lsobservaciones_sol=$lsobservaciones_sol&lshora_sol=$lshora_sol&lsfecha_sol=$lsfecha_sol&lscedula_res=$lscedula_res&lsnombre_res=$lsnombre_res&lsapellido_res=$lsapellido_res&lihay3=$lihay3&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjsolicitud->fincluir();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjsolicitud->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjsolicitud->feliminar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo")&&($lsoperacion!="buscar1")&&($lsoperacion!="buscar2")&&($lsoperacion!="buscar3"))
	{
		header("location: ../vista/admin.php?url=transaccion_solicitud_reparacion&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
?>
