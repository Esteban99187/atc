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

 

?>

<html> 
<head> 
    <title>ATCSISTEM</title> 
<script> 
function ponPrefijo(cod, nomco,tele_depa,sol,clie,con,pro,sec,ori,tel,telef,web,co,dir,pos,apa,fax,ven){ 
	opener.document.fconductor.txtcedula.value = cod;
	opener.document.fconductor.txtnombres_per.value = nomco;
	opener.document.fconductor.txtapellidos_per.value = tele_depa;
	opener.document.fconductor.txtfecha_nacimiento_per.value = sol;
	opener.document.fconductor.txttelefono_movil_per.value = clie;
	opener.document.fconductor.txttelefono_casa_per.value = con;
	opener.document.fconductor.txttelefono_corp_per.value = pro;
	opener.document.fconductor.txtcorreo_per.value = sec;
	opener.document.fconductor.txtdireccion_habitacion_per.value = ori;
	opener.document.fconductor.txtfecha_contratacion_per.value = tel;
	opener.document.fconductor.cmbperiodo_pago_per.value = telef;
	opener.document.fconductor.cmbforma_pago_per.value = web;
	opener.document.fconductor.txtsueldo_mensual_per.value = co;
	opener.document.fconductor.txtfecha_ven_ci.value = dir;
	opener.document.fconductor.txtfecha_ven_lic.value = pos;
	opener.document.fconductor.txtfecha_ven_cermed.value = apa;
	opener.document.fconductor.txtfecha_ven_cersal.value = fax;
	opener.document.fconductor.txtfecha_ven_manali.value = ven;
	
	
	window.close()	
} 
</script> 
<style type="text/css">
</style>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.css">
</head> 

<body style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */"> 
<h1><?php 
				include("../../modelo/class_conductor.php");
				$objEquipo = new class_conductor();
				$cod=$_GET["id1"]; 
				$nombre=$_GET["id2"]; 
				$lista    = $objEquipo->flistadoconductor($cod,$nombre);
				if($lista=="99")				
				{	
				?>
				<script> 
					alert("No se han encontrado resultados en la busqueda.");
					
				</script> 
				<script languaje='javascript' type='text/javascript'>window.close();</script>;
				<?php 
				}
				?>
			
</h1> 

	<div class="row spa">
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Seleccione Rif</strong></div>
				<div class="panel-body">
			<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Cédula</th>
        <th>Nombre</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
					
					<?php
						if ($lista<0)
							echo "ERROR: no se logro la conexion a la bd";
						else
							for($i=0;$i<count($lista);$i++){
								$codig= $lista[$i][1];
								$nomb = $lista[$i][2];
								$tele_depa = $lista[$i][3];
								$sol= $lista[$i][4];
								$clie = $lista[$i][5];
								$con = $lista[$i][6];
								$pro = $lista[$i][7];
								$sec = $lista[$i][8];
								$ori = $lista[$i][9];
								$tel = $lista[$i][10];
								$telef = $lista[$i][11];
								$web = $lista[$i][12];
								$co = $lista[$i][13];
								$dir = $lista[$i][14];
								$pos = $lista[$i][15];
								$apa = $lista[$i][16];
								$fax = $lista[$i][17];
								$ven = $lista[$i][18];
								
							?>
					<th>
					  <input name="textfield"  type="text"value="<?php echo $codig ?>" size="10" onClick="ponPrefijo(this.value, '<?php echo $nomb?>', '<?php echo $tele_depa?>', '<?php echo $sol?>', '<?php echo $clie?>', '<?php echo $con?>', '<?php echo $pro?>', '<?php echo $sec?>', '<?php echo $ori?>', '<?php echo $tel?>', '<?php echo $telef?>', '<?php echo $web?>', '<?php echo $co?>', '<?php echo $dir?>', '<?php echo $pos?>', '<?php echo $apa?>', '<?php echo $fax?>', '<?php echo $ven?>')"></th>
						<th><input name="textfield2"  type="text" class="form-control" size="150" readonly value="<?php echo $nomb?>" size="15"></th>
          <?php }?>
      </tr>
    </tbody> 
		</table>
			  <h4 style="color:#DB4D4D;"> Para seleccionar conductor, haga click en el codigo.</h4>
		</div>
		
 
</body> 
</html> 
