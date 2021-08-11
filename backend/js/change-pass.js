const id_user = document.getElementById('id_user');
const user = document.getElementById('user');
const pass = document.getElementById('pass');
const c_pass = document.getElementById('c_pass');

$('#form_user').on('submit', function(e) { //use on if jQuery 1.7+

  loader()

  e.preventDefault();  //prevent form from submitting
  var data = $("#form_user :input").serializeArray();
  
  $.ajax({
    url: 'php/save_pass.php',
    data: data,
    type: "POST",
    success: function(result){

      if (result) {
        createToasts('bg-success', 'Usuario', 'Password', 'La contraseña se actualizó existosamente.')

        pass.value = ''
        c_pass.value = ''

        setTimeout(function() {
          $("#form_user").removeClass("was-validated");
        }, 0)

      } else {
        createToasts('bg-danger', 'Usuario', 'Password', 'Hubo un error al actualizar la contraseña. Intente nuevamente.')
      }

  }});

  $('#loader').fadeOut(500);

});

$( document ).ready(function() {

  loader()

  $.ajax({
    url: 'php/get_user.php',
    data: {
      id: sessionId
    },
    type: "POST",
    success: function(result){

      if (result) {
        let userBDD = JSON.parse(result)

        id_user.value = userBDD.id
        user.value = userBDD.user

      }

    $('#loader').fadeOut(500);

  }});

});