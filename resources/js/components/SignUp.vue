<template>
    <img class="logo" src="../assets/resto-logo.jpg" />
    <h1>Sign Up</h1>
    <div class="register">
        <input type="text" v-model="name" placeholder="Enter Name" name="" id="name" />
        <input type="text" v-model="email" placeholder="Enter Email" name="" id="email" />
        <input type="password" v-model="password" placeholder="Enter Password" name="password" id="" />
        <button @click="signUp">Sign Up</button>
        <p>
            <router-link to="/login">Login</router-link>
        </p>
    </div>
</template>

<script>
import axiosInstance from '@/axios';
export default {
    name: "SignUp",
    data() {
        return {
            name: 'Mulyadi', 
            email: 'mulyadi@gmail.com', 
            password: 'Wynne!324'
        }
    },
    methods: {
        async signUp() {
            const result = await axiosInstance.post('/api/auth/signup', {
                name: this.name,
                email: this.email,
                password: this.password
            });
            console.warn(result);
            if (result.status === 201) {
                alert('Signup done.');
                localStorage.setItem('user-info', JSON.stringify(result.data.user));
                localStorage.setItem('token', JSON.stringify(result.data.token));
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


