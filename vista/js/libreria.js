/****************************************************************/
/****             CICPC Sub Delegación Acarigua              ****/
/**** Manejo de Botonera, Validacion de formularios y envios ****/
/****       versión 0.1 beta, Licencia Software Libre        ****/
/****        Desarrolladores: Daniel Gudiño, Nestor Infante  ****/
/****                         Jesus Pirela, Oscar Méndez.    ****/
/****************************************************************/

//para ajax //
window.XMLHttpRequest || (window.XMLHttpRequest = function(){
	return new ActiveXObject("Msxml12.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP");
});
// de modal 1
function validarSeleccion(value){
	frm = document.envio_Modal;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
}
function validarSeleccionReportes(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}
}
function openModalListar(){
	$(".ventana").toggle(0);
}
function closeModalListar(){
	$(".ventana").toggle(0);
}
function openVentana(){
	$(".ventana").toggle(0);
}
function closeVentana(){
	$(".ventana").toggle(0);
}
function openVentana2(){
	document.getElementById('si').focus();
	$(".ventana2").toggle(0);
}
function closeVentana2(){
	$(".ventana2").toggle(0);
	$("si").click(function (){ $("#efecto6") });
}
function openVentana3(){
	$(".ventana3").toggle(0);
}
function closeVentana3(){
	$(".ventana3").toggle(0);
}
function openVentana4(){
	$(".ventana4").toggle(0);
}
function closeVentana4(){
	$(".ventana4").toggle(0);
}
function openVentana5(){
	$(".ventana5").toggle(0);
}
function closeVentana5(){
	$(".ventana5").toggle(0);
}
function openVentana6(){
	$(".ventana6").toggle(0);
}
function closeVentana6(){
	$(".ventana6").toggle(0);
}
function openVentana7(){
	$(".ventana7").toggle(0);
}
function closeVentana7(){
	$(".ventana7").toggle(0);
}
function openVentana8(){
	$(".ventana8").toggle(0);
}
function closeVentana8(){
	$(".ventana8").toggle(0);
}
function openVentana9(){
	$(".ventana9").toggle(0);
}
function closeVentana9(){
	$(".ventana9").toggle(0);
}
function openVentana10(){
	$(".ventana10").toggle(0);
}
function closeVentana10(){
	$(".ventana10").toggle(0);
}
function openVentana11(){
	$(".ventana11").toggle(0);
}
function closeVentana11(){
	$(".ventana11").toggle(0);
}
function openVentana12(){
	$(".ventana12").toggle(0);
}
function closeVentana12(){
	$(".ventana12").toggle(0);
}
function openVentana13(){
	$(".ventana13").toggle(0);
}
function closeVentana13(){
	$(".ventana13").toggle(0);
}
function openVentana14(){
	$(".ventana14").toggle(0);
}
function closeVentana14(){
	$(".ventana14").toggle(0);
}
function openVentana15(){
	$(".ventana15").toggle(0);
}
function closeVentana15(){
	location.href="../../control/seguridad/c_logout.php";
}
function openVentana16(){
	$(".ventana16").toggle(0);
}
function closeVentana16(){
	$(".ventana16").toggle(0);
}
function openVentana17(){
	$(".ventana17").toggle(0);
}
function closeVentana17(){
	$(".ventana17").toggle(0);
}
function openVentana18(){
	$(".ventana18").toggle(0);
}
function closeVentana18(){
	$(".ventana18").toggle(0);
}
function openVentana21(){
	$(".ventana21").toggle(0);
}
function closeVentana21(){
	$(".ventana21").toggle(0);
}
function openVentana22(){
	$(".ventana22").toggle(0);
}
function closeVentana22(){
	$(".ventana22").toggle(0);
}
function openVentana23(){
	$(".ventana23").toggle(0);
}
function closeVentana23(){
	$(".ventana23").toggle(0);
}
function openVentana24(){
	$(".ventana24").toggle(0);
}
function closeVentana24(){
	$(".ventana24").toggle(0);
}
function openVentana25(){
	$(".ventana25").toggle(0);
}
function closeVentana25(){
	$(".ventana25").toggle(0);
}
function openVentana26(){
	$(".ventana26").toggle(0);
}
function closeVentana26(){
	$(".ventana26").toggle(0);
}
function openVentana27(){
	$(".ventana27").toggle(0);
}
function closeVentana27(){
	$(".ventana27").toggle(0);
}
function openVentana28(){
	$(".ventana28").toggle(0);
}
function closeVentana28(){
	$(".ventana28").toggle(0);
}
function openVentana29(){
	$(".ventana29").toggle(0);
}
function closeVentana29(){
	$(".ventana29").toggle(0);
}
function openVentana30(){
	$(".ventana30").toggle(0);
}
function closeVentana30(){
	$(".ventana30").toggle(0);
}
function openVentana31(){
	$(".ventana31").toggle(0);
}
function closeVentana31(){
	$(".ventana31").toggle(0);
}





