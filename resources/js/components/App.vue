<template>
    <div class="container-fluid">
        <navbar></navbar>
       <h1>App Vue Component</h1>
    </div>
</template>

<script>
    import navbar from './navigation/Navbar.vue'

    export default {
        components: {
            navbar
        }
    };
</script>
