<template>
    <div class="nav">
        <a href="#">Home</a>
        <a href="#">Add Restaurant</a>
        <a href="#">Update Restaurant</a>
        <a href="#" @click="logout">Logout</a>
    </div>
</template>

<script>
export default {
    name: 'Header',
    methods: {
        logout() {
            localStorage.clear();
            this.$router.push({ name: 'Login'});
        }
    }
}
</script>

<style>
.nav {
    background-color: #333;
    overflow: hidden;
}

.nav a {
    text-align: center;
    color: wheat;
    float: left;
    text-decoration: none;
    padding: 11px 16px;
    margin-right: 5px;
}

.nav  a:hover {
    background: #ddd;
    color:#333;
}
</style>