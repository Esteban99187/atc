<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_asignacion extends db{
		
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
			if($this->asbusqueda==""){
				$lsSql=" select u.idunidad, u.placa, u.serial_motor, s.idservicio_unidad, s.nombre_equipo, s.cantidad_equipo, s.observacion_equipo 
											from unidad as u
											inner join servicio_unidad as s
											where (u.idunidad=s.idunidad) ";
												
			}else if ($this->asbusqueda!="")
			{
				$lsSql=" select u.idunidad, u.placa, u.serial_motor, s.idservicio_unidad, s.nombre_equipo, s.cantidad_equipo, s.observacion_equipo 
											from unidad as u
											inner join servicio_unidad as s
											where (u.idunidad='$this->asbusqueda') and (u.idunidad=s.idunidad)";
	
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idservicio_unidad"];
					$laMatriz [$liI] [1]= $laTupla ["nombre_equipo"];
					$laMatriz [$liI] [2]= $laTupla ["cantidad_equipo"];
					$laMatriz [$liI] [3]= $laTupla ["observacion_equipo"];
					$laMatriz [$liI] [4]= $laTupla ["idunidad"];					
					$laMatriz [$liI] [5]= $laTupla ["placa"];					
					$laMatriz [$liI] [6]= $laTupla ["serial_motor"];												
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
