<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_cargopersona extends db{
		
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
				$lsSql=" select p.cedula, p.nombres_per, p.apellidos_per, p.telefono_corp_per, r.cod_rol, r.nombre_rol
												from persona as p
												inner join rol as r
												where (p.cod_rol=r.cod_rol)";
			}else if ($this->asbusqueda!="")
			{
				$lsSql=" select p.cedula, p.nombres_per, p.apellidos_per, p.telefono_corp_per, r.cod_rol, r.nombre_rol
												from persona as p
												inner join rol as r
												where (p.cod_rol=r.cod_rol) and (p.cod_rol='$this->asbusqueda')";
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["cedula"];
					$laMatriz [$liI] [1]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [2]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [3]= $laTupla ["telefono_corp_per"];
					$laMatriz [$liI] [4]= $laTupla ["nombre_pro"];					
					$laMatriz [$liI] [5]= $laTupla ["cod_rol"];					
					$laMatriz [$liI] [6]= $laTupla ["nombre_rol"];					
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
