<?php 
	global $configServer; //creamos esta variable global para usarla como variable dentro de las clases

	//creamos el arreglo, ya que este sistema es integrado maneja dos motores de bases de datos
	$configServer =  array( 
		"BD"=>"atcsistem", //nombre de la base de datos para cualquier motor, será generico

		"mysql" =>
			array( //arreglo de configuracion para la conexion a mysql
				"server"=>"localhost",
				"user"=>"admin",
				"pass"=>"admin",
			),

		"postgre" =>
			array( //arreglo de configuracion para la conexion a postgresql
				"server"=>"localhost",
				"user"=>"admin",
				"pass"=>"admin",
				"port"=>"5432"
			)
		);

	$desarrollo = 1;
	if($desarrollo==1){
		ini_set("display_errors","on");
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	}else{
		ini_set("display_errors","off");
		error_reporting(0);
	}
 ?>