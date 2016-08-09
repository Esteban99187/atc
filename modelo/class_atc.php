<?php

    require_once("class_db.php");
	class class_atc extends class_db
	{
		private $aicedula;
		private $asnombres_per;
		private $asapellidos_per;
		private $astelefono_movil_per;
		private $astelefono_casa_per;
		private $ascorreo_per;
		private $asdireccion_habitacion_per;
		private $asfecha_nacimiento_per;
		private $asfecha_contratacion_per;
		private $assueldo_mensual_per;
		private $asobs_academica_per;
		private $assexo_per;
		private $asestado_civil_per;
		private $asidestatus;
		private $ascod_rol;
		private $asiddepartamento;
		private $asperiodo_pago_per;
		private $asforma_pago_per;
		private $asnro_hijos_per;
		private $asnro_hijas_per;
		private $asnivel_academico_per;
			
		public function __construct()
		{
			$this->aicedula=0;
			$this->asnombres_per="";
			$this->asapellidos_per="";
			$this->astelefono_movil_per="";
			$this->astelefono_casa_per="";
			$this->ascorreo_per="";
			$this->asdireccion_habitacion_per="";
			$this->asfecha_nacimiento_per="";
			$this->asfecha_contratacion_per="";
			$this->assueldo_mensual_per="";
			$this->asobs_academica_per="";
			$this->assexo_per="";
			$this->asestado_civil_per="";
			$this->asidestatus="";
			$this->ascod_rol="";
			$this->asiddepartamento="";
			$this->asperiodo_pago_per="";
			$this->asforma_pago_per="";
			$this->asnro_hijos_per="";
			$this->asnro_hijas_per="";
			$this->asnivel_academico_per="";
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
		public function fsetsfecha_nacimiento_per($psfecha_nacimiento_per)
		{
			$this->asfecha_nacimiento_per=$psfecha_nacimiento_per;
		}
		public function fsetsfecha_contratacion_per($psfecha_contratacion_per)
		{
			$this->asfecha_contratacion_per=$psfecha_contratacion_per;
		}
		public function fsetssueldo_mensual_per($pssueldo_mensual_per)
		{
			$this->assueldo_mensual_per=$pssueldo_mensual_per;
		}
		public function fsetsobs_academica_per($psobs_academica_per)
		{
			$this->asobs_academica_per=$psobs_academica_per;
		}
		public function fsetssexo_per($pssexo_per)
		{
			$this->assexo_per=$pssexo_per;
		}
		public function fsetsestado_civil_per($psestado_civil_per)
		{
			$this->asestado_civil_per=$psestado_civil_per;
		}		
		public function fsetsidestatus($psidestatus)
		{
			$this->asidestatus=$psidestatus;
		}
		public function fsetscod_rol($pscod_rol)
		{
			$this->ascod_rol=$pscod_rol;
		}
		public function fsetsiddepartamento($psiddepartamento)
		{
			$this->asiddepartamento=$psiddepartamento;
		}
		public function fsetsperiodo_pago_per($psperiodo_pago_per)
		{
			$this->asperiodo_pago_per=$psperiodo_pago_per;
		}
		public function fsetsforma_pago_per($psforma_pago_per)
		{
			$this->asforma_pago_per=$psforma_pago_per;
		}
		public function fsetsnro_hijos_per($psnro_hijos_per)
		{
			$this->asnro_hijos_per=$psnro_hijos_per;
		}
		public function fsetsnro_hijas_per($psnro_hijas_per)
		{
			$this->asnro_hijas_per=$psnro_hijas_per;
		}
		public function fsetsnivel_academico_per($psnivel_academico_per)
		{
			$this->asnivel_academico_per=$psnivel_academico_per;
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
		public function fgetsfecha_nacimiento_per()
		{
			return $this->asfecha_nacimiento_per;
		}
		public function fgetsfecha_contratacion_per()
		{
			return $this->asfecha_contratacion_per;
		}
		public function fgetssueldo_mensual_per()
		{
			return $this->assueldo_mensual_per;
		}
		public function fgetsobs_academica_per()
		{
			return $this->asobs_academica_per;
		}
		public function fgetssexo_per()
		{
			return $this->assexo_per;
		}
		public function fgetsestado_civil_per()
		{
			return $this->asestado_civil_per;
		}		
		public function fgetsidestatus()
		{
			return $this->asidestatus;
		}
		public function fgetscod_rol()
		{
			return $this->ascod_rol;
		}
		public function fgetsiddepartamento()
		{
			return $this->asiddepartamento;
		}
		public function fgetsperiodo_pago_per()
		{
			return $this->asperiodo_pago_per;
		}
		public function fgetsforma_pago_per()
		{
			return $this->asforma_pago_per;
		}
		public function fgetsnro_hijos_per()
		{
			return $this->asnro_hijos_per;
		}
		public function fgetsnro_hijas_per()
		{
			return $this->asnro_hijas_per;
		}
		public function fgetsnivel_academico_per()
		{
			return $this->asnivel_academico_per;
		}
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select *, date_format(fecha_nacimiento_per,'%d/%m/%Y') as fecha_nacimiento_per, date_format(fecha_contratacion_per,'%d/%m/%Y') as fecha_contratacion_per from persona where (cedula='$this->aicedula')";
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
				$this->asfecha_nacimiento_per=$larow["fecha_nacimiento_per"];
				$this->asfecha_contratacion_per=$larow["fecha_contratacion_per"];
				$this->assueldo_mensual_per=$larow["sueldo_mensual_per"];
				$this->asobs_academica_per=$larow["obs_academica_per"];
				$this->assexo_per=$larow["sexo_per"];
				$this->asestado_civil_per=$larow["estado_civil_per"];
				$this->asidestatus=$larow["idestatus"];
				$this->ascod_rol=$larow["cod_rol"];
				$this->asiddepartamento=$larow["iddepartamento"];
				$this->asperiodo_pago_per=$larow["periodo_pago_per"];
				$this->asforma_pago_per=$larow["forma_pago_per"];
				$this->asnro_hijos_per=$larow["nro_hijos_per"];
				$this->asnro_hijas_per=$larow["nro_hijas_per"];
				$this->asnivel_academico_per=$larow["nivel_academico_per"];
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
			$this->asfecha_nacimiento_per=$this->fFechaBD($this->asfecha_nacimiento_per);
			$this->asfecha_contratacion_per=$this->fFechaBD($this->asfecha_contratacion_per);
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
							fecha_nacimiento_per,
							fecha_contratacion_per,
							sueldo_mensual_per,
							obs_academica_per,
							sexo_per, 
							estado_civil_per, 
							idestatus, 
							cod_rol, 
							iddepartamento,
							periodo_pago_per,
							forma_pago_per,
							nro_hijos_per,
							nro_hijas_per,
							nivel_academico_per,
							estatus_per
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
							'$this->asfecha_nacimiento_per',
							'$this->asfecha_contratacion_per',
							'$this->assueldo_mensual_per',
							'$this->asobs_academica_per',
							'$this->assexo_per',
							'$this->asestado_civil_per',
							'$this->asidestatus',
							'$this->ascod_rol',
							'$this->asiddepartamento',
							'$this->asperiodo_pago_per',
							'$this->asforma_pago_per',
							'$this->asnro_hijos_per',
							'$this->asnro_hijas_per',
							'$this->asnivel_academico_per',
							'1'
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
			$this->asfecha_nacimiento_per=$this->fFechaBD($this->asfecha_nacimiento_per);
			$this->asfecha_contratacion_per=$this->fFechaBD($this->asfecha_contratacion_per);
			$lssql="
						update persona set 
						
						nombres_per='$this->asnombres_per', 
						apellidos_per='$this->asapellidos_per', 
						telefono_movil_per='$this->astelefono_movil_per', 
						telefono_casa_per='$this->astelefono_casa_per', 
						correo_per='$this->ascorreo_per', 
						direccion_habitacion_per='$this->asdireccion_habitacion_per', 
						fecha_nacimiento_per='$this->asfecha_nacimiento_per', 
						fecha_contratacion_per='$this->asfecha_contratacion_per', 
						sueldo_mensual_per='$this->assueldo_mensual_per', 
						obs_academica_per='$this->asobs_academica_per', 
						sexo_per='$this->assexo_per', 
						estado_civil_per='$this->asestado_civil_per', 
						idestatus='$this->asidestatus', 
						cod_rol='$this->ascod_rol', 
						iddepartamento='$this->asiddepartamento', 
						periodo_pago_per='$this->asperiodo_pago_per', 
						forma_pago_per='$this->asforma_pago_per',
						nro_hijos_per='$this->asnro_hijos_per', 
						nro_hijas_per='$this->asnro_hijas_per', 
						nivel_academico_per='$this->asnivel_academico_per' 
						
						where 
						
						(cedula='$this->aicedula')
					";
			$lbhecho=$this->fejecutar($lssql);
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="delete from persona where (cedula='$this->aicedula')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
			
		public function fatc()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from tconfiguracion";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["mision"];
				$lamatriz[$lii][1]=$larow["vision"];
				$lamatriz[$lii][2]=$larow["historia"];
				$lamatriz[$lii][3]=$larow["quienes_somos"];
				$lamatriz[$lii][4]=$larow["objetivos"];
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
			
		public function flistadopersonal($parametro1,$parametro2){
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
				   $filas [$contador][4] = $laRow["estado_civil_per"];	
				   $filas [$contador][5] = $laRow["sexo_per"];	
				   $filas [$contador][6] = $laRow["telefono_movil_per"];	
				   $filas [$contador][7] = $laRow["telefono_casa_per"];	
				   $filas [$contador][8] = $laRow["correo_per"];	
				   $filas [$contador][9] = $laRow["direccion_habitacion_per"];	
				   $filas [$contador][10] = $laRow["fecha_nacimiento_per"];	
				   $filas [$contador][11] = $laRow["fecha_contratacion_per"];	
				   $filas [$contador][12] = $laRow["idestatus"];	
				   $filas [$contador][13] = $laRow["cod_rol"];	
				   $filas [$contador][14] = $laRow["iddepartamento"];	
				   $filas [$contador][15] = $laRow["periodo_pago_per"];	
				   $filas [$contador][16] = $laRow["forma_pago_per"];	
				   $filas [$contador][17] = $laRow["sueldo_mensual_per"];	
				   $filas [$contador][18] = $laRow["nro_hijos_per"];	
				   $filas [$contador][19] = $laRow["nro_hijas_per"];	
				   $filas [$contador][20] = $laRow["nivel_academico_per"];	
				   $filas [$contador][21] = $laRow["obs_academica_per"];	
				   
				   
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
