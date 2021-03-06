<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"cmbidpais_destino_tabulador"=>"pais",
"cmbidestado_destino_tabulador"=>"estado",
"cmbidmunicipio_destino_tabulador"=>"municipio",
"cmbidparroquia_destino_tabulador"=>"parroquia",
"cmbidciudad_destino_tabulador"=>"ciudad"
);

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if($listadoSelects[$selectDestino]=='pais')
{
$relacion='idpais';
$titulo='Pais Destino';
}
else if ($listadoSelects[$selectDestino]=='estado')
{
$relacion='idpais';
$titulo='Estado Destino';
}
else if ($listadoSelects[$selectDestino]=='municipio')
{
$relacion='idestado';
$titulo='Municipio Destino';
}
else if ($listadoSelects[$selectDestino]=='parroquia')
{
$relacion='idmunicipio';
$titulo='Parroquia Destino';
}
else if ($listadoSelects[$selectDestino]=='ciudad')
{
$relacion='idparroquia';
$titulo='Ciudad Destino';
}


function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}



if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects[$selectDestino];
	include 'conexion_select.php';
	conectar();
	mysql_query("SET NAMES utf8");
	$consulta=mysql_query("SELECT * FROM $tabla WHERE $relacion='$opcionSeleccionada'") or die(mysql_error());
	desconectar();
	
	// Comienzo a imprimir el select
	echo "<label >".$titulo.":</label>";
	echo "<select class='form-control' name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido_destino(this.id)'>";
	echo "<option value=''>Seleccione</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>
