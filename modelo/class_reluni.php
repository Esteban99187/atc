<?php

    require_once("class_db.php");
    
    class class_reluni extends class_db
    {
    
    private $aiidrelacion_unidad;
	private $asidestatus;
	private $asidunidad;
	private $asidunidad_tem;
	private $asplaca_uni;
	private $asnombre_mar;
	private $asidremolque;
	private $asidremolque_tem;
	private $asplaca_rem;
	private $asnombre_marrem;
	private $asnombre_tipuni;
	private $asnombre_tiprem;
	private $ascedula;
	private $asnombres_per;
	private $asapellidos_per;
	private $astelefono_corp_per;
	private $ashora_rel;
	private $asfecha_rel;
	private $ascedula_res;
	private $asnombre_res;
	private $asapellido_res;
        
	public function __construct()
	{
            $this->aiidrelacion_unidad=0;
            $this->asidestatus="";
            $this->asplaca_uni="";
            $this->asnombre_mar="";
            $this->asidunidad="";
            $this->asidunidad_tem="";
            $this->asidremolque="";
            $this->asidremolque_tem="";
            $this->asplaca_rem="";
            $this->asnombre_marrem="";
            $this->asnombre_tipuni="";
            $this->asnombre_tiprem="";
            $this->ascedula="";
            $this->asnombres_per="";
            $this->asapellidos_per="";
            $this->astelefono_corp_per="";
            $this->ashora_rel="";
            $this->asfecha_rel="";
            $this->ascedula_res="";
            $this->asnombre_res="";
            $this->asapellido_res="";
	}
		
	public function __destruct()
	{
            
	}
		
	public function fsetiidrelacion_unidad($piidrelacion_unidad)
	{
            $this->aiidrelacion_unidad=$piidrelacion_unidad;
	}
		
	public function fsetsidestatus($psidestatus)
	{
            $this->asidestatus=$psidestatus;
		
	}
	public function fsetsidunidad($psidunidad)
	{
            $this->asidunidad=$psidunidad;
		
	}
	public function fsetsidunidad_tem($psidunidad_tem)
	{
            $this->asidunidad_tem=$psidunidad_tem;
		
	}
	public function fsetsplaca_uni($psplaca_uni)
	{
            $this->asplaca_uni=$psplaca_uni;
		
	}
	public function fsetsnombre_mar($psnombre_mar)
	{
            $this->asnombre_mar=$psnombre_mar;
		
	}
	
	public function fsetsidremolque($psidremolque)
	{
            $this->asidremolque=$psidremolque;
		
	}
	public function fsetsidremolque_tem($psidremolque_tem)
	{
            $this->asidremolque_tem=$psidremolque_tem;
		
	}
	public function fsetsplaca_rem($psplaca_rem)
	{
            $this->asplaca_rem=$psplaca_rem;
		
	}
	public function fsetsnombre_marrem($psnombre_marrem)
	{
            $this->asnombre_marrem=$psnombre_marrem;
		
	}
	public function fsetsnombre_tipuni($psnombre_tipuni)
	{
            $this->asnombre_tipuni=$psnombre_tipuni;
		
	}
	public function fsetsnombre_tiprem($psnombre_tiprem)
	{
            $this->asnombre_tiprem=$psnombre_tiprem;
		
	}
	
	public function fsetscedula($pscedula)
	{
            $this->ascedula=$pscedula;
		
	}
	public function fsetsnombres_per($psnombres_per)
	{
            $this->asnombres_per=$psnombres_per;
		
	}
	public function fsetsapellidos_per($psapellidos_per)
	{
            $this->asapellidos_per=$psapellidos_per;
		
	}
	public function fsetstelefono_corp_per($pstelefono_corp_per)
	{
            $this->astelefono_corp_per=$pstelefono_corp_per;
		
	}
	
	public function fsetshora_rel($pshora_rel)
	{
            $this->ashora_rel=$pshora_rel;
		
	}
	public function fsetsfecha_rel($psfecha_rel)
	{
            $this->asfecha_rel=$psfecha_rel;
		
	}
	public function fsetscedula_res($pscedula_res)
	{
            $this->ascedula_res=$pscedula_res;
		
	}
	public function fsetsnombre_res($psnombre_res)
	{
            $this->asnombre_res=$psnombre_res;
		
	}
	public function fsetsapellido_res($psapellido_res)
	{
            $this->asapellido_res=$psapellido_res;
		
	}
		
	public function fgetiidrelacion_unidad()
	{
            return $this->aiidrelacion_unidad;
	}
		
	public function fgetsidestatus()
	{
            return $this->asidestatus;
	}
	public function fgetsidunidad()
	{
            return $this->asidunidad;
	}
	public function fgetsidunidad_tem()
	{
            return $this->asidunidad_tem;
	}
	public function fgetsplaca_uni()
	{
            return $this->asplaca_uni;
	}
	public function fgetsnombre_mar()
	{
            return $this->asnombre_mar;
	}
	
	public function fgetsidremolque()
	{
            return $this->asidremolque;
	}
	public function fgetsidremolque_tem()
	{
            return $this->asidremolque_tem;
	}
	public function fgetsplaca_rem()
	{
            return $this->asplaca_rem;
	}
	public function fgetsnombre_marrem()
	{
            return $this->asnombre_marrem;
	}
	public function fgetsnombre_tipuni()
	{
            return $this->asnombre_tipuni;
	}
	public function fgetsnombre_tiprem()
	{
            return $this->asnombre_tiprem;
	}

	public function fgetscedula()
	{
            return $this->ascedula;
	}
	public function fgetsnombres_per()
	{
            return $this->asnombres_per;
	}
	public function fgetsapellidos_per()
	{
            return $this->asapellidos_per;
	}
	public function fgetstelefono_corp_per()
	{
            return $this->astelefono_corp_per;
	}
	
	public function fgetshora_rel()
	{
            return $this->ashora_rel;
	}
	public function fgetsfecha_rel()
	{
            return $this->asfecha_rel;
	}
	public function fgetscedula_res()
	{
            return $this->ascedula_res;
	}
	public function fgetsnombre_res()
	{
            return $this->asnombre_res;
	}
	public function fgetsapellido_res()
	{
            return $this->asapellido_res;
	}
		
	public function fbuscar()
	{
			$lbenc=false;

			$lssql="select  cedula, nombres_per, apellidos_per, telefono_corp_per, estatus_reluni , date_format(fecha_hora_reluni,'%d/%m/%Y') as fecha_hora_reluni
			from relacion_unidad, persona 
			where (relacion_unidad.idconductor='$this->ascedula' and relacion_unidad.idconductor=persona.cedula)";

			$lssql1="select idunidad, placa, desc_marc, desc_tipo_unid
			from relacion_unidad, unidad, modelo_unidad, tipo_unidad, marca_unidad 
			where (relacion_unidad.idconductor='$this->ascedula' and relacion_unidad.idunidad_reluni=unidad.idunidad and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad)";

			$lssql2="select idremolque, placa_rem, desc_marc, desc_tipo_unid
			from relacion_unidad, remolque, modelo_unidad, tipo_unidad, marca_unidad where (relacion_unidad.idconductor='$this->ascedula' and relacion_unidad.idremolque_reluni=remolque.idremolque and remolque.idmodelo_unidad_rem=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and remolque.idtipo_unidad_rem=tipo_unidad.idtipo_unidad)";

			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->asidestatus=$larow["estatus_reluni"];
				$this->ascedula=$larow["cedula"];
				$this->asnombres_per=$larow["nombres_per"];
				$this->asapellidos_per=$larow["apellidos_per"];
				$this->astelefono_corp_per=$larow["telefono_corp_per"];
				$this->asfecha_rel=$larow["fecha_hora_reluni"];
				$lbenc=true;
				$this->fconectar();
				$lrtb1=$this->ffiltro($lssql1);
				if($larow1=$this->fproximo($lrtb1))
				{
					$this->asidunidad=$larow1["idunidad"];
					$this->asplaca_uni=$larow1["placa"];
					$this->asnombre_mar=$larow1["desc_marc"];
					$this->asnombre_tipuni=$larow1["desc_tipo_unid"];
					$lbenc=true;
				}
				$this->fconectar();
				$lrtb2=$this->ffiltro($lssql2);
				if($larow2=$this->fproximo($lrtb2))
				{
					$this->asidremolque=$larow2["idremolque"];
					$this->asplaca_rem=$larow2["placa_rem"];
					$this->asnombre_marrem=$larow2["desc_marc"];
					$this->asnombre_tiprem=$larow2["desc_tipo_unid"];
					$lbenc=true;
				}
			}
			$this->fcierrafiltro($lrtb);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','Relacionunidad','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			
			$this->fdesconectar();
			return $lbenc;
	}
	public function fbuscar2()
	{
            $lbenc=false;
            $lssql="select * from  unidad, tipo_unidad, marca_unidad, modelo_unidad where (unidad.idunidad='$this->asidunidad'  and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad and unidad.idmodelo_unidad=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and unidad.estatus_uni='1'  )";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->asidunidad=$larow["idunidad"];
                $this->asplaca_uni=$larow["placa"];
                $this->asnombre_mar=$larow["desc_marc"];
                $this->asnombre_tipuni=$larow["desc_tipo_unid"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
	public function fbuscar1()
	{
            $lbenc=false;
            $lssql="select * from  remolque, tipo_unidad, marca_unidad, modelo_unidad where (remolque.idremolque='$this->asidremolque'  and remolque.idtipo_unidad_rem=tipo_unidad.idtipo_unidad and remolque.idmodelo_unidad_rem=modelo_unidad.idmodelo_unidad and modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad and remolque.estatus_rem='1')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->asidremolque=$larow["idremolque"];
                $this->asplaca_rem=$larow["placa_rem"];
                $this->asnombre_marrem=$larow["desc_marc"];
                $this->asnombre_tiprem=$larow["desc_tipo_unid"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
	public function fbuscar3()
	{
            $lbenc=false;
            $lssql="select * from  persona where (persona.cedula='$this->ascedula'  and persona.cod_rol='9' and persona.estatus_per='1')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->ascedula=$larow["cedula"];
                $this->asnombres_per=$larow["nombres_per"];
                $this->asapellidos_per=$larow["apellidos_per"];
                $this->astelefono_corp_per=$larow["telefono_corp_per"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
		
	public function fincluir()
        {
            $lbhecho=false;
            $this->fconectar();
            $this->fbegin();
			if (empty($this->asidunidad) && empty($this->asidremolque))
			{
				$lssql="insert into relacion_unidad(idconductor,estatus_reluni,idunidad_reluni,idremolque_reluni,fecha_hora_reluni)values('$this->ascedula','$this->asidestatus',NULL,NULL,'$this->ashora_rel')";
				$lbhecho=$this->fejecutar($lssql);
			}
			else if (empty($this->asidunidad))
			{
				$lssql="insert into relacion_unidad(idconductor,estatus_reluni,idunidad_reluni,idremolque_reluni,fecha_hora_reluni)values('$this->ascedula','$this->asidestatus',NULL,'$this->asidremolque','$this->ashora_rel')";
				$lbhecho=$this->fejecutar($lssql);
			}
			else if (empty($this->asidremolque))
            {
				$lssql="insert into relacion_unidad(idconductor,estatus_reluni,idunidad_reluni,idremolque_reluni,fecha_hora_reluni)values('$this->ascedula','$this->asidestatus','$this->asidunidad',NULL,'$this->ashora_rel')";
				$lbhecho=$this->fejecutar($lssql);
			}
			else
			{
				$lssql="insert into relacion_unidad(idconductor,estatus_reluni,idunidad_reluni,idremolque_reluni,fecha_hora_reluni)values('$this->ascedula','$this->asidestatus','$this->asidunidad','$this->asidremolque','$this->ashora_rel')";
				$lbhecho=$this->fejecutar($lssql);
			}
            if ($lbhecho)
			{
				if (!empty($this->asidunidad))
				{
					$lssql="update unidad set estatus_uni='2'  where (idunidad='$this->asidunidad')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			if ($lbhecho)
			{
				if (!empty($this->asidremolque))
				{
					$lssql="update remolque set estatus_rem='2'  where (idremolque='$this->asidremolque')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			if ($lbhecho)
			{				
				if ('$this->ascedula'!="0")
				{
					$lssql="update persona set estatus_per='2'  where (cedula='$this->ascedula')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			
				//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','Relacionunidad','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
	}
	    
public function fmodificar()
	{
			$lbhecho=false;
			$this->fconectar();
			$this->fbegin();
			$lssql="update unidad, relacion_unidad set estatus_uni='1'  where (idconductor='$this->ascedula' and relacion_unidad.idunidad_reluni=unidad.idunidad)";
			$lbhecho=$this->fejecutar($lssql);

			$lssql2="update remolque, relacion_unidad set estatus_rem='1'  where (idconductor='$this->ascedula' and relacion_unidad.idremolque_reluni=remolque.idremolque)";
			$lbhecho2=$this->fejecutar($lssql2);


			$lbhecho=true;

			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			if ($lbhecho)
			{
				if (empty($this->asidunidad) && empty($this->asidremolque))
				{
					$lssql="update relacion_unidad set estatus_reluni='$this->asidestatus', idunidad_reluni= NULL, idremolque_reluni= NULL where (idconductor='$this->ascedula')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
				else if (empty($this->asidunidad))
				{
					$lssql="update relacion_unidad set estatus_reluni='$this->asidestatus', idunidad_reluni= NULL, idremolque_reluni='$this->asidremolque' where (idconductor='$this->ascedula')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
				else if (empty($this->asidremolque))
				{
					$lssql="update relacion_unidad set estatus_reluni='$this->asidestatus', idunidad_reluni='$this->asidunidad', idremolque_reluni= NULL where (idconductor='$this->ascedula')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
				else  
				{
					$lssql="update relacion_unidad set estatus_reluni='$this->asidestatus', idunidad_reluni='$this->asidunidad', idremolque_reluni='$this->asidremolque' where (idconductor='$this->ascedula')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			if ($lbhecho)
			{
				if (!empty($this->asidunidad))
				{
					$lssql="update unidad set estatus_uni='2'  where (idunidad='$this->asidunidad')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			if ($lbhecho)
			{				
				if (!empty($this->asidremolque))
				{
					$lssql="update remolque set estatus_rem='2'  where (idremolque='$this->asidremolque')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
			
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','Relacionunidad','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
	}
	public function feliminar()
	{
            $lbhecho=false;
            $lssql="delete from relacion_unidad where (idrelacion_unidad='$this->aiidrelacion_unidad')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Elimino Registro','Relacionunidad','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function flistarpdf()
        {
            $lamatriz=array();
            $lii=0;
           $lssql="select * from relacion_unidad,persona,unidad,remolque,tipo_unidad,rol
           where (relacion_unidad.idconductor='$this->aiidrelacion_unidad' 
           and  relacion_unidad.idunidad_reluni=unidad.idunidad
           and  relacion_unidad.idremolque_reluni=remolque.idremolque
           and unidad.idtipo_unidad=tipo_unidad.idtipo_unidad
           and remolque.idtipo_unidad_rem=tipo_unidad.idtipo_unidad
           and persona.cod_rol=rol.cod_rol
           and relacion_unidad.idconductor=persona.cedula)";
           
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["fecha_hora_reluni"];
                $lamatriz[$lii][1]=$larow["idconductor"];
                $lamatriz[$lii][2]=$larow["nombres_per"];
                $lamatriz[$lii][3]=$larow["apellidos_per"];
                $lamatriz[$lii][4]=$larow["idunidad_reluni"];
                $lamatriz[$lii][5]=$larow["desc_tipo_unid"];
                $lamatriz[$lii][6]=$larow["placa"];
                $lamatriz[$lii][7]=$larow["serial_carroceria"];
                $lamatriz[$lii][8]=$larow["serial_motor"];
                $lamatriz[$lii][9]=$larow["idremolque_reluni"];
                $lamatriz[$lii][10]=$larow["placa_rem"];
                $lamatriz[$lii][11]=$larow["serial_rem"];
                
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}	
		
		
		
		
		
		
		
	public function flistar()
        {
            $lamatriz=array();
            $lii=0;
            $lssql="select r.idrelacion_unidad, r.fecha_rel, r.cedula_res, r.nombre_res, r.apellido_res, r.cedula, p.nombres_per, p.apellidos_per, p.cod_rol,
					r.idunidad, u.placa, u.idtipo_unidad, r.idremolque, re.placa_rem, re.idtipo_unidad_rem, ro.cod_rol, ro.nombre_rol, ti.idtipo_unidad,
					 ti.desc_tipo_unid
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												inner join remolque as re
												inner join tipo_unidad as ti
												inner join rol as ro
												where (r.idunidad=u.idunidad) and (r.idremolque=re.idremolque) and (u.idtipo_unidad=ti.idtipo_unidad)
												and (re.idtipo_unidad_rem=ti.idtipo_unidad) and (r.cedula=p.cedula) and (p.cod_rol=ro.cod_rol)";
												
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idrelacion_unidad"];
                $lamatriz[$lii][1]=$larow["fecha_rel"];
                $lamatriz[$lii][2]=$larow["cedula_res"];
                $lamatriz[$lii][3]=$larow["nombre_res"];
                $lamatriz[$lii][4]=$larow["apellido_res"];
                $lamatriz[$lii][5]=$larow["cedula"];
                $lamatriz[$lii][6]=$larow["nombres_per"];
                $lamatriz[$lii][7]=$larow["apellidos_per"];
                $lamatriz[$lii][8]=$larow["nombre_rol"];
                $lamatriz[$lii][9]=$larow["idunidad"];
                $lamatriz[$lii][10]=$larow["placa"];
                $lamatriz[$lii][11]=$larow["desc_tipo_unid"];
                $lamatriz[$lii][12]=$larow["idremolque"];
                $lamatriz[$lii][13]=$larow["placa_rem"];
                $lamatriz[$lii][14]=$larow["desc_tipo_unid"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
		
	public function fnuevo()
        {
            $lssql="select max(idrelacion_unidad) as mayor from relacion_unidad";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $liaux=$larow["mayor"]+1;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $liaux;
	}
	    	public function CatalogoReluni()
		{
			$this->fconectar();
			$sql      = "SELECT IdVRelcon, nombre_vrc, apellido_vrc, telefono_vrc, correo_vrc, idunidad_vru, placa_vru, idremolque_vrr, placa_vrr  FROM VRelcon, VReluni, VRelrem WHERE VRelcon.IdVRelcon=VReluni.IdVReluni  and  VRelcon.IdVRelcon=VRelrem.IdVRelrem and estatus_reluni='activa'";
			
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVRelcon"];
					$filas [$contador][2] = $laRow["nombre_vrc"];
					$filas [$contador][3] = $laRow["apellido_vrc"];
					$filas [$contador][4] = $laRow["telefono_vrc"];
					$filas [$contador][5] = $laRow["correo_vrc"];
					$filas [$contador][6] = $laRow["idunidad_vru"];
					$filas [$contador][7] = $laRow["placa_vru"];
					$filas [$contador][8] = $laRow["idremolque_vrr"];
					$filas [$contador][9] = $laRow["placa_vrr"];
					
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
		
		public function BuscaReluni($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT IdVRelcon, nombre_vrc, apellido_vrc, telefono_vrc, correo_vrc, idunidad_vru, placa_vru, idremolque_vrr, placa_vrr  FROM VRelcon, VReluni, VRelrem WHERE (VRelcon.IdVRelcon='$parametro1' and VRelcon.IdVRelcon=VReluni.IdVReluni  and  VRelcon.IdVRelcon=VRelrem.IdVRelrem and estatus_reluni='activa')";

			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVRelcon"];
					$filas [$contador][2] = $laRow["nombre_vrc"];
					$filas [$contador][3] = $laRow["apellido_vrc"];
					$filas [$contador][4] = $laRow["telefono_vrc"];
					$filas [$contador][5] = $laRow["correo_vrc"];
					$filas [$contador][6] = $laRow["idunidad_vru"];
					$filas [$contador][7] = $laRow["placa_vru"];
					$filas [$contador][8] = $laRow["idremolque_vrr"];
					$filas [$contador][9] = $laRow["placa_vrr"];
					
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
