<?php

    require_once("class_db.php");
  class class_usuariosatcexterno extends class_db
  {
      private $asidusuario;
      private $asnombre;
      private $asclave;
      private $asapellido;
      private $astelefono;
      private $asnombre_usuari;
      private $ascorreo;
      private $aihay;

    public function __construct()
    {
      $this->asidusuario="";
      $this->asnombre="";
      $this->asclave="";
      $this->asapellido="";
      $this->astelefono="";
      $this->ascedula="";
      $this->ascorreo="";
      $this->aihay=0;
    }

    public function __destruct()
    {

    }

    public function fsetsidusuario($psidusuario)
    {
        $this->asidusuario=$psidusuario;
    }

    public function fsetsnombre($psnombre)
    {
        $this->asnombre=$psnombre;

    }
    public function fsetsclave($psclave)
    {
        $this->asclave=$psclave;

    }

    public function fsetsapellido($psapellido)
    {
        $this->asapellido=$psapellido;

    }

    public function fsetstelefono($pstelefono)
    {
        $this->astelefono=$pstelefono;

    }
    
    public function fsetscedula($pscedula)
    {
        $this->ascedula=$pscedula;

    }
    
    public function fsetscorreo($pscorreo)
    {
        $this->ascorreo=$pscorreo;

    }
    public function fsetihay($pihay)
    {
        $this->aihay=$pihay;

    }

    public function fgetsidusuario()
    {
        return $this->asidusuario;
    }
    public function fgetsnombre()
    {
        return $this->asnombre;
    }
    public function fgetsclave()
    {
        return $this->asclave;
    }
    public function fgetsapellido()
    {
        return $this->asapellido;
    }
    public function fgetstelefono()
    {
        return $this->astelefono;
    }
    public function fgetscedula()
    {
        return $this->ascedula;
    }
    public function fgetscorreo()
    {
        return $this->ascorreo;
    }
    public function fgetihay()
    {
        return $this->aihay;
    }

	public function fbuscar()
	{
		$lbenc=false;
		$this->fconectar();
		$lssql="select * from usuarios where (idusuario='$this->asidusuario' )";
		$lrtb=$this->ffiltro($lssql);
		if($larow=$this->fproximo($lrtb))
		{
			$this->asidusuario=$larow["idusuario"];
			$this->asclave=$larow["clave"];
			$this->asnombre=$larow["nombre"];
			$this->asapellido=$larow["apellido"];
			$this->astelefono=$larow["telefono"];
			$this->ascorreo=$larow["correo"];
			$this->ascedula=$larow["cedula"];
			$this->aihay=1;
			$lbenc=true;
		}
		else
		{
			$lssql="select * from usuarios where (idusuario='$this->asidusuario' )";
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{

				$this->aihay=2;
				$lbenc=true;
			}
			else
			{
					$this->aihay=3;
					$lbenc=true;
			}
		}
		
		$this->fcierrafiltro($lrtb);
		$this->fdesconectar();
		return $lbenc;
	}
	public function fbuscarpersona()
	{
		$lbenc=false;
		$this->fconectar();
		$lssql="select * from cliente where (idcliente='$this->ascedula')";
		$lrtb=$this->ffiltro($lssql);
		if($larow=$this->fproximo($lrtb))
		{
			$this->ascedula=$larow["idcliente"];
			$this->asnombre=$larow["nombre_razon_social_emp"];
			$this->asapellido=$larow["direccion_emp"];
			$this->ascorreo=$larow["correo_emp"];
			$this->astelefono=$larow["telefono_emp"];
			$this->aihay=4;
			$lbenc=true;
		}
		else
		{
				$this->aihay=5;
				$lbenc=true;
		}
		$this->fcierrafiltro($lrtb);
		$this->fdesconectar();
		return $lbenc;
	}
    public function fincluir()
      {
        $lbhecho=false;
        $frase = '$carballo$/';
        $lsclave=sha1($this->ascedula);        
		$lsclave=md5($lsclave.$frase);
        $this->fconectar();
        $lssql="insert into usuarios (idusuario,idcliente,cedula,idPerfil,nombre,clave,apellido,telefono,correo,status)values('$this->asidusuario','$this->ascedula','$this->ascedula','11','$this->asnombre','$lsclave','$this->asapellido','$this->astelefono','$this->ascorreo','2')";
        $lbhecho=$this->fejecutar($lssql);
        $this->fdesconectar();
        return $lbhecho;
      }

    public function fmodificar()
      {
        $lbhecho=false;
        $frase = '$carballo$/';
        $lsclave=sha1($this->asclave);        
		$lsclave=md5($lsclave.$frase);
        $this->fconectar();
        $lssql="update usuarios set cedula='$this->ascedula', nombre='$this->asnombre', clave='$lsclave',apellido='$this->asapellido', telefono='$this->astelefono', correo='$this->ascorreo' where (idusuario='$this->asidusuario')";
        $lbhecho=$this->fejecutar($lssql);
        $this->fdesconectar();
        return $lbhecho;
      }

    public function feliminar()
    {
        $lbhecho=false;
        $lssql="update usuarios set status='0'  where (idusuario='$this->asidusuario')";
        $this->fconectar();
        $lbhecho=$this->fejecutar($lssql);
        $this->fdesconectar();
        return $lbhecho;
    }

    public function flistar()
      {
        $lamatriz=array();
        $lii=0;
        $lssql="select * from usuario order by idusuario";
        $this->fconectar();
        $lrtb=$this->ffiltro($lssql);
        while($larow=$this->fproximo($lrtb))
        {
          $lamatriz[$lii][0]=$larow["idusuario"];
          $lamatriz[$lii][2]=$larow["nombre"];
          $lii++;
        }
        $this->fcierrafiltro($lrtb);
        $this->fdesconectar();
        return $lamatriz;
      }


   public function flistadousuarios($parametro1,$parametro2){
      $this->fconectar();
      if($parametro1!="")//por codigo
      $sql      = "SELECT * FROM usuario  WHERE (idusuario='$parametro1' )";

      if($parametro2!="")//por nombre
      $sql      =  "SELECT * FROM usuario  WHERE (tipo='$parametro2' )";

      $cursor=$this->ffiltro($sql);
      $contador = 0;
      $encontrado=false;

     if ($laRow=$this->fproximo($cursor)){
        DO
        {
           $filas [$contador][1] = $laRow["idusuario"];
           $filas [$contador][3] = $laRow["nombre"];
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

    }

?>
