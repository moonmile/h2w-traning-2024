<template>
    <div class="login-view">
        <h1>Login</h1>
        <div>
            <input type="text" v-model="username" placeholder="Username" required>
            <input type="password" v-model="password" placeholder="Password" required>
            <button @click="login">Login</button>
        </div>
    </div>
</template>

<script setup lang="ts">

import { ref } from 'vue';
import axios from 'axios';

const username = ref('');
const password = ref('');

async function login() {
    // Perform login logic here
    // You can use this.username and this.password to access the entered values

    console.log('Login button clicked');
    const url = 'http://localhost:8000/api/login';
    const data = {
        username: username.value,
        password: password.value
    };
    const response = await axios.post(url, data) ;
    const user = response.data.user ;
    console.log(user);
    alert( user.name + ' さん、こんにちは！');
}
</script>

<style scoped>
.login-view {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

h1 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

input[type="text"],
input[type="password"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>