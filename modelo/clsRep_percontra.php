<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_percontra extends db{
		
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
				$lsSql=" select p.cedula, p.nombres_per, p.apellidos_per, p.telefono_corp_per, r.nombre_rol, p.cod_rol, r.cod_rol, d.iddepartamento, d.nombre_dep, p.iddepartamento, p.fecha_contratacion_per
												from persona as p
												inner join rol as r
												inner join departamento as d
												where (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			}else if ($this->asbusqueda!="")
			{
				$lsSql=" select p.cedula, p.nombres_per, p.apellidos_per, p.telefono_corp_per, r.nombre_rol, p.cod_rol, r.cod_rol, d.iddepartamento, d.nombre_dep, p.iddepartamento, p.fecha_contratacion_per
												from persona as p
												inner join rol as r
												inner join departamento as d
												where (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento) and(p.fecha_contratacion_per='$this->asbusqueda')"; 
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["cedula"];
					$laMatriz [$liI] [1]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [2]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [3]= $laTupla ["telefono_corp_per"];					
					$laMatriz [$liI] [4]= $laTupla ["nombre_dep"];					
					$laMatriz [$liI] [5]= $laTupla ["fecha_contratacion_per"];					
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
