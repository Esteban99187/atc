/*
Autor: Juan Carlos Rivera Poccomo
Web: http://starkcode.blogspot.com
*/
 
/* # Validando Formulario
============================================*/
$(document).ready(function(){
	$('#formUsuarios').validate({
		errorElement: "span",
		rules: {
		    nombre: {
		     	minlength: 8,
		        required: true
		    }
		},
		highlight: function(element) {
			$(element).closest('.control-group')
			.removeClass('success').addClass('error');
		},
		success: function(element) {
			element
			.text('OK!').addClass('help-inline')
			.closest('.control-group')
			.removeClass('error').addClass('success');
		}
	});
});