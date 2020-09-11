<template>
    <div
        class="col-12 lg-card-container list-card product-card row"
        v-if="list"
    >
        <div class="product-image">
            <a :title="product.name" :href="`${baseUrl}/${product.slug}`">
                <img
                    :src="product.image"
                    :onerror="
                        `this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`
                    "
                />

                <product-quick-view-btn
                    :quick-view-details="product"
                ></product-quick-view-btn>
            </a>
        </div>

        <div class="product-information">
            <div>
                <div class="product-name">
                    <a
                        :href="`${baseUrl}/${product.slug}`"
                        :title="product.name"
                        class="unset"
                    >
                        <span class="fs16">{{ product.name }}</span>
                    </a>
                </div>

                <div class="product-price" v-html="product.priceHTML"></div>

                <div
                    class="product-rating"
                    v-if="product.totalReviews && product.totalReviews > 0"
                >
                    <star-ratings :ratings="product.avgRating"></star-ratings>
                    <span>{{
                        __("products.reviews-count", {
                            totalReviews: product.totalReviews
                        })
                    }}</span>
                </div>

                <div class="product-rating" v-else>
                    <span class="fs14" v-text="product.firstReviewText"></span>
                </div>

                <vnode-injector
                    :nodes="getDynamicHTML(product.addToCartHtml)"
                ></vnode-injector>
            </div>
        </div>
    </div>

    <div class="card card-product-grid center" style="width:100%" v-else>
        <a :href="`${baseUrl}/${product.slug}`" :title="product.name">
            <img
                loading="lazy"
                :alt="product.name"
                :src="product.image"
                :data-src="product.image"
                class="img-fluid card-img-top lzy_img"
                :onerror="
                    `this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`
                "
            />
            <!-- :src="`${$root.baseUrl}/vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png`" /> -->

            <product-quick-view-btn
                :quick-view-details="product"
            ></product-quick-view-btn>
        </a>

        <div class="card-body">
            <a :title="product.name" :href="`${baseUrl}/${product.slug}`">
                <p class="card-text mb-3">{{ product.name }}</p>
            </a>

            <a
                class="btn btn-primary"
                :title="product.name"
                :href="`${baseUrl}/${product.slug}`"
            >
                BOOK NOW
            </a>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    props: ["list", "product"],

    data: function() {
        return {
            addToCart: 0,
            addToCartHtml: ""
        };
    }
};
</script>
