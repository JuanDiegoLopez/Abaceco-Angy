function validarEmail(email){
  var valido = document.getElementById('valido');
  var expr= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (!expr.test(email) ){
    valido.src = '../recursos/img/incorrecto.png';
    return false;
  }
  else{
    valido.src = '../recursos/img/correcto.png';
    return true;
  }
}

function soloNumeros(evt){
  if (evt.keyCode<45 || evt.keyCode>57)
    evt.returnValue = false;
}


function camposVacios(){
  var vacio=false;
  var campos = document.getElementsByTagName('input');
  for(i=0;i<campos.length;i++){
    if(campos[i].type=='text'||campos[i].type=='date'){
      if (campos[i].value === null || campos[i].value.length === 0 || /^\s*$/.test(campos[i].value)){
                  vacio=true;
      }
    }
  }
  return vacio;
}


function validacion(){
   var correo = document.getElementById('correo');
   var vacio = camposVacios();
   if(vacio!==false){
     alert('Hay campos vacios!');
     return false;
   }else if(correo!==undefined){
    if(validarEmail(correo.value)===false){
      document.getElementById('correo').focus();
      alert('El correo no es valido');
      return false;
    }
  }
  else{
    return true;
  }
}
