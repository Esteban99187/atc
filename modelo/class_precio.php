<?php

    require_once("class_db.php");
	class class_precio extends class_db
	{
		private $aiidprecio;
		private $asprecio_pre;
		private $asidtipo_unidad;
			
		public function __construct()
		{
			$this->aiidprecio=0;
			$this->asprecio_pre="";
			$this->asidtipo_unidad="";
		}
			
		public function __destruct()
		{
				
		}
			
		public function fsetiidprecio($piidprecio)
		{
			$this->aiidprecio=$piidprecio;
		}
			
		public function fsetsprecio_pre($psprecio_pre)
		{
			$this->asprecio_pre=$psprecio_pre;
		}
		public function fsetsidtipo_unidad($psidtipo_unidad)
		{
			$this->asidtipo_unidad=$psidtipo_unidad;
		}
		public function fgetiidprecio()
		{
			return $this->aiidprecio;
		}
		public function fgetsprecio_pre()
		{
			return $this->asprecio_pre;
		}
		public function fgetsidtipo_unidad()
		{
			return $this->asidtipo_unidad;
		}
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from precio where (idprecio='$this->aiidprecio')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aiidprecio=$larow["idprecio"];
				$this->asprecio_pre=$larow["precio_pre"];
				$this->asidtipo_unidad=$larow["idtipo_unidad"];
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		
			public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from precio where (precio_pre='$this->asprecio_pre')";
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
			$lssql="
						insert into precio 
						(
							precio_pre, 
							idtipo_unidad
						)
							
						values
						(
	
							'$this->asprecio_pre',
							'$this->asidtipo_unidad'
						)
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						update precio set 
						
						precio_pre='$this->asprecio_pre', 
						idtipo_unidad='$this->asidtipo_unidad'
						
						where 
						
						(idprecio='$this->aiidprecio')
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function feliminar()
		{
				$lbhecho=false;
				 $lssql="update precio set estatus_pre='0' where (idprecio='$this->aiidprecio')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update precio set estatus_pre='1' where (idprecio='$this->aiidprecio')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select p.idprecio, p.precio_pre, ti.idtipo_unidad, ti.desc_tipo_unid
												from precio as p
												inner join tipo_unidad as ti
						where  (p.idtipo_unidad=ti.idtipo_unidad)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idprecio"];
				$lamatriz[$lii][1]=$larow["precio_pre"];
				$lamatriz[$lii][2]=$larow["desc_tipo_unid"];
				$lamatriz[$lii][3]=$larow["capacidad"];
				
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
			
		public function fnuevo()
		{
			$lssql="select max(idprecio) as mayor from precio";
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
		
		
		public function FBuscaPrecio($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT *,
			(SELECT CONCAT_WS(' ', capacidad,' ',desc_unid_medi) from tipo_unidad, capacidad, unidad_medida WHERE  precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida) AS nombre_unidad
			FROM precio, capacidad, tipo_unidad where (idprecio='$parametro1' and precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad)";
			
			if($parametro2!="")//por nombre
			$sql      = "SELECT *,
			(SELECT CONCAT_WS(' ', capacidad,' ',desc_unid_medi) from tipo_unidad, capacidad, unidad_medida WHERE  precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida) AS nombre_unidad
			 FROM precio, capacidad, tipo_unidad where (precio_pre='$parametro2' and precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad)";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idprecio"];
					$filas [$contador][2] = $laRow["precio_pre"];
					$filas [$contador][3] = $laRow["desc_tipo_unid"];
					$filas [$contador][4] = $laRow["nombre_unidad"];
					
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
		
		public function ListadoPrecio()
		{
			$this->fconectar();
			$sql      = "SELECT *, 
			(SELECT CONCAT_WS(' ', capacidad,' ',desc_unid_medi) from tipo_unidad, capacidad, unidad_medida WHERE  precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida) AS nombre_unidad
			 FROM precio, capacidad, tipo_unidad where precio.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idprecio"];
					$filas [$contador][2] = $laRow["precio_pre"];
					$filas [$contador][3] = $laRow["desc_tipo_unid"];
					$filas [$contador][4] = $laRow["nombre_unidad"];
					
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
		public function flistadopreciokilo($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM precio,tipo_unidad  WHERE (idprecio='$parametro1' and precio.idtipo_unidad=tipo_unidad.idtipo_unidad  )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM precio,tipo_unidad  WHERE (idprecio='$parametro2' and precio.idtipo_unidad=tipo_unidad.idtipo_unidad )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idprecio"];
				   $filas [$contador][2] = $laRow["precio_pre"];	
				   $filas [$contador][3] = $laRow["idtipo_unidad"];	
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
