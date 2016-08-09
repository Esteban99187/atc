<?php @session_start();

if(isset($_SESSION["operativa-vista"]) ){

	/******* variables de estructura organizativa ****/ 
		if(isset($_SESSION['cod']) && $_SESSION["operativa-vista"] != "cargo"){
			unset($_SESSION['cod']);
			unset($_SESSION['car']);
			unset($_SESSION["opActDesCargo"]);
		}
		if(isset($_SESSION['idced']) && $_SESSION["operativa-vista"] != "personal"){
			unset($_SESSION["idced"]);
			unset($_SESSION["ced_per"]);
			unset($_SESSION["nom_per"]);
			unset($_SESSION["ape_per"]);
			unset($_SESSION["nom_car"]);
			unset($_SESSION["nom_dep"]);
			unset($_SESSION["telf_per"]);
			unset($_SESSION["email_per"]);
			unset($_SESSION["cod_cargo_p"]);
			unset($_SESSION["cod_dep_p"]);
			unset($_SESSION["opActDesPersonal"]);
		}
		if(isset($_SESSION['cod_dep']) && $_SESSION["operativa-vista"] != "departamento"){
			unset($_SESSION['cod_dep']);
			unset($_SESSION['nom_dep']);
			unset($_SESSION['cod_sed']);
			unset($_SESSION["opActDesDepart"]);
		}
		if(isset($_SESSION['id_sede']) && $_SESSION["operativa-vista"] != "sede"){
			unset($_SESSION['id_sede']);
			unset($_SESSION['cod_sed']);
			unset($_SESSION['nom_sed']);
			unset($_SESSION['id_parroquia']);
			unset($_SESSION['comb_org']);
			unset($_SESSION['sta_sed']);
			unset($_SESSION["opActDesSede"]);
		}
		if(isset($_SESSION['id_org']) && $_SESSION["operativa-vista"] != "organismo"){
			unset($_SESSION['id_org']);
			unset($_SESSION['nom_org']);
			unset($_SESSION['cod_org']);
			unset($_SESSION['nom_ud']);
			unset($_SESSION['cod_ud']);
			unset($_SESSION['sta_sed']);
			unset($_SESSION["opActDesOrganismo"]);
		}
		
	/******* variables de Estructura Geográfica ****/ 
		if(isset($_SESSION['cod_est']) && $_SESSION["operativa-vista"] != "estado"){
			unset($_SESSION["cod_est"]);
			unset($_SESSION["nom_est"]);
			unset($_SESSION["opActDesEstado"]);
		}
		if(isset($_SESSION['cod_mun']) && $_SESSION["operativa-vista"] != "municipio"){
			unset($_SESSION['cod_mun']);
			unset($_SESSION['nom_mun']);
			unset($_SESSION['cod_est_m']);
			unset($_SESSION['des_est_m']);
			unset($_SESSION['opActDesMunicipio']);
		}
		if(isset($_SESSION['id_parroq']) && $_SESSION["operativa-vista"] != "parroquia"){
			unset($_SESSION['id_parroq']);
			unset($_SESSION['nom_parroq']);
			unset($_SESSION['id_mun']);
			unset($_SESSION['opActDesParroquia']);
		}

	/******* variables de Bienes Nacionales ****/ 
		if(isset($_SESSION['nom_periodo']) && $_SESSION['operativa-vista'] != "periodoCrear"){
			unset($_SESSION['id_periodo']);
			unset($_SESSION['nom_periodo']);
			unset($_SESSION['fecha_inicio']);
			unset($_SESSION['fecha_fin']);
			unset($_SESSION["opActDesPeriodo"]);
		}
		if(isset($_SESSION['nom_periodo_abrir']) && $_SESSION['operativa-vista'] != "periodAbrir"){
			unset($_SESSION['id_periodo']);
			unset($_SESSION['nom_periodo']);
			unset($_SESSION['fecha_inicio']);
			unset($_SESSION['fecha_fin']);
			unset($_SESSION["opActDesPeriodo"]);
			unset($_SESSION['id_periodo_abrir']);
			unset($_SESSION['nom_periodo_abrir']);
			unset($_SESSION['fecha_inicio_abrir']);
			unset($_SESSION['fecha_fin_abrir']);
			unset($_SESSION["opActDesPeriodo"]);
		}
		if(isset($_SESSION['nom_periodo_cerrar']) && $_SESSION['operativa-vista'] != "periodCerrar"){
			unset($_SESSION['id_periodo_cerrar']);
			unset($_SESSION['nom_periodo_cerrar']);
			unset($_SESSION['fecha_inicio_cerrar']);
			unset($_SESSION['fecha_fin_cerrar']);
			unset($_SESSION["opActDesPeriodo"]);
		}
		if(isset($_SESSION['cod_cat']) && $_SESSION['operativa-vista'] != "categoria"){
			unset($_SESSION['cod_cat']);
			unset($_SESSION['nom_cat']);
			unset($_SESSION["opActDesCategoria"]);
		}
		if(isset($_SESSION['ntbien']) && $_SESSION['operativa-vista'] != "tipo_bien"){
			unset($_SESSION["ntbien"]);
			unset($_SESSION['cod_tbien']);
			unset($_SESSION["nom_tbien"]);
			unset($_SESSION['cod_cat_tb']);
			unset($_SESSION["opActDeesTipoBien"]);
		}
		if(isset($_SESSION['cod_prov']) && $_SESSION['operativa-vista'] != "proveedor"){
			unset($_SESSION['cod_prov']);
			unset($_SESSION['des_prov']);
			unset($_SESSION["opActDesProveedor"]);
		}
		if(isset($_SESSION['id_motivo']) && $_SESSION['operativa-vista'] != "motivo"){
			unset($_SESSION['id_motivo']);
			unset($_SESSION['des_motivo']);
			unset($_SESSION['tipo_motivo']);
			unset($_SESSION["opActDesMotivo"]);
		}
		if(isset($_SESSION['cod_marca']) && $_SESSION['operativa-vista'] != "marca"){
			unset($_SESSION['cod_marca']);
			unset($_SESSION['nom_marca']);
			unset($_SESSION["opActDesMarca"]);
		}
		if(isset($_SESSION['cod_cond']) && $_SESSION['operativa-vista'] != "condicion"){
			unset($_SESSION['cod_cond']);
			unset($_SESSION['nom_cond']);
			unset($_SESSION["opActDesCondicion"]);
		}
}
?>