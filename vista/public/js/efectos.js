$(document).ready(function(){



	//al hacerle click a los maestros
	$("#maestros").click(function(){
		$(".maestro").slideDown(500);
		$(".transaccion").slideUp(500);
		$(".reportes").slideUp(500);
		$(".maestro_valor").text("-");
		$(".transaccion_valor").text("+");
	});

	$("#transacciones").click(function(){
		$(".transaccion").slideDown(500);
		$(".maestro").slideUp(500);
		$(".reportes").slideUp(500);
		$(".maestro_valor").text("+");
		$(".transaccion_valor").text("-");
	});

	$("#reportes").click(function(){
		$(".reportes").slideDown(500);
		$(".transaccion").slideUp(500);
		$(".maestro").slideUp(500);
	});




	//----------------ESTO ES LA OPCION DE REGISTRO DIARIO-------------------------
	
	//al colocar el consumo diario deberia ir incrementando la opcion del historico
	$("#kilometraje_actual_registrodiario").blur(function(){
		kilometraje_anterior = parseInt($("#kilometraje_anterior").val());
		kilometraje_actual = parseInt($(this).val());

		if(kilometraje_actual<=kilometraje_anterior){
			alert("El kilometraje actual no puede ser menor o igual al anterior");
			$(this).focus();
		}else{
			$("#consumo_diario").val((kilometraje_actual-kilometraje_anterior));
		}
	}); // cierre del evento de teclado











	//---------------FUNCION PARA OBTENER LA FECHA Y SUMARLE DIAS A LA FECHA 
	
});
