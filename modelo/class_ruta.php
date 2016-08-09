<?php

    require_once("class_db.php");
	class class_ruta extends class_db
	{
		private $aiidtabulador;
		private $askilometraje_tab;
		private $asprecio_total_tab;
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
			$lssql="select *  from ruta  where (idruta='$this->aiidtabulador')";

			$lssql1="select idruta, desc_ciud as nombre_ciudad_origen, desc_parr as nombre_parroquia_origen, desc_muni as nombre_municipio_origen, desc_esta as nombre_estado_origen, desc_pais as nombre_pais_origen

			 from ruta, ciudad, parroquia, municipio, estado, pais where (idruta='$this->aiidtabulador' and ruta.idciudad_origen_rut=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";
			
			$lssql2="select idruta, desc_ciud as nombre_ciudad_destino, desc_parr as nombre_parroquia_destino, desc_muni as nombre_municipio_destino, desc_esta as nombre_estado_destino, desc_pais as nombre_pais_destino

			 from ruta, ciudad, parroquia, municipio, estado, pais where (idruta='$this->aiidtabulador' and ruta.idciudad_destino_rut=ciudad.idciudad and ciudad.idparroquia=parroquia.idparroquia and parroquia.idmunicipio=municipio.idmunicipio and municipio.idestado=estado.idestado and estado.idpais=pais.idpais)";


			$this->fconectar();
			$lrtb=$this->ffiltro($lssql);
			if($larow=$this->fproximo($lrtb))
			{
				
				$this->aiidtabulador=$larow["idruta"];
				$this->askilometraje_tab=$larow["kilometraje_rut"];
				$this->asprecio_total_tab=$larow["via_rut"];
				$lbenc=true;
				
					$this->fconectar();
					$lrtb1=$this->ffiltro($lssql1);
					if($larow1=$this->fproximo($lrtb1))
					{
						
						$this->asidpais_origen_tabulador=$larow1["nombre_pais_origen"];	
						$this->asidestado_origen_tabulador=$larow1["nombre_estado_origen"];	
						$this->asidmunicipio_origen_tabulador=$larow1["nombre_municipio_origen"];	
						$this->asidparroquia_origen_tabulador=$larow1["nombre_parroquia_origen"];	
						$this->asidciudad_origen_tabulador=$larow1["nombre_ciudad_origen"];			
						$lbenc=true;
						
					}
					$this->fconectar();
					$lrtb2=$this->ffiltro($lssql2);
					if($larow2=$this->fproximo($lrtb2))
					{
						
						$this->asidpais_destino_tabulador=$larow2["nombre_pais_destino"];	
						$this->asidestado_destino_tabulador=$larow2["nombre_estado_destino"];	
						$this->asidmunicipio_destino_tabulador=$larow2["nombre_municipio_destino"];	
						$this->asidparroquia_destino_tabulador=$larow2["nombre_parroquia_destino"];	
						$this->asidciudad_destino_tabulador=$larow2["nombre_ciudad_destino"];			
						$lbenc=true;
					}
				
			}
			$this->fcierrafiltro($lrtb);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Busco Registro','Ruta','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbenc;
		}
			
		public function fincluir()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						insert into ruta 
						(
							idruta,
							kilometraje_rut, 
							via_rut, 
							idciudad_origen_rut, 
							idciudad_destino_rut
						)
							
						values
						(
							'$this->aiidtabulador',
							'$this->askilometraje_tab',
							'$this->asprecio_total_tab',
							'$this->asidciudad_origen_tabulador',
							'$this->asidciudad_destino_tabulador'
						)
					";
			$lbhecho=$this->fejecutar($lssql);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Incluyo Registro','Ruta','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function fmodificar()
		{
			$lbhecho=false;
			$this->fconectar();
			$lssql="
						update ruta set 
						
						kilometraje_rut='$this->askilometraje_tab', 
						via_rut='$this->asprecio_total_tab'
						where 
						(idruta='$this->aiidtabulador')
					";
			$lbhecho=$this->fejecutar($lssql);
			//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('MOdifico Registro','Ruta','sistema');
			//~ fin del registro de la Bitacora
			$this->fdesconectar();
			return $lbhecho;
		}
			
		public function feliminar()
		{
				$lbhecho=false;
				$lssql="delete from tabulador where (idtabulador='$this->aiidtabulador')";
				$this->fconectar();
				$lbhecho=$this->fejecutar($lssql);
				//~ inicia registro del evento en la Bitacora 
			$this->Bitacora('Elimino Registro','Ruta','sistema');
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
			$lssql="select max(idruta) as mayor from ruta";
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
		public function FBuscaRuta($parametro1,$parametro2)
		{
			$this->fconectar();
			if($parametro1!="")//por codigo
			$sql      = "SELECT * FROM VRutaOrigen, VRutaDestino WHERE (IdVRutaOrigen='$parametro1' and  VRutaOrigen.IdVRutaOrigen=VRutaDestino.IdVRutaDestino  )";
			
			if($parametro2!="")//por nombre
			$sql      = "SELECT * FROM VRutaOrigen, VRutaDestino WHERE (via_vro='$parametro2' and  VRutaOrigen.IdVRutaOrigen=VRutaDestino.IdVRutaDestino  )";
		 
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVRutaOrigen"];
					$filas [$contador][2] = $laRow["via_vro"];
					$filas [$contador][3] = $laRow["kilometraje_vro"];
					$filas [$contador][4] = $laRow["pais_origen_vro"];
					$filas [$contador][5] = $laRow["estado_origen_vro"];
					$filas [$contador][6] = $laRow["municipio_origen_vro"];
					$filas [$contador][7] = $laRow["parroquia_origen_vro"];
					$filas [$contador][8] = $laRow["ciudad_origen_vro"];
					$filas [$contador][9] = $laRow["pais_destino_vrd"];
					$filas [$contador][10] = $laRow["estado_destino_vrd"];
					$filas [$contador][11] = $laRow["municipio_destino_vrd"];
					$filas [$contador][12] = $laRow["parroquia_destino_vrd"];
					$filas [$contador][13] = $laRow["ciudad_destino_vrd"];
					
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
    
		public function ListadoRuta()
		{
			$this->fconectar();
			$sql      = "SELECT * FROM VRutaOrigen, VRutaDestino WHERE VRutaOrigen.IdVRutaOrigen=VRutaDestino.IdVRutaDestino  ";
			$cursor=$this->ffiltro($sql);
			$contador = 0;
			$encontrado=false;
		  
			if ($laRow=$this->fproximo($cursor))
			{
				DO
				{
					$filas [$contador][1] = $laRow["IdVRutaOrigen"];
					$filas [$contador][2] = $laRow["via_vro"];
					$filas [$contador][3] = $laRow["kilometraje_vro"];
					$filas [$contador][4] = $laRow["pais_origen_vro"];
					$filas [$contador][5] = $laRow["estado_origen_vro"];
					$filas [$contador][6] = $laRow["municipio_origen_vro"];
					$filas [$contador][7] = $laRow["parroquia_origen_vro"];
					$filas [$contador][8] = $laRow["ciudad_origen_vro"];
					$filas [$contador][9] = $laRow["pais_destino_vrd"];
					$filas [$contador][10] = $laRow["estado_destino_vrd"];
					$filas [$contador][11] = $laRow["municipio_destino_vrd"];
					$filas [$contador][12] = $laRow["parroquia_destino_vrd"];
					$filas [$contador][13] = $laRow["ciudad_destino_vrd"];
					
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
