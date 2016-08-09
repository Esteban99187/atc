<?php

	include_once("class_db.php");
	
	class clsRep_solicitudt extends db
	{

		private $asbusqueda;

		public function constuctor () 
		{
			$this->asbusqueda="";
		}

		public function destructor ()
		{
		}

		public function fSetsbusqueda($psbusqueda)
		{
			$this->asbusqueda=$psbusqueda;
		}

		public function fGetsbusqueda()
		{
			return $this->asbusqueda;
		}

		public function fBusqueda()
		{
			$liI=0;
			if($this->asbusqueda=="-")
			{
				$lsSql=" select s.idsolicitud,e.representantenombre_emp,s.cedula_res,s.direccion_entrega,s.direccion_salida, e.idcliente, e.nombre_razon_social_emp, s.idproducto, p. desc_prod
				from solicitud as s
				inner join cliente as e
				inner join producto as p
				where (s.idproducto=p.idproducto)
				and (e.idcliente=s.idcliente)";
			}
			else if ($this->asbusqueda!="")
			{
				$lsSql="select s.idsolicitud,e.representantenombre_emp,s.cedula_res,s.direccion_entrega,s.direccion_salida, e.idcliente, e.nombre_razon_social_emp, s.idproducto, p.desc_prod
				from solicitud as s
				inner join cliente as e
				inner join producto as p
				where (s.idproducto=p.idproducto)
				and (e.idcliente=s.idcliente)
				and (idsolicitud='$this->asbusqueda')";
			}

			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb))
			{
				$laMatriz [$liI] [0]= $laTupla ["idsolicitud"];
				$laMatriz [$liI] [1]= $laTupla ["representantenombre_emp"];
				$laMatriz [$liI] [3]= $laTupla ["nombre_razon_social_emp"];
				$laMatriz [$liI] [4]= $laTupla ["desc_prod"];
				$laMatriz [$liI] [5]= $laTupla ["direccion_entrega"];
				$laMatriz [$liI] [6]= $laTupla ["direccion_salida"];
				$laMatriz [$liI] [7]= $laTupla ["cedula_res"];
				$liI++;   
			}

			$this->fCierraFiltro($lrTb);
			//$this->fDesconectar;
			return $laMatriz;

		}

	}

?>
