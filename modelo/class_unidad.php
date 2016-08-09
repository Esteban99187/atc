<?php
	require_once("class_db.php");
	class class_unidad extends class_db
	{
		private $aiidunidad;
		private $asserial_motor;
		private $asserial_carroceria;
		private $asplaca;
		private $asobservaciones;
		private $asactivado_uni;
		private $asidmarca_unidad;
		private $asidmodelo_unidad;
		private $asidtipo_unidad;
		public function __construct()
		{
			$this->aiidunidad=0;
			$this->asserial_motor="";
			$this->asserial_carroceria="";
			$this->asplaca="";
			$this->asobservaciones="";
			$this->asactivado_uni="";
			$this->asidmarca_unidad="";
			$this->asidmodelo_unidad="";
			$this->asidtipo_unidad="";
		}
		public function __destruct()
		{
		}
		public function fsetiidunidad($piidunidad)
		{
			$this->aiidunidad=$piidunidad;
		}
		public function fsetsserial_motor($psserial_motor)
		{
			$this->asserial_motor=$psserial_motor;
		}
		public function fsetsserial_carroceria($psserial_carroceria)
		{
			$this->asserial_carroceria=$psserial_carroceria;
		}
		public function fsetsplaca($psplaca)
		{
			$this->asplaca=$psplaca;
		}
		public function fsetsobservaciones($psobservaciones)
		{
			$this->asobservaciones=$psobservaciones;
		}
		public function fsetsactivado_uni($psactivado_uni)
		{
			$this->asactivado_uni=$psactivado_uni;
		}
		public function fsetsidmarca_unidad($psidmarca_unidad)
		{
			$this->asidmarca_unidad=$psidmarca_unidad;
		}
		public function fsetsidmodelo_unidad($psidmodelo_unidad)
		{
			$this->asidmodelo_unidad=$psidmodelo_unidad;
		}
		public function fsetsidtipo_unidad($psidtipo_unidad)
		{
			$this->asidtipo_unidad=$psidtipo_unidad;
		}
		public function fgetiidunidad()
		{
			return $this->aiidunidad;
		}
		public function fgetsserial_motor()
		{
			return $this->asserial_motor;
		}
		public function fgetsserial_carroceria()
		{
			return $this->asserial_carroceria;
		}
		public function fgetsplaca()
		{
			return $this->asplaca;
		}
		public function fgetsobservaciones()
		{
			return $this->asobservaciones;
		}
		public function fgetsactivado_uni()
		{
			return $this->asactivado_uni;
		}
		public function fgetsidmarca_unidad()
		{
			return $this->asidmarca_unidad;
		}
		public function fgetsidmodelo_unidad()
		{
			return $this->asidmodelo_unidad;
		}
		public function fgetsidtipo_unidad()
		{
			return $this->asidtipo_unidad;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from unidad,modelo_unidad,marca_unidad where (idunidad='$this->aiidunidad' and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidunidad=$larow["idunidad"];
				$this->asserial_motor=$larow["serial_motor"];
				$this->asserial_carroceria=$larow["serial_carroceria"];
				$this->asplaca=$larow["placa"];
				$this->asobservaciones=$larow["observaciones"];
				$this->asactivado_uni=$larow["activado_uni"];
				$this->asidmarca_unidad=$larow["idmarca_unidad"];
				$this->asidmodelo_unidad=$larow["idmodelo_unidad"];
				$this->asidtipo_unidad=$larow["idtipo_unidad"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->Bitacora('Busco Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						insert into unidad 
						(
							idunidad,
							serial_motor, 
							serial_carroceria, 
							placa,
							observaciones, 
							idmodelo_unidad, 
							idtipo_unidad, 
							estatus_uni
						)
							
						values
						(
							'$this->aiidunidad',
							'$this->asserial_motor',
							'$this->asserial_carroceria',
							'$this->asplaca',
							'$this->asobservaciones',
							'$this->asidmodelo_unidad',
							'$this->asidtipo_unidad',
							'1'
						)
					";
					
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Incluyo Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						update unidad set 
						
						serial_motor='$this->asserial_motor', 
						serial_carroceria='$this->asserial_carroceria', 
						placa='$this->asplaca', 
						observaciones='$this->asobservaciones' ,
						idmodelo_unidad='$this->asidmodelo_unidad', 
						idtipo_unidad='$this->asidtipo_unidad'
						
						where 
						
						(idunidad='$this->aiidunidad')
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Modifico Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fdesactivar()
		{
			$lbhecho=false;
			$lssql="update unidad set estatus_uni='0' where (idunidad='$this->aiidunidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Desactivo Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update unidad set estatus_uni='1' where (idunidad='$this->aiidunidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->Bitacora('Activo Registro','Unidad','sistema');
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select u.idunidad, u.serial_motor, u.serial_carroceria, u.placa, u.observaciones, mo.desc_mode, tu.desc_tipo_unid, u.estatus_uni
												from unidad as u
												inner join modelo_unidad  as mo
												inner join tipo_unidad as tu
						where (u.idmodelo_unidad=mo.idmodelo_unidad) and (u.idtipo_unidad=tu.idtipo_unidad)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idunidad"];
				$lamatriz[$lii][1]=$larow["serial_motor"];
				$lamatriz[$lii][2]=$larow["serial_carroceria"];
				$lamatriz[$lii][3]=$larow["placa"];
				$lamatriz[$lii][4]=$larow["estatus_uni"];
				$lamatriz[$lii][5]=$larow["desc_mode"];
				$lamatriz[$lii][6]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][7]=$larow["observaciones"];
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
			$lssql="select u.idunidad, u.serial_motor, u.serial_carroceria, u.placa, u.observaciones, mo.desc_mode, tu.desc_tipo_unid, u.estatus_uni
												from unidad as u
												inner join modelo_unidad  as mo
												inner join tipo_unidad as tu
						where (u.idmodelo_unidad=mo.idmodelo_unidad) and (u.idtipo_unidad=tu.idtipo_unidad) and (u.estatus_uni=1)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idunidad"];
				$lamatriz[$lii][1]=$larow["serial_motor"];
				$lamatriz[$lii][2]=$larow["serial_carroceria"];
				$lamatriz[$lii][3]=$larow["placa"];
				$lamatriz[$lii][4]=$larow["estatus_uni"];
				$lamatriz[$lii][5]=$larow["desc_mode"];
				$lamatriz[$lii][6]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][7]=$larow["observaciones"];
				$lamatriz[$lii][8]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][9]=$larow["desc_mode"];
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
					r.idunidad, u.placa, u.idtipo_unidad, r.idremolque, ti.idtipo_unidad,
					 ti.desc_tipo_unid, u.serial_motor, u.serial_carroceria, u.placa, ti.desc_tipo_unid, u.observaciones, mo.desc_mode
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
				$lamatriz[$lii][1]=$larow["serial_motor"];
				$lamatriz[$lii][2]=$larow["serial_carroceria"];
				$lamatriz[$lii][3]=$larow["placa"];
				$lamatriz[$lii][4]=$larow["estatus_uni"];
				$lamatriz[$lii][5]=$larow["desc_mode"];
				
				$lamatriz[$lii][6]=$larow["observaciones"];
				$lamatriz[$lii][7]=$larow["desc_tipo_unid"];
				
				$lamatriz[$lii][8]=$larow["cedula"];
                $lamatriz[$lii][9]=$larow["nombres_per"];
                $lamatriz[$lii][10]=$larow["apellidos_per"];
                
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
		$sql      = "SELECT * FROM unidad , marca_unidad , modelo_unidad, tipo_unidad  WHERE (unidad.placa='$parametro2' and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and unidad.estatus_uni='1')";
		
	 
	 
	  $cursor=$this->ffiltro($sql);
	  $contador = 0;
	  $encontrado=false;
	  
	 if ($laRow=$this->fproximo($cursor)){
			DO
			{
			   $filas [$contador][1] = $laRow["idunidad"];
			   $filas [$contador][2] = $laRow["serial_motor"];
			   $filas [$contador][3] = $laRow["serial_carroceria"];
			   $filas [$contador][4] = $laRow["placa"];	
			   $filas [$contador][5] = $laRow["observaciones"];	
			   $filas [$contador][6] = $laRow["idmodelo_unidad"];	
			   $filas [$contador][7] = $laRow["idtipo_unidad"];	
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
		$sql      = "SELECT idunidad, placa, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";
		$cursor=$this->ffiltro($sql);
		$contador = 0;
		$encontrado=false;
	  
		if ($laRow=$this->fproximo($cursor))
		{
			DO
			{
				$filas [$contador][1] = $laRow["idunidad"];
				$filas [$contador][2] = $laRow["placa"];
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
		$sql      = "SELECT idunidad, placa, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (idunidad='$parametro1' and
		unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";

		if($parametro2!="")//por nombre
		$sql      = "SELECT idunidad, placa, desc_marc, desc_tipo_unid FROM unidad, modelo_unidad, marca_unidad, tipo_unidad WHERE (placa='$parametro2' and
		unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and estatus_uni=1)";

		$cursor=$this->ffiltro($sql);
		$contador = 0;
		$encontrado=false;
	  
		if ($laRow=$this->fproximo($cursor))
		{
			DO
			{
				$filas [$contador][1] = $laRow["idunidad"];
				$filas [$contador][2] = $laRow["placa"];
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
