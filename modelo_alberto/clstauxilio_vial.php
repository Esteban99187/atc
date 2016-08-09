<?php
include_once('clsConexion.php');

class clstauxilio_vial extends clsConexion {

public $id_auxilio_vial;
public $placa_unidad;
public $fecha_auxilio_vial;
public $descripcion_accidente;
public $id_parroquia;
public $direccio_detallada;
public $descripcion_materiales;


public function incluir(){
 return parent::ejecutar("INSERT INTO tauxilio_vial VALUES('$this->id_auxilio_vial','$this->placa_unidad','$this->fecha_auxilio_vial','$this->descripcion_accidente','$this->id_parroquia','$this->direccio_detallada','$this->descripcion_materiales','1')");
} 

public function buscar(){
	return parent::ejecutar("SELECT tauxilio_vial. * , tauxilio_vial.estatus AS estatus_auxilio, tchofer.nombre1, tchofer.nombre2, tchofer.cedula, pais.idpais, pais.desc_pais, estado.idestado, estado.desc_esta, municipio.idmunicipio, municipio.desc_muni, parroquia.idparroquia, parroquia.desc_parr
FROM tauxilio_vial, tchofer, tasignacion_unidad, pais, estado, municipio, parroquia
WHERE tauxilio_vial.id_auxilio_vial =  '$this->id_auxilio_vial'
AND tasignacion_unidad.placa_unidad = tauxilio_vial.placa_unidad
AND tasignacion_unidad.cedula_chofer = tchofer.cedula
AND tauxilio_vial.idparroquia = parroquia.idparroquia
AND parroquia.idmunicipio = municipio.idmunicipio
AND municipio.idestado = estado.idestado
AND estado.idpais = pais.idpais
	");
}

public function modificar(){

	return parent::ejecutar("UPDATE tauxilio_vial SET descripcion_materiales='$this->descripcion_materiales', placa_unidad='$this->placa_unidad',fecha_auxilio_vial='$this->fecha_auxilio_vial',descripcion_accidente='$this->descripcion_accidente',id_parroquia='$this->id_parroquia',direccio_detallada='$this->direccio_detallada' WHERE id_auxilio_vial='$this->id_auxilio_vial' ");
}

public function eliminar(){
	return parent::ejecutar("DELETE FROM tauxilio_vial WHERE placa_unidad='$this->placa_unidad'");
}


public function listar(){
	return parent::ejecutar("SELECT *  FROM tauxilio_vial");
}

public function row(){
	return  mysql_fetch_array($this->res);
}


public function traer_codigo(){

	return parent::ejecutar("SELECT MAX(id_auxilio_vial) AS id_auxilio_vial  FROM tauxilio_vial");
 }


public function estatus_aprobacion(){
	return parent::ejecutar("UPDATE tauxilio_vial SET estatus='$this->estatus' WHERE id_auxilio_vial='$this->id_auxilio_vial'");
}

public function estatus_aprobacion_detalle(){
	return parent::ejecutar("UPDATE solicitud_mantenimiento SET estatus='$this->estatus' WHERE nro_solicitud='$this->id_auxilio_vial' AND tipo_solicitud='2' ");
}




} 
 ?>