function confirm_logout(valor){
	if(valor == "Si"){
		location.href="../../control/seguridad/c_logout.php";
	}else{
		closeVentana();
	}
}
function guardado(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana3();	
	}else{
		closeVentana3();
	}
}
function desactivar(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana7();	
	}else{
		closeVentana7();
	}
}
function activar(valor){
	if(valor == "Si"){
		frm.submit();
		closeVentana8();	
	}else{
		closeVentana8();
	}
}
// function confirm_logout(){
// 	if(!confirm("Está Seguro De Salir Del Sistema ?")){
// 		return false;
// 	}else{
// 		location.href="../../control/seguridad/c_logout.php";
// 	}
// }
function cambio_mayus(input){
	input.value=input.value.toUpperCase();
}

/****************** modal buscar *********************/
function Listar(){
	var submenu = document.getElementById('ventanaModal');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar(){
	var submenu = document.getElementById('ventanaModal');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
/*********************************************************/

/**************** Modales desarrolladores *****************/
function Listar1(){
	var submenu = document.getElementById('ventanaModal1');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar1(){
	var submenu = document.getElementById('ventanaModal1');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar2(){
	var submenu = document.getElementById('ventanaModal2');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar2(){
	var submenu = document.getElementById('ventanaModal2');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar3(){
	var submenu = document.getElementById('ventanaModal3');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar3(){
	var submenu = document.getElementById('ventanaModal3');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar4(){
	var submenu = document.getElementById('ventanaModal4');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar4(){
	var submenu = document.getElementById('ventanaModal4');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar5(){
	var submenu = document.getElementById('ventanaModal5');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar5(){
	var submenu = document.getElementById('ventanaModal5');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar6(){
	var submenu = document.getElementById('ventanaModal6');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar6(){
	var submenu = document.getElementById('ventanaModal6');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
function Listar7(){
	var submenu = document.getElementById('ventanaModal7');
	submenu.style.visibility = "visible";
	// submenu.style.height = "600px";
	submenu.style.width = "100%";
}
function salirListar7(){
	var submenu = document.getElementById('ventanaModal7');
	submenu.style.visibility = "hidden";
	// submenu.style.height = "0px";
	submenu.style.width = "0%";
}
/************ Mensaje interactivo de cajas de formularios ***********/

function quitarValidacion(){
	document.getElementById("nube").style.visibility = "hidden";
}

/***************** function para descubrir campos de tipo password ******************/
function Convertir(){
	if(document.getElementById("convertir").type == "text"){
		document.getElementById("convertir").type = "password";
		document.getElementById("convertir2").type = "password";
		document.getElementById("convertir3").type = "password";
	}else{
		document.getElementById("convertir").type = "text";
		document.getElementById("convertir2").type = "text";
		document.getElementById("convertir3").type = "text";
	}
}
function Convertir2(){
	if(document.getElementById("convertir4").type == "text"){
		document.getElementById("convertir4").type = "password";
		document.getElementById("convertir5").type = "password";
		document.getElementById("convertir6").type = "password";
	}else{
		document.getElementById("convertir4").type = "text";
		document.getElementById("convertir5").type = "text";
		document.getElementById("convertir6").type = "text";
	}
}
function Convertir3(){
	if(document.getElementById("convertir9").type == "text"){
		document.getElementById("convertir9").type = "password";
	}else{
		document.getElementById("convertir9").type = "text";
	}
}
function Convertir4(){
	if(document.getElementById("convertir11").type == "text"){
		document.getElementById("convertir11").type = "password";
	}else{
		document.getElementById("convertir11").type = "text";
	}
}


/****************** funciones para la modal olvido de bloquear usuario *************************/

/** bloquear **/
	function ejecuta4(valor){
		document.envio_Modal6.ident3.value = valor;
		document.envio_Modal6.submit();
	}
	function openVentana19(valor){
		document.envio_Modal6.valorBotton.value = valor;
		$(".ventana19").toggle(0);
	}
	function closeVentana19(){
		$(".ventana19").toggle(0);
	}
	function bloquear(valor){
		if(valor == "Si"){
			ejecuta4(document.envio_Modal6.valorBotton.value);
			closeVentana19();	
		}else{
			closeVentana19();
		}
	}

	/** desbloquear **/
	function ejecuta5(valor){
		document.envio_Modal7.ident3.value = valor;
		document.envio_Modal7.submit();
	}
	function openVentana20(valor){
		document.envio_Modal7.valorBotton2.value = valor;
		$(".ventana20").toggle(0);
	}
	function closeVentana20(){
		$(".ventana20").toggle(0);
	}
	function desbloquear(valor){
		if(valor == "Si"){
			ejecuta5(document.envio_Modal7.valorBotton2.value);
			closeVentana20();	
		}else{
			closeVentana20();
		}
	}	

	/*validar checkbox y envio de filtro en reportes*/
	function validar_check_reportes(value){
	frm = document.form_general;
	if(frm.est1[0].checked && frm.est1[1].checked){
		if(value == 0){
			frm.est1[0].checked = false;
		}else{
			frm.est1[1].checked = false;
		}
	}

	
}

function envio_filtro(v){
	
 	frm = document.form_general;
 	
	 	
	if(frm.nom.value){ //envio por descripcion
		
		frm.submit();	

	}else if(frm.est1[0].checked){ //Envio por el status activo
	
		frm.submit();
		
	}else if(frm.est1[1].checked){ //envio por el status inactivo
	
		frm.submit();
		
	}else{
		frm.temp.value=v; //envio general
		frm.submit();
	
	}	
}

	/*******************************************/

function buscarCombo(dato,peticion,id) {
	id = id || peticion;
    $.get("../controlador_alberto/corCombos.php",{data:dato,peticion:peticion},function(data) {
        console.log(data);
        datos = JSON.parse(data);
        totalDatos = datos.respuesta.length;
        opciones = "<option value=''> SELECCIONE UNA OPCIÓN </option>";
        if(datos.error!=true && totalDatos>0) {
            for(td=0;td<totalDatos;td++)
                opciones += "<option value='"+datos.respuesta[td].id+"'> "+datos.respuesta[td].descripcion+" </option>";
        }else{
            opciones = "<option value=''> NO HAY DATOS ASOCIADOS </option>";
        }
        $("#"+id).html(opciones);
    });
}
function revisarVacios(idTabla){
    tbody = document.getElementById(idTabla) || document.getElementById(idTabla).tBodies[0];
    for(ro=0;ro<(tbody.rows.length);ro++){
        for(cel=0;cel<(tbody.rows[ro].cells.length)-1;cel++){
            Celda = tbody.rows[ro].cells[cel].children[0];
            if(Celda.disabled==false && Celda.type!="checkbox"){
                if(Celda.value==""){
                    return false;
                    break;
                }   
            }
        }
    }
    return true;
}
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}