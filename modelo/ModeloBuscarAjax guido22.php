<?php
include_once('m_conexion.php');
class ModeloBuscarAjax extends clsConex{

	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoTabulador(){
		$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino) LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxTabulador($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and estatus_tab_vto like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and estatus_tab_vto like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and ciudad_origen_vto like '%$valor%' and estatus_tab_vto like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and ciudad_origen_vto like '%$valor%' and estatus_tab_vto like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and ciudad_origen_vto like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, via_vto, ciudad_destino_vtd, estatus_tab_vto FROM VTabuladorOrigen, VTabuladorDestino WHERE (VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino and ciudad_origen_vto like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettabulador($rs){
		return $this->TraerArreglo($rs);
	}
	
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoPais(){
		$sql = "SELECT * FROM pais LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxPais($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM pais as e WHERE (e.estatus_pai like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM pais as e WHERE (e.estatus_pai like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM pais as e WHERE (e.desc_pais like '%$valor%' and e.estatus_pai like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM pais as e WHERE (e.desc_pais like '%$valor%' and e.estatus_pai like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM pais as e WHERE (e.desc_pais like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM pais as e WHERE (e.desc_pais like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getPais($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodomaestro_cliente(){
		$sql = "SELECT * FROM cliente LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxmaestro_cliente($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM cliente as e WHERE (e.estatus_cli like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM cliente as e WHERE (e.estatus_cli like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM cliente as e WHERE (e.idcliente like '%$valor%' and e.idcliente like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM cliente as e WHERE (e.idcliente like '%$valor%' and e.idcliente like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM cliente as e WHERE (e.idcliente like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM cliente as e WHERE (e.idcliente like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getmaestro_cliente($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

	//~ ******************************************************************

	function getPais($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoregion(){
		$sql = "SELECT * FROM region LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxregion($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM region as e WHERE (e.estatus_reg like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM region as e WHERE (e.estatus_reg like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM region as e WHERE (e.desc_regi like '%$valor%' and e.estatus_reg like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM region as e WHERE (e.desc_regi like '%$valor%' and e.estatus_reg like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM region as e WHERE (e.desc_regi like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM region as e WHERE (e.desc_regi like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getRegion($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoProducto(){
		$sql = "SELECT * FROM producto LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxProducto($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM producto as e WHERE (e.estatus_pro like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM producto as e WHERE (e.estatus_pro like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM producto as e WHERE (e.desc_prod like '%$valor%' and e.estatus_pro like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM producto as e WHERE (e.desc_prod like '%$valor%' and e.estatus_pro like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM producto as e WHERE (e.desc_prod like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM producto as e WHERE (e.desc_prod like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getProducto($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodopersonaatc(){
		$sql = "SELECT * FROM persona LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxpersonaatc($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM persona as e WHERE (e.estatus_con like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM persona as e WHERE (e.estatus_con like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%' and e.estatus_con like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%' and e.estatus_con like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getpersonaatc($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//zora//

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodomarca_unidad(){
		$sql = "SELECT * FROM marca_unidad LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxmarca_unidad($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.estatus_maruni like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.estatus_maruni like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.desc_marc like '%$valor%' and e.estatus_maruni like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.desc_marc like '%$valor%' and e.estatus_maruni like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.desc_marc like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM marca_unidad as e WHERE (e.desc_marc like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getmarca_unidad($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodomodelo_unidad(){
		$sql = "SELECT * FROM modelo_unidad LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxmodelo_unidad($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.estatus_moduni like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.estatus_moduni like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.desc_mode like '%$valor%' and e.estatus_moduni like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.desc_mode like '%$valor%' and e.estatus_moduni like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.desc_mode like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM modelo_unidad as e WHERE (e.desc_mode like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getmodelo_unidad($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodotipo_unidad(){
		$sql = "SELECT * FROM tipo_unidad LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxtipo_unidad($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.estatus_tipuni like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.estatus_tipuni like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.desc_tipo_unid like '%$valor%' and e.estatus_tipuni like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.desc_tipo_unid like '%$valor%' and e.estatus_tipuni like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.desc_tipo_unid like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM tipo_unidad as e WHERE (e.desc_tipo_unid like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettipo_unidad($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************


//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodobanco(){
		$sql = "SELECT * FROM banco LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxbanco($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM banco as e WHERE (e.estatus_ban like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM banco as e WHERE (e.estatus_ban like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM banco as e WHERE (e.desc_banc like '%$valor%' and e.estatus_ban like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM banco as e WHERE (e.desc_banc like '%$valor%' and e.estatus_ban like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM banco as e WHERE (e.desc_banc like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM banco as e WHERE (e.desc_banc like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getbanco($rs){
		return $this->TraerArreglo($rs);
	}

	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoprecio(){
		$sql = "SELECT * FROM precio LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxprecio($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM precio as e WHERE (e.estatus_pre like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM precio as e WHERE (e.estatus_pre like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM precio as e WHERE (e.precio_pre like '%$valor%' and e.estatus_pre like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM precio as e WHERE (e.precio_pre like '%$valor%' and e.estatus_pre like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM precio as e WHERE (e.precio_pre like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM precio as e WHERE (e.precio_pre like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getprecio($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodotipo_cuenta(){
		$sql = "SELECT * FROM tipo_cuenta LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxtipo_cuenta($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.estatus_tipcue like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.estatus_tipcue like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.desc_tipo_cuen like '%$valor%' and e.estatus_tipcue like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.desc_tipo_cuen like '%$valor%' and e.estatus_tipcue like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.desc_tipo_cuen like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM tipo_cuenta as e WHERE (e.desc_tipo_cuen like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettipo_cuenta($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//zora//


//jt//

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodopersonaatc(){
		$sql = "SELECT * FROM persona LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxpersonaatc($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM persona as e WHERE (e.estatus_con like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM persona as e WHERE (e.estatus_con like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%' and e.estatus_con like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%' and e.estatus_con like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM persona as e WHERE (e.nombres_per like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getpersonaatc($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodomaestro_cuenta(){
		$sql = "SELECT * FROM cuenta_banco LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxmaestro_cuenta($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.estatus_cuenta like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.estatus_cuenta like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.idcliente like '%$valor%' and e.idcliente like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.idcliente like '%$valor%' and e.idcliente like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.idcliente like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM cuenta_banco as e WHERE (e.idcliente like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getmaestro_cuenta($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//jtt//



//MM//
	
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodotipoproveedor(){
		$sql = "SELECT * FROM tipo_proveedor LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxtipoproveedor($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.estatus_tippro like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.estatus_tippro like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.desc_tipo_prov like '%$valor%' and e.estatus_tippro like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.desc_tipo_prov like '%$valor%' and e.estatus_tippro like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.desc_tipo_prov like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM tipo_proveedor as e WHERE (e.desc_tipo_prov like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettipoproveedor($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoestatus(){
		$sql = "SELECT * FROM estatus LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxestatus($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM estatus as e WHERE (e.estatus_est like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM estatus as e WHERE (e.estatus_est like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM estatus as e WHERE (e.nombre_est like '%$valor%' and e.estatus_est like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM estatus as e WHERE (e.nombre_est like '%$valor%' and e.estatus_est like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM estatus as e WHERE (e.nombre_est like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM estatus as e WHERE (e.nombre_est like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getestatus($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTododepartamento(){
		$sql = "SELECT * FROM departamento LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxdepartamento($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM departamento as e WHERE (e.estatus_dep like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM departamento as e WHERE (e.estatus_dep like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM departamento as e WHERE (e.desc_depa like '%$valor%' and e.estatus_dep like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM departamento as e WHERE (e.desc_depa like '%$valor%' and e.estatus_dep like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM departamento as e WHERE (e.desc_depa like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM departamento as e WHERE (e.desc_depa like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getdepartamento($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodocapacidad(){
		$sql = "SELECT * FROM capacidad LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxcapacidad($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM capacidad as e WHERE (e.estatus_cap like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM capacidad as e WHERE (e.estatus_cap like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM capacidad as e WHERE (e.capacidad like '%$valor%' and e.estatus_cap like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM capacidad as e WHERE (e.capacidad like '%$valor%' and e.estatus_cap like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM capacidad as e WHERE (e.capacidad like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM capacidad as e WHERE (e.capacidad like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getcapacidad($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoroles(){
		$sql = "SELECT * FROM rol LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxroles($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM rol as e WHERE (e.estatus_rol like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM rol as e WHERE (e.estatus_rol like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM rol as e WHERE (e.nombre_rol like '%$valor%' and e.estatus_rol like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM rol as e WHERE (e.nombre_rol like '%$valor%' and e.estatus_rol like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM rol as e WHERE (e.nombre_rol like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM rol as e WHERE (e.nombre_rol like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getroles($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodotipocontri(){
		$sql = "SELECT * FROM tipo_contribuyente LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxtipocontri($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.estatus_tipcont like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.estatus_tipcont like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.desc_tipo_cont like '%$valor%' and e.estatus_tipcont like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.desc_tipo_cont like '%$valor%' and e.estatus_tipcont like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.desc_tipo_cont like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM tipo_contribuyente as e WHERE (e.desc_tipo_cont like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettipocontri($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodotipo_cliente(){
		$sql = "SELECT * FROM tipo_cliente LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxtipo_cliente($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.estatus_tipcli like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.estatus_tipcli like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.desc_tipo_clie like '%$valor%' and e.estatus_tipcli like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.desc_tipo_clie like '%$valor%' and e.estatus_tipcli like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.desc_tipo_clie like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM tipo_cliente as e WHERE (e.desc_tipo_clie like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function gettipo_cliente($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
//MM//
//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodounidad_medida(){
		$sql = "SELECT * FROM unidad_medida LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxunidad_medida($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.estatus_unimed like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.estatus_unimed like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.desc_unid_medi like '%$valor%' and e.estatus_unimed like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.desc_unid_medi like '%$valor%' and e.estatus_unimed like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.desc_unid_medi like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM unidad_medida as e WHERE (e.desc_unid_medi like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getunidad_medida($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	//~ ******************************************************************
//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoremolque(){
		$sql = "SELECT * FROM remolque LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxremolque($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM remolque as e WHERE (e.estatus_rem like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM remolque as e WHERE (e.estatus_rem like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM remolque as e WHERE (e.serial_rem like '%$valor%' and e.estatus_rem like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM remolque as e WHERE (e.serial_rem like '%$valor%' and e.estatus_rem like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM remolque as e WHERE (e.serial_rem like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM remolque as e WHERE (e.serial_rem like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getremolque($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************
	
		//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodociudad(){
		$sql = "SELECT * FROM ciudad LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxciudad($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM ciudad as e WHERE (e.estatus_ciu like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM ciudad as e WHERE (e.estatus_ciu like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM ciudad as e WHERE (e.desc_ciud like '%$valor%' and e.estatus_ciu like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM ciudad as e WHERE (e.desc_ciud like '%$valor%' and e.estatus_ciu like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM ciudad as e WHERE (e.desc_ciud like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM ciudad as e WHERE (e.desc_ciud like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getciudad($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

		//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodomunicipio(){
		$sql = "SELECT * FROM municipio LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxmunicipio($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM municipio as e WHERE (e.estatus_mun like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM municipio as e WHERE (e.estatus_mun like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM municipio as e WHERE (e.desc_muni like '%$valor%' and e.estatus_mun like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM municipio as e WHERE (e.desc_muni like '%$valor%' and e.estatus_mun like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM municipio as e WHERE (e.desc_muni like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM municipio as e WHERE (e.desc_muni like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getmunicipio($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoparroquia(){
		$sql = "SELECT * FROM parroquia LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxparroquia($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM parroquia as e WHERE (e.estatus_par like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM parroquia as e WHERE (e.estatus_par like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM parroquia as e WHERE (e.desc_parr like '%$valor%' and e.estatus_par like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM parroquia as e WHERE (e.desc_parr like '%$valor%' and e.estatus_par like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM parroquia as e WHERE (e.desc_parr like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM parroquia as e WHERE (e.desc_parr like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getparroquia($rs){
		return $this->TraerArreglo($rs);
	}
	//~ ******************************************************************

	
	//~ funciones que permiter consultar los datos de un registro o tabla
	function ConsultarTodoestado(){
		$sql = "SELECT * FROM estado LIMIT 15";
		return $this->ejecuta($sql);
	}
	function ConsultarTodoAjaxestado($status,$valor){
		if($status == "1" && $valor == "" ){ //busco por estatus activos
			$sql = "SELECT * FROM estado as e WHERE (e.estatus_est like '1') ";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor == "" ){ //busco por estatus inactivos
			$sql = "SELECT * FROM estado as e WHERE (e.estatus_est like '0')";
			return $this->ejecuta($sql);
		}else if($status == "1" && $valor != "" ){ //busco por nombres y por estatus activos
			$sql = "SELECT * FROM estado as e WHERE (e.desc_esta like '%$valor%' and e.estatus_est like '1')";
			return $this->ejecuta($sql);
		}else if($status == "0" && $valor != "" ){ //busco por nombres y por estatus inactivos
			$sql = "SELECT * FROM estado as e WHERE (e.desc_esta like '%$valor%' and e.estatus_est like '0')";
			return $this->ejecuta($sql);
		}else if($valor != ""){ //busco solo por nombres
			$sql = "SELECT * FROM estado as e WHERE (e.desc_esta like '%$valor%')";
			return $this->ejecuta($sql);
		}else{ // busco cuando borran en la caja de texto y cuando destildan el checkbox (viene siendo como el general);
			$sql = "SELECT * FROM estado as e WHERE (e.desc_esta like '%$valor%')";
			return $this->ejecuta($sql);
		}
	}

	function getestado($rs){
		return $this->TraerArreglo($rs);
	}
	
	
	function converArray($rs){
		return $this->TraerArreglo($rs);
	}
}
?>
