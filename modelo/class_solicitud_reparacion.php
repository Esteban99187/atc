<?php
	require_once("class_db.php");
	class class_solicitud_reparacion extends class_db
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
		private $asnombre_estado_origen;
		private $asnombre_estado_destino;
		private $asprecio_tabulador;
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
			$this->asnombre_estado_origen="";
			$this->asnombre_estado_destino="";
			$this->asprecio_tabulador="";
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
		public function fsetsnombre_estado_origen($psnombre_estado_origen)
		{
			$this->asnombre_estado_origen=$psnombre_estado_origen;
		}
		public function fsetsnombre_estado_destino($psnombre_estado_destino)
		{
			$this->asnombre_estado_destino=$psnombre_estado_destino;
		}
		public function fsetsprecio_tabulador($psprecio_tabulador)
		{
			$this->asprecio_tabulador=$psprecio_tabulador;
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
		public function fgetsnombre_estado_origen()
		{
			return $this->asnombre_estado_origen;
		}
		public function fgetsnombre_estado_destino()
		{
			return $this->asnombre_estado_destino;
		}
		public function fgetsprecio_tabulador()
		{
			return $this->asprecio_tabulador;
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
			$lssql="select *, date_format(fecha_solrep,'%d/%m/%Y') as fecha_solrep,
			(SELECT CONCAT_WS(' ', nombres_per, ' ') from persona WHERE persona.cedula=solicitud_reparacion.cedula_solrep_conductor ) AS nombre_conductor,
			(SELECT CONCAT_WS(' ', apellidos_per, ' ') from persona WHERE persona.cedula=solicitud_reparacion.cedula_solrep_conductor ) AS apellido_conductor,
			(SELECT CONCAT_WS(' ', telefono_movil_per, ' ') from persona WHERE persona.cedula=solicitud_reparacion.cedula_solrep_conductor ) AS telefono_conductor
			from solicitud_reparacion, persona, unidad where (idsolicitud_reparacion='$this->aiidsolicitud' and cedula=cedula_solrep_responsable and idunidad=idunidad_solrep and estatus_solrep!='anulada')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidsolicitud=$larow["idsolicitud_reparacion"];
				$this->asidestatus=$larow["estatus_solrep"];
				$this->asidempresa=$larow["cedula_solrep_conductor"];
				$this->asnombre_razon_social_emp=$larow["nombre_conductor"];
				$this->ascedula_cont=$larow["apellido_conductor"];
				$this->asnombre_cont=$larow["telefono_conductor"];
				$this->asidproducto=$larow["idproducto"];
				$this->asnombre_pro=$larow["desc_prod"];
				$this->asnombre_tippro=$larow["desc_tipo_prod"];
				$this->asnombre_tipuni=$larow["desc_tipo_unid"];
				$this->asnombre_unimed=$larow["desc_unid_medi"];
				$this->aspeso_sol=$larow["peso_sol"];
				$this->asidtabulador=$larow["idunidad_solrep"];
				$this->asnombre_estado_origen=$larow["placa"];
				$this->asnombre_estado_destino=$larow["serial_motor"];
				$this->asprecio_tabulador=$larow["serial_carroceria"];
				$this->asprecio_sol=$larow["precio_sol"];
				$this->asunidades_req=$larow["unidades_req"];
				$this->asdireccion_salida=$larow["falla_reportada"];
				$this->asdireccion_entrega=$larow["direccion_entrega"];
				$this->asfecha_salida=$larow["fecha_salida"];
				$this->asfecha_entrega=$larow["fecha_entrega"];
				$this->asobservaciones_sol=$larow["direccion_solrep"];
				$this->ashora_sol=$larow["hora_solrep"];
				$this->asfecha_sol=$larow["fecha_solrep"];
				$this->ascedula_res=$larow["cedula_solrep_responsable"];
				$this->asnombre_res=$larow["nombres_per"];
				$this->asapellido_res=$larow["apellidos_per"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar1()
		{
			$lbenc=false;
			$lssql="select * from  persona where (cedula='$this->asidempresa' and cod_rol=9 )";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->asidempresa=$larow["cedula"];
				$this->asnombre_razon_social_emp=$larow["nombres_per"];
				$this->ascedula_cont=$larow["apellidos_per"];
				$this->asnombre_cont=$larow["telefono_movil_per"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fbuscar2()
		{
			$lbenc=false;
			$lssql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idproducto='$this->asidproducto' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
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
			$lssql="SELECT * from unidad  WHERE (idunidad='$this->asidtabulador')  ";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->asidtabulador=$larow["idunidad"];
				$this->asnombre_estado_origen=$larow["placa"];
				$this->asnombre_estado_destino=$larow["serial_motor"];
				$this->asprecio_tabulador=$larow["serial_carroceria"];
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
			$this->asfecha_sol=$this->fFechaBD($this->asfecha_sol);
			$this->asfecha_entrega=$this->fFechaBD($this->asfecha_entrega);
			$this->asfecha_salida=$this->fFechaBD($this->asfecha_salida);
			$lssql="insert into solicitud_reparacion (idsolicitud_reparacion,cedula_solrep_conductor,idunidad_solrep,hora_solrep,fecha_solrep,cedula_solrep_responsable,estatus_solrep,falla_reportada,direccion_solrep)values
													 ('$this->aiidsolicitud','$this->asidempresa','$this->asidtabulador','$this->ashora_sol','$this->asfecha_sol','$this->ascedula_res','$this->asidestatus','$this->asdireccion_salida','$this->asobservaciones_sol')";
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
			$lssql="update solicitud_reparacion set falla_reportada='$this->asdireccion_salida', direccion_solrep='$this->asobservaciones_sol' where (idsolicitud_reparacion='$this->aiidsolicitud')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update solicitud_reparacion set estatus_solrep='anulada'  where (idsolicitud_reparacion='$this->aiidsolicitud')";
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
			$lssql="select max(idsolicitud_reparacion) as mayor from solicitud_reparacion";
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
