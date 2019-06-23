<template>
    <div class="container-fluid">
        <navbar></navbar>
        <slider></slider>
        <products></products>
        <productsFooter></productsFooter>
    </div>
</template>

<script>
    import navbar from './navigation/Navbar.vue'
    import slider from './helpers/Slider.vue'
    import products from './main/Products.vue'
    import productsFooter from './footer/Footer.vue'

    export default {
        components: {
            navbar,
            slider,
            products,
            productsFooter
        }
    };
</script>
