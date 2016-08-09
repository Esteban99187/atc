<?php
	require_once("class_db.php");
	class class_tabviatico extends class_db
	{
		private $id_tab;
		private $ruta_tab;
		private $total_tab;
		private $origen;
		private $destino;
		private $detalle;
		private $dias;
		public function __construct()
		{
			$this->id_tab=0;
			$this->ruta_tab=0;
			$this->total_tab=0;
			$this->origen = "";
			$this->destino = "";
			$this->detalle = array();
			$this->dias = 0;
		}
		public function __destruct()
		{
		}
		//set
		public function set_idtab($id)
		{
			$this->id_tab=$id;
		}
		
		public function set_origen($valor)
		{
			$this->origen=$valor;
		}
		public function set_destino($valor)
		{
			$this->destino=$valor;
		}
		public function set_ruta($ruta)
		{
			$this->ruta_tab=$ruta;
		}
		public function set_detalle($datos)
		{
			$this->detalle= $datos;
		}
		
		//get
		public function get_idtab()
		{
			return $this->id_tab;
		}
		public function get_origen()
		{
			return $this->origen;
		}
		public function get_destino()
		{
			return $this->destino;
		}
		public function get_ruta()
		{
			return $this->ruta_tab;
		}
		public function get_dias()
		{
				return $this->dias;
		}
		public function get_detalle()
		{
				return $this->detalle;
		}
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from tabulador_viatico,ruta where idtabulador_viatico='$this->id_tab' and idruta_tabvia=idruta";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->id_tab=$larow["idtabulador_viatico"];
				$this->dias=$larow["dias_rut"];
				$this->ruta_tab=$larow["idruta_tabvia"];
				
				$this->origen = $this->buscarCiudad($larow['idciudad_origen_rut']);
				$this->destino = $this->buscarCiudad($larow['idciudad_destino_rut']);
				
				$this->buscarDetalle($this->id_tab);
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
			$this->fbegin();	
			$lssql="insert into tabulador_viatico(fecha_hora_tabvia,idruta_tabvia,estatus_tabvia)values (now(),'".$this->ruta_tab."','1')";			
			$lbhecho=$this->fejecutar($lssql);
			if($lbhecho)
			{				
					$ultimo = $this->ult_tabulador();
					//print_r($ultimo);exit();
					if(count($this->detalle))
					{
						foreach($this->detalle as $val)
						{
							$sql="insert into detalle_tabulador_viatico(
							idtabulador_viatico_dettabvia,
							idcentro_costo_dettabvia,
							cantidad_dettabvia)values('".$ultimo['ultimo']."','".$val['cencos']."','".$val['cantidad']."')";
							
							$lbhecho=$this->fejecutar($sql);
							if(!$lbhecho)
							{
								$this->frollback();
								break;
							} 	
						}
						
					}	
					$this->fcommit();
			}
			
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->fbegin();
			$lssql="update tabulador_viatico set idruta_tabvia='$this->ruta_tab' where (idtabulador_viatico='$this->id_tab')";
			
			$lbhecho=$this->fejecutar($lssql);
			
			//print_r($this->detalle);exit();
			
			if(count($this->detalle))
			{
				
				$detalleOriginal = $this->buscarIdDetalle($this->id_tab);
				$total_det_original = count($detalleOriginal);
					
				//print_r($res); exit();
				
				if($total_det_original > count($this->detalle))// para eliminar
				{
					
					foreach($this->detalle as $campo)
					{
						$arr_id_vis[] = $campo['iddet_tab'];	
					}
					
					foreach($detalleOriginal as $campo)
					{
						$arr_id_ori[] = $campo['id'];	
					}
							
					$res= array_diff($arr_id_ori,$arr_id_vis );
					
					
					$sql = "delete from detalle_tabulador_viatico where iddet_tabulador_viatico in (".implode(",", $res).")";
					
					//die($sql);
					$lbhecho=$this->fejecutar($sql);	
					
				}	
				if($total_det_original < count($this->detalle))// para insertar
				{
					foreach($this->detalle as $val)
					{
						if($val['iddet_tab']<=0)
						{	
							
							$sql="insert into detalle_tabulador_viatico(
							idtabulador_viatico_dettabvia,
							idcentro_costo_dettabvia,
							cantidad_dettabvia)values('".$this->id_tab."','".$val['cencos']."','".$val['cantidad']."')";
							
							
						}
						if($val['iddet_tab']>0)
						{
							$sql="update detalle_tabulador_viatico  set idcentro_costo_dettabvia='".$val['cencos']."',cantidad_dettabvia='".$val['cantidad']."' where iddet_tabulador_viatico='".$val['iddet_tab']."'";	
						}
						$lbhecho=$this->fejecutar($sql);	
					}		
				}
				if($total_det_original == count($this->detalle))// para actualizar
				{
					$detalleOriginal = $this->buscarIdDetalle($this->id_tab);
					
					//print_r($this->detalle);
					$i=0;
					foreach($detalleOriginal as $campo)
					{
						if($this->detalle[$i]['iddet_tab']>0)
						{
							$sql="update detalle_tabulador_viatico  set idcentro_costo_dettabvia='".$this->detalle[$i]['cencos']."',cantidad_dettabvia='".$this->detalle[$i]['cantidad']."' where iddet_tabulador_viatico='".$this->detalle[$i]['iddet_tab']."'";	
						}else
							{
								$sql="update detalle_tabulador_viatico  set idcentro_costo_dettabvia='".$this->detalle[$i]['cencos']."',cantidad_dettabvia='".$this->detalle[$i]['cantidad']."' where iddet_tabulador_viatico='".$campo['id']."'";
							}
							//die($sql);
							$lbhecho=$this->fejecutar($sql);
						
						$i++;
					}	
					
				}
							
				
				$this->fcommit();
			}
						
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update tabulador_viatico set estatus_tabvia = 0 where (idtabulador_viatico ='$this->id_tab')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select *,sum(precio_cencos * cantidad_dettabvia) as subtotal from tabulador_viatico  as tv,detalle_tabulador_viatico as dtv,ruta as ru,centro_costo as co where
			  tv.idtabulador_viatico = dtv.idtabulador_viatico_dettabvia and dtv.idcentro_costo_dettabvia = co.idcentro_costo and tv.idruta_tabvia = ru.idruta 
			  and tv.estatus_tabvia ='1' group by tv.idtabulador_viatico  order by  tv.idtabulador_viatico,tv.idruta_tabvia";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$origen = $this->buscarCiudad($larow['idciudad_origen_rut']);
				$destino = $this->buscarCiudad($larow['idciudad_destino_rut']);
				$total=$larow['subtotal']*$larow['dias_rut'];
				$lamatriz[] = array("codigo"=>$larow['idtabulador_viatico'],"ruta"=>$larow['via_rut'],"origen"=>$origen,"destino"=>$destino,"dias"=>$larow['dias_rut'],"total"=>$total);
				
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function fnuevo()
		{
			$lssql="select max(idtabulador_viatico) as mayor from tabulador_viatico";
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
			$lssql="select * from centro_costo";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			$lii=1;
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("idcentro_costo"=>$larow["idcentro_costo"],"descripcion_cencos"=>$larow["descripcion_cencos"],"precio_cencos"=>$larow["precio_cencos"]);
				$lii++;
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			//return $lamatriz;
			return json_encode($lamatriz);
			
		}
		public function buscarDetalle($id) 
		{
			$datos = array();
			$sql="select dtv.*,cc.precio_cencos,cc.descripcion_cencos from detalle_tabulador_viatico as dtv,centro_costo as cc where dtv.idtabulador_viatico_dettabvia ='$id' and dtv.idcentro_costo_dettabvia = cc.idcentro_costo ";  
			$this->fconectar();
			
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				$datos[] = array("iddet_tabvia"=>$larow['iddet_tabulador_viatico'],"iddet_cencos"=>$larow['idcentro_costo_dettabvia'],"candet_tabvia"=>$larow['cantidad_dettabvia'],"detprecio_tabvia"=>$larow['precio_cencos'],"descripcion"=>$larow['descripcion_cencos'] );
			}
				$this->detalle = $datos;
		}
		public function buscarIdDetalle($id) 
		{
			$datos = array();
			$sql="select iddet_tabulador_viatico as id from detalle_tabulador_viatico   where idtabulador_viatico_dettabvia = '$id'";  
			$this->fconectar();
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				$datos[] =array('id'=>$larow['id']);
			}
			return  $datos;
		}
		public function comprobarDetalle($id,$centro_costo)
		{
				$sql="select idtabulador_viatico_dettabvia as id from detalle_tabulador_viatico where idtabulador_viatico_dettabvia ='$id' and idcentro_costo_dettabvia='$centro_costo'";
				$this->fconectar();
				$lrtb=$this->ffiltro($sql);
				if($larow=$this->fproximo($lrtb))
				{
					return $larow['id'];	
				}else
					return false;
				
		}
		public function ult_tabulador()
		{
			$sql = "select LAST_INSERT_ID() as ultimo";
			$res=$this->ffiltro($sql);;
			$larow=$this->fproximo($res);
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
		public function montoTabulador($id)
		{
				$lssql="select sum(precio_cencos * cantidad_dettabvia) as subtotal from tabulador_viatico  as tv,detalle_tabulador_viatico as dtv,centro_costo as co where
					tv.idtabulador_viatico = dtv.idtabulador_viatico_dettabvia and tv.idtabulador_viatico='$id' and dtv.idcentro_costo_dettabvia = co.idcentro_costo and tv.estatus_tabvia ='1'
					 group by tv.idtabulador_viatico  order by  tv.idtabulador_viatico,tv.idruta_tabvia";
			
				$this->fconectar();
				$lrtb=$this->ffiltro($sql);
				$larow=$this->fproximo($lrtb);
				
				return $larow['desc_ciud'];	
				
			
		}
	}
?>
