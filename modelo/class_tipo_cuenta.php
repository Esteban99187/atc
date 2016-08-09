<?php

    require_once("class_db.php");
	class class_tipo_cuenta extends class_db
	{
			private $aiidtipo_cuenta;
			private $asdesc_tipo_cuen;
			
		public function __construct()
		{
			$this->aiidtipo_cuenta=0;
			$this->asdesc_tipo_cuen="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidtipo_cuenta($piidtipo_cuenta)
		{
				$this->aiidtipo_cuenta=$piidtipo_cuenta;
		}
			
		public function fsetsdesc_tipo_cuen($psdesc_tipo_cuen)
		{
				$this->asdesc_tipo_cuen=$psdesc_tipo_cuen;
			
		}
			
		public function fgetiidtipo_cuenta()
		{
				return $this->aiidtipo_cuenta;
		}
			
		public function fgetsdesc_tipo_cuen()
		{
				return $this->asdesc_tipo_cuen;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from tipo_cuenta where (idtipo_cuenta='$this->aiidtipo_cuenta')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidtipo_cuenta=$larow["idtipo_cuenta"];
					$this->asdesc_tipo_cuen=$larow["desc_tipo_cuen"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
			public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_cuenta where (desc_tipo_cuen='$this->asdesc_tipo_cuen')";
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
				$lssql="insert into tipo_cuenta (idtipo_cuenta,desc_tipo_cuen)values('$this->aiidtipo_cuenta','$this->asdesc_tipo_cuen')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update tipo_cuenta set desc_tipo_cuen='$this->asdesc_tipo_cuen' where (idtipo_cuenta='$this->aiidtipo_cuenta')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tipo_cuenta set estatus_tipcue='0' where (idtipo_cuenta='$this->aiidtipo_cuenta')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_cuenta set estatus_tipcue='1' where (idtipo_cuenta='$this->aiidtipo_cuenta')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_cuenta order by idtipo_cuenta";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cuenta"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cuen"];
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
				$lssql="select * from tipo_cuenta where estatus_tipcue='1' order by idtipo_cuenta";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cuenta"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cuen"];
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
				$lssql="select * from tipo_cuenta where estatus_tipcue='0' order by idtipo_cuenta";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_cuenta"];
					$lamatriz[$lii][1]=$larow["desc_tipo_cuen"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
		public function fnuevo()
			{
				$lssql="select max(idtipo_cuenta) as mayor from tipo_cuenta";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				if($larow=$this->fproximo($lrtb))
				{
					$liaux=$larow["mayor"]+1;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $liaux;
			}
       public function flistadotipo_cuenta($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_cuenta  WHERE (idtipo_cuenta='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_cuenta  WHERE (desc_tipo_cuen='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_cuenta"];
				   $filas [$contador][2] = $laRow["desc_tipo_cuen"];	
				  	
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
