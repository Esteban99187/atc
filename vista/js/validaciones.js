
function soloNumero(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "0123456789";
   especiales = [8,9];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}

function soloNumero2(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "0123456789,";
   especiales = [8];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}





function soloNumerorif(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "j-0123456789";
   especiales = [95,8,9];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}

function soloNumerotlf(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "-0123456789";
   especiales = [95];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}


function soloLetra(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = [8,9];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}

     //~ 
 //~ function email(e)
 //~ {
     //~ key = e.keyCode || e.which;
     //~ tecla = String.fromCharCode(key).toLowerCase();
     //~ letras = "0123456789abcdefghijklmnopqrstuvwxyz";
     //~ especiales = [45,46,64,95];
//~ 
     //~ tecla_especial = false
     //~ for(var i in especiales){
        //~ if(key == especiales[i])
        //~ {
            //~ tecla_especial = true;
            //~ break;
        //~ } 
     //~ }
 //~ 
     //~ if(letras.indexOf(tecla)==-1 && !tecla_especial)
     //~ {
		//~ alert("No se permiten Caracteres Especiales como *,+'¡¿?)(/&%$!");
        //~ return false;
     //~ }
 //~ }



function cedula(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "0123456789";
   especiales = [27];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}




function soloLetra2(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
   especiales = [8];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}


function solofecha(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890";
   especiales = [47];

   tecla_especial = false
   for(var i in especiales){
       if(key == especiales[i]){
          tecla_especial = true;
          break;
      } 
  }

  if(letras.indexOf(tecla)==-1 && !tecla_especial)
   return false;
}

function cambio_mayus(input){
    input.value=input.value.toUpperCase();
}