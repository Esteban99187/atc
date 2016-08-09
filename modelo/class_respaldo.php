<?php
	require_once("../modelo/class_db.php");
	Class Respaldo extends class_db{

		public function dias_transcurridos(){
		$this->fconectar();
		$sql = "select * from config_respaldo Limit 1";
		$consulta = $this->ffiltro($sql);
		while($show = $this->fproximo($consulta)){
		$dias	= (strtotime($show["fecha"])-strtotime(date("Y-m-d")))/86400;
		$dias 	= abs($dias); $dias = floor($dias);
		$diasRestantes = $show["dias"] - $dias; 

		$nuevafecha = strtotime ( '+'.$show["dias"].' day' , strtotime ( $show["fecha"] ) ) ;
		$nuevafecha = date ( 'd/m/Y' , $nuevafecha );

		$id = $show["id_rconfig"];

		$datos = array($diasRestantes,$nuevafecha,$id);
			
		}
		return $datos;
		}

		public function mostrar_respaldos(){
			$this->fconectar();
			$sql ="select * from respaldos ORDER by id_respaldo desc";
			$consulta =$this->ffiltro($sql);
			$cantidad = $this->fnum_registros($consulta);
			$i=$cantidad;
			while($show = $this->fproximo($consulta)){
				echo '
					<tr>
						<td>
							RPD00'.$i--.'
						</td>
						<td>
							'.date("d/m/Y" , strtotime($show["fecha"])).'
						</td>
						<td>
							'.$show["archivo"].'
						</td>
						<td>
							'.$show["tipo"].'
						</td>
						<td>
						   <input type="button" class="btn btn-primary" name="opt" value="Restaurar" onClick="restaurar('.$show["id_respaldo"].')"></input>
						</td>
					</tr>
				';
			}
		}

		public function actualizar_configuracion($datos){
			$this->fconectar();
			$sql = "update config_respaldo set dias = '$datos[0]', fecha = '$datos[1]' where id_rconfig = '$datos[2]'";
			if($this->fejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}


 public function respaldar($acc)
{
  	$this->fconectar();
    
    $tables = 'actividad,cargos,denominacion,jerarquia,organizacion,organizacionusuario,inspeccion,particulares,personal,profesion';
   // obtener todas las tablas
   if($tables == '*')
   {
      $tables = array();
      $result = $this->ffiltro('SHOW TABLES');
      while($row = $this->fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
    
   //cycle through
   foreach($tables as $table)
   {
      $result = $this->ffiltro('SELECT * FROM '.$table);
      $num_fields = $this->fieldss($result);
      
      $return.="SET FOREIGN_KEY_CHECKS=0;"."\n";

      $return.= 'DROP TABLE '.$table.';';
      $row2 = $this->fetch_row($this->ffiltro('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
       
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = $this->fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }

    
    if($acc == 'a'){
    	$tipo = "AUTOMATICO";
    	$handle = fopen('backup/db-backup-'.date('d-m-Y').'.sql','w+');
    }else if($acc == 'b'){
    	$tipo = "ASISTIDO";
    	$handle = fopen('../backup/db-backup-'.date('d-m-Y').'.sql','w+');
    }

   //save file

   fwrite($handle,$return);
   fclose($handle);
   $arc ="db-backup-".date('d-m-Y');
   $ssql = "INSERT INTO respaldos (fecha,archivo,tipo)VALUES(now(),'$arc','$tipo')";
   if($this->ejecutar($ssql)){
   	return true;
   }else{
   	return false;
   }

	}

	public function VerificaRespaldoAutomatico(){
		$this->fconectar();
		$sql = "SELECT * FROM config_respaldo";
		$consulta = $this->ffiltro($sql);
		$fechaAhora = date("Y-m-d");
		while($show = $this->fproximo($consulta)){
		$fechaRespaldos = strtotime ( '+'.$show["dias"].' day' , strtotime ( $show["fecha"] ) ) ;
		$fechaRespaldos = date ( 'Y-m-d' , $fechaRespaldos );
		if(strtotime($fechaAhora) == strtotime($fechaRespaldos)){
			return true;
		}else{
			return false;
		}
		}
	}

	public function cambioFecha(){
			$this->fconectar();
			$sql = "update config_respaldo set fecha = now() where id_rconfig = '1'";
			if($this->fejecutar($sql)){
				return true;
			}else{
				return false;
			}
		}

	public function detalleRespaldo($id){
		$this->fconectar();
		$sql = "SELECT * FROM respaldos WHERE id_respaldo = '$id'";
		$consulta = $this->ffiltro($sql);
		while($show = $this->fproximo($consulta)){
				$fecha = date("d/m/Y" , strtotime($show["fecha"]));
				$datos = array($fecha,$show["archivo"],$show["tipo"]);
		}
		return $datos;
	}

	public function restaurador($rutaArchivo){
		$this->fconectar();
		$texto = file_get_contents("../backup/".$rutaArchivo.".sql");
		$sentencia = explode(";", $texto);
		$cuantos = count($sentencia)-1;
		for($i = 0; $i < $cuantos ; $i++){
		$this->ffiltro($sentencia[$i]);
		} 
		return true;
	}
}
?>
