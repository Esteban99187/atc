<?php
	require_once("class_db.php");
	class Usuarios extends clsDatos{

 //VERIFICA EL USUARIO PARA EL LOGIN
    public function VerificarUsuario($datos){
    	$this->conectar();
	 	$sql="select * from usuarios where usuario='".strtoupper($datos[0])."' and passwd='".strtoupper($datos[1])."' and status='A'";
	 	$Qry = $this->filtro($sql);
	 	if(!$Qry->EOF){
	 	  $InUser = array('1',$Qry->fields[3],$Qry->fields[2]);
	 	}else{
	 	  $InUser = array('0');	
	 	}
	 	return $InUser;
	 }
 //GENERA COMBO DE TODOS LOS ALAMACENES
	public function SelectTabla($tabla){
		$this->conectar();
		if($tabla == 'ALMACEN'){
			$campo = 'nomalm';
		}else if($tabla == 'ARTICULOS'){
			$campo = 'desart';
		}
		$sql = "select * from ".$tabla." ORDER by ".$campo." ASC";
		$Qry = $this->filtro($sql);
		while(!$Qry->EOF){
			$datos[] = array($Qry->fields[0],strtoupper($Qry->fields[1]));
			$Qry->MoveNext();
		}
		return $datos;
	}

 //GENERA DETALLE DE SALDOS ALMACEN/ARTICULO
	public function SaldosAlmacen($valores){
	    $this->conectar();
	    $fecha = $this->formateoFecha($valores[0]);
		$sql = "SELECT B.fecha,A.codart,A.desart,C.codalm,C.nomalm,SUM(B.CANTIDAD) saldos
		FROM  saldos B, articulos A, almacen C
		WHERE B.fecha <= '".$fecha."' and A.codart = '".$valores[1]."' and c.CODALM='".$valores[2]."'
		GROUP BY A.codart,A.desart,C.codalm,C.nomalm,B.fecha";
		$Qry = $this->filtro($sql);
		while(!$Qry->EOF){
			$datos[] = array($Qry->fields[0],$Qry->fields[4],$Qry->fields[2],$Qry->fields[5]);
			$Qry->MoveNext();
		}
		return $datos;
	} 

	}
?>