<?php
	include ("class_db.php");
	
	class clsRep_Solicitud_tabulador_destino extends class_db{
		
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
				$lsSql="select *, date_format(solicitud.fecha_hora_sol,'%d/%m/%Y') as fecha_sol from solicitud, VTabuladorDestino, VTabuladorOrigen, cliente 
			where (solicitud.idsolicitud='$this->idsolicitud'
			and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen 
            and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
			and  solicitud.idcliente_sol=cliente.idcliente)";
			
			}else{
				$lsSql="select *, date_format(solicitud.fecha_hora_sol,'%d/%m/%Y') as fecha_sol from solicitud, VTabuladorDestino, VTabuladorOrigen, cliente 
			where solicitud.idcliente_sol=cliente.idcliente
			and  solicitud.idtabulador_sol=VTabuladorOrigen.IdVTabuladorOrigen 
            and  solicitud.idtabulador_sol=VTabuladorDestino.IdVTabuladorDestino 
		    and (VTabuladorDestino.ciudad_destino_vtd='$this->asbusqueda')"; 
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idsolicitud"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_sol"];
					$laMatriz [$liI] [2]= $laTupla ["idcliente"];
					$laMatriz [$liI] [3]= $laTupla ["nombre_cli"];
					$laMatriz [$liI] [4]= $laTupla ["direccion_entrega_sol"];
					$laMatriz [$liI] [5]= $laTupla ["direccion_salida_sol"];
					$laMatriz [$liI] [7]= $laTupla ["ciudad_origen_vto"];
					$laMatriz [$liI] [8]= $laTupla ["ciudad_destino_vtd"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
