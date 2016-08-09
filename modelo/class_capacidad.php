<?php

    require_once("class_db.php");
    class class_capacidad extends class_db
    {
        private $aiidcapacidad;
		private $ascapacidad;
        private $asidunidad_medida;
        
	public function __construct()
	{
            $this->aiidcapacidad=0;
            $this->ascapacidad="";
            $this->asidunidad_medida="";
	}
		
	public function __destruct()
	{
	
        }
		
	public function fsetiidcapacidad($piidcapacidad)
	{
            $this->aiidcapacidad=$piidcapacidad;
	}
		
	public function fsetscapacidad($pscapacidad)
	{
            $this->ascapacidad=$pscapacidad;
			
	}
		
	public function fsetsidunidad_medida($psidunidad_medida)
	{
            $this->asidunidad_medida=$psidunidad_medida;
	}
		
	public function fgetiidcapacidad()
	{
            return $this->aiidcapacidad;
	}
		
	public function fgetscapacidad()
	{
            return $this->ascapacidad;
	}
		
	public function fgetsidunidad_medida()
	{
            return $this->asidunidad_medida;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select c.capacidad, uni.desc_unid_medi
             from capacidad as c
             inner join unidad_medida as uni
             where (c.idunidad_medida=uni.idunidad_medida)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
        $this->aiidcapacidad=$larow["idcapacidad"];
		$this->ascapacidad=$larow["capacidad"];
		$this->asidunidad_medida=$larow["idunidad_medida"];
		$lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
	
	public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from capacidad where (capacidad='$this->ascapacidad')";
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
            $lssql="insert into capacidad (capacidad,idunidad_medida) values ('$this->ascapacidad','$this->asidunidad_medida')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update capacidad set capacidad='$this->ascapacidad', idunidad_medida='$this->asidunidad_medida' where (idcapacidad='$this->aiidcapacidad')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
            $lssql="update capacidad set estatus_cap='0' where (idcapacidad='$this->aiidcapacidad')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	
	public function factivar()
		{
			$lbhecho=false;
			$lssql="update capacidad set estatus_cap='1' where (idcapacidad='$this->aiidcapacidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from capacidad, unidad_medida where(capacidad.idunidad_medida=unidad_medida.idunidad_medida) order by idcapacidad";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idcapacidad"];
				$lamatriz[$lii][1]=$larow["capacidad"];
				$lamatriz[$lii][2]=$larow["idunidad_medida"];
				$lamatriz[$lii][3]=$larow["desc_unid_medi"];
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
				$lssql="select * from capacidad, unidad_medida where estatus_cap='1' and (capacidad.idunidad_medida=unidad_medida.idunidad_medida) order by idcapacidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idcapacidad"];
					$lamatriz[$lii][1]=$larow["capacidad"];
					$lamatriz[$lii][3]=$larow["desc_unid_medi"];
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
				$lssql="select * from capacidad, unidad_medida where estatus_cap='0' and (capacidad.idunidad_medida=unidad_medida.idunidad_medida) order by idcapacidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idcapacidad"];
					$lamatriz[$lii][1]=$larow["capacidad"];
					$lamatriz[$lii][3]=$larow["desc_unid_medi"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
	
	public function fnuevo()
	{
            $lssql="select max(idcapacidad) as mayor from capacidad";
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
        
   public function flistadocapacidad($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM capacidad  WHERE (idcapacidad='$parametro1' and eliminado='0' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM capacidad  WHERE (capacidad='$parametro2' and eliminado='0' )";
		  
			
			
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idcapacidad"];
				   $filas [$contador][2] = $laRow["capacidad"];		
				   $filas [$contador][3] = $laRow["idunidad_medida"];		
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
		 public function flistadocapacidad1($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM capacidad,unidad_medida  WHERE (idcapacidad='$parametro1' and capacidad.idunidad_medida=unidad_medida.idunidad_medida )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM capacidad,unidad_medida  WHERE (capacidad='$parametro2' and capacidad.idunidad_medida=unidad_medida.idunidad_medida )";
		  
			
			
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idcapacidad"];
				   $filas [$contador][2] = $laRow["capacidad"];		
				   $filas [$contador][3] = $laRow["idunidad_medida"];		
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
