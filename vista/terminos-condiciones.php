<?php 
	/********************************************************************************************
	*                                                                                           *
	*  Nombre: ATCSISTEM                                                                        *
	*  Descripción: (Almacenes y Transporte Cerealeros C.A Sistema).                            *
	*  Fecha de Creacion: Año 2014 Acarigua, Venezuela.                                         *
	*                                                                                           *
	*  Programador (a): Carballo Jesús <jesusalejandrocarballo@gmail.com>                       *
	*                   Gomez Zoraly   <z-oral-y8@hotmail.com>                                  *
	*                   Montes Daniela <dani.daniela.montes@gmail.com>                          *
	*                   Mogollón José  <josetomas_033@hotmail.com>                              *
	*                   Marcelo Maria  <mary_mvr_272@hotmail.com>                               *
	*                   Sanchez Jesús  <jesussh7@gmail.com>                                     *
	*                                                                                           *
	*  Este programa es software libre, puede redistribuirlo y / o modificar                    *
	*  Bajo los términos de la GNU Licencia Pública General(GPL) publicada por                  *
	*  La Fundación de Software Libre (FSF), en su versión 2 o cualquier versión posterior.     *
	*                                                                                           *
	*  Este programa se distribuye con la esperanza de que sea útil,                            *
	*  Pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de                          *
	*  COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR.                               *
	*                                                                                           *
	********************************************************************************************/
	session_start();
	$login = isset($_SESSION['login']) ? $_SESSION['login'] : null ;
	if(!$login)
	{
		exit('<script> alert("Acceso Denegado!"); window.location.href="session.php" </script>');
	}
