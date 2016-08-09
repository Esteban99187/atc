<?php

	require_once("class_db.php");
	class class_cuenta extends class_db
	{
		private $aiidcuenta;
		private $asbanco_idbanco;
		private $asidtipo_cuenta;
		private $asidcliente;
		
		public function __construct()
		{
			$this->aiidcuenta=0;
			$this->asbanco_idbanco="";
			$this->asidtipo_cuenta="";
			$this->asidcliente="";
		}
		public function __destruct()
		{
		}
		public function fsetiidcuenta($piidcuenta)
		{
				$this->aiidcuenta=$piidcuenta;
		}
		public function fsetsbanco_idbanco($psbanco_idbanco)
		{
				$this->asbanco_idbanco=$psbanco_idbanco;
		}
		public function fsetsidtipo_cuenta($psidtipo_cuenta)
		{
            $this->asidtipo_cuenta=$psidtipo_cuenta;
		}
		public function fsetsidcliente($psidcliente)
		{
            $this->asidcliente=$psidcliente;
		}
		public function fgetiidcuenta()
		{
				return $this->aiidcuenta;
		}
		public function fgetsbanco_idbanco()
		{
				return $this->asbanco_idbanco;
		}
		public function fgetsidtipo_cuenta()
		{
            return $this->asidtipo_cuenta;
		}
		public function fgetsidcliente()
		{
            return $this->asidcliente;
		}
		public function fbuscar()
		{
			$lbenc=false;
            $lssql="select idcuenta, banco_idbanco, idtipo_cuenta, idcliente from cuenta_banco where (idcuenta='$this->aiidcuenta')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				$this->aiidcuenta=$larow["idcuenta"];
				$this->asbanco_idbanco=$larow["banco_idbanco"];
				$this->asidtipo_cuenta=$larow["idtipo_cuenta"];
				$this->asidcliente=$larow["idcliente"];
				$lbenc=true;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from cuenta_banco where (idcuenta='$this->aiidcuenta' and banco_idbanco='$this->asbanco_idbanco' and idtipo_cuenta='$this->asidtipo_cuenta' and idcliente='$this->asidcliente')";
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
			$lssql="insert into cuenta_banco (idcuenta,banco_idbanco,idtipo_cuenta, idcliente, estatus_cuenta) values('$this->aiidcuenta','$this->asbanco_idbanco','$this->asidtipo_cuenta','$this->asidcliente', '1')";
			
			if ($lbhecho=$this->fejecutar($lssql))
			{
				$lbenc=true;
			}
			else
			{
				$lbenc=false;
			}
			$this->fdesconectar();
			return $lbhecho;
		}
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update  set banco_idbanco='$this->asbanco_idbanco', idtipo_cuenta='$this->asidtipo_cuenta', idcliente='$this->asidcliente' where (idcuenta='$this->aiidcuenta')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function feliminar()
		{
			$lbhecho=false;
			$lssql="update  cuenta_banco set estatus_cuenta='0' where (idcuenta='$this->aiidcuenta')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update cuenta_banco set estatus_cuenta='1' where (idcuenta='$this->aiidcuenta')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		
		public function fnuevo()
		{
			$lssql="select max(idcuenta) as mayor from cuenta_banco";
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
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select b.idcuenta, b.banco_idbanco, b.idtipo_cuenta, b.idcliente, ba.desc_banc, t.desc_tipo_cuen, c.nombre_cli
												from cuenta_banco as b
												inner join banco  as ba
												inner join tipo_cuenta as t
												inner join cliente as c
						where (b.banco_idbanco=ba.idbanco) and (t.idtipo_cuenta =b.idtipo_cuenta) and (c.idcliente=b.idcliente)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idcuenta"];
				$lamatriz[$lii][1]=$larow["banco_idbanco"];
				$lamatriz[$lii][2]=$larow["idtipo_cuenta"];
				$lamatriz[$lii][3]=$larow["idcliente"];
				$lamatriz[$lii][5]=$larow["desc_banc"];
				$lamatriz[$lii][6]=$larow["desc_tipo_cuen"];
				$lamatriz[$lii][7]=$larow["nombre_cli"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistadocuenta_banco($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")
			{
				$sql="SELECT * FROM cuenta_banco  WHERE (idcuenta='$parametro1' )";
			}
			if($parametro2!="")
			{
				$sql="SELECT * FROM cuenta_banco  WHERE (banco_idbanco='$parametro2' )";
			}
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idcuenta"];
					$filas [$contador][2] = $laRow["banco_idbanco"];
					$filas [$contador][3] = $laRow["idtipo_cuenta"];
					$filas [$contador][4] = $laRow["idcliente"];
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
						public function flistaractvos()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select b.idcuenta, b.banco_idbanco, b.idtipo_cuenta, b.idcliente, ba.desc_banc, t.desc_tipo_cuen, c.nombre_cli
												from cuenta_banco as b
												inner join banco  as ba
												inner join tipo_cuenta as t
												inner join cliente as c
						where (estatus_cuenta='1') and (b.banco_idbanco=ba.idbanco) and (t.idtipo_cuenta =b.idtipo_cuenta) and (c.idcliente=b.idcliente)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idcuenta"];
				$lamatriz[$lii][1]=$larow["banco_idbanco"];
				$lamatriz[$lii][2]=$larow["idtipo_cuenta"];
				$lamatriz[$lii][3]=$larow["idcliente"];
				$lamatriz[$lii][5]=$larow["desc_banc"];
				$lamatriz[$lii][6]=$larow["desc_tipo_cuen"];
				$lamatriz[$lii][7]=$larow["nombre_cli"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		
		
		public function flistainactivos()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select b.idcuenta, b.banco_idbanco, b.idtipo_cuenta, b.idcliente, ba.desc_banc, t.desc_tipo_cuen, c.nombre_cli
												from cuenta_banco as b
												inner join banco  as ba
												inner join tipo_cuenta as t
												inner join cliente as c
						where (estatus_cuenta='0') and (b.banco_idbanco=ba.idbanco) and (t.idtipo_cuenta =b.idtipo_cuenta) and (c.idcliente=b.idcliente)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idcuenta"];
				$lamatriz[$lii][1]=$larow["banco_idbanco"];
				$lamatriz[$lii][2]=$larow["idtipo_cuenta"];
				$lamatriz[$lii][3]=$larow["idcliente"];
				$lamatriz[$lii][5]=$larow["desc_banc"];
				$lamatriz[$lii][6]=$larow["desc_tipo_cuen"];
				$lamatriz[$lii][7]=$larow["nombre_cli"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
	}
?>
