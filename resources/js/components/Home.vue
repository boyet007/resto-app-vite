<template>
    <Header />
    <h1>Good Morning {{ name }}</h1>
</template>

<script>
import Header from './Header.vue';
export default {
    name: 'Home',
    data() {
        return {
            name: ''
        }
    },
    components: {
        Header
    },
    mounted() {
        let user = localStorage.getItem('user-info');
        this.name = JSON.parse(user).name;
        if (!user) {
            this.$router.push({ name: 'SignUp' });
        }
    }
}
</script>

<style>

</style>