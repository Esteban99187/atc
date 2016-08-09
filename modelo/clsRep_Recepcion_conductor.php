<?php
	include ("class_db.php");
	
	class clsRep_Recepcion_conductor extends class_db{
		
		private $asbusqueda;
		private $asfini;
		private $asfin;

		
		public function constuctor () {
			$this->asbusqueda="";
			$this->asfini="";
			$this->asfin="";

			
		}
		public function destructor (){
		}
		
		public function fSetsbusqueda($psbusqueda){
			$this->asbusqueda=$psbusqueda;
		}

		public function fSetsfini($psfini){
			$this->asfini=$psfini;
		}
		
		public function fSetsfin($psfin){
			$this->asfin=$psfin;
		}
		
		public function fGetsbusqueda(){
			return $this->asbusqueda;
		}
		
		public function fGetsfini(){
			return $this->asfini;
		}
		
		public function fGetsfin(){
			return $this->asfin;
		}
	
		public function fBusqueda(){
			$liI=0;
			$this->asfini=$this->ffechaBD($this->asfini);
			$this->asfin=$this->ffechaBD($this->asfin);
			if($this->asbusqueda==""){
				$lsSql="select * , date_format(recepcion_guia.fecha_hora_recgui,'%d/%m/%Y') as fecha_recgui from recepcion_guia, solicitud, cliente, remolque, unidad, persona, relacion_unidad, orden_carga
			where (recepcion_guia.idorden_carga=orden_carga.idorden_carga
            and recepcion_guia.idorden_carga=orden_carga.idorden_carga
            and  solicitud.idcliente_sol=cliente.idcliente 
            and  orden_carga.idsolicitud=solicitud.idsolicitud 
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor)";
            
			}else{
				$lsSql="select * , date_format(recepcion_guia.fecha_hora_recgui,'%d/%m/%Y') as fecha_recgui from recepcion_guia, solicitud, cliente, remolque, unidad, persona, relacion_unidad, orden_carga
			where (orden_carga.idsolicitud=solicitud.idsolicitud 
            and  solicitud.idcliente_sol=cliente.idcliente
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor and recepcion_guia.idorden_carga=orden_carga.idorden_carga and persona.cedula='$this->asbusqueda' and (recepcion_guia.fecha_hora_recgui between('$this->asfini 00:00:00') and ('$this->asfin 23:59:00')) and orden_carga.estatus_ordcar='ejecutada')";
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
					$laMatriz [$liI] [12]= $laTupla ["nombre_cli"];
					$laMatriz [$liI] [13]= $laTupla ["idcliente"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
