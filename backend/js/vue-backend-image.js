let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
      imagesByProduct: [],
      images: [],
      productsByLang: [],
      product_id: '',
      selected: 0,
      errors: []
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
      loader()
      let response = await axios.get('/backend/php/get_products.php')
      this.products = response.data
      this.productsByLang = this.products
      $('#loader').fadeOut(500)
    },

    async getImages() {
      loader()
      let response = await axios.get('/backend/php/get_images.php')
      this.images = response.data
      $('#loader').fadeOut(500)
    },

    changeLanguage(lang) {
      loader()
      this.productsByLang = []
      this.productsByLang = this.products.filter( (product) => product.language == lang )
      this.selected = 0

      if (this.imagesByProduct) {
        this.imagesByProduct = []
      }
      $('#loader').fadeOut(500)
    },

    checkFormImage: function () { 

      let file = this.$refs.myFile.files[0];

      if ( file && file.type == 'image/jpeg' && file.size <= 2097152 ) {
        return true
      } 

      this.errors = []

      if (!file) {
        this.errors.push('Suba una imágen.')
      }

      if (file.type !== 'image/jpeg') {
        this.errors.push('Solo se permiten imagenes de tipo .jpg')
      }

      if (file.size > 2097152) {
        this.errors.push('Máximo 2 mb.')
      }

      return false

    },

    sendImage() {

      let checked = this.checkFormImage()

      if (checked) { 
        
        const form = document.querySelector('#form_image')
        var formData = new FormData(form);

        var imagefile = document.querySelector('#customFileLang')

        formData.append("image", imagefile.files[0])
        formData.append("product_id", this.selected)

        loader()

        axios.post('/backend/php/upload_image.php', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(response => {

          if (response.data.save) {

            app.errors = []
            Swal.fire(
              'Éxito!',
              'La imágen ha sido cargada satisfactoriamente.',
              'success'
            )

            app.getImages()

            document.querySelector('#customFileLang').value = ""
            
            setTimeout(function(){ 

              var newImage = app.images.filter( (image) => image.id == response.data.image_add ) 
              app.imagesByProduct.push(newImage[0])

            }, 1000);

          } else {
            app.errors = []
            app.errors.push('La imágen es requerida. Sólo se permiten archivos JPG y menores a 2 mb.')
          }

        })
        .catch(errors => {

          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ocurrió un error en el servidor... intente mas tarde por favor!',
          })
          
        })

      }

      $('#loader').fadeOut(500)

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
          
          loader()

          $.ajax({
            url: '/backend/php/delete_image.php',
            data: {
              'id': image_id
            },
            type: "POST",
            success: function(result){

              if ( result == 'no_suite' ) {
                return true
              }

              if (result) {

                Swal.fire(
                  'Eliminado!',
                  'La imágen ha sido eliminada.',
                  'success'
                )

                app.imagesByProduct = app.imagesByProduct.filter( (product) => product.id != image_id )
                app.getImages()

              } else {

                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Algo salió mal!',
                })
                return false

              }

          }})

          $('#loader').fadeOut(500)

        }

      })

    },

  },
  computed: {
    
    //

  }
})