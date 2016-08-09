$(document).ready(function(){

		//un intervalo de tiempo para los select
	setInterval(function(){
		
		valorCorrectivo = $("#selectAjax").val();
		if(valorCorrectivo == 1){
			
			placa = $("#placa").val();
			valor = "comboCorrectivo";

			//buscamos el valor
			$.post("../controlador_alberto/corCombo.php",{placa:placa,valor:valor},function(data){
			$("#repuestos").html(data);
		});
		}


		$("#selectAjax").val(0);

	},1000);




});