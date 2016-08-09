<?php
	$idRoles = isset($_GET['idRoles']) ? $_GET['idRoles'] : null;
	require_once("../modelo/class_db.php");
	class class_asignar_operacion_menu extends class_db
	{
		public function RecuperarOperacion($IdMenu)
		{
			$this->fconectar();
			$sql = "select * from Menu_Operacion as Men_Ope INNER JOIN Operacion as Ope ON Ope.IdOperacion = Men_Ope.IdOperacion WHERE Men_Ope.IdMenu = '$IdMenu'";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				echo '<tr>';
					echo '<td width="450"><input type="hidden" name="idRol[]" value="'.$rol["IdOperacion"].'"><b>'.strtoupper($rol["NombreOpe"]).'</b>   -   '.ucfirst($rol["DescripcionOpe"]).'</td>';
					echo '<td align="center"><a href=javascript:eliminar_asignacion_operacion_menu('.$rol["IdMenu_Operacion"].')><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td>';
				echo '</tr>';
			}
		}
		public function eliminar_asignacion_operacion_menu($id)
		{
			$this->fconectar();
			$sql="delete from Menu_Operacion where (IdMenu_Operacion='$id')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function listaOperacion()
		{
			$this->fconectar();
			$sql = "select * from Operacion  group by IdOperacion";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				$idRoles[] = $rol["IdOperacion"];
			}
			$cantidadRoles = count(@$idRoles);
			$sql2 = "select * from Operacion group by IdOperacion";
			$query2 = $this->ffiltro($sql2);
			while($res = $this->fproximo($query2))
			{
				for($i=0;$i<=$cantidadRoles-1;$i++)
				{
					if($res["IdOperacion"] == $idRoles[$i])
					{
						$datos[] = array($res["NombreOpe"],$res["IdOperacion"]);
					}
				}
			}
			return @$datos;
		}
		public function GuardarmenuOperacion($IdSubmenu,$idRol)
		{
			$this->fconectar();
			$sql = "insert into Menu_Operacion (IdMenu,IdOperacion)VALUES('$IdSubmenu','$idRol')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

	}
?>
