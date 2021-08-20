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

    deleteImage(image_id) {
      console.log(image_id)
    }



  },
  computed: {
    
    //

  }
})