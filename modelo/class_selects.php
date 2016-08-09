<?php
	require_once("../modelo/class_db.php");
	class selects extends class_db{
		
		public function selects_cargos(){
			$this->fconectar();
			$sql = "select * from cargos where estatus='1'";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value="'.$select["idCargo"].'">'.strtoupper($select["nombre"]).'</option>';	
			}
		}
		public function selects_jerarquia(){
			$this->fconectar();
			$sql = "select * from jerarquia where estatus='1'";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value="'.$select["idJerarquia"].'">'.strtoupper($select["nombre"]).'</option>';	
			}
		}
		public function selects_profesion(){
			$this->fconectar();
			$sql = "select * from profesion where estatus='1'";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value="'.$select["idProfesion"].'">'.strtoupper($select["nombre"]).'</option>';	
			}
		}
		public function responsables_planificacion(){
			$this->fconectar();
			$sql = "select p.idPersonal,p.nombre as nombrep,p.apellido,c.idCargo from personal as p INNER JOIN cargos as c ON  c.nombre = 'facilitador' WHERE p.idCargo = c.idCargo";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value='.$select["idPersonal"].'>'.$select["nombrep"].' '.$select["apellido"].'</option>';
			}
		}
		public function showActividad(){
			$this->fconectar();
			$sql ="select * from actividad where estatus='1'";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value='.$select["idActividad"].'>'.strtoupper($select["nombre"]).'</option>';
			}
		}
		public function SelectPersonalPorTipo($tipo){
			$this->fconectar();
			$sql = "select * from usuarios as usu INNER JOIN personal as pr ON pr.idPersonal = usu.cedula WHERE  usu.tipo ='$tipo' AND pr.status = '1'";
			$consulta = $this->ffiltro($sql);
			$cantidad = $this->fnum_registros($consulta);
			if($cantidad > 0){
			while($show = $this->fproximo($consulta)){
				echo '<option value="'.$show["cedula"].'">'.strtoupper($show["nombre"]." ".$show["apellido"]).'</option>';
			}
			}else if($cantidad == 0){
				echo '<option value="0">NO HAY FACILITADORES ACTIVOS</option>';
			}
		}
		public function showDenominacion(){
			$this->fconectar();
			$sql ="select * from denominacion where estatus = '1'";
			$consulta = $this->ffiltro($sql);
			while($select = $this->fproximo($consulta)){
				echo '<option value='.$select["idDenominacion"].'>'.strtoupper($select["nombre"]).'</option>';
			}
		}
		public function showSolicitudesCap(){
			$this->fconectar();
			$sql ="select * from solicitudes WHERE status = 'a' and tipoSolicitud = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta)){
			$idsol = $rs["idSolicitud"];
	
			if($rs["dirigidoa"] == 'null'){
			$sql2 = "select ac.idActividad,ac.nombre as actividad,dn.idDenominacion,dn.nombre as denominacion,us.cedula,us.nombre as nombreusu,us.apellido as apellidousu,sl.idSolicitud,sl.idActividad,sl.idDenominacion,sl.idUsuario from solicitudes as sl INNER JOIN actividad as ac ON ac.idActividad = sl.idActividad INNER JOIN denominacion as dn ON dn.idDenominacion = sl.idDenominacion INNER JOIN usuarios as us ON us.cedula = sl.idUsuario WHERE sl.idSolicitud = '$idsol'";
			$consulta2 = $this->ffiltro($sql2);
			while($rs2 = $this->fproximo($consulta2)){
				echo '<option value="'.$rs2["idSolicitud"].'">'.strtoupper($rs2["nombreusu"].' '.$rs2["apellidousu"].' - '.$rs2["actividad"].' DE '.$rs2["denominacion"]).'</option>';
			}
			}else if($rs["dirigidoa"] != 'null'){

			$sql2 = "select ac.idActividad,ac.nombre as actividad,dn.idDenominacion,dn.nombre as denominacion,us.cedula,og.idOrganizacion,og.nombre as nombreorg,sl.idSolicitud,sl.idActividad,sl.idDenominacion,sl.idUsuario,sl.dirigidoa from solicitudes as sl INNER JOIN actividad as ac ON ac.idActividad = sl.idActividad INNER JOIN denominacion as dn ON dn.idDenominacion = sl.idDenominacion INNER JOIN organizacion as og ON og.idOrganizacion = sl.dirigidoa WHERE sl.idSolicitud = '$idsol'";
			$consulta2 = $this->ffiltro($sql2);
			while($rs2 = $this->fproximo($consulta2)){
				echo '<option value="'.$rs2["idSolicitud"].'">'.$rs2["nombreorg"].'</option>';
			}

			}

			}
		}

		public function selectPersonal(){
			$this->fconectar();
			$sql ="select * from usuarios where status = '1' and idPerfil  NOT IN ('11')";
			$query = $this->ffiltro($sql);
			$i=0;
			while($pr = $this->fproximo($query)){
			$i++;
				echo '<option value='.$pr["cedula"].'>'. $i .' - '.strtoupper($pr["nombre"]." ".$pr["apellido"]).'</option>';
			}
		}

		public function selectPerfil($seleccionado){
			$this->fconectar();
			$sql = "select * from Perfil where EstatusPer = '1'";
			$query = $this->ffiltro($sql);
			while($per = $this->fproximo($query)){
				$sel = ($per["IdPerfil"]==$seleccionado)?"selected":"";
				echo '<option value='.$per["IdPerfil"].' '.$sel.'>'.strtoupper($per["NombrePer"]).'</option>';
			}
		}
		
		public function select_menu(){
			$this->fconectar();
			$sql = "select * from Menu where EstatusMen = '1'";
			$query = $this->ffiltro($sql);
			while($per = $this->fproximo($query)){
				echo '<option value='.$per["IdMenu"].'>'.strtoupper($per["NombreMen"]).' '.'-'.' '.strtoupper($per["DescripcionMen"]).'</option>';
			}
		}
		
		public function SelectSubmenu(){
			$this->fconectar();
			$sql = "select * from Submenu where EstatusSub = '1'";
			$query = $this->ffiltro($sql);
			while($per = $this->fproximo($query)){
				echo '<option value='.$per["IdSubmenu"].'>'.strtoupper($per["NombreSub"]).' '.'-'.' '.strtoupper($per["DescripcionSub"]).'</option>';
			}
		}
		public function SelectMenu($seleccionado){
			$this->fconectar();
			$sql = "select * from Menu where EstatusMen = '1'";
			$query = $this->ffiltro($sql);
			while($per = $this->fproximo($query)){
				$sel = ($per["IdMenu"]==$seleccionado)?"selected":"";
				echo '<option value='.$per["IdMenu"].' '.$sel.'>'.strtoupper($per["NombreMen"]).' '.'-'.' '.strtoupper($per["DescripcionMen"]).'</option>';
			}
		}

		public function selectMotivoRazon($visible){
			$this->fconectar();
			$sql = "select * from tmotivorazon where estatus = '1' and visible = '$visible'";
			$query = $this->ffiltro($sql);
			$i=0;
			while($per = $this->fproximo($query)){
				$i++;
				echo '<option value='.$per["idMotivorazon"].'>'.$i.' - '.strtoupper($per["motivorazon"]).'</option>';
			}
		}
		/*crea select, lista usuario externo que esten activo*/
		public function selectUsuariosExternos(){
			$this->fconectar();
			$sql ="select * from usuarios where status = '1' and idPerfil ='11'";
			$query = $this->ffiltro($sql);
			$i=0;
			while($us = $this->fproximo($query)){
            $i++;
				echo '<option value='.$us["idusuario"].'>'.$i.' - '.strtoupper($us["nombre"]." ".$us["apellido"]).'</option>';
			}
		}
		public function selectUsuariosInternos(){
			$this->fconectar();
			$sql ="select * from usuarios where status = '1' and idPerfil  NOT IN ('11')";
			$query = $this->ffiltro($sql);
			$i=0;
			while($us = $this->fproximo($query)){
            $i++;
				echo '<option value='.$us["idusuario"].'>'.$i.' - '.strtoupper($us["nombre"]." ".$us["apellido"]).'</option>';
			}
		}
		/******************************************************/
		public function Selectmunicipios(){
			$this->fconectar();
			$sql = "select * from tmunicipio where estatus = '1'";
			$consulta = $this->ffiltro($sql);
			$i=0;
			while($mu = $this->fproximo($consulta)){
			$i++;
				echo '<option value='.$mu["idMunicipio"].'>'.$i.' - '.strtoupper($mu["municipio"]).'</option>';

			}
		}

		public function selectOrganizacionUsuario($id){
			$this->fconectar();
			$sql = "select * from organizacionusuario as ou INNER JOIN organizacion as o ON  o.idOrganizacion = ou.idOrganizacion WHERE ou.idUsuario = '$id'";
			$consulta = $this->ffiltro($sql);
			$i++;
			while($org = $this->fproximo($consulta)){
				echo '<option value='.$org["idOrganizacion"].'>'.$org["nacionalidad"].'-'.$org["idOrganizacion"].': '.strtoupper($org["nombre"]).'</option>'; 
			}
		}

		public function selectTipoSolitud(){
			$this->fconectar();
			$sql  = "select * from ttiposolicitud where solicitud = 'INSPECCIÓN' UNION select * from ttiposolicitud where solicitud = 'CAPACITACIÓN'";
			$consulta = $this->ffiltro($sql);
			$i++;
			while($sol = $this->fproximo($consulta)){
				echo '<option value='.$sol["idTipoSolicitud"].'>'.strtoupper($sol["solicitud"]).'</option>'; 
			}
		}

		public function selectTipoSiniestro(){
			$this->fconectar();
			$sql = "select * from ttipossiniestros where estatus = '1'";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta)){
				echo '<option value='.$rs["idTipoSiniestro"].'>'.strtoupper($rs["siniestro"]).'</option>';
			}
		}

		public function selectOrganizcion(){
			$this->fconectar();
			$sql ="select * from organizacion";
			$consulta = $this->ffiltro($sql);
			while($rs = $this->fproximo($consulta)){
				echo '<option value="'.$rs["idOrganizacion"].'">'.strtoupper($rs["nacionalidad"].'-'.$rs["idOrganizacion"].' : '.$rs["nombre"]).'</option>';
			}
		}
	}
?>
