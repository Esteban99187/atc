<?php 
	include_once('clsConexionPg.php');
	class clsMantenimiento extends clsConexionPg {
		public $nroOrden,$fecha,$unidad,$conductor,$observacion, $fechaSalida, $HoraOficina, $HoraVigilancia;
		public function guardar(){
			return $this->ejecutar("INSERT INTO mantenimiento(fecha,idunidad,conductor,observacion,estatus) values('$this->fecha','$this->unidad','$this->conductor','$this->observacion','1')");
		}
		public function guardarDetalle(){
			return $this->ejecutar("INSERT INTO detallemantenimiento(idmantenimiento,idfalla,idrepuesto,cantidad) values('$this->nroOrden','$this->falla','$this->repuesto','$this->cantidad')");
		}
		public function buscarNroOrden(){
			$this->ejecutar("SELECT max(idmantenimiento) from mantenimiento");
			$dato = $this->arreglo();
			return $dato[0] + 1;
		}
		public function buscarOrden($valor,$estatus=""){
			if($estatus>0) $busEstatus = " AND estatus = '".$estatus."'";
			else $busEstatus="";
			$this->ejecutar("SELECT m.idmantenimiento,u.placa as placa,mu.idmodelo_unidad,mu.desc_mode as modelo,u.idunidad 
				FROM mantenimiento as m 
				inner join unidad as u on u.idunidad = m.idunidad 
				inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad 
				where m.idmantenimiento::text ilike '%$valor%' ".$busEstatus." ");
			while($datos = $this->arreglo()) $data[] = $datos;
			return $data;
		}
		public function buscarOrdenSalida($nroOrden){
			$this->ejecutar("SELECT m.idmantenimiento,u.placa as placa,mu.desc_mode as modelo,u.idunidad, date_format(m.fecha,'%d-%m-%Y') as fechaEntrada, c.id_chofer, concat(c.nombre1,' ',c.apellido1) as conductor, m.horaOficina, m.horaVigilancia
				FROM mantenimiento as m 
				inner join unidad as u on u.idunidad = m.idunidad 
				inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad 
				inner join tchofer as c on m.conductor = c.id_chofer
				where m.idmantenimiento ='$nroOrden' AND m.estatus='3'");
			return $this->arreglo();
		}
		public function buscarOrdenEntrada($nroOrden){
			$this->ejecutar("SELECT m.idmantenimiento,u.placa as placa,mu.desc_mode as modelo,u.idunidad, date_format(m.fecha,'%d-%m-%Y') as fechaEntrada, c.id_chofer, concat(c.nombre1,' ',c.apellido1) as conductor,fa.descripcion as falla,concat(mec.nombre1,' ',mec.apellido1) as mecanico,rl.nombre_repuesto,dm.cantidad
				FROM mantenimiento as m 
				inner join unidad as u on u.idunidad = m.idunidad 
				inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad 
				inner join tchofer as c on m.conductor = c.id_chofer
				left join detallemantenimiento as dm on dm.idmantenimiento = m.idmantenimiento
				left join tfalla as fa on dm.idfalla = fa.idfalla
				left join trepuesto_lubricante as rl on rl.id_repuesto = dm.idrepuesto
				left join tmecanico as mec on mec.idmecanico = m.mecanico
				where m.idmantenimiento ='$nroOrden'");
			while($datos = $this->arreglo()) $data[] = $datos;
			return $data;
		}
		public function buscarRepuestos($nroOrden){
			$this->ejecutar("SELECT r.id_repuesto,r.nombre_repuesto,dm.cantidad FROM 
				trepuesto_lubricante as r
				INNER JOIN detallemantenimiento AS dm on dm.idrepuesto = r.id_repuesto
				INNER JOIN mantenimiento AS m on dm.idmantenimiento = m.idmantenimiento
				where dm.idmantenimiento=".$nroOrden);
			while($datos = $this->arreglo()) $data[] = $datos;
			return $data;
		}
		public function diagnostico(){
			return $this->ejecutar("UPDATE mantenimiento SET mecanico='$this->mecanico',estatus='2' where idmantenimiento='$this->nroOrden' ");
		}
		public function salida(){
			return $this->ejecutar("UPDATE mantenimiento SET fechaSalida='$this->fechaSalida',horaOficina='$this->HoraOficina',horaVigilancia='$this->HoraVigilancia',estatus='3' where idmantenimiento='$this->nroOrden' ");
		}

	}	
?>