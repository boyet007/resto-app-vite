<template>
    <div class="nav">
        <a href="#">Home</a>
        <a href="#">Add Restaurant</a>
        <a href="#">Update Restaurant</a>
        <a href="#" @click="logout">Logout</a>
    </div>
</template>

<script>
import axiosInstance from 'axios';
export default {
    name: 'Header',
    methods: {
        async logout() {
            const result = await axiosInstance.post('/logout', {
                name: this.name,
                email: this.email,
                password: this.password
            });
            if (result.status === 200) {
                    localStorage.clear();
            this.$router.push({ name: 'Login'});
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