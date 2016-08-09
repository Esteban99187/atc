<?php
	include ("class_db.php");
	
	class clsRep_Bitacora_fecha extends class_db{
		
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
				$lsSql="select * , date_format(Bitacora.FechaHora,'%d/%m/%Y') as fecha_bita from Bitacora
			where TipoBitacora='s' order by IdBitacora";
            
			}else{
				$lsSql="select * , date_format(Bitacora.FechaHora,'%d/%m/%Y') as fecha_bita from Bitacora where TipoBitacora='s' and Bitacora.IdUsuario='$this->asbusqueda' and (Bitacora.FechaHora between('$this->asfini 00:00:00') and ('$this->asfin 23:59:00'))";
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["IdBitacora"];
					$laMatriz [$liI] [1]= $laTupla ["IdUsuario"];
					$laMatriz [$liI] [2]= $laTupla ["Ip"];
					$laMatriz [$liI] [3]= $laTupla ["Actividad"];
					$laMatriz [$liI] [4]= $laTupla ["FechaHora"];
					$laMatriz [$liI] [5]= $laTupla ["Panel"];
					$laMatriz [$liI] [6]= $laTupla ["TipoBitacora"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
