<?php
	require_once("../modelo/class_estado.php");
	if(array_key_exists(txtoperacion,$_POST))
		{
			$liidestado=$_POST["txtidestado"];
			$lsdesc_esta=$_POST["txtdesc_esta"];
			$lsidpais=$_POST["cmbidpais"];
			$lsoperacion=$_POST["txtoperacion"];
			$lshacer=$_POST["txthacer"];
			$lobjestado= new class_estado();
			$lobjestado->fsetiidestado($liidestado);
			$lobjestado->fsetsdesc_esta($lsdesc_esta);
			$lobjestado->fsetsidpais($lsidpais);
		}
	
	if ($lsoperacion=="nuevo")
		{
			$liidestado=$lobjestado->fnuevo();
			$lihay=0;
			header("location: ../vista/admin.php?url=maestro_estado&liidestado=$liidestado&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}

	if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjestado->fbuscar();

		if ($lbenc)
			{
				$liidestado=$lobjestado->fgetiidestado();
				$lsdesc_esta=$lobjestado->fgetsdesc_esta();
				$lsidpais=$lobjestado->fgetsidpais();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_estado&liidestado=$liidestado&lsdesc_esta=$lsdesc_esta&lsidpais=$lsidpais&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
		}



	if ($lsoperacion=="incluir")
		{
		if ($lbhecho=$lobjestado->fverificarexistencia())
			{
				header("location: ../vista/admin.php?url=maestro_estado&av=5");
			}
		else 
			{
				$lbhecho=$lobjestado->fincluir();  
				if ($lbhecho)
					{
						header("location: ../vista/admin.php?url=maestro_estado&av=1");
					}
			}
		}

	if ($lsoperacion=="modificar")
		{
			if ($lbhecho=$lobjestado->fverificarexistencia())
				{
					header("location: ../vista/admin.php?url=maestro_estado&av=5");
				}
			else 
				{
					$lbhecho=$lobjestado->fmodificar();
					if ($lbhecho)
						{
							header("location: ../vista/admin.php?url=maestro_estado&av=3");
						}
				}
		}
	if ($lsoperacion=="eliminar")
		{
			$lbhecho=$lobjestado->feliminar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_estado&av=7");
				}
		}

	if ($lsoperacion=="activar")
		{
			$lbhecho=$lobjestado->factivar();   
			if ($lbhecho)
				{
					header("location: ../vista/admin.php?url=maestro_estado&av=9");
				}
		}
?>
