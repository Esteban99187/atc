<?php
	require_once("clsConexionPg.php");
	class Inventario extends clsConexionPg {
		public $responsable,$motivo,$tipomovimiento,$tipo,$id,$idP;
		
		public function cambiarStock($id,$tabla,$cantidad,$tipo) {
			if($tipo == 1){
				$cant = "stock = stock + $cantidad";
			}else if ($tipo == 2){
				$cant = "stock = stock - $cantidad";
			}
	 		return $this->ejecutar("UPDATE $tabla SET $cant WHERE $id= $this->idP ");
	 	}
		public function buscarUltimo2() {
	 		$this->ejecutar("select max(id_movimiento_producto) as cod from movimiento_producto");
	 		$dato = $this->arreglo();
	 		return $dato[0];
	 	}
		public function incluirMovimiento() {
			$fechaHoy = date('Y-m-d');
	 		return $this->ejecutar("INSERT INTO movimiento_producto(idresponsable,motivo,fecha,nota_salida,tipomovimiento,tipo) values($this->responsable,'$this->motivo','$fechaHoy','$this->nota_salida','$this->tipomovimiento','$this->tipo')");
	 	}
	 	public function incluirDetalle() {
	 		return $this->ejecutar("INSERT INTO detalle_movimiento(idmovimiento,idproducto,cantidad)values($this->id,$this->producto,$this->cantidad)");
	 	}
		//listar los datos de la transacccion
	 	public function listarMovimiento($id,$tipo=1,$parametros=null){
	 		$cantParametros = 0;
	 		if(is_array($parametros)){
	 			foreach ($parametros as $indexP => $parametro) {
	 				if($parametro!=NULL) $cantParametros++;
	 			}
		 		extract($parametros);
		 		$where = " where "; $pnro = ""; $pfecha = ""; $pProducto = ""; $pTipoM="";
		 		
		 		if(isset($fecha) && !empty($fecha)){
		 			$arrFecha = explode("-",$fecha);
		 			$fechaI = $this->set_fecha(trim($arrFecha[0]));
		 			$fechaF = $this->set_fecha(trim($arrFecha[1]));
		 			$pfecha = " mp.fecha::date >= '$fechaI'::date AND mp.fecha::date <= '$fechaF'::date";
		 		}

		 		//AQUI EMPEZAMOS A TRAER LOS DATOS PARAMETRIZADOS
		 		if(isset($porReporte) && !empty($porReporte)){
		 			$pTipoM = " mp.tipomovimiento = '".$porReporte."'";
		 			$andPor = " AND ";
		 		}
		 		if(isset($tipoReporte) && !empty($tipoReporte)){
		 			if($tipoReporte<3){
		 				$pTipo = " mp.tipo = '".$tipoReporte."'";
		 				$andTipo = " AND ";
		 			}
		 		}
		 		if(isset($producto) && !empty($producto)){
		 			$pProducto = " dm.idproducto = ".$producto;
		 			$andProducto = " AND ";
		 		}
				if(!empty($porReporte) || !empty($tipoReporte) || !empty($producto)){
					
					if(empty($producto)){
						if($tipoReporte<3)
							$where .= $pTipoM.$andPor.$pTipo;
						else
							$where .= $pTipoM;
					}else{
						$where .= $pTipoM.$andPor.$pTipo.$andTipo.$pProducto;
					}
				}
				if(isset($fecha) && !empty($fecha)){
					if($cantParametros==1)
						$where .= $pfecha." ";
					else
						$where .= " AND ".$pfecha." ";
				}
				//AQUI TERMINAR LOS DATOS PARAMETRIZADOS
			}
	 		if($tipo==1){
	 			$this->ejecutar("SELECT mp.*,dm.*,p.nombre_repuesto as producto 
	 				from movimiento_producto as mp 
	 				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
	 				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
	 				where mp.id_movimiento_producto='$id'");
	 		}else if($tipo==2){
	 			$this->ejecutar("SELECT mp.*,dm.*,p.nombre_repuesto as producto 
	 				from movimiento_producto as mp 
	 				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
	 				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto
	 				$where
	 				");
	 		}
	 		
	 		while ($dato = $this->arreglo()) $data[] = $dato; 
			return $data;
	 	}
	 	public function buscarUltimaNotaSalida() {
	 		$this->ejecutar("SELECT max(nota_salida) from movimiento_producto");
	 		$dato = $this->arreglo();
	 		return intval($dato[0]+1);
	 	}
	 	public function buscarUltimaEntrada() {
	 		$this->ejecutar("SELECT max(id_movimiento_producto) from movimiento_producto");
	 		$dato = $this->arreglo();
	 		return intval($dato[0]+1);
	 	}
	 	public function consultarEntradasPor($fecha,$tipo){
	 		$arrFecha = explode("-",$fecha);
 			$fechaI = $this->set_fecha(trim($arrFecha[0]));
 			$fechaF = $this->set_fecha(trim($arrFecha[1]));
	 		$this->ejecutar("SELECT p.nombre_repuesto as producto, SUM(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				where mp.fecha::date >= '$fechaI'::date AND mp.fecha::date <= '$fechaF'::date AND mp.tipo = '$tipo'
				group by p.nombre_repuesto,mp.tipomovimiento,mp.tipo having mp.tipomovimiento = '1'");
	 		while ($dato = $this->arreglo2()) $data[] = $dato; 
			return $data;
	 	}
	 	public function consultarSalidasPor($fecha,$tipo){
	 		$arrFecha = explode("-",$fecha);
 			$fechaI = $this->set_fecha(trim($arrFecha[0]));
 			$fechaF = $this->set_fecha(trim($arrFecha[1]));
	 		$this->ejecutar("SELECT p.nombre_repuesto as producto, SUM(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				where mp.fecha::date >= '$fechaI'::date AND mp.fecha::date <= '$fechaF'::date AND mp.tipo = '$tipo'
				group by p.nombre_repuesto,mp.tipomovimiento,mp.tipo having mp.tipomovimiento = '2'");
	 		while ($dato = $this->arreglo2()) $data[] = $dato; 
			return $data;
	 	}
	 	public function consultarTotalesEntrada($fecha){
	 		$arrFecha = explode("-",$fecha);
 			$fechaI = $this->set_fecha(trim($arrFecha[0]));
 			$fechaF = $this->set_fecha(trim($arrFecha[1]));
	 		$this->ejecutar("SELECT p.nombre_repuesto as producto, SUM(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				where mp.fecha::date >= '$fechaI'::date AND mp.fecha::date <= '$fechaF'::date
				group by p.nombre_repuesto,mp.tipomovimiento having mp.tipomovimiento = '1'");
	 		while ($dato = $this->arreglo()) $data[] = $dato; 
			return $data;
	 	}
	 	public function consultarTotalSalidas($fecha){
	 		$arrFecha = explode("-",$fecha);
 			$fechaI = $this->set_fecha(trim($arrFecha[0]));
 			$fechaF = $this->set_fecha(trim($arrFecha[1]));
	 		$this->ejecutar("SELECT p.nombre_repuesto as producto, SUM(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				where mp.fecha::date >= '$fechaI'::date AND mp.fecha::date <= '$fechaF'::date
				group by p.nombre_repuesto,mp.tipomovimiento having mp.tipomovimiento = '2'");
	 		while ($dato = $this->arreglo()) $data[] = $dato; 
			return $data;
	 	}
	 	public function listar($tipo){
	 		switch ($tipo) {
	 			case 'repuestos':
	 				$sql = "SELECT * FROM trepuesto_lubricante";
	 			break;
	 		}
	 		$this->ejecutar($sql);
	 		while ($dato = $this->arreglo()) $data[] = $dato; 
			return $data;
	 	}
		public function buscarStockRepuesto($id_repuesto) {
	 		$this->ejecutar("SELECT * FROM trepuesto_lubricante WHERE id_repuesto = $id_repuesto");
	 		return $this->arreglo();
	 	}
	 	public function buscarHistorial($id){
	 		$this->ejecutar("SELECT m.tipomovimiento, dm.idproducto, dm.cantidad, TO_CHAR(m.fecha,'DD-MM-YYYY') AS fecha, rl.nombre_repuesto as nombre, rl.stock ,
				CASE WHEN m.tipomovimiento = '1' THEN 'ENTRADA' ELSE 'SALIDA' END AS tipo_movimiento,
				CASE 
					WHEN m.tipomovimiento = '1' AND m.tipo = '1' THEN 'INVENTARIO INICIAL' 
					WHEN m.tipomovimiento = '1' AND m.tipo = '2' THEN 'AJUSTE POR ENTRADA'
					WHEN m.tipomovimiento = '1' AND m.tipo = '3' THEN 'REQUISICIÓN' 
					WHEN m.tipomovimiento = '2' AND m.tipo = '1' THEN 'ROBO O PERDIDA' 
					WHEN m.tipomovimiento = '2' AND m.tipo = '2' THEN 'DAÑOS' 
					WHEN m.tipomovimiento = '2' AND m.tipo = '3' THEN 'MANTENIMIENTO PREVENTIVO A UNIDAD'
					WHEN m.tipomovimiento = '2' AND m.tipo = '4' THEN 'REPARACIÓN DE UNIDAD'
				END AS tipo_transaccion,
				CASE 
					WHEN m.tipomovimiento = '1' AND m.tipo = '1' THEN 'INV. INICIAL N° '||m.nota_salida
					WHEN m.tipomovimiento = '1' AND m.tipo = '2' THEN 'AJUSTE N° '||m.nota_salida 
					WHEN m.tipomovimiento = '1' AND m.tipo = '3' THEN 'REQUISICIÓN N° '||m.nota_salida 
					WHEN m.tipomovimiento = '2' AND m.tipo = '1' THEN 'ROBO O PERDIDA N° '||m.nota_salida 
					WHEN m.tipomovimiento = '2' AND m.tipo = '2' THEN 'DAÑO N° '||m.nota_salida 
					WHEN m.tipomovimiento = '2' AND m.tipo = '3' THEN 'MANT. PREVENTIVO N° '||m.nota_salida 
					WHEN m.tipomovimiento = '2' AND m.tipo = '4' THEN 'REPARACIÓN N° '||m.nota_salida 
				END AS transaccion_origen,
				COALESCE(mp.placa_unidad,u.placa,'') AS placa_unidad 
				FROM movimiento_producto AS m
				INNER JOIN detalle_movimiento as dm ON dm.idmovimiento = m.id_movimiento_producto
				INNER JOIN trepuesto_lubricante as rl on rl.id_repuesto = dm.idproducto 
				LEFT JOIN tmantenimiento_preventivo as mp ON mp.id_repuesto = dm.idproducto AND mp.idpreventivo = m.nota_salida AND m.tipomovimiento = '2' AND m.tipo = '3' 
				LEFT JOIN detallemantenimiento as dmto ON dmto.idrepuesto = dm.idproducto AND dmto.idmantenimiento = m.nota_salida AND m.tipomovimiento = '2' AND m.tipo = '4' 
				LEFT JOIN mantenimiento as mto ON mto.idmantenimiento = dmto.idmantenimiento 
				LEFT JOIN unidad u ON mto.idunidad = u.idunidad 
				WHERE dm.idproducto = $id");
	 		while ($dato = $this->arreglo()) $data[] = $dato; 
			return $data;
	 	}
	 	public function EntradasHistorial($id){
	 		$this->ejecutar("SELECT sum(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				WHERE dm.idproducto = $id
				group by p.nombre_repuesto,mp.tipomovimiento having mp.tipomovimiento = '1'");
	 		$data =  $this->arreglo();
	 		return $data["cantidad"];
	 	}
	 	public function SalidasHistorial($id){
	 		$this->ejecutar("SELECT sum(dm.cantidad) as cantidad
				from movimiento_producto as mp 
				inner join detalle_movimiento as dm on dm.idmovimiento = mp.id_movimiento_producto 
				inner join trepuesto_lubricante as p on p.id_repuesto = dm.idproducto 
				WHERE dm.idproducto = $id
				group by p.nombre_repuesto,mp.tipomovimiento having mp.tipomovimiento = '2'");
	 		
			$data =  $this->arreglo();
			return $data["cantidad"];
	 	}

		public function stock_por_reponer(){
			$this->ejecutar("SELECT * FROM trepuesto_lubricante WHERE stock < stock_min");
		return $this->matriz();
		}
	}
?>