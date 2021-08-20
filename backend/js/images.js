const form_product = document.getElementById("form_product");
const select = document.getElementById('product_id');
const idProduct = document.getElementById('id_product');
const name = document.getElementById('name');
const activePrinciple = document.getElementById('active_principle');
const presentation = document.getElementById('presentation');
const unitsPerBox = document.getElementById('units_per_box');
const pharmaceuticalForm = document.getElementById('pharmaceutical_form');
const therapeuticLine = document.getElementById('therapeutic_line');
const link = document.getElementById('link');
const language = document.getElementById('language');

select.addEventListener('change',
function(){

  loader()

  let product_id = this.options[select.selectedIndex].attributes[0].nodeValue;

  $.ajax({
    url: 'php/get_images_by_product_id.php',
    data: {
      'id': product_id
    },
    type: "POST",
    success: function(result){

      if ( result == 'no_suite' ) {
        $(form_product).removeClass("was-validated");
        app.imagesByProduct = []
        return true
      }

      if ( result == 'false' ) {
        app.imagesByProduct = []
        createToasts('bg-danger', 'Imagenes', 'Listar Imagenes', 'Hubo un error al leer los datos. Intente nuevamente.')
        return false
      }

      if (result) {
        let images = JSON.parse(result)

        app.imagesByProduct = images
      }

  }});

  $('#loader').fadeOut(500);
  
});

$(form_product).on('submit', function(e) { //use on if jQuery 1.7+
  e.preventDefault();  //prevent form from submitting

  let product_id = parseInt(select.options[select.selectedIndex].attributes[0].nodeValue);

  if (!product_id) {
    app.imagesByProduct = []

    setTimeout(function() {
      $(form_product).removeClass("was-validated");
    }, 10)
    
    return false
  }

  loader()

  var data = $("#form_product :input").serializeArray();

  $.ajax({
    url: 'php/save_product.php',
    data: data,
    type: "POST",
    success: function(result){

      if (result) {
        createToasts('bg-success', 'Producto', 'Edición', 'El Producto se editó existosamente.')
        let lang = app.productsByLang[0].language
        app.getProducts()
        setTimeout(function(){
          app.changeLanguage(lang)
        }, 500);
      } else {
        createToasts('bg-danger', 'Producto', 'Edición', 'Hubo un error al grabar los datos. Intente nuevamente.')
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

