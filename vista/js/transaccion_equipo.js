
	function iniciar_detalle(r){
			
		document.getElementById("tabla_servicio_modulo").style.display="none";
		document.getElementById("btn_servicio_modulo").style.borderBottom="1px solid";
				
			document.getElementById("tabla_"+r).style.display="inline";
			document.getElementById("btn_"+r).style.borderBottom="1px solid #FFFFFF";
			
			
			
			
		
		
		}
		function iniciar(){
		
		//ASIGNAR NOMBRES MAS CORTOS A LAS VARIABLES------------------------
			btn_registrar			=document.getElementById("btn_registrar");
			btn_listar				=document.getElementById("btn_listar");
			btn_consultar			=document.getElementById("btn_consultar");
			btn_eliminar			=document.getElementById("btn_eliminar");
			btn_editar				=document.getElementById("btn_editar");
			btn_cancelar			=document.getElementById("btn_cancelar");
			
				
			cam_idunidad			= document.getElementById('cam_idunidad');		 
			cam_nombre_mod			= document.getElementById('cam_nombre_mod');		 
			cam_url_mod			= document.getElementById('cam_url_mod');		 
			cam_rol_cod_rol			= document.getElementById('cam_rol_cod_rol');		 
			cam_txt					=document.getElementById('cam_txt');
	//-------------------------------------------------------------------
		if(cam_idunidad.value){
			cam_idunidad.readOnly=true;
			btn_listar.disabled 	=false;
			btn_registrar.disabled			=true;
			btn_consultar.disabled 	=true;
			btn_eliminar.disabled 	=false;
			btn_editar.disabled 		=false;
			btn_cancelar.disabled 	=false;
			
			}else if(cam_txt.style.display=="none"){
		//LISTAR
		btn_listar.style.display	="none";
		btn_registrar.disabled		=true;
		btn_registrar.style.display	="none";
		btn_consultar.style.display	="none";
		btn_eliminar.style.display	="none";
		btn_editar.style.display	="none";
		btn_cancelar.style.display	="inline";
		
		}else{
				
			btn_listar.style.display	="inline";
			btn_registrar.disabled		=true;
			btn_consultar.disabled		=false;
			btn_eliminar.disabled		=true;
			btn_editar.disabled		=true;
			btn_cancelar.disabled		=false;
				
				
				
				}
	}
					
	
	
//---------------------VALIDACION--------------------------------			
		var exp_nro=/[0-9]/;
		var exp_txt=/[a-zA-Z]/;
		var exp_email=/^(.+\@.+\..+)$/;
		var exp_pass=/(?=^.{4,}$).*$/;
		var advertencia="Advertencia:\n";
		function validar_idunidad(){
			if(!exp_nro.test(cam_idunidad.value)){
				advertencia+="*El campo idunidad solo debe contener numeros.\n";
				fallo=1;
			}
		}
		function validar_rol_cod_rol(){
			if(!exp_nro.test(cam_rol_cod_rol.value)){
				advertencia+="*El campo rol_cod_rol solo debe contener numeros.\n";
				fallo=1;
			}
		}
		function validar(boton){
			if(boton.value=="Registrar" || boton.value=="Editar"){
				fallo=0;
				validar_idunidad();
				validar_rol_cod_rol();
			}
		
			if(fallo)		{alert(advertencia); advertencia="Advertencia:\n"; return false;	}
		}
		
//--------------------------------------------------------------------

//------------------------VERIFICA DISPONIBILIDAD DEL CAMPO PRINCIPAL-----------
pic1 = new Image(16, 16); 
pic1.src = "loader.gif";

$(document).ready(function(){
$("#btn_eliminar").click(function() {
  			if(!confirm("Esta seguro?")){
					return false;	
					}
		});
$("#cam_idunidad").change(function() { 

	var usr = $("#cam_idunidad").val();

			$("#status").html('<img src="imagenes/loader.gif" align="absmiddle">&nbsp;Analizando...');

    			$.ajax({  
    				type: "POST",  
    				url: "../controladores/control_transaccion_equipo.php?verificar_id=1",  
    				data: {idunidad:usr,verificar:"1"},  
    				success: function(msg){  
   
   						$("#status").ajaxComplete(function(event, request, settings){ 

							if(msg == '1'){
								$("#cam_idunidad").removeClass('object_error'); // if necessary
								$("#cam_idunidad").addClass("object_ok");
								
								btn_consultar.name="consultar"; 
								btn_consultar.click(); 
								
								
							}else{
								$("#cam_").removeClass('object_ok'); // if necessary
								$("#cam_").addClass("object_error");
								cam_nombre_mod.disabled=false;
									cam_url_mod.disabled=false;
									cam_rol_cod_rol.disabled=false;
									
								btn_registrar.disabled=false; 
								$(this).html(msg);
								}
						});
					}
				});
		});
});


//---------------------------------------------------------------------
