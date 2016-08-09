<?php
	include ("class_db.php");
	
	class clsRep_Relacion_conductor extends class_db{
		
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
				$lsSql="select r.idconductor, r.fecha_hora_reluni, date_format(r.fecha_hora_reluni,'%d/%m/%Y') as fecha_rel, r.estatus_reluni, p.cedula, p.nombres_per, p.apellidos_per, p.cod_rol,
					r.idunidad_reluni, r.idremolque_reluni, u.placa, u.idtipo_unidad,u.serial_motor, u.serial_carroceria, re.placa_rem, re.idtipo_unidad_rem, re.serial_rem, ro.cod_rol, ro.nombre_rol, ti.idtipo_unidad,
					 ti.desc_tipo_unid
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												inner join remolque as re
												inner join tipo_unidad as ti
												inner join rol as ro
												where (r.idunidad_reluni=u.idunidad) and (r.idremolque_reluni=re.idremolque) and (u.idtipo_unidad=ti.idtipo_unidad)
												and (re.idtipo_unidad_rem=ti.idtipo_unidad) and (r.idconductor=p.cedula) and (p.cod_rol=ro.cod_rol)";
			}else{
				$lsSql="select r.idconductor, r.fecha_hora_reluni, date_format(r.fecha_hora_reluni,'%d/%m/%Y') as fecha_rel, r.estatus_reluni, p.cedula, p.nombres_per, p.apellidos_per, p.cod_rol,
					r.idunidad_reluni, r.idremolque_reluni, u.placa, u.idtipo_unidad,u.serial_motor, u.serial_carroceria, re.placa_rem, re.idtipo_unidad_rem, re.serial_rem, ro.cod_rol, ro.nombre_rol, ti.idtipo_unidad,
					 ti.desc_tipo_unid
												from relacion_unidad as r
												inner join persona as p
												inner join unidad as u
												inner join remolque as re
												inner join tipo_unidad as ti
												inner join rol as ro
												where (r.idunidad_reluni=u.idunidad) and (r.idremolque_reluni=re.idremolque) and (u.idtipo_unidad=ti.idtipo_unidad)
												and (re.idtipo_unidad_rem=ti.idtipo_unidad) and (r.idconductor=p.cedula) and (p.cod_rol=ro.cod_rol) and (p.nombres_per='$this->asbusqueda')"; 
			}
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["fecha_rel"];
					$laMatriz [$liI] [1]= $laTupla ["idconductor"];
					$laMatriz [$liI] [2]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [3]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [4]= $laTupla ["idunidad_reluni"];
					$laMatriz [$liI] [5]= $laTupla ["placa"];
					$laMatriz [$liI] [6]= $laTupla ["serial_motor"];
					$laMatriz [$liI] [7]= $laTupla ["idremolque_reluni"];
					$laMatriz [$liI] [8]= $laTupla ["placa_rem"];
					$laMatriz [$liI] [9]= $laTupla ["serial_rem"];
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			@$this->fDesconectar;
			return $laMatriz;
		}
	}
?>
