<?php
if (isset($_SESSION['nivel'])){
	if ($_SESSION['nivel'] == 1){ // posee el nivel de administrador
?>
<table id="formulario" class="form">
	<caption>Acerca de ...</caption>
		<tr>
			<td style="width:19%;" >
				<span>Nombre Del Software:</span>
			</td>
			<td>
				<p>Sistema para la Gestion de Bienes Nacionales del Cuerpo de Investigacion Cientificas Penales y Criminalisticas Sub Delegación Acarigua.</p>
			</td>
		</tr>
		<tr>
			<td>
				<span>Versión del Software:</span>
			</td>
			<td>0.1</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<span>Desarrolladores:</span>
			</td>
		</tr>
</table>
<table id="formDesarr">
	<tr>
		<td align="center">
			<img src="../../public/img/desarrolladores/olmos.jpg" onclick="Listar1()" title="Clic para ver Información"><br>
			Roberto Olmos
		</td>
		<td align="center">
			<img src="../../public/img/desarrolladores/webmaster.jpg" onclick="Listar2()" title="Clic para ver Información"><br>
			Daniel Gudiño
		</td>
		<td align="center">
			<img src="../../public/img/desarrolladores/nestor.jpg" onclick="Listar3()" title="Clic para ver Información"><br>
			Nestor Infante
		</td>
		<td align="center">
			<img src="../../public/img/desarrolladores/oscar.jpg" onclick="Listar4()" title="Clic para ver Información"><br>
			Oscar Mendez
		</td>
		<td align="center">
			<img src="../../public/img/desarrolladores/jesus.jpg" onclick="Listar5()" title="Clic para ver Información"><br>
			Jesus Pirela
		</td>
	</tr>
</table>

<!-- 
<td id="td-top">
			<span>DANIEL JOSE GUDIÑO LOPEZ</span><br>
			<span>Rol:</span> &nbsp;Desarrollador y Analista, Front-end, Back-end, WebMaster.<br>
			<span>Telef:</span> &nbsp;(0416) 799-09-36 <br>
			<span>Correo Electrónico:</span> &nbsp;Daniel.Jabba@hotmail.com
		</td>


-->
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_olmos.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_webMaster.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_nestor.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_oscar.php");?>
<!-- incluyo ventana modal -->
	<?php include_once("../consultaModal/desarrolladores/v_modal_desarrollador_jesus.php");?>
<?php
	}
	else{ // entro pero este no es el nivel autorizado
		echo "<h2>No esta autorizado</h2>";
		echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
	}
}
else{  // trata de entrar sin autenticar
	echo "<h2>se tiene que identificar</h2>";
	echo "<input type='button' value='Volver al Home' onclick=\"location.href='../index.php?accion=Inicio'\">";
}
?>