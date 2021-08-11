let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
      images: [],
    }
  },
  mounted() {
    this.getProducts()
    this.getImages()
  },

  methods: {

    loading() {
      $('#spinner').toggleClass('show');
    },

    async getProducts() {
      this.loading()
      let response = await axios.get('/php/getProducts.php')
      this.products = response.data
      this.loading()
    },

    async getImages() {
      this.loading()
      let response = await axios.get('/php/getImages.php')
      this.images = response.data
      this.loading()
    },

    filteredImages(product_id) {
      console.log(product_id)
      return this.images.filter( (image) => image.product_id == product_id )
    }

  },
  computed: {
    
    //

  }
});