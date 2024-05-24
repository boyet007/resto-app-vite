<template>
    <img class="logo" src="../assets/resto-logo.jpg" />
    <h1>Sign Up</h1>
    <div class="register">
        <input type="text" v-model="name" placeholder="Enter Name" name="" id="name" />
        <input type="text" v-model="email" placeholder="Enter Email" name="" id="email" />
        <input type="password" v-model="password" placeholder="Enter Password" name="password" id="" />
        <button @click="signUp">Sign Up</button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "SignUp",
    data() {
        return {
            name: 'Test User', 
            email: 'test2@gmail.com', 
            password: 'Wynne!324'
        }
    },
    methods: {
        async signUp() {
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

<style>
.logo {
    width: 100px;
    border-radius: 30px;
}

.register input {
    display: block;
    width: 300px;
    height: 40px;
    padding-left: 20px;
    margin-bottom: 12px;
    border: 1px solid black;
    margin-left: auto;
    margin-right: auto;
}

.register button {
    cursor: pointer;
    color: white;
    background: skyblue;
    border: 1px solid skyblue;
    height: 40px;
    width: 320px;
    font-weight: bold;
}
</style>
