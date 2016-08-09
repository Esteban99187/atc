<?php
	require_once("class_db.php");
	class class_solicitud extends class_db
	{
		private $aiidsolicitud;
		private $asidestatus;
		private $asidempresa;
		private $asnombre_razon_social_emp;
		private $ascedula_cont;
		private $asnombre_cont;
		private $asidproducto;
		private $asnombre_pro;
		private $asnombre_tippro;
		private $asnombre_tipuni;
		private $asnombre_unimed;
		private $aspeso_sol;
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
		private $ashora_sol;
		private $asfecha_sol;
		private $ascedula_res;
		private $asnombre_res;
		private $asapellido_res;
		public function __construct()
		{
			$this->aiidsolicitud=0;
			$this->asidestatus="";
			$this->asnombre_razon_social_emp="";
			$this->ascedula_cont="";
			$this->asnombre_cont="";
			$this->asidempresa="";
			$this->asidproducto="";
			$this->asnombre_pro="";
			$this->asnombre_tippro="";
			$this->asnombre_tipuni="";
			$this->asnombre_unimed="";
			$this->aspeso_sol="";
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
			$this->ashora_sol="";
			$this->asfecha_sol="";
			$this->ascedula_res="";
			$this->asnombre_res="";
			$this->asapellido_res="";
		}
		public function __destruct()
		{
		}
		public function fsetiidsolicitud($piidsolicitud)
		{
			$this->aiidsolicitud=$piidsolicitud;
		}
		public function fsetsidestatus($psidestatus)
		{
			$this->asidestatus=$psidestatus;
		}
		public function fsetsidempresa($psidempresa)
		{
			$this->asidempresa=$psidempresa;
		}
		public function fsetsnombre_razon_social_emp($psnombre_razon_social_emp)
		{
			$this->asnombre_razon_social_emp=$psnombre_razon_social_emp;
		}
		public function fsetscedula_cont($pscedula_cont)
		{
			$this->ascedula_cont=$pscedula_cont;
		}
		public function fsetsnombre_cont($psnombre_cont)
		{
			$this->asnombre_cont=$psnombre_cont;
		}
		public function fsetsidproducto($psidproducto)
		{
			$this->asidproducto=$psidproducto;
		}
		public function fsetsnombre_pro($psnombre_pro)
		{
			$this->asnombre_pro=$psnombre_pro;
		}
		public function fsetsnombre_tippro($psnombre_tippro)
		{
			$this->asnombre_tippro=$psnombre_tippro;
		}
		public function fsetsnombre_tipuni($psnombre_tipuni)
		{
			$this->asnombre_tipuni=$psnombre_tipuni;
		}
		public function fsetsnombre_unimed($psnombre_unimed)
		{
			$this->asnombre_unimed=$psnombre_unimed;
		}
		public function fsetspeso_sol($pspeso_sol)
		{
			$this->aspeso_sol=$pspeso_sol;
		}
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
		public function fsetshora_sol($pshora_sol)
		{
			$this->ashora_sol=$pshora_sol;
		}
		public function fsetsfecha_sol($psfecha_sol)
		{
			$this->asfecha_sol=$psfecha_sol;
		}
		public function fsetscedula_res($pscedula_res)
		{
			$this->ascedula_res=$pscedula_res;
		}
		public function fsetsnombre_res($psnombre_res)
		{
			$this->asnombre_res=$psnombre_res;
		}
		public function fsetsapellido_res($psapellido_res)
		{
			$this->asapellido_res=$psapellido_res;
		}
		public function fgetiidsolicitud()
		{
			return $this->aiidsolicitud;
		}
		public function fgetsidestatus()
		{
			return $this->asidestatus;
		}
		public function fgetsidempresa()
		{
			return $this->asidempresa;
		}
		public function fgetsnombre_razon_social_emp()
		{
			return $this->asnombre_razon_social_emp;
		}
		public function fgetscedula_cont()
		{
			return $this->ascedula_cont;
		}
		public function fgetsnombre_cont()
		{
			return $this->asnombre_cont;
		}
		public function fgetsidproducto()
		{
			return $this->asidproducto;
		}
		public function fgetsnombre_pro()
		{
			return $this->asnombre_pro;
		}
		public function fgetsnombre_tippro()
		{
			return $this->asnombre_tippro;
		}
		public function fgetsnombre_tipuni()
		{
			return $this->asnombre_tipuni;
		}
		public function fgetsnombre_unimed()
		{
			return $this->asnombre_unimed;
		}
		public function fgetspeso_sol()
		{
			return $this->aspeso_sol;
		}
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
		public function fgetshora_sol()
		{
			return $this->ashora_sol;
		}
		public function fgetsfecha_sol()
		{
			return $this->asfecha_sol;
		}
		public function fgetscedula_res()
		{
			return $this->ascedula_res;
		}
		public function fgetsnombre_res()
		{
			return $this->asnombre_res;
		}
		public function fgetsapellido_res()
		{
			return $this->asapellido_res;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select *, solicitud.idestatus , date_format(fecha_sol,'%d/%m/%Y') as fecha_sol, date_format(fecha_entrega_sol,'%d/%m/%Y') as fecha_entrega_sol, date_format(fecha_salida_sol,'%d/%m/%Y') as fecha_salida_sol from solicitud, cliente, producto, tipo_producto, tipo_unidad, unidad_medida, tabulador, estado where (solicitud.idsolicitud='$this->aiidsolicitud' and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto  and solicitud.idtabulador=tabulador.idtabulador)";
			$lssql1="select tabulador.idtabulador, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen

			 from solicitud, tabulador, ciudad, parroquia, municipio, estado, pais where (idsolicitud='$this->aiidsolicitud' and solicitud.idtabulador=tabulador.idtabulador and tabulador.idciudad_origen_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$lssql2="select tabulador.idtabulador, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino

			 from solicitud, tabulador, ciudad, parroquia, municipio, estado, pais where (idsolicitud='$this->aiidsolicitud' and solicitud.idtabulador=tabulador.idtabulador and tabulador.idciudad_destino_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";

			
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidsolicitud=$larow["idsolicitud"];
				$this->asidestatus=$larow["idestatus"];
				$this->asidempresa=$larow["idcliente"];
				$this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
				$this->ascedula_cont=$larow["telefono_emp"];
				$this->asnombre_cont=$larow["correo_emp"];
				$this->asidproducto=$larow["idproducto"];
				$this->asnombre_pro=$larow["desc_prod"];
				$this->asnombre_tippro=$larow["desc_tipo_prod"];
				$this->asnombre_tipuni=$larow["desc_tipo_unid"];
				$this->asnombre_unimed=$larow["desc_unid_medi"];
				$this->aspeso_sol=$larow["peso_sol"];
				$this->asidtabulador=$larow["idtabulador"];
				$this->asprecio_tabulador=$larow["precio_tabulador_sol"];
				$this->asidciudad_origen_tabulador=$larow["idciudad_origen_tabulador"];
				$this->asprecio_sol=$larow["precio_sol"];
				$this->asunidades_req=$larow["unidades_req_sol"];
				$this->asdireccion_salida=$larow["direccion_salida_sol"];
				$this->asdireccion_entrega=$larow["direccion_entrega_sol"];
				$this->asfecha_salida=$larow["fecha_salida_sol"];
				$this->asfecha_entrega=$larow["fecha_entrega_sol"];
				$this->asobservaciones_sol=$larow["observaciones_sol"];
				$this->ashora_sol=$larow["hora_sol"];
				$this->asfecha_sol=$larow["fecha_sol"];
				$this->ascedula_res=$larow["cedula_res"];
				$this->asnombre_res=$larow["nombre_res"];
				$this->asapellido_res=$larow["apellido_res"];
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
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar1()
		{
			$lbenc=false;
			$lssql="select   *   from  cliente where (cliente.idcliente='$this->asidempresa')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->asidempresa=$larow["idcliente"];
				$this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
				$this->ascedula_cont=$larow["telefono_emp"];
				$this->asnombre_cont=$larow["correo_emp"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar2()
		{
			$lbenc=false;
			$lssql="select * from producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idproducto='$this->asidproducto' and producto.idtipo_unidad = tipo_unidad.idtipo_unidad and producto.idtipo_producto = tipo_producto.idtipo_producto and producto.idunidad_medida = unidad_medida.idunidad_medida)";
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
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar3()
		{
			$lbenc=false;
			$lssql="SELECT  tabulador.idtabulador  , tabulador.precio_total_tab    from  tabulador  WHERE (tabulador.idtabulador='$this->asidtabulador' )  ";
			$lssql1="select idtabulador, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen

			 from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$this->asidtabulador' and tabulador.idciudad_origen_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$lssql2="select idtabulador, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino

			 from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$this->asidtabulador' and tabulador.idciudad_destino_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";

			
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
			$lssql="insert into solicitud (idsolicitud,idestatus,idcliente,idproducto,idtabulador,hora_sol,fecha_sol,cedula_responsable_sol,precio_tabulador_sol,precio_sol,unidades_req_sol,peso_sol,direccion_salida_sol,direccion_entrega_sol,fecha_salida_sol,fecha_entrega_sol,observaciones_sol,estatus_sol,eliminado_sol)values('$this->aiidsolicitud','$this->asidestatus','$this->asidempresa','$this->asidproducto','$this->asidtabulador','$this->ashora_sol','$this->asfecha_sol','$this->ascedula_res','$this->asprecio_tabulador','$this->asprecio_sol','$this->asunidades_req','$this->aspeso_sol','$this->asdireccion_salida','$this->asdireccion_entrega','$this->asfecha_salida','$this->asfecha_entrega','$this->asobservaciones_sol','1','1')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->asfecha_sol=$this->fFechaBD($this->asfecha_sol);
			$this->asfecha_entrega=$this->fFechaBD($this->asfecha_entrega);
			$this->asfecha_salida=$this->fFechaBD($this->asfecha_salida);
			$lssql="update solicitud set peso_sol='$this->aspeso_sol', direccion_salida='$this->asdireccion_salida', direccion_entrega='$this->asdireccion_entrega', fecha_salida='$this->asfecha_salida', fecha_entrega='$this->asfecha_entrega', observaciones_sol='$this->asobservaciones_sol' where (idsolicitud='$this->aiidsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update solicitud set estatus_eliminado='2'  where (idsolicitud='$this->aiidsolicitud')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
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

	} 
?>
