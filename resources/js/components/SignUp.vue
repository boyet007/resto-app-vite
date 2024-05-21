<template>
    <img class="logo" src="../assets/resto-logo.jpg" />
    <h1>Sign Up</h1>
    <div class="register">
        <input type="text" placeholder="Enter Name" name="" id="" />
        <input type="text" placeholder="Enter Email" name="" id="" />
        <input type="password" placeholder="Enter Password" name="" id="" />
        <button>Sign Up</button>
    </div>
</template>

<script>
export default {
    name: "SignUp",
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
