$(document).ready(function(){



	//serial del motor
	$("#serialmotor").blur(function(){
		//obtendremos el valor de la placa
		var serial_motor = $(this).val();
		var valor = "buscar_serial_motor";
			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corCombo.php",{serial_motor:serial_motor,valor:valor},function(data){
			if(data=='1'){
				alert("ya existe un motor con este serial");
				//borramos el campo
				$("#serialmotor").val("");
				$("#serialmotor").focus();
				$("#guardar").attr("disabled","disabled");
			}
		});
	});




	//serial de carroceria
	$("#serial_carroceria").blur(function(){
		//obtendremos el valor de la placa
		var serial_carroceria = $(this).val();
		var valor = "buscar_serial_carroceria";
			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corCombo.php",{serial_carroceria:serial_carroceria,valor:valor},function(data){

			if(data=='1'){
				alert("ya existe una carroceria con este serial");
				//borramos el campo
				$("#serialcarroceria").val("");
				$("#serialcarroceria").focus();
				$("#guardar").attr("disabled","disabled");
			}
		});
	});




	//placa unidad
	$("#placa_unidad").blur(function(){
		//obtendremos el valor de la placa
		var placa = $(this).val();
		var valor = "buscar_placa";
			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){

			if(data=='1'){
				alert("ya existe una placa de unidad con este serial");
				//borramos el campo
				$("#placa_unidad").val("");
				$("#placa_unidad").focus();
				$("#guardar").attr("disabled","disabled");
			}
		});
	});

	//esta es temporal
	$("#miplaca").blur(function(){
		//obtendremos el valor de la placa
		var placa = $(this).val();
		var valor = "buscar_placa";
			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){

			if(data=='1'){
				alert("ya existe una placa de unidad con este serial");
				//borramos el campo
				$("#miplaca").val("");
				$("#miplaca").focus();
				$("#guardar").attr("disabled","disabled");
			}
		});
	});





	//este sera para buscar las marcas segun el tipo de  marca que seleccionamos
	$("#tipo_marca").change(function(){

		id_tipo_marca = $(this).val()
		valor = "buscar_marca";
		$.post("controlador/corcombo.php",{id_tipo_marca:id_tipo_marca,valor:valor},function(data){
			//mostraremos aqui los datos
			$("#marca").html(data);
			$("#guardar").attr("disabled","disabled");
		});


	});






	//esto es para la tabla de registro diario en la placa de la unidad para traerme los datos de kilometraje
	$("#placa_unidad_registro_diario").change(function(){
		//obtendremos el valor de la placa
		var placa = $(this).val();
		var valor = "buscar_kilometraje_diario";
			//aqui es en donde haremos la busqueda en ajax
		$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){
			if(data!=""){
				$("#kilometraje_anterior").val(data);				
			}else{
				$("#kilometraje_anterior").val(0);	
			}
		});

	});
	//cierre de la placa de unidad






	//este sera para el combo de la placa que se encuentra en el mantenimiento correctivo
	$("#placa_mantenimiento_correctivo,#modelo_administracion_falla").change(function(){
		var modelounidad = $(this).val();
		valor = "buscar_repuestos";
		$.post("../controlador_alberto/corcombo.php",
			{modelounidad:modelounidad,valor:valor},
			function(data){
			console.log(data);
			//mostraremos aqui los datos
			$("#id_repuesto").html(data);
		});
	});






	//haremos un intervalo de busqueda
	setInterval(function(){
	
		valor_busqueda_ajax = parseInt($("#busqueda_ajax").val());
		if(valor_busqueda_ajax >= 1){
				modelounidad = parseInt($("#modelo_unidad").val());
				valor = "buscar_repuestos";
				
				//AQUI BUSCAREMOS EL REGISTRO DIARIO
				valor = "buscar_kilometraje_diario";
				placa = $("#placa_mantenimiento_correctivo").val();
				$.post("../controlador_alberto/corcombo.php",{placa:placa,valor:valor},function(data){
					if(data!=""){
						$("#kilometraje_actual").val(data);
						//$(".kilometraje_preventivo").val(data);
					}else{	
						$("#kilometraje_actual").val(0);
						//$(".kilometraje_preventivo").val(0);
					}
				});


			//------aqui buscarmos los repuestos de una unidad segun la falla de la misma
			if(modelounidad>=1){
				idfalla = $("#falla_correctivo").val();
				valor = "buscar_repuestos_falla";
				//AQUI BUSCAMOS LO REPUESTOS
				$.post("../controlador_alberto/corcombo.php",{idfalla:idfalla,modelounidad:modelounidad,valor:valor},function(data){
					//mostraremos aqui los datos
					$("#id_repuesto").html(data);
				});
			}
			//----------------------cierre--------------


		}
		$("#busqueda_ajax").val(0);
	},1000);



	//haremos otra busqueda de falla  buscaremos los repuestos de una falla segun el modelo de unidad
	$("#falla_correctivo").change(function(){

		idfalla = $(this).val();
		valor = "buscar_repuestos_falla";
		modelounidad = $("#modelo_unidad").val();
		//AQUI BUSCAMOS LO REPUESTOS
		$.post("../controlador_alberto/corcombo.php",{idfalla:idfalla,modelounidad:modelounidad,valor:valor},function(data){
			//mostraremos aqui los datos
			$("#id_repuesto").html(data);
		});
	});
	//cierre de la busqueda de falla


});