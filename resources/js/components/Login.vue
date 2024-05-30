<template>
    <img class="logo" src="../assets/resto-logo.jpg" />
    <h1>Login</h1>
    <div class="login">
        <input type="text" v-model="email" placeholder="Enter Email" name="" id="email" />
        <input type="password" v-model="password" placeholder="Enter Password" name="password" id="" />
        <button @click="login">Login</button>
        <p>
            <router-link to="/sign-up">Sign Up</router-link>
        </p>
    </div>
</template>

<script>
import axiosDistance from '@/axios.js';
export default {
    name: "Login",
    data() {
        return {
            email: 'test2@gmail.com', 
            password: 'Wynne!324'
        }
    },
    methods: {
        async login() {
            const result = await axiosDistance.post('/api/auth/login', {
                email: this.email,
                password: this.password
            });
            if (result.status === 200 && result.data.user.name) {
                localStorage.setItem('user-info', JSON.stringify(result.data.user));
                localStorage.setItem('token', result.data.token);
                this.$router.push({ name: 'Home' });
            }
        },
    },
    mounted() {
        let user = localStorage.getItem('user-info');
        if (user) {
            this.$router.push({ name: 'Home' });
        }
    }
};
</script>