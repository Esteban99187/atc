<?php
	include ("class_db.php");
	
	class clsRep_Orden_conductor extends class_db{
		
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
				$lsSql="select s.idsolicitud, s.direccion_entrega_sol,s.direccion_salida_sol, o.idorden_carga, o.fecha_hora_ordcar, date_format(o.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ord, o.estatus_ordcar, r.idconductor, r.idremolque_reluni, u.idunidad, u.placa, re.idremolque, re.placa_rem, e.idcliente, e.telefono_cli, e.nombre_cli, pe.cedula, pe.nombres_per, pe.telefono_corp_per,pe.apellidos_per
           from orden_carga as o
            inner join solicitud as s 
            inner join relacion_unidad as r 
            inner join persona as pe 
            inner join remolque as re 
            inner join cliente as e 
            inner join unidad as u 
            where (o.idsolicitud=s.idsolicitud) and (o. idrelacion_unidad=r.idconductor) and (r.idconductor=pe.cedula) 
            and (r.idremolque_reluni=re.idremolque) and (e.idcliente=s.idcliente_sol) 
            and (r.idunidad_reluni=u.idunidad)";
			}else{
				$lsSql="select s.idsolicitud, s.direccion_entrega_sol,s.direccion_salida_sol, o.idorden_carga, o.fecha_hora_ordcar, date_format(o.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ord, o.estatus_ordcar, r.idconductor, r.idremolque_reluni, u.idunidad, u.placa, re.idremolque, re.placa_rem, e.idcliente, e.telefono_cli, e.nombre_cli, pe.cedula, pe.nombres_per, pe.telefono_corp_per,pe.apellidos_per
           from orden_carga as o
            inner join solicitud as s 
            inner join relacion_unidad as r 
            inner join persona as pe 
            inner join remolque as re 
            inner join cliente as e 
            inner join unidad as u 
            where (o.idsolicitud=s.idsolicitud) and (o. idrelacion_unidad=r.idconductor) and (r.idconductor=pe.cedula) 
            and (r.idremolque_reluni=re.idremolque) and (e.idcliente=s.idcliente_sol) 
            and (r.idunidad_reluni=u.idunidad) and (pe.cedula='$this->asbusqueda')"; 
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idorden_carga"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_ord"];
					$laMatriz [$liI] [2]= $laTupla ["cedula"];
					$laMatriz [$liI] [3]= $laTupla ["idunidad"];
					$laMatriz [$liI] [4]= $laTupla ["placa"];
					$laMatriz [$liI] [5]= $laTupla ["idremolque"];
					$laMatriz [$liI] [6]= $laTupla ["placa_rem"];
					$laMatriz [$liI] [7]= $laTupla ["idcliente"];
					$laMatriz [$liI] [8]= $laTupla ["nombre_cli"];
					$laMatriz [$liI] [9]= $laTupla ["telefono_cli"];
					$laMatriz [$liI] [10]= $laTupla ["direccion_entrega_sol"];
					$laMatriz [$liI] [11]= $laTupla ["direccion_salida_sol"];
					$laMatriz [$liI] [12]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [13]= $laTupla ["apellidos_per"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
