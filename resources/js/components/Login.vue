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
import axios from 'axios';
export default {
    name: "SignUp",
    data() {
        return {
            email: 'test2@gmail.com', 
            password: 'Wynne!324'
        }
    },
    methods: {
        async login() {
            console.log('sign up')
            const result = await axios.post('http://localhost:8000/api/auth/signup?XDEBUG_SESSION_START=VSCODE', {
                name: this.name,
                email: this.email,
                password: this.password
            });
            console.warn(result);
            if (result.status === 201) {
                alert('Signup done.');
                localStorage.setItem('user-info', JSON.stringify(result.data.user));
                this.$router.push({ name: 'Home' });
            }
        },
    },
    mounted() {
        let user = localStorage.getItem('user-info');
        if (user) {
            console.log(user)
            this.$router.push({ name: 'Home' });
        }
    }
};
</script>