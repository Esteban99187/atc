
function eliminar(datos,pagina){
	if (confirm('Esta seguro de eliminar este registro?')) {
	window.location='administrador.php?url='+pagina+'&del='+datos+'&av=3';
	}else{
	alert('Se ha cacelado la accion');	
	}
}