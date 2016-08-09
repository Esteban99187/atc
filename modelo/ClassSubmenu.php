<?php
	include_once("../modelo/class_db.php");
	class ClassSubmenu extends class_db
	{
		public function nuevo_submenu($datos_submenu)
		{
			$this->fconectar();
			$dato1 = ($datos_submenu[0]);
			$dato2 = ($datos_submenu[1]);
			$dato3 = ($datos_submenu[2]);
			$sql = "insert into Submenu (NombreSub,UrlSub,DescripcionSub)VALUES('$dato1','$dato2','$dato3')";
			if($this->ejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function listar_submenu()
		{
			$this->fconectar();
			$sql = "select * from Submenu";
			$query = $this->ffiltro($sql);
			$i=1;
			while($lista_submenu = $this->fproximo($query))
			{
				if($lista_submenu["EstatusSub"] == 1)
				{
					echo '<tr><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreSub"]).'</td><td>URL='.strtoupper($lista_submenu["UrlSub"]).'</td><td align="center"><a href="?url=maestro_submenu&idsubmenu='.$lista_submenu["IdSubmenu"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$lista_submenu["IdSubmenu"].',"maestro_submenu")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td></tr>';
				}
				else
				{
					echo '<tr style="color:red;"><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreSub"]).'</td><td>URL='.strtoupper($lista_submenu["UrlSub"]).'</td><td align="center"><a href="?url=maestro_submenu&idsubmenu='.$lista_submenu["IdSubmenu"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restaurarres('.$lista_submenu["IdSubmenu"].',"maestro_submenu")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td></tr>';
				}
			}
		}
		public function existe_submenu($datos_submenu)
		{
			$this->fconectar();
			$sql = "select * from Submenu where NombreSub = '$datos_submenu'";
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
		public function actualizar_submenu($idsubmenu,$datos_submenu)
		{
			$this->fconectar();
			$dato1 = strtoupper($datos_submenu[0]);
			$dato2 = strtoupper($datos_submenu[1]);
			$dato3 = strtoupper($datos_submenu[2]);
			$sql = "update Submenu set NombreSub = '$dato1', UrlSub = '$dato2', DescripcionSub = '$dato3' where IdSubmenu = '$idsubmenu'";
			if($this->ejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function datos_submenu($idsubmenu)
		{
			$this->fconectar();
			$sql = "select * from Submenu where IdSubmenu = '$idsubmenu'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$datos_submenu = array($pr["NombreSub"],$pr["UrlSub"],$pr["DescripcionSub"]);
			}
			return $datos_submenu;
		}
		public function revision_submenu($idsubmenu)
		{
			$this->fconectar();
			$sql ="select * from Menu_Submenu where IdSubmenu = '$idsubmenu'";
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
		public function desactivar_submenu($tabla,$campo,$valor,$id,$cId)
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
		public function activar_submenu($tabla,$campo,$valor,$id,$cId)
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
		
		public function consulta_por($id)
		{
			return parent::ejecutar("SELECT * FROM Menu_Submenu as m_sm INNER JOIN Submenu as sm ON sm.IdSubmenu = m_sm.IdSubmenu WHERE m_sm.IdMenu='$id'");
		}
		public function row()
		{
			return mysql_fetch_array ($this->res);
		}
	}
?>
