let app = new Vue({
  el: '#app',
  data: function() {
    return {
      base: 'http://pharmavial.test',
      products: [],
      selectActivePrinciple: '',
      selectTherapeuticAction: '',
      filteredProducts: [],
      images: [],
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

    fillSelects(products) {

      let activePrinciple = [...new Set(products.map( product => product.active_principle) ) ]
      let therapeuticAction = [...new Set(products.map( product => product.therapeutic_line) ) ]

      this.selectActivePrinciple = activePrinciple.sort()
      this.selectTherapeuticAction = therapeuticAction.sort()

    },

    async getProducts() {
      this.loading()
      let response = await axios.get(this.base + '/php/getProducts.php')

      this.fillSelects(response.data)

      this.products = response.data.filter( (product) => product.language == lang )
      this.filteredProducts = this.products
      this.loading()
    },

    async getImages() {
      this.loading()
      let response = await axios.get(this.base + '/php/getImages.php')
      this.images = response.data
      this.loading()
    },

    filteredImages(product_id) {

      let arrayImages = this.images.filter( (image) => image.product_id == product_id )

      if (arrayImages.length == 1) {
        return arrayImages[0]
      } else {
        return arrayImages
      }

    },

    filterSelect: function() {

      searchActivePrinciple = this.activePrinciple
      searchTherapeuticAction = this.therapeuticAction

      var result = this.products

      if (searchActivePrinciple != '') {
        result = result.filter(product => product.active_principle.toString().toLowerCase().includes(searchActivePrinciple.toString().toLowerCase())); // aca no filtra
      } 

      if (searchTherapeuticAction != '') {
        result = result.filter(product => product.therapeutic_line.toString().toLowerCase().includes(searchTherapeuticAction.toString().toLowerCase())); // aca no filtra
      }

      this.refreshSelects(result)
      this.filteredProducts = result
    },

    refreshSelects(arrayPrincipal) {
      // Llenar select Principio Activo
      let array = groupBy(arrayPrincipal, 'active_principle')
      let property = Object.keys(array)
      this.selectActivePrinciple = property

      // Llenar select job_function
      array = groupBy(arrayPrincipal, 'therapeutic_line')
      property = Object.keys(array)
      this.selectTherapeuticAction = property

    },

    cleanFilters: function() {
      this.filteredProducts = this.products
      this.fillSelects(this.products)
      this.activePrinciple = ''
      this.therapeuticAction = ''
    }

  },
  computed: {
    
    //

  }
});

function groupBy(objectArray, property) {
  return objectArray.reduce((acc, obj) => {
    const key = obj[property];
    if (!acc[key]) {
       acc[key] = [];
    }
    // Add object to list for given key's value
    return acc;
  }, {});
}