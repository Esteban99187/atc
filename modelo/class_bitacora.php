<?php
	require_once("class_db.php");
	class bitacora extends class_db
	{
		/*REGISTRO ACTIVIDADES DE LA BITACORA*/
		public function addActividad($ac,$pn,$id,$tipo,$ip)
		{
			$this->fconectar();
			date_default_timezone_set("America/Caracas");
			$fecha =date("Y-m-d h:i:s");
			$hora =date("h:i:s A");
			if($ac == 1)
			{
				$actividad = "Realizo un registro";
			}
			else if($ac == 2)
			{
				$actividad = "Modifico un registro";
			}
			else if($ac == 3)
			{
				$actividad = "desactivo un registro";
			}
			else if($ac == 4)
			{
				$actividad = "Ha realizado una solicitud de";
			}
			else if($ac == 5)
			{
				$actividad = "Realizo un backup";
			}
			else if($ac == 6)
			{
				$actividad = "Modifico backup automatico";
			}
			else if($ac == 7)
			{
				$actividad = "Restauro el sistema";
			}
			else if($ac == 8)
			{
				$actividad = "Inicio Sesion";
			}
			else if($ac == 9)
			{
				$actividad = "Cerro Sesion";
			}
			else if($ac == 10)
			{
				$actividad = "Bloqueado por intentos fallidos";
			}
			else if($ac == 11)
			{
				$actividad = "Realizo una solicitud";
			}
			else if($ac == 12)
			{
				$actividad = "reactivo un registro";
			}
			$sql ="insert into Bitacora (IdUsuario,Ip,Actividad,FechaHora,Panel,TipoBitacora)VALUES('$id','$ip','$actividad','$fecha','$pn','$tipo')";
			if($this->ejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
			
			
 // MUESTRO LAS ACTIVIDADES REALIZADAS SIENDO (X) VARIABLE DE IDENTIFICACION 

			public function ShowBitacora(){
				$this->fconectar();
				$sql = "select Actividad, Panel, date_format(FechaHora,'%d/%m/%Y') as Fecha, date_format(FechaHora,'%h:%i:%s') as Hora from Bitacora order by IdBitacora desc limit 1";
				$consulta = $this->ffiltro($sql);
				while($show = $this->fproximo($consulta)){

						$panel = $show["Panel"];
					


					print $show["Fecha"]." ".$show["Hora"]." ".$show["Actividad"]." en el modulo de ".$panel;
				}
			}

			public function busquedaBitacora($usuario){
				$this->fconectar();
				$sql = "select * from bitacora as b inner join usuarios as u on  u.cedula = b.idUsuario Where u.nombre like '%$usuario%'";
				$consulta = $this->ffiltro($sql);
				$cantidad = $this->fnum_registros($consulta);
				$i = $cantidad;
				while($show = $this->fproximo($consulta)){
					$nombre = strtoupper($show["nombre"].' '.$show["apellido"]);
					
					if($show["panel"]==1){
						$panel = "Usuarios";
					}else if($show["panel"]==2){
						$panel = "Cargos";
					}else if($show["panel"]==3){
						$panel = "Jerarquia";
					}else if($show["panel"]==4){
						$panel = "Profesion";
					}else if($show["panel"]==5){
						$panel = "Actividad";
					}else if($show["panel"]==6){
						$panel = "Denominacion";
					}else if($show["panel"]==7){
						$panel = "Personal";
					}else if($show["panel"]==8){
						$panel = "Organizacion";
					}else if($show["panel"]==9){
						$panel = "Particulares";
					}else if($show["panel"]==10){
						$panel = "Planificacion";
					}else if($show["panel"]==11){
						$panel = "Capacitacion";
					}else if($show["panel"]==12){
						$panel = "Respaldo";
					}else if($show["panel"]==13){
						$panel = "Login";
					}
					echo '

						<tr>
							<td>
							'.$i--.'
							</td>
							<td>
								'.$nombre.'
							</td>
							<td>
								'.strtoupper($show["Actividad"]).'
							</td>
							<td>
								'.date("d/m/Y", strtotime($show["fecha"])).'
							</td>
							<td>
								'.$show["hora"].'
							</td>
							<td>
								'.$panel.'
							</td>	
							</tr>
					';
				}

			}

		public function buscarAlerta($codigo){
			$this->fconectar();
			$sql="select * from talertasoperaciones where idAlerta = '$codigo'";
			$query = $this->ffiltro($sql);
			while($aviso = $this->fproximo($query)){
				$alertar = array(strtoupper($aviso["aviso"]),$aviso["tipoAlerta"]);
			}

			return @$alertar;
		}

		public function EliminacionLogica($tabla,$campo,$valor,$id,$cId){
			$this->fconectar();
			$sql = "update $tabla set $campo = '$valor' where $cId = '$id'";
			if($this->filtro($sql)){
				return true;
			}else{
				return false;
			}
		}

	}
?>
