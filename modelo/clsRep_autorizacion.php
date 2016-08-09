<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_autorizacion extends db{
		
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
				$lsSql="select r.idrelacion_unidad, r.cedula, p.nombres_per, p.apellidos_per,r.idunidad, u.placa, r.idremolque, re.placa_rem, ro.cod_rol, ro.nombre_rol
	
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												inner join remolque as re
												inner join rol as ro
												where (r.idunidad=u.idunidad) and (r.idremolque=re.idremolque) and (r.cedula=p.cedula) and (p.cod_rol=ro.cod_rol)";
												
			}else if ($this->asbusqueda!="")
			{
				$lsSql="select r.idrelacion_unidad, r.cedula, p.nombres_per, p.apellidos_per,r.idunidad, u.placa, r.idremolque, re.placa_rem, ro.cod_rol, ro.nombre_rol
	
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												inner join remolque as re
												inner join rol as ro
												where (r.idunidad=u.idunidad) and (r.idremolque=re.idremolque) and (r.cedula=p.cedula) and (p.cod_rol=ro.cod_rol)and(r.idrelacion_unidad='$this->asbusqueda')";
	
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idrelacion_unidad"];
					$laMatriz [$liI] [1]= $laTupla ["idunidad"];
					$laMatriz [$liI] [2]= $laTupla ["placa"];
					$laMatriz [$liI] [3]= $laTupla ["idremolque"];
					$laMatriz [$liI] [4]= $laTupla ["placa_rem"];					
					$laMatriz [$liI] [5]= $laTupla ["cedula"];					
					$laMatriz [$liI] [6]= $laTupla ["nombres_per"];					
					$laMatriz [$liI] [7]= $laTupla ["apellidos_per"];					
										
					
										
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
