<?php
	require_once("../modelo/class_usuarioatcexterno.php");
	if(array_key_exists(txtoperacion,$_POST))
	{

		$lsidusuario = isset($_POST['txtidusuario']) ? $_POST['txtidusuario'] : null;
		$lsnombre = isset($_POST['txtnombre']) ? $_POST['txtnombre'] : null;
		$lsapellido = isset($_POST['txtapellido']) ? $_POST['txtapellido'] : null;
		$lstelefono = isset($_POST['txttelefono']) ? $_POST['txttelefono'] : null;
		$lscedula = isset($_POST['txtcedula']) ? $_POST['txtcedula'] : null;
		$lscorreo = isset($_POST['txtcorreo']) ? $_POST['txtcorreo'] : null;
		$lsoperacion = isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lshacer = isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
		$lobjusuarios= new class_usuariosatcexterno();
		$lobjusuarios->fsetsidusuario($lsidusuario);
		$lobjusuarios->fsetsnombre($lsnombre);
		$lobjusuarios->fsetsapellido($lsapellido);
		$lobjusuarios->fsetstelefono($lstelefono);
		$lobjusuarios->fsetscedula($lscedula);
		$lobjusuarios->fsetscorreo($lscorreo);
	}



		if ($lsoperacion=="buscar")
		{
			$lbenc=$lobjusuarios->fbuscar();
			if ($lbenc)
			{
				$lsnombre=$lobjusuarios->fgetsnombre();
				$lsapellido=$lobjusuarios->fgetsapellido();
				$lstelefono=$lobjusuarios->fgetstelefono();
				$lscedula=$lobjusuarios->fgetscedula();
				$lscorreo=$lobjusuarios->fgetscorreo();
				$lihay=$lobjusuarios->fgetihay();
			}
			header("location: ../vista/vista.php?url=maestro_usuarioatcexterno&lsidusuario=$lsidusuario&lstipo=$lstipo&lsnombre=$lsnombre&lsapellido=$lsapellido&lstelefono=$lstelefono&lscedula=$lscedula&lscorreo=$lscorreo&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
		
		if ($lsoperacion=="buscarpersona")
		{
			$lbenc=$lobjusuarios->fbuscarpersona();
			if ($lbenc)
			{
				$lsnombre=$lobjusuarios->fgetsnombre();
				$lsapellido=$lobjusuarios->fgetsapellido();
				$lstelefono=$lobjusuarios->fgetstelefono();
				$lscedula=$lobjusuarios->fgetscedula();
				$lscorreo=$lobjusuarios->fgetscorreo();
				$lihay=$lobjusuarios->fgetihay();
			}
			header("location: ../vista/vista.php?url=maestro_usuarioatcexterno&lsidusuario=$lsidusuario&lsnombre=$lsnombre&lsapellido=$lsapellido&lstelefono=$lstelefono&lscedula=$lscedula&lscorreo=$lscorreo&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}

			if ($lsoperacion=="incluir")
			{
				$lbhecho=$lobjusuarios->fincluir();
					if ($lbhecho)
					{
						$lshacer="listo";
					}
			}
			if ($lsoperacion=="modificar")
			{
				$lbhecho=$lobjusuarios->fmodificar();
					if ($lbhecho)
					{
						$lshacer="listo";
					}
			}

			if ($lsoperacion=="eliminar")
			{
				$lbhecho=$lobjusuarios->feliminar();
					if ($lbhecho)
					{
						$lshacer="listo";
					}
			}

			if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo")&&($lsoperacion!="buscarpersona"))
			{
				header("location:  ../vista/vista.php?url=maestro_usuarioatcexterno&lshacer=$lshacer&lsoperacion=$lsoperacion");
			}

?>
