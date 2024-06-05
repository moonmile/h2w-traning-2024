<template>
    <h2>カートの中身</h2>
    <p v-show="!products.length"><i>カートに商品は入っていません。</i></p>
    <ul>
        <li v-for="product in products" :key="product.id">
            {{ product.name }} - ¥{{ product.price.toLocaleString() }}
        </li>
    </ul>
</template>

<script setup lang="ts">
import { useCartStore } from '../stores/Cart';


const cartStore = useCartStore();
const products = cartStore.items;
</script>

<style scoped>
</style>