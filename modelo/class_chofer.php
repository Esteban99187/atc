<?

	@include_once("clases/class_db.php");
	@include_once("../../clases/class_db.php");
	
	class chofer extends db
	
	{
		private $cedula;			
		private $nombres_per;		
		private $apellidos_per;		
		private $sexo_per;
		private $estado_civil_per;		
		private $telefono_movil_per;	
		private $telefono_corp_per;		
		private $telefono_casa_per;	
		private $correo_per;		
		private $direccion_habitacion_per;			
		private $fecha_nacimiento_per;		
		private $fecha_contratacion_per;
		private $fecha_ven_lic;
		private $fecha_ven_cermed;
		private $fecha_ven_ci;
		private $fecha_ven_cersal;
		private $fecha_ven_manali;
		private $sueldo_mensual_per;
		private $periodo_pago_per;		
		private $forma_pago_per;
		private $nro_hijos_per;
		private $nro_hijas_per;
		private $nivel_academico_per;	
		private $obs_academica_per;					
		private $cod_rol;
		private $idestatus;	
		private $iddepartamento;
		private $tipodoc_per;
		private $asbusqueda;	
			
				
		public function set_cedula($cedula)
		{
			$this->cedula = htmlspecialchars($cedula,ENT_QUOTES);
		}
		public function set_nombres_per($nombres_per)
		{
			$this->nombres_per = htmlspecialchars($nombres_per,ENT_QUOTES);
		}
		public function set_apellidos_per($apellidos_per)
		{
			$this->apellidos_per = htmlspecialchars($apellidos_per,ENT_QUOTES);	
		}
		public function set_sexo_per($sexo_per)
		{
					$this->sexo_per = htmlspecialchars($sexo_per,ENT_QUOTES);
		}
		public function set_estado_civil_per($estado_civil_per)
		{
					$this->estado_civil_per = htmlspecialchars($estado_civil_per,ENT_QUOTES);
		}
		public function set_telefono_movil_per($telefono_movil_per)
		{
			$this->telefono_movil_per = htmlspecialchars($telefono_movil_per,ENT_QUOTES);
		}		
		public function set_telefono_corp_per($telefono_corp_per)
		{
					$this->telefono_corp_per = htmlspecialchars($telefono_corp_per,ENT_QUOTES);
		}		
		public function set_telefono_casa_per($telefono_casa_per)
		{
			$this->telefono_casa_per = htmlspecialchars($telefono_casa_per,ENT_QUOTES);
		}
		public function set_correo_per($correo_per){
					$this->correo_per = htmlspecialchars($correo_per,ENT_QUOTES);
		}
		public function set_direccion_habitacion_per($direccion_habitacion_per)
		{
					$this->direccion_habitacion_per = htmlspecialchars($direccion_habitacion_per,ENT_QUOTES);
		}
		public function set_fecha_nacimiento_per($fecha_nacimiento_per)
		{
				if($fecha_nacimiento_per){
					$this->fecha_nacimiento_per =date('Y-m-d',strtotime($fecha_nacimiento_per));
				}
		}
		public function set_fecha_contratacion_per($fecha_contratacion_per)
		{
				if($fecha_contratacion_per){
					$this->fecha_contratacion_per =date('Y-m-d',strtotime($fecha_contratacion_per));
				}
		}
		public function set_fecha_ven_lic($fecha_ven_lic)
		{
				if($fecha_ven_lic){
					$this->fecha_ven_lic =date('Y-m-d',strtotime($fecha_ven_lic));
				}
		}
		public function set_fecha_ven_cermed($fecha_ven_cermed)
		{
				if($fecha_ven_cermed){
					$this->fecha_ven_cermed =date('Y-m-d',strtotime($fecha_ven_cermed));
				}
		}
		public function set_fecha_ven_ci($fecha_ven_ci)
		{
				if($fecha_ven_ci){
					$this->fecha_ven_ci =date('Y-m-d',strtotime($fecha_ven_ci));
				}
		}
		public function set_fecha_ven_cersal($fecha_ven_cersal)
		{
				if($fecha_ven_cersal){
					$this->fecha_ven_cersal =date('Y-m-d',strtotime($fecha_ven_cersal));
				}
		}
		public function set_fecha_ven_manali($fecha_ven_manali)
		{
				if($fecha_ven_manali){
					$this->fecha_ven_manali =date('Y-m-d',strtotime($fecha_ven_manali));
				}
		}
		public function set_sueldo_mensual_per($sueldo_mensual_per)
		{
					$this->sueldo_mensual_per = htmlspecialchars($sueldo_mensual_per,ENT_QUOTES);
		}
		public function set_periodo_pago_per($periodo_pago_per)
		{
					$this->periodo_pago_per = htmlspecialchars($periodo_pago_per,ENT_QUOTES);
		}
		public function set_forma_pago_per($forma_pago_per)
		{
					$this->forma_pago_per = htmlspecialchars($forma_pago_per,ENT_QUOTES);
		}
		public function set_nro_hijos_per($nro_hijos_per)
		{
					$this->nro_hijos_per = htmlspecialchars($nro_hijos_per,ENT_QUOTES);
		}
		public function set_nro_hijas_per($nro_hijas_per)
		{
					$this->nro_hijas_per = htmlspecialchars($nro_hijas_per,ENT_QUOTES);
		}
		public function set_nivel_academico_per($nivel_academico_per)
		{
					$this->nivel_academico_per = htmlspecialchars($nivel_academico_per,ENT_QUOTES);
		}
		public function set_obs_academica_per($obs_academica_per)
		{
					$this->obs_academica_per = htmlspecialchars($obs_academica_per,ENT_QUOTES);
		}
		public function set_cod_rol($cod_rol)
		{
					$this->cod_rol = htmlspecialchars($cod_rol,ENT_QUOTES);
		}
		public function set_idestatus($idestatus)
		{
					$this->idestatus = htmlspecialchars($idestatus,ENT_QUOTES);
		}
		public function set_iddepartamento($iddepartamento)
		{
					$this->iddepartamento = htmlspecialchars($iddepartamento,ENT_QUOTES);
		}
		public function set_tipodoc_per($tipodoc_per)
		{
					$this->tipodoc_per = htmlspecialchars($tipodoc_per,ENT_QUOTES);
		}
		public function fSetsbusqueda($psbusqueda){
			$this->asbusqueda=$psbusqueda;
		}
			
		
			
		public function registrar()
		{	
		
			return parent::ejecutar
			("
				INSERT INTO persona
				
				(
				
				 cedula,			
				 nombres_per,		
				 apellidos_per,		
				 sexo_per,
				 estado_civil_per,		
				 telefono_movil_per,	
				 telefono_corp_per,		
				 telefono_casa_per,	
				 correo_per,		
				 direccion_habitacion_per,			
				 fecha_nacimiento_per,		
				 fecha_contratacion_per,
				 fecha_ven_lic,
				 fecha_ven_cermed,
				 fecha_ven_ci,
				 fecha_ven_cersal,
				 fecha_ven_manali,
				 sueldo_mensual_per,
				 periodo_pago_per,		
				 forma_pago_per,
				 nro_hijos_per,
				 nro_hijas_per,
				 nivel_academico_per,	
				 obs_academica_per,					
				 cod_rol,
				 idestatus,	
				 iddepartamento,
				 tipodoc_per,
				 estatus_per
				)
						
		 
				VALUES 
				(
				
				 '$this->cedula',			
				 '$this->nombres_per',		
				 '$this->apellidos_per',		
				 '$this->sexo_per',
				 '$this->estado_civil_per',		
				 '$this->telefono_movil_per',	
				 '$this->telefono_corp_per',		
				 '$this->telefono_casa_per',	
				 '$this->correo_per',		
				 '$this->direccion_habitacion_per',			
				 '$this->fecha_nacimiento_per',		
				 '$this->fecha_contratacion_per',
				 '$this->fecha_ven_lic',
				 '$this->fecha_ven_cermed',
				 '$this->fecha_ven_ci',
				 '$this->fecha_ven_cersal',
				 '$this->fecha_ven_manali',
				 '$this->sueldo_mensual_per',
				 '$this->periodo_pago_per',		
				 '$this->forma_pago_per',
				 '$this->nro_hijos_per',
				 '$this->nro_hijas_per',
				 '$this->nivel_academico_per',	
				 '$this->obs_academica_per',					
				 '$this->cod_rol',
				 '$this->idestatus',	
				 '$this->iddepartamento',
				 '$this->tipodoc_per',
				 '1'
			
				)
			") ;
		}
		public function listar()
		{
			return parent::ejecutar
			("
				SELECT 
				
				 cedula,			
				 nombres_per,		
				 apellidos_per,		
				 sexo_per,
				 estado_civil_per,		
				 telefono_movil_per,	
				 telefono_corp_per,		
				 telefono_casa_per,	
				 correo_per,		
				 direccion_habitacion_per,			
				 date_format(fecha_nacimiento_per,'%d-%m-%Y') AS fecha_nacimiento_per,
				 date_format(fecha_contratacion_per,'%d-%m-%Y') AS fecha_contratacion_per,
				 date_format(fecha_ven_lic,'%d-%m-%Y') AS fecha_ven_lic,
				 date_format(fecha_ven_cermed,'%d-%m-%Y') AS fecha_ven_cermed,
				 date_format(fecha_ven_ci,'%d-%m-%Y') AS fecha_ven_ci,
				 date_format(fecha_ven_cersal,'%d-%m-%Y') AS fecha_ven_cersal,
				 date_format(fecha_ven_manali,'%d-%m-%Y') AS fecha_ven_manali,
				 sueldo_mensual_per,
				 periodo_pago_per,		
				 forma_pago_per,
				 nro_hijos_per,
				 nro_hijas_per,
				 nivel_academico_per,	
				 obs_academica_per,					
				 cod_rol,
				 idestatus,	
				 iddepartamento,
				 tipodoc_per
					
				FROM persona
			");
		}
		public function consultar()
		{	
			return parent::ejecutar
			("
				SELECT
				 
				 cedula,			
				 nombres_per,		
				 apellidos_per,		
				 sexo_per,
				 estado_civil_per,		
				 telefono_movil_per,	
				 telefono_corp_per,		
				 telefono_casa_per,	
				 correo_per,		
				 direccion_habitacion_per,			
				 date_format(fecha_nacimiento_per,'%d-%m-%Y') AS fecha_nacimiento_per,
				 date_format(fecha_contratacion_per,'%d-%m-%Y') AS fecha_contratacion_per,
				 date_format(fecha_ven_lic,'%d-%m-%Y') AS fecha_ven_lic,
				 date_format(fecha_ven_cermed,'%d-%m-%Y') AS fecha_ven_cermed,
				 date_format(fecha_ven_ci,'%d-%m-%Y') AS fecha_ven_ci,
				 date_format(fecha_ven_cersal,'%d-%m-%Y') AS fecha_ven_cersal,
				 date_format(fecha_ven_manali,'%d-%m-%Y') AS fecha_ven_manali,
				 sueldo_mensual_per,
				 periodo_pago_per,		
				 forma_pago_per,
				 nro_hijos_per,
				 nro_hijas_per,
				 nivel_academico_per,	
				 obs_academica_per,					
				 cod_rol,
				 idestatus,	
				 iddepartamento,
				 tipodoc_per
				 
				FROM persona 
				
				WHERE 
				
				cedula='$this->cedula'
			");		
		}	
		public function buscar()
		{
			return parent::ejecutar
			("
				SELECT
				
					cedula,
					nombres_per
				
				FROM persona
				
				WHERE
				 
				(cedula LIKE '%$this->cedula%') AND
				(nombres_per LIKE '%$this->nombres_per%') 
			");
		}	
		public function eliminar()
		{
			return parent::ejecutar("DELETE FROM persona WHERE cedula='$this->cedula'");
		}	
		public function eliminar_por($por,$id)
		{
			return parent::ejecutar("DELETE FROM persona WHERE $por='$id'");
		}
		public function consulta_por($por,$id)
		{
			return parent::ejecutar("SELECT * FROM persona WHERE $por='$id'");
		}
		public function ultimo_id()
		{		
			parent::ejecutar("SELECT MAX(cedula) AS id FROM persona");
			$ultimo_id=$this->row();
			return $ultimo_id[0];
		}
		public function editar()
		{
			return parent::ejecutar
			("
				UPDATE persona SET 
				
				 cedula='$this->cedula',			
				 nombres_per='$this->nombres_per',		
				 apellidos_per='$this->apellidos_per',		
				 sexo_per='$this->sexo_per',
				 estado_civil_per='$this->estado_civil_per',	
				 telefono_movil_per='$this->telefono_movil_per',	
				 telefono_corp_per='$this->telefono_corp_per',	
				 telefono_casa_per='$this->telefono_casa_per',	
				 correo_per='$this->correo_per',	
				 direccion_habitacion_per='$this->direccion_habitacion_per',			
				 fecha_nacimiento_per='$this->fecha_nacimiento_per',	
				 fecha_contratacion_per='$this->fecha_contratacion_per',
				 fecha_ven_lic='$this->fecha_ven_lic',
				 fecha_ven_cermed='$this->fecha_ven_cermed',
				 fecha_ven_ci='$this->fecha_ven_ci',
				 fecha_ven_cersal='$this->fecha_ven_cersal',
				 fecha_ven_manali='$this->fecha_ven_manali',
				 sueldo_mensual_per='$this->sueldo_mensual_per',
				 periodo_pago_per='$this->periodo_pago_per',		
				 forma_pago_per='$this->forma_pago_per',
				 nro_hijos_per='$this->nro_hijos_per',
				 nro_hijas_per='$this->nro_hijas_per',
				 nivel_academico_per='$this->nivel_academico_per',	
				 obs_academica_per='$this->obs_academica_per',					
				 cod_rol='$this->cod_rol',
				 idestatus='$this->idestatus',
				 iddepartamento='$this->iddepartamento',
				 tipodoc_per='$this->tipodoc_per'
				 		 		 		
				WHERE 
				
				cedula='$this->cedula'
			");	
		}
		public function row()
		{	
			return mysql_fetch_array(parent::$this->res);	
		}
		
		
		
		public function flistadopersona($parametro1,$parametro2)
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
				   $filas [$contador][4] = $laRow["telefono_corp_per"];	
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
			$sql      = "SELECT persona.cedula, nombres_per, telefono_corp_per, idrelacion_unidad, relacion_unidad.idunidad, placa_uni, relacion_unidad.idremolque, placa_rem    FROM persona, relacion_unidad, unidad, remolque  WHERE (persona.cedula='$parametro1' and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque )";
			
		  if($parametro2!="")//por nombre
			$sql      = "SELECT persona.cedula, nombres_per, telefono_corp_per, idrelacion_unidad, relacion_unidad.idunidad, placa_uni, relacion_unidad.idremolque, placa_rem    FROM persona, relacion_unidad, unidad, remolque  WHERE (persona.nombres_per='$parametro2' and relacion_unidad.cedula=persona.cedula and relacion_unidad.idunidad=unidad.idunidad and relacion_unidad.idremolque=remolque.idremolque )";
		 
		  $cursor=$this->ffiltro($sql);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["cedula"];
				   $filas [$contador][2] = $laRow["nombres_per"];
				   $filas [$contador][3] = $laRow["telefono_corp_per"];	
				   $filas [$contador][4] = $laRow["idrelacion_unidad"];
				   $filas [$contador][5] = $laRow["idunidad"];
				   $filas [$contador][6] = $laRow["placa_uni"];	
				   $filas [$contador][7] = $laRow["idremolque"];	
				   $filas [$contador][8] = $laRow["placa_rem"];
				   $filas [$contador][9] = $laRow["direccion_entrega"];	
				   $filas [$contador][10] = $laRow["fecha_salida"];	
				   $filas [$contador][11] = $laRow["fecha_entrega"];	
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
		public function fBusqueda(){
			$liI=0;
			
				$lsSql="SELECT p.cedula, p.nombres_per, p.apellidos_per, e.nombre_est from persona as p inner join  estatus as e where (p.idestatus='$this->asbusqueda') and (p.idestatus=e.idestatus)";

						
			$this->fConectar();
			$lrTb=$this->fFiltro($lsSql);
			While($laTupla=$this->fProximo($lrTb)){
					$laMatriz [$liI] [0]= $laTupla ["cedula"];
					$laMatriz [$liI] [1]= $laTupla ["nombres_per"];
					$laMatriz [$liI] [2]= $laTupla ["apellidos_per"];
					$laMatriz [$liI] [3]= $laTupla ["nombre_est"];				
					$liI++;   
			}
			$this->fCierraFiltro($lrTb);
			$this->fDesconectar;
			return $laMatriz;
		}


	}
	
?>
