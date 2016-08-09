function ajaxFunc(){
  var xmlHttp;
  try {
    xmlHttp=new XMLHttpRequest();
    return xmlHttp;
  } catch (e) {  
    try {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      return xmlHttp;
    } catch (e) {
 try {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        return xmlHttp;
      } catch (e) {
        alert("Tu navegador no soporta AJAX!");
        return false;
      		}
	 	 }
	 }
}
function procesar(idsolicitud,tipo){
	var id = idsolicitud;
  var tip = tipo;
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_constancia_siniestro.php?q="+idsolicitud+"&t="+tip, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('resultado').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('resultado').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}
function procesarins(idsolicitud,capa,opcion){
  var id = idsolicitud;
  var c = capa;
  var op = opcion;
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_asignar_inspeccion.php?q="+id+"&op="+op , true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById(c).innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById(c).innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}
function procesarcap(idsolicitud,capa,opcion){
  var id = idsolicitud;
  var c = capa;
  var op = opcion;
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_control_capacitacion.php?q="+id+"&op="+op , true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById(c).innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById(c).innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}
function showPdf(pagina,idusuario,ac,tipo){
 window.location="pdfs/"+pagina+".php?id="+idusuario+"&ac="+ac+"&t="+tipo;
}
function showPdf3(idusuario,pagina,tipo){
 window.location="pdfs/"+pagina+".php?id="+idusuario+"&t="+tipo;
}
function showPdf2(sol){
 window.location="pdfs/pdf_orden_inspeccion.php?id="+sol;
}

function unlockInspeccionAccion(){
    document.getElementById('inspectorSelect').disabled=false;
    document.getElementById('fechaInsp').disabled=false;
    document.getElementById('btnProcesar').disabled=false;
    document.getElementById('btnCancelar').disabled=false;
     document.getElementById('asignarIspector').disabled=true;
}
function lockInspeccionAccion(){
    document.getElementById('btnCancelar').disabled=true;
    document.getElementById('inspectorSelect').value="";
    document.getElementById('fechaInsp').value="";
    document.getElementById('inspectorSelect').disabled=true;
    document.getElementById('fechaInsp').disabled=true;
    document.getElementById('btnProcesar').disabled=true;
    document.getElementById('asignarIspector').disabled=false;
}
function unlockInspeccionAccion2(){
    document.getElementById('inspectorSelect2').disabled=false;
    document.getElementById('fechaInsp2').disabled=false;
    document.getElementById('btnProcesar2').disabled=false;
    document.getElementById('btnCancelar2').disabled=false;
     document.getElementById('asignarIspector').disabled=true;
}

function checkOut(idInspeccion,idInspector){
  var id = idInspeccion;
  var id2 = idInspector;
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_checkout_inspeccion.php?q="+id+"&i="+id2, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('resulta').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('resulta').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}
function eliminar(datos,pagina){
  if (confirm('Esta seguro de eliminar este registro?')) {
  window.location='admin.php?url='+pagina+'&del='+datos+'&acc=e';
  }else{
  alert('Se ha cacelado la accion');  
  }
}
function aceptar_orden_carga(id){
  if (confirm('Esta seguro de confirmar esta solicitud?')) {
  window.location='admin.php?url=solicitud_procesada&id='+id;
  }else{
  alert('Se ha cacelado la accion');  
  }
}

function restauracion(datos,pagina){
  if (confirm('Esta seguro de restaurar este registro?')) {
  window.location='admin.php?url='+pagina+'&del='+datos+'&acc=r';
  }else{
  alert('Se ha cacelado la accion');  
  }
}

function restaurarres(datos,pagina){
  if (confirm('Esta seguro de restaurar este registro?')) {
  window.location='admin.php?url='+pagina+'&rea='+datos+'&acc=r';
  }else{
  alert('Se ha cacelado la accion');  
  }
}
function restauracionper(datos,pagina){
  if (confirm('Esta seguro de restaurar este registro?')) {
  window.location='admin.php?url='+pagina+'&rea='+datos+'&acc=r';
  }else{
  alert('Se ha cacelado la accion');  
  }
}

function eliminar2(datos){
  if (confirm('Esta seguro de eliminar este registro?')) {
  window.location='panelusuarios.php?&del='+datos+'&av=3';
  }else{
  alert('Se ha cacelado la accion');  
  }
}
function BuscarConstancia(){
  var q = 0;
  var id = document.getElementById('buscar').value;
  if(id == ""){
    q=0;
  }else{
    q=1;
  }
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_busqueda_constancia.php?id="+id+"&q="+q, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('resultadoSiniestro').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('resultadoSiniestro').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}
function cargaPlanificacion(){
  var idPlanificacion = document.getElementById('idPlanificacion').value;
  var idCapacitacion = document.getElementById('idCapacitacion').value;
  var idFacilitador = document.getElementById('idFacilitador').value;
  var dia = document.getElementById('dia').value;
  var turno = document.getElementById('turno').value;
    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_carga_planificacion.php?idpl="+idPlanificacion+"&idcap="+idCapacitacion+"&idfa="+idFacilitador+"&d="+dia+"&t="+turno , true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('resultado').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('resultado').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}

function busquedaBitacora(){
    var nom = document.getElementById('usuario').value;

    var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/contolador_busqueda_bitacora.php?n="+nom , true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('busquedadiv').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('busquedadiv').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}

function restaurar(id){
   var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_resturar.php?id="+id, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('restaurarDiv').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('restaurarDiv').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}

function agregarRespo(rol,cargo){
 var ajax;
    ajax = ajaxFunc();
    ajax.open("GET", "controlador/controlador_agregar_responsabilidad.php?rol"+rol+"&cargo="+cargo, true);
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.onreadystatechange = function()
{
    if (ajax.readyState==1){
      document.getElementById('resultadosx').innerHTML = 'verificando';
    }else if (ajax.readyState == 4) {
             document.getElementById('resultadosx').innerHTML = ajax.responseText;
         }
       }  
  ajax.send(null);
}

function eliminar_responsabilidad(id){
   window.location='admin.php?url=asignarResponsabilidades&act='+id;
}
function eliminar_reporte(id){
   window.location='admin.php?url=AsignarReporte&act='+id;
}
function eliminar_asignacion_submenu(id){
   window.location='admin.php?url=asignar_submenu&act='+id;
}

function eliminar_asignacion_operacion_submenu(id){
   window.location='admin.php?url=asignar_operacion_submenu&act='+id;
}

function eliminar_asignacion_operacion_menu(id){
   window.location='admin.php?url=asignar_operacion_menu&act='+id;
}

function activar(id,ci){
   window.location='admin.php?url=desactivarusuario&act='+id+'&ect='+ci;
}

function procesars(id){
   window.location='admin.php?url=procesarSiniestro&id='+id;
}

function desbloquear(id,ci){
   window.location='admin.php?url=bloquearusuarioexterno&act='+id+'&ect='+ci;
}

function detalles(id,fecha){
    window.location='panel.php?url=versolicitud&id='+id+'&fe='+fecha;
}
function detalles2(id,fecha){
    window.location='admin.php?url=versolicitudadm&id='+id+'&fe='+fecha;
}


function activaParroquia(v){ 
  if(v==0){
    document.forms[0].parroquia.disabled = true; 
  }else if(v!=1){
    document.forms[0].parroquia.disabled = false; 
  }
} 

function unlock(tipo){

    x = document.forms[0];

    if(x.tipo.value == 'personal'){

      x.tiposolicitud.disabled = false;
      x.motivo.disabled = false;
      x.observacion.disabled = false;
      x.idempresa.disabled = true;

    }else if(x.tipo.value == 'empresa'){

      x.idempresa.disabled = false;
      x.motivo.disabled = false;
      x.observacion.disabled = false;
      x.tiposolicitud.disabled = false;

    }else if(x.tipo.value == 'seleccione'){

      x.idempresa.disabled = true;
      x.motivo.disabled = true;
      x.observacion.disabled = true;
      x.motivo.disabled = true;
      x.actividad.disabled = true;
      x.denominacion.disabled = true;
      x.tiposolicitud.disabled = true;

    }
}

function desligar(id){
    window.location='admin.php?url=organizacionUsuario&desligar='+id;
}

function unlockA(){
   x = document.forms[0];

   if(x.tiposolicitud.value == 1){
      x.actividad.disabled = false;
      x.denominacion.disabled = false;
   }else if(x.tiposolicitud.value != 1){
      x.actividad.disabled = true;
      x.denominacion.disabled = true;
   }
}

function unlockSiniestro(){

    x = document.forms[0];
    if(x.tiposiniestro.value == 1){

      x.placavehiculo.disabled = false;
      x.motivo.disabled = false;
      x.observacion.disabled = false;
      x.direccionin.disabled = true;

    }else if(x.tiposiniestro.value == 3){

      x.direccionin.disabled = false;
      x.motivo.disabled = false;
      x.observacion.disabled = false;
      x.placavehiculo.disabled = true;

    }else if(x.tiposiniestro.value == 0){

      x.direccionin.disabled = true;
      x.motivo.disabled = true;
      x.observacion.disabled = true;
      x.placavehiculo.disabled = true;
      x.placavehiculo.disabled = true;

    }

}

function validaAsociacion(){
  x = document.forms[0];

  if(x.cedula1.value==''){
    alert('DEBE SELECCIONAR UNA CEDULA');
    return false;
  }
  return true;
}
