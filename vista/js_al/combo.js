$(document).ready(function(){


	var valor_select_actual_material = "";
	var valor_select_recargante = "";

	//cuando le demos al combo estado
	$("#tipo_material").change(function(){

		var idtipo = $(this).val(); //si es infraestructurs o deporte para todos
		var valor = "tipo_material";

		//recargamos los valores aqui
		valor_select_actual_material = idtipo;
		valor_select_recargante = valor_select_actual_material;
		
		//hacemos la llamada ajax
		$.post("controlador/corCombo.php",{idtipo:idtipo,valor:valor},function(data){
			$("#material").html(data);
		});
	});


	//un intervalo de tiempo para los select
	setInterval(function(){
		tipo_material_ajax = $("#tipo_material_ajax").val();
		
		//tipo de material	
		if(tipo_material_ajax!="0"){
			$("#material").val("");
			idtipo = tipo_material_ajax;
			var valor = "tipo_material";
			//hacemos la llamada ajax
			$.post("controlador/corCombo.php",{idtipo:idtipo,valor:valor},function(data){
				$("#material").html(data);
				$("#tipo_material_ajax").val("0");
			});
		}	

		

	},1000);


	//selecion del campo pais
	$("#pais").change(function(){
		

		var idpais= $(this).val();
		valor = "pais";

		//hacemos la llamada ajax
		$.post("../controlador_alberto/corCombo.php",{idpais:idpais,valor:valor},function(data){
			$("#estado").html(data);
		});
	});




	//seleccion del campo  estado
	$("#estado").change(function(){

		var idestado = $(this).val();
		valor = "estado";
		//hacemos la llamada ajax
		$.post("../controlador_alberto/corCombo.php",{idestado:idestado,valor:valor},function(data){
			$("#municipio").html(data);
		});
	});


	//seleccion del campo municipio
	$("#municipio").change(function(){
		var idmunicipio = $(this).val();
		valor = "municipio";

		//hacemos la llamada ajax
		$.post("../controlador_alberto/corCombo.php",{idmunicipio:idmunicipio,valor:valor},function(data){
			$("#parroquia").html(data);
		});
	});



	//combo para la parroquia
	$("#parroquia").change(function(){
		var idparroquia = $(this).val();
		valor = "parroquia";
		//hacemos la llamada ajax
		$.post("controlador/corCombo.php",{idparroquia:idparroquia,valor:valor},function(data){
			$("#comunidad").html(data);
		});
	});


	//combo para la parroquia
	$("#comunidad").change(function(){
		var idcomunidad = $(this).val();
		valor = "comunidad";
		//hacemos la llamada ajax
		$.post("controlador/corCombo.php",{idcomunidad:idcomunidad,valor:valor},function(data){
			$("#consejo_comunal").html(data);
		});
	});





	$("#placa_unidad").blur(function(){
		//obtendremos el valor de la placa
		var placa = $(this).val();
		var estatus_incluir = $("#incluir").attr("disabled");
		var valor = "buscar_placa";
		//incluyendo siempre y ccuando lo que hacemos es guardar datos
		if(estatus_incluir!='disabled' && placa!=""){
			//aqui es en donde haremos la busqueda en ajax
			$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){

				if(data=='1'){
					alert("ya existe una unidad con esta placa");
					//borramos el campo
					$("#placa_unidad").val("");
					$("#placa_unidad").focus();
				}
			});
		}//cieere del if
	});


	//serial del motor
	$("#serial_motor").blur(function(){


		//obtendremos el valor de la placa
		var serial_motor = $(this).val();
		var estatus_incluir = $("#incluir").attr("disabled");
		var valor = "buscar_serial_motor";

		//incluyendo siempre y ccuando lo que hacemos es guardar datos
		if(estatus_incluir!='disabled' && serial_motor!=""){

			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{serial_motor:serial_motor,valor:valor},function(data){

			if(data=='1'){
				alert("ya existe un motor con este serial");
				//borramos el campo
				$("#serial_motor").val("");
				$("#serial_motor").focus();
			}
		});
		}//cieere del if
	});

	//serial de carroceria
	$("#serial_carroceria").blur(function(){
		//obtendremos el valor de la placa
		var serial_carroceria = $(this).val();
		var estatus_incluir = $("#incluir").attr("disabled");
		var valor = "buscar_serial_carroceria";

		//incluyendo siempre y ccuando lo que hacemos es guardar datos
		if(estatus_incluir!='disabled' && serial_carroceria!=""){
			//aqui es en donde haremos la busqueda en ajax
			$.post("../controlador_alberto/corcombo.php",{serial_carroceria:serial_carroceria,valor:valor},function(data){
				if(data=='1'){
					alert("ya existe una carroceria con este serial");
					//borramos el campo
					$("#serial_carroceria").val("");
					$("#serial_carroceria").focus();
				}
			});
		}//cieere del if
	});
});