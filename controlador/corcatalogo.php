<?php
	if(array_key_exists(@catalogo, $_POST))
	{
		$catalogo=$_POST["catalogo"];
		$cod = $_POST["cod"];
		@$nom = $_POST["nom"];
		@$modelo = $_POST["modelo"];
		@$repre = $_POST["repre"];
		@$tippro = $_POST["tippro"];
		@$unimed = $_POST["unimed"];	
		@$pretol = $_POST["pretol"];
		@$pesso = $_POST["pesso"];
		@$nomed = $_POST["nomed"];
		@$disa = $_POST["disa"];
		@$dien = $_POST["dien"];
		@$fesa = $_POST["fesa"];
		@$feen = $_POST["feen"];
		@$cedu = $_POST["cedu"];
		@$nombre = $_POST["nombre"];
		@$apel = $_POST["apel"];
		@$uni = $_POST["uni"];
		@$plac = $_POST["plac"];
		@$remo = $_POST["remo"];
		@$plar = $_POST["plar"];
	}    
	if($catalogo=="1")
		header("Location:../vista/catalogoEquipo.php?id1=".$cod."& id2=".$nom); 	
	if($catalogo=="2")
		header("Location:../vista/catalogoPersona.php?id1=".$cod."& id2=".$nom."& id3=".$ape);
	if($catalogo=="3")
		header("Location:../vista/catalogoMama.php?id1=".$cod."& id2=".$nom."& id3=".$ape);
	if($catalogo=="0")
		header("Location:../vista/catalogoEquipo2.php?id1=".$cod."& id2=".$nom); 
	if($catalogo=="5")
		header("Location:../vista/busqueda/CatalogadoPrecio.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro);
	if($catalogo=="6")
		header("Location:../vista/busqueda/catalogoempresa.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$repre); 
	if($catalogo=="8")
		header("Location:../vista/busqueda/catalogotabulador.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="9")
		header("Location:../vista/busqueda/catalogounidad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$repre);
	if($catalogo=="10")
		header("Location:../vista/busqueda/catalogoremolque.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$repre);
	if($catalogo=="11")
		header("Location:../vista/busqueda/catalogopersonal.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$repre);
	if($catalogo=="12")
		header("Location:../vista/busqueda/catalogosolicitud.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="13")
		header("Location:../vista/busqueda/catalogoreluni.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="14")
		header("Location:../vista/busqueda/catalogopais.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="15")
		header("Location:../vista/busqueda/catalogoregion.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="16")
		header("Location:../vista/busqueda/catalogoestado.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="17")
		header("Location:../vista/busqueda/catalogomarca_unidad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen); 
	if($catalogo=="18")
		header("Location:../vista/busqueda/catalogodepartamento.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="19")
		header("Location:../vista/catalogomunicipio.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="20")
		header("Location:../vista/busqueda/catalogoestatus.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="21")
		header("Location:../vista/busqueda/catalogotipo_producto.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="22")
		header("Location:../vista/busqueda/catalogounidad_medida.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="23")
		header("Location:../vista/busqueda/catalogomodelo_unidad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="24")
		header("Location:../vista/busqueda/catalogotipo_cliente.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="25")
		header("Location:../vista/busqueda/catalogotipo_contri.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="26")
		header("Location:../vista/busqueda/catalogotipo_proveedor.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="27")
		header("Location:../vista/busqueda/catalogobanco.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="28")
		header("Location:../vista/busqueda/catalogomunicipio.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="29")
		header("Location:../vista/busqueda/catalogocapacidad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="30")
		header("Location:../vista/busqueda/catalogotipo_unidad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="31")
		header("Location:../vista/busqueda/catalogoproducto.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="32")
		header("Location:../vista/busqueda/catalogoparroquia.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="33")
		header("Location:../vista/busqueda/catalogociudad.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen);
	if($catalogo=="34")
		header("Location:../vista/busqueda/catalogopersona.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$repre);
	if($catalogo=="35")
		header("Location:../vista/busqueda/catalogoordcar.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar);
	if($catalogo=="36")
		header("Location:../vista/busqueda/catalogoroles.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar);
	if($catalogo=="37")
		header("Location:../vista/busqueda/catalogotipo_cuenta.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar);
	if($catalogo=="38")
		header("Location:../vista/catalogoorden_carga.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="39")
		header("Location:../vista/busqueda/catalogoforma_pago.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="40")
		header("Location:../vista/busqueda/catalogotipo_servicio.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="41")
		header("Location:../vista/busqueda/catalogoservicio.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="42")
		header("Location:../vista/busqueda/catalogocondicion_pago.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="43")
		header("Location:../vista/busqueda/catalogopresentacion.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="44")
		header("Location:../vista/busqueda/catalogotconfiguracion.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="45")
		header("Location:../vista/busqueda/catalogotipo_articulo.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="46")
		header("Location:../vista/busqueda/catalogoarticulo.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="47")
		header("Location:../vista/busqueda/catalogobitacoras.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="48")
		header("Location:../vista/busqueda/catalogocuenta.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="49")
		header("Location:../vista/busqueda/catalogotipo_entrada.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="50")
		header("Location:../vista/busqueda/catalogoproveedor.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="51")
		header("Location:../vista/busqueda/catalogoprecio_viatico.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$uni."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="52")
		header("Location:../vista/busqueda/catalogoproductosoli_cliente.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="53")
		header("Location:../vista/busqueda/catalogocliente.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="54")
		header("Location:../vista/busqueda/catalogoconductor.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="55")
		header("Location:../vista/busqueda/catalogopersonaatc.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="56")
		header("Location:../vista/busqueda/catalogoproductosoli.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="57")
		header("Location:../vista/busqueda/catalogo_cliente_externo.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="58")
		header("Location:../vista/busqueda/catalogo_cliente.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
	if($catalogo=="60")
		header("Location:../vista/busqueda/catalogotabulador_procesar.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="61")
		header("Location:../vista/busqueda/CatalogadoRuta.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="62")
		header("Location:../vista/busqueda/CatalogadoTabuladorProcesar.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="63")
		header("Location:../vista/busqueda/CatalogadoUnidadReluni.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="64")
		header("Location:../vista/busqueda/CatalogadoRemolqueReluni.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="65")
		header("Location:../vista/busqueda/CatalogadoConductorReluni.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="66")
		header("Location:../vista/busqueda/CatalogadoReluniOrdcar.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="67")
		header("Location:../vista/busqueda/CatalogadoTabuladorSolicitud.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$pretol);
	if($catalogo=="68")
		header("Location:../vista/busqueda/catalogopreciokilo.php?id1=".$cod."& id2=".$nom."& id3=".$modelo."& id4=".$tippro."& id5=".$unimed."& id6=".$pesso."& id7=".$nomed."& id8=".$disa."& id9=".$dien."& id10=".$fesa."& id11=".$feen."& id12=".$cedu."& id13=".$nombre."& id14=".$apel."& id15=".$unid."& id16=".$plac."& id17=".$remo."& id18=".$plar); 
?>
