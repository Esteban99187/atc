<?php

    require_once("class_db.php");
	class class_tipo_producto extends class_db
	{
			private $aiidtipo_producto;
			private $asdesc_tipo_prod;
			
		public function __construct()
		{
			$this->aiidtipo_producto=0;
			$this->asdesc_tipo_prod="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidtipo_producto($piidtipo_producto)
		{
				$this->aiidtipo_producto=$piidtipo_producto;
		}
			
		public function fsetsdesc_tipo_prod($psdesc_tipo_prod)
		{
				$this->asdesc_tipo_prod=$psdesc_tipo_prod;
			
		}
			
		public function fgetiidtipo_producto()
		{
				return $this->aiidtipo_producto;
		}
			
		public function fgetsdesc_tipo_prod()
		{
				return $this->asdesc_tipo_prod;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from tipo_producto where (idtipo_producto='$this->aiidtipo_producto')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidtipo_producto=$larow["idtipo_producto"];
					$this->asdesc_tipo_prod=$larow["desc_tipo_prod"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
		
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tipo_producto where (desc_tipo_prod='$this->asdesc_tipo_prod')";
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
				$lssql="insert into tipo_producto (desc_tipo_prod)values('$this->asdesc_tipo_prod')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update tipo_producto set desc_tipo_prod='$this->asdesc_tipo_prod' where (idtipo_producto='$this->aiidtipo_producto')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tipo_producto set estatus_tippro='0' where (idtipo_producto='$this->aiidtipo_producto')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update tipo_producto set estatus_tippro='1' where (idtipo_producto='$this->aiidtipo_producto')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from tipo_producto order by idtipo_producto";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idtipo_producto"];
					$lamatriz[$lii][1]=$larow["desc_tipo_prod"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
			
		public function fnuevo()
			{
				$lssql="select max(idtipo_producto) as mayor from tipo_producto";
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
  public function flistadotipo_producto($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM tipo_producto  WHERE (idtipo_producto='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM tipo_producto  WHERE (desc_tipo_prod='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtipo_producto"];
				   $filas [$contador][2] = $laRow["desc_tipo_prod"];	
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
