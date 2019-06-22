<template>
    <div class="container-fluid">
        <navbar></navbar>
        <slider></slider>
        <products></products>

    </div>
</template>

<script>
    import navbar from './navigation/Navbar.vue'
    import slider from './helpers/Slider.vue'
    import products from './main/Products.vue'

    export default {
        components: {
            navbar,
            slider,
            products
        }
    };
</script>
