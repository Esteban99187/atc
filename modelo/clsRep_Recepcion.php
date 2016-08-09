<?php
	include ("class_db.php");
	
	class clsRep_Recepcion extends class_db{
		
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
				$lsSql="select * , date_format(recepcion_guia.fecha_hora_recgui,'%d/%m/%Y') as fecha_recgui from recepcion_guia, VTabuladorDestino, VTabuladorOrigen, solicitud, cliente, remolque, unidad, persona, relacion_unidad, orden_carga
			where (recepcion_guia.idrecepcion_guia='$this->idrecepcion_guia'
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
				$lsSql="select * , date_format(recepcion_guia.fecha_hora_recgui,'%d/%m/%Y') as fecha_recgui from recepcion_guia, VTabuladorDestino, VTabuladorOrigen, solicitud, cliente, remolque, unidad, persona, relacion_unidad, orden_carga
			where (orden_carga.idsolicitud=solicitud.idsolicitud 
            and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen 
            and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
            and  solicitud.idcliente_sol=cliente.idcliente
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor and orden_carga.idorden_carga='$this->asbusqueda')"; 
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idrecepcion_guia"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_recgui"];
					$laMatriz [$liI] [2]= $laTupla ["n_guia"];
					$laMatriz [$liI] [3]= $laTupla ["cedula"];
					$laMatriz [$liI] [4]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [5]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [6]= $laTupla ["idunidad"];
					$laMatriz [$liI] [7]= $laTupla ["placa"];
					$laMatriz [$liI] [8]= $laTupla ["idremolque"];
					$laMatriz [$liI] [9]= $laTupla ["placa_rem"];
					$laMatriz [$liI] [11]= $laTupla ["idorden_carga"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
