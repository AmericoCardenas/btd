
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

 $(document).ready(function(){
   var email = $("#email").val();
    swal({
   title: "Bienvenido",
   text: email,
   icon: "success",
 });
});

$(document).ready(function(){
    $('.collapsible').collapsible();
  });    

  function deshabilitaRetroceso() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function() {
        window.location.hash = "no-back-button";
    }
}

function mayusculas(e) {
  e.value = e.value.toUpperCase();
}

function validaNumericos(event) {
  if(event.charCode >= 48 && event.charCode <= 57){
    return true;
   }
   return false;        
}

function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = [8, 37, 39, 46];

  tecla_especial = false
  for(var i in especiales) {
      if(key == especiales[i]) {
          tecla_especial = true;
          break;
      }
  }

  if(letras.indexOf(tecla) == -1 && !tecla_especial)
      return false;
}

