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
            name: '', 
            email: '', 
            password: ''
        }
    },
    methods: {
        async signUp() {
            console.log('sign up')
            let result = axios.post('http://localhost:8000/users', {
                name: this.name,
                email: this.email,
                password: this.password
            });
            console.warn(result);
            
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
