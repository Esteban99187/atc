<?php
	include ("class_db.php");
	
	class clsRep_Solicitud_rif extends class_db{
		
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
				$lsSql="select s.idsolicitud, s.fecha_hora_sol, date_format(s.fecha_hora_sol,'%d/%m/%Y') as fecha_sol, s.direccion_entrega_sol,s.direccion_salida_sol, e.idcliente, e.nombre_cli, telefono_cli
           from solicitud as s
            inner join cliente as e 
            where  (e.idcliente=s.idcliente_sol)";
			}else{
				$lsSql="select s.idsolicitud, s.fecha_hora_sol, date_format(s.fecha_hora_sol,'%d/%m/%Y') as fecha_sol, s.direccion_entrega_sol,s.direccion_salida_sol, e.idcliente, e.nombre_cli, telefono_cli
           from solicitud as s
            inner join cliente as e 
            where (e.idcliente=s.idcliente_sol) and (e.idcliente='$this->asbusqueda')"; 
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
					$laMatriz [$liI] [6]= $laTupla ["telefono_cli"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
