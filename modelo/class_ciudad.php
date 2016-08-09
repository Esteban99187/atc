<?php
    require_once("class_db.php");
    class class_ciudad extends class_db
    {
        private $aiidciudad;
		private $asdesc_ciud;
        private $asidparroquia;
        private $asidmunicipio;
        private $asidestado;
        private $asidpais;
        private $ascodi_posta_ciu;
        private $asestatus_ciu;
        
	public function __construct()
	{
            $this->aiidciudad=0;
            $this->asdesc_ciud="";
            $this->asidparroquia="";
            $this->asidmunicipio="";
            $this->asidestado="";
            $this->asidpais="";
            $this->ascodi_posta_ciu="";
            $this->asestatus_ciu="";
	}
		
	public function __destruct()
	{
	
        }
		
	public function fsetiidciudad($piidciudad)
	{
            $this->aiidciudad=$piidciudad;
	}
		
	public function fsetsdesc_ciud($psdesc_ciud)
	{
            $this->asdesc_ciud=$psdesc_ciud;
			
	}
		
	public function fsetsidparroquia($psidparroquia)
	{
            $this->asidparroquia=$psidparroquia;
	}
	public function fsetsidmunicipio($psidmunicipio)
	{
            $this->asidmunicipio=$psidmunicipio;
	}
	public function fsetsidestado($psidestado)
	{
            $this->asidestado=$psidestado;
	}
	public function fsetsidpais($psidpais)
	{
            $this->asidpais=$psidpais;
	}
	public function fsetscodi_posta_ciu($pscodi_posta_ciu)
	{
            $this->ascodi_posta_ciu=$pscodi_posta_ciu;
	}
	public function fsetsestatus_ciu($psestatus_ciu)
	{
            $this->asestatus_ciu=$psestatus_ciu;
	}
		
	public function fgetiidciudad()
	{
            return $this->aiidciudad;
	}
		
	public function fgetsdesc_ciud()
	{
            return $this->asdesc_ciud;
	}
		
	public function fgetsidparroquia()
	{
            return $this->asidparroquia;
	}
	public function fgetsidmunicipio()
	{
            return $this->asidmunicipio;
	}
	public function fgetsidestado()
	{
            return $this->asidestado;
	}
	public function fgetsidpais()
	{
            return $this->asidpais;
	}
	public function fgetscodi_posta_ciu()
	{
            return $this->ascodi_posta_ciu;
	}
	public function fgetsestatus_ciu()
	{
            return $this->asestatus_ciu;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select idciudad, desc_ciud, estatus_ciu, ciudad.idparroquia, codi_posta_ciu, parroquia.idmunicipio, municipio.idestado, estado.idpais from ciudad, parroquia, municipio, estado, pais where (idciudad='$this->aiidciudad' and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $this->aiidciudad=$larow["idciudad"];
				$this->asdesc_ciud=$larow["desc_ciud"];
				$this->asidparroquia=$larow["idparroquia"];
				$this->asidmunicipio=$larow["idmunicipio"];
				$this->asidestado=$larow["idestado"];
				$this->asidpais=$larow["idpais"];
				$this->ascodi_posta_ciu=$larow["codi_posta_ciu"];
				$this->asestatus_ciu=$larow["estatus_ciu"];
				$lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
		
		public function fverificarexistencia()
			{
				$lbenc=false;
				$lssql="select * from ciudad where (desc_ciud='$this->asdesc_ciud' and idparroquia='$this->asidparroquia')";
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
            $lssql="insert into ciudad (desc_ciud,idparroquia,codi_posta_ciu) values ('$this->asdesc_ciud','$this->asidparroquia','$this->ascodi_posta_ciu')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
		}
	    
	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update ciudad set desc_ciud='$this->asdesc_ciud', idparroquia='$this->asidparroquia', codi_posta_ciu='$this->ascodi_posta_ciu' where (idciudad='$this->aiidciudad')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
			$lssql="update ciudad set estatus_ciu='0' where (idciudad='$this->aiidciudad')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}

	public function factivar()
		{
			$lbhecho=false;
			$lssql="update ciudad set estatus_ciu='1' where (idciudad='$this->aiidciudad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from ciudad, parroquia where ciudad.idparroquia=parroquia.idparroquia order by idciudad";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idciudad"];
				$lamatriz[$lii][1]=$larow["desc_ciud"];
				$lamatriz[$lii][2]=$larow["desc_esta"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	
	public function fnuevo()
	{
            $lssql="select max(idciudad) as mayor from ciudad";
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
	
	public function flistarpdf()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from ciudad, parroquia, municipio, estado, pais where ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais order by idciudad";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idciudad"];
				$lamatriz[$lii][1]=$larow["desc_ciud"];
				$lamatriz[$lii][2]=$larow["desc_parr"];
				$lamatriz[$lii][3]=$larow["desc_muni"];
				$lamatriz[$lii][4]=$larow["desc_esta"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	public function flistaractvos()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from ciudad, parroquia, municipio, estado, pais where (estatus_ciu='1') and (ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)order by idciudad asc";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idciudad"];
				$lamatriz[$lii][1]=$larow["desc_ciud"];
				$lamatriz[$lii][2]=$larow["desc_parr"];
				$lamatriz[$lii][3]=$larow["desc_muni"];
				$lamatriz[$lii][4]=$larow["desc_esta"];
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
            $lssql="select * from ciudad, parroquia, municipio, estado, pais where (estatus_ciu='0') and (ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)order by idciudad asc";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idciudad"];
				$lamatriz[$lii][1]=$larow["desc_ciud"];
				$lamatriz[$lii][2]=$larow["desc_parr"];
				$lamatriz[$lii][3]=$larow["desc_muni"];
				$lamatriz[$lii][4]=$larow["desc_esta"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	        
     public function flistadociudad($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM ciudad,estado  WHERE (idciudad='$parametro1 ')";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM ciudad, estado  WHERE (desc_ciud='$parametro2')";
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idciudad"];
				   $filas [$contador][2] = $laRow["desc_ciud"];	
				   $filas [$contador][3] = $laRow["codi_posta_ciu"];		
				   $filas [$contador][4] = $laRow["idparroquia"];		
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
