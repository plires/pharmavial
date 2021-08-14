let app = new Vue({
  el: '#app',
  data: function() {
    return {
      products: [],
      filteredProducts: [],
      images: [],
      arrayActivePrinciple: [],
      arrayTherapeuticAction: [],
      therapeuticAction: '',
      activePrinciple: '',
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

      let activePrinciple = [...new Set(response.data.map( product => product.active_principle) ) ]
      let therapeuticAction = [...new Set(response.data.map( product => product.therapeutic_line) ) ]

      this.arrayActivePrinciple = activePrinciple.sort()
      this.arrayTherapeuticAction = therapeuticAction.sort()

      this.products = response.data.filter( (product) => product.language == lang )
      this.filteredProducts = this.products
      this.loading()
    },

    async getImages() {
      this.loading()
      let response = await axios.get('/php/getImages.php')
      this.images = response.data
      this.loading()
    },

    getProductImage (url) {

      if (url) {
        console.log(url)
      } else {
        console.log('vacio')
      }
    },

    filteredImages(product_id) {

      let arrayImages = this.images.filter( (image) => image.product_id == product_id )

      if (arrayImages.length == 1) {
        return arrayImages[0]
      } else {
        return arrayImages
      }

    },

    filterData: function() {

      this.filteredProducts = this.products

      let result = this.filteredProducts.filter(
        product => product.therapeutic_line == this.therapeuticAction && product.active_principle == this.activePrinciple 
      )
      this.filteredProducts = result

      if (this.therapeuticAction == '' && this.activePrinciple == '') {
        this.filteredProducts = this.products
      }

    },

    cleanFilters: function() {
      this.filteredProducts = this.products
      this.activePrinciple = ''
      this.therapeuticAction = ''
    }

  },
  computed: {
    
    //

  }
});