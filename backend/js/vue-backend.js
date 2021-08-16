let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
      productsByLang: [],
      selected: 0
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
      this.cleanInputs()
    },

    cleanInputs() {
      this.selected = 0
      $(".form-control").val("");
      $("#form_product").removeClass("was-validated");
    }

  },
  computed: {
    
    //

  }
})