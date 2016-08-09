<?php

    require_once("class_db.php");
	class class_tipo_contri extends class_db
	{
			private $aiidtipo_contribuyente;
			private $asdesc_tipo_cont;
			
		public function __construct()
		{
			$this->aiidtipo_contribuyente=0;
			$this->asdesc_tipo_cont="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidtipo_contribuyente($piidtipo_contribuyente)
		{
				$this->aiidtipo_contribuyente=$piidtipo_contribuyente;
		}
			
		public function fsetsdesc_tipo_cont($psdesc_tipo_cont)
		{
				$this->asdesc_tipo_cont=$psdesc_tipo_cont;
			
		}
			
		public function fgetiidtipo_contribuyente()
		{
				return $this->aiidtipo_contribuyente;
		}
			
		public function fgetsdesc_tipo_cont()
		{
				return $this->asdesc_tipo_cont;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from tipo_contribuyente where (idtipo_contribuyente='$this->aiidtipo_contribuyente')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidtipo_contribuyente=$larow["idtipo_contribuyente"];
					$this->asdesc_tipo_cont=$larow["desc_tipo_cont"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
			public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_contribuyente where (desc_tipo_cont='$this->asdesc_tipo_cont')";
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
				$lssql="insert into tipo_contribuyente (idtipo_contribuyente,desc_tipo_cont)values('$this->aiidtipo_contribuyente','$this->asdesc_tipo_cont')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update tipo_contribuyente set desc_tipo_cont='$this->asdesc_tipo_cont' where (idtipo_contribuyente='$this->aiidtipo_contribuyente')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tipo_contribuyente set estatus_tipcont='0' where (idtipo_contribuyente='$this->aiidtipo_contribuyente')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_contribuyente set estatus_tipcont='1' where (idtipo_contribuyente='$this->aiidtipo_contribuyente')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_contribuyente order by idtipo_contribuyente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_contribuyente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cont"];
					
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
				$lssql="select * from tipo_contribuyente where estatus_tipcont='1' order by idtipo_contribuyente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_contribuyente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cont"];
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
				$lssql="select * from tipo_contribuyente where estatus_tipcont='0' order by idtipo_contribuyente";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_contribuyente"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cont"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
		public function fnuevo()
			{
				$lssql="select max(idtipo_contribuyente) as mayor from tipo_contribuyente";
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
    public function flistadotipo_contri($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_contribuyente  WHERE (idtipo_contribuyente='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_contribuyente WHERE (desc_tipo_cont='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_contribuyente"];
				   $filas [$contador][2] = $laRow["desc_tipo_cont"];	
				   
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
