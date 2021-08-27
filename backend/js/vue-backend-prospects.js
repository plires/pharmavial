let app = new Vue({
  el: '#app',
  data: function() {
    return {
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
      let response = await axios.get('php/get_products.php')
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

      if ( file && file.type == 'application/pdf' && file.size <= 5242880 ) {
        return true
      } 

      this.errors = []

      if (!file) {
        this.errors.push('Suba una imágen.')
      }

      if (file.type !== 'application/pdf') {
        this.errors.push('Solo se permiten archivos de tipo PDF')
      }

      if (file.size > 5242880) {
        this.errors.push('Máximo 5 mb.')
      }

      return false

    },

    sendNewProspect() {

      // let checked = this.checkFormProspect()

      if (true) { 
        
        const form = document.querySelector('#form_product')
        var formData = new FormData(form);

        var pdf = document.querySelector('#uploadProspect');

        formData.append("pdf", pdf.files[0])
        formData.append("product_id", this.selected)

        axios.post('php/save_prospect.php', formData, {
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

          } else {
            app.errors = []
            app.errors.push('El archivo es requerido. Sólo se permiten archivos PDF y menores a 5 mb.')
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

  },
  computed: {
    
    //

  }
})