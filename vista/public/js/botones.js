$(document).ready(function(){
	$(".incluir").attr("class",$(".incluir").attr("class")+" btn btn-primary");
	$(".grabar").attr("class",$(".grabar").attr("class")+" btn btn-primary");
	$(".buscar").attr("class",$(".buscar").attr("class")+" btn btn-primary");
	$(".busqueda").attr("class",$(".busqueda").attr("class")+" btn btn-primary");
	$(".modificar").attr("class",$(".modificar").attr("class")+" btn btn-primary");
	$(".cancelar").attr("class",$(".cancelar").attr("class")+" btn btn-primary");
	$("input[name='eliminar']").attr("class"," btn btn-primary");

	//funcion para apagar campos
	function apagar_campos(){
		$(".campo").attr("readonly","readonly");
		$("select.campo").attr("disabled",true);
		$("input[type=text].campo").attr("disabled",true);
		$("input[type=button].campo").attr("disabled",true);
		$("input[type=submit].campo").attr("disabled",true);
	}//apagar todos los campos

	//funcion para encender campos
	function encender_campos(){
		$(".campo").removeAttr("readonly");
		$("select.campo").attr("disabled",false);
		$("input[type=text].campo").attr("disabled",false);
		$("input[type=button].campo").attr("disabled",false);
		$("input[type=submit].campo").attr("disabled",false);
		//dejar desactivados todos aquellos que tiene la clase readonlytrue
		$(".readonlytrue").attr("readonly",true);
	}
	//llamaremos a la funcion apagar campos
	apagar_campos();
	//++++++++++++++++++++++++++++++++++al momento de utilizar los botones+++++++++++++++++++++++++++++++++++++++++
	$(".incluir").click(function(){
		//encendemos campos
		encender_campos();
		$(".buscar, .modificar, .eliminar").attr("disabled",true);
		$(".cancelar").attr("disabled",false);
		$(".grabar").attr("disabled",false);
		$(this).attr("disabled",true);
	});

	//<<buscar>>
	$(".buscar").click(function(){
		
		//removemo el campo clave
		$(".campoclave").removeAttr("readonly");
		$(".incluir, .modificar, .eliminar ,.grabar").attr("disabled",true);
		$(".cancelar").attr("disabled",false);
		$(".mibusqueda").css({"display":"block","float":"rigth"});
		$(this).attr("disabled",true);

		$("#mascara").fadeIn(1000,function(){
			$("#ventana_modal").slideDown(500);
		});
	});

	//cuando le damos click a uno de los botones de busqueda de la modal
	$(".busqueda").click(function(){
		//de esta manera haremos la busqueda modal
		valor_id = $(this).parent().parent().find('td').eq(0).text();
		valor_nombre = $(this).parent().parent().find('td').eq(1).text();
		//en el formulario persona guardarmeos los dos valores el id y el nombre
		$("#formulario_persona").find('tr').eq(0).find('td').eq(1).find('input').val(valor_id);
		//console.log($("#formulario_persona").find('tr').eq(0).find('td').eq(1).find('input').val());
		//ahora el nombre
		$("#formulario_persona").find('tr').eq(1).find('td').eq(1).find('input').val(valor_nombre);
		//console.log($("#formulario_persona").find('tr').eq(1).find('td').eq(1).find('input').val());
		//TAMBIEN PODEMOS COLOCAR 
		$(".campo_busqueda").val(valor_id);
	});

	$("#tabla_modal").click(function(){
		$("#ventana_modal").slideUp(500,function(){
			$("#mascara").fadeOut(1000,function(){
				location.reload();
			});
		});
	});
	
	//ahora haremos las busquedas rapidas en las tablas
	$("#mibusqueda_modal").keyup(function(){
		var texto = $(this).val();
		texto = texto.toUpperCase();
	  	$('table#table_modal tr td').parent().removeClass().hide();
	 	 //$('table#table_modal tr td').parent().slideToggle(400);


	 	 $('table#table_modal tr td:contains('+texto+')').parent().show();
	});

	//efectos para dejar en el centro la ventana modal  
	function centro(){   
   		var window_height = $(window).height();
   		var window_width = $(window).width();

   		var div_height = $('#ventana_modal').height();
   		var div_width = $('#ventana_modal').width();

   		$('#ventana_modal').css('margin-top',(window_height/2)-(div_height/2)).css('margin-left',(window_width /2)-(div_width/2) );
  	}
  	centro();
   	$(window).resize(function(){
    	centro();
   	});

	//cierre de dejar en el centro la pantalla modal
	//valores
	var estado_form = $(".estado_form").val();
	if(estado_form==1){
		encender_campos();
		$(".campoclave").attr("readonly","readonly");
	}
});