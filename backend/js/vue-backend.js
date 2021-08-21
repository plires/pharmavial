let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
      imagesByProduct: [],
      images: [],
      productsByLang: [],
      selected: 0
    }
  },
  mounted() {
    this.getProducts()
    this.getImages()
    setTimeout(function(){
      app.changeLanguage('es')
    }, 1000);
  },

  methods: {
    
    async getProducts() {
      let response = await axios.get('php/get_products.php')
      this.products = response.data
      this.productsByLang = this.products
    },

    async getImages() {
      let response = await axios.get('php/get_images.php')
      this.images = response.data
    },

    changeLanguage(lang) {
      this.productsByLang = []
      this.productsByLang = this.products.filter( (product) => product.language == lang )
      this.selected = 0
      this.cleanInputs()

      if (this.imagesByProduct) {
        this.imagesByProduct = []
      }
    },

    cleanInputs() {
      this.selected = 0
      $(".form-control").val("");
      $("#form_product").removeClass("was-validated");
    },

    deleteImage(image_id, index) {

      Swal.fire({
        title: 'Esta seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          
          $.ajax({
            url: 'php/delete_image.php',
            data: {
              'id': image_id
            },
            type: "POST",
            success: function(result){

              if ( result == 'no_suite' ) {
                $("#form_product").removeClass("was-validated");
                cleanInputs()
                return true
              }

              if (result) {

                Swal.fire(
                  'Eliminado!',
                  'La imágen ha sido eliminada.',
                  'success'
                )

                app.imagesByProduct.splice(app.imagesByProduct.indexOf(index), 1);
                app.getImages()

              } else {

                cleanInputs()
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Algo salió mal!',
                })
                return false

              }

          }})

        }
      })

    }

  },
  computed: {
    
    //

  }
})