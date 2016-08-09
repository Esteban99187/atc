<?php
	require_once("../modelo/class_usuarioatcexterno_empresa.php");
	if(array_key_exists(txtoperacion,$_POST))
	{

		$lsidusuario = isset($_POST['txtidusuario']) ? $_POST['txtidusuario'] : null;
		$lsnombre_persona = isset($_POST['txtnombre_persona']) ? $_POST['txtnombre_persona'] : null;
		$lsapellido_persona = isset($_POST['txtapellido_persona']) ? $_POST['txtapellido_persona'] : null;
		$lstelefono_persona = isset($_POST['txttelefono_persona']) ? $_POST['txttelefono_persona'] : null;
		$lscedula_persona = isset($_POST['txtcedula_persona']) ? $_POST['txtcedula_persona'] : null;
		$lscorreo_persona = isset($_POST['txtcorreo_persona']) ? $_POST['txtcorreo_persona'] : null;
		$lsoperacion = isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lsnombre = isset($_POST['txtnombre']) ? $_POST['txtnombre'] : null;
		$lsapellido = isset($_POST['txtapellido']) ? $_POST['txtapellido'] : null;
		$lstelefono = isset($_POST['txttelefono']) ? $_POST['txttelefono'] : null;
		$lscedula = isset($_POST['txtcedula']) ? $_POST['txtcedula'] : null;
		$lscorreo = isset($_POST['txtcorreo']) ? $_POST['txtcorreo'] : null;
		$lsoperacion = isset($_POST['txtoperacion']) ? $_POST['txtoperacion'] : null;
		$lshacer = isset($_POST['txthacer']) ? $_POST['txthacer'] : null;
		$lobjusuarios= new class_usuariosatcexterno_empresa();
		$lobjusuarios->fsetsidusuario($lsidusuario);
		$lobjusuarios->fsetsnombre_persona($lsnombre_persona);
		$lobjusuarios->fsetsapellido_persona($lsapellido_persona);
		$lobjusuarios->fsetstelefono_persona($lstelefono_persona);
		$lobjusuarios->fsetscedula_persona($lscedula_persona);
		$lobjusuarios->fsetscorreo_persona($lscorreo_persona);
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
			header("location: ../vista/vista.php?url=maestro_usuarioatcexterno_empresa&lsidusuario=$lsidusuario&lstipo=$lstipo&lsnombre=$lsnombre&lsapellido=$lsapellido&lstelefono=$lstelefono&lscedula=$lscedula&lscorreo=$lscorreo&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}
		
		if ($lsoperacion=="buscarpersona")
		{
			$lbenc=$lobjusuarios->fbuscarpersona();
			if ($lbenc)
			{
				$lsnombre_persona=$lobjusuarios->fgetsnombre_persona();
				$lsapellido_persona=$lobjusuarios->fgetsapellido_persona();
				$lstelefono_persona=$lobjusuarios->fgetstelefono_persona();
				$lscedula_persona=$lobjusuarios->fgetscedula_persona();
				$lscorreo_persona=$lobjusuarios->fgetscorreo_persona();
				$lsnombre=$lobjusuarios->fgetsnombre();
				$lsapellido=$lobjusuarios->fgetsapellido();
				$lstelefono=$lobjusuarios->fgetstelefono();
				$lscedula=$lobjusuarios->fgetscedula();
				$lscorreo=$lobjusuarios->fgetscorreo();
				$lihay=$lobjusuarios->fgetihay();
			}
			header("location: ../vista/vista.php?url=maestro_usuarioatcexterno_empresa&lsidusuario=$lsidusuario&lsnombre_persona=$lsnombre_persona&lsapellido_persona=$lsapellido_persona&lstelefono_persona=$lstelefono_persona&lscedula_persona=$lscedula_persona&lscorreo_persona=$lscorreo_persona&lsnombre=$lsnombre&lsapellido=$lsapellido&lstelefono=$lstelefono&lscedula=$lscedula&lscorreo=$lscorreo&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
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
				header("location:  ../vista/vista.php?url=maestro_usuarioatcexterno_empresa&lshacer=$lshacer&lsoperacion=$lsoperacion");
			}

?>
