let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
    }
  },
  mounted() {
    this.getProducts()
  },

  methods: {
    
    async getProducts() {
      let response = await axios.get('php/get_products.php')
      this.products = response.data
    }

  },
  computed: {
    
    //

  }
})