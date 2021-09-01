const form_product = document.getElementById("form_product");
const name = document.getElementById('name');
const activePrinciple = document.getElementById('active_principle');
const presentation = document.getElementById('presentation');
const unitsPerBox = document.getElementById('units_per_box');
const pharmaceuticalForm = document.getElementById('pharmaceutical_form');
const therapeuticLine = document.getElementById('therapeutic_line');
const language = document.getElementById('language');

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
    //
  },

  methods: {
    
    checkFormProduct() {

      this.errors = []

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

    sendNewProduct() {

      let checked = this.checkFormProduct()

      if (checked) {

        loader()

        var data = $("#form_product :input").serializeArray();

        $.ajax({
          url: '/backend/php/add_product.php',
          data: data,
          type: "POST",
          success: function(result){

            if (result) {
              createToasts('bg-success', 'Producto', 'Nuevo Producto', 'El Producto se guardo existosamente.')
              app.resetInputs()
            } else {
              createToasts('bg-danger', 'Producto', 'Nuevo Producto', 'Hubo un error al agregar los datos. Intente nuevamente.')
              app.errors = []
              app.errors.push('Todos los campos son obligatorios. Seleccione un idioma para el producto')
            }

        }});

        $('#loader').fadeOut(500);

      }

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

        var imagefile = document.querySelector('#customFileLang');

        formData.append("image", imagefile.files[0])
        formData.append("product_id", this.selected)

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
            // VER COMO HACER PARA QUE SE ACTUALICE Y SE MUESTRE LA IMAGEN RECIEN SUBIDA (se deberia buscar con promesas o async await en vez de settimeout) 
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

    cleanErrors() {
      this.errors = []
    }, 

    resetInputs(){
      this.name = ''
      this.activePrinciple = ''
      this.presentation = ''
      this.unitsPerBox = ''
      this.pharmaceuticalForm = ''
      this.therapeuticLine = ''
      this.language = 'Seleccione Idioma del producto'
    }

  },
  computed: {
    
    //

  }
})