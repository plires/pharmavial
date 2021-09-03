let app = new Vue({
  el: '#app',
  data: function() {
    return {
      name: '',
      activePrinciple: '',
      presentation: '',
      unitsPerBox: '',
      pharmaceuticalForm: '',
      therapeuticLine: '',
      language: 'Seleccione Idioma del producto',
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

      app.cleanErrors()

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

        var imagefile = document.querySelector('#customFileLang');

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

            setTimeout(function(){ 

              var newImage = app.images.filter( (image) => image.id == response.data.image_add ) 
              app.imagesByProduct.push(newImage[0])

            }, 1000);

          } else {
            app.errors = []
            app.errors.push('La imágen es requerida. Sólo se permiten archivos JPG y menores a 2 mb.')
          }

          $('#loader').fadeOut(500)

        })
        .catch(errors => {

          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ocurrió un error en el servidor... intente mas tarde por favor!',
          })

          $('#loader').fadeOut(500)
          
        })

      }

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

                app.imagesByProduct.splice(app.imagesByProduct.indexOf(index), 1)
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

        }

      })

    },

    deleteProduct(product_id) {

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
            url: '/backend/php/delete_product.php',
            data: {
              'id': product_id
            },
            type: "POST",
            success: function(result){

              if ( result == 'no_suite' ) {
                return true
              }

              if (result) {

                Swal.fire(
                  'Eliminado!',
                  'El producto ha sido eliminado.',
                  'success'
                )

                app.getProducts()

                app.resetInputs()

              } else {

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

    },

    checkFormProduct() {

      app.cleanErrors()

      if ( 
        this.name && 
        this.activePrinciple && 
        this.presentation && 
        this.unitsPerBox && 
        this.pharmaceuticalForm && 
        this.therapeuticLine &&
        this.language && this.language != 'Seleccione Idioma del producto'
        ) {
        return true
      } else {
        this.errors.push('Todos los campos son obligatorios')
      }

      if (this.language == 'Seleccione Idioma del producto') {
        this.errors.push('Seleccione un idioma para el producto')
      } 

    },

    editProduct() {

      let checked = this.checkFormProduct()

      if (checked) { 

        const form = document.querySelector('#form_product')
        var formData = new FormData(form);

        formData.append("id_product", this.selected)
        formData.append("name", this.name)
        formData.append("active_principle", this.activePrinciple)
        formData.append("presentation", this.presentation)
        formData.append("units_per_box", this.unitsPerBox)
        formData.append("pharmaceutical_form", this.pharmaceuticalForm)
        formData.append("therapeutic_line", this.therapeuticLine)
        formData.append("language", this.language)

        loader()
        axios.post('/backend/php/save_product.php', formData)
        .then(response => {

          if (response.data) {

            app.errors = []
            Swal.fire(
              'Éxito!',
              'El producto se editó satisfactoriamente.',
              'success'
            )

            app.getProducts()

          } else {
            app.errors = []
            app.errors.push('Todos los campos son obligatorios.')
          }

          $('#loader').fadeOut(500);

        })
        .catch(errors => {

          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ocurrió un error en el servidor... intente mas tarde por favor!',
          })

          $('#loader').fadeOut(500);
          
        })

      }

    },

    resetInputs(){
      this.name = ''
      this.activePrinciple = ''
      this.presentation = ''
      this.unitsPerBox = ''
      this.pharmaceuticalForm = ''
      this.therapeuticLine = ''
      this.language = 'Seleccione Idioma del producto'
    },

    cleanErrors() {
      this.errors = []
    },

  },

  computed: {
    
    //

  }
})