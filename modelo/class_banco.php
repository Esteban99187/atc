<?php

    require_once("class_db.php");
	class class_banco extends class_db
	{
			private $aiidbanco;
			private $asdesc_banc;
			
		public function __construct()
		{
			$this->aiidbanco=0;
			$this->asdesc_banc="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidbanco($piidbanco)
		{
				$this->aiidbanco=$piidbanco;
		}
			
		public function fsetsdesc_banc($psdesc_banc)
		{
				$this->asdesc_banc=$psdesc_banc;
			
		}
			
		public function fgetiidbanco()
		{
				return $this->aiidbanco;
		}
			
		public function fgetsdesc_banc()
		{
				return $this->asdesc_banc;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from banco where (idbanco='$this->aiidbanco')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidbanco=$larow["idbanco"];
					$this->asdesc_banc=$larow["desc_banc"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
			public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from banco where (desc_banc='$this->asdesc_banc')";
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
				$lssql="insert into banco (idbanco,desc_banc)values('$this->aiidbanco','$this->asdesc_banc')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update banco set desc_banc='$this->asdesc_banc' where (idbanco='$this->aiidbanco')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update banco set estatus_ban='0' where (idbanco='$this->aiidbanco')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			public function factivar()
		{
			$lbhecho=false;
			$lssql="update banco set estatus_ban='1' where (idbanco='$this->aiidbanco')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from banco order by idbanco";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idbanco"];
					$lamatriz[$lii][1]=$larow["desc_banc"];
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
				$lssql="select * from banco where estatus_ban='1' order by idbanco";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idbanco"];
					$lamatriz[$lii][1]=$larow["desc_banc"];
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
				$lssql="select * from banco where estatus_ban='0' order by idbanco";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idbanco"];
					$lamatriz[$lii][1]=$larow["desc_banc"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function fnuevo()
			{
				$lssql="select max(idbanco) as mayor from banco";
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
    public function flistadobanco($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM banco  WHERE (idbanco='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM banco  WHERE (desc_banc='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idbanco"];
				   $filas [$contador][2] = $laRow["desc_banc"];	
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
