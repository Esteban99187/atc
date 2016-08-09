<?php
	require_once("class_db.php");
	class class_solicitud_cliente extends class_db
	{
		private $idsolicitud;
		private $total_tab;
		private $detalle;
		
		//~ cliente
		private $asidcliente;
		private $asnombre_cli;
		private $astelefono_cli;
		private $ascorreo_cli;
		//~ fin cliente
		
		//~ tabulador
		
		private $asidtabulador;
		private $asprecio_tabulador;
		private $asidpais_destino_tabulador;
		private $asidestado_destino_tabulador;
		private $asidmunicipio_destino_tabulador;
		private $asidparroquia_destino_tabulador;
		private $asidciudad_destino_tabulador;
		private $asidpais_origen_tabulador;
		private $asidestado_origen_tabulador;
		private $asidmunicipio_origen_tabulador;
		private $asidparroquia_origen_tabulador;
		private $asidciudad_origen_tabulador;
		private $asprecio_sol;
		private $asunidades_req;
		private $asdireccion_salida;
		private $asdireccion_entrega;
		private $asfecha_salida;
		private $asfecha_entrega;
		private $asobservaciones_sol;
		
		private $asidtipo_unidad;
		private $asdesc_tipo_unid;
		private $ascapacidad;
		private $asdesc_unid_medi;
		
		//~ fin tabuladro
		public function __construct()
		{
			$this->idsolicitud=0;
			$this->total_tab=0;
			$this->detalle = array();
			
			//~ cliente
			$this->asnombre_cli="";
			$this->astelefono_cli="";
			$this->ascorreo_cli="";
			$this->asidcliente="";
			//~ fin cliente
			
			//~ tabulador
			
			$this->asidtabulador="";
			$this->asprecio_tabulador="";
			$this->asidpais_destino_tabulador="";
			$this->asidestado_destino_tabulador="";
			$this->asidmunicipio_destino_tabulador="";
			$this->asidparroquia_destino_tabulador="";
			$this->asidciudad_destino_tabulador="";
			$this->asidpais_origen_tabulador="";
			$this->asidestado_origen_tabulador="";
			$this->asidmunicipio_origen_tabulador="";
			$this->asidparroquia_origen_tabulador="";
			$this->asidciudad_origen_tabulador="";
			$this->asprecio_sol="";
			$this->asunidades_req="";
			$this->asdireccion_salida="";
			$this->asdireccion_entrega="";
			$this->asfecha_salida="";
			$this->asfecha_entrega="";
			$this->asobservaciones_sol="";
			
			$this->asidtipo_unidad="";
			$this->asdesc_tipo_unid="";
			$this->ascapacidad="";
			$this->asdesc_unid_medi="";
			
			//~ fin tabulador
		}
		public function __destruct()
		{
		}
		//set
		public function set_idsolicitud($id)
		{
			$this->idsolicitud=$id;
		}
		public function set_detalle($datos)
		{
			$this->detalle= $datos;
		}
		
		//~ cliente
		
		public function fsetsidcliente($psidcliente)
		{
			$this->asidcliente=$psidcliente;
		}
		public function fsetsnombre_cli($psnombre_cli)
		{
			$this->asnombre_cli=$psnombre_cli;
		}
		public function fsetstelefono_cli($pstelefono_cli)
		{
			$this->astelefono_cli=$pstelefono_cli;
		}
		public function fsetscorreo_cli($pscorreo_cli)
		{
			$this->ascorreo_cli=$pscorreo_cli;
		}
		
		//~ fin cliente
		
		//~ tabulador
		
		public function fsetsidtabulador($psidtabulador)
		{
			$this->asidtabulador=$psidtabulador;
		}
		public function fsetsprecio_tabulador($psprecio_tabulador)
		{
			$this->asprecio_tabulador=$psprecio_tabulador;
		}
		public function fsetsidpais_destino_tabulador($psidpais_destino_tabulador)
		{
			$this->asidpais_destino_tabulador=$psidpais_destino_tabulador;
		}
		public function fsetsidestado_destino_tabulador($psidestado_destino_tabulador)
		{
			$this->asidestado_destino_tabulador=$psidestado_destino_tabulador;
		}
		public function fsetsidmunicipio_destino_tabulador($psidmunicipio_destino_tabulador)
		{
			$this->asidmunicipio_destino_tabulador=$psidmunicipio_destino_tabulador;
		}
		public function fsetsidparroquia_destino_tabulador($psidparroquia_destino_tabulador)
		{
			$this->asidparroquia_destino_tabulador=$psidparroquia_destino_tabulador;
		}
		public function fsetsidciudad_destino_tabulador($psidciudad_destino_tabulador)
		{
			$this->asidciudad_destino_tabulador=$psidciudad_destino_tabulador;
		}
		public function fsetsidpais_origen_tabulador($psidpais_origen_tabulador)
		{
			$this->asidpais_origen_tabulador=$psidpais_origen_tabulador;
		}
		public function fsetsidestado_origen_tabulador($psidestado_origen_tabulador)
		{
			$this->asidestado_origen_tabulador=$psidestado_origen_tabulador;
		}
		public function fsetsidmunicipio_origen_tabulador($psidmunicipio_origen_tabulador)
		{
			$this->asidmunicipio_origen_tabulador=$psidmunicipio_origen_tabulador;
		}
		public function fsetsidparroquia_origen_tabulador($psidparroquia_origen_tabulador)
		{
			$this->asidparroquia_origen_tabulador=$psidparroquia_origen_tabulador;
		}
		public function fsetsidciudad_origen_tabulador($psidciudad_origen_tabulador)
		{
			$this->asidciudad_origen_tabulador=$psidciudad_origen_tabulador;
		}
		public function fsetsprecio_sol($psprecio_sol)
		{
			$this->asprecio_sol=$psprecio_sol;
		}
		public function fsetsunidades_req($psunidades_req)
		{
			$this->asunidades_req=$psunidades_req;
		}
		public function fsetsdireccion_salida($psdireccion_salida)
		{
			$this->asdireccion_salida=$psdireccion_salida;
		}
		public function fsetsdireccion_entrega($psdireccion_entrega)
		{
			$this->asdireccion_entrega=$psdireccion_entrega;
		}
		public function fsetsfecha_salida($psfecha_salida)
		{
			$this->asfecha_salida=$psfecha_salida;
		}
		public function fsetsfecha_entrega($psfecha_entrega)
		{
			$this->asfecha_entrega=$psfecha_entrega;
		}
		public function fsetsobservaciones_sol($psobservaciones_sol)
		{
			$this->asobservaciones_sol=$psobservaciones_sol;
		}
		
		public function fsetsidtipo_unidad($psidtipo_unidad)
		{
			$this->asidtipo_unidad=$psidtipo_unidad;
		}
		public function fsetsdesc_tipo_unid($psdesc_tipo_unid)
		{
			$this->asdesc_tipo_unid=$psdesc_tipo_unid;
		}
		public function fsetscapacidad($pscapacidad)
		{
			$this->ascapacidad=$pscapacidad;
		}
		public function fsetsdesc_unid_medi($psdesc_unid_medi)
		{
			$this->asdesc_unid_medi=$psdesc_unid_medi;
		}
		
		//~ fin tabulador 
		
		//get
		public function get_idsolicitud()
		{
			return $this->idsolicitud;
		}
		public function get_detalle()
		{
				return $this->detalle;
		}
		
		//~ cliente
		
		public function fgetsidcliente()
		{
			return $this->asidcliente;
		}
		public function fgetsnombre_cli()
		{
			return $this->asnombre_cli;
		}
		public function fgetstelefono_cli()
		{
			return $this->astelefono_cli;
		}
		public function fgetscorreo_cli()
		{
			return $this->ascorreo_cli;
		}
		
		//~ fin cliente
		
		//~ tabulador 
		
		public function fgetsidtabulador()
		{
			return $this->asidtabulador;
		}
		public function fgetsprecio_tabulador()
		{
			return $this->asprecio_tabulador;
		}
		public function fgetsidpais_destino_tabulador()
		{
			return $this->asidpais_destino_tabulador;
		}
		public function fgetsidestado_destino_tabulador()
		{
			return $this->asidestado_destino_tabulador;
		}
		public function fgetsidmunicipio_destino_tabulador()
		{
			return $this->asidmunicipio_destino_tabulador;
		}
		public function fgetsidparroquia_destino_tabulador()
		{
			return $this->asidparroquia_destino_tabulador;
		}
		public function fgetsidciudad_destino_tabulador()
		{
			return $this->asidciudad_destino_tabulador;
		}
		public function fgetsidpais_origen_tabulador()
		{
			return $this->asidpais_origen_tabulador;
		}
		public function fgetsidestado_origen_tabulador()
		{
			return $this->asidestado_origen_tabulador;
		}
		public function fgetsidmunicipio_origen_tabulador()
		{
			return $this->asidmunicipio_origen_tabulador;
		}
		public function fgetsidparroquia_origen_tabulador()
		{
			return $this->asidparroquia_origen_tabulador;
		}
		public function fgetsidciudad_origen_tabulador()
		{
			return $this->asidciudad_origen_tabulador;
		}
		public function fgetsprecio_sol()
		{
			return $this->asprecio_sol;
		}
		public function fgetsunidades_req()
		{
			return $this->asunidades_req;
		}
		public function fgetsdireccion_salida()
		{
			return $this->asdireccion_salida;
		}
		public function fgetsdireccion_entrega()
		{
			return $this->asdireccion_entrega;
		}
		public function fgetsfecha_salida()
		{
			return $this->asfecha_salida;
		}
		public function fgetsfecha_entrega()
		{
			return $this->asfecha_entrega;
		}
		public function fgetsobservaciones_sol()
		{
			return $this->asobservaciones_sol;
		}
		
		public function fgetsidtipo_unidad()
		{
			return $this->asidtipo_unidad;
		}
		public function fgetsdesc_tipo_unid()
		{
			return $this->asdesc_tipo_unid;
		}
		public function fgetscapacidad()
		{
			return $this->ascapacidad;
		}
		public function fgetsdesc_unid_medi()
		{
			return $this->asdesc_unid_medi;
		}
		//~ fin tabulador 
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from solicitud, cliente, tabulador where (idsolicitud='$this->idsolicitud' and solicitud.idcliente_sol=cliente.idcliente and solicitud.idtabulador_sol=tabulador.idtabulador)";
			
			$lssql1="select * from solicitud, VTabuladorOrigen where (solicitud.idsolicitud='$this->idsolicitud' and solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen)";
			
			$lssql2="select idsolicitud, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino
			from solicitud, ciudad, parroquia, municipio, estado, pais, tabulador, ruta where (solicitud.idsolicitud='$this->idsolicitud' and solicitud.idtabulador_sol=tabulador.idtabulador and tabulador.idruta_tab=ruta.idruta and ruta.idciudad_destino_rut=ciudad.idciudad and  ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)
			";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->idsolicitud=$larow["idsolicitud"];
				$this->asidcliente=$larow["idcliente_sol"];
				$this->asnombre_cli=$larow["nombre_cli"];
				$this->astelefono_cli=$larow["telefono_cli"];
				$this->ascorreo_cli=$larow["correo_cli"];
				
				//~ tabulador 
				
				$this->asidtabulador=$larow["idtabulador_sol"];
				$this->asprecio_tabulador=$larow["precio_tabulador_sol"];
				$this->asprecio_sol=$larow["precio_total_sol"];
				$this->asunidades_req=$larow["unidades_req_sol"];
				$this->asdireccion_salida=$larow["direccion_salida_sol"];
				$this->asdireccion_entrega=$larow["direccion_entrega_sol"];
				$this->asfecha_salida=$larow["fecha_salida_sol"];
				$this->asfecha_entrega=$larow["fecha_entrega_sol"];
				$this->asobservaciones_sol=$larow["observaciones_sol"];
				
				//~ fin tabulador 
				
				$this->buscarDetalle($this->idsolicitud);
				$lbenc=true;
				$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						
						$this->asidpais_origen_tabulador=$larow1["pais_origen_vto"];	
						$this->asidestado_origen_tabulador=$larow1["estado_origen_vto"];	
						$this->asidmunicipio_origen_tabulador=$larow1["municipio_origen_vto"];	
						$this->asidparroquia_origen_tabulador=$larow1["parroquia_origen_vto"];	
						$this->asidciudad_origen_tabulador=$larow1["ciudad_origen_vto"];
						
						$this->asidtipo_unidad=$larow1["idtipo_unidad_vto"];
						$this->asdesc_tipo_unid=$larow1["tipo_uniad_vto"];
						$this->ascapacidad=$larow1["capacidad_vto"];
						$this->asdesc_unid_medi=$larow1["medida_vto"];
						$lbenc=true;
						
					}
					$this->fconectar();
					$lrtb2=$this->ffiltro($lssql2);
					if($larow2=$this->fproximo($lrtb2))
					{
						
						$this->asidpais_destino_tabulador=$larow2["nombre_pais_destino"];	
						$this->asidestado_destino_tabulador=$larow2["nombre_estado_destino"];	
						$this->asidmunicipio_destino_tabulador=$larow2["nombre_municipio_destino"];	
						$this->asidparroquia_destino_tabulador=$larow2["nombre_parroquia_destino"];	
						$this->asidciudad_destino_tabulador=$larow2["nombre_ciudad_destino"];			
						$lbenc=true;
					}
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->asfecha_sol=$this->fFechaBD($this->asfecha_sol);
			$this->asfecha_entrega=$this->fFechaBD($this->asfecha_entrega);
			$this->asfecha_salida=$this->fFechaBD($this->asfecha_salida);
			$lssql="insert into solicitud(idsolicitud,fecha_hora_sol,idcliente_sol,unidades_req_sol,direccion_salida_sol,
			direccion_entrega_sol,fecha_salida_sol,fecha_entrega_sol,observaciones_sol,estatus_sol,eliminado_sol,idciudad_origen_sol,idciudad_destino_sol,idtipo_unidad_sol)
			values ('".$this->idsolicitud."',now(),'".$this->asidcliente."','".$this->asunidades_req."','".$this->asdireccion_salida."',
			'".$this->asdireccion_entrega."','".$this->asfecha_salida."','".$this->asfecha_entrega."','".$this->asobservaciones_sol."','espera','0','".$this->asidciudad_origen_tabulador."','".$this->asidciudad_destino_tabulador."','".$this->asidtipo_unidad."')";
			
			$this->fbegin();			
			$lbhecho=$this->fejecutar($lssql);
			if($lbhecho)
			{					
					if(count($this->detalle))
					{
						foreach($this->detalle as $val)
						{
$sql="insert into solicitud_producto (solicitud_idsolicitud, producto_idproducto, peso_pro)
									 values('".$this->idsolicitud."','".$val['cencos']."','".$val['cantidad']."')";
							
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
			$lssql="update tabulador_viatico set dias_tabvia='$this->dias_tab', idruta_tabvia='$this->ruta_tab' where (idtabulador_viatico='$this->idsolicitud')";
			
			$lbhecho=$this->fejecutar($lssql);
			
			if(count($this->detalle))
			{
				foreach($this->detalle as $val)
				{	
					if($val['iddet_tab']>0)
					{
						$sql="update detalle_tabulador_viatico  set idcentro_costo_dettabvia='".$val['cencos']."',cantidad_dettabvia='".$val['cantidad']."' where id_det_tabulador_viatico='".$val['iddet_tab']."'";	
					}else
						{
							$sql="insert into detalle_tabulador_viatico(
							idtabulador_viatico_dettabvia,
							idcentro_costo_dettabvia,
							cantidad_dettabvia)values('".$this->idsolicitud."','".$val['cencos']."','".$val['cantidad']."')";
						}
						
						$lbhecho=$this->fejecutar($sql);
							//if(!$lbhecho)
							//{
							//	$this->frollback();
							//	break;
							//}
						
				}
				$this->fcommit();
			}
			
			
			
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
			$lssql="select max(idsolicitud) as mayor from solicitud";
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
			$sql="select * from solicitud_producto, producto, tipo_producto, tipo_unidad, capacidad, unidad_medida where (solicitud_producto.solicitud_idsolicitud ='$id' and solicitud_producto.producto_idproducto = producto.idproducto and producto.idtipo_producto=tipo_producto.idtipo_producto and producto.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida)";  
			$this->fconectar();
			
			$lrtb=$this->ffiltro($sql);
			while($larow=$this->fproximo($lrtb))
			{
				@$datos[] = array("idsolicitud_producto"=>$larow['idsolicitud_producto'],"iddet_cencos"=>$larow['producto_idproducto'],"peso_pro"=>$larow['peso_pro'],"desc_tipo_prod"=>$larow['desc_tipo_prod'],"descripcion"=>$larow['desc_prod'],"unidad_medida"=>$larow['desc_unid_medi'] );
			}
				$this->detalle = $datos;
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
		public function fContar(){
		    $lcSql="SELECT MAX(idsolicitud) mayor FROM solicitud";
		    $this->fConectar();
			$lrTb=$this->fFiltro($lcSql);
			if($laRow=$this->fProximo($lrTb)){
				  $liAux=$laRow["mayor"]+1;
			}
			else{
				$liAux=1;
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar();
			return $liAux;
		}		
		
	}
?>
