<?php

    require_once("class_db.php");
    class class_tipo_unidad extends class_db
    {
        private $aiidtipo_unidad;
		private $asdesc_tipo_unid;
        private $asidcapacidad;
        
	public function __construct()
	{
            $this->aiidtipo_unidad=0;
            $this->asdesc_tipo_unid="";
            $this->asidcapacidad="";
	}
		
	public function __destruct()
	{
	
        }
		
	public function fsetiidtipo_unidad($piidtipo_unidad)
	{
            $this->aiidtipo_unidad=$piidtipo_unidad;
	}
		
	public function fsetsdesc_tipo_unid($psdesc_tipo_unid)
	{
            $this->asdesc_tipo_unid=$psdesc_tipo_unid;
			
	}
		
	public function fsetsidcapacidad($psidcapacidad)
	{
            $this->asidcapacidad=$psidcapacidad;
	}
		
	public function fgetiidtipo_unidad()
	{
            return $this->aiidtipo_unidad;
	}
		
	public function fgetsdesc_tipo_unid()
	{
            return $this->asdesc_tipo_unid;
	}
		
	public function fgetsidcapacidad()
	{
            return $this->asidcapacidad;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select idtipo_unidad, desc_tipo_unid, idcapacidad from tipo_unidad where (idtipo_unidad='$this->aiidtipo_unidad')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $this->aiidtipo_unidad=$larow["idtipo_unidad"];
		$this->asdesc_tipo_unid=$larow["desc_tipo_unid"];
		$this->asidcapacidad=$larow["idcapacidad"];
		$lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
	public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_unidad where (desc_tipo_unid='$this->asdesc_tipo_unid')";
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
            $lssql="insert into tipo_unidad (idtipo_unidad,desc_tipo_unid,idcapacidad) values ('$this->aiidtipo_unidad','$this->asdesc_tipo_unid','$this->asidcapacidad')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update tipo_unidad set desc_tipo_unid='$this->asdesc_tipo_unid', idcapacidad='$this->asidcapacidad' where (idtipo_unidad='$this->aiidtipo_unidad')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
             $lssql="update tipo_unidad set estatus_tipuni='0' where (idtipo_unidad='$this->aiidtipo_unidad')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_unidad set estatus_tipuni='1' where (idtipo_unidad='$this->aiidtipo_unidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from tipo_unidad, capacidad  where (tipo_unidad.idcapacidad=capacidad.idcapacidad)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idtipo_unidad"];
				$lamatriz[$lii][1]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][2]=$larow["capacidad"];
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
				$lssql="select * from tipo_unidad, capacidad where estatus_tipuni='1' and (tipo_unidad.idcapacidad=capacidad.idcapacidad) order by idtipo_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_unidad"];
					$lamatriz[$lii][1]=$larow["desc_tipo_unid"];
					$lamatriz[$lii][2]=$larow["capacidad"];
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
				$lssql="select * from tipo_unidad,capacidad where estatus_tipuni='0' and (tipo_unidad.idcapacidad=capacidad.idcapacidad) order by idtipo_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_unidad"];
					$lamatriz[$lii][1]=$larow["desc_tipo_unid"];
					$lamatriz[$lii][2]=$larow["capacidad"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
	
	public function fnuevo()
	{
            $lssql="select max(idtipo_unidad) as mayor from tipo_unidad";
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
        
   public function flistadotipo_unidad($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_unidad  WHERE (idtipo_unidad='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_unidad  WHERE (desc_tipo_unid='$parametro2' )";
		  
			
			
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_unidad"];
				   $filas [$contador][2] = $laRow["desc_tipo_unid"];	
				   $filas [$contador][3] = $laRow["idcapacidad"];		
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
		public function CatalogoTipoUnidad()
		{
			$this->fconectar();
			$sql      = "SELECT  idtipo_unidad, desc_tipo_unid, capacidad, desc_unid_medi    FROM tipo_unidad, capacidad, unidad_medida WHERE tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idtipo_unidad"];
					$filas [$contador][2] = $laRow["desc_tipo_unid"];
					$filas [$contador][3] = $laRow["capacidad"];
					$filas [$contador][4] = $laRow["desc_unid_medi"];
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
