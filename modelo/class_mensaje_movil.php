<?php
	require_once("../modelo/class_db.php");
	class movil extends class_db{
			public function enviarMensaje($id,$motivo){
				$this->fconectar();

				$sql2 = "select mensajesTexto from tconfiguracion where idConfiguracion = '1'";
				$query2 = $this->ffiltro($sql2);
				while($sms = $this->fproximo($query2)){
					$mensajesTatus = $sms["mensajesTexto"];
				}

				if($mensajesTatus == 0){
					return true;
				}else if($mensajesTatus == 1){

				$sql = "select * from usuarios where cedula = '$id'";
				$query = $this->ffiltro($sql);
				$listo = false;
				while($pr = $this->fproximo($query)){

				  $usuario = "pulnec@gmail.com";
 				  $clave = 1521336;

 				  if($motivo == 1){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", acaba de iniciar sesión en el sistema SISBOPOR, Fecha: ".date("d/m/Y")." Hora: ".date("h:i:s A")."";
 				  }else if($motivo == 2){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", acaba de cerrar sesión en el sistema SISBOPOR, Fecha: ".date("d/m/Y")." Hora: ".date("h:i:s A")."";
 				  }else if($motivo == 3){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", su usuario se ha bloqueado por intentos fallidos de ingreso, Fecha: ".date("d/m/Y")." Hora: ".date("h:i:s A")."";
 				  }

 				  $mitelefono  = "".$pr["telefono"]."";
 				  $nuevo_num = substr($mitelefono, 1);
 				  $telefonos = "58".$nuevo_num;

 				 $parametros="usuario=$usuario&clave=$clave&texto=$texto&telefonos=$telefonos"; 
				 $url = "http://www.sistema.massivamovil.com/webservices/SendSms"; 
 				 $handler = curl_init(); 
 				 curl_setopt($handler, CURLOPT_URL, $url); 
 				 curl_setopt($handler, CURLOPT_POST,true); 
 				 curl_setopt($handler, CURLOPT_POSTFIELDS, $parametros); 
 				 curl_exec ($handler); 
 				 curl_close($handler); 
			
				$listo=true;
				}

				return $listo;
				}
			}

			public function enviarMensajeAprobacion($datos,$motivo){
				$this->fconectar();


				$sql2 = "select mensajesTexto from tconfiguracion where idConfiguracion = '1'";
				$query2 = $this->ffiltro($sql2);
				while($sms = $this->fproximo($query2)){
					$mensajesTatus = $sms["mensajesTexto"];
				}

				if($mensajesTatus == 0){
					return true;
				}else if($mensajesTatus == 1){

				$sql1 = "select * from solicitudes as ss INNER JOIN ttiposolicitud as tp ON tp.idTipoSolicitud = ss.tipoSolicitud where idSolicitud = '$datos[2]'";
				$query1 = $this->ffiltro($sql1);

				while($da = $this->fproximo($query1)){

				$sql = "select * from usuarios where cedula = '".$da["idUsuario"]."'";
				$query = $this->ffiltro($sql);
				$listo = false;
				while($pr = $this->fproximo($query)){

				  $usuario = "pulnec@gmail.com";
 				  $clave = 1521336;

 				  if($motivo == 1){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", la solicitud SL0".$datos[2]." de ".$da["solicitud"]." fue asignada para la fecha : ".$datos[0]."";
 				  }if($motivo == 2){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", la solicitud SL0".$datos[2]." de ".$da["solicitud"]." fue rechazada.";
 				  }if($motivo == 3){
 				  $texto = "Sr(a). ".strtoupper($pr["nombre"])." ".strtoupper($pr["apellido"]).", la solicitud SL0".$datos[2]." de ".$da["solicitud"]." ya fue registrada, para mas información ingrese al sistema.";
 				  }

 				  $mitelefono  = "".$pr["telefono"]."";
 				  $nuevo_num = substr($mitelefono, 1);
 				  $telefonos = "58".$nuevo_num;

 				 $parametros="usuario=$usuario&clave=$clave&texto=$texto&telefonos=$telefonos"; 
				 $url = "http://www.sistema.massivamovil.com/webservices/SendSms"; 
 				 $handler = curl_init(); 
 				 curl_setopt($handler, CURLOPT_URL, $url); 
 				 curl_setopt($handler, CURLOPT_POST,true); 
 				 curl_setopt($handler, CURLOPT_POSTFIELDS, $parametros); 
 				 curl_exec ($handler); 
 				 curl_close($handler); 
			
				$listo=true;
				}
				return $listo;
			 }
			}
		}
	}
?>
