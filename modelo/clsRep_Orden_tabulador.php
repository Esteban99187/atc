<?php
	include ("class_db.php");
	
	class clsRep_Orden_tabulador extends class_db{
		
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
				$lsSql="select * , date_format(orden_carga.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ord from orden_carga, VTabuladorDestino, VTabuladorOrigen, solicitud, cliente, remolque, unidad, persona, relacion_unidad
			where (orden_carga.idorden_carga='$this->idorden_carga'
            and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen 
            and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
            and  solicitud.idcliente_sol=cliente.idcliente 
            and  orden_carga.idsolicitud=solicitud.idsolicitud 
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor)";
            
			}else{
				$lsSql="select * , date_format(orden_carga.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ord from orden_carga, VTabuladorDestino, VTabuladorOrigen, solicitud, cliente, remolque, unidad, persona, relacion_unidad
			where (orden_carga.idsolicitud=solicitud.idsolicitud 
            and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen 
            and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
            and  solicitud.idcliente_sol=cliente.idcliente
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor and VTabuladorOrigen.ciudad_origen_vto='$this->asbusqueda')"; 
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
					$laMatriz [$liI] [15]= $laTupla ["ciudad_origen_vto"];
					$laMatriz [$liI] [16]= $laTupla ["ciudad_destino_vtd"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
