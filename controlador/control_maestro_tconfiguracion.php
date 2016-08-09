<?php
	require_once("../modelo/class_tconfiguracion.php");
	if(array_key_exists(txtoperacion,$_POST))
	{
		$liidConfiguracion=$_POST["txtidConfiguracion"];
		$linumeroIntentos=$_POST["txtnumeroIntentos"];
		$licaducidadClave=$_POST["txtcaducidadClave"];
		$lipreguntasSecretas=$_POST["txtpreguntasSecretas"];
		$litiempoConexion=$_POST["txttiempoConexion"];
		$lsmision=$_POST["txtmision"];
		$lsvision=$_POST["txtvision"];
		$litopeMaximoInspeccion=$_POST["txttopeMaximoInspeccion"];
		$litopeMaximoCapacitacion=$_POST["txttopeMaximoCapacitacion"];
		$lsnombresistema=$_POST["txtnombresistema"];
		$lsversion=$_POST["txtversion"];
		$lslenguageprogramacion=$_POST["txtlenguageprogramacion"];
		$limensajesTexto=$_POST["txtmensajesTexto"];
		$lsoperacion=$_POST["txtoperacion"];
		$lshacer=$_POST["txthacer"];
		$lobjtconfiguracion= new class_tconfiguracion();
		$lobjtconfiguracion->fsetiidConfiguracion($liidConfiguracion);	
		$lobjtconfiguracion->fsetinumeroIntentos($linumeroIntentos);
		$lobjtconfiguracion->fseticaducidadClave($licaducidadClave);
		$lobjtconfiguracion->fsetipreguntasSecretas($lipreguntasSecretas);
		$lobjtconfiguracion->fsetitiempoConexion($litiempoConexion);
		$lobjtconfiguracion->fsetsmision($lsmision);
		$lobjtconfiguracion->fsetsvision($lsvision);
		$lobjtconfiguracion->fsetitopeMaximoInspeccion($litopeMaximoInspeccion);
		$lobjtconfiguracion->fsetitopeMaximoCapacitacion($litopeMaximoCapacitacion);
		$lobjtconfiguracion->fsetsnombresistema($lsnombresistema);
		$lobjtconfiguracion->fsetsversion($lsversion);
		$lobjtconfiguracion->fsetslenguageprogramacion($lslenguageprogramacion);
		$lobjtconfiguracion->fsetimensajesTexto($limensajesTexto);
	}   
	if ($lsoperacion=="nuevo")
	{
		$liidConfiguracion=$lobjtconfiguracion->fnuevo();
		$lihay=0;
		header("location: ../vista/administradortodo.php?url=maestro_tconfiguracion&liidConfiguracion=$liidConfiguracion&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="buscar")
	{
		$lihay=0;
		$lbenc=$lobjtconfiguracion->fbuscar();
		if ($lbenc)
		{
			$liidConfiguracion=$lobjtconfiguracion->fgetiidConfiguracion();
			$linumeroIntentos=$lobjtconfiguracion->fgetinumeroIntentos();
			$licaducidadClave=$lobjtconfiguracion->fgeticaducidadClave();
			$lipreguntasSecretas=$lobjtconfiguracion->fgetipreguntasSecretas();
			$litiempoConexion=$lobjtconfiguracion->fgetitiempoConexion();
			$lsmision=$lobjtconfiguracion->fgetsmision();
			$lsvision=$lobjtconfiguracion->fgetsvision();
			$litopeMaximoInspeccion=$lobjtconfiguracion->fgetitopeMaximoInspeccion();
			$litopeMaximoCapacitacion=$lobjtconfiguracion->fgetitopeMaximoCapacitacion();
			$lsnombresistema=$lobjtconfiguracion->fgetsnombresistema();
			$lsversion=$lobjtconfiguracion->fgetsversion();
			$lslenguageprogramacion=$lobjtconfiguracion->fgetslenguageprogramacion();
			$limensajesTexto=$lobjtconfiguracion->fgetimensajesTexto();
			$lihay=1;
		}
		header("location: ../vista/administradortodo.php?url=maestro_tconfiguracion&liidConfiguracion=$liidConfiguracion&linumeroIntentos=$linumeroIntentos&licaducidadClave=$licaducidadClave&lipreguntasSecretas=$lipreguntasSecretas&litiempoConexion=$litiempoConexion&lsmision=$lsmision&lsvision=$lsvision&litopeMaximoInspeccion=$litopeMaximoInspeccion&litopeMaximoCapacitacion=$litopeMaximoCapacitacion&lsnombresistema=$lsnombresistema&lsversion=$lsversion&lslenguageprogramacion=$lslenguageprogramacion&limensajesTexto=$limensajesTexto&lihay=$lihay&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}
	if ($lsoperacion=="incluir")
	{
		$lbhecho=$lobjtconfiguracion->fincluir();  
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="modificar")
	{
		$lbhecho=$lobjtconfiguracion->fmodificar();
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if ($lsoperacion=="eliminar")
	{
		$lbhecho=$lobjtconfiguracion->feliminar();   
		if ($lbhecho)
		{
			$lshacer="listo";
		}
	}
	if (($lsoperacion!="buscar")&&($lsoperacion!="nuevo"))
	{
		header("location:  ../vista/administradortodo.php?url=maestro_tconfiguracion&lshacer=$lshacer&lsoperacion=$lsoperacion");
	}    
?>
