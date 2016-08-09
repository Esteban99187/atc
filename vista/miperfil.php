<?php
  require_once("../modelo/class_usuarios.php");
  $us = new usuariosex;
  if($us->recibir_datos($_SESSION["idUsuario"]))
  {
      $cadena = $us->getdatos_array();
  }
?>
<div class="profile-env">
 <header class="row">
	 <div class="col-sm-2"> 
	   <a href="#" class="profile-picture"> <img src="imagenes/user.png" class="img-responsive img-circle" /> </a>
	 </div> 
	  <div class="col-sm-8">
		 <ul class="profile-info-sections"> 
		   <li> <div class="profile-name"> <strong> <a href="#"><?php if(isset($cadena)){ echo strtoupper($cadena[0].' '.$cadena[2]);  } ?></a> 
		        <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
		         </strong>
		         </div>
		    </li>
		   </ul> </div>  </header> <section class="profile-info-tabs"> <div class="row"> <div class="col-sm-offset-2 col-sm-10"> 
			   <ul class="user-details"> 
				   <li> <a href="#"> <i class="entypo-user"></i><?php if(isset($cadena)){ echo $cadena[6];} ?></a> </li>
				   <li>	<a href="#"> <i class="entypo-suitcase"></i><?php if(isset($cadena)){ echo $cadena[8];} ?> </a> </li> 
				   <li> <a href="#"> <i class="entypo-phone"></i><?php if(isset($cadena)){ echo $cadena[3];} ?></a> </li> 
	</ul> <!-- tabs for the profile links --> <ul class="nav nav-tabs"> 
<li class="active"><a href="?url=miperfil">Editar Perfil</a></li> 
<li><a href="?url=miclave">Editar Contraseña</a></li>
<li><a href="?url=mispreguntas">Editar Preguntas de Seguridad</a></li>  
</ul> 
</div>
</div> 
</section>
				<form name="fUsuarios" id="fUsuarios" method="post" action="../controlador/controlador_usuario.php">
					<div class="row">
						<div class="col-xs-5">
							<div class="form-group">
								<label>Usuario :</label>
								<input type="text" name="cedula" id="cedula" class="form-control "  value="<?php if(isset($cadena)){ echo $cadena[6];} ?>" <?php if(isset($cadena)){echo "disabled";} ?>/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<label>Cedula :</label>
								<input type="text" name="nombre" id="nombre"  class="form-control" value="<?php if(isset($cadena)){ echo strtoupper($cadena[7]); } ?>" disabled/></td>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label>Nombre :</label>
								<input type="text" name="nombre" id="nombre"  class="form-control" value="<?php if(isset($cadena)){ echo strtoupper($cadena[0]); } ?>" disabled/></td>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label>Apellido :</label>
								<input type="text" name="apellido" id="apellido"   class="form-control" value="<?php if(isset($cadena)){ echo strtoupper($cadena[2]); } ?>" disabled/></td>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">    
								<label>Telefono :</label>
								<input type="text" name="telefono" id="telefono"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[3]; } ?>" /></td>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label>E-mail :</label>
								<input type="text" name="correo" id="correo"  class="form-control" value="<?php if(isset($cadena)){ echo $cadena[4]; } ?>"/></td>
							</div>
						</div>
					</div>
					<br>
					<center>
						<input type="hidden" name="envio" value="a">
						<input type="hidden" name="tipo" value="3">
						<input type="hidden" name="myId" value="<?php echo $_SESSION["idUsuario"] ?>">
						<input type="hidden" name="id" value="<?php if(isset($_SESSION["idUsuario"])){ echo $_SESSION["idUsuario"];}?>">
						<input type="submit" class="btn btn-primary" name="opt" value="Guardar"></input>
						<button type="reset" class="btn btn-primary" onclick="cancelar('miperfil')">Cancelar</button>
					</center>
					<div id="alertasValid"></div>
				</form>
