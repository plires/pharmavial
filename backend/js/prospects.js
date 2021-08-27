const form_product = document.getElementById("form_product");
const select = document.getElementById('product_id');

select.addEventListener('change',
function(){

  loader()

  let product_id = this.options[select.selectedIndex].attributes[0].nodeValue;

  $.ajax({
    url: 'php/get_product.php',
    data: {
      'id': product_id
    },
    type: "POST",
    success: function(result){

      if ( result == 'no_suite' ) {
        $(form_product).removeClass("was-validated");
        resetInputs()
        return true
      }

      if ( result == 'false' ) {
        resetInputs()
        createToasts('bg-danger', 'Producto', 'Listar Producto', 'Hubo un error al leer los datos. Intente nuevamente.')
        return false
      }

      if (result) {
        let product = JSON.parse(result)

        app.prospect = product.link

      }

  }});

  $('#loader').fadeOut(500);
  
});

$(function () {
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true
    });
  });

  $('.btn[data-filter]').on('click', function() {
    $('.btn[data-filter]').removeClass('active');
    $(this).addClass('active');
  });
  
})

