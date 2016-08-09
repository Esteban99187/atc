<?php

    require_once("class_db.php");
	class class_conductor extends class_db
	{
		private $aicedula;
		private $asnombres_per;
		private $asapellidos_per;
		private $astelefono_movil_per;
		private $astelefono_casa_per;
		private $astelefono_corp_per;
		private $ascorreo_per;
		private $asdireccion_habitacion_per;
		private $asfecha_nacimiento_per;
		private $asfecha_contratacion_per;
		private $asfecha_ven_lic;
		private $asfecha_ven_cermed;
		private $asfecha_ven_ci;
		private $asfecha_ven_cersal;
		private $asfecha_ven_manali;
		private $assueldo_mensual_per;
		private $asperiodo_pago_per;
		private $asforma_pago_per;
			
		public function __construct()
		{
			$this->aicedula=0;
			$this->asnombres_per="";
			$this->asapellidos_per="";
			$this->astelefono_movil_per="";
			$this->astelefono_casa_per="";
			$this->astelefono_corp_per="";
			$this->ascorreo_per="";
			$this->asdireccion_habitacion_per="";
			$this->asfecha_nacimiento_per="";
			$this->asfecha_contratacion_per="";
			$this->asfecha_ven_lic="";
			$this->asfecha_ven_cermed="";
			$this->asfecha_ven_ci="";
			$this->asfecha_ven_cersal="";
			$this->asfecha_ven_manali="";
			$this->assueldo_mensual_per="";
			$this->asperiodo_pago_per="";
			$this->asforma_pago_per="";
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
		public function fsetstelefono_corp_per($pstelefono_corp_per)
		{
			$this->astelefono_corp_per=$pstelefono_corp_per;
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
		public function fsetssueldo_mensual_per($pssueldo_mensual_per)
		{
			$this->assueldo_mensual_per=$pssueldo_mensual_per;
		}
		
		
		public function fsetsperiodo_pago_per($psperiodo_pago_per)
		{
			$this->asperiodo_pago_per=$psperiodo_pago_per;
		}
		public function fsetsforma_pago_per($psforma_pago_per)
		{
			$this->asforma_pago_per=$psforma_pago_per;
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
		public function fgetstelefono_corp_per()
		{
			return $this->astelefono_corp_per;
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
		public function fgetssueldo_mensual_per()
		{
			return $this->assueldo_mensual_per;
		}
		
		public function fgetsperiodo_pago_per()
		{
			return $this->asperiodo_pago_per;
		}
		public function fgetsforma_pago_per()
		{
			return $this->asforma_pago_per;
		}
		
		
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select *, date_format(fecha_nacimiento_per,'%d/%m/%Y') as fecha_nacimiento_per, date_format(fecha_contratacion_per,'%d/%m/%Y') as fecha_contratacion_per, date_format(fecha_ven_lic,'%d/%m/%Y') as fecha_ven_lic, date_format(fecha_ven_cermed,'%d/%m/%Y') as fecha_ven_cermed, date_format(fecha_ven_ci,'%d/%m/%Y') as fecha_ven_ci, date_format(fecha_ven_cersal,'%d/%m/%Y') as fecha_ven_cersal, date_format(fecha_ven_manali,'%d/%m/%Y') as fecha_ven_manali from persona where (cedula='$this->aicedula' and persona.cod_rol='9')";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aicedula=$larow["cedula"];
				$this->asnombres_per=$larow["nombres_per"];
				$this->asapellidos_per=$larow["apellidos_per"];
				$this->astelefono_movil_per=$larow["telefono_movil_per"];
				$this->astelefono_casa_per=$larow["telefono_casa_per"];
				$this->astelefono_corp_per=$larow["telefono_corp_per"];
				$this->ascorreo_per=$larow["correo_per"];
				$this->asdireccion_habitacion_per=$larow["direccion_habitacion_per"];
				$this->asfecha_nacimiento_per=$larow["fecha_nacimiento_per"];
				$this->asfecha_contratacion_per=$larow["fecha_contratacion_per"];
				$this->asfecha_ven_lic=$larow["fecha_ven_lic"];
				$this->asfecha_ven_cermed=$larow["fecha_ven_cermed"];
				$this->asfecha_ven_ci=$larow["fecha_ven_ci"];
				$this->asfecha_ven_cersal=$larow["fecha_ven_cersal"];
				$this->asfecha_ven_manali=$larow["fecha_ven_manali"];
				$this->assueldo_mensual_per=$larow["sueldo_mensual_per"];
				$this->asperiodo_pago_per=$larow["periodo_pago_per"];
				$this->asforma_pago_per=$larow["forma_pago_per"];
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}
			
		
			
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$this->asfecha_nacimiento_per=$this->fFechaBD($this->asfecha_nacimiento_per);
			$this->asfecha_contratacion_per=$this->fFechaBD($this->asfecha_contratacion_per);
			$this->asfecha_ven_lic=$this->fFechaBD($this->asfecha_ven_lic);
			$this->asfecha_ven_cermed=$this->fFechaBD($this->asfecha_ven_cermed);
			$this->asfecha_ven_ci=$this->fFechaBD($this->asfecha_ven_ci);
			$this->asfecha_ven_cersal=$this->fFechaBD($this->asfecha_ven_cersal);
			$this->asfecha_ven_manali=$this->fFechaBD($this->asfecha_ven_manali);
			$lssql="
						update persona set 
						 
						telefono_corp_per='$this->astelefono_corp_per',  
						fecha_ven_lic='$this->asfecha_ven_lic', 
						fecha_ven_cermed='$this->asfecha_ven_cermed', 
						fecha_ven_ci='$this->asfecha_ven_ci', 
						fecha_ven_cersal='$this->asfecha_ven_cersal', 
						fecha_ven_manali='$this->asfecha_ven_manali'
						
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
			
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from persona order by cedula";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][3]=$larow["sexo_per"];
				$lamatriz[$lii][4]=$larow["estado_civil_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][7]=$larow["fecha_nacimiento_per"];
				$lamatriz[$lii][8]=$larow["forma_pago_per"];
				$lamatriz[$lii][9]=$larow["periodo_pago_per"];
				$lamatriz[$lii][10]=$larow["sueldo_mensual_per"];
				$lamatriz[$lii][11]=$larow["nro_hijos_per"];
				$lamatriz[$lii][12]=$larow["nro_hijas_per"];
				$lamatriz[$lii][13]=$larow["nivel_academico_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
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
			
		public function flistadoconductor($parametro1,$parametro2)
		{
		
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM persona WHERE (cedula='$parametro1' and persona.estatus_per='1' and persona.cod_rol='9')";
			
		    
		 
		 if($parametro2!="")//por nombre
			$sql       = "SELECT * FROM persona WHERE (nombres_per='$parametro2' and persona.estatus_per='1' and persona.cod_rol='9')";
		 
		 
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["cedula"];
				   $filas [$contador][2] = $laRow["nombres_per"];	
				   $filas [$contador][3] = $laRow["apellidos_per"];
				   $filas [$contador][4] = $laRow["fecha_nacimiento_per"];	
				   $filas [$contador][5] = $laRow["telefono_movil_per"];	
				   $filas [$contador][6] = $laRow["telefono_casa_per"];	
				   $filas [$contador][7] = $laRow["telefono_corp_per"];	
				   $filas [$contador][8] = $laRow["correo_per"];	
				   $filas [$contador][9] = $laRow["direccion_habitacion_per"];		
				   $filas [$contador][10] = $laRow["fecha_contratacion_per"];	
				   $filas [$contador][11] = $laRow["periodo_pago_per"];	
				   $filas [$contador][12] = $laRow["forma_pago_per"];
				   $filas [$contador][13] = $laRow["sueldo_mensual_per"];
				   $filas [$contador][14] = $laRow["fecha_ven_ci"];	
				   $filas [$contador][15] = $laRow["fecha_ven_lic"];	
				   $filas [$contador][16] = $laRow["fecha_ven_cermed"];	
				   $filas [$contador][17] = $laRow["fecha_ven_cersal"];	
				   $filas [$contador][18] = $laRow["fecha_ven_manali"];	
				   	
				   
				 		
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
		
		
		public function flistadoreluni($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT persona.cedula, nombres_per, telefono_corp_per, idrelacion_unidad, relacion_unidad.idunidad, placa, relacion_unidad.idremolque, placa_rem    FROM persona, relacion_unidad, unidad, remolque  WHERE (persona.cedula='$parametro1' and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque )";
			
		  if($parametro2!="")//por nombre
			$sql      = "SELECT persona.cedula, nombres_per, telefono_corp_per, idrelacion_unidad, relacion_unidad.idunidad, placa, relacion_unidad.idremolque, placa_rem    FROM persona, relacion_unidad, unidad, remolque  WHERE (persona.nombres_per='$parametro2' and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["cedula"];
				   $filas [$contador][2] = $laRow["nombres_per"];	
				   $filas [$contador][3] = $laRow["apellidos_per"];	
				   $filas [$contador][4] = $laRow["telefono_movil_per"];	
				   $filas [$contador][5] = $laRow["telefono_casa_per"];	
				   $filas [$contador][6] = $laRow["telefono_corp_per"];	
				   $filas [$contador][7] = $laRow["correo_per"];	
				   $filas [$contador][8] = $laRow["direccion_habitacion_per"];	
				   $filas [$contador][9] = $laRow["fecha_nacimiento_per"];	
				   $filas [$contador][10] = $laRow["fecha_contratacion_per"];	
				   $filas [$contador][11] = $laRow["fecha_ven_lic"];	
				   $filas [$contador][12] = $laRow["fecha_ven_cermed"];	
				   $filas [$contador][13] = $laRow["fecha_ven_ci"];	
				   $filas [$contador][14] = $laRow["fecha_ven_cersal"];	
				   $filas [$contador][15] = $laRow["fecha_ven_manali"];	
				   $filas [$contador][16] = $laRow["sueldo_mensual_per"];	
				   $filas [$contador][17] = $laRow["periodo_pago_per"];	
				   $filas [$contador][18] = $laRow["forma_pago_per"];	
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
		
		public function CatalogoConductor()
		{
			$this->fconectar();
			$sql      = "SELECT cedula, nombres_per, apellidos_per, telefono_movil_per FROM persona WHERE (persona.estatus_per='1' and persona.cod_rol='9')";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["cedula"];
					$filas [$contador][2] = $laRow["nombres_per"];
					$filas [$contador][3] = $laRow["apellidos_per"];
					$filas [$contador][4] = $laRow["telefono_movil_per"];
					
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
		
		public function BuscaConductor($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT cedula, nombres_per, apellidos_per, telefono_movil_per FROM persona WHERE (cedula='$parametro1' and persona.estatus_per='1' and persona.cod_rol='9')";

			if($parametro2!="")//por nombre
			$sql      = "SELECT cedula, nombres_per, apellidos_per, telefono_movil_per FROM persona WHERE (nombres_per='$parametro2' and persona.estatus_per='1' and persona.cod_rol='9')";

			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["cedula"];
					$filas [$contador][2] = $laRow["nombres_per"];
					$filas [$contador][3] = $laRow["apellidos_per"];
					$filas [$contador][4] = $laRow["telefono_movil_per"];
					
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
