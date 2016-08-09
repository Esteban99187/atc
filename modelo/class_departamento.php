<?php

    require_once("class_db.php");
	class class_departamento extends class_db
	{
			private $aiiddepartamento;
			private $asdesc_depa;
			private $astele_depa;
			
		public function __construct()
		{
			$this->aiiddepartamento=0;
			$this->asdesc_depa="";
			$this->astele_depa="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiiddepartamento($piiddepartamento)
		{
				$this->aiiddepartamento=$piiddepartamento;
		}
			
		public function fsetsdesc_depa($psdesc_depa)
		{
				$this->asdesc_depa=$psdesc_depa;
			
		}
		public function fsetstele_depa($pstele_depa)
		{
				$this->astele_depa=$pstele_depa;
			
		}
			
		public function fgetiiddepartamento()
		{
				return $this->aiiddepartamento;
		}
			
		public function fgetsdesc_depa()
		{
				return $this->asdesc_depa;
		}
		public function fgetstele_depa()
		{
				return $this->astele_depa;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from departamento where (iddepartamento='$this->aiiddepartamento')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiiddepartamento=$larow["iddepartamento"];
					$this->asdesc_depa=$larow["desc_depa"];
					$this->astele_depa=$larow["tele_depa"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from departamento where (desc_depa='$this->asdesc_depa')";
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
				$lssql="insert into departamento (desc_depa,tele_depa)values('$this->asdesc_depa','$this->astele_depa')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update departamento set desc_depa='$this->asdesc_depa',tele_depa='$this->astele_depa' where (iddepartamento='$this->aiiddepartamento')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update departamento set estatus_dep='0' where (iddepartamento='$this->aiiddepartamento')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update departamento set estatus_dep='1' where (iddepartamento='$this->aiiddepartamento')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from departamento order by iddepartamento";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["iddepartamento"];
					$lamatriz[$lii][1]=$larow["desc_depa"];
					$lamatriz[$lii][2]=$larow["tele_depa"];
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
				$lssql="select * from departamento where estatus_dep='1' order by iddepartamento";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["iddepartamento"];
					$lamatriz[$lii][1]=$larow["desc_depa"];
					$lamatriz[$lii][2]=$larow["tele_depa"];
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
				$lssql="select * from departamento where estatus_dep='0' order by iddepartamento";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["iddepartamento"];
					$lamatriz[$lii][1]=$larow["desc_depa"];
					$lamatriz[$lii][2]=$larow["tele_depa"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
			
		public function fnuevo()
			{
				$lssql="select max(iddepartamento) as mayor from departamento";
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
			
   public function flistadodepartamento($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM departamento  WHERE (iddepartamento='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM departamento  WHERE (desc_depa='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["iddepartamento"];
				   $filas [$contador][2] = $laRow["desc_depa"];	
				   $filas [$contador][3] = $laRow["tele_depa"];	
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
