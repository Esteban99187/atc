<?php

	@include_once("modelo/class_db.php");
	@include_once("../modelo/class_db.php");
	
	class clsRep_Ordencarga2 extends db{
		
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
				$lsSql=" select s.idsolicitud, s.idproducto, p. nombre_pro, s.direccion_entrega,s.direccion_salida, o.idorden_carga, o.fecha_ord, o.hora_ord, r.idrelacion_unidad, r.cedula, u.placa_uni, u.idunidad, pe.nombres_per
												from orden_carga as o
												inner join solicitud as s
												inner join relacion_unidad as r
												inner join producto as p
												inner join persona as pe
												inner join unidad as u
												where (o.idorden_carga=s.idsolicitud)and (s.idproducto=p.idproducto)
												and (r.cedula=pe.cedula) and (o.idrelacion_unidad=r.idrelacion_unidad)  and (r.idunidad=u.idunidad) and (o.estatus_eliminado=1)";
			}else if ($this->asbusqueda!="")
			{
				$lsSql=" select s.idsolicitud, s.idproducto, p. nombre_pro, s.direccion_entrega,s.direccion_salida, o.idorden_carga, o.fecha_ord, o.hora_ord, r.idrelacion_unidad, r.cedula, u.placa_uni, u.idunidad, pe.nombres_per
												from orden_carga as o
												inner join solicitud as s
												inner join relacion_unidad as r
												inner join producto as p
												inner join persona as pe
												inner join unidad as u
												where (o.idorden_carga=s.idsolicitud)and (s.idproducto=p.idproducto)
												and (r.cedula=pe.cedula) and (o.idrelacion_unidad=r.idrelacion_unidad) and (r.idunidad=u.idunidad)and(o.fecha_ord='$this->asbusqueda')";
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["idorden_carga"];
					$laMatriz [$liI] [1]= $laTupla ["fecha_ord"];
					$laMatriz [$liI] [2]= $laTupla ["hora_ord"];
					$laMatriz [$liI] [3]= $laTupla ["idunidad"];
					$laMatriz [$liI] [4]= $laTupla ["nombre_pro"];					
					$laMatriz [$liI] [5]= $laTupla ["cedula"];					
					$laMatriz [$liI] [6]= $laTupla ["nombres_per"];					
					$laMatriz [$liI] [7]= $laTupla ["placa_uni"];					
					$laMatriz [$liI] [8]= $laTupla ["direccion_entrega"];					
					$laMatriz [$liI] [9]= $laTupla ["direccion_salida"];					
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
