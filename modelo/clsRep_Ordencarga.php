<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_ordencarga extends db{
		
		private $asbusqueda;

		
		public function constuctor () {
			$this->asbusqueda="";

			
		}
		public function destructor (){
		}
		
		public function fSetsbusqueda($psbusqueda){
			$this->asbusqueda=$psbusqueda;
		}

		
		public function fGetsbusqueda(){
			return $this->asbusqueda;
		}
	
	
		public function fBusqueda(){
			$liI=0;
			if($this->asbusqueda=="-"){
				$lsSql=" select s.idsolicitud, s.idproducto, p. desc_prod, s.direccion_entrega,s.direccion_salida, o.idorden_carga, o.fecha_ord, o.hora_ord, r.idrelacion_unidad, r.cedula, u.idunidad, u.placa, re.idremolque, re.placa_rem, e.idcliente, e.telefono_emp, e.nombre_razon_social_emp, pe.nombres_per, pe.telefono_corp_per,pe.apellidos_per
												from orden_carga as o
												inner join solicitud as s
												inner join relacion_unidad as r
												inner join producto as p
												inner join persona as pe
												inner join remolque as re
												inner join cliente as e
												inner join unidad as u
												where (o.idorden_carga=s.idsolicitud)and (s.idproducto=p.idproducto)
												 and (o.idrelacion_unidad=r.idrelacion_unidad) and (r.cedula=pe.cedula) and (r.idremolque=re.idremolque) and (r.idunidad=u.idunidad) and (o.estatus_eliminado='1') and (e.idcliente=s.idcliente)";
												
			}else if ($this->asbusqueda!="")
			{
				$lsSql="select s.idsolicitud, s.idproducto, p. desc_prod, s.direccion_entrega,s.direccion_salida, o.idorden_carga, o.fecha_ord, o.hora_ord, r.idrelacion_unidad, r.cedula, u.idunidad, u.placa, re.idremolque, re.placa_rem, e.idcliente, e.telefono_emp, e.nombre_razon_social_emp, pe.nombres_per, pe.telefono_corp_per,pe.apellidos_per
												from orden_carga as o
												inner join solicitud as s
												inner join relacion_unidad as r
												inner join producto as p
												inner join persona as pe
												inner join remolque as re
												inner join cliente as e
												inner join unidad as u
												where (o.idorden_carga=s.idsolicitud)and (s.idproducto=p.idproducto)
												and (r.cedula=pe.cedula) and (o.idrelacion_unidad=r.idrelacion_unidad)  and (r.idremolque=re.idremolque) and (o.estatus_eliminado=1) and (e.idcliente=s.idcliente) and (r.idunidad=u.idunidad) and(o.idorden_carga='$this->asbusqueda')";
	
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idorden_carga"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_ord"];
					$laMatriz [$liI] [2]= $laTupla ["hora_ord"];
					$laMatriz [$liI] [3]= $laTupla ["idunidad"];
					$laMatriz [$liI] [4]= $laTupla ["desc_prod"];					
					$laMatriz [$liI] [5]= $laTupla ["cedula"];					
					$laMatriz [$liI] [6]= $laTupla ["nombres_per"];					
					$laMatriz [$liI] [7]= $laTupla ["placa"];					
					$laMatriz [$liI] [8]= $laTupla ["direccion_entrega"];					
					$laMatriz [$liI] [9]= $laTupla ["direccion_salida"];
					$laMatriz [$liI] [10]= $laTupla ["placa"];
					$laMatriz [$liI] [11]= $laTupla ["idremolque"];
					$laMatriz [$liI] [12]= $laTupla ["placa_rem"];
					$laMatriz [$liI] [13]= $laTupla ["idcliente"];
					$laMatriz [$liI] [14]= $laTupla ["nombre_razon_social_emp"];
					$laMatriz [$liI] [15]= $laTupla ["telefono_emp"];
					$laMatriz [$liI] [16]= $laTupla ["apellidos_per"];
					
										
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
