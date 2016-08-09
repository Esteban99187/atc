<?php

    require_once("class_db.php");
	class class_marca_unidad extends class_db
	{
			private $aiidmarca_unidad;
			private $asdesc_marc;
			
		public function __construct()
		{
			$this->aiidmarca_unidad=0;
			$this->asdesc_marc="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidmarca_unidad($piidmarca_unidad)
		{
				$this->aiidmarca_unidad=$piidmarca_unidad;
		}
			
		public function fsetsdesc_marc($psdesc_marc)
		{
				$this->asdesc_marc=$psdesc_marc;
			
		}
			
		public function fgetiidmarca_unidad()
		{
				return $this->aiidmarca_unidad;
		}
			
		public function fgetsdesc_marc()
		{
				return $this->asdesc_marc;
		}
			
		public function fbuscar()
		{
				$lbenc=false;
				$lssql="select * from marca_unidad where (idmarca_unidad='$this->aiidmarca_unidad')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
				{
					
					$this->aiidmarca_unidad=$larow["idmarca_unidad"];
					$this->asdesc_marc=$larow["desc_marc"];
					$lbenc=true;
					
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
		}
			public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from marca_unidad where (desc_marc='$this->asdesc_marc')";
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
				$lssql="insert into marca_unidad (desc_marc)values('$this->asdesc_marc')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update marca_unidad set desc_marc='$this->asdesc_marc' where (idmarca_unidad='$this->aiidmarca_unidad')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update marca_unidad set estatus_maruni='0' where (idmarca_unidad='$this->aiidmarca_unidad')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			
			public function factivar()
		{
			$lbhecho=false;
			$lssql="update marca_unidad set estatus_maruni='1' where (idmarca_unidad='$this->aiidmarca_unidad')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from marca_unidad order by idmarca_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idmarca_unidad"];
					$lamatriz[$lii][1]=$larow["desc_marc"];
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
				$lssql="select * from marca_unidad where estatus_maruni='1' order by idmarca_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idmarca_unidad"];
					$lamatriz[$lii][1]=$larow["desc_marc"];
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
				$lssql="select * from marca_unidad where estatus_maruni='0' order by idmarca_unidad";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idmarca_unidad"];
					$lamatriz[$lii][1]=$larow["desc_marc"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
				
		public function fnuevo()
			{
				$lssql="select max(idmarca_unidad) as mayor from marca_unidad";
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
			
			public function flistadomarca_unidad($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM marca_unidad  WHERE (idmarca_unidad='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM marca_unidad  WHERE (desc_marc='$parametro2' )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idmarca_unidad"];
				   $filas [$contador][2] = $laRow["desc_marc"];	
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
