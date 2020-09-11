@php
    $count = $velocityMetaData ? $velocityMetaData->featured_product_count : 4;
@endphp

<graphics-section></graphics-section>

@push('scripts')
    <script type="text/x-template" id="graphics-section-template">
    <section class="section-content section-margin">
        <div class="container">
            <shimmer-component v-if="isLoading && !isMobileView"></shimmer-component>

            <template v-else-if="graphicsSectionProducts.length > 0">
             <header class="section-heading">
                    <div class="float-right">
                
                        <a href="#">See all</a>
                    </div>
		
		        	<h5 class="section-title ">Graphics Design and Print </h5>
            </header><!-- sect-heading -->
            
		 
        <div class="row">
			<div class="col-lg-3 col-sm-6" :key="index" v-for="(product, index) in graphicsSectionProducts">
				<div :href="`${baseUrl}/${product.slug}`" class="card card-product-grid  center" style="width:100%">
				  <a :title="product.name" :href="`${baseUrl}/${product.slug}`">
                    <img class="img-fluid"  :src="product.image"></a>
					<div class="card-body ">
						<p class="card-text mb-3">@{{product.name}}</p>
						<a :href="`${baseUrl}/${product.slug}`" class="btn btn-primary "> BOOK NOW </a>
					
					</div>
				</div>
			</div> <!-- col.// -->
       </div>           
                 
            </template>

        </div>
    </div> 
    </script>

    <script type="text/javascript">
        (() => {
            Vue.component('graphics-section', {
                'template': '#graphics-section-template',
                data: function () {
                    return {
                        'list': false,
                        'isLoading': true,
                        'graphicsSectionProducts': [],
                        'isMobileView': this.$root.isMobile(),
                    }
                },

                mounted: function () {
                    this.getGraphicsSectionProducts();
                },

                methods: {
                    'getGraphicsSectionProducts': function () {
                        this.$http.get(`${this.baseUrl}/category-details?category-slug=graphics-section-products&count={{ $count }}`)
                        .then(response => {
                            if (response.data.status)
                                this.graphicsSectionProducts = response.data.products;

                            this.isLoading = false;
                        })
                        .catch(error => {
                            this.isLoading = false; 
                            console.log(this.__('error.something_went_wrong'));
                        })
                    }
                }
            })
        })()
    </script>
@endpush
