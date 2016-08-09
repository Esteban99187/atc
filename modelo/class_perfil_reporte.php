<?php
	$idRoles = isset($_GET['idRoles']) ? $_GET['idRoles'] : null;
	require_once("../modelo/class_db.php");
	class class_perfil_reporte extends class_db
	{

		public function RecuperarResponsabilidades($idCargo)
		{
			$this->fconectar();
			$sql = "select * from Perfil_Reporte as tr INNER JOIN Reporte as ts ON ts.IdReporte = tr.IdReporte WHERE tr.IdPerfil = '$idCargo'";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				echo '<tr>';
					echo '<td width="450"><input type="hidden" name="idRol[]" value="'.$rol["IdReporte"].'"><b>'.strtoupper($rol["NombreRep"]).'</b>  -   '.ucfirst($rol["DescripcionRep"]).'</td>';
					echo '<td align="center"><a href=javascript:eliminar_reporte('.$rol["IdPerfil_Reporte"].')><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td>';
				echo '</tr>';
			}
		}

		public function eliminar_reporte($id)
		{
			$this->fconectar();
			$sql="delete from Perfil_Reporte where (IdPerfil_Reporte='$id')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function listaResponsabilidades()
		{
			$this->fconectar();
			$sql = "select * from Reporte  group by IdReporte";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				$idRoles[] = $rol["IdReporte"];
			}
			$cantidadRoles = count(@$idRoles);
			$sql2 = "select * from Reporte  group by IdReporte";
			$query2 = $this->ffiltro($sql2);
			while($res = $this->fproximo($query2))
			{
				for($i=0;$i<=$cantidadRoles-1;$i++)
				{
					if($res["IdReporte"] == $idRoles[$i])
					{
						$datos[] = array($res["NombreRep"],$res["IdReporte"],$res["DescripcionRep"]);
					}
				}
			}
			return @$datos;
		}
		public function guardarAsignacion($idCargo,$idRol)
		{
			$this->fconectar();
			$sql = "insert into Perfil_Reporte (IdPerfil,IdReporte)VALUES('$idCargo','$idRol')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function RecibirDatos($id)
		{
			$this->fconectar();
			$sql = "select * from Perfil where IdPerfil = '$id'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$dato = $pr["NombrePer"];
			}
			return $dato;
		}
		public function consulta_por($por,$id)
		{
			return parent::fejecutar("SELECT * FROM modulo WHERE $por='$id'");
		}
	}
?>
