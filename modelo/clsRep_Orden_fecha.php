<?php
	include ("class_db.php");
	
	class clsRep_Orden_fecha extends class_db{
		
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
				$lsSql="select * , date_format(orden_carga.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ordcar from orden_carga, solicitud, cliente, remolque, unidad, persona, relacion_unidad
			where (orden_carga.idsolicitud=solicitud.idsolicitud
            and  solicitud.idcliente_sol=cliente.idcliente 
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor)";
            
			}else{
				$lsSql="select * , date_format(orden_carga.fecha_hora_ordcar,'%d/%m/%Y') as fecha_ordcar from orden_carga, solicitud, cliente, remolque, unidad, persona, relacion_unidad
			where (orden_carga.idsolicitud=solicitud.idsolicitud 
            and  solicitud.idcliente_sol=cliente.idcliente
            and  relacion_unidad.idconductor=persona.cedula 
            and  relacion_unidad.idremolque_reluni=remolque.idremolque 
            and  relacion_unidad.idunidad_reluni=unidad.idunidad 
            and  orden_carga.idrelacion_unidad=relacion_unidad.idconductor and orden_carga.idsolicitud=solicitud.idsolicitud and persona.cedula='$this->asbusqueda' and (orden_carga.fecha_hora_ordcar between('$this->asfini 00:00:00') and ('$this->asfin 23:59:00')))";
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idorden_carga"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_ordcar"];
					$laMatriz [$liI] [2]= $laTupla ["cedula"];
					$laMatriz [$liI] [3]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [4]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [5]= $laTupla ["idunidad"];
					$laMatriz [$liI] [6]= $laTupla ["placa"];
					$laMatriz [$liI] [7]= $laTupla ["idremolque"];
					$laMatriz [$liI] [8]= $laTupla ["placa_rem"];
					$laMatriz [$liI] [9]= $laTupla ["nombre_cli"];
					$laMatriz [$liI] [10]= $laTupla ["idcliente"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
