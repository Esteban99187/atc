<?php
	require_once("class_db.php");
	class class_costo extends class_db
	{
		private $aiidcosto;
		private $asdesc_costo;
		private $asmto_costo;
		
		public function __construct()
		{
			$this->aiidcosto=0;
			$this->asdesc_costo="";
			$this->asmto_costo=0;
			
		}
		public function __destruct()
		{
		}
		//set
		public function fsetiidcosto($piidcosto)
		{
			$this->aiidcosto=$piidcosto;
		}
		public function fsetsdesc_costo($psdesc_costo)
		{
			$this->asdesc_costo=$psdesc_costo;
		}
		public function fsetimto_costo($psmto_costo)
		{
			$this->asmto_costo=$psmto_costo;
		}
		//get
		public function fgetiidcosto()
		{
			return $this->aiidcosto;
		}
		public function fgetsdesc_costo()
		{
			return $this->asdesc_costo;
		}
		public function fgetimto_costo()
		{
			return $this->asmto_costo;
		}
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from centro_costo where (idcentro_costo='$this->aiidcosto')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidcosto=$larow["idcentro_costo"];
				$this->asdesc_costo=$larow["descripcion_cencos"];
				$this->asmto_costo=$larow["precio_cencos"];
				
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="insert into centro_costo (idcentro_costo,descripcion_cencos,precio_cencos) values ('$this->aiidcosto','$this->asdesc_costo','$this->asmto_costo')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update centro_costo set descripcion_cencos='$this->asdesc_costo', precio_cencos='$this->asmto_costo' where (idcentro_costo='$this->aiidcosto')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="delete from centro_costo where (idcentro_costo='$this->aiidcosto')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * 	from  centro_costo order by descripcion_cencos";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idcentro_costo"];
				$lamatriz[$lii][1]=$larow["descripcion_cencos"];
				$lamatriz[$lii][2]=$larow["precio_cencos"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function fnuevo()
		{
			$lssql="select max(idcentro_costo) as mayor from centro_costo";
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
		public function listarCombo()
		{
			$lamatriz=array();
			$lssql="select * from centro_costo; ";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("idcentro_costo"=>$larow["idcentro_costo"],"descripcion_cencos"=>$larow["descripcion_cencos"],"precio_cencos"=>$larow["precio_cencos"]);	
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			
			//return $lamatriz;
			return json_encode($lamatriz);
			
		}
		public function rutaViatico()	
		{
			$lamatriz=array();
			$lssql="SELECT rut.*,co.desc_ciud as origen,cd.desc_ciud as destino FROM `ruta` as rut  inner join ciudad as co on rut.idciudad_origen_rut = co.idciudad inner join ciudad as cd on  rut.idciudad_destino_rut = cd.idciudad";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("idruta"=>$larow["idruta"],"origen"=>$larow["origen"],"destino"=>$larow["destino"],"dias"=>$larow["dias_rut"]);
				
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			
			//return $lamatriz;
			return json_encode($lamatriz);	
			
		}	
		
		
		

		
	}
?>
