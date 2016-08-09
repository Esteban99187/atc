<?php
	require_once("class_db.php");
	class class_solicitud extends class_db
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
		public function fbuscar1()
		{
			$lbenc=false;
			$lssql="select * from  cliente where (cliente.idcliente='$this->asidempresa')";
			$lssql1="select max(idsolicitud) as mayor from solicitud";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->asidempresa=$larow["idcliente"];
				$this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
				$this->ascedula_cont=$larow["telefono_emp"];
				$this->asnombre_cont=$larow["correo_emp"];
				$lbenc=true;
					$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						
						$this->aiidsolicitud=$larow1["mayor"]+1;
						$lbenc=true;
						
					}
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar2()
		{
			$lbenc=false;
			$lssql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idproducto='$this->asidproducto' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			$lssql1="select max(idsolicitud) as mayor from solicitud";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidsolicitud=$larow["mayor"]+1;
				$this->asidproducto=$larow["idproducto"];
				$this->asnombre_pro=$larow["desc_prod"];
				$this->asnombre_tippro=$larow["desc_tipo_prod"];
				$this->asnombre_tipuni=$larow["desc_tipo_unid"];
				$this->asnombre_unimed=$larow["desc_unid_medi"];
				$lbenc=true;
					$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						
						$this->aiidsolicitud=$larow1["mayor"]+1;
						$lbenc=true;
						
					}
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar3()
		{
			$lbenc=false;
			$lssql="SELECT  tabulador.idtabulador  , tabulador.precio_total_tab    from  tabulador, estado  WHERE (tabulador.idtabulador='$this->asidtabulador' )  ";
			$lssql1="select idtabulador, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen

			 from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$this->asidtabulador' and tabulador.idciudad_origen_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$lssql2="select idtabulador, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino

			 from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$this->asidtabulador' and tabulador.idciudad_destino_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";

			$lssql3="select max(idsolicitud) as mayor from solicitud";
			
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidsolicitud=$larow["mayor"]+1;
				$this->asidtabulador=$larow["idtabulador"];
				$this->asprecio_tabulador=$larow["precio_total_tab"];
				$lbenc=true;
				
					$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						
						$this->asidpais_origen_tabulador=$larow1["nombre_pais_origen"];	
						$this->asidestado_origen_tabulador=$larow1["nombre_estado_origen"];	
						$this->asidmunicipio_origen_tabulador=$larow1["nombre_municipio_origen"];	
						$this->asidparroquia_origen_tabulador=$larow1["nombre_parroquia_origen"];	
						$this->asidciudad_origen_tabulador=$larow1["nombre_ciudad_origen"];			
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
					$this->fconectar();
					$lrtb3=$this->ffiltro($lssql3);
					if($larow3=$this->fproximo($lrtb3))
					{
						
						$this->aiidsolicitud=$larow3["mayor"]+1;
						$lbenc=true;
						
					}
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			
            $lssql="SELECT t.idruta_tab, r.idciudad_origen_rut, r.idciudad_destino_rut,p.idtipo_unidad
					FROM tabulador as t 
					INNER JOIN ruta as r ON(t.idruta_tab=r.idruta)
					INNER JOIN precio as p ON(t.idprecio=p.idprecio)
					WHERE t.idtabulador='".$this->asidtabulador."'";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $ciudad_origen=$larow["idciudad_origen_rut"];
                $ciudad_destino=$larow["idciudad_destino_rut"];
				$tipo_unidad=$larow["idtipo_unidad"];
            }          
            $lbhecho=false;
			$this->fconectar();
			$this->asfecha_sol=$this->fFechaBD($this->asfecha_sol);
			$this->asfecha_entrega=$this->fFechaBD($this->asfecha_entrega);
			$this->asfecha_salida=$this->fFechaBD($this->asfecha_salida);
			$lssql="insert into solicitud(fecha_hora_sol,idcliente_sol,idtabulador_sol,    
			precio_tabulador_sol,precio_total_sol,unidades_req_sol,direccion_salida_sol,
			direccion_entrega_sol,fecha_salida_sol,fecha_entrega_sol,observaciones_sol,estatus_sol,eliminado_sol,idciudad_origen_sol,idciudad_destino_sol,idtipo_unidad_sol)
			values (now(),'".$this->asidcliente."','".$this->asidtabulador."',
			'".$this->asprecio_tabulador."','".$this->asprecio_sol."','".$this->asunidades_req."','".$this->asdireccion_salida."',
			'".$this->asdireccion_entrega."','".$this->asfecha_salida."','".$this->asfecha_entrega."','".$this->asobservaciones_sol."','emitida','0','$ciudad_origen','$ciudad_destino','$tipo_unidad')";
			
			$this->fbegin();			
			$lbhecho=$this->fejecutar($lssql);
			if($lbhecho)
			{		$ultimo = $this->ult_tabulador();
					if(count($this->detalle))
					{
						foreach($this->detalle as $val)
						{
								$sql="insert into solicitud_producto (solicitud_idsolicitud, producto_idproducto, peso_pro)
								values('".$ultimo['ultimo']."','".$val['cencos']."','".$val['cantidad']."')";
							
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
			$lssql="select max(idsolicitud) as mayor from solicitud where (solicitud.idcliente_sol='".$this->asidcliente."')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->idsolicitud=$larow["mayor"];
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbhecho;
		}
		
		public function ult_tabulador()
		{
			$sql = "select LAST_INSERT_ID() as ultimo";
			$res=$this->ffiltro($sql);;
			$larow=$this->fproximo($res);
			return $larow; 
		}
		
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->asfecha_sol=$this->fFechaBD($this->asfecha_sol);
			$this->asfecha_entrega=$this->fFechaBD($this->asfecha_entrega);
			$this->asfecha_salida=$this->fFechaBD($this->asfecha_salida);
			$lssql="update solicitud set direccion_salida='$this->asdireccion_salida', direccion_entrega='$this->asdireccion_entrega', fecha_salida='$this->asfecha_salida', fecha_entrega='$this->asfecha_entrega' where (idsolicitud='$this->aiidsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			  //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','Solicitud','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
		public function asignar_tabulador()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update solicitud set idtabulador_sol='$this->asidtabulador', estatus_sol='procesada', precio_total_sol='$this->asprecio_sol', precio_tabulador_sol='$this->asprecio_tabulador'  where (idsolicitud='$this->idsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function anular_solicitud()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update solicitud set observacion_anular_sol='$this->asidtabulador', estatus_sol='anulada' where (idsolicitud='$this->idsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function devolver_solicitud()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update solicitud set observacion_devolver_sol='$this->asidtabulador', estatus_sol='devuelta' where (idsolicitud='$this->idsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function aceptar_orden_carga($id)
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update solicitud set  estatus_sol='emitida' where (idsolicitud='$id')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function anular_orden_carga($anu)
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update solicitud set  estatus_sol='anulada' where (idsolicitud='$anu')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update solicitud set eliminado_sol='2'  where (idsolicitud='$this->aiidsolicitud')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Elimino Registro','Solicitud','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select s.idsolicitud, s.fecha_sol, s.nombre_res, s.apellido_res, s.unidades_req, s.cedula_res, s.direccion_entrega, s.direccion_salida, e.idcliente,
			e.nombre_razon_social_emp, s.idproducto, p. desc_prod, s.fecha_entrega, s.fecha_salida, s.peso_sol, s.unidades_asi
			from solicitud as s
			inner join cliente as e
			inner join producto as p
			where (s.idproducto=p.idproducto)
			and (e.idcliente=s.idcliente) and (s.idestatus='espera')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idsolicitud"];
				$lamatriz[$lii][1]=$larow["fecha_sol"];
				$lamatriz[$lii][2]=$larow["cedula_res"];
				$lamatriz[$lii][3]=$larow["nombre_res"];
				$lamatriz[$lii][4]=$larow["apellido_res"];
				$lamatriz[$lii][5]=$larow["unidades_req"];
				$lamatriz[$lii][6]=$larow["fecha_entrega"];
				$lamatriz[$lii][7]=$larow["fecha_salida"];
				$lamatriz[$lii][8]=$larow["direccion_entrega"];
				$lamatriz[$lii][9]=$larow["direccion_salida"];
				$lamatriz[$lii][10]=$larow["nombre_razon_social_emp"];
				$lamatriz[$lii][11]=$larow["desc_prod"];
				$lamatriz[$lii][12]=$larow["peso_sol"];
				$lamatriz[$lii][13]=$larow["unidades_asi"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistarpdf()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select idsolicitud, fecha_hora_sol, idcliente_sol, telefono_cli, nombre_cli, pais_origen_vto, estado_origen_vto, municipio_origen_vto,
			parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd,
			desc_tipo_unid, capacidad, desc_unid_medi, observaciones_sol, desc_prod, desc_tipo_prod, peso_pro, precio_tabulador_sol, precio_total_sol,
			desc_prod, correo_cli, fecha_entrega_sol, fecha_salida_sol, direccion_entrega_sol, direccion_salida_sol, unidades_req_sol, precio_total_sol
			 from solicitud, VTabuladorDestino, VTabuladorOrigen, tipo_unidad, capacidad, unidad_medida , cliente, solicitud_producto, producto, tipo_producto 	where (solicitud.idsolicitud='".$this->idsolicitud."' and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino and solicitud.idcliente_sol=cliente.idcliente and solicitud.idtipo_unidad_sol=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida and solicitud_producto.solicitud_idsolicitud=solicitud.idsolicitud and solicitud_producto.producto_idproducto=producto.idproducto and producto.idtipo_producto=tipo_producto.idtipo_producto and solicitud.estatus_sol='emitida')";    
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idsolicitud"];
                $lamatriz[$lii][1]=$larow["fecha_hora_sol"];
                $lamatriz[$lii][2]=$larow["idcliente_sol"];
                $lamatriz[$lii][3]=$larow["telefono_cli"];
                $lamatriz[$lii][4]=$larow["nombre_cli"];
                $lamatriz[$lii][5]=$larow["pais_origen_vto"];
                $lamatriz[$lii][6]=$larow["estado_origen_vto"];
                $lamatriz[$lii][7]=$larow["municipio_origen_vto"];
                $lamatriz[$lii][8]=$larow["parroquia_origen_vto"];
                $lamatriz[$lii][9]=$larow["ciudad_origen_vto"];
                $lamatriz[$lii][10]=$larow["pais_destino_vtd"];
                $lamatriz[$lii][11]=$larow["estado_destino_vtd"];
                $lamatriz[$lii][12]=$larow["municipio_destino_vtd"];
                $lamatriz[$lii][13]=$larow["parroquia_destino_vtd"];
                $lamatriz[$lii][14]=$larow["ciudad_destino_vtd"];
                $lamatriz[$lii][15]=$larow["desc_tipo_unid"];
                $lamatriz[$lii][16]=$larow["capacidad"];
                $lamatriz[$lii][17]=$larow["desc_unid_medi"];
                $lamatriz[$lii][18]=$larow["observaciones_sol"];
                $lamatriz[$lii][19]=$larow["desc_prod"];
                $lamatriz[$lii][20]=$larow["desc_tipo_prod"];
                $lamatriz[$lii][21]=$larow["peso_pro"];
                $lamatriz[$lii][22]=$larow["precio_tabulador_sol"];
                $lamatriz[$lii][23]=$larow["precio_total_sol"];
                $lamatriz[$lii][24]=$larow["desc_prod"]; 
                $lamatriz[$lii][25]=$larow["correo_cli"]; 
                $lamatriz[$lii][26]=$larow["fecha_entrega_sol"]; 
                $lamatriz[$lii][27]=$larow["fecha_salida_sol"]; 
                $lamatriz[$lii][28]=$larow["direccion_entrega_sol"]; 
                $lamatriz[$lii][29]=$larow["direccion_salida_sol"];   
                $lamatriz[$lii][30]=$larow["unidades_req_sol"];   
                $lamatriz[$lii][31]=$larow["precio_total_sol"];   
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		
		public function flistarpdf1()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from solicitud, tipo_unidad, capacidad, unidad_medida , cliente, solicitud_producto, producto, tipo_producto, ciudad,parroquia,estado, municipio,pais 	
			where (solicitud.idsolicitud='".$this->idsolicitud."' and  solicitud.idciudad_origen_sol=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais  and solicitud.idcliente_sol=cliente.idcliente and solicitud.idtipo_unidad_sol=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida and solicitud_producto.solicitud_idsolicitud=solicitud.idsolicitud and solicitud_producto.producto_idproducto=producto.idproducto and producto.idtipo_producto=tipo_producto.idtipo_producto)";    
			
			$lssql1="select desc_pais as pais_destino, desc_parr as parroquia_destino, desc_esta as estado_destino, desc_ciud ciudad_destino, desc_muni as municipio_destino from solicitud, ciudad,parroquia,estado, municipio,pais 	
			where (solicitud.idsolicitud='".$this->idsolicitud."' and  solicitud.idciudad_destino_sol=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";    
			
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idsolicitud"];
                $lamatriz[$lii][1]=$larow["fecha_hora_sol"];
                $lamatriz[$lii][2]=$larow["idcliente_sol"];
                $lamatriz[$lii][3]=$larow["telefono_cli"];
                $lamatriz[$lii][4]=$larow["nombre_cli"];
                $lamatriz[$lii][5]=$larow["desc_pais"];
                $lamatriz[$lii][7]=$larow["desc_esta"];
                $lamatriz[$lii][9]=$larow["desc_muni"];
                $lamatriz[$lii][6]=$larow["desc_parr"];
                $lamatriz[$lii][8]=$larow["desc_ciud"];
                $lamatriz[$lii][15]=$larow["desc_tipo_unid"];
                $lamatriz[$lii][16]=$larow["capacidad"];
                $lamatriz[$lii][17]=$larow["desc_unid_medi"];
                $lamatriz[$lii][18]=$larow["observaciones_sol"];
                $lamatriz[$lii][19]=$larow["desc_prod"];
                $lamatriz[$lii][20]=$larow["desc_tipo_prod"];
                $lamatriz[$lii][21]=$larow["peso_pro"];
                $lamatriz[$lii][22]=$larow["precio_tabulador_sol"];
                $lamatriz[$lii][23]=$larow["precio_total_sol"];
                $lamatriz[$lii][24]=$larow["desc_prod"]; 
                $lamatriz[$lii][25]=$larow["correo_cli"]; 
                $lamatriz[$lii][26]=$larow["fecha_entrega_sol"]; 
                $lamatriz[$lii][27]=$larow["fecha_salida_sol"]; 
                $lamatriz[$lii][28]=$larow["direccion_entrega_sol"]; 
                $lamatriz[$lii][29]=$larow["direccion_salida_sol"];   
                $lamatriz[$lii][30]=$larow["unidades_req_sol"];   
                $lamatriz[$lii][31]=$larow["precio_total_sol"];   
				
						$this->fconectar();
						$lrtb1=$this->ffiltro($lssql1);
						while($larow1=$this->fproximo($lrtb1))
						{

							$lamatriz[$lii][10]=$larow1["pais_destino"];
							$lamatriz[$lii][12]=$larow1["estado_destino"];
							$lamatriz[$lii][14]=$larow1["municipio_destino"]; 
							$lamatriz[$lii][11]=$larow1["parroquia_destino"];
							$lamatriz[$lii][13]=$larow1["ciudad_destino"];
							$lii++;
						}
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
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
		
		
		
		

		public function flistadosolicitud($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql="SELECT * FROM solicitud, cliente, producto, unidad_medida  WHERE (idsolicitud='$parametro1' and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and solicitud.estatus_soli='1' )";
			if($parametro2!="")//por nombre
			$sql="SELECT * FROM solicitud, cliente, producto, unidad_medida  WHERE (solicitud.idcliente='$parametro2' and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and solicitud.estatus_soli='1'  )";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idsolicitud"];
					$filas [$contador][2] = $laRow["idcliente"];
					$filas [$contador][3] = $laRow["nombre_razon_social_emp"];
					$filas [$contador][4] = $laRow["telefono_emp"];
					$filas [$contador][5] = $laRow["desc_prod"];
					$filas [$contador][6] = $laRow["peso_sol"];
					$filas [$contador][7] = $laRow["desc_unid_medi"];
					$filas [$contador][8] = $laRow["direccion_salida"];
					$filas [$contador][9] = $laRow["direccion_entrega"];
					$filas [$contador][10] = $laRow["fecha_salida"];
					$filas [$contador][11] = $laRow["fecha_entrega"];
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
		public function listar_solicitud_en_espera()
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol from solicitud, cliente where solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'espera')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td align='center'><a href=javascript:ProcesarSolicitud('$idsolicitud')><i class='glyphicon glyphicon-edit'></i></a></td><td align='center'><a  href=javascript:AnularSolicitud('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td><td align='center'><a  href=javascript:DevolverSolicitud('$idsolicitud')><i class='glyphicon glyphicon glyphicon-repeat'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_emitida()
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol from solicitud, cliente where solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'emitida')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['unidades_req_sol']."</td><td>".$rol['unidades_asignadas_sol']."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td align='center'><a href=javascript:abre_orden_de_carga('$idsolicitud')><i class='glyphicon glyphicon-edit'></i></a></td><td align='center'><a  href=javascript:eliminar('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_procesada($idclienteusuario)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol, CONCAT (precio_total_sol,' ','Bsf') as precio_total_sol from solicitud, cliente where solicitud.idcliente_sol='$idclienteusuario' and solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'procesada')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td>".$rol['precio_tabulador_sol']." x</td><td>".$rol['unidades_req_sol']." =</td><td>".$rol['precio_total_sol']."</td><td align='center'><a href=javascript:aceptar_orden_carga('$idsolicitud')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:anular_orden_carga('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_devuelta($idclienteusuario)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol, CONCAT (precio_total_sol,' ','Bsf') as precio_total_sol from solicitud, cliente where solicitud.idcliente_sol='$idclienteusuario' and solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'devuelta')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td>".$rol['precio_tabulador_sol']." x</td><td>".$rol['unidades_req_sol']." =</td><td>".$rol['precio_total_sol']."</td><td align='center'><a href=javascript:aceptar_orden_carga('$idsolicitud')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:anular_orden_carga('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_anulada($idclienteusuario)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol, CONCAT (precio_total_sol,' ','Bsf') as precio_total_sol from solicitud, cliente where solicitud.idcliente_sol='$idclienteusuario' and solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'anulada')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td>".$rol['precio_tabulador_sol']." x</td><td>".$rol['unidades_req_sol']." =</td><td>".$rol['precio_total_sol']."</td><td align='center'><a href=javascript:aceptar_orden_carga('$idsolicitud')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:anular_orden_carga('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_espera($idclienteusuario)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol, CONCAT (precio_total_sol,' ','Bsf') as precio_total_sol from solicitud, cliente where solicitud.idcliente_sol='$idclienteusuario' and solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'espera')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td>".$rol['precio_tabulador_sol']." x</td><td>".$rol['unidades_req_sol']." =</td><td>".$rol['precio_total_sol']."</td><td align='center'><a href=javascript:aceptar_orden_carga('$idsolicitud')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:anular_orden_carga('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function listar_solicitud_emitida_cliente($idclienteusuario)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol, CONCAT (precio_total_sol,' ','Bsf') as precio_total_sol from solicitud, cliente where solicitud.idcliente_sol='$idclienteusuario' and solicitud.idcliente_sol=cliente.idcliente";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_sol"] == 'emitida')
				{
					echo "<tr><td>".$rol['idsolicitud']."</td><td>".$rol['idcliente_sol']."</td><td>".strtoupper($rol['nombre_cli']).' '.strtoupper($rol['apellido_cli'])."</td><td>".$rol['fecha_sol']."</td><td>".$rol['hora_sol']."</td><td>".$rol['precio_tabulador_sol']." x</td><td>".$rol['unidades_req_sol']." =</td><td>".$rol['precio_total_sol']."</td><td align='center'><a href=javascript:aceptar_orden_carga('$idsolicitud')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:anular_orden_carga('$idsolicitud')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function reportesolicitudemitida()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as emitidas FROM solicitud WHERE (estatus_sol='emitida')";
			$consulta = $this->ffiltro($sql);
			$datos = $this->fproximo($consulta);
			return $datos;
		}
		public function reportesolicitudejecutada()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as ejecutadas FROM solicitud WHERE (estatus_sol='ejecutada')";
			$consulta = $this->ffiltro($sql);
			$datos1 = $this->fproximo($consulta);
			return $datos1;
		}
		public function reportesolicitudprocesada()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as procesadas FROM solicitud WHERE (estatus_sol='procesada')";
			$consulta = $this->ffiltro($sql);
			$datos2 = $this->fproximo($consulta);
			return $datos2;
		}
		public function reportesolicitudespera()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as esperas FROM solicitud WHERE (estatus_sol='espera')";
			$consulta = $this->ffiltro($sql);
			$datos3 = $this->fproximo($consulta);
			return $datos3;
		}
		public function reportesolicitud()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as solicitudes from solicitud";
			$consulta = $this->ffiltro($sql);
			$datos4 = $this->fproximo($consulta);
			return $datos4;
		}
		public function reportesolicitudanulada()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as anuladas FROM solicitud WHERE (estatus_sol='anulada')";
			$consulta = $this->ffiltro($sql);
			$datos5 = $this->fproximo($consulta);
			return $datos5;
		}
		public function reportesolicituddevuelta()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as devueltas FROM solicitud WHERE (estatus_sol='devuelta')";
			$consulta = $this->ffiltro($sql);
			$datos6 = $this->fproximo($consulta);
			return $datos6;
		}
		public function datosolicitud($idsolicitud)
		{
			$this->fconectar();
			$sql = "select * , date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol from solicitud, cliente where idsolicitud = '$idsolicitud' and solicitud.idcliente_sol=cliente.idcliente";
			$consulta = $this->ffiltro($sql);
			$rs = $this->fproximo($consulta);
			return $rs;
		}
		public function datosolicitud_emitida($idsolicitud)
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_hora_sol,'%h:%i:%s') as hora_sol from solicitud, tabulador, cliente where idsolicitud = '$idsolicitud' and solicitud.idcliente_sol=cliente.idcliente and solicitud.idtabulador_sol=tabulador.idtabulador";
			$consulta = $this->ffiltro($sql);
			$rs = $this->fproximo($consulta);
			return $rs;
		}
		public function datosolicitud_destino($idsolicitud)
		{
			$this->fconectar();
			$sql="select idsolicitud, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino
			from solicitud, ciudad, parroquia, municipio, estado, pais where (solicitud.idsolicitud='$idsolicitud' and solicitud.idciudad_destino_sol=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			$destino = $this->ffiltro($sql);
			$ds = $this->fproximo($destino);
			return $ds;
		}
		public function datosolicitud_destino_emitida($idsolicitud)
		{
			$this->fconectar();
			$sql="select idsolicitud, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino
			from solicitud, tabulador, ruta, ciudad, parroquia, municipio, estado, pais where (solicitud.idsolicitud='$idsolicitud' and solicitud.idtabulador_sol=tabulador.idtabulador and tabulador.idruta_tab=ruta.idruta and ruta.idciudad_destino_rut=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			$destino = $this->ffiltro($sql);
			$ds = $this->fproximo($destino);
			return $ds;
		}
		public function datosolicitud_origen($idsolicitud)
		{
			$this->fconectar();
			$sql="select idsolicitud, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen, idtipo_unidad_sol, desc_tipo_unid, capacidad, desc_unid_medi, unidades_req_sol
			from solicitud, ciudad, parroquia, municipio, estado, pais, tipo_unidad, capacidad, unidad_medida where (solicitud.idsolicitud='$idsolicitud' and  solicitud.idciudad_origen_sol=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais and solicitud.idtipo_unidad_sol=tipo_unidad.idtipo_unidad and  tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida)";
			$origen = $this->ffiltro($sql);
			$or = $this->fproximo($origen);
			return $or;
		}
		public function datosolicitud_origen_emitida($idsolicitud)
		{
			$this->fconectar();
			$sql="select idsolicitud, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen
			from solicitud, tabulador, ruta, ciudad, parroquia, municipio, estado, pais where (solicitud.idsolicitud='$idsolicitud' and solicitud.idtabulador_sol=tabulador.idtabulador and tabulador.idruta_tab=ruta.idruta and ruta.idciudad_origen_rut=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			$origen = $this->ffiltro($sql);
			$or = $this->fproximo($origen);
			return $or;
		}
		public function datosolicitud_producto($idsolicitud)
		{
			$lsSql="select * from  solicitud_producto, producto where (solicitud_producto.solicitud_idsolicitud='$idsolicitud' and  solicitud_producto.producto_idproducto=producto.idproducto )";
			$i = 0;
			$this->fconectar();
			$lrTb=$this->ffiltro($lsSql);
			while($laRow=$this->fproximo($lrTb)){
				$fila[$i][1]=$laRow["idproducto"];
				$fila[$i][2]=$laRow["desc_prod"];
				$fila[$i][3]=$laRow["peso_pro"];
				$i++;
			}
			$this->fcierrafiltro($lrTb);
			$this->fdesconectar();
			return $fila;
		}
		public function datosolicitud_producto_emitida($idsolicitud)
		{
			$lsSql="select * from  solicitud_producto, producto where (solicitud_producto.solicitud_idsolicitud='$idsolicitud' and  solicitud_producto.producto_idproducto=producto.idproducto )";
			$i = 0;
			$this->fconectar();
			$lrTb=$this->ffiltro($lsSql);
			while($laRow=$this->fproximo($lrTb)){
				$fila[$i][1]=$laRow["idproducto"];
				$fila[$i][2]=$laRow["desc_prod"];
				$fila[$i][3]=$laRow["peso_pro"];
				$i++;
			}
			$this->fcierrafiltro($lrTb);
			$this->fdesconectar();
			return $fila;
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
		public function Anular()
		{
			$lbhecho=false;
			$lssql="update solicitud set estatus_sol='anulada' where (idsolicitud='$this->idsolicitud')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
		
				public function estadistica_solicitud($fecha1 = false,$fecha2 = false)
		{
			
			if($fecha1){
				$fecha1 = $this->ffechaBD($fecha1);
				$fecha2 = $this->ffechaBD($fecha2);
				
				$sql = "SELECT count( * ) AS total, solicitud.estatus_sol AS sol FROM solicitud WHERE solicitud.fecha_hora_sol
					BETWEEN '$fecha1' AND '$fecha2' GROUP BY estatus_sol";
			}else
				{
					$sql = "SELECT count( * ) AS total, solicitud.estatus_sol AS sol FROM solicitud  GROUP BY estatus_sol";
				}
			//die($sql);			
			$this->fconectar();
			$query = $this->ffiltro($sql);	
			if(mysql_num_rows($query) > 1)
			{	
				while($rol = $this->fproximo($query))
				{
					$datos[] = $rol;
				}
				return $datos;
			}else
				{
					return array();
				}
					
		}

	} 
?>
