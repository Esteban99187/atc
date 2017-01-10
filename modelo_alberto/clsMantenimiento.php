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
				where m.idmantenimiento::text||' '||u.placa||' '||mu.desc_mode ilike '%$valor%' ".$busEstatus." ");
			while($datos = $this->arreglo()) $data[] = $datos;
			return $data;
		}
		public function buscarOrdenSalida($nroOrden){
			$this->ejecutar("SELECT m.idmantenimiento,u.placa as placa,mu.desc_mode as modelo,u.idunidad, TO_CHAR(m.fecha,'DD-MM-YYYY') as fechaEntrada, c.id_chofer, concat(c.nombre1,' ',c.apellido1) as conductor, m.horaOficina, m.horaVigilancia
				FROM mantenimiento as m 
				inner join unidad as u on u.idunidad = m.idunidad 
				inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad 
				left join tchofer as c on m.conductor = c.id_chofer
				where m.idmantenimiento ='$nroOrden' AND m.estatus='3'");
			return $this->arreglo();
		}
		public function buscarOrdenEntrada($nroOrden,$estatus = 1){
			$this->ejecutar("SELECT M.IDMANTENIMIENTO,
				U.PLACA AS PLACA,
				MU.DESC_MODE AS MODELO,
				U.IDUNIDAD, 
				TO_CHAR(M.FECHA,'DD-MM-YYYY') AS FECHAENTRADA, 
				C.ID_CHOFER, 
				CONCAT(C.NOMBRE1,' ',C.APELLIDO1) AS CONDUCTOR,
				FA.DESCRIPCION AS FALLA,
				CONCAT(MEC.NOMBRE1,' ',MEC.APELLIDO1) AS MECANICO,
				RL.NOMBRE_REPUESTO,
				DM.CANTIDAD,
				M.OBSERVACION 
				FROM MANTENIMIENTO AS M 
				INNER JOIN UNIDAD AS U ON U.IDUNIDAD = M.IDUNIDAD 
				INNER JOIN MODELO_UNIDAD AS MU ON MU.IDMODELO_UNIDAD = U.IDMODELO_UNIDAD 
				INNER JOIN TCHOFER AS C ON M.CONDUCTOR = C.ID_CHOFER 
				LEFT JOIN DETALLEMANTENIMIENTO AS DM ON DM.IDMANTENIMIENTO = M.IDMANTENIMIENTO
				LEFT JOIN TFALLA AS FA ON DM.IDFALLA = FA.IDFALLA
				LEFT JOIN TREPUESTO_LUBRICANTE AS RL ON RL.ID_REPUESTO = DM.IDREPUESTO
				LEFT JOIN TMECANICO AS MEC ON MEC.CEDULA = M.MECANICO
				WHERE M.IDMANTENIMIENTO ='$nroOrden' AND M.ESTATUS='$estatus'");
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
			return $this->ejecutar("UPDATE mantenimiento SET fechaSalida='$this->fechaSalida',horaOficina='$this->HoraOficina',horaVigilancia='$this->HoraVigilancia',estatus='3' where idmantenimiento='$this->nroOrden'");
		}

	}	
?>