<?php

    require_once("class_db.php");
    class class_modelo_unidad extends class_db
    {
        private $aiidmodelo_unidad;
		private $asdesc_mode;
        private $asidmarca_unidad;
        private $asano_mode;
        
	public function __construct()
	{
            $this->aiidmodelo_unidad=0;
            $this->asdesc_mode="";
            $this->asidmarca_unidad="";
            $this->asano_mode="";
	}
		
	public function __destruct()
	{
	
        }
		
	public function fsetiidmodelo_unidad($piidmodelo_unidad)
	{
            $this->aiidmodelo_unidad=$piidmodelo_unidad;
	}
		
	public function fsetsdesc_mode($psdesc_mode)
	{
            $this->asdesc_mode=$psdesc_mode;
			
	}
		
	public function fsetsidmarca_unidad($psidmarca_unidad)
	{
            $this->asidmarca_unidad=$psidmarca_unidad;
	}
	public function fsetsano_mode($psano_mode)
	{
            $this->asano_mode=$psano_mode;
	}
		
	public function fgetiidmodelo_unidad()
	{
            return $this->aiidmodelo_unidad;
	}
		
	public function fgetsdesc_mode()
	{
            return $this->asdesc_mode;
	}
		
	public function fgetsidmarca_unidad()
	{
            return $this->asidmarca_unidad;
	}
	public function fgetsano_mode()
	{
            return $this->asano_mode;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select idmodelo_unidad, desc_mode, idmarca_unidad, ano_mode from modelo_unidad where (idmodelo_unidad='$this->aiidmodelo_unidad')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $this->aiidmodelo_unidad=$larow["idmodelo_unidad"];
		$this->asdesc_mode=$larow["desc_mode"];
		$this->asidmarca_unidad=$larow["idmarca_unidad"];
		$this->asano_mode=$larow["ano_mode"];
		$lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
		
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from modelo_unidad where (desc_mode='$this->asdesc_mode')";
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
            $lssql="insert into modelo_unidad (idmodelo_unidad,desc_mode,idmarca_unidad,ano_mode) values ('$this->aiidmodelo_unidad','$this->asdesc_mode','$this->asidmarca_unidad','$this->asano_mode')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update modelo_unidad set desc_mode='$this->asdesc_mode', idmarca_unidad='$this->asidmarca_unidad', ano_mode='$this->asano_mode' where (idmodelo_unidad='$this->aiidmodelo_unidad')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
             $lssql="update modelo_unidad set estatus_moduni='0' where (idmodelo_unidad='$this->aiidmodelo_unidad')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update modelo_unidad set estatus_moduni='1' where (idmodelo_unidad='$this->aiidmodelo_unidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from modelo_unidad, marca_unidad where (modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad) order by idmodelo_unidad";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idmodelo_unidad"];
				$lamatriz[$lii][1]=$larow["desc_mode"];
				$lamatriz[$lii][2]=$larow["ano_mode"];
				$lamatriz[$lii][3]=$larow["idmarca_unidad"];
				$lamatriz[$lii][4]=$larow["desc_marc"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	
	public function flistaractivos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from modelo_unidad, marca_unidad where estatus_moduni='1' and (modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad) order by idmodelo_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idmodelo_unidad"];
					$lamatriz[$lii][1]=$larow["desc_mode"];
					$lamatriz[$lii][2]=$larow["desc_marc"];
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
				$lssql="select * from modelo_unidad, marca_unidad where estatus_moduni='0' and (modelo_unidad.idmarca_unidad=marca_unidad.idmarca_unidad) order by idmodelo_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idmodelo_unidad"];
					$lamatriz[$lii][1]=$larow["desc_mode"];
					$lamatriz[$lii][2]=$larow["desc_marc"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
	
	public function fnuevo()
	{
            $lssql="select max(idmodelo_unidad) as mayor from modelo_unidad";
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
        
    public function flistadomodelo_unidad($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM modelo_unidad  WHERE (idmodelo_unidad='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM modelo_unidad  WHERE (desc_mode='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idmodelo_unidad"];
				   $filas [$contador][2] = $laRow["desc_mode"];	
				   $filas [$contador][3] = $laRow["ano_mode"];	
				   $filas [$contador][4] = $laRow["idmarca_unidad"];	
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
