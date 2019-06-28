<template>
    <div class="container-fluid">
        <navbar></navbar>
        <slider></slider>
        <div class="row">
            <div class="col-2 filterHolder mt-2">
                <filters></filters>
            </div>
            <div class="col-10 mt-2">
                <products></products>
            </div>
        </div>
        <productsFooter></productsFooter> 
    </div>
</template>

<script>
    import navbar from './navigation/Navbar.vue'
    import slider from './helpers/Slider.vue'
    import filters from './helpers/Filters.vue'
    import products from './main/Products.vue'
    import productsFooter from './footer/Footer.vue'
    import dashboard from './dashboard/Dashboard.vue'

    export default {
        components: {
            navbar,
            slider,
            products,
            productsFooter,
            dashboard,
            filters
        }
    };
</script>

<style scoped>
    .filterHolder {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-height: 80vh;
        overflow-y: scroll;
    }
</style>
