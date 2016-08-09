<?php
	include_once('clsConexionPg.php');
	class clsunidad extends clsConexionPg {

		public $idunidad,$serial_motor,$serial_carroceria,$placa,$estatus_uni,$observaciones,$idmodelo_unidad,$idtipo_unidad;

		public function incluir(){
		 	return $this->ejecutar("INSERT INTO unidad(idunidad,serial_motor,serial_carroceria,placa,observaciones,idmodelo_unidad) VALUES('$this->idunidad','$this->serial_motor','$this->serial_carroceria','$this->placa','$this->observaciones',$this->idmodelo_unidad)");
		}
		public function buscar(){
			$this->ejecutar("SELECT * FROM unidad WHERE idunidad=$this->idunidad ");
			return $this->arreglo();
		}
		public function modificar(){
			return $this->ejecutar("UPDATE unidad SET serial_motor='$this->serial_motor',serial_carroceria='$this->serial_carroceria',placa='$this->placa',estatus_uni='$this->estatus_uni',observaciones='$this->observaciones' WHERE idunidad='$this->idunidad'");
		}
		public function eliminar(){
			return $this->ejecutar("DELETE FROM unidad WHERE idunidad='$this->idunidad'");
		}
		public function listar(){
			$this->ejecutar("SELECT u.*,m.desc_mode as modelo
			FROM unidad as u 
			inner join modelo_unidad as m on u.idmodelo_unidad = m.idmodelo_unidad
			");
			return $this->matriz();
		}
		
		
		public function buscarLike($dato,$validarEntrada=0) {
			if($validarEntrada==1){
				$a = 0;

				$this->ejecutar("SELECT u.placa
				FROM mantenimiento as m 
				inner join unidad as u on m.idunidad = u.idunidad
				where placa ilike '%$dato%' AND estatus!='3'
				");
				while($datum = $this->arreglo()) $datas[] = $datum;
				if($datas){
					foreach ($datas as $index => $dentro) {
						$existeDentro[$index] = $dentro["placa"];
					}
				}				

				$this->ejecutar("SELECT u.placa,mu.desc_mode as modelo,u.idunidad FROM unidad as u inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad  where placa ilike '%$dato%'");
				while($placa = $this->arreglo()) $placas[] = $placa;

				for($i=0;$i<count($placas);$i++){
					if($placas[$i]["placa"]==$existeDentro[$i]){
						
					}else{
						$matriz[] = $placas[$i];
					}
				}
				

			}else{
				$this->ejecutar("SELECT u.placa,mu.desc_mode as modelo,u.idunidad,
					COALESCE((SELECT COALESCE(rd.kilometraje,0) FROM tregistro_diario as rd WHERE u.placa = rd.placa_unidad ORDER BY rd.fecha DESC,rd.kilometraje DESC LIMIT 1),0) as kilometraje 
					FROM unidad as u
					inner join modelo_unidad as mu on mu.idmodelo_unidad = u.idmodelo_unidad 
					where u.placa ilike '%$dato%'"); 
				while($datos = $this->arreglo()) $matriz[] = $datos;
			}
			
			return $matriz;
		}
	}
 ?>
