<?php 
	require_once("clsConexionPg.php");
	class clsSolicitud extends clsConexionPg{
		public $solicitante,$observacion,$repuesto,$cantidad,$fecha,$idrequisicion,$codigoDetalle,$cantidadAprobada,$motivo,$idsolicitud;

		public function guardarRequisicion(){
			return $this->ejecutar("INSERT INTO trequisicon(fecha,solicitante,observacion) VALUES ('$this->fecha','$this->solicitante','$this->observacion')");
		}
		public function guardarDetalleRequisicion(){
			return $this->ejecutar("INSERT INTO tdetallerequisicion(idrequisicion,idrepuesto,cantidad) VALUES($this->idrequisicion,$this->repuesto,$this->cantidad)");
		}
		public function buscarRequisicion($tipo,$estatus,$nro=""){
			$tipo = strtolower($tipo);
			$nro = intval($nro);
			if($tipo == "solicitadas"){
				$this->ejecutar("SELECT r.idrequisicion,r.estatus,TO_CHAR(r.fecha,'DD-MM-YYYY') AS fecha, concat(s.cedula,' - ',s.nombre1,' ',s.apellido1) AS solicitante 
					FROM trequisicon AS r 
					INNER JOIN tmecanico AS s ON s.cedula = r.solicitante 
					WHERE r.estatus = '$estatus'");
			}else if($tipo == "poraceptar"){
				$this->ejecutar("SELECT r.idrequisicion,r.observacion,TO_CHAR(r.fecha,'DD-MM-YYYY') AS fecha, concat(s.cedula,' - ',s.nombre1,' ',s.apellido1) AS solicitante, 
					repu.nombre_repuesto as repuesto,dr.cantidad,modrepu.nombre_modelo_repuesto as modelo,marrepu.nombre_marca_repuesto as marca,
					dr.iddetallerequisicion as iddetalle, dr.cantidadaprobada
					FROM trequisicon AS r 
					INNER JOIN tdetallerequisicion 	AS dr on dr.idrequisicion = r.idrequisicion
					INNER JOIN tmecanico AS s ON s.cedula = r.solicitante 
					INNER JOIN trepuesto_lubricante AS repu ON repu.id_repuesto = dr.idrepuesto
					INNER JOIN tmodelo_repuesto AS modrepu ON repu.id_modelo_repuesto = modrepu.id_modelo_repuesto
					INNER JOIN tmarca_repuesto AS marrepu ON marrepu.id_marca_repuesto = modrepu.id_marca_repuesto
					WHERE r.estatus = '$estatus' and r.idrequisicion = '$nro'");
			}else if($tipo == "aceptadas"){
				$this->ejecutar("SELECT r.idrequisicion,r.estatus,TO_CHAR(r.fecha,'DD-MM-YYYY') AS fecha, concat(s.cedula,' - ',s.nombre1,' ',s.apellido1) AS solicitante, o.idordencompra
					FROM trequisicon AS r 
					INNER JOIN tordencompra as o on o.idsolicitud = r.idrequisicion
					INNER JOIN tmecanico AS s ON s.cedula = r.solicitante 
					WHERE r.estatus = '$estatus'");
			}
			return $this->matriz();
		}
		public function aceptarRequisicion($nro){
			return $this->ejecutar("UPDATE trequisicon set estatus = '1' where idrequisicion = $nro ");
		}
		public function guardarcantidadAprobada(){
			return $this->ejecutar("UPDATE tdetallerequisicion set cantidadaprobada = $this->cantidadAprobada where iddetallerequisicion = $this->codigoDetalle");
		}
		public function rechazarRequisicion($nro){
			return $this->ejecutar("UPDATE trequisicon set estatus='9', motivorechazo='$this->motivo' where idrequisicion = $nro ");
		}
		public function cambiarEstadoRequisicion($estatus,$nro){
			return $this->ejecutar("UPDATE trequisicon set estatus='$estatus' where idrequisicion = $nro ");
		}
		public function generarReporte($nro){
			$this->ejecutar("SELECT r.idrequisicion,r.observacion,TO_CHAR(r.fecha,'DD-MM-YYYY') AS fecha, concat(s.cedula,' - ',s.nombre1,' ',s.apellido1) AS solicitante, 
				repu.nombre_repuesto as repuesto,dr.cantidad,modrepu.nombre_modelo_repuesto as modelo,marrepu.nombre_marca_repuesto as marca,
				dr.iddetallerequisicion as iddetalle,dr.cantidadaprobada,dr.idrepuesto
				FROM trequisicon AS r 
				INNER JOIN tdetallerequisicion 	AS dr on dr.idrequisicion = r.idrequisicion
				INNER JOIN tmecanico AS s ON s.cedula = r.solicitante 
				INNER JOIN trepuesto_lubricante AS repu ON repu.id_repuesto = dr.idrepuesto
				INNER JOIN tmodelo_repuesto AS modrepu ON repu.id_modelo_repuesto = modrepu.id_modelo_repuesto
				INNER JOIN tmarca_repuesto AS marrepu ON marrepu.id_marca_repuesto = modrepu.id_marca_repuesto
				WHERE r.idrequisicion = '$nro'
			");
			return $this->matriz();
		}
		public function ReporteOrdenCompra($IdOrdenCompra){
			$this->ejecutar("SELECT o.idordencompra as nro,r.fecha as fechapedido, o.fecha as fechaemision, 
				repu.nombre_repuesto as repuesto,modrepu.nombre_modelo_repuesto as modelo,marrepu.nombre_marca_repuesto as marca,
				dr.cantidadaprobada as cantidad
					FROM tordencompra AS o 
					INNER JOIN trequisicon as r on r.idrequisicion = o.idsolicitud
					INNER JOIN tdetallerequisicion 	AS dr on dr.idrequisicion = r.idrequisicion
					INNER JOIN trepuesto_lubricante AS repu ON repu.id_repuesto = dr.idrepuesto
					INNER JOIN tmodelo_repuesto AS modrepu ON repu.id_modelo_repuesto = modrepu.id_modelo_repuesto
					INNER JOIN tmarca_repuesto AS marrepu ON marrepu.id_marca_repuesto = modrepu.id_marca_repuesto
					WHERE o.idordencompra = '$IdOrdenCompra'
				");
			return $this->matriz();
		}

		public function guardarOrdenCompra(){
			return $this->ejecutar("INSERT INTO tordencompra(idsolicitud,fecha) VALUES('$this->idsolicitud',CURRENT_DATE)");
		}
	}
?>