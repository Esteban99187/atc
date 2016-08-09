<?php
	require_once("../modelo/class_db.php");
	class ClassReporte extends class_db
	{
		public function NuevaReporte($datos_submenu)
		{
			$this->fconectar();
			$dato1 = ($datos_submenu[0]);
			$dato2 = ($datos_submenu[1]);
			$dato3 = ($datos_submenu[2]);
			$sql = "insert into Reporte (NombreRep,UrlRep,DescripcionRep)VALUES('$dato1','$dato2','$dato3')";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function ListarReporte()
		{
			$this->fconectar();
			$sql = "select * from Reporte";
			$query = $this->ffiltro($sql);
			$i=1;
			while($lista_submenu = $this->fproximo($query))
			{
				if($lista_submenu["EstatusRep"] == 1)
				{
					echo '<tr><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreRep"]).'</td><td>URL='.strtoupper($lista_submenu["UrlRep"]).'</td><td align="center"><a href="?url=MaestroReporte&IdReporte='.$lista_submenu["IdReporte"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:eliminar('.$lista_submenu["IdReporte"].',"MaestroReporte")><i class="glyphicon glyphicon glyphicon-remove-sign"></i></a></td></tr>';
				}
				else
				{
					echo '<tr style="color:red;"><td>'.$i++.'</td><td>'.strtoupper($lista_submenu["NombreRep"]).'</td><td>URL='.strtoupper($lista_submenu["UrlRep"]).'</td><td align="center"><a href="?url=MaestroReporte&IdReporte='.$lista_submenu["IdReporte"].'"><i class="glyphicon glyphicon-edit"></i></a></td><td align="center"><a  href=javascript:restaurarres('.$lista_submenu["IdReporte"].',"MaestroReporte")><i class="glyphicon glyphicon glyphicon-share-alt"></i></a></td></tr>';
				}
			}
		}
		public function ExisteOperacaion($datos_submenu)
		{
			$this->fconectar();
			$sql = "select * from Reporte where NombreRep = '$datos_submenu'";
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
		public function ActualizarReporte($idsubmenu,$datos_submenu)
		{
			$this->fconectar();
			$dato1 = strtoupper($datos_submenu[0]);
			$dato2 = strtoupper($datos_submenu[1]);
			$dato3 = strtoupper($datos_submenu[2]);
			$sql = "update Reporte set NombreRep = '$dato1', UrlRep = '$dato2', DescripcionRep = '$dato3' where IdReporte = '$idsubmenu'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function DatosReporte($IdReporte)
		{
			$this->fconectar();
			$sql = "select * from Reporte where IdReporte= '$IdReporte'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$datos_submenu = array($pr["NombreRep"],$pr["UrlRep"],$pr["DescripcionRep"]);
			}
			return $datos_submenu;
		}
		public function RevisionReporte($IdReporte)
		{
			$this->fconectar();
			$sql ="select * from Reporte where IdReporte='$IdReporte'";
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
		public function DesactivarReporte($tabla,$campo,$valor,$id,$cId)
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
		public function ActivarReporte($tabla,$campo,$valor,$id,$cId)
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
			return parent::ejecutar("SELECT * FROM Perfil_Reporte as tr INNER JOIN Reporte as rl ON rl.IdReporte = tr.IdReporte WHERE tr.IdPerfil='$id'");
		}

		public function cualPerfil($idPerfil)
		{
			$this->fconectar();
			$sql = "select * from Perfil where IdPerfil = '$idPerfil'";
			$consulta = $this->ffiltro($sql);
			while($pr = $this->fproximo($consulta))
			{
				$perfil = $pr["NombrePer"];
			}
			return $perfil;
		}
	}
?>
