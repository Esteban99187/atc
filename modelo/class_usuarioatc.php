<?php

    require_once("class_db.php");
  class class_usuarios extends class_db
  {
      private $asidusuario;
      private $astipo;
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
      $this->astipo="";
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

    public function fsetstipo($pstipo)
    {
        $this->astipo=$pstipo;

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

    public function fgetstipo()
    {
        return $this->astipo;
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
		$lssql="select * from usuarios where (idusuario='$this->asidusuario' and  idPerfil NOT IN (11))";
		$lrtb=$this->ffiltro($lssql);
		if($larow=$this->fproximo($lrtb))
		{
			$this->asidusuario=$larow["idusuario"];
			$this->astipo=$larow["idPerfil"];
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
			$lssql="select * from usuarios where (idusuario='$this->asidusuario' and idPerfil IN (11))";
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
		//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','usuario','sistema');
			//~ fin del registro de la Bitacora
		$this->fdesconectar();
		return $lbenc;
	}
	public function fbuscarpersona()
	{
		$lbenc=false;
		$this->fconectar();
		$lssql="select * from persona where (cedula='$this->ascedula')";
		$lrtb=$this->ffiltro($lssql);
		if($larow=$this->fproximo($lrtb))
		{
			$this->ascedula=$larow["cedula"];
			$this->asnombre=$larow["nombres_per"];
			$this->asapellido=$larow["apellidos_per"];
			$this->ascorreo=$larow["correo_per"];
			$this->astelefono=$larow["telefono_movil_per"];
			$this->aihay=4;
			$lbenc=true;
		}
		else
		{
				$this->aihay=5;
				$lbenc=true;
		}
		$this->fcierrafiltro($lrtb);
		//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','usuario','sistema');
			//~ fin del registro de la Bitacora
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
        $lssql="insert into usuarios (idusuario,cedula,idPerfil,nombre,clave,apellido,telefono,correo)values('$this->asidusuario','$this->ascedula','$this->astipo','$this->asnombre','$lsclave','$this->asapellido','$this->astelefono','$this->ascorreo')";
        $lbhecho=$this->fejecutar($lssql);
        //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','usuario','sistema');
			//~ fin del registro de la Bitacora
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
        $lssql="update usuarios set  idPerfil='$this->astipo' where (idusuario='$this->asidusuario')";
        $lbhecho=$this->fejecutar($lssql);
        //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','usuario','sistema');
			//~ fin del registro de la Bitacora
        $this->fdesconectar();
        return $lbhecho;
      }

    public function feliminar()
    {
        $lbhecho=false;
        $lssql="update usuarios set status='0'  where (idusuario='$this->asidusuario')";
        $this->fconectar();
        $lbhecho=$this->fejecutar($lssql);
         //~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Elimino Registro','usuario','sistema');
			//~ fin del registro de la Bitacora
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
          $lamatriz[$lii][1]=$larow["tipo"];
          $lamatriz[$lii][2]=$larow["nombre"];
          $lii++;
        }
        $this->fcierrafiltro($lrtb);
        $this->fdesconectar();
        return $lamatriz;
      }

    public function flistar2()
      {
        $lamatriz=array();
        $lii=0;
        $lssql="select * from usuarios as u inner join cliente as c where (u.idcliente=c.idcliente) and (IdPerfil='11')";
        $this->fconectar();
        $lrtb=$this->ffiltro($lssql);
        while($larow=$this->fproximo($lrtb))
        {
          $lamatriz[$lii][0]=$larow["idusuario"];
          $lamatriz[$lii][1]=$larow["cedula"];
          $lamatriz[$lii][2]=$larow["nombre"];
          $lamatriz[$lii][3]=$larow["apellido"];
          $lamatriz[$lii][4]=$larow["telefono"];
          $lamatriz[$lii][5]=$larow["correo"];
          $lamatriz[$lii][6]=$larow["idcliente"];
          $lamatriz[$lii][7]=$larow["nombre_cli"];
          
          $lii++;
        }
        $this->fcierrafiltro($lrtb);
        $this->fdesconectar();
        return $lamatriz;
      }

    public function flistar3()
      {
        $lamatriz=array();
        $lii=0;
        $lssql="select * from usuarios  where IdPerfil NOT IN('11')";
        $this->fconectar();
        $lrtb=$this->ffiltro($lssql);
        while($larow=$this->fproximo($lrtb))
        {
          $lamatriz[$lii][0]=$larow["idusuario"];
          $lamatriz[$lii][1]=$larow["cedula"];
          $lamatriz[$lii][2]=$larow["nombre"];
          $lamatriz[$lii][3]=$larow["apellido"];
          $lamatriz[$lii][4]=$larow["telefono"];
          $lamatriz[$lii][5]=$larow["correo"];
          
          $lii++;
        }
        $this->fcierrafiltro($lrtb);
        $this->fdesconectar();
        return $lamatriz;
      }

    public function flistar4()
      {
        $lamatriz=array();
        $lii=0;
        $lssql="select * from usuarios, cliente  where usuarios.idcliente NOT IN('NULL') and usuarios.idcliente=cliente.idcliente";
        $this->fconectar();
        $lrtb=$this->ffiltro($lssql);
        while($larow=$this->fproximo($lrtb))
        {
          $lamatriz[$lii][0]=$larow["idusuario"];
          $lamatriz[$lii][1]=$larow["cedula"];
          $lamatriz[$lii][2]=$larow["nombre"];
          $lamatriz[$lii][3]=$larow["apellido"];
          $lamatriz[$lii][4]=$larow["telefono"];
          $lamatriz[$lii][5]=$larow["correo"];
          $lamatriz[$lii][6]=$larow["idcliente"];
          $lamatriz[$lii][7]=$larow["nombre_cli"];
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
           $filas [$contador][2] = $laRow["tipo"];
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
		public function ListaVerificarUsuario()
		{
			$this->fconectar();
			$sql = "select * from  usuarios";
			$query = $this->ffiltro($sql);
			$i=1;
			while($rol = $this->fproximo($query))
			{
				$idusuario = $rol["idusuario"];
				if($rol["status"] == '2')
				{
					echo "<tr><td>".strtoupper($rol['idusuario'])."</td><td>".$rol['cedula']."</td><td>".strtoupper($rol['nombre'])."</td><td>".strtoupper($rol['apellido'])."</td><td>".$rol['telefono']."</td><td>".strtoupper($rol['correo'])."</td><td>".$rol['idcliente']."</td><td align='center'><a href=javascript:VerificarUsuario('$idusuario')><i class='glyphicon glyphicon-ok'></i></a></td><td align='center'><a  href=javascript:RechazarUsuario('$idusuario')><i class='glyphicon glyphicon glyphicon-remove-sign'></i></a></td></tr>";
				}
			}
		}
		public function VerificarUsuario($id)
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="update usuarios set  status='1' where (idusuario='$id')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
		public function RechazarUsuario($anu)
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="delete from usuarios where (idusuario='$anu')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}

    }

?>
