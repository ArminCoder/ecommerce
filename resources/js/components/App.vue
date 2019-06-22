<template>
    <div class="container-fluid">
        <navbar></navbar>
        <slider></slider>
    </div>
</template>

<script>
    import navbar from './navigation/Navbar.vue'
    import slider from './helpers/Slider.vue'

    export default {
        components: {
            navbar,
            slider
        }
    };
</script>
