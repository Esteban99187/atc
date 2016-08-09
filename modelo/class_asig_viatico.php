<?php
	require_once("class_db.php");
	class class_asig_viatico extends class_db
	{
		private $idasignacion_viatico;
		private $fecha_asigvia;
		private $monto_asivia;
		private $estatus_asivia;
		private $orden_carga;
		private $tabulador_viatico;
		private $ult_asignacion;
		
		public function __construct()
		{
			$this->idasignacion_viatico=0;
			$this->fecha_asigvia="";
			$this->monto_asivia=0;
			$this->estatus_asivia=0;
			$this->orden_carga=0;
			$this->tabulador_viatico=0;
			$this->ult_asignacion = 0;
				
		}
		public function __destruct()
		{
		}
		//set
		public function set_valor($clave,$valor)
		{
			if(isset($this->$clave))
				$this->$clave = $valor;
		}
		//get
		public function get_valor($clave)
		{
			if(isset($this->$clave))
				return $this->$clave; 
		}
		
		
		
		public function fbuscarAsignacion($id)
		{
			
			$sql="select * from asignacion_viatico as av,tabulador_viatico as tv where tv.idtabulador_viatico = av.idtabulador_viatico_asivia and av.idasignacion_viatico= '$id' ";
			
			//die($sql);
			$this->fconectar();
			$lrtb=$this->ffiltro($sql);
			$larow=$this->fproximo($lrtb);
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $larow;
		}
		
		
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			//$this->fecha_asigvia = $this->ffechaBD($this->fecha_asigvia);
			$lssql="insert into asignacion_viatico(fecha_hora_asivia,monto_asignado_asivia,estatus_asivia,idorden_carga_asivia,idtabulador_viatico_asivia)values ('$this->fecha_asigvia','$this->monto_asivia','1','$this->orden_carga','$this->tabulador_viatico')";
			//die($lssql);
			$lbhecho=$this->fejecutar($lssql);
			if($lbhecho)
			{
				$this->ult_asignacion = $this->ult_asignacion();	
			}
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
			$sql="SELECT oc . * , per.nombres_per, per.apellidos_per, ru . * , 0 AS viatico, 0 AS monto_viatico
					FROM orden_carga AS oc, relacion_unidad AS ru, persona AS per
					WHERE oc.idrelacion_unidad = ru.idconductor AND per.cedula = oc.idrelacion_unidad AND oc.idorden_carga NOT IN (SELECT idorden_carga_asivia FROM asignacion_viatico WHERE estatus_asivia =1 )
					UNION
					SELECT oc . * , per.nombres_per, per.apellidos_per, ru . * , av.idasignacion_viatico AS viatico, av.monto_asignado_asivia AS monto_viatico
					FROM orden_carga AS oc, relacion_unidad AS ru, persona AS per, asignacion_viatico AS av
					WHERE oc.idrelacion_unidad = ru.idconductor
					AND per.cedula = oc.idrelacion_unidad
					AND oc.idorden_carga = av.idorden_carga_asivia";
			$this->fconectar();
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[] = array("codigo"=>$larow['idorden_carga'],"fecha"=>$larow['fecha_hora_ordcar'],"solicitud"=>$larow['idsolicitud'],"ced_chofer"=>$larow['idrelacion_unidad'],"nom_chofer"=>$larow['nombres_per'],"ape_chofer"=>$larow['apellidos_per'],"estatus"=>$larow['estatus_ordcar'],"viatico"=>$larow['viatico'],"monto_viatico"=>$larow['monto_viatico']);		
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function sinasignar()
		{
			$lamatriz=array();
			$lii=0;
			
			$sql="SELECT oc . * , per.nombres_per, per.apellidos_per, ru . * , 0 AS viatico, 0 AS monto_viatico
			FROM orden_carga AS oc, relacion_unidad AS ru, persona AS per
			WHERE oc.idrelacion_unidad = ru.idconductor AND per.cedula = oc.idrelacion_unidad 
			AND oc.idorden_carga NOT IN (SELECT idorden_carga_asivia FROM asignacion_viatico WHERE estatus_asivia ='1' )";
								
			$this->fconectar();
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[] = array("codigo"=>$larow['idorden_carga'],"fecha"=>$larow['fecha_hora_ordcar'],"solicitud"=>$larow['idsolicitud'],"ced_chofer"=>$larow['idrelacion_unidad'],"nom_chofer"=>$larow['nombres_per'],"ape_chofer"=>$larow['apellidos_per'],"estatus"=>$larow['estatus_ordcar'],"viatico"=>$larow['viatico'],"monto_viatico"=>$larow['monto_viatico']);		
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function asignados()
		{
			$lamatriz=array();
			$lii=0;
			
			$sql="SELECT oc . * , per.nombres_per, per.apellidos_per, ru . * , av.idasignacion_viatico AS viatico, av.monto_asignado_asivia AS monto_viatico
			FROM orden_carga AS oc, relacion_unidad AS ru, persona AS per, asignacion_viatico AS av
			WHERE oc.idrelacion_unidad = ru.idconductor
			AND per.cedula = oc.idrelacion_unidad
			AND oc.idorden_carga = av.idorden_carga_asivia";	
					
			$this->fconectar();
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[] = array("codigo"=>$larow['idorden_carga'],"fecha"=>$larow['fecha_hora_ordcar'],"solicitud"=>$larow['idsolicitud'],"ced_chofer"=>$larow['idrelacion_unidad'],"nom_chofer"=>$larow['nombres_per'],"ape_chofer"=>$larow['apellidos_per'],"estatus"=>$larow['estatus_ordcar'],"viatico"=>$larow['viatico'],"monto_viatico"=>$larow['monto_viatico']);		
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function buscarDetalletabulador($id)
		{
			$lamatriz=array();
			$lssql="select * from detalle_tabulador_viatico as dtv,centro_costo as cc where cc.idcentro_costo = dtv.idcentro_costo_dettabvia and idtabulador_viatico_dettabvia='$id'";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("codigo"=>$larow["idcentro_costo"],"descripcion"=>$larow["descripcion_cencos"],"precio"=>$larow["precio_cencos"],"cantidad"=>$larow["cantidad_dettabvia"],"monto"=>$larow["precio_cencos"]*$larow["cantidad_dettabvia"]);	
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();	
			
			return $lamatriz;
		}
		public function listarCombo()
		{
			$lamatriz=array();
			$lssql="select * from tabulador_viatico as tv, ruta as ru where tv.idruta_tabvia = ru.idruta and estatus_tabvia='1' order by fecha_hora_tabvia ";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("codigo"=>$larow["idtabulador_viatico"],"fecha"=>$larow["fecha_hora_tabvia"],"ruta"=>$larow["idruta_tabvia"],"via_ruta"=>$larow["via_rut"],"dias_ruta"=>$larow["dias_rut"]);	
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			
			//return $lamatriz;
			return $lamatriz;
			
		}
		public function precioTabulador()	
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select tv.idtabulador_viatico,ru.*,sum(precio_cencos * cantidad_dettabvia) as subtotal from tabulador_viatico  as tv,detalle_tabulador_viatico as dtv,ruta as ru,centro_costo as co where  tv.idtabulador_viatico = dtv.idtabulador_viatico_dettabvia and dtv.idcentro_costo_dettabvia = co.idcentro_costo and tv.idruta_tabvia = ru.idruta group by tv.idtabulador_viatico  order by  tv.idtabulador_viatico,tv.idruta_tabvia";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$origen = $this->buscarCiudad($larow['idciudad_origen_rut']);
				$destino = $this->buscarCiudad($larow['idciudad_destino_rut']);
				$total=$larow['subtotal']*$larow['dias_rut'];
				$lamatriz[] = array("codigo"=>$larow['idtabulador_viatico'],"origen"=>$origen,"destino"=>$destino,"dias"=>$larow['dias_rut'],"total"=>$total);
				
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			//return $lamatriz;
			
			//return $lamatriz;
			return json_encode($lamatriz);	
			
		}	
		public function buscarRuta($id)
		{
				$sql = "select * from ruta where idruta='$id'";
				$this->fconectar();
				$lrtb=$this->ffiltro($sql);
				$larow=$this->fproximo($lrtb);
				
				return $larow;	
				
			
		}
		public function buscarCiudad($id)
		{
				$sql="select idciudad,desc_ciud from ciudad where idciudad = '$id' ";
				$this->fconectar();
				$lrtb=$this->ffiltro($sql);
				$larow=$this->fproximo($lrtb);
				
				return $larow['desc_ciud'];	
				
			
		}
		public function ult_asignacion()
		{
			$sql = "select LAST_INSERT_ID() as ultimo";
			$res=$this->ffiltro($sql);;
			$larow=$this->fproximo($res);
			return $larow; 
		}
		
	}
?>
