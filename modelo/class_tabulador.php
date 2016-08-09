<?php

    require_once("class_db.php");
	class class_tabulador extends class_db
	{
		private $aiidtabulador;
		private $askilometraje_tab;
		private $asprecio_total_tab;
		private $asestatus_tab;
		private $asidprecio;
		private $asprecio_pre;
		private $asdesc_tipo_unid;
		private $ascapacidad;
		private $asmedida;
		private $asidruta;
		private $asvia_rut;
		private $asidpais_destino_tabulador;
		private $asidestado_destino_tabulador;
		private $asidmunicipio_destino_tabulador;
		private $asidparroquia_destino_tabulador;
		private $asidciudad_destino_tabulador;
		private $asidpais_origen_tabulador;
		private $asidestado_origen_tabulador;
		private $asidmunicipio_origen_tabulador;
		private $asidparroquia_origen_tabulador;
		private $asidciudad_origen_tabulador;
			
		public function __construct()
		{
			$this->aiidtabulador=0;
			$this->askilometraje_tab="";
			$this->asprecio_total_tab="";
			$this->asestatus_tab="";
			$this->asidprecio="";
			$this->asprecio_pre="";
			$this->asdesc_tipo_unid="";
			$this->ascapacidad="";
			$this->asmedida="";
			$this->asidruta="";
			$this->asvia_rut="";
			$this->asidpais_destino_tabulador="";
			$this->asidestado_destino_tabulador="";
			$this->asidmunicipio_destino_tabulador="";
			$this->asidparroquia_destino_tabulador="";
			$this->asidciudad_destino_tabulador="";
			$this->asidpais_origen_tabulador="";
			$this->asidestado_origen_tabulador="";
			$this->asidmunicipio_origen_tabulador="";
			$this->asidparroquia_origen_tabulador="";
			$this->asidciudad_origen_tabulador="";

		}

		public function __destruct()
		{

		}

		public function fsetiidtabulador($piidtabulador)
		{
			$this->aiidtabulador=$piidtabulador;
		}
			
		public function fsetskilometraje_tab($pskilometraje_tab)
		{
			$this->askilometraje_tab=$pskilometraje_tab;
		}
		public function fsetsprecio_total_tab($psprecio_total_tab)
		{
			$this->asprecio_total_tab=$psprecio_total_tab;
		}
		public function fsetsestatus_tab($psestatus_tab)
		{
			$this->asestatus_tab=$psestatus_tab;
		}
		public function fsetsidprecio($psidprecio)
		{
			$this->asidprecio=$psidprecio;
		}
		public function fsetsprecio_pre($psprecio_pre)
		{
			$this->asprecio_pre=$psprecio_pre;
		}			
		public function fsetsdesc_tipo_unid($psdesc_tipo_unid)
		{
			$this->asdesc_tipo_unid=$psdesc_tipo_unid;
		}			
		public function fsetscapacidad($pscapacidad)
		{
			$this->ascapacidad=$pscapacidad;
		}
		public function fsetsmedida($psmedida)
		{
			$this->asmedida=$psmedida;
		}
		public function fsetsidruta($psidruta)
		{
			$this->asidruta=$psidruta;
		}
		public function fsetsvia_rut($psvia_rut)
		{
			$this->asvia_rut=$psvia_rut;
		}
		public function fsetsidpais_destino_tabulador($psidpais_destino_tabulador)
		{
			$this->asidpais_destino_tabulador=$psidpais_destino_tabulador;
		}
		public function fsetsidestado_destino_tabulador($psidestado_destino_tabulador)
		{
			$this->asidestado_destino_tabulador=$psidestado_destino_tabulador;
		}
		public function fsetsidmunicipio_destino_tabulador($psidmunicipio_destino_tabulador)
		{
			$this->asidmunicipio_destino_tabulador=$psidmunicipio_destino_tabulador;
		}
		public function fsetsidparroquia_destino_tabulador($psidparroquia_destino_tabulador)
		{
			$this->asidparroquia_destino_tabulador=$psidparroquia_destino_tabulador;
		}
		public function fsetsidciudad_destino_tabulador($psidciudad_destino_tabulador)
		{
			$this->asidciudad_destino_tabulador=$psidciudad_destino_tabulador;
		}
		public function fsetsidpais_origen_tabulador($psidpais_origen_tabulador)
		{
			$this->asidpais_origen_tabulador=$psidpais_origen_tabulador;
		}
		public function fsetsidestado_origen_tabulador($psidestado_origen_tabulador)
		{
			$this->asidestado_origen_tabulador=$psidestado_origen_tabulador;
		}
		public function fsetsidmunicipio_origen_tabulador($psidmunicipio_origen_tabulador)
		{
			$this->asidmunicipio_origen_tabulador=$psidmunicipio_origen_tabulador;
		}
		public function fsetsidparroquia_origen_tabulador($psidparroquia_origen_tabulador)
		{
			$this->asidparroquia_origen_tabulador=$psidparroquia_origen_tabulador;
		}
		public function fsetsidciudad_origen_tabulador($psidciudad_origen_tabulador)
		{
			$this->asidciudad_origen_tabulador=$psidciudad_origen_tabulador;
		}
		public function fgetiidtabulador()
		{
			return $this->aiidtabulador;
		}
		public function fgetskilometraje_tab()
		{
			return $this->askilometraje_tab;
		}
		public function fgetsprecio_total_tab()
		{
			return $this->asprecio_total_tab;
		}
		public function fgetsestatus_tab()
		{
			return $this->asestatus_tab;
		}
		public function fgetsidprecio()
		{
			return $this->asidprecio;
		}
		public function fgetsprecio_pre()
		{
			return $this->asprecio_pre;
		}		
		public function fgetsdesc_tipo_unid()
		{
			return $this->asdesc_tipo_unid;
		}		
		public function fgetscapacidad()
		{
			return $this->ascapacidad;
		}		
		public function fgetsmedida()
		{
			return $this->asmedida;
		}		
		public function fgetsidruta()
		{
			return $this->asidruta;
		}		
		public function fgetsvia_rut()
		{
			return $this->asvia_rut;
		}		
		public function fgetsidpais_destino_tabulador()
		{
			return $this->asidpais_destino_tabulador;
		}
		public function fgetsidestado_destino_tabulador()
		{
			return $this->asidestado_destino_tabulador;
		}
		public function fgetsidmunicipio_destino_tabulador()
		{
			return $this->asidmunicipio_destino_tabulador;
		}
		public function fgetsidparroquia_destino_tabulador()
		{
			return $this->asidparroquia_destino_tabulador;
		}
		public function fgetsidciudad_destino_tabulador()
		{
			return $this->asidciudad_destino_tabulador;
		}
		public function fgetsidpais_origen_tabulador()
		{
			return $this->asidpais_origen_tabulador;
		}
		public function fgetsidestado_origen_tabulador()
		{
			return $this->asidestado_origen_tabulador;
		}
		public function fgetsidmunicipio_origen_tabulador()
		{
			return $this->asidmunicipio_origen_tabulador;
		}
		public function fgetsidparroquia_origen_tabulador()
		{
			return $this->asidparroquia_origen_tabulador;
		}
		public function fgetsidciudad_origen_tabulador()
		{
			return $this->asidciudad_origen_tabulador;
		}
		public function fbuscar()
		{
			$lbenc=false;

			$lssql1="select * from VTabuladorOrigen where (VTabuladorOrigen.IdVTabuladorOrigen='$this->aiidtabulador')";
			
			$lssql2="select  * from VTabuladorDestino where (VTabuladorDestino.IdVTabuladorDestino='$this->aiidtabulador')";


					$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						$this->aiidtabulador=$larow1["IdVTabuladorOrigen"];
						$this->asprecio_total_tab=$larow1["precio_total_vto"];
						$this->asestatus_tab=$larow1["estatus_tab_vto"];
						$this->asidpais_origen_tabulador=$larow1["pais_origen_vto"];
						$this->asidestado_origen_tabulador=$larow1["estado_origen_vto"];
						$this->asidmunicipio_origen_tabulador=$larow1["municipio_origen_vto"];
						$this->asidparroquia_origen_tabulador=$larow1["parroquia_origen_vto"];
						$this->asidciudad_origen_tabulador=$larow1["ciudad_origen_vto"];
						$this->asdesc_tipo_unid=$larow1["tipo_uniad_vto"];
						$this->ascapacidad=$larow1["capacidad_vto"];
						$this->asmedida=$larow1["medida_vto"];
						$this->asidruta=$larow1["idruta_vto"];
						$this->askilometraje_tab=$larow1["kilometraje_vto"];
						$this->asvia_rut=$larow1["via_vto"];
						$this->asidprecio=$larow1["idprecio_vto"];
						$this->asprecio_pre=$larow1["precio_pre_vto"];
						$lbenc=true;
						$this->fconectar();
						$lrtb2=$this->ffiltro($lssql2);
						if($larow2=$this->fproximo($lrtb2))
						{
							
							$this->asidpais_destino_tabulador=$larow2["pais_destino_vtd"];
							$this->asidestado_destino_tabulador=$larow2["estado_destino_vtd"];
							$this->asidmunicipio_destino_tabulador=$larow2["municipio_destino_vtd"];
							$this->asidparroquia_destino_tabulador=$larow2["parroquia_destino_vtd"];
							$this->asidciudad_destino_tabulador=$larow2["ciudad_destino_vtd"];
							$lbenc=true;
						}
						
					}


			$this->fcierrafiltro($lrtb);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','Tabulador','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbenc;
		}
		public function fverificarexistencia()
		{
			$lbenc=false;
			$lssql="select * from tabulador where (idprecio='$this->asidprecio' and  idruta_tab='$this->asidruta')";
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
						insert into tabulador 
						(
							precio_total_tab, 
							idprecio,
							idruta_tab,
							estatus_tab
						)
							
						values
						(
							'$this->asprecio_total_tab',
							'$this->asidprecio',
							'$this->asidruta',
							'1'
						)
					";
			$lbhecho=$this->fejecutar($lssql);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','Tabulador','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						update tabulador set 
						
						precio_total_tab='$this->asprecio_total_tab'
						
						where 
						
						(idtabulador='$this->aiidtabulador')
					";
			if($lbhecho=$this->fejecutar($lssql))
			{
				$lbenc=true;
				
			}
			else 
			{
				$lbenc=false;
			}
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Modifico Registro','Tabulador','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="update tabulador set estatus_tab='0' where (idtabulador='$this->aiidtabulador')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				//~ inicia registro del evento en la Bitacora 
				$this->Bitacora('Elimino Registro','Tabulador','sistema');
				//~ fin del registro de la Bitacora
				$this->fdesconectar();
				return $lbhecho;
		}
		
		public function factivar()
		{
				$lbhecho=false;
				$lssql="update tabulador set estatus_tab='1' where (idtabulador='$this->aiidtabulador')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				//~ inicia registro del evento en la Bitacora 
				$this->Bitacora('Activo Registro','Tabulador','sistema');
				//~ fin del registro de la Bitacora
				$this->fdesconectar();
				return $lbhecho;
		}
			
		public function flistar()
		{
			$lamatriz=array();
			$lii=0;
			$lssql="select * from tabulador order by idtabulador";
			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			while($larow=$this->fproximo($lrtb))
			{
				$lamatriz[$lii][0]=$larow["idtabulador"];
				$lamatriz[$lii][1]=$larow["kilometraje_tab"];
				$lamatriz[$lii][2]=$larow["precio_total_tab"];
				$lamatriz[$lii][3]=$larow["idciudad_origen_tabulador"];
				$lamatriz[$lii][4]=$larow["idciudad_destino_tabulador"];
				$lamatriz[$lii][5]=$larow["idprecio"];
				$lii++;
			}
			$this->fcierrafiltro($lrtb);
			$this->fdesconectar();
			return $lamatriz;
		}
			
		public function fnuevo()
		{
			$lssql="select max(idtabulador) as mayor from tabulador";
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
		//~ esta funcion busca para el catalogo tabulador que se encuentra en la solicitud realizada por atc
		public function flistadotabulador($parametro1,$parametro2){
		  $this->fconectar();
		  if($parametro1!="")//por codigo
			$sql      = "SELECT tabulador.idtabulador , precio_total_tab    from tabulador  WHERE (idtabulador='$parametro1')  ";
			
			$sql1="select idtabulador, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen
			from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$parametro1' and tabulador.idciudad_origen_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$sql2="select idtabulador, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino
			from tabulador, ciudad, parroquia, municipio, estado, pais where (idtabulador='$parametro1' and tabulador.idciudad_destino_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";

			
		  if($parametro2!="")//por nombre
			$sql      = "SELECT tabulador.idtabulador ,  (SELECT CONCAT_WS(' ', desc_esta, ' ') from estado WHERE tabulador.idciudad_origen_tabulador=estado.idestado )
			AS nombre_estado_origen, (SELECT CONCAT_WS(' ', desc_esta, ' ') from estado WHERE tabulador.idciudad_destino_tabulador=estado.idestado )
			AS nombre_estado_destino , precio_total_tab    from tabulador, estado  WHERE (precio_total_tab='$parametro2' and tabulador.idciudad_origen_tabulador=estado.idestado)  ";
			
		  $cursor=$this->ffiltro($sql);
		  $cursor1=$this->ffiltro($sql1);
		  $cursor2=$this->ffiltro($sql2);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtabulador"];
				   $filas [$contador][2] = $laRow["precio_total_tab"];				   
				}
				WHILE ($laRow=$this->fproximo($cursor));
				if ($laRow1=$this->fproximo($cursor1)){
				DO
				{
				   $filas [$contador][3] = $laRow1["nombre_pais_origen"];
				   $filas [$contador][4] = $laRow1["nombre_estado_origen"];
				   $filas [$contador][5] = $laRow1["nombre_municipio_origen"];
				   $filas [$contador][6] = $laRow1["nombre_parroquia_origen"];
				   $filas [$contador][7] = $laRow1["nombre_ciudad_origen"];
				}
				WHILE ($laRow1=$this->fproximo($cursor1));
				if ($laRow2=$this->fproximo($cursor2)){
				DO
				{
				   $filas [$contador][8] = $laRow2["nombre_pais_destino"];
				   $filas [$contador][9] = $laRow2["nombre_estado_destino"];
				   $filas [$contador][10] = $laRow2["nombre_municipio_destino"];
				   $filas [$contador][11] = $laRow2["nombre_parroquia_destino"];
				   $filas [$contador][12] = $laRow2["nombre_ciudad_destino"];
				   $contador++;
				}
				WHILE ($laRow2=$this->fproximo($cursor2));
		   }
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
		public function flistadotabulador_solicitud(){
		  $this->fconectar();
			$sql="SELECT tabulador.idtabulador , tabulador.precio_total_tab from tabulador   ";
			
			$sql1="select idtabulador, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen
			from tabulador, ciudad, parroquia, municipio, estado, pais where ( tabulador.idciudad_origen_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$sql2="select idtabulador, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino
			from tabulador, ciudad, parroquia, municipio, estado, pais where (tabulador.idciudad_destino_tabulador=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
	
		  $cursor=$this->ffiltro($sql);
		  $cursor1=$this->ffiltro($sql1);
		  $cursor2=$this->ffiltro($sql2);
		  $contador = 0;
		  $encontrado=false;
		  
		 if ($laRow=$this->fproximo($cursor)){
				DO
				{
				   $filas [$contador][1] = $laRow["idtabulador"];
				}
				WHILE ($laRow=$this->fproximo($cursor));
				if ($laRow1=$this->fproximo($cursor1)){
				DO
				{
				   $filas [$contador][3] = $laRow1["nombre_pais_origen"];
				   $filas [$contador][4] = $laRow1["nombre_estado_origen"];
				   $filas [$contador][5] = $laRow1["nombre_municipio_origen"];
				   $filas [$contador][6] = $laRow1["nombre_parroquia_origen"];
				   $filas [$contador][7] = $laRow1["nombre_ciudad_origen"];
				}
				WHILE ($laRow1=$this->fproximo($cursor1));
				if ($laRow2=$this->fproximo($cursor2)){
				DO
				{
				   $filas [$contador][8] = $laRow2["nombre_pais_destino"];
				   $filas [$contador][9] = $laRow2["nombre_estado_destino"];
				   $filas [$contador][10] = $laRow2["nombre_municipio_destino"];
				   $filas [$contador][11] = $laRow2["nombre_parroquia_destino"];
				   $filas [$contador][12] = $laRow2["nombre_ciudad_destino"];
				   $contador++;
				}
				WHILE ($laRow2=$this->fproximo($cursor2));
		   }
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
    
    
    	public function CatalogoTabulador()
		{
			$this->fconectar();
			$sql      = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, CONCAT (capacidad_vto,' ', medida_vto) as capacidad_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto   FROM VTabuladorOrigen, VTabuladorDestino WHERE VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVTabuladorOrigen"];
					$filas [$contador][2] = $laRow["via_vto"];
					$filas [$contador][3] = $laRow["kilometraje_vto"];
					$filas [$contador][4] = $laRow["ciudad_origen_vto"];
					$filas [$contador][5] = $laRow["ciudad_destino_vtd"];
					$filas [$contador][6] = $laRow["tipo_uniad_vto"];
					$filas [$contador][7] = $laRow["capacidad_vto"];
					$filas [$contador][8] = $laRow["precio_total_vto"];
					
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
    	public function CatalogoTabuladorSolicitud()
		{
			$this->fconectar();
			$sql      = "SELECT IdVTabuladorOrigen, pais_origen_vto, estado_origen_vto, municipio_origen_vto, parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, capacidad_vto, medida_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto, idtipo_unidad_vto   FROM VTabuladorOrigen, VTabuladorDestino WHERE VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVTabuladorOrigen"];
					$filas [$contador][2] = $laRow["via_vto"];
					$filas [$contador][3] = $laRow["kilometraje_vto"];
					$filas [$contador][4] = $laRow["pais_origen_vto"];
					$filas [$contador][5] = $laRow["estado_origen_vto"];
					$filas [$contador][6] = $laRow["municipio_origen_vto"];
					$filas [$contador][7] = $laRow["parroquia_origen_vto"];
					$filas [$contador][8] = $laRow["ciudad_origen_vto"];
					$filas [$contador][9] = $laRow["pais_destino_vtd"];
					$filas [$contador][10] = $laRow["estado_destino_vtd"];
					$filas [$contador][11] = $laRow["municipio_destino_vtd"];
					$filas [$contador][12] = $laRow["parroquia_destino_vtd"];
					$filas [$contador][13] = $laRow["ciudad_destino_vtd"];
					$filas [$contador][14] = $laRow["tipo_uniad_vto"];
					$filas [$contador][15] = $laRow["capacidad_vto"];
					$filas [$contador][16] = $laRow["medida_vto"];
					$filas [$contador][17] = $laRow["precio_total_vto"];
					$filas [$contador][18] = $laRow["idtipo_unidad_vto"];
					
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
		
		public function BuscaTabulador($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, CONCAT (capacidad_vto,' ', medida_vto) as capacidad_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto    FROM VTabuladorOrigen, VTabuladorDestino WHERE (IdVTabuladorOrigen='$parametro1' and VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino)  ";
			
			if($parametro2!="")//por nombre
			$sql      = "SELECT IdVTabuladorOrigen, ciudad_origen_vto, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, CONCAT (capacidad_vto,' ', medida_vto) as capacidad_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto     FROM VTabuladorOrigen, VTabuladorDestino WHERE (ciudad_destino_vtd='$parametro2' and VTabuladorDestino.IdVTabuladorDestino=VTabuladorOrigen.IdVTabuladorOrigen)  ";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVTabuladorOrigen"];
					$filas [$contador][2] = $laRow["via_vto"];
					$filas [$contador][3] = $laRow["kilometraje_vto"];
					$filas [$contador][4] = $laRow["ciudad_origen_vto"];
					$filas [$contador][5] = $laRow["ciudad_destino_vtd"];
					$filas [$contador][6] = $laRow["tipo_uniad_vto"];
					$filas [$contador][7] = $laRow["capacidad_vto"];
					$filas [$contador][8] = $laRow["precio_total_vto"];
					
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
		public function BuscaTabuladorSolicitud($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT IdVTabuladorOrigen, pais_origen_vto, estado_origen_vto, municipio_origen_vto, parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, CONCAT (capacidad_vto,' ', medida_vto) as capacidad_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto   FROM VTabuladorOrigen, VTabuladorDestino WHERE (IdVTabuladorOrigen='$parametro1' and VTabuladorOrigen.IdVTabuladorOrigen=VTabuladorDestino.IdVTabuladorDestino)  ";
			
			if($parametro2!="")//por nombre
			$sql      = "SELECT IdVTabuladorOrigen, pais_origen_vto, estado_origen_vto, municipio_origen_vto, parroquia_origen_vto, ciudad_origen_vto, pais_destino_vtd, estado_destino_vtd, municipio_destino_vtd, parroquia_destino_vtd, ciudad_destino_vtd, via_vto, kilometraje_vto, tipo_uniad_vto, CONCAT (capacidad_vto,' ', medida_vto) as capacidad_vto, CONCAT (precio_total_vto,' ','Bsf') as precio_total_vto     FROM VTabuladorOrigen, VTabuladorDestino WHERE (ciudad_destino_vtd='$parametro2' and VTabuladorDestino.IdVTabuladorDestino=VTabuladorOrigen.IdVTabuladorOrigen)  ";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVTabuladorOrigen"];
					$filas [$contador][2] = $laRow["via_vto"];
					$filas [$contador][3] = $laRow["kilometraje_vto"];
					$filas [$contador][4] = $laRow["pais_origen_vto"];
					$filas [$contador][5] = $laRow["estado_origen_vto"];
					$filas [$contador][6] = $laRow["municipio_origen_vto"];
					$filas [$contador][7] = $laRow["parroquia_origen_vto"];
					$filas [$contador][8] = $laRow["ciudad_origen_vto"];
					$filas [$contador][9] = $laRow["pais_destino_vtd"];
					$filas [$contador][10] = $laRow["estado_destino_vtd"];
					$filas [$contador][11] = $laRow["municipio_destino_vtd"];
					$filas [$contador][12] = $laRow["parroquia_destino_vtd"];
					$filas [$contador][13] = $laRow["ciudad_destino_vtd"];
					$filas [$contador][14] = $laRow["tipo_uniad_vto"];
					$filas [$contador][15] = $laRow["capacidad_vto"];
					$filas [$contador][16] = $laRow["precio_total_vto"];
					
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
		
		public function ActivarUsuario($id,$ci)
		{
			$this->fconectar();
			$frase = '$carballo$/';
			$lsclave=sha1($ci);
			$lsclave=md5($lsclave.$frase);
			$sql ="update usuarios set primeravez = '1', status='1', intentosFallidos='0', clave='$lsclave' where idusuario='$id'";
			if($this->fejecutar($sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
    } 
?>
