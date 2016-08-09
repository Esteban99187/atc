<?php
	require_once("../modelo/class_banco.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidbanco=$_POST["txtidbanco"];
		$lsdesc_banc=$_POST["txtdesc_banc"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjbanco= new class_banco();
		$lobjbanco->fsetiidbanco($liidbanco);	
		$lobjbanco->fsetsdesc_banc($lsdesc_banc);
	}
   
		if ($lsoperacion=="nuevo")
		{
			$liidbanco=$lobjbanco->fnuevo();
			$lihay=0;
				header("location: ../vista/admin.php?url=maestro_banco&liidbanco=$liidbanco&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   
   
		if ($lsoperacion=="buscar")
		{
			$lihay=0;
			$lbenc=$lobjbanco->fbuscar();
			if ($lbenc)
			{
				$lsdesc_banc=$lobjbanco->fgetsdesc_banc();
				$lihay=1;
			}
				header("location: ../vista/admin.php?url=maestro_banco&liidbanco=$liidbanco&lsdesc_banc=$lsdesc_banc&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}   	
   
			if ($lsoperacion=="incluir")
	{
		if ($lbhecho=$lobjbanco->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_banco&av=5");
		}
		else 
		{
		
		$lbhecho=$lobjbanco->fincluir();  
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_banco&av=1");
			}
		}			
	}
    
			if ($lsoperacion=="modificar")
	{
		if ($lbhecho=$lobjbanco->fverificarexistencia())
		{
			header("location: ../vista/admin.php?url=maestro_banco&av=5");
		}
		else 
		{
			$lbhecho=$lobjbanco->fmodificar();
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_banco&av=3");
			}
		}
	}    
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjbanco->feliminar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_banco&av=7");
			}
	}
	if ($lsoperacion=="activar")
	{
		$lbhecho=$lobjbanco->factivar();   
			if ($lbhecho)
			{
				header("location: ../vista/admin.php?url=maestro_banco&av=9");
			}
	}   
?>
