<?php
	include_once("../modelo/class_db.php");
	class ClassMenu extends class_db{
		public function consulta_por($id){
			return parent::ejecutar("SELECT * FROM Perfil_Menu as tr INNER JOIN Menu as rl ON rl.IdMenu = tr.IdMenu WHERE tr.IdPerfil='$id'");
		}
		public function row(){
			return mysql_fetch_array($this->res);
		}
		public function cualPerfil($idPerfil){
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
