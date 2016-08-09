<?php
/***************************************************************
 * Nombre:Lista de departamentos.php
 * Descripcion:Listado del Personal de ATC
 * Fecha de creacion:abril 2014
 * Modificado:Daniela Montes
 ***************************************************************/
  // Require Once de la clase Personal (Incluye la clase Personal)
require_once("../../modelo/class_conductoratc.php");
   $lobj_conductoratc= new class_conductoratc();
   $listado_conductoratc= $lobj_conductoratc->flistar2();

?>
<body style="background: -moz-linear-gradient(top, rgba(216,96,96,0.13) 0%, rgba(216,96,96,0.13) 100%); /* FF3.6+ */ background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(216,96,96,0.13)), color-stop(100%,rgba(216,96,96,0.13))); /* Chrome,Safari4+ */ background: -webkit-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Chrome10+,Safari5.1+ */ background: -o-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* Opera 11.10+ */ background: -ms-linear-gradient(top, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* IE10+ */
background: linear-gradient(to bottom, rgba(216,96,96,0.13) 0%,rgba(216,96,96,0.13) 100%); /* W3C */ filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#21d86060', endColorstr='#21d86060',GradientType=0 ); /* IE6-9 */"> 
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link href="../css/bootstrap.css" rel="stylesheet">
<div class="container" style="margin-top:10px;">
	<div class="row spa">
	<div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Lista del Conductor</strong></div>
        <div class="panel-body">
            <div class="row">
				<div class="form-group col-lg-10"></div>
            <a href="../reporte/pdfRep_Conductor.php?lsa=-"><input type="button" class="btn btn-primary btn-lg" value="Imprimir        " title="Click aqui para Imprimir"></a>
            </div>
            <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tlf. Movil</th>
        <th>Tlf. Casa</th>
        <th>Tlf. Corporativo</th>
        <th>Dirección</th>
        </tr>
    </thead>
    <thead>
    
		<tr>
        <td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$cedula=$listado_conductoratc[$i][0];
						echo "".$cedula."<hr>"; 
							}	
						?></td>
        <td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][1];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
       <td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][2];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
       
        <td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][3];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
		<td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][4];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
		<td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][5];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
		<td><?php 
						for($i=0;$i<count($listado_conductoratc);$i++){
						$idarticulo=$listado_conductoratc[$i][6];
						echo "".$idarticulo."<hr>"; 
							}	
						?></td>
    
        
		
      </tr>
    </thead>
  </table>
        </div>
      </div>
    </div>
</div>
</body>
