<?php

    require_once("class_db.php");
	class class_conductoratc extends class_db
	{
		private $aicedula;
		private $asnombres_per;
		private $asapellidos_per;
		private $astelefono_movil_per;
		private $astelefono_casa_per;
		private $ascorreo_per;
		private $asdireccion_habitacion_per;
		private $asobservacion_per;
		private $asidestatus;		
		private $asestatus_con;
		
		
		private $astelefono_corp_per;
		private $asfecha_contratacion_per;
		private $asfecha_ven_lic;
		private $asfecha_ven_cermed;
		private $asfecha_ven_ci;
		private $asfecha_ven_cersal;
		private $asfecha_ven_manali;
		
			
		public function __construct()
		{
			$this->aicedula=0;
			$this->asnombres_per="";
			$this->asapellidos_per="";
			$this->astelefono_movil_per="";
			$this->astelefono_casa_per="";
			$this->ascorreo_per="";
			$this->asdireccion_habitacion_per="";
			$this->asobservacion_per="";
			$this->asidestatus="";
			$this->asestatus_con="";
			
			$this->astelefono_corp_per="";
			$this->asfecha_ven_lic="";
			$this->asfecha_ven_cermed="";
			$this->asfecha_ven_ci="";
			$this->asfecha_ven_cersal="";
			$this->asfecha_ven_manali="";
			
		}
			
		public function __destruct()
		{
				
		}
			
		public function fseticedula($picedula)
		{
			$this->aicedula=$picedula;
		}
			
		public function fsetsnombres_per($psnombres_per)
		{
			$this->asnombres_per=$psnombres_per;
		}
		public function fsetsapellidos_per($psapellidos_per)
		{
			$this->asapellidos_per=$psapellidos_per;
		}
		public function fsetstelefono_movil_per($pstelefono_movil_per)
		{
			$this->astelefono_movil_per=$pstelefono_movil_per;
		}
		public function fsetstelefono_casa_per($pstelefono_casa_per)
		{
			$this->astelefono_casa_per=$pstelefono_casa_per;
		}
		public function fsetscorreo_per($pscorreo_per)
		{
			$this->ascorreo_per=$pscorreo_per;
		}
		public function fsetsdireccion_habitacion_per($psdireccion_habitacion_per)
		{
			$this->asdireccion_habitacion_per=$psdireccion_habitacion_per;
		}
		public function fsetsobservacion_per($psobservacion_per)
		{
			$this->asobservacion_per=$psobservacion_per;
		}		
		public function fsetsidestatus($psidestatus)
		{
			$this->asidestatus=$psidestatus;
		}
		public function fsetsestatus_con($psestatus_con)
		{
			$this->asestatus_con=$psestatus_con;
		}
		
		
		
		public function fsetstelefono_corp_per($pstelefono_corp_per)
		{
			$this->astelefono_corp_per=$pstelefono_corp_per;
		}
		public function fsetsfecha_ven_lic($psfecha_ven_lic)
		{
			$this->asfecha_ven_lic=$psfecha_ven_lic;
		}
		public function fsetsfecha_ven_cermed($psfecha_ven_cermed)
		{
			$this->asfecha_ven_cermed=$psfecha_ven_cermed;
		}
		public function fsetsfecha_ven_ci($psfecha_ven_ci)
		{
			$this->asfecha_ven_ci=$psfecha_ven_ci;
		}
		public function fsetsfecha_ven_cersal($psfecha_ven_cersal)
		{
			$this->asfecha_ven_cersal=$psfecha_ven_cersal;
		}
		public function fsetsfecha_ven_manali($psfecha_ven_manali)
		{
			$this->asfecha_ven_manali=$psfecha_ven_manali;
		}
		
		public function fgeticedula()
		{
			return $this->aicedula;
		}
		public function fgetsnombres_per()
		{
			return $this->asnombres_per;
		}
		public function fgetsapellidos_per()
		{
			return $this->asapellidos_per;
		}
		public function fgetstelefono_movil_per()
		{
			return $this->astelefono_movil_per;
		}
		public function fgetstelefono_casa_per()
		{
			return $this->astelefono_casa_per;
		}
		public function fgetscorreo_per()
		{
			return $this->ascorreo_per;
		}
		public function fgetsdireccion_habitacion_per()
		{
			return $this->asdireccion_habitacion_per;
		}
		public function fgetsobservacion_per()
		{
			return $this->asobservacion_per;
		}		
		public function fgetsidestatus()
		{
			return $this->asidestatus;
		}
		public function fgetsestatus_con()
		{
			return $this->asestatus_con;
		}
		
		public function fgetstelefono_corp_per()
		{
			return $this->astelefono_corp_per;
		}
		public function fgetsfecha_ven_lic()
		{
			return $this->asfecha_ven_lic;
		}
		public function fgetsfecha_ven_cermed()
		{
			return $this->asfecha_ven_cermed;
		}
		public function fgetsfecha_ven_ci()
		{
			return $this->asfecha_ven_ci;
		}
		public function fgetsfecha_ven_cersal()
		{
			return $this->asfecha_ven_cersal;
		}
		public function fgetsfecha_ven_manali()
		{
			return $this->asfecha_ven_manali;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select *, date_format(fecha_ven_lic,'%d/%m/%Y') as fecha_ven_lic, date_format(fecha_ven_cermed,'%d/%m/%Y') as fecha_ven_cermed, date_format(fecha_ven_ci,'%d/%m/%Y') as fecha_ven_ci, date_format(fecha_ven_cersal,'%d/%m/%Y') as fecha_ven_cersal, date_format(fecha_ven_manali,'%d/%m/%Y') as fecha_ven_manali from persona where (cedula='$this->aicedula' and persona.cod_rol='9')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aicedula=$larow["cedula"];
				$this->asnombres_per=$larow["nombres_per"];
				$this->asapellidos_per=$larow["apellidos_per"];
				$this->astelefono_movil_per=$larow["telefono_movil_per"];
				$this->astelefono_casa_per=$larow["telefono_casa_per"];
				$this->ascorreo_per=$larow["correo_per"];
				$this->asdireccion_habitacion_per=$larow["direccion_habitacion_per"];
				$this->asobservacion_per=$larow["observacion_per"];
				$this->asidestatus=$larow["idestatus"];
				$this->asestatus_con=$larow["estatus_con"];
				$this->astelefono_corp_per=$larow["telefono_corp_per"];
				$this->asfecha_ven_lic=$larow["fecha_ven_lic"];
				$this->asfecha_ven_cermed=$larow["fecha_ven_cermed"];
				$this->asfecha_ven_ci=$larow["fecha_ven_ci"];
				$this->asfecha_ven_cersal=$larow["fecha_ven_cersal"];
				$this->asfecha_ven_manali=$larow["fecha_ven_manali"];
				
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
			
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->asfecha_ven_lic=$this->fFechaBD($this->asfecha_ven_lic);
			$this->asfecha_ven_cermed=$this->fFechaBD($this->asfecha_ven_cermed);
			$this->asfecha_ven_ci=$this->fFechaBD($this->asfecha_ven_ci);
			$this->asfecha_ven_cersal=$this->fFechaBD($this->asfecha_ven_cersal);
			$this->asfecha_ven_manali=$this->fFechaBD($this->asfecha_ven_manali);
			$lssql="
						insert into persona 
						(
							cedula,
							nombres_per, 
							apellidos_per, 
							telefono_movil_per,
							telefono_casa_per,
							correo_per,
							direccion_habitacion_per,
							observacion_per,
							idestatus, 
							cod_rol, 
							iddepartamento,
							telefono_corp_per,
							fecha_ven_lic,
							fecha_ven_cermed,
							fecha_ven_ci,
							fecha_ven_cersal,
							fecha_ven_manali
						)
							
						values
						(
							'$this->aicedula',
							'$this->asnombres_per',
							'$this->asapellidos_per',
							'$this->astelefono_movil_per',
							'$this->astelefono_casa_per',
							'$this->ascorreo_per',
							'$this->asdireccion_habitacion_per',
							'$this->asobservacion_per',
							'1',
							'9',
							'9',
							'$this->astelefono_corp_per',
							'$this->asfecha_ven_lic',
							'$this->asfecha_ven_cermed',
							'$this->asfecha_ven_ci',
							'$this->asfecha_ven_cersal',
							'$this->asfecha_ven_manali'
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
			$this->asfecha_ven_lic=$this->fFechaBD($this->asfecha_ven_lic);
			$this->asfecha_ven_cermed=$this->fFechaBD($this->asfecha_ven_cermed);
			$this->asfecha_ven_ci=$this->fFechaBD($this->asfecha_ven_ci);
			$this->asfecha_ven_cersal=$this->fFechaBD($this->asfecha_ven_cersal);
			$this->asfecha_ven_manali=$this->fFechaBD($this->asfecha_ven_manali);
			$lssql="
						update persona set
						nombres_per='$this->asnombres_per', 
						apellidos_per='$this->asapellidos_per', 
						telefono_movil_per='$this->astelefono_movil_per', 
						telefono_casa_per='$this->astelefono_casa_per', 
						correo_per='$this->ascorreo_per', 
						direccion_habitacion_per='$this->asdireccion_habitacion_per', 
						observacion_per='$this->asobservacion_per', 
						idestatus='$this->asidestatus', 
						telefono_corp_per='$this->astelefono_corp_per',
						fecha_ven_lic='$this->asfecha_ven_lic',
						fecha_ven_cermed='$this->asfecha_ven_cermed',
						fecha_ven_ci='$this->asfecha_ven_ci',
						fecha_ven_cersal='$this->asfecha_ven_cersal',
						fecha_ven_manali='$this->asfecha_ven_manali'
						where
						(cedula='$this->aicedula')
					";
			if($lbhecho=$this->fejecutar($lssql))
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
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update persona set estatus_con='0' where (cedula='$this->aicedula')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				//~ inicia registro del evento en la Bitacora 
				$this->Bitacora('Desactivo Registro','Conductor','sistema');
				//~ fin del registro de la Bitacora
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
				$lbhecho=false;
				$lssql="update persona set estatus_con='1' where (cedula='$this->aicedula')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				//~ inicia registro del evento en la Bitacora 
				$this->Bitacora('Activo Registro','Conductor','sistema');
				//~ fin del registro de la Bitacora
				$this->fdesconectar();
				return $lbhecho;
		}
			
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][3]=$larow["telefono_movil_per"];
				$lamatriz[$lii][4]=$larow["telefono_corp_per"];
				$lamatriz[$lii][5]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][6]=$larow["nombre_rol"];
				$lamatriz[$lii][7]=$larow["desc_depa"];
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
			$lssql="select * from persona where (persona.cod_rol=9)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][3]=$larow["telefono_movil_per"];
				$lamatriz[$lii][4]=$larow["telefono_casa_per"];
				$lamatriz[$lii][5]=$larow["telefono_corp_per"];
				$lamatriz[$lii][6]=$larow["direccion_habitacion_per"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		
		public function fnuevo()
		{
			$lssql="select max(cedula) as mayor from persona";
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
			
		public function flistadopersonaatc($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM persona  WHERE (cedula='$parametro1' )";
			
		  if($parametro2!="")//por nombre
			$sql      =  "SELECT * FROM persona  WHERE (nombres_per='$parametro2' )";
		  
			
			
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["cedula"];
				   $filas [$contador][2] = $laRow["nombres_per"];	
				   $filas [$contador][3] = $laRow["apellidos_per"];	
				   $filas [$contador][6] = $laRow["telefono_movil_per"];	
				   $filas [$contador][7] = $laRow["telefono_casa_per"];	
				   $filas [$contador][8] = $laRow["correo_per"];	
				   $filas [$contador][9] = $laRow["direccion_habitacion_per"];	
				   $filas [$contador][12] = $laRow["idestatus"];	
				   $filas [$contador][13] = $laRow["cod_rol"];	
				   $filas [$contador][14] = $laRow["iddepartamento"];	
				   $filas [$contador][21] = $laRow["observacion_per"];	
				   
				   
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
