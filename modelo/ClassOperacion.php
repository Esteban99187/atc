<?php
	require_once("../modelo/class_db.php");
	class ClassOperacion extends class_db
	{
		public function NuevaOperacion($datos_submenu)
		{
			$this->fconectar();
			$dato1 = ($datos_submenu[0]);
			$dato2 = ($datos_submenu[1]);
			$dato3 = ($datos_submenu[2]);
			$sql = "insert into Operacion (NombreOpe,UrlOpe,DescripcionOpe)VALUES('$dato1','$dato2','$dato3')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function ListarOperacion()
		{
			$this->fconectar();
			$sql = "select * from Operacion";
			$query = $this->ffiltro($sql);
			$i=1;
			while($lista_submenu = $this->fproximo($query))
			{
				if($lista_submenu["EstatusOpe"] == 1)
				{
					echo '<tr><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreOpe"]).'</td><td>URL='.strtoupper($lista_submenu["UrlOpe"]).'</td><td align="center"><a href="?url=MaestroOperacion&IdOperacion='.$lista_submenu["IdOperacion"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$lista_submenu["IdOperacion"].',"MaestroOperacion")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td></tr>';
				}
				else
				{
					echo '<tr style="color:red;"><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreOpe"]).'</td><td>URL='.strtoupper($lista_submenu["UrlOpe"]).'</td><td align="center"><a href="?url=MaestroOperacion&IdOperacion='.$lista_submenu["IdOperacion"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restaurarres('.$lista_submenu["IdOperacion"].',"MaestroOperacion")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td></tr>';
				}
			}
		}
		public function ExisteOperacaion($datos_submenu)
		{
			$this->fconectar();
			$sql = "select * from Operacion where NombreOpe = '$datos_submenu'";
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
		public function ActualizarOperacion($idsubmenu,$datos_submenu)
		{
			$this->fconectar();
			$dato1 = strtoupper($datos_submenu[0]);
			$dato2 = strtoupper($datos_submenu[1]);
			$dato3 = strtoupper($datos_submenu[2]);
			$sql = "update Operacion set NombreOpe = '$dato1', UrlOpe = '$dato2', DescripcionOpe = '$dato3' where IdOperacion = '$idsubmenu'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function DatosOperacion($IdOperacion)
		{
			$this->fconectar();
			$sql = "select * from Operacion where IdOperacion= '$IdOperacion'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$datos_submenu = array($pr["NombreOpe"],$pr["UrlOpe"],$pr["DescripcionOpe"]);
			}
			return $datos_submenu;
		}
		public function RevisionOperacion($IdOperacion)
		{
			$this->fconectar();
			$sql ="select * from Operacion where IdOperacion='$IdOperacion'";
			$consulta = $this->ffiltro($sql);
			$existe = $this->fnum_registros($consulta);
			if($existe > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function DesactivarOperacion($tabla,$campo,$valor,$id,$cId)
		{
			$this->fconectar();
			$sql = "update $tabla set $campo = '$valor' where $cId = '$id'";
			if($this->ffiltro($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function ActivarOperacion($tabla,$campo,$valor,$id,$cId)
		{
			$this->fconectar();
			$sql = "update $tabla set $campo = '$valor' where $cId = '$id'";
			if($this->ffiltro($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function row()
		{
			return mysql_fetch_array($this->res);
		}
		public function consulta_por($id)
		{
			//~ return parent::ejecutar("SELECT * FROM Perfil_Menu as tr INNER JOIN Menu as rl ON rl.IdMenu = tr.IdMenu WHERE tr.IdPerfil='$id'");
			return parent::ejecutar("SELECT * FROM Submenu_Operacion as SubOpe INNER JOIN Operacion as Ope ON Ope.IdOperacion = SubOpe.IdOperacion WHERE SubOpe.IdSubmenu='$id'");
		}
		public function ConsultaOperacionPorMenu($id)
		{
			//~ return parent::ejecutar("SELECT * FROM Perfil_Menu as tr INNER JOIN Menu as rl ON rl.IdMenu = tr.IdMenu WHERE tr.IdPerfil='$id'");
			return parent::ejecutar("SELECT * FROM Menu_Operacion as MenOpe INNER JOIN Operacion as Ope ON Ope.IdOperacion = MenOpe.IdOperacion WHERE MenOpe.IdMenu='$id'");
		}
	}
?>
