<template>
    <div class="nav">
        <router-link to="/">Home</router-link>
        <router-link to="/add">Add Restaurant</router-link>
        <a @click="logout">Logout</a>
    </div>
</template>

<script>
import axiosInstance from '@/axios.js';
export default {
    name: 'Header',
    methods: {
        async logout() {
            try {
                await axiosInstance.post('/api/auth/logout');
                localStorage.clear();
                this.$router.push({ name: 'Login'});
            } catch (error) {
                console.error('Ada error ketika logout', error);
            }
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