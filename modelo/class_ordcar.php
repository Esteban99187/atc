<?php

    require_once("class_db.php");
    
    class class_ordcar extends class_db
    {
    
    private $aiidorden_carga;
	private $asidestatus_ordcar;
	private $asidempresa;
	private $asnombre_razon_social_emp;
	private $asidremolque;
	private $asplaca_rem;
	private $asidsolicitud;
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
	private $ashora_ord;
	private $asfecha_ord;
	private $ascedula_rep_ord;
	private $asnombre_rep_ord;
	private $asapellido_rep_ord;
	private $asunidades_req;
	private $asunidades_asi;
	private $ascontador;
        
	public function __construct()
	{
            $this->aiidorden_carga=0;
            $this->asidestatus_ordcar="";
            $this->asnombre_razon_social_emp="";
            $this->asidremolque="";
            $this->asplaca_rem="";
            $this->asidempresa="";
            $this->asidsolicitud="";
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
            $this->ashora_ord="";
            $this->asfecha_ord="";
            $this->ascedula_rep_ord="";
            $this->asnombre_rep_ord="";
            $this->asapellido_rep_ord="";
            $this->asunidades_req="";
            $this->asunidades_asi="";
            $this->ascontador="";
	}
		
	public function __destruct()
	{
            
	}
		
	public function fsetiidorden_carga($piidorden_carga)
	{
            $this->aiidorden_carga=$piidorden_carga;
	}
		
	public function fsetsidestatus_ordcar($psidestatus_ordcar)
	{
            $this->asidestatus_ordcar=$psidestatus_ordcar;
		
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
	public function fsetsidsolicitud($psidsolicitud)
	{
            $this->asidsolicitud=$psidsolicitud;
		
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
	public function fsetshora_ord($pshora_ord)
	{
            $this->ashora_ord=$pshora_ord;
		
	}
	public function fsetsfecha_ord($psfecha_ord)
	{
            $this->asfecha_ord=$psfecha_ord;
		
	}
	public function fsetscedula_rep_ord($pscedula_rep_ord)
	{
            $this->ascedula_rep_ord=$pscedula_rep_ord;
		
	}
	public function fsetsnombre_rep_ord($psnombre_rep_ord)
	{
            $this->asnombre_rep_ord=$psnombre_rep_ord;
		
	}
	public function fsetsapellido_rep_ord($psapellido_rep_ord)
	{
            $this->asapellido_rep_ord=$psapellido_rep_ord;
		
	}
	public function fsetsunidades_req($psunidades_req)
	{
            $this->asunidades_req=$psunidades_req;
		
	}
	public function fsetsunidades_asi($psunidades_asi)
	{
            $this->asunidades_asi=$psunidades_asi;
		
	}
	public function fsetscontador($pscontador)
	{
            $this->ascontador=$pscontador;
		
	}
		
	public function fgetiidorden_carga()
	{
            return $this->aiidorden_carga;
	}
		
	public function fgetsidestatus_ordcar()
	{
            return $this->asidestatus_ordcar;
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
	public function fgetsidsolicitud()
	{
            return $this->asidsolicitud;
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
	public function fgetshora_ord()
	{
            return $this->ashora_ord;
	}
	public function fgetsfecha_ord()
	{
            return $this->asfecha_ord;
	}
	public function fgetscedula_rep_ord()
	{
            return $this->ascedula_rep_ord;
	}
	public function fgetsnombre_rep_ord()
	{
            return $this->asnombre_rep_ord;
	}
	public function fgetsapellido_rep_ord()
	{
            return $this->asapellido_rep_ord;
	}
	public function fgetsunidades_req()
	{
            return $this->asunidades_req;
	}
	public function fgetsunidades_asi()
	{
            return $this->asunidades_asi;
	}
	public function fgetscontador()
	{
            return $this->ascontador;
	}
		
	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select *, date_format(fecha_ord,'%d/%m/%Y') as fecha_ord from orden_carga, solicitud, cliente, producto, unidad_medida, relacion_unidad, persona, unidad, remolque where (orden_carga.idorden_carga='$this->aiidorden_carga' and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and orden_carga.estatus_eliminado='1')";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                $this->aiidorden_carga=$larow["idorden_carga"];
                $this->asidestatus_ordcar=$larow["idestatus_ordcar"];
                $this->asidempresa=$larow["idcliente"];
                $this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
                $this->asidremolque=$larow["idremolque"];
                $this->asplaca_rem=$larow["placa_rem"];
                $this->asidsolicitud=$larow["idsolicitud"];
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
                $this->ashora_ord=$larow["hora_ord"];
                $this->asfecha_ord=$larow["fecha_ord"];
                $this->ascedula_rep_ord=$larow["cedula_rep_ord"];
                $this->asnombre_rep_ord=$larow["nombre_rep_ord"];
                $this->asapellido_rep_ord=$larow["apellido_rep_ord"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','ordencarga','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbenc;
	}
	public function fbuscar1()
	{
            $lbenc=false;
            $lssql="SELECT * FROM solicitud, cliente, producto, unidad_medida  WHERE (idsolicitud='$this->asidsolicitud' and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and solicitud.estatus_soli='1' and solicitud.estatus_eliminado='1' )";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->asidempresa=$larow["idcliente"];
                $this->asnombre_razon_social_emp=$larow["nombre_razon_social_emp"];
                $this->asidsolicitud=$larow["idsolicitud"];
                $this->asnombre_pro=$larow["desc_prod"];
                $this->astelefono_emp=$larow["telefono_emp"];
                $this->asnombre_unimed=$larow["desc_unid_medi"];
                $this->aspeso_sol=$larow["peso_sol"];
                $this->asdireccion_salida=$larow["direccion_salida"];
                $this->asdireccion_entrega=$larow["direccion_entrega"];
                $this->asfecha_salida=$larow["fecha_salida"];
                $this->asfecha_entrega=$larow["fecha_entrega"];
                $lbenc=true;
				
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
	
	public function fbuscar2()
	{
            $lbenc=false;
            $lssql="SELECT persona.cedula, nombres_per, telefono_corp_per, idrelacion_unidad, relacion_unidad.idunidad, placa, relacion_unidad.idremolque, placa_rem    FROM persona, relacion_unidad, unidad, remolque  WHERE (persona.cedula='$this->ascedula' and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque )";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                
                
                $this->ascedula_rep_ord=$larow["cedula"];
                $this->asnombres_per=$larow["nombres_per"];
                $this->astelefono_corp_per=$larow["telefono_corp_per"];
                $this->asidremolque=$larow["idremolque"];
                $this->asplaca_rem=$larow["placa_rem"];
                $this->asplaca_uni=$larow["placa"];
                $this->asidunidad=$larow["idunidad"];
                $this->asidrelacion_unidad=$larow["idrelacion_unidad"];
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
            $this->asfecha_ord=$this->fFechaBD($this->asfecha_ord);
            $this->fbegin();
            $lssql="
            
					insert into orden_carga 
					
					(
					
						idorden_carga,
						estatus_ordcar,
						idsolicitud,
						idrelacion_unidad,
						fecha_hora_ordcar,
						eliminado_ordcar
						
					)
					
					values
					
					(
					
						'$this->aiidorden_carga',
						'$this->asidestatus_ordcar',
						'$this->asidsolicitud',
						'$this->ascedula',
						'$this->ashora_ord',
						'1'
						
					)
					
				   ";
            $lbhecho=$this->fejecutar($lssql);
            
            if ($lbhecho)
			{				
				if ('$this->aiidorden_carga'!="0")
				{
					
					
					 $lssql="select idsolicitud, unidades_asignadas_sol, unidades_req_sol from  solicitud where (idsolicitud='$this->asidsolicitud')";
					 $lrtb=$this->ffiltro($lssql);
					 if($larow=$this->fproximo($lrtb))
						{
							
							
							$unidades_asi=$larow["unidades_asignadas_sol"];
							$contador=$larow["unidades_asignadas_sol"]+1;
							$unidades_req=$larow["unidades_req_sol"];
							$lbenc=true;
							
						}				
					$this->fcierrafiltro($lrtb);
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
            
            if ($lbhecho)
			{				
				if ($unidades_asi < $unidades_req)
				{
					$lssql="update solicitud set unidades_asignadas_sol='$contador'  where (idsolicitud='$this->asidsolicitud')";
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
            if ($lbhecho)
			{				
				if ($contador == $unidades_req)
				{
					//~ $lssql="update solicitud set estatus_sol='2',  idestatus='procesada'  where (idsolicitud='$this->asidsolicitud')";
					$lssql="update solicitud set   estatus_sol='procesada'  where (idsolicitud='$this->asidsolicitud')";
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
			$this->Bitacora('Incluyo Registro','ordencarga','sistema');
			//~ fin del registro de la Bitacora
            
            $this->fdesconectar();
            return $lbhecho;
	}
	public function IncluirOrden()
        {
            $lbhecho=false;
            $this->fconectar();
            $this->asfecha_ord=$this->fFechaBD($this->asfecha_ord);
            $this->fbegin();
            $lssql="
            
					insert into orden_carga 
					
					(
					
						idorden_carga,
						estatus_ordcar,
						idsolicitud,
						idrelacion_unidad,
						fecha_hora_ordcar,
						eliminado_ordcar
						
					)
					
					values
					
					(
					
						'$this->aiidorden_carga',
						'$this->asidestatus_ordcar',
						'$this->asidsolicitud',
						'$this->ascedula',
						'$this->ashora_ord',
						'1'
						
					)
					
				   ";
            $lbhecho=$this->fejecutar($lssql);
            
            if ($lbhecho)
			{				
				if ('$this->aiidorden_carga'!="0")
				{
					
					
					 $lssql="select idsolicitud, unidades_asignadas_sol, unidades_req_sol from  solicitud where (idsolicitud='$this->asidsolicitud')";
					 $lrtb=$this->ffiltro($lssql);
					 if($larow=$this->fproximo($lrtb))
						{
							
							
							$unidades_asi=$larow["unidades_asignadas_sol"];
							$contador=$larow["unidades_asignadas_sol"]+1;
							$unidades_req=$larow["unidades_req_sol"];
							$lbenc=true;
							
						}				
					$this->fcierrafiltro($lrtb);
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
            
            if ($lbhecho)
			{				
				if ($unidades_asi < $unidades_req)
				{
					$lssql="update solicitud set unidades_asignadas_sol='$contador'  where (idsolicitud='$this->asidsolicitud')";
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
            if ($lbhecho)
			{				
				if ($contador == $unidades_req)
				{
					//~ $lssql="update solicitud set estatus_sol='2',  idestatus='procesada'  where (idsolicitud='$this->asidsolicitud')";
					$lssql="update solicitud set   estatus_sol='ejecutada'  where (idsolicitud='$this->asidsolicitud')";
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
            if ($lbhecho)
			{				
				if ($contador == $unidades_req)
				{
					//~ $lssql="update solicitud set estatus_sol='2',  idestatus='procesada'  where (idsolicitud='$this->asidsolicitud')";
					$lssql="update relacion_unidad set   estatus_reluni='viajando'  where (idconductor='$this->ascedula')";
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
			$this->Bitacora('Incluyo Registro','ordencarga','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
	    
	public function fmodificar()
        {
            $lbhecho=false;
            $this->fconectar();
            $lssql="
            
						update orden_carga set 
						
						idrelacion_unidad='$this->asidrelacion_unidad' 
						
						where (idorden_carga='$this->aiidorden_carga')";
            $lbhecho=$this->fejecutar($lssql);
             //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','ordencarga','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
		
	public function feliminar()
	{
            $lbhecho=false;
            $lssql="update orden_carga set estatus_eliminado='2'  where (idorden_carga='$this->aiidorden_carga')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
             //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Eliminar Registro','ordencarga','sistema');
			//~ fin del registro de la Bitacora
            $this->fdesconectar();
            return $lbhecho;
	}
		
		
	public function flistarpdf()
       {
           $lamatriz=array();
           $lii=0;
           $lssql="select * from orden_carga, solicitud, VTabuladorDestino, VTabuladorOrigen, tipo_unidad, capacidad, unidad_medida , cliente, solicitud_producto, producto, tipo_producto, remolque, persona, relacion_unidad, unidad 
           where (orden_carga.idorden_carga='$this->aiidorden_carga' 
           and  orden_carga.idsolicitud=solicitud.idsolicitud
           and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen
           and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
           and solicitud.idcliente_sol=cliente.idcliente 
           and solicitud.idtipo_unidad_sol=tipo_unidad.idtipo_unidad 
           and tipo_unidad.idcapacidad=capacidad.idcapacidad 
           and capacidad.idunidad_medida=unidad_medida.idunidad_medida
           and solicitud_producto.solicitud_idsolicitud=solicitud.idsolicitud
           and solicitud_producto.producto_idproducto=producto.idproducto
           and producto.idtipo_producto=tipo_producto.idtipo_producto
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor)";
          
           $this->fconectar();
           $lrtb=$this->ffiltro($lssql);
           while($larow=$this->fproximo($lrtb))
           {
               $lamatriz[$lii][0]=$larow["idorden_carga"];
               $lamatriz[$lii][1]=$larow["fecha_hora_ordcar"];
               $lamatriz[$lii][2]=$larow["cedula"];
               $lamatriz[$lii][3]=$larow["idunidad"];
               $lamatriz[$lii][4]=$larow["placa"];
               $lamatriz[$lii][5]=$larow["idremolque"]; 
               $lamatriz[$lii][6]=$larow["placa_rem"];
               $lamatriz[$lii][7]=$larow["idcliente"];
               $lamatriz[$lii][8]=$larow["nombre_cli"];
               $lamatriz[$lii][9]=$larow["telefono_cli"];
               $lamatriz[$lii][10]=$larow["direccion_entrega_sol"];
               $lamatriz[$lii][11]=$larow["direccion_salida_sol"];
               $lamatriz[$lii][12]=$larow["nombres_per"];
               $lamatriz[$lii][13]=$larow["apellidos_per"];
               $lamatriz[$lii][14]=$larow["desc_prod"];
               $lamatriz[$lii][15]=$larow["idsolicitud"];
               $lamatriz[$lii][16]=$larow["fecha_entrega_sol"];
               $lamatriz[$lii][17]=$larow["fecha_salida_sol"];
               $lamatriz[$lii][19]=$larow["pais_origen_vto"];
                $lamatriz[$lii][20]=$larow["estado_origen_vto"];
                $lamatriz[$lii][21]=$larow["municipio_origen_vto"];
                $lamatriz[$lii][22]=$larow["parroquia_origen_vto"];
                $lamatriz[$lii][23]=$larow["ciudad_origen_vto"];
                $lamatriz[$lii][24]=$larow["pais_destino_vtd"];
                $lamatriz[$lii][25]=$larow["estado_destino_vtd"];
                $lamatriz[$lii][26]=$larow["municipio_destino_vtd"];
                $lamatriz[$lii][27]=$larow["parroquia_destino_vtd"];
                $lamatriz[$lii][28]=$larow["ciudad_destino_vtd"];
                $lamatriz[$lii][29]=$larow["direccion_entrega_sol"];
                $lamatriz[$lii][30]=$larow["direccion_salida_sol"];
			 $lii++;
           }
           $this->fcierrafiltro($lrtb);
           $this->fdesconectar();
           return $lamatriz;
}

	
	
	
	
	
	
	public function flistar()
       {
           $lamatriz=array();
           $lii=0;
           $lssql="select * from orden_carga order by idorden_carga";
           $this->fconectar();
           $lrtb=$this->ffiltro($lssql);
           while($larow=$this->fproximo($lrtb))
           {
               $lamatriz[$lii][0]=$larow["idorden_carga"];
               $lamatriz[$lii][1]=$larow["fecha_ord"];
               $lamatriz[$lii][2]=$larow["hora_ord"];
               $lamatriz[$lii][3]=$larow["cedula_rep_ord"];
               $lamatriz[$lii][4]=$larow["nombre_rep_ord"];
               $lamatriz[$lii][5]=$larow["apellido_rep_ord"];
               
               $lamatriz[$lii][6]=$larow["idestatus_ordcar"];
               $lamatriz[$lii][7]=$larow["idsolicitud"];
               $lamatriz[$lii][8]=$larow["idrelacion_unidad"];
$lii++;
           }
           $this->fcierrafiltro($lrtb);
           $this->fdesconectar();
           return $lamatriz;
}

	public function flistar2()
       {
           $lamatriz=array();
           $lii=0;
           $lssql="select * from orden_carga where (orden_carga.idestatus_ordcar='Emitida')";
           $this->fconectar();
           $lrtb=$this->ffiltro($lssql);
           while($larow=$this->fproximo($lrtb))
           {
               $lamatriz[$lii][0]=$larow["idorden_carga"];
               $lamatriz[$lii][1]=$larow["fecha_ord"];
               $lamatriz[$lii][2]=$larow["hora_ord"];
               $lamatriz[$lii][3]=$larow["cedula_rep_ord"];
               $lamatriz[$lii][4]=$larow["nombre_rep_ord"];
               $lamatriz[$lii][5]=$larow["apellido_rep_ord"];
               
               $lamatriz[$lii][6]=$larow["idestatus_ordcar"];
               $lamatriz[$lii][7]=$larow["idsolicitud"];
               $lamatriz[$lii][8]=$larow["idrelacion_unidad"];
$lii++;
           }
           $this->fcierrafiltro($lrtb);
           $this->fdesconectar();
           return $lamatriz;
}
		
	public function fnuevo()
        {
            $lssql="select max(idorden_carga) as mayor from orden_carga";
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
	
	
	public function flistadoordcar($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "select * from orden_carga, solicitud, cliente, producto, unidad_medida, relacion_unidad, persona, unidad, remolque where (orden_carga.idorden_carga='$parametro1' and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and orden_carga.estatus_eliminado='1' and orden_carga.idestatus_ordcar='emitida')";
			
		  if($parametro2!="")//por nombre
			$sql      = "select * from orden_carga, solicitud, cliente, producto, unidad_medida, relacion_unidad, persona, unidad, remolque where (relacion_unidad.cedula='$parametro2' and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and orden_carga.estatus_eliminado='1' and orden_carga.idestatus_ordcar='emitida')";
			
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idorden_carga"];
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
				   $filas [$contador][12] = $laRow["cedula"];	
				   $filas [$contador][13] = $laRow["nombres_per"];	
				   $filas [$contador][14] = $laRow["telefono_corp_per"];	
				   $filas [$contador][15] = $laRow["idunidad"];	
				   $filas [$contador][16] = $laRow["placa"];	
				   $filas [$contador][17] = $laRow["idremolque"];	
				   $filas [$contador][18] = $laRow["placa_rem"];	
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
	public function flistadoorden_carga($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM orden_carga ,solicitud,cliente,producto,unidad_medida,capacidad,relacion_unidad,remolque,persona,unidad WHERE (idorden_carga='$parametro1' and orden_carga.idsolicitud=solicitud.idsolicitud and solicitud.idcliente=cliente.idcliente and solicitud.idproducto=producto.idproducto and producto.idunidad_medida=unidad_medida.idunidad_medida and capacidad.idcapacidad=capacidad.idcapacidad and orden_carga.idrelacion_unidad=relacion_unidad.idrelacion_unidad and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque and orden_carga.estatus_eliminado='1' and orden_carga.idestatus_ordcar='emitida')";
			
		  if($parametro2!="")//por nombre
			$sql      = "SELECT * FROM orden_carga WHERE (idsolicitud='$parametro2' )";
			
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idorden_carga"];
				   $filas [$contador][2] = $laRow["fecha_ord"];
				   $filas [$contador][3] = $laRow["hora_ord"];	
				   $filas [$contador][4] = $laRow["cedula_rep_ord"];
				   $filas [$contador][5] = $laRow["nombre_rep_ord"];
				   $filas [$contador][6] = $laRow["apellido_rep_ord"];
				   $filas [$contador][7] = $laRow["idsolicitud"];
				   $filas [$contador][8] = $laRow["nombre_razon_social_emp"];
				   $filas [$contador][9] = $laRow["telefono_emp"];
				   $filas [$contador][10] = $laRow["desc_prod"];
				   $filas [$contador][11] = $laRow["idcliente"];
				   $filas [$contador][12] = $laRow["desc_unid_medi"];
				   $filas [$contador][13] = $laRow["capacidad"];
				   $filas [$contador][14] = $laRow["fecha_entrega"];
				   $filas [$contador][15] = $laRow["fecha_salida"];
				   $filas [$contador][16] = $laRow["direccion_salida"];
				   $filas [$contador][17] = $laRow["direccion_entrega"];
				   $filas [$contador][18] = $laRow["cedula"];
				   $filas [$contador][19] = $laRow["nombres_per"];
				   $filas [$contador][20] = $laRow["telefono_corp_per"];
				   $filas [$contador][21] = $laRow["idunidad"];
				   $filas [$contador][22] = $laRow["placa"];
				   $filas [$contador][23] = $laRow["idremolque"];
				   $filas [$contador][24] = $laRow["placa_rem"];
				   $filas [$contador][25] = $laRow["idestatus_ordcar"];
				   
				  
				   
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
	
			public function fContar(){
		    $lcSql="SELECT MAX(idorden_carga) mayor FROM orden_carga";
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
		
		public function reporteordencargaemitida()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as emitidas FROM orden_carga WHERE (estatus_ordcar='Emitida')";
			$consulta = $this->ffiltro($sql);
			$datos = $this->fproximo($consulta);
			return $datos;
		}
		public function reporteordencargaejecutada()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as ejecutadas FROM orden_carga WHERE (estatus_ordcar='ejecutada')";
			$consulta = $this->ffiltro($sql);
			$datos1 = $this->fproximo($consulta);
			return $datos1;
		}
		public function reporteordencarga()
		{
			$this->fconectar();
			$sql = " SELECT COUNT(*) as ordenes from orden_carga";
			$consulta = $this->ffiltro($sql);
			$datos2 = $this->fproximo($consulta);
			return $datos2;
		}
		public function ListaOrdcarEmitida()
		{
			$this->fconectar();
			$sql = "select *, date_format(fecha_hora_ordcar,'%d/%m/%Y') as fecha_ordcar, date_format(fecha_hora_ordcar,'%h:%i:%s') as hora_ordcar  from orden_carga, VRelcon where orden_carga.idrelacion_unidad=VRelcon.IdVRelcon";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idsolicitud = $rol["idsolicitud"];
				if($rol["estatus_ordcar"] == 'Emitida')
				{
					echo "
					<form method='post' name='fordcar' id='fordcar' action='../controlador/control_transaccion_recgui.php'>
						<input  readonly type='hidden' name='txtidorden_carga' value=".$rol['idorden_carga'].">
						<input type='hidden' name='txtoperacion'    value='IncluirGuia'>
						<tr>
							<td>".$rol['idorden_carga']."</td>
							<td>".$rol['idrelacion_unidad']."</td>
							<td>".strtoupper($rol['nombre_vrc']).' '.strtoupper($rol['apellido_vrc'])."</td>
							<td>".$rol['fecha_ordcar']."</td>
							<td>".$rol['hora_ordcar']."</td>
							<td><input  class='form-control' type='text' name='txtn_guia' ></td>
							<td><button type='submit' name='btnguardar' value='Guardar' class='btn btn-primary'>Guardar</button></td>
						</tr>
					</form>";
				}
			}
		}
	
    }
    
?>
