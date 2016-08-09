<?php

    require_once("class_db.php");
    
    class class_recgui extends class_db
    {
    
    private $aiidrecepcion_guia;
	private $asn_guia;
	private $asidempresa;
	private $asnombre_razon_social_emp;
	private $asidremolque;
	private $asplaca_rem;
	private $asidorden_carga;
	private $asnombre_pro;
	private $astelefono_emp;
	private $asplaca_uni;
	private $asnombre_unimed;
	private $aspeso_sol;
	private $ascedula;
	private $asidrelacion_unidad;
	private $asnombres_per;
	private $astelefono_corp_per;
	private $asidunidad;
	private $asdireccion_salida;
	private $asdireccion_entrega;
	private $asfecha_salida;
	private $asfecha_entrega;
	private $asobservacion_rec;
	private $ashora_rec;
	private $asfecha_rec;
	private $ascedula_rep_rec;
	private $asnombre_rep_rec;
	private $asapellido_rep_rec;
        
	public function __construct()
	{
            $this->aiidrecepcion_guia=0;
            $this->asn_guia="";
            $this->asnombre_razon_social_emp="";
            $this->asidremolque="";
            $this->asplaca_rem="";
            $this->asidempresa="";
            $this->asidorden_carga="";
            $this->asnombre_pro="";
            $this->astelefono_emp="";
            $this->asplaca_uni="";
            $this->asnombre_unimed="";
            $this->aspeso_sol="";
            $this->ascedula="";
            $this->asidrelacion_unidad="";
            $this->asnombres_per="";
            $this->astelefono_corp_per="";
            $this->asidunidad="";
            $this->asdireccion_salida="";
            $this->asdireccion_entrega="";
            $this->asfecha_salida="";
            $this->asfecha_entrega="";
            $this->asobservacion_rec="";
            $this->ashora_rec="";
            $this->asfecha_rec="";
            $this->ascedula_rep_rec="";
            $this->asnombre_rep_rec="";
            $this->asapellido_rep_rec="";
	}
		
	public function __destruct()
	{
            
	}
		
	public function fsetiidrecepcion_guia($piidrecepcion_guia)
	{
            $this->aiidrecepcion_guia=$piidrecepcion_guia;
	}
		
	public function fsetsn_guia($psn_guia)
	{
            $this->asn_guia=$psn_guia;
		
	}
	public function fsetsidempresa($psidempresa)
	{
            $this->asidempresa=$psidempresa;
		
	}
	public function fsetsnombre_razon_social_emp($psnombre_razon_social_emp)
	{
            $this->asnombre_razon_social_emp=$psnombre_razon_social_emp;
		
	}
	public function fsetsidremolque($psidremolque)
	{
            $this->asidremolque=$psidremolque;
		
	}
	public function fsetsplaca_rem($psplaca_rem)
	{
            $this->asplaca_rem=$psplaca_rem;
		
	}
	public function fsetsidorden_carga($psidorden_carga)
	{
            $this->asidorden_carga=$psidorden_carga;
		
	}
	public function fsetsnombre_pro($psnombre_pro)
	{
            $this->asnombre_pro=$psnombre_pro;
		
	}
	public function fsetstelefono_emp($pstelefono_emp)
	{
            $this->astelefono_emp=$pstelefono_emp;
		
	}
	public function fsetsplaca_uni($psplaca_uni)
	{
            $this->asplaca_uni=$psplaca_uni;
		
	}
	public function fsetsnombre_unimed($psnombre_unimed)
	{
            $this->asnombre_unimed=$psnombre_unimed;
		
	}
	public function fsetspeso_sol($pspeso_sol)
	{
            $this->aspeso_sol=$pspeso_sol;
		
	}
	public function fsetscedula($pscedula)
	{
            $this->ascedula=$pscedula;
		
	}
	public function fsetsidrelacion_unidad($psidrelacion_unidad)
	{
            $this->asidrelacion_unidad=$psidrelacion_unidad;
		
	}
	public function fsetsnombres_per($psnombres_per)
	{
            $this->asnombres_per=$psnombres_per;
		
	}
	public function fsetstelefono_corp_per($pstelefono_corp_per)
	{
            $this->astelefono_corp_per=$pstelefono_corp_per;
		
	}
	public function fsetsidunidad($psidunidad)
	{
            $this->asidunidad=$psidunidad;
		
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
	public function fsetsobservacion_rec($psobservacion_rec)
	{
            $this->asobservacion_rec=$psobservacion_rec;
		
	}
	public function fsetshora_rec($pshora_rec)
	{
            $this->ashora_rec=$pshora_rec;
		
	}
	public function fsetsfecha_rec($psfecha_rec)
	{
            $this->asfecha_rec=$psfecha_rec;
		
	}
	public function fsetscedula_rep_rec($pscedula_rep_rec)
	{
            $this->ascedula_rep_rec=$pscedula_rep_rec;
		
	}
	public function fsetsnombre_rep_rec($psnombre_rep_rec)
	{
            $this->asnombre_rep_rec=$psnombre_rep_rec;
		
	}
	public function fsetsapellido_rep_rec($psapellido_rep_rec)
	{
            $this->asapellido_rep_rec=$psapellido_rep_rec;
		
	}
		
	public function fgetiidrecepcion_guia()
	{
            return $this->aiidrecepcion_guia;
	}
		
	public function fgetsn_guia()
	{
            return $this->asn_guia;
	}
	public function fgetsidempresa()
	{
            return $this->asidempresa;
	}
	public function fgetsnombre_razon_social_emp()
	{
            return $this->asnombre_razon_social_emp;
	}
	public function fgetsidremolque()
	{
            return $this->asidremolque;
	}
	public function fgetsplaca_rem()
	{
            return $this->asplaca_rem;
	}
	public function fgetsidorden_carga()
	{
            return $this->asidorden_carga;
	}
	public function fgetsnombre_pro()
	{
            return $this->asnombre_pro;
	}
	public function fgetstelefono_emp()
	{
            return $this->astelefono_emp;
	}
	public function fgetsplaca_uni()
	{
            return $this->asplaca_uni;
	}
	public function fgetsnombre_unimed()
	{
            return $this->asnombre_unimed;
	}
	public function fgetspeso_sol()
	{
            return $this->aspeso_sol;
	}
	public function fgetscedula()
	{
            return $this->ascedula;
	}
	public function fgetsidrelacion_unidad()
	{
            return $this->asidrelacion_unidad;
	}
	public function fgetsnombres_per()
	{
            return $this->asnombres_per;
	}
	public function fgetstelefono_corp_per()
	{
            return $this->astelefono_corp_per;
	}
	public function fgetsidunidad()
	{
            return $this->asidunidad;
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
	public function fgetsobservacion_rec()
	{
            return $this->asobservacion_rec;
	}
	public function fgetshora_rec()
	{
            return $this->ashora_rec;
	}
	public function fgetsfecha_rec()
	{
            return $this->asfecha_rec;
	}
	public function fgetscedula_rep_rec()
	{
            return $this->ascedula_rep_rec;
	}
	public function fgetsnombre_rep_rec()
	{
            return $this->asnombre_rep_rec;
	}
	public function fgetsapellido_rep_rec()
	{
            return $this->asapellido_rep_rec;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select * from recepcion_guia, orden_carga, solicitud, cliente, producto, unidad_medida, relacion_unidad, persona, unidad, remolque where (recepcion_guia.idrecepcion_guia='$this->aiidrecepcion_guia' and recepcion_guia.idorden_carga=orden_carga.idorden_carga and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and  recepcion_guia.estatus_eliminado='1' )";
           
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                $this->aiidrecepcion_guia=$larow["idrecepcion_guia"];
                $this->asn_guia=$larow["n_guia"];
                $this->asidempresa=$larow["idcliente"];
                $this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
                $this->asidremolque=$larow["idremolque"];
                $this->asplaca_rem=$larow["placa_rem"];
                $this->asidorden_carga=$larow["idorden_carga"];
                $this->asnombre_pro=$larow["desc_prod"];
                $this->astelefono_emp=$larow["telefono_emp"];
                $this->asplaca_uni=$larow["placa"];
                $this->asnombre_unimed=$larow["desc_unid_medi"];
                $this->aspeso_sol=$larow["peso_sol"];
                $this->ascedula=$larow["cedula"];
                $this->asidrelacion_unidad=$larow["idrelacion_unidad"];
                $this->asnombres_per=$larow["nombres_per"];
                $this->astelefono_corp_per=$larow["telefono_corp_per"];
                $this->asidunidad=$larow["idunidad"];
                $this->asdireccion_salida=$larow["direccion_salida"];
                $this->asdireccion_entrega=$larow["direccion_entrega"];
                $this->asfecha_salida=$larow["fecha_salida"];
                $this->asfecha_entrega=$larow["fecha_entrega"];
                $this->asobservacion_rec=$larow["observacion_rec"];
                $this->ashora_rec=$larow["hora_rec"];
                $this->asfecha_rec=$larow["fecha_rec"];
                $this->ascedula_rep_rec=$larow["cedula_rep_rec"];
                $this->asnombre_rep_rec=$larow["nombre_rep_rec"];
                $this->asapellido_rep_rec=$larow["apellido_rep_rec"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','recepcionguia','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbenc;
	}
	public function fbuscar1()
	{
            $lbenc=false;
            $lssql="select * from orden_carga, solicitud, cliente, producto, unidad_medida, relacion_unidad, persona, unidad, remolque where (orden_carga.idorden_carga='$this->asidorden_carga' and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and orden_carga.estatus_eliminado='1' and orden_carga.idestatus_ordcar='emitida')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->aiidrecepcion_guia=$larow["idrecepcion_guia"];
                $this->asn_guia=$larow["n_guia"];
                $this->asidempresa=$larow["idcliente"];
                $this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
                $this->asidremolque=$larow["idremolque"];
                $this->asplaca_rem=$larow["placa_rem"];
                $this->asidorden_carga=$larow["idorden_carga"];
                $this->asnombre_pro=$larow["desc_prod"];
                $this->astelefono_emp=$larow["telefono_emp"];
                $this->asplaca_uni=$larow["placa"];
                $this->asnombre_unimed=$larow["desc_unid_medi"];
                $this->aspeso_sol=$larow["peso_sol"];
                $this->ascedula=$larow["cedula"];
                $this->asidrelacion_unidad=$larow["idrelacion_unidad"];
                $this->asnombres_per=$larow["nombres_per"];
                $this->astelefono_corp_per=$larow["telefono_corp_per"];
                $this->asidunidad=$larow["idunidad"];
                $this->asdireccion_salida=$larow["direccion_salida"];
                $this->asdireccion_entrega=$larow["direccion_entrega"];
                $this->asfecha_salida=$larow["fecha_salida"];
                $this->asfecha_entrega=$larow["fecha_entrega"];
                $this->asobservacion_rec=$larow["observacion_rec"];
                $this->ashora_rec=$larow["hora_rec"];
                $this->asfecha_rec=$larow["fecha_rec"];
                $this->ascedula_rep_rec=$larow["cedula_rep_rec"];
                $this->asnombre_rep_rec=$larow["nombre_rep_rec"];
                $this->asapellido_rep_rec=$larow["apellido_rep_rec"];
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
            $lssql="
            
					insert into recepcion_guia
					
					(
					
						idrecepcion_guia,
						hora_rec,
						fecha_rec,
						cedula_rep_rec,
						nombre_rep_rec,
						apellido_rep_rec,
						idorden_carga,
						n_guia,
						observacion_rec,
						estatus_eliminado
						
						
					)
					
					values
					
					(
					
						'$this->aiidrecepcion_guia',
						'$this->ashora_rec',
						'$this->asfecha_rec',
						'$this->ascedula_rep_rec',
						'$this->asnombre_rep_rec',
						'$this->asapellido_rep_rec',
						'$this->asidorden_carga',
						'$this->asn_guia',
						'$this->asobservacion_rec',
						'1'
						
					)
					
				   ";
            $lbhecho=$this->fejecutar($lssql);
            if ($lbhecho)
			{				
				if ('$this->aiidrecepcion_guia'!="0")
				{
					$lssql="update orden_carga set idestatus_ordcar='ejecutada'  where (idorden_carga='$this->asidorden_carga')";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
            
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','recepcionguia','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
	public function IncluirGuia()
        {
            $lbhecho=false;
            $this->fconectar();
            $this->fbegin();
            $lssql="
            
					insert into recepcion_guia
					
					(
						idorden_carga,
						n_guia,
						observacion_recgui,
						eliminado_recgui
						
						
					)
					
					values
					
					(
						'$this->asidorden_carga',
						'$this->asn_guia',
						'$this->asobservacion_rec',
						'0'
						
					)
					
				   ";
            $lbhecho=$this->fejecutar($lssql);
            if ($lbhecho)
			{				
				if ('$this->aiidrecepcion_guia'!="0")
				{
					$lssql="update orden_carga, relacion_unidad set estatus_ordcar='ejecutada', estatus_reluni='activa'  where (idorden_carga='$this->asidorden_carga' and orden_carga.idrelacion_unidad=relacion_unidad.idconductor)";
					$lbhecho2=$this->fejecutar($lssql);
					if (!$lbhecho2)
					{
						$lbhecho=false;
					}
				}
			}
			if ($lbhecho)
			{
				$this->fcommit();
			}
			else
			{
				$this->frollback();
			}
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','recepcionguia','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
        {
            $lbhecho=false;
            $this->fconectar();
            $lssql="
            
						update recepcion_guia set 
						
						n_guia='$this->asn_guia' ,
						observacion_rec='$this->asobservacion_rec' 
						
						where (idrecepcion_guia='$this->aiidrecepcion_guia')";
            $lbhecho=$this->fejecutar($lssql);
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','recepcionguia','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
            $lssql="update  recepcion_guia set estatus_eliminado='2'  where (idrecepcion_guia='$this->aiidrecepcion_guia')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Elimino Registro','recepcionguia','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function flistar()
        {
            $lamatriz=array();
            $lii=0;
            $lssql="select rg.idrecepcion_guia, rg.fecha_rec,rg.hora_rec, rg.cedula_rep_rec, rg.apellido_rep_rec, rg.nombre_rep_rec, rg.n_guia, rg.observacion_rec,
								oc.idorden_carga, oc.fecha_ord, oc.cedula_rep_ord, s.idsolicitud, s.fecha_sol, s.cedula_res, s.nombre_res, s.fecha_entrega, s.direccion_entrega,
								s.peso_sol, s.precio_sol, s.idtabulador, c.idcliente, c.nombre_razon_social_emp, c.telefono_cont, p.idproducto, p.desc_prod,
								rl.idrelacion_unidad, rl.cedula, rl.idremolque, rl.idunidad
												from  recepcion_guia as rg
												inner join orden_carga as oc
												inner join solicitud as s
												inner join cliente as c
												inner join producto as p
												inner join relacion_unidad as rl
												where (rg.idorden_carga=oc.idorden_carga) and (oc.idsolicitud=s.idsolicitud) and(s.idcliente=c.idcliente)
												and (s.idproducto=p.idproducto) and (oc.idrelacion_unidad=rl.idrelacion_unidad)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
					$lamatriz[$lii][0]=$larow["idrecepcion_guia"];
					$lamatriz[$lii][1]=$larow["fecha_rec"];
					$lamatriz[$lii][2]=$larow["hora_rec"];
					$lamatriz [$lii] [3]= $larow ["cedula_rep_rec"];
					$lamatriz [$lii] [4]= $larow ["nombre_rep_rec"];					
					$lamatriz [$lii] [5]= $larow ["apellido_rep_rec"];					
					
					$lamatriz [$lii] [7]= $larow ["n_guia"];
					$lamatriz [$lii] [8]= $larow ["observacion_rec"];
					$lamatriz [$lii] [9]= $larow ["idorden_carga"];
					$lamatriz [$lii] [10]= $larow ["fecha_ord"];
					$lamatriz [$lii] [11]= $larow ["cedula_rep_ord"];
					$lamatriz [$lii] [12]= $larow ["idsolicitud"];
					$lamatriz [$lii] [13]= $larow ["cedula_res"];
					$lamatriz [$lii] [14]= $larow ["nombre_res"];
					$lamatriz [$lii] [15]= $larow ["fecha_entrega"];
					$lamatriz [$lii] [16]= $larow ["direccion_entrega"];
					$lamatriz [$lii] [17]= $larow ["peso_sol"];
					$lamatriz [$lii] [18]= $larow ["precio_sol"];
					$lamatriz [$lii] [19]= $larow ["idtabulador"];
					$lamatriz [$lii] [20]= $larow ["idcliente"];
					$lamatriz [$lii] [21]= $larow ["nombre_razon_social_emp"];
					$lamatriz [$lii] [22]= $larow ["telefono_cont"];
					$lamatriz [$lii] [23]= $larow ["idproducto"];
					$lamatriz [$lii] [24]= $larow ["idrelacion_unidad"];
					$lamatriz [$lii] [25]= $larow ["cedula"];
					$lamatriz [$lii] [26]= $larow ["idremolque"];
					$lamatriz [$lii] [27]= $larow ["idunidad"];
										
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
		
	public function fnuevo()
        {
            $lssql="select max(idrecepcion_guia) as mayor from recepcion_guia";
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
    }
    
?>
