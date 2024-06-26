<template>
    <div>
        <h1>Login</h1>
        <form @submit="login">
            <label for="username">Username:</label>
            <input type="text" id="username" v-model="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" v-model="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script setup lang="ts">

import { ref } from 'vue';
const username = ref('');
const password = ref('');

function login() {
    // Perform login logic here
    // You can use username.value and password.value to access the entered values
}
</script>

<style scoped>
/* Add your custom styles here */
</style>