$(document).ready(function(){
	//validaciones con expresiones regulares
	function solovacio(palabra){
		patron =  /^[^]+$/
		return patron.test(palabra);
	}
	function solonumeros(palabra){
		patron =  /^(?:\+|-)?\d+$/
		return patron.test(palabra);
	}
	function sololetras(palabra){
		patron = /^[a-zA-Záéíóúü]+(\s*[a-zA-Záéíóúü]*)*[a-zA-Záéíóúü]+$/
		return patron.test(palabra);
	}
	function validacorreo(palabra){
		patron = /^[a-z]+[a-z-0-9_]+@[a-z]+\.[a-z]{2,4}/
		return patron.test(palabra);
	}
	function letranumeros(palabra){
		patron = /^[a-zA-Z0-9\s]{2,150}$/
		return patron.test(palabra);
	}
	function validafecha(palabra){
		patron = /^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/
		return patron.test(palabra);
	}
	function validafecha2(palabra){
		patron = /^\d{4}\-\d{2}\-\d{2}$/
		return patron.test(palabra);
	}

	function validacedula(palabra){
		patron =  /^[1234567890]{7,8}$/
		return patron.test(palabra);
	}
	function validatelefono(palabra){
		patron =  /^\d{4,4}\d{7,7}$/
		return patron.test(palabra);
	}
	function validatelefono2(palabra){
		patron =  /^[1234567890]{7}$/
		return patron.test(palabra);
	}
	function valida_rif(palabra){
		//formato de un rif: V-21056985-2 -> la letra puede ser V, G, J
		patron = /^[VGJ-vgj]\-\d{8,8}\-\d{1,1}$/
		return patron.test(palabra);
	}

	//------------------otras funciones de validaciones-------------------
	function valida_numero2(palabra){
		patron = /^[0-9]+$/
		return patron.test(palabra);
	}

    $("#formulario_maestro").attr("autocomplete","off");

	var id_span = 0;
	$("#formulario_maestro").find("input[type=text]").change(function() {

		name = $(this).attr("name");
		tam = parseInt($(this).val().length);

				//funcion para validar la fecha
		if($(this).hasClass("solofecha")){
			if(!validafecha($(this).val())) {
			    
			 	$(this).css({"border":"2px solid #B21D11"});
			 	$("span.doc_"+name).remove();
			 	$(this).after("<span class='span_clasic doc_"+name+"'>Fecha invalida</span>");
			
			 	//haremos lo no obligatorio
				if(tam==0 && $(this).hasClass("nobligatorio")){
			 		$("span.doc_"+name).remove();
			 		$(this).css({"border":"2px solid #D1D1D2"});
				}
				//cierre de lo obligatorio

			}else{
				$("span.doc_"+name).remove();
				$(this).css({"border":"2px solid #D1D1D2"});
			}
		}

		//validar la segunda fecha
		if($(this).hasClass("solofecha2")){

			if(!validafecha2($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			 	$("span.doc_"+name).remove();
			 	$(this).after("<span class='span_clasic doc_"+name+"'>Fecha invalida</span>");
			

			 	//haremos lo no obligatorio
				if(tam==0 && $(this).hasClass("nobligatorio")){
			 		$("span.doc_"+name).remove();
			 		$(this).css({"border":"2px solid #D1D1D2"});
				}
				//cierre de lo obligatorio
			}else{
				$("span.doc_"+name).remove();
				$(this).css({"border":"2px solid #D1D1D2"});
			}
		}
	});

	//------------------------------------------cuando damos omblur------------------------------------
	$("#formulario_maestro").find("input[type=text],textarea").blur(function(){
		name = $(this).attr("name");
		tam = parseInt($(this).val().length);


			//funcion para validar la fecha
			if($(this).hasClass("solofecha")){
				if(!validafecha($(this).val())) {
				    
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Fecha invalida</span>");
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
					$(this).css({"border":"2px solid #D1D1D2"});
				}
			}

			//validar la segunda fecha
			if($(this).hasClass("solofecha2")){

				if(!validafecha2($(this).val())) {
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Fecha invalida</span>");
				

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}else{
					$("span.doc_"+name).remove();
					$(this).css({"border":"2px solid #D1D1D2"});
				}
			}


			if($(this).hasClass("solovacio")){
				if(!solovacio($(this).val())){
				 	$(this).css({"border":"2px solid #B21D11"});

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$(this).css({"border":"1px solid #D1D1D2"});
				}
			}


			if($(this).hasClass("solonumeros")){
				if(!solonumeros($(this).val())){
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Solo se permiten numeros</span>");
					
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}


			if($(this).hasClass("sololetras")){
			
				if(!sololetras($(this).val())) {
			
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Solo se permiten letras</span>");
					
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}
			
			if($(this).hasClass("letranumeros")){
		
				if(!letranumeros($(this).val())) {
				 	$(this).css({"border":"2px solid #B21D11"});
					$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Solo letras y numeros</span>");
				
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}

			if($(this).hasClass("solocedula")){
		
				if(!validacedula($(this).val())) { 
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Cedula Mal escrita</span>");
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}

			if($(this).hasClass("solocorreo")){
		
				if(!validacorreo($(this).val())) {
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Correo Invalido</span>");
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}


			if($(this).hasClass("solotelefono")){
		
				if(!validatelefono($(this).val())) { 
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Telefono invalido</span>");
			
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
					$("span.doc_"+name).remove();
				}
			}

			if($(this).hasClass("solotelefono2")){
				if(!validatelefono2($(this).val())) {
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Telefono invalido</span>");
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}else{
					$("span.doc_"+name).remove();
				}
			}

			//validar el rif
			if($(this).hasClass("rif")){
				if(!valida_rif($(this).val())) {
				 	$(this).css({"border":"2px solid #B21D11"});
				 	$("span.doc_"+name).remove();
				 	$(this).after("<span class='span_clasic doc_"+name+"'>Rif invalido</span>");
			
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		$("span.doc_"+name).remove();
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}else{
					$("span.doc_"+name).remove();
				}
			}

		


	});

	//----------------------CIERRE DEL BLUR------------------------------------------------------

















//------------------------------------------validaciones a la hora de incluir----------------------------------------------------
	
	$("#incluir,#modificar").click(function(){
		cont_errores = 0; ok = true;
	
		$("#formulario_maestro").find("input[type=text]").each(function(){
			
			//omtenemos todos los datos
			name = $(this).attr("name");
			tam = parseInt($(this).val().length);

			if($(this).hasClass("solovacio")){
				if(!solovacio($(this).val())){
				 	cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio


				}else{
					$(this).css({"border":"1px solid #D1D1D2"});
				}
			}


			if($(this).hasClass("solonumeros")){
				if(!solonumeros($(this).val())){
				 	cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			if($(this).hasClass("sololetras")){
			
				if(!sololetras($(this).val())) {
					cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
					
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			if($(this).hasClass("letranumeros")){
		
				if(!letranumeros($(this).val())) {
					 cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});

					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			if($(this).hasClass("solocedula")){
		
				if(!validacedula($(this).val())) {
					 cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
					
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}
			}
			if($(this).hasClass("solocorreo")){
		
				if(!validacorreo($(this).val())) {
					 cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}
			if($(this).hasClass("solotelefono")){
		
				if(!validatelefono($(this).val())) {
					 cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			if($(this).hasClass("solotelefono2")){
		
				if(!validatelefono2($(this).val())) {
					 cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			//validar el rif
			if($(this).hasClass("rif")){
				if(!valida_rif($(this).val())) {
				    cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			//funcion para validar la fecha
			if($(this).hasClass("solofecha")){
				if(!validafecha($(this).val())) {
				     cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}
			}

			//validar la segunda fecha
			if($(this).hasClass("solofecha2")){
				if(!validafecha2($(this).val())) {
				     cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
					
					//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio

				}else{
				 	$(this).css({"border":"2px solid #ccc"});
				}
			}



		});


		//VAIDACIONES CON  LOS SELECT
		$("#formulario_maestro").find("select").each(function(){
			

			if($(this).hasClass("solovacio")){

				if(!solovacio($(this).val())){
				 	cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio


				}else{
					$(this).css({"border":"1px solid #D1D1D2"});
				}
			}


			if($(this).hasClass("solonumeros")){
				if(!valida_numero2(parseInt($(this).val().substring(0,99999)))){
				 	cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				}else{
				 	$(this).css({"border":"2px solid #ccc"});
				}
			}

			if($(this).hasClass("sololetras")){
				tam_texto = $(this).val().length;

				if(tam_texto>0){
					palabra = "AA";

				}else{
					palabra = "";
				}

				if(!sololetras(palabra)) {
					cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});
				}else{
				 	$(this).css({"border":"2px solid #ccc"});

				}
			}


		});
		

		//VALIDACIONES CON LOS TEXTAREAS
		$("#formulario_maestro").find("textarea").each(function(){

			if($(this).hasClass("solovacio")){
				
				if(!solovacio($(this).val())){
					
				 	cont_errores++;
				 	$(this).css({"border":"2px solid #B21D11"});

				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio


				}else{
					$(this).css({"border":"1px solid #D1D1D2"});
				}
			}


			if($(this).hasClass("letranumeros")){
				
				if(!letranumeros($(this).val())) {
					
					cont_errores++;
					//$(this).text("");
				 	//$(this).attr("placeholder","Esta permitido solo letras de A-Z  y numeros");
				 	$(this).css({"border":"2px solid #B21D11"});
				 	//haremos lo no obligatorio
					if(tam==0 && $(this).hasClass("nobligatorio")){
				 		cont_errores--;
				 		$(this).css({"border":"2px solid #D1D1D2"});
					}
					//cierre de lo obligatorio
				}else{
				 	$(this).css({"border":"2px solid #ccc"});	
				}
			}
		});

		if(cont_errores>1){
			crearMsj("Existen campos vacios o escritos invalidamente");
			ok = false;
		}
		
		return ok;

	});//cierre de la funcion de validaciones al darle click al boton



	

	/*----------CREAR UN AFTER EN LAS VALIDACIONES----------------------*/



	//**************************************ahora validar a tiempo real los datos*************************************************
	$("#formulario_maestro").find("input[type=text],textarea").keyup(function(event){
		

		if($(this).hasClass("solonumeros")){
			if(!solonumeros($(this).val())){
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("sololetras")){
			if(!sololetras($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("letranumeros")){
			if(!letranumeros($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solocedula")){
	
			if(!validacedula($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solocorreo")){
	
			if(!validacorreo($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solotelefono")){
	
			if(!validatelefono($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solotelefono2")){
	
			if(!validatelefono2($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		//validar el rif
		if($(this).hasClass("rif")){
			if(!valida_rif($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}


		//validar la fecga
		if($(this).hasClass("solofecha")){
			if(!validafecha($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}

		//validar solo campos vacios
		if($(this).hasClass("solovacio")){
			if(!solovacio($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{

				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
	}); 
	//******************cierre de la funcion con datos escritos a tiempo real**********************************************
	//---------------esto sera cuando hagamos un cambio en el select a tiempo real
	$("#formulario_maestro").find("select").change(function(event){		
		if($(this).hasClass("solovacio")){
			if(!solovacio($(this).val())){
			 	$(this).css({"border":"2px solid #B21D11"});

			 	//haremos lo no obligatorio
				if(tam==0 && $(this).hasClass("nobligatorio")){
			 		$(this).css({"border":"2px solid #D1D1D2"});
				}
				//cierre de lo obliga
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}


		if($(this).hasClass("solonumeros")){
			if(!solonumeros($(this).val())){
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("sololetras")){
			tam_texto = $(this).val().length;
			
			//para validar los select que son solo letras
			if(tam_texto>0){
				palabra = "AA";
			
			}else{
				palabra = "";
			}

			if(!sololetras(palabra)) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("letranumeros")){
			if(!letranumeros($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solocedula")){
	
			if(!validacedula($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solocorreo")){
	
			if(!validacorreo($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solotelefono")){
	
			if(!validatelefono($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		if($(this).hasClass("solotelefono2")){
	
			if(!validatelefono2($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
		//validar el rif
		if($(this).hasClass("rif")){
			if(!valida_rif($(this).val())) {
			 	$(this).css({"border":"2px solid #B21D11"});
			}else{
				$(this).css({"border":"1px solid #D1D1D2"});
			}
		}
	}); //******************cierre de la funcion con datos escritos a tiempo real**********************************************
});

window.XMLHttpRequest || (window.XMLHttpRequest = function() { 
	return new ActiveXObject("Msxml2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP"); 
});

function AgregarEvento(elemento,evento,funcion){
	if(typeof(elemento)!="undefined" && elemento!=null){
 		(window.addEventListener!="undefined")?elemento.addEventListener(evento,funcion,false):elemento.attachEvent('on'+evento,funcion); 
	}
}
function EliminarEvento(obj,tipo,funcion){	
	obj.removeEventListener(tipo, funcion, false );
}
function ocultarMensaje(tipo){
	if(tipo==1){
		divMensaje.style.top="20px";
		divMensaje.style.opacity="0";
		divMensaje.style.visibility = "hidden";
	}else if(tipo==2){
		divMensajeConfirm.style.top="20px";
		divMensajeConfirm.style.opacity="0";
		divMensajeConfirm.style.visibility = "hidden";
	}
	mascara.style.display = "none";
}
function ocultarMsj(){
	divAlerta = document.getElementById("msjAlerta");
	mascara.style.visibility = "hidden";
	mascara.style.display = "none";
	mascara.style.opacity = 0;
	divAlerta.style.visibility = "hidden";
	divAlerta.style.opacity = 0;
}
function crearMsj(texto){
	divAlerta = document.getElementById("msjAlerta");
	mascara = document.getElementById("mascara");
	mascara.style.visibility = "visible";
	mascara.style.display = "block";
	mascara.style.opacity = 0.5;
	divAlerta.style.visibility = "visible";
	divAlerta.style.opacity = 1;
	divAlerta.innerHTML=' <div class="contentMsj">  '+texto+' <div align="center" style="margin: 1px auto; padding: 0"> <button type="button" onclick="ocultarMsj()" class="btn-sm btn-danger">Aceptar</button> </div> </div>';
}
function mensajeConfirmar(msj,funcion){
	divMensajeConfirm = document.getElementById('msjConfirm');
	btnAceptarConfirm = document.getElementById('acceptConfirm2');
	btnCancelConfirm = document.getElementById('cancelConfirm');
	mascara = document.getElementById("mascara");
	mascara.style.display = "block";
	divMensajeConfirm.style.display = "block";
	divMensajeConfirm.style.top="120px";
	divMensajeConfirm.style.opacity="1";
	divMensajeConfirm.style.visibility = "visible";
	document.getElementById("messageConfirm").innerHTML=msj;
	funcion();
}