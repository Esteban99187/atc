<?php
	include_once("../modelo/ClassReporte.php");
	$menu= new ClassReporte;
?>
<h2>Listado de Reportes</h2> <br /> 
<div class="row"> 
	<div class="col-md-12">
		 <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" --> 
			<li class="active"> <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="entypo-doc-text-inv"></i></span> <span class="hidden-xs"><i class="entypo-doc-text-inv"></i>Reportes</span> </a> </li>
		</ul> <div class="tab-content"> 
		<div class="tab-pane active" id="profile"> 
			<div class="tab-pane" id="profile">
				<p>Seleccione</p> 
				<br />
				<div class="row">
					<div class="col-md-12">
						<div class="panel-group" id="accordion-test"> 
						<?php
							if($menu->consulta_por($_SESSION['idPerfil']))
							{
								while($row_modulos=$menu->row())
								{
									$VAR = strtoupper($row_modulos['NombreRep']);
									if($VAR == "ESTATUS" || $VAR=="DEPARTAMENTO" || $VAR=="MARCA UNIDAD" || $VAR=="MODELO UNIDAD" || $VAR=="CARGO"){
									$url = $row_modulos['UrlRep'];
									echo '<div class="panel panel-default">';
										echo "<div class='panel-heading'> <h4 class='panel-title'> <a  href=javascript:Imprimir('$url') >";
										echo ''.strtoupper($row_modulos['NombreRep']).'';
										echo '</a> </h4>'; 
										echo '</div>';
									echo '</div>';
									}
								}
							}
						?>
						</div>
					</div> 
				</div>	     
			</div> 
		</div> 
	</div>
</div>
</div>

	<script type="text/javascript">
		loF=document.form1;
		function Imprimir(url)
		{
			miPopup = window.open('../vista/'+url+'.php');
		}
	</script>
