function validar(){
  var usuario,nombre,apellido,password,password2,celular;
  usuario=document.getElementById("usuario").value;
  nombre=document.getElementById("nombre").value;
  apellido=document.getElementById("apellido").value;
  password=document.getElementById("password").value;
  password2=document.getElementById("password2").value;
  celular=document.getElementById("celular").value;

  const pattern = new RegExp('^[A-Z]+$','i');

  if(usuario===""||nombre===""||apellido===""||password===""||password2===""||celular===""){
  	alert('Todos los campos son obligatorios');
  	return false;
  }
  else if(nombre.length<5){
  	alert('El nombre es muy corto');
  	return false;
  }
  else if(nombre.length>30){
  	alert('El nombre es muy largo');
  	return false;
  }
  else if(apellido.length<5){
  	alert('El apellido es muy corto');
  	return false;
  }
  else if(apellido.length>30){
  	alert('El apellido es muy largo');
  	return false;
  }
  else if(password.length<5){
  	alert('La contraseña es muy corto');
  	return false;
  }
  else if(password.length>30){
  	alert('La contraseña es muy largo');
  	return false;
  }
  else if(celular.length<5){
  	alert('El celular es muy corto');
  	return false;
  }
  else if(celular.length>15){
  	alert('El celular es muy largo');
  	return false;
  }
  else if(password!==password2){
  	alert('Las contraseña no son iguales');
  	return false;
  }
  else if (isNaN(celular)) {
  	alert('El  telefono debe ser solo numeros')
  	return false;
  }
  else{
  	return true;
  }
}
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }