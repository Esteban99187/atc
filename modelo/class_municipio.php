<?php

    require_once("class_db.php");
    class class_municipio extends class_db
    {
        private $aiidmunicipio;
		private $asdesc_muni;
        private $asidestado;
        private $asidpais;
        private $asestatus_mun;
        
	public function __construct()
	{
            $this->aiidmunicipio=0;
            $this->asdesc_muni="";
            $this->asidestado="";
            $this->asidpais="";
            $this->asestatus_mun="";
	}
		
	public function __destruct()
	{
	
        }
		
	public function fsetiidmunicipio($piidmunicipio)
	{
            $this->aiidmunicipio=$piidmunicipio;
	}
		
	public function fsetsdesc_muni($psdesc_muni)
	{
            $this->asdesc_muni=$psdesc_muni;
			
	}
		
	public function fsetsidestado($psidestado)
	{
            $this->asidestado=$psidestado;
	}
	public function fsetsidpais($psidpais)
	{
            $this->asidpais=$psidpais;
	}
	public function fsetsestatus_mun($psestatus_mun)
	{
            $this->asestatus_mun=$psestatus_mun;
	}
		
	public function fgetiidmunicipio()
	{
            return $this->aiidmunicipio;
	}
		
	public function fgetsdesc_muni()
	{
            return $this->asdesc_muni;
	}
		
	public function fgetsidestado()
	{
            return $this->asidestado;
	}
	public function fgetsidpais()
	{
            return $this->asidpais;
	}
	public function fgetsestatus_mun()
	{
            return $this->asestatus_mun;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select *, idmunicipio, desc_muni, estatus_mun, municipio.idestado from municipio, estado where (idmunicipio='$this->aiidmunicipio' and  municipio.idestado=estado.idestado)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $this->aiidmunicipio=$larow["idmunicipio"];
				$this->asdesc_muni=$larow["desc_muni"];
				$this->asidestado=$larow["idestado"];
				$this->asidpais=$larow["idpais"];
				$this->asestatus_mun=$larow["estatus_mun"];
				$lbenc=true;
						
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
				public function fverificarexistencia()
			{
				$lbenc=false;
				$lssql="select * from municipio where (desc_muni='$this->asdesc_muni' and idestado='$this->asidestado')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
					{
						$lbenc=true;
					}
				else
					{
						$lbenc=false;
					}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
			}
	public function fincluir()
        {
            $lbhecho=false;
            $this->fconectar();
            $lssql="insert into municipio (idmunicipio,desc_muni,estatus_mun,idestado) values ('$this->aiidmunicipio','$this->asdesc_muni','1','$this->asidestado')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update municipio set desc_muni='$this->asdesc_muni', idestado='$this->asidestado' where (idmunicipio='$this->aiidmunicipio')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
			$lssql="update municipio set estatus_mun='0' where (idmunicipio='$this->aiidmunicipio')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	public function factivar()
		{
			$lbhecho=false;
			$lssql="update municipio set estatus_mun='1' where (idmunicipio='$this->aiidmunicipio')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}		
	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select m.idmunicipio, m.desc_muni, e.idestado, e.desc_esta
												from municipio as m
												inner join estado  as e
												where (m.idestado=e.idestado)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idmunicipio"];
		$lamatriz[$lii][1]=$larow["desc_muni"];
		$lamatriz[$lii][2]=$larow["idestado"];
		$lamatriz[$lii][3]=$larow["desc_esta"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	
	public function fnuevo()
	{
            $lssql="select max(idmunicipio) as mayor from municipio";
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
        
    public function flistadomunicipio($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM municipio,estado  WHERE (idmunicipio='$parametro1 ')";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM municipio, estado  WHERE (desc_muni='$parametro2')";
		  
			
			
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idmunicipio"];
				   $filas [$contador][2] = $laRow["desc_muni"];	
				   $filas [$contador][3] = $laRow["idestado"];		
				   $filas [$contador][4] = $laRow["idpais"];		
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
		
		
			public function flistaractvos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select m.idmunicipio, m.desc_muni, e.idestado, e.desc_esta
												from municipio as m
												inner join estado  as e
								where (estatus_mun='1') and (m.idestado=e.idestado)" ;
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
                $lamatriz[$lii][0]=$larow["idmunicipio"];
		$lamatriz[$lii][1]=$larow["desc_muni"];
		$lamatriz[$lii][2]=$larow["idestado"];
		$lamatriz[$lii][3]=$larow["desc_esta"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function flistainactivos()
			{
				$lamatriz=array();
				$lii=0;
				            $lssql="select m.idmunicipio, m.desc_muni, e.idestado, e.desc_esta
												from municipio as m
												inner join estado  as e
								where (estatus_mun='0') and (m.idestado=e.idestado)" ;
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
                $lamatriz[$lii][0]=$larow["idmunicipio"];
				$lamatriz[$lii][1]=$larow["desc_muni"];
				$lamatriz[$lii][2]=$larow["idestado"];
				$lamatriz[$lii][3]=$larow["desc_esta"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
			
    }
    
?>
