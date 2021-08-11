const form_suite = document.getElementById("form_suite");
const select = document.getElementById('suite_id');
const priceRegular = document.getElementById('price_regular');
const price3Hs = document.getElementById('price_3_hs');
const discount = document.getElementById('discount');
const id_suite = document.getElementById('id_suite');

select.addEventListener('change',
function(){

  loader()

  let suite_id = this.options[select.selectedIndex].attributes[0].nodeValue;

  $.ajax({
    url: 'php/get_suite.php',
    data: {
      'id': suite_id
    },
    type: "POST",
    success: function(result){

      if ( result == 'no_suite' ) {
        $(form_suite).removeClass("was-validated");
        resetInputs()
        return true
      }

      if ( result == 'false' ) {
        resetInputs()
        createToasts('bg-danger', 'Suite', 'Listar Suite', 'Hubo un error al leer los datos. Intente nuevamente.')
        return false
      }

      if (result) {
        let suite = JSON.parse(result)

        priceRegular.value = suite.price
        price3Hs.value = suite.price_3hs
        discount.value = suite.dto_pay_online
        id_suite.value = suite.id
      }

  }});

  $('#loader').fadeOut(500);
  
});

$(form_suite).on('submit', function(e) { //use on if jQuery 1.7+
  e.preventDefault();  //prevent form from submitting

  let suite_id = parseInt(select.options[select.selectedIndex].attributes[0].nodeValue);

  if (!suite_id) {
    resetInputs()

    setTimeout(function() {
      $(form_suite).removeClass("was-validated");
    }, 0)
    
    return false
  }

  loader()

  var data = $("#form_suite :input").serializeArray();
  
  $.ajax({
    url: 'php/save_suite.php',
    data: data,
    type: "POST",
    success: function(result){

      console.log(result + ' asd')

        if (result) {
          createToasts('bg-success', 'Suite', 'Edición', 'La suite se editó existosamente.')
        } else {
          createToasts('bg-danger', 'Suite', 'Edición', 'Hubo un error al grabar los datos. Intente nuevamente.')
        }

  }});

  $('#loader').fadeOut(500);

});

function resetInputs(){
  priceRegular.value = ''
  price3Hs.value = ''
  discount.value = ''
  id_suite.value = ''
}