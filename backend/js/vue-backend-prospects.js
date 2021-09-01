let app = new Vue({
  el: '#app',
  data: function() {
    return {
      base: 'http://pharmavial.test',
      products: [],
      productsByLang: [],
      product_id: '',
      prospect: '',
      selected: 0,
      errors: []
    }
  },
  mounted() {
    this.getProducts()
    setTimeout(function(){
      app.changeLanguage('es')
    }, 1000);
  },

  methods: {
    
    async getProducts() {
      let response = await axios.get(this.base + '/backend/php/get_products.php')
      this.products = response.data
      this.productsByLang = this.products
    },

    changeLanguage(lang) {
      this.productsByLang = []
      this.productsByLang = this.products.filter( (product) => product.language == lang )
      this.selected = 0
    },

    checkFormProspect: function () { 

      let file = this.$refs.myFile.files[0];

      if ( file && file.type == 'application/pdf' && file.size <= 20971520 ) {
        return true
      } 

      this.errors = []

      if (!file) {
        this.errors.push('Suba una imágen.')
      }

      if (file.type !== 'application/pdf') {
        this.errors.push('Solo se permiten archivos de tipo PDF y un máximo de 20 Mb.')
      }

      if (file.size > 20971520) {
        this.errors.push('Máximo 20 mb.')
      }

      return false

    },

    sendNewProspect() {

      let checked = this.checkFormProspect()

      if (checked) { 
        
        const form = document.querySelector('#form_product')
        var formData = new FormData(form);

        formData.append("product_id", this.selected)
        formData.append("old_file_name_prospect", this.prospect)

        axios.post(this.base + '/backend/php/save_prospect.php', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(response => {

          if (response.data) {

            app.errors = []
            Swal.fire(
              'Éxito!',
              'El prospecto ha sido cargado satisfactoriamente.',
              'success'
            )

            app.getProducts()
            app.changeLanguage('es')

          } else {
            app.errors = []
            app.errors.push('El archivo es requerido. Sólo se permiten archivos PDF y menores a 20 mb.')
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

    deleteCurrentProspect(product_id) {

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
          
          const form = document.querySelector('#form_product')
          var formData = new FormData(form);

          formData.append("id", product_id)

          axios.post(this.base + '/backend/php/delete_current_prospect.php', formData)
          .then(response => {

            if (response.data) {

              app.errors = []
              Swal.fire(
                'Éxito!',
                'El prospecto ha sido eliminado satisfactoriamente.',
                'success'
              )

              app.getProducts()
              app.changeLanguage('es')

            } else {
              app.errors = []
              app.errors.push('Hubo un error, intente nuevamente por favor.')
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

      })
      
    }

  },
  computed: {
    
    //

  }
})