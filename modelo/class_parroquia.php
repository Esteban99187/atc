<?php

    require_once("class_db.php");
    class class_parroquia extends class_db
    {
        private $aiidparroquia;
		private $asdesc_parr;
        private $asidmunicipio;
        private $asidestado;
        private $asidpais;
        private $asestatus_par;

	public function __construct()
	{
            $this->aiidparroquia=0;
            $this->asdesc_parr="";
            $this->asidmunicipio="";
            $this->asidestado="";
            $this->asidpais="";
            $this->asestatus_par="";
	}

	public function __destruct()
	{

        }

	public function fsetiidparroquia($piidparroquia)
	{
            $this->aiidparroquia=$piidparroquia;
	}

	public function fsetsdesc_parr($psdesc_parr)
	{
            $this->asdesc_parr=$psdesc_parr;

	}

	public function fsetsidmunicipio($psidmunicipio)
	{
            $this->asidmunicipio=$psidmunicipio;
	}
	public function fsetsidestado($psidestado)
	{
            $this->asidestado=$psidestado;
	}
	public function fsetsidpais($psidpais)
	{
            $this->asidpais=$psidpais;
	}
	public function fsetsestatus_par($psestatus_par)
	{
            $this->asestatus_par=$psestatus_par;
	}

	public function fgetiidparroquia()
	{
            return $this->aiidparroquia;
	}

	public function fgetsdesc_parr()
	{
            return $this->asdesc_parr;
	}

	public function fgetsidmunicipio()
	{
            return $this->asidmunicipio;
	}
	public function fgetsidestado()
	{
            return $this->asidestado;
	}
	public function fgetsidpais()
	{
            return $this->asidpais;
	}
	public function fgetsestatus_par()
	{
            return $this->asestatus_par;
	}

	public function fbuscar()
	{
            $lbenc=false;
            $lssql="select idparroquia, desc_parr, estatus_par, parroquia.idmunicipio, municipio.idestado, estado.idpais from parroquia, municipio, estado, pais where (idparroquia='$this->aiidparroquia' and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            if($larow=$this->fproximo($lrtb))
            {
                $this->aiidparroquia=$larow["idparroquia"];
				$this->asdesc_parr=$larow["desc_parr"];
				$this->asidmunicipio=$larow["idmunicipio"];
				$this->asidestado=$larow["idestado"];
				$this->asidpais=$larow["idpais"];
				$this->asestatus_par=$larow["estatus_par"];
				$lbenc=true;

            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lbenc;
	}
		public function fverificarexistencia()
			{
				$lbenc=false;
				$lssql="select * from parroquia where (desc_parr='$this->asdesc_parr' and idmunicipio='$this->asidmunicipio')";
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
            $lssql="insert into parroquia (idparroquia,desc_parr,estatus_par,idmunicipio) values ('$this->aiidparroquia','$this->asdesc_parr','1','$this->asidmunicipio')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}

	public function fmodificar()
	{
            $lbhecho=false;
            $this->fconectar();
            $lssql="update parroquia set desc_parr='$this->asdesc_parr', idmunicipio='$this->asidmunicipio' where (idparroquia='$this->aiidparroquia')";
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}

	public function feliminar()
	{
            $lbhecho=false;
			$lssql="update parroquia set estatus_par='0' where (idparroquia='$this->aiidparroquia')";
            $this->fconectar();
            $lbhecho=$this->fejecutar($lssql);
            $this->fdesconectar();
            return $lbhecho;
	}
	public function factivar()
		{
			$lbhecho=false;
			$lssql="update parroquia set estatus_par='1' where (idparroquia='$this->aiidparroquia')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}

	public function flistar()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from parroquia, municipio where parroquia.idmunicipio=municipio.idmunicipio order by idparroquia";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idparroquia"];
				$lamatriz[$lii][1]=$larow["desc_parr"];
				$lamatriz[$lii][2]=$larow["desc_muni"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}
	public function flistarpdf()
	{
            $lamatriz=array();
            $lii=0;
            $lssql="select * from parroquia, municipio, estado, pais where parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais order by idparroquia";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idparroquia"];
				$lamatriz[$lii][1]=$larow["desc_parr"];
				$lamatriz[$lii][2]=$larow["desc_muni"];
				$lamatriz[$lii][3]=$larow["desc_esta"];
				$lamatriz[$lii][4]=$larow["desc_pais"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}

	public function fnuevo()
	{
            $lssql="select max(idparroquia) as mayor from parroquia";
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

    public function flistadoparroquia($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM parroquia,estado  WHERE (idparroquia='$parametro1 ')";

		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM parroquia, estado  WHERE (desc_parr='$parametro2')";




		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;

		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idparroquia"];
				   $filas [$contador][2] = $laRow["desc_parr"];
				   $filas [$contador][3] = $laRow["idmunicipio"];
				   $filas [$contador][4] = $laRow["idpais"];
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
            $lssql="select * from parroquia, municipio, estado, pais where (estatus_par='1') and (parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais) order by idparroquia";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idparroquia"];
				$lamatriz[$lii][1]=$larow["desc_parr"];
				$lamatriz[$lii][2]=$larow["desc_muni"];
				$lamatriz[$lii][3]=$larow["desc_esta"];
				$lamatriz[$lii][4]=$larow["desc_pais"];
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
            $lssql="select * from parroquia, municipio, estado, pais where (estatus_par='0') and (parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais) order by idparroquia";
            $this->fconectar();
            $lrtb=$this->ffiltro($lssql);
            while($larow=$this->fproximo($lrtb))
            {
                $lamatriz[$lii][0]=$larow["idparroquia"];
				$lamatriz[$lii][1]=$larow["desc_parr"];
				$lamatriz[$lii][2]=$larow["desc_muni"];
				$lamatriz[$lii][3]=$larow["desc_esta"];
				$lamatriz[$lii][4]=$larow["desc_pais"];
		$lii++;
            }
            $this->fcierrafiltro($lrtb);
            $this->fdesconectar();
            return $lamatriz;
	}




    }

?>
