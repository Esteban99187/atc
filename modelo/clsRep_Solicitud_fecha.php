<?php
	include ("class_db.php");
	
	class clsRep_Solicitud_fecha extends class_db{
		
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
				$lsSql="select s.idsolicitud, date_format(s.fecha_hora_sol,'%d/%m/%Y') as fecha_sol, s.direccion_entrega_sol,s.direccion_salida_sol, e.idcliente, e.nombre_cli, e.telefono_cli
			from solicitud as s
            inner join cliente as e ON(e.idcliente=s.idcliente_sol)";
			}
			else
			{
			$lsSql="select s.idsolicitud, date_format(s.fecha_hora_sol,'%d/%m/%Y') as fecha_sol, s.direccion_entrega_sol,s.direccion_salida_sol, e.idcliente, e.nombre_cli, e.telefono_cli
			from solicitud as s
            inner join cliente as e ON(e.idcliente=s.idcliente_sol)
            where e.idcliente='$this->asbusqueda' and (s.fecha_hora_sol between('$this->asfini 00:00:00') and ('$this->asfin 23:59:00')) "; 
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
