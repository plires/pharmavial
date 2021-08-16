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

        idProduct.value = product.id
        name.value = product.name
        activePrinciple.value = product.active_principle
        presentation.value = product.presentation
        unitsPerBox.value = product.units_per_box
        pharmaceuticalForm.value = product.pharmaceutical_form
        therapeuticLine.value = product.therapeutic_line
        link.value = product.link
        language.value = product.language
      }

  }});

  $('#loader').fadeOut(500);
  
});

$(form_product).on('submit', function(e) { //use on if jQuery 1.7+
  e.preventDefault();  //prevent form from submitting

  let product_id = parseInt(select.options[select.selectedIndex].attributes[0].nodeValue);

  if (!product_id) {
    resetInputs()

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

function resetInputs(){
  idProduct.value = ''
  name.value = ''
  activePrinciple.value = ''
  presentation.value = ''
  unitsPerBox.value = ''
  pharmaceuticalForm.value = ''
  therapeuticLine.value = ''
  link.value = ''
  language.value = ''
}

