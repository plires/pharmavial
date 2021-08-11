const id_user = document.getElementById('id_user');
const user = document.getElementById('user');
const email = document.getElementById('email');

$('#form_user').on('submit', function(e) { //use on if jQuery 1.7+

  loader()

  e.preventDefault();  //prevent form from submitting
  var data = $("#form_user :input").serializeArray();
  
  $.ajax({
    url: 'php/save_user.php',
    data: data,
    type: "POST",
    success: function(result){

      if (user.value != '' || email.value != '') {
        if (result) {
          createToasts('bg-success', 'Usuario', 'Edición', 'El usuario se editó existosamente.')
        } else {
          createToasts('bg-danger', 'Usuario', 'Edición', 'Hubo un error al grabar los datos. Intente nuevamente.')
        }
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
        email.value = userBDD.email

      }

    $('#loader').fadeOut(500);

  }});

});