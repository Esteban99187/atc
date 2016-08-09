	<?php
	$idRoles = isset($_GET['idRoles']) ? $_GET['idRoles'] : null;
	require_once("../modelo/class_db.php");
	class roles extends class_db
	{
		public function nuevoRol($datos)
		{
			$this->fconectar();
			$dato1 = ($datos[0]);
			$dato2 = ($datos[1]);
			$dato3 = ($datos[2]);
			$sql = "insert into Menu (NombreMen,UrlMen,DescripcionMen)VALUES('$dato1','$dato2','$dato3')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function listarRoles()
		{
			$this->fconectar();
			$sql = "select * from Menu";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				if($rol["EstatusMen"] == 1)
				{
					echo '<tr><td>'.$i++.'</td><td>'.strtoupper($rol["NombreMen"]).'</td><td align="center"><a href="?url=roles&edit='.$rol["IdMenu"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$rol["IdMenu"].',"roles")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td></tr>';
				}
				else
				{
					echo '<tr style="color:red;"><td>'.$i++.'</td><td>'.strtoupper($rol["NombreMen"]).'</td><td align="center"><a href="?url=roles&edit='.$rol["IdMenu"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restaurarres('.$rol["IdMenu"].',"roles")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td></tr>';
				}
			}
		}
		public function ListaAsignacion()
		{
			$this->fconectar();
			$sql = "select * from troles where estatus = '1'";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				echo'<tr>
						<td width="450"><input type="hidden" name="idRol[]" value="'.$rol["idRol"].'"><b>'.strtoupper($rol["nombreRol"]).'</b><br>'.ucfirst($rol["descripcion"]).'</td>
						<td align="center"><input type="checkbox"  name="ins['.$rol["idRol"].'][]" value="1"></td>
						<td align="center"><input type="checkbox" name="con['.$rol["idRol"].'][]" value="1"></td>
						<td align="center"><input type="checkbox" name="mod['.$rol["idRol"].'][]" value="1"></td>
						<td align="center"><input type="checkbox" name="eli['.$rol["idRol"].'][]" value="1"></td>
						<td align="center"><input type="checkbox" name="res['.$rol["idRol"].'][]" value="1"></td>
					</tr>';
			}
		}
		public function GuardarResponsabilidades($idRol,$idCargo,$Responsabilidad)
		{
			$this->fconectar();
			$sql = "insert into tresponsabilidadrol (idRol,idCargo,insertar,consultar,modificar,eliminar,restaurar)VALUES('$idRol','$idCargo','$Responsabilidad[0]','$Responsabilidad[1]','$Responsabilidad[2]','$Responsabilidad[3]','$Responsabilidad[4]')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function RecuperarResponsabilidades($idCargo)
		{
			$this->fconectar();
			$sql = "select * from Perfil_Menu as tr INNER JOIN Menu as ts ON ts.IdMenu = tr.IdMenu WHERE tr.IdPerfil = '$idCargo'";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				echo '<tr>';
					echo '<td width="450"><input type="hidden" name="idRol[]" value="'.$rol["IdMenu"].'"><b>'.strtoupper($rol["NombreMen"]).'</b>  -   '.ucfirst($rol["DescripcionMen"]).'</td>';
					echo '<td align="center"><a href=javascript:eliminar_responsabilidad('.$rol["IdPerfil_Menu"].')><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td>';
				echo '</tr>';
			}
		}
		public function ActualizarResponsabilidades($idRol,$idCargo,$Responsabilidad)
		{
			$this->fconectar();
			if($Responsabilidad[0] == 1)
			{
				$insertar = 1;
			}
			else if($Responsabilidad[0] != 1)
			{
				$insertar = 0;
			}
			if($Responsabilidad[1] == 1)
			{
				$consultar= 1;
			}
			else if($Responsabilidad[1] != 1)
			{
				$consultar = 0;
			}
			if($Responsabilidad[2] == 1)
			{
				$modificar = 1;
			}
			else if($Responsabilidad[2] != 1)
			{
				$modificar = 0;
			}
			if($Responsabilidad[3] == 1)
			{
				$eliminar = 1;
			}
			else if($Responsabilidad[3] != 1)
			{
				$eliminar = 0;
			}
			if($Responsabilidad[4] == 1)
			{
				$restaurar = 1;
			}
			else if($Responsabilidad[4] != 1)
			{
				$restaurar = 0;
			}
			$sql = "update Perfil_Menu set insertar = '$insertar', consultar = '$consultar', modificar = '$modificar' , eliminar = '$eliminar', restaurar = '$restaurar' where IdMenu = '$idRol' and IdPerfil = '$idCargo'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function eliminar_responsabilidad($id)
		{
			$this->fconectar();
			$sql="delete from Perfil_Menu where (IdPerfil_Menu='$id')";
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
			$sql = "select * from Menu  group by IdMenu";
			$query = $this->ffiltro($sql);
			while($rol = $this->fproximo($query))
			{
				$idRoles[] = $rol["IdMenu"];
			}
			$cantidadRoles = count(@$idRoles);
			$sql2 = "select * from Menu group by IdMenu";
			$query2 = $this->ffiltro($sql2);
			while($res = $this->fproximo($query2))
			{
				for($i=0;$i<=$cantidadRoles-1;$i++)
				{
					if($res["IdMenu"] == $idRoles[$i])
					{
						$datos[] = array($res["NombreMen"],$res["IdMenu"],$res["DescripcionMen"]);
					}
				}
			}
			return @$datos;
		}
		public function guardarAsignacion($idCargo,$idRol)
		{
			$this->fconectar();
			$sql = "insert into Perfil_Menu (IdPerfil,IdMenu)VALUES('$idCargo','$idRol')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function nuevoPerfil($dato)
		{
			$this->fconectar();
			$perfil = strtoupper($dato);
			$sql = "insert into Perfil (NombrePer)VALUES('$perfil')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		 }
		public function listarPerfiles()
		{
			$this->fconectar();
			$sql = "select * from Perfil";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				if($rol["EstatusPer"] == 1)
				{
					echo '<tr><td>'.$i++.'</td><td>'.strtoupper($rol["NombrePer"]).'</td><td align="center"><a href="?url=perfiles&edit='.$rol["IdPerfil"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$rol["IdPerfil"].',"perfiles")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td></tr>';
				}
				else
				{
					echo '<tr style="color:red;"><td>'.$i++.'</td><td>'.strtoupper($rol["NombrePer"]).'</td><td align="center"><a href="?url=perfiles&edit='.$rol["IdPerfil"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restauracionper('.$rol["IdPerfil"].',"perfiles")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td></tr>';
				}
			}
		}
		public function RevisionUsoPerfil($id)
		{
			$this->fconectar();
			$sql = "select * from usuarios where idPerfil = '$id'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
	 	}
		public function actualizarPerfil($id,$dato)
		{
			$this->fconectar();
			$perfil = strtoupper($dato);
			$sql = "update Perfil set NombrePer = '$perfil' where IdPerfil = '$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function ExistePerfil($dato)
		{
			$this->fconectar();
			$perfil = strtoupper($dato);
			$sql = "select * from Perfil where NombrePer ='$perfil'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return false;
			}
			else
			{
				return true;
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
		public function ExisteRol($dato)
		{
			$this->fconectar();
			$sql = "select * from Menu where NombreMen = '$dato'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return true;
			}
			else
			{
				return true;
			}
		}
		public function actualizarRol($id,$dato)
		{
			$this->fconectar();
			$dato1 = strtoupper($dato[0]);
			$dato2 = strtoupper($dato[1]);
			$dato3 = strtoupper($dato[2]);
			$sql = "update Menu set NombreMen = '$dato1', UrlMen = '$dato2', DescripcionMen = '$dato3' where IdMenu = '$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function RevisionRol($id)
		{
			$this->fconectar();
			$sql ="select * from Perfil_Menu where IdMenu = '$id'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		public function datosRol($id)
		{
			$this->fconectar();
			$sql = "select * from Menu where IdMenu = '$id'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$dato = array($pr["NombreMen"],$pr["UrlMen"],$pr["DescripcionMen"]);
			}
			return $dato;
		}
		public function CrearMenuOpciones($idPerfil)
		{
			$this->fconectar();
			$sql = "select * from tresponsabilidadrol as tr INNER JOIN troles as rl ON rl.idRol = tr.idRol WHERE tr.idCargo = '$idPerfil'";
			$consulta = $this->ffiltro($sql);
			while($opt = $this->fproximo($consulta))
			{
				$valores[] = array($opt["nombreRol"],$opt["url"]);
			}
			return @$valores;
		}
		public function consulta_por($por,$id)
		{
			return parent::fejecutar("SELECT * FROM modulo WHERE $por='$id'");
		}
	}
?>
