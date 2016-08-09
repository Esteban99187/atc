<?php

    require_once("class_db.php");
	class class_personaatc extends class_db
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
		private $ascod_rol;
		private $asiddepartamento;
			
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
			$this->ascod_rol="";
			$this->asiddepartamento="";
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
		public function fsetscod_rol($pscod_rol)
		{
			$this->ascod_rol=$pscod_rol;
		}
		public function fsetsiddepartamento($psiddepartamento)
		{
			$this->asiddepartamento=$psiddepartamento;
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
		public function fgetscod_rol()
		{
			return $this->ascod_rol;
		}
		public function fgetsiddepartamento()
		{
			return $this->asiddepartamento;
		}
		public function fbuscar()
		{
			$lbenc=false;
			$lssql="select * from persona where (cedula='$this->aicedula')";
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
				$this->ascod_rol=$larow["cod_rol"];
				$this->asiddepartamento=$larow["iddepartamento"];
				$lbenc=true;
				
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lbenc;
		}

		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from persona where (nombres_per='$this->asnombres_per' and apellidos_per='$this->asapellidos_per')";
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
							'$this->asobservacion_per',
							'$this->asidestatus',
							'$this->ascod_rol',
							'$this->asiddepartamento',
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
						cod_rol='$this->ascod_rol', 
						iddepartamento='$this->asiddepartamento'
						
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
				$lssql="update persona set estatus_con='0' where (cedula='$this->aicedula')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				$this->fdesconectar();
				return $lbhecho;
		}
		public function factivar()
		{
			$lbhecho=false;
			$lssql="update persona set estatus_con='1' where (cedula='$this->aicedula')";
			$this->fconectar();
			$lbhecho=$this->fejecutar($lssql);
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
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
			
			public function flistar2252()
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
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
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
					public function flistar1()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (idestatus='1') and (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
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
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (idestatus='2') and (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
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
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (idestatus='3') and (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
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
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (idestatus='4') and (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
		public function flistar5()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from persona as p inner join rol as r inner join departamento d where (idestatus='5') and (p.cod_rol=r.cod_rol) and (p.iddepartamento=d.iddepartamento)";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["cedula"];
				$lamatriz[$lii][1]=$larow["nombres_per"];
				$lamatriz[$lii][2]=$larow["apellidos_per"];
				$lamatriz[$lii][5]=$larow["telefono_movil_per"];
				$lamatriz[$lii][6]=$larow["telefono_casa_per"];
				$lamatriz[$lii][14]=$larow["direccion_habitacion_per"];
				$lamatriz[$lii][7]=$larow["nombre_rol"];
				$lamatriz[$lii][8]=$larow["desc_depa"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
    }
    
?>
