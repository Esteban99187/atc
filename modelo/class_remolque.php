<?php
	require_once("class_db.php");
	class class_remolque extends class_db
	{
		private $aiidremolque;
		private $asserial_carroceria_rem;
		private $asplaca_rem;
		private $asobservaciones_rem;
		private $asactivado_rem;
		private $asidmarca_remolque;
		private $asidmodelo_remolque;
		private $asidtipo_remolque;
		public function __construct()
		{
			$this->aiidremolque=0;
			$this->asserial_carroceria_rem="";
			$this->asplaca_rem="";
			$this->asobservaciones_rem="";
			$this->asactivado_rem="";
			$this->asidmarca_remolque="";
			$this->asidmodelo_remolque="";
			$this->asidtipo_remolque="";
		}
		public function __destruct()
		{
		}
		public function fsetiidremolque($piidremolque)
		{
			$this->aiidremolque=$piidremolque;
		}
		public function fsetsserial_carroceria_rem($psserial_carroceria_rem)
		{
			$this->asserial_carroceria_rem=$psserial_carroceria_rem;
		}
		public function fsetsplaca_rem($psplaca_rem)
		{
			$this->asplaca_rem=$psplaca_rem;
		}
		public function fsetsobservaciones_rem($psobservaciones_rem)
		{
			$this->asobservaciones_rem=$psobservaciones_rem;
		}
		public function fsetsactivado_rem($psactivado_rem)
		{
			$this->asactivado_rem=$psactivado_rem;
		}
		public function fsetsidmarca_remolque($psidmarca_remolque)
		{
			$this->asidmarca_remolque=$psidmarca_remolque;
		}
		public function fsetsidmodelo_remolque($psidmodelo_remolque)
		{
			$this->asidmodelo_remolque=$psidmodelo_remolque;
		}
		public function fsetsidtipo_remolque($psidtipo_remolque)
		{
			$this->asidtipo_remolque=$psidtipo_remolque;
		}
		public function fgetiidremolque()
		{
			return $this->aiidremolque;
		}
		public function fgetsserial_carroceria_rem()
		{
			return $this->asserial_carroceria_rem;
		}
		public function fgetsplaca_rem()
		{
			return $this->asplaca_rem;
		}
		public function fgetsobservaciones_rem()
		{
			return $this->asobservaciones_rem;
		}
		public function fgetsactivado_rem()
		{
			return $this->asactivado_rem;
		}
		public function fgetsidmarca_remolque()
		{
			return $this->asidmarca_remolque;
		}
		public function fgetsidmodelo_remolque()
		{
			return $this->asidmodelo_remolque;
		}
		public function fgetsidtipo_remolque()
		{
			return $this->asidtipo_remolque;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select idremolque, serial_rem, placa_rem, observaciones_rem, activado_rem, modelo_unidad.idmarca_unidad, idmodelo_unidad_rem, idtipo_unidad_rem from remolque, modelo_unidad, marca_unidad where (placa_rem='$this->aiidremolque' and remolque.idmodelo_unidad_rem=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidremolque=$larow["idremolque"];
				$this->asserial_carroceria_rem=$larow["serial_rem"];
				$this->asobservaciones_rem=$larow["observaciones_rem"];
				$this->asactivado_rem=$larow["activado_rem"];
				$this->asidmarca_remolque=$larow["idmarca_unidad"];
				$this->asidmodelo_remolque=$larow["idmodelo_unidad_rem"];
				$this->asidtipo_remolque=$larow["idtipo_unidad_rem"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->Bitacora('Busco Registro','Remolque','sistema');
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						insert into remolque
						(
							placa_rem,
							serial_rem,
							observaciones_rem, 
							idmodelo_unidad_rem, 
							idtipo_unidad_rem, 
							estatus_rem,
							activado_rem
						)
							
						values
						(
							'$this->aiidremolque',
							'$this->asserial_carroceria_rem',
							'$this->asobservaciones_rem',
							'$this->asidmodelo_remolque',
							'$this->asidtipo_remolque',
							'DISPONIBLE',
							'1'
						)
					";
					
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Incluyo Registro','Remolque','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						update remolque set 
						
						serial_rem='$this->asserial_carroceria_rem',
						observaciones_rem='$this->asobservaciones_rem',
						idmodelo_unidad_rem='$this->asidmodelo_remolque', 
						idtipo_unidad_rem='$this->asidtipo_remolque'
						
						where 
						
						(placa_rem='$this->aiidremolque')
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Modifico Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fdesactivar()
		{
			$lbhecho=false;
			$lssql="update remolque set activado_rem='0' where (placa_rem='$this->aiidremolque')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Desactivo Registro','Remolque','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update remolque set activado_rem='1' where (placa_rem='$this->aiidremolque')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Activo Registro','Remolque','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select u.idremolque, u.serial_rem, u.placa_rem, u.observaciones_rem, mo.desc_mode, tu.desc_tipo_unid, u.estatus_rem
												from unidad as u
												inner join modelo_unidad  as mo
												inner join tipo_unidad as tu
						where (u.idmodelo_unidad_rem=mo.idmodelo_unidad) and (u.idtipo_unidad_rem=tu.idtipo_unidad)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idremolque"];
				$lamatriz[$lii][1]=$larow["serial_rem"];
				$lamatriz[$lii][3]=$larow["placa_rem"];
				$lamatriz[$lii][4]=$larow["estatus_rem"];
				$lamatriz[$lii][5]=$larow["desc_mode"];
				$lamatriz[$lii][6]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][7]=$larow["observaciones_rem"];
				$lamatriz[$lii][8]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][9]=$larow["desc_mode"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->Bitacora('Listo Registros','Unidad','sistema');
			$this->fdesconectar();
			return $lamatriz;
		}
		public function reporteunidaactiva()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as activas FROM unidad WHERE (estatus_uni='1')";
			$consulta = $this->ffiltro($sql);
			$datos = $this->fproximo($consulta);
			return $datos;
		}
		public function reporteunidainactiva()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as inactivas FROM unidad WHERE (estatus_uni='2')";
			$consulta = $this->ffiltro($sql);
			$datos1 = $this->fproximo($consulta);
			return $datos1;
		}
		public function reporteunida()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as unidades FROM unidad";
			$consulta = $this->ffiltro($sql);
			$datos2 = $this->fproximo($consulta);
			return $datos2;
		}
		public function flistardisponibles()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select u.idunidad, u.serial_carroceria_rem, u.placa_rem, u.observaciones_rem, mo.desc_mode, tu.desc_tipo_unid, u.estatus_uni
												from unidad as u
												inner join modelo_unidad  as mo
												inner join tipo_unidad as tu
						where (u.idmodelo_unidad=mo.idmodelo_unidad) and (u.idtipo_unidad=tu.idtipo_unidad) and (u.estatus_uni=1)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idunidad"];
				$lamatriz[$lii][1]=$larow["serial_carroceria_rem"];
				$lamatriz[$lii][2]=$larow["placa_rem"];
				$lamatriz[$lii][3]=$larow["estatus_uni"];
				$lamatriz[$lii][4]=$larow["desc_mode"];
				$lamatriz[$lii][5]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][6]=$larow["observaciones_rem"];
				$lamatriz[$lii][7]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][8]=$larow["desc_mode"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistarocupados()
        {
            $lamatriz=array();
            $lii=0;
            $lssql="select r.idrelacion_unidad, r.fecha_rel, r.cedula_res, r.nombre_res, r.apellido_res, r.cedula, p.nombres_per, p.apellidos_per, p.cod_rol,
					r.idunidad, u.placa_rem, u.idtipo_unidad, r.idremolque, ti.idtipo_unidad,
					 ti.desc_tipo_unid, u.serial_carroceria_rem, u.placa_rem, ti.desc_tipo_unid, u.observaciones_rem, mo.desc_mode
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												
												inner join tipo_unidad as ti
												
												inner join modelo_unidad  as mo
												where (r.idunidad=u.idunidad) and (u.idtipo_unidad=ti.idtipo_unidad)
												 and (r.cedula=p.cedula) and (u.idmodelo_unidad=mo.idmodelo_unidad) and (u.estatus_uni=2)";
												
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
				
				$lamatriz[$lii][0]=$larow["idunidad"];
				$lamatriz[$lii][1]=$larow["serial_carroceria_rem"];
				$lamatriz[$lii][2]=$larow["placa_rem"];
				$lamatriz[$lii][3]=$larow["estatus_uni"];
				$lamatriz[$lii][4]=$larow["desc_mode"];
				$lamatriz[$lii][5]=$larow["observaciones_rem"];
				$lamatriz[$lii][6]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][7]=$larow["cedula"];
                $lamatriz[$lii][8]=$larow["nombres_per"];
                $lamatriz[$lii][9]=$larow["apellidos_per"];
				$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	public function flistadounidad($parametro1,$parametro2)
	{
	
	  $this->fconectar();
	  if($parametro1!="")//por codigo
		$sql      = "SELECT * FROM unidad , marca_unidad , modelo_unidad, tipo_unidad  WHERE (idunidad='$parametro1' and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and unidad.estatus_uni='1')";
		
		
	 
	 if($parametro2!="")//por nombre
		$sql      = "SELECT * FROM unidad , marca_unidad , modelo_unidad, tipo_unidad  WHERE (unidad.placa_rem='$parametro2' and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and unidad.estatus_uni='1')";
		
	 
	 
	  $cursor=$this->ffiltro($sql);
	  $contador = 0;
	  $encontrado=false;
	  
	 if ($laRow=$this->fproximo($cursor)){
			DO
			{
			   $filas [$contador][1] = $laRow["idunidad"];
			   $filas [$contador][2] = $laRow["serial_carroceria_rem"];
			   $filas [$contador][3] = $laRow["placa_rem"];	
			   $filas [$contador][4] = $laRow["observaciones_rem"];	
			   $filas [$contador][5] = $laRow["idmodelo_unidad"];	
			   $filas [$contador][6] = $laRow["idtipo_unidad"];	
			   $contador++;
			   
			}
			WHILE ($laRow=$this->fproximo($cursor));
			$encontrado=true;
	   }
	   if($encontrado)
			return $filas;
	   else
			return 99;	  
		
		$this->fcierrafiltro($cursor);
		$this->fdesconectar();
	}
	public function CatalogoUnidad()
	{
		$this->fconectar();
		$sql      = "SELECT idunidad, placa_rem, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";
		$cursor=$this->ffiltro($sql);
		$contador = 0;
		$encontrado=false;
	  
		if ($laRow=$this->fproximo($cursor))
		{
			DO
			{
				$filas [$contador][1] = $laRow["idunidad"];
				$filas [$contador][2] = $laRow["placa_rem"];
				$filas [$contador][3] = $laRow["desc_marc"];
				$filas [$contador][4] = $laRow["desc_tipo_unid"];
				
				$contador++;
			}
			WHILE ($laRow=$this->fproximo($cursor));
			$encontrado=true;
		}
		if($encontrado)
		return $filas;
		else
		return 99;	  
		
		$this->fcierrafiltro($cursor);
		$this->fdesconectar();
	}
	public function BuscaUnidad($parametro1,$parametro2)
	{
		$this->fconectar();
		if($parametro1!="")//por codigo
		$sql      = "SELECT idunidad, placa_rem, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (idunidad='$parametro1' and
		unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";

		if($parametro2!="")//por nombre
		$sql      = "SELECT idunidad, placa_rem, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (placa_rem='$parametro2' and
		unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";

		$cursor=$this->ffiltro($sql);
		$contador = 0;
		$encontrado=false;
	  
		if ($laRow=$this->fproximo($cursor))
		{
			DO
			{
				$filas [$contador][1] = $laRow["idunidad"];
				$filas [$contador][2] = $laRow["placa_rem"];
				$filas [$contador][3] = $laRow["desc_marc"];
				$filas [$contador][4] = $laRow["desc_tipo_unid"];
				
				$contador++;
			}
			WHILE ($laRow=$this->fproximo($cursor));
			$encontrado=true;
		}
		if($encontrado)
		return $filas;
		else
		return 99;	  
		
		$this->fcierrafiltro($cursor);
		$this->fdesconectar();
	}
	}
?>
