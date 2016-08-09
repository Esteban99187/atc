<?php

    require_once("class_db.php");
	class class_cliente extends class_db
	{
		private $aiidcliente;
		private $asnombre_cli;
		private $asapellido_cli;
		private $asidtipo_cliente_cli;
		private $asidtipo_contribuyente_cli;
		private $asidtipo_proveedor_cli;
		private $assector_cli;
		private $asorigen_cli;
		private $asdireccion_cli;
		private $astelefono_cli;
		private $astelefono_movil_cli;
		private $aspag_web_cli;
		private $ascorreo_cli;
		private $asnro_fax_cli;
		
		
			
		public function __construct()
		{
			$this->aiidcliente=0;
			$this->asnombre_cli="";
			$this->asapellido_cli="";
			$this->asidtipo_cliente_cli="";
			$this->asidtipo_contribuyente_cli="";
			$this->asidtipo_proveedor_cli="";
			$this->assector_cli="";
			$this->asorigen_cli="";
			$this->asdireccion_cli="";
			$this->astelefono_cli="";
			$this->astelefono_movil_cli="";
			$this->aspag_web_cli="";
			$this->ascorreo_cli="";
			$this->asnro_fax_cli="";
		
		}
			
		public function __destruct()
		{
				
		}
		public function fsetiidcliente($piidcliente)
		{
			$this->aiidcliente=$piidcliente;
		}
		public function fsetsnombre_cli($psnombre_cli)
		{
			$this->asnombre_cli=$psnombre_cli;
		}
		public function fsetsapellido_cli($psapellido_cli)
		{
			$this->asapellido_cli=$psapellido_cli;
		}
		public function fsetsidtipo_cliente_cli($psidtipo_cliente_cli)
		{
			$this->asidtipo_cliente_cli=$psidtipo_cliente_cli;
		}
		public function fsetsidtipo_contribuyente_cli($psidtipo_contribuyente_cli)
		{
			$this->asidtipo_contribuyente_cli=$psidtipo_contribuyente_cli;
		}
		public function fsetsidtipo_proveedor_cli($psidtipo_proveedor_cli)
		{
			$this->asidtipo_proveedor_cli=$psidtipo_proveedor_cli;
		}
		public function fsetssector_cli($pssector_cli)
		{
			$this->assector_cli=$pssector_cli;
		}
		public function fsetsorigen_cli($psorigen_cli)
		{
			$this->asorigen_cli=$psorigen_cli;
		}
		public function fsetsdireccion_cli($psdireccion_cli)
		{
			$this->asdireccion_cli=$psdireccion_cli;
		}
		public function fsetstelefono_cli($pstelefono_cli)
		{
			$this->astelefono_cli=$pstelefono_cli;
		}
		public function fsetstelefono_movil_cli($pstelefono_movil_cli)
		{
			$this->astelefono_movil_cli=$pstelefono_movil_cli;
		}
		public function fsetspag_web_cli($pspag_web_cli)
		{
			$this->aspag_web_cli=$pspag_web_cli;
		}
		public function fsetscorreo_cli($pscorreo_cli)
		{
			$this->ascorreo_cli=$pscorreo_cli;
		}
		public function fsetsnro_fax_cli($psnro_fax_cli)
		{
			$this->asnro_fax_cli=$psnro_fax_cli;
		}
		public function fgetiidcliente()
		{
			return $this->aiidcliente;
		}
		public function fgetsnombre_cli()
		{
			return $this->asnombre_cli;
		}
		public function fgetsapellido_cli()
		{
			return $this->asapellido_cli;
		}
		public function fgetsidtipo_cliente_cli()
		{
			return $this->asidtipo_cliente_cli;
		}
		public function fgetsidtipo_contribuyente_cli()
		{
			return $this->asidtipo_contribuyente_cli;
		}
		public function fgetsidtipo_proveedor_cli()
		{
			return $this->asidtipo_proveedor_cli;
		}
		public function fgetssector_cli()
		{
			return $this->assector_cli;
		}
		public function fgetsorigen_cli()
		{
			return $this->asorigen_cli;
		}
		public function fgetsdireccion_cli()
		{
			return $this->asdireccion_cli;
		}
		public function fgetstelefono_cli()
		{
			return $this->astelefono_cli;
		}
		public function fgetstelefono_movil_cli()
		{
			return $this->astelefono_movil_cli;
		}
		public function fgetspag_web_cli()
		{
			return $this->aspag_web_cli;
		}
		public function fgetscorreo_cli()
		{
			return $this->ascorreo_cli;
		}
		public function fgetsnro_fax_cli()
		{
			return $this->asnro_fax_cli;
		}
		

	
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from cliente where (idcliente='$this->aiidcliente')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aiidcliente=$larow["idcliente"];
				$this->asnombre_cli=$larow["nombre_cli"];
				$this->asapellido_cli=$larow["apellido_cli"];
				$this->asidtipo_cliente_cli=$larow["idtipo_cliente_cli"];
				$this->asidtipo_contribuyente_cli=$larow["idtipo_contribuyente_cli"];
				$this->asidtipo_proveedor_cli=$larow["idtipo_proveedor_cli"];
				$this->assector_cli=$larow["sector_cli"];
				$this->asorigen_cli=$larow["origen_cli"];
				$this->asdireccion_cli=$larow["direccion_cli"];
				$this->astelefono_cli=$larow["telefono_cli"];
				$this->astelefono_movil_cli=$larow["telefono_movil_cli"];
				$this->aspag_web_cli=$larow["pag_web_cli"];
				$this->ascorreo_cli=$larow["correo_cli"];
				$this->asnro_fax_cli=$larow["nro_fax_cli"];
				
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from cliente where (nombre_cli='$this->asnombre_cli')";
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
			$lssql="
						insert into cliente
						(
							idcliente,
							nombre_cli,
							apellido_cli,
							idtipo_cliente_cli, 
							idtipo_contribuyente_cli, 
							idtipo_proveedor_cli,
							sector_cli,
							origen_cli, 
							direccion_cli, 
							telefono_cli,
							telefono_movil_cli,
							pag_web_cli,
							correo_cli,
							nro_fax_cli
							
						)
							
						values
						(
							'$this->aiidcliente',
							'$this->asnombre_cli',
							'$this->asapellido_cli',
							'$this->asidtipo_cliente_cli',
							'$this->asidtipo_contribuyente_cli',
							'$this->asidtipo_proveedor_cli',
							'$this->assector_cli',
							'$this->asorigen_cli',
							'$this->asdireccion_cli',
							'$this->astelefono_cli',
							'$this->astelefono_movil_cli',
							'$this->aspag_web_cli',
							'$this->ascorreo_cli',
							'$this->asnro_fax_cli'
							
						)
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql=$lssql="update cliente set nombre_cli='$this->asnombre_cli', idtipo_cliente_cli='$this->asidtipo_cliente_cli', idtipo_contribuyente_cli='$this->asidtipo_contribuyente_cli', idtipo_proveedor_cli='$this->asidtipo_proveedor_cli', sector_cli='$this->assector_cli', origen_cli='$this->asorigen_cli', direccion_cli='$this->asdireccion_cli', telefono_cli='$this->astelefono_cli', telefono_movil_cli='$this->astelefono_movil_cli', pag_web_cli='$this->aspag_web_cli', correo_cli='$this->ascorreo_cli', nro_fax_cli='$this->asnro_fax_cli' where (idcliente='$this->aiidcliente')";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update cliente set estatus_cli='0' where (idcliente='$this->aiidcliente')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update cliente set estatus_cli='1' where (idcliente='$this->aiidcliente')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from cliente order by idcliente";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idcliente"];
				$lamatriz[$lii][1]=$larow["nombre_cli"];
				$lamatriz[$lii][2]=$larow["apellido_cli"];
				$lamatriz[$lii][5]=$larow["sector_cli"];
				$lamatriz[$lii][6]=$larow["origen_cli"];
				$lamatriz[$lii][7]=$larow["direccion_cli"];
				$lamatriz[$lii][8]=$larow["telefono_cli"];
				$lamatriz[$lii][9]=$larow["telefono_movil_cli"];
				$lamatriz[$lii][10]=$larow["pag_web_cli"];
				$lamatriz[$lii][11]=$larow["correo_cli"];
				$lamatriz[$lii][12]=$larow["nro_fax_cli"];
				$lamatriz[$lii][13]=$larow["idtipo_cliente_cli"];
				$lamatriz[$lii][14]=$larow["idtipo_contribuyente_cli"];
				$lamatriz[$lii][15]=$larow["idtipo_proveedor_cli"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
			
			
		public function fnuevo()
		{
			$lssql="select max(idcliente) as mayor from persona";
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
			
		public function flistadocliente($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM cliente WHERE (idcliente='$parametro1' )";
			
			if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM cliente WHERE (nombre_cli='$parametro2' )";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idcliente"];
					$filas [$contador][2] = $laRow["nombre_cli"];
					$filas [$contador][5] = $laRow["idtipo_cliente_cli"];	
					$filas [$contador][6] = $laRow["idtipo_contribuyente_cli"];	
					$filas [$contador][7] = $laRow["idtipo_proveedor_cli"];	
					$filas [$contador][8] = $laRow["sector_cli"];	
					$filas [$contador][9] = $laRow["origen_cli"];	
					$filas [$contador][10] = $laRow["telefono_cli"];	
					$filas [$contador][11] = $laRow["telefono_movil_cli"];	
					$filas [$contador][12] = $laRow["pag_web_cli"];	
					$filas [$contador][13] = $laRow["correo_cli"];	
					$filas [$contador][14] = $laRow["direccion_cli"];	
					$filas [$contador][17] = $laRow["nro_fax_cli"];	
					$filas [$contador][3] = $laRow["apellido_cli"];	
					
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
		public function flistadocliente_persona($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM cliente WHERE (idcliente='$parametro1' and idtipo_cliente_cli='1' )";
			
			if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM cliente WHERE (nombre_cli='$parametro2' and idtipo_cliente_cli='1')";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idcliente"];
					$filas [$contador][2] = $laRow["nombre_cli"];
					$filas [$contador][3] = $laRow["telefono_cli"];
					$filas [$contador][4] = $laRow["correo_cli"];
					$filas [$contador][5] = $laRow["apellido_cli"];
					
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
		public function flistadoempresa($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM cliente WHERE (idcliente='$parametro1' and idtipo_cliente_cli NOT IN ('1') )";
			
			if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM cliente WHERE (nombre_cli='$parametro2' and idtipo_cliente_cli NOT IN ('1'))";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idcliente"];
					$filas [$contador][2] = $laRow["nombre_cli"];
					$filas [$contador][3] = $laRow["telefono_cli"];
					$filas [$contador][4] = $laRow["correo_cli"];
					$filas [$contador][5] = $laRow["direccion_cli"];
					
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
		public function flistadoclientesolicitud()
		{
			$this->fconectar();
			$sql      = "SELECT * FROM cliente ";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["idcliente"];
					$filas [$contador][2] = $laRow["nombre_cli"];
					$filas [$contador][3] = $laRow["apellido_cli"];
					$filas [$contador][4] = $laRow["telefono_cli"];
					$filas [$contador][5] = $laRow["correo_cli"];
					
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
