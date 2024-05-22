<template>
    <div>
        <h1>会員管理</h1>
        <p><router-link to="/">TOP</router-link> ＞ 会員リスト</p>
        <h2>会員リスト</h2>
        <p>
            新規登録は<router-link to="/member/add">ここ</router-link>から
        </p>
        <ul>
            <li>会員1</li>
            <li>会員2</li>
            <li>会員3</li>
            <li>会員4</li>
            <li>会員5</li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { RouterLink } from 'vue-router'

</script>

<style scoped>
/* Add your component's styles here */
</style>