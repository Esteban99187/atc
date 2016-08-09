<?php

    require_once("class_db.php");
    class class_estado extends class_db
    {
		private $aiidestado;
		private $asdesc_esta;
		private $asidpais;

		public function __construct()
			{
				$this->aiidestado=0;
				$this->asdesc_esta="";
				$this->asidpais="";
			}

		public function __destruct()
		{
		}

		public function fsetiidestado($piidestado)
			{
				$this->aiidestado=$piidestado;
			}

		public function fsetsdesc_esta($psdesc_esta)
			{
				$this->asdesc_esta=$psdesc_esta;
			}

		public function fsetsidpais($psidpais)
			{
				$this->asidpais=$psidpais;
			}

		public function fgetiidestado()
			{
				return $this->aiidestado;
			}

		public function fgetsdesc_esta()
			{
				return $this->asdesc_esta;
			}

		public function fgetsidpais()
			{
				return $this->asidpais;
			}
		
		public function fbuscar()
			{
				$lbenc=false;
				$lssql="select idestado, desc_esta, idpais from estado where (idestado='$this->aiidestado')";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				if($larow=$this->fproximo($lrtb))
					{
						$this->aiidestado=$larow["idestado"];
						$this->asdesc_esta=$larow["desc_esta"];
						$this->asidpais=$larow["idpais"];
						$lbenc=true;
					}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lbenc;
			}
		
		public function fverificarexistencia()
			{
				$lbenc=false;
				$lssql="select * from estado where (desc_esta='$this->asdesc_esta' and idpais='$this->asidpais')";
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
				$lssql="insert into estado (desc_esta,idpais) values ('$this->asdesc_esta','$this->asidpais')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}

		public function fmodificar()
			{
				$lbhecho=false;
				$this->fconectar();
				$lssql="update estado set desc_esta='$this->asdesc_esta', idpais='$this->asidpais' where (idestado='$this->aiidestado')";
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}

		public function feliminar()
			{
				$lbhecho=false;
				$lssql="update estado set estatus_est='0' where (idestado='$this->aiidestado')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}

		public function factivar()
			{
				$lbhecho=false;
				$lssql="update estado set estatus_est='1' where (idestado='$this->aiidestado')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
			}
				
		public function flistar()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select  e.idestado, e.desc_esta, p.idpais, p.desc_pais
				from estado as e
				inner join pais as p
				where (e.idpais=p.idpais)";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
					{
						$lamatriz[$lii][0]=$larow["idestado"];
						$lamatriz[$lii][1]=$larow["desc_esta"];
						$lamatriz[$lii][2]=$larow["idpais"];
						$lamatriz[$lii][3]=$larow["desc_pais"];
						$lii++;
					}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
	
		public function fnuevo()
			{
				$lssql="select max(idestado) as mayor from estado";
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

		public function flistadoestado($parametro1,$parametro2)
			{
				$this->fconectar();
				if($parametro1!="")//por codigo
				$sql = "SELECT * FROM estado  WHERE (idestado='$parametro1' )";
				if($parametro2!="")//por nombre
				$sql = "SELECT * FROM estado  WHERE (desc_esta='$parametro2' )";
				$cursor=$this->ffiltro($sql);
				$contador = 0;
				$encontrado=false;
				if ($laRow=$this->fproximo($cursor))
					{
						DO
							{
								$filas [$contador][1] = $laRow["idestado"];
								$filas [$contador][2] = $laRow["desc_esta"];	
								$filas [$contador][3] = $laRow["idpais"];	
								$filas [$contador][4] = $laRow["idregion"];	
								$contador++;
							}
						WHILE ($laRow=$this->fproximo($cursor));
						$encontrado=true;
					}
				if($encontrado)
				return $filas;
				else
				return 99;
				$this->fcierrafiltro($cursor);
				$this->fdesconectar();
		}
		
		
			public function flistaractvos()
			{
				$lamatriz=array();
				$lii=0;
				$lssql="select * from estado where estatus_est='1' order by idestado";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idestado"];
					$lamatriz[$lii][1]=$larow["desc_esta"];
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
				$lssql="select * from estado where estatus_est='0' order by idestado";
				$this->fconectar();
				$lrtb=$this->ffiltro($lssql);
				while($larow=$this->fproximo($lrtb))
				{
					$lamatriz[$lii][0]=$larow["idestado"];
					$lamatriz[$lii][1]=$larow["desc_esta"];
					$lii++;
				}
				$this->fcierrafiltro($lrtb);
				$this->fdesconectar();
				return $lamatriz;
			}
	}
?>
