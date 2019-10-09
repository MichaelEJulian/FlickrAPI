<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
  data() {
    return {
      results: [],
      show: false
    };
  },

  created() {
    this.fetchFlicker();
  },

  methods: {
    fetchFlicker() {
       axios
      .get('https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=95defdc48ccdfa26ddb3ac02d8be8ba0&tags=cats&per_page=10&page=1&format=json&nojsoncallback=1')
      .then(response => (this.info = response))
    },
    
  }
};
</script>
