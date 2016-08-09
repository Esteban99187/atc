<?php
	require_once("../modelo/class_db.php");
	Class Reportes extends class_db{

			public function ActividadBitacora($tipo){
				$this->fconectar();
				$sql = "select *, date_format(FechaHora,'%h:%i:%s') as Hora, date_format(FechaHora,'%d/%m/%Y') as Fecha from Bitacora as b inner join usuarios as u on  u.idusuario = b.IdUsuario and b.tipoBitacora ='$tipo' order by IdBitacora desc";
				$consulta = $this->ffiltro($sql);
				$modulo = "usuarios";
				$cantidad = $this->fnum_registros($consulta);

				$i = $cantidad;
				while($show = $this->fproximo($consulta)){
					$nombre = strtoupper($show["nombre"].' '.$show["apellido"]);
						
					if($show["Panel"]==1){
						$panel = "Usuarios";
					}else if($show["Panel"]==2){
						$panel = "Cargos";
					}else if($show["Panel"]==3){
						$panel = "Jerarquia";
					}else if($show["Panel"]==4){
						$panel = "Profesion";
					}else if($show["Panel"]==5){
						$panel = "Actividad";
					}else if($show["Panel"]==6){
						$panel = "Denominacion";
					}else if($show["Panel"]==7){
						$panel = "Personal";
					}else if($show["Panel"]==8){
						$panel = "Organizacion";
					}else if($show["Panel"]==9){
						$panel = "Particulares";
					}else if($show["Panel"]==10){
						$panel = "Planificacion";
					}else if($show["Panel"]==11){
						$panel = "Capacitacion";
					}else if($show["Panel"]==12){
						$panel = "Respaldo";
					}else if($show["Panel"]==13){
						$panel = "Login";
					}else if($show["Panel"]==14){
						$panel = "Topes maximo";
					}else if($show["Panel"]==15){
						$panel = "Tipos siniestros";
					}else if($show["Panel"]==16){
						$panel = "Tipos solicitud";
					}else if($show["Panel"]==17){
						$panel = "Municipio";
					}else if($show["Panel"]==18){
						$panel = "Parroquia";
					}else if($show["Panel"]==19){
						$panel = "Solicitudes";
					}else {
						$panel = $show["Panel"];
					}


					echo '

						<tr>
							<td>
							'.$i--.'
							</td>
							<td>
								'.date("d/m/Y", strtotime($show["Fecha"])).'
							</td>
							<td>
								'.$show["cedula"].'
							</td>
							<td>
								'.$nombre.'
							</td>
							<td>
								'.$show["Ip"].'
							</td>
							<td>
								'.strtoupper($show["Actividad"]).'
							</td>
							<td>
								'.$show["Hora"].'
							</td>
							<td>
								'.$panel.'
							</td>	
							</tr>
					';
				}
			}


			public function nuevoReporte($datos){
				$this->fconectar();
	 			$dato1 = strtoupper($datos[0]);
	 			$dato3 = strtoupper($datos[2]);
	 			$sql = "insert into treportes (nombreReporte,url,descripcion)VALUES('$dato1','$datos[1]','$dato3')";
	 			if($this->fejecutar($sql)){
	 				return true;
	 			}else{
	 				return false;
	 			}
			 }
		

			public function RevisionReporte($dato){
				$this->fconectar();
				$sql = "select * from treportes where nombreReporte = '$dato'";
				$consulta = $this->ffiltro($sql);
				$cantidad = $this->fnum_registros($consulta);
				if($cantidad > 0){
					return false;
				}else{
					return true;
				}
			}

		public function listarReportes(){
	 	$this->fconectar();
	 	$sql = "select * from treportes";
	 	$query = $this->ffiltro($sql);
	 	$i=1;
	 	while($rol = $this->fproximo($query)){
	 		if($rol["estatus"] == 1){
	 		echo '
	 			<tr>
	 				<td>'.$i++.'</td><td>'.strtoupper($rol["nombreReporte"]).'</td><td>URL='.strtoupper($rol["url"]).'</td><td align="center"><a href="?url=crearReportes&edit='.$rol["idReporte"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$rol["idReporte"].',"crearReportes")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td>
	 			</tr>
	 		';	
	 	}else{
	 		echo '
	 			<tr style="color:red;">
	 				<td>'.$i++.'</td><td>'.strtoupper($rol["nombreReporte"]).'</td><td>URL='.strtoupper($rol["url"]).'</td><td align="center"><a href="?url=crearReportes&edit='.$rol["idReporte"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restauracion('.$rol["idReporte"].',"crearReportes")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td>
	 			</tr>
	 		';	
	 	}
	 	}
	 }

	 public function datosRerporte($id){
	    	$this->fconectar();
	    	$sql = "select * from treportes where idReporte = '$id'";
	    	$consulta = $this->ffiltro($sql);
	 		while($pr = $this->fproximo($consulta)){
	 			$dato = array($pr["nombreReporte"],$pr["url"],$pr["descripcion"]);
	 		}
	 		return $dato;
	    }

	    public function ListaMenuReporte(){
	  	$this->fconectar();
	  	$sql = "select * from treportes where estatus = '1'";
	  	$consulta = $this->ffiltro($sql);
	  	while($rs = $this->fproximo($consulta)){
	  		$datos[] = array($rs['nombreReporte'],$rs['url']);
	  	}
	  		return $datos;
	  	}

	  	public function GeneraReporte($cantidad,$idSolicitudes,$cantidadestatus,$status,$fechas){
	  		$this->fconectar();

	  		if($cantidad == 1){

	  		 if($fechas[0] != 0){
	  		 if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]') AND sl.status IN('$status[0]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		 }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]') AND sl.status IN('$status[0]','$status[1]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		 }else if($cantidadestatus == 3){
	  		   $sql = "select * from solicitudes where tipoSolicitud = '$idSolicitudes[0]' AND fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		 }
	  		}else if($fechas[0] == 0){
	  		 if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]') AND sl.status IN('$status[0]') ";
	  		 }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]') AND sl.status IN('$status[0]','$status[1]')";
	  		 }else if($cantidadestatus == 3){
	  		   $sql = "select * from solicitudes where tipoSolicitud = '$idSolicitudes[0]' AND fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		 }	

	  		}

	  		}else if($cantidad == 2){

	  		  if($fechas[0] != 0){
	  		  if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]','$status[1]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }else if($cantidadestatus == 3){
	  		   $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]','$status[1]','$status[2]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }
	  		}else  if($fechas[0] == 0){
	  		  if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]')";
	  		  }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]','$status[1]')";
	  		  }else if($cantidadestatus == 3){
	  		   $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]') AND sl.status IN('$status[0]','$status[1]','$status[2]')";
	  		  }
	  		}
	  		}else if($cantidad == 3){

	  		  if($fechas[0] != 0){

	  		  if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]','$status[1]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }else if($cantidadestatus == 1){
      	      $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]','$status[1]','$status[3]') AND sl.fechaCreacion BETWEEN '$fechas[0]' and '$fechas[1]'";
	  		  }

	  		}else if($fechas[0] == 0){

	  		  if($cantidadestatus == 1){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]')";
	  		  }else if($cantidadestatus == 2){
	  		  $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]','$status[1]')";
	  		  }else if($cantidadestatus == 1){
      	      $sql = "select ts.idTipoSolicitud,ts.solicitud,sl.tipoSolicitud,sl.status,sl.fechaCreacion,us.nombre,us.apellido,us.cedula,sl.idUsuario from solicitudes as sl INNER JOIN ttiposolicitud as ts ON ts.idTipoSolicitud = sl.tipoSolicitud INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.tipoSolicitud IN('$idSolicitudes[0]','$idSsl.olicitudes[1]','$idSolicitudes[2]') AND sl.status IN('$status[0]','$status[1]','$status[3]')";
	  		  }
	  		}

	  		}

	  		$consulta = $this->ffiltro($sql);
	  		$i=0;
	  		
	  		while($rs = $this->fproximo($consulta)){
	  			$i++;
	  			if($rs["status"] == 'a'){
	  				$estatusg = 'APROBADO';
	  			}else if($rs["status"] == 'p'){
	  				$estatusg = 'PENDIENTE';
	  			}else if($rs["status"]){
	  				$estatusg = 'RECHAZADA';
	  			}
	  			$datos[] = array($i,$rs["solicitud"],strtoupper($rs["nombre"].' '.$rs["apellido"]),$this->fechabd($rs["fechaCreacion"]),$estatusg);
	  		}
	  		return $datos;
	  }  		
	}
?>
