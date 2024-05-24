<template>
  <router-view></router-view>
</template>

<script>
import SignUp from './components/SignUp.vue'

export default {
  name: 'App',

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.logo {
  width: 100px;
  border-radius: 30px;
}

.register input, .login input {
  display: block;
  width: 300px;
  height: 40px;
  padding-left: 20px;
  margin-bottom: 12px;
  border: 1px solid black;
  margin-left: auto;
  margin-right: auto;
}

.register button, .login button {
  cursor: pointer;
  color: white;
  background: skyblue;
  border: 1px solid skyblue;
  height: 40px;
  width: 320px;
  font-weight: bold;
}
</style>