?>


	
		<center><h1>Almacenes y Transporte Cerealeros ATC C.A.</h1></center><br>
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<div class="panel-title"><i class="entypo-info"></i>Términos y Condiciones.
				</div> 
				<div class="panel-options">  <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div>
			</div>
			
			<div class="panel-body"> <div class="col-md-1"></div>
			<form name="fUsuarios" id="fUsuarios" method="post" action="vista.php?url=configclave">
			<div class="col-md-11">
					<p style="margin-bottom: 0cm; line-height: 100%;"><span style="font-family: arial,helvetica,sans-serif; font-size: medium;"><strong>1. Necesidad de Registro.</strong></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="text-indent: 1.25cm; margin-bottom: 0cm; line-height: 150%; text-align: justify;" align="justify"><span style="font-family: arial,helvetica,sans-serif;">Por regla general, para el acceso al módulo de noticias de la Aplicación informática no será necesario contar con un usuario. No obstante, la utilización de determinados servicios como la intranet estará condicionada a poseer un usuario previamente registrado por el administrador de la Aplicación informática. Posteriormente el usuario al momento de ingresar por primera vez al sito  deberá completar los campos del formulario de registro con datos válidos. El usuario registrado deberá verificar que la información que pone a disposición del Sistema para el Control de Órdenes de Carga y Viáticos en la empresa almacenes y transporte cerealeros (ahora en adelante llamado ATCSISTEM) sea exacta, precisa y verdadera. Del mismo modo, asumirá el compromiso de actualizar los Datos Personales cada vez que los mismos sufran modificaciones. Los Usuarios Registrados garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de los Datos Personales puestos a disposición de ATCSISTEM.</span></span></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="margin-bottom: 0cm; line-height: 100%;"><span style="font-family: arial,helvetica,sans-serif; font-size: medium;"><strong>2. Obligación de mantener actualizados los Datos Personales.</strong></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="text-indent: 1.25cm; margin-bottom: 0cm; line-height: 150%; text-align: justify;" align="justify"><span style="font-family: arial,helvetica,sans-serif;">Los Datos Personales introducidos por todo Usuario en la Aplicación informática, deberán ser exactos, actuales y veraces en todo momento. ATCSISTEM se reserva el derecho de solicitar algún comprobante y/o dato adicional a efectos de corroborar los Datos Personales, y de suspender temporal y/o definitivamente a aquellos Usuarios cuyos datos no hayan podido ser confirmados.</span></span></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="margin-bottom: 0cm; line-height: 100%;"><span style="font-family: arial,helvetica,sans-serif; font-size: medium;"><strong>3.	Acceso a la cuenta personal y obligación de confidencialidad de la Clave de Seguridad.</strong></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="text-indent: 1.25cm; margin-bottom: 0cm; line-height: 150%; text-align: justify;" align="justify"><span style="font-family: arial,helvetica,sans-serif;"> El personal de la empresa y el cliente tendrá acceso a un usuario personal mediante el ingreso de nombre de usuario y clave de seguridad. Esta Clave de Seguridad es personal e intransferible. El Usuario se obliga a mantener en estricta confidencialidad su Clave de Seguridad. El Usuario será, en todo caso, responsable por todo daño, perjuicio, lesión o detrimento que del incumplimiento de esta obligación de confidencialidad se genere por cualquier causa. </span></span></span></p>
					<p style="text-indent: 1.25cm; margin-bottom: 0cm; line-height: 150%; text-align: justify;" align="justify"><span style="font-family: arial,helvetica,sans-serif;">El usuario es personal, único e intransferible, y está prohibido que un mismo Usuario posea más de una Cuenta. El Usuario será responsable por todas las operaciones efectuadas desde su Cuenta, pues el acceso a la misma está restringido al ingreso y uso de su Clave de Seguridad, de conocimiento exclusivo del Usuario y cuya confidencialidad es de su exclusiva responsabilidad. El Usuario se compromete a notificar al ATCSISTEM de forma inmediata y por un medio idóneo, fehaciente, eficiente y eficaz, cualquier uso no autorizado de su Cuenta, así como el ingreso por terceros no autorizados a la misma. Se encuentra prohibida la venta, cesión, transferencia o transmisión de la Cuenta bajo cualquier título, ya sea oneroso o gratuito. ATCSISTEM se reserva el derecho de cancelar un usuario previamente registrado, cuando a su sola discreción considere que no se ha dado cumplimiento a la totalidad de las pautas establecidas en los Términos y Condiciones, sin que esté obligado a comunicar o exponer las razones de su decisión y sin que ello genere derecho a indemnización o resarcimiento alguno a favor del Usuario alcanzado por dicha decisión.</span></span></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="margin-bottom: 0cm; line-height: 100%;"><span style="font-family: arial,helvetica,sans-serif; font-size: medium;"><strong>4. Normas generales de utilización de la aplicación informática.</strong></span></p>
					<p style="margin-bottom: 0cm; line-height: 100%;">&nbsp;</p>
					<p style="text-indent: 1.25cm; margin-bottom: 0cm; line-height: 150%; text-align: justify;" align="justify"><span style="font-family: arial,helvetica,sans-serif;">El Usuario se obliga a utilizar la Aplicación informática y todo su contenido y servicios conforme a lo establecido en la ley, la moral, el orden público, los presentes Términos y Condiciones. Asimismo, se obliga a hacer un uso adecuado de los servicios y/o contenidos de la Aplicación informática y a no emplearlos para realizar actividades ilícitas o constitutivas de delito, que atenten contra los derechos del personal y/o personas ajenas a la organización y que infrinjan la regulación sobre propiedad intelectual e industrial, o cualesquiera otras normas del ordenamiento jurídico que puedan resultar aplicables y, en especial, el principio de buena fe que obliga a actuar leal, correcta y honestamente tanto en los tratos preliminares, celebración y ejecución de todo contrato. Como consecuencia de lo anterior, el Usuario se obliga a no difundir, transmitir, introducir y poner a disposición de personal ajeno a la organización, cualquier tipo de material e información (datos, contenidos, mensajes, dibujos, archivos, imagen, fotografías, software, etc.) que sean contrarios a la ley, la moral, el orden público y los presentes Términos y Condiciones de Uso.</span></span></span></p>
					<center>
						<input type="submit" class="btn btn-primary btn-lg"  value="Aceptar" >
						<a href="../controlador/logout.php"><input type="button" class="btn btn-primary btn-lg" value="Cancelar" ></a>
					</center>
			</div>
			</form>
		</div>
	</div> 
</div>
</div>
