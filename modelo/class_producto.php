<?php
	require_once("class_db.php");
	class class_producto extends class_db
	{
		private $aiidproducto;
		private $asdesc_prod;
		private $asidtipo_producto;
		private $asidtipo_unidad;
		private $asidunidad_medida;
        private $asestatus_pro;
		public function __construct()
		{
			$this->aiidproducto=0;
			$this->asdesc_prod="";
			$this->asidtipo_producto="";
			$this->asidtipo_unidad="";
			$this->asidunidad_medida="";
			$this->asestatus_pro="";
		}
		public function __destruct()
		{
		}
		public function fsetiidproducto($piidproducto)
		{
			$this->aiidproducto=$piidproducto;
		}
		public function fsetsdesc_prod($psdesc_prod)
		{
			$this->asdesc_prod=$psdesc_prod;
		}
		public function fsetsidtipo_producto($psidtipo_producto)
		{
			$this->asidtipo_producto=$psidtipo_producto;
		}
		public function fsetsidtipo_unidad($psidtipo_unidad)
		{
			$this->asidtipo_unidad=$psidtipo_unidad;
		}
		public function fsetsidunidad_medida($psidunidad_medida)
		{
			$this->asidunidad_medida=$psidunidad_medida;
		}
		public function fsetsestatus_pro($psestatus_pro)
		{
			$this->asestatus_pro=$psestatus_pro;
		}
		public function fgetiidproducto()
		{
			return $this->aiidproducto;
		}
		public function fgetsdesc_prod()
		{
			return $this->asdesc_prod;
		}
		public function fgetsidtipo_producto()
		{
			return $this->asidtipo_producto;
		}
		public function fgetsidtipo_unidad()
		{
			return $this->asidtipo_unidad;
		}
		public function fgetsidunidad_medida()
		{
			return $this->asidunidad_medida;
		}
		public function fgetsestatus_pro()
		{
			return $this->asestatus_pro;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select idproducto, desc_prod, idtipo_producto, idtipo_unidad, idunidad_medida, estatus_pro from producto where (idproducto='$this->aiidproducto')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidproducto=$larow["idproducto"];
				$this->asdesc_prod=$larow["desc_prod"];
				$this->asidtipo_producto=$larow["idtipo_producto"];
				$this->asidtipo_unidad=$larow["idtipo_unidad"];
				$this->asidunidad_medida=$larow["idunidad_medida"];
				$this->asestatus_pro=$larow["estatus_pro"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from producto where (desc_prod='$this->asdesc_prod' and idtipo_producto='$this->asidtipo_producto' and idtipo_unidad='$this->asidtipo_unidad' and idunidad_medida='$this->asidunidad_medida')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$lbenc=true;
				
			}
			else 
			{
				$lbenc=false;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="insert into producto (desc_prod,idtipo_producto,idtipo_unidad,idunidad_medida,estatus_pro) values ('$this->asdesc_prod','$this->asidtipo_producto','$this->asidtipo_unidad','$this->asidunidad_medida','1')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update producto set desc_prod='$this->asdesc_prod', idtipo_producto='$this->asidtipo_producto', idtipo_unidad='$this->asidtipo_unidad', idunidad_medida='$this->asidunidad_medida' where (idproducto='$this->aiidproducto')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update producto set estatus_pro='0' where (idproducto='$this->aiidproducto')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
				$lbhecho=false;
				$lssql="update producto set estatus_pro='1' where (idproducto='$this->aiidproducto')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select p.idproducto, p.desc_prod, t.desc_tipo_prod, ti.desc_tipo_unid, u.desc_unid_medi
					from producto as p
					inner join tipo_producto as t
					inner join tipo_unidad as ti
					inner join unidad_medida as u
					where (p.idtipo_producto=t.idtipo_producto) and (p.idunidad_medida=u.idunidad_medida) and (p.idtipo_unidad=ti.idtipo_unidad)";

			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idproducto"];
				$lamatriz[$lii][1]=$larow["desc_prod"];
				$lamatriz[$lii][2]=$larow["desc_tipo_prod"];
				$lamatriz[$lii][4]=$larow["desc_unid_medi"];
				$lamatriz[$lii][5]=$larow["desc_tipo_unid"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function fnuevo()
		{
			$lssql="select max(idproducto) as mayor from producto";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$liaux=$larow["mayor"]+1;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $liaux;
		}
				
		
		public function flistadoproducto($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			$sql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idproducto='$parametro1' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			if($parametro2!="")
			$sql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.desc_prod='$parametro2' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idproducto"];
					$filas [$contador][2] = $laRow["desc_prod"];
					$filas [$contador][3] = $laRow["idtipo_producto"];
					$filas [$contador][4] = $laRow["idtipo_unidad"];
					$filas [$contador][5] = $laRow["idunidad_medida"];
					$contador++;
				}
				WHILE ($laRow=$this->fproximo($cursor));
				$encontrado=true;
			}
			if($encontrado)
			{
				return $filas;
			}
			else
			{
				return 99;
			}
			$this->fcierrafiltro($cursor);
			$this->fdesconectar();
		}
		public function flistadoproductosoli($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			$sql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idproducto='$parametro1' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			if($parametro2!="")
			$sql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.desc_prod='$parametro2' and (producto.idtipo_unidad = tipo_unidad.idtipo_unidad) and (producto.idtipo_producto = tipo_producto.idtipo_producto) and (producto.idunidad_medida = unidad_medida.idunidad_medida))";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idproducto"];
					$filas [$contador][2] = $laRow["desc_prod"];
					$filas [$contador][3] = $laRow["desc_tipo_prod"];
					$filas [$contador][4] = $laRow["desc_tipo_unid"];
					$filas [$contador][5] = $laRow["desc_unid_medi"];
					$contador++;
				}
				WHILE ($laRow=$this->fproximo($cursor));
				$encontrado=true;
			}
			if($encontrado)
			{
				return $filas;
			}
			else
			{
				return 99;
			}
			$this->fcierrafiltro($cursor);
			$this->fdesconectar();
		}

		public function flistadoproductosolicitud()
		{
			$this->fconectar();
			$sql="select * from  producto, tipo_unidad, tipo_producto, unidad_medida where (producto.idtipo_unidad = tipo_unidad.idtipo_unidad and producto.idtipo_producto = tipo_producto.idtipo_producto and producto.idunidad_medida = unidad_medida.idunidad_medida)";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idproducto"];
					$filas [$contador][2] = $laRow["desc_prod"];
					$filas [$contador][3] = $laRow["desc_tipo_prod"];
					$filas [$contador][4] = $laRow["desc_tipo_unid"];
					$filas [$contador][5] = $laRow["desc_unid_medi"];
					$contador++;
				}
				WHILE ($laRow=$this->fproximo($cursor));
				$encontrado=true;
			}
			if($encontrado)
			{
				return $filas;
			}
			else
			{
				return 99;
			}
			$this->fcierrafiltro($cursor);
			$this->fdesconectar();
		}
		public function listarCombo()
		{
			$lamatriz=array();
			$lssql="select idproducto, desc_prod, desc_tipo_prod, desc_unid_medi from producto, tipo_producto, unidad_medida, tipo_unidad, capacidad where (producto.idtipo_producto=tipo_producto.idtipo_producto and producto.idtipo_unidad=tipo_unidad.idtipo_unidad and tipo_unidad.idcapacidad=capacidad.idcapacidad and capacidad.idunidad_medida=unidad_medida.idunidad_medida)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			$lii=1;
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[]=array("idproducto"=>$larow["idproducto"],"desc_prod"=>$larow["desc_prod"],"desc_tipo_prod"=>$larow["desc_tipo_prod"],"desc_unid_medi"=>$larow["desc_unid_medi"]);
				$lii++;
			}
			
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			//return $lamatriz;
			return json_encode($lamatriz);
			
		}
	}
?>
