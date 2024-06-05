<template>
    <h2>カートの中身</h2>
    <p v-show="!items.length"><i>カートに商品は入っていません。</i></p>
    <ul>
        <li v-for="product in items" :key="product.id">
            {{ product.name }} - ¥{{ product.price }} x {{ product.quantity }}
        </li>
    </ul>
    <p>合計: ¥{{ total }}</p>
</template>

<script setup lang="ts">
import { useCartStore } from '../stores/Cart';
import { storeToRefs } from 'pinia';

const { items, total } = storeToRefs(useCartStore());


</script>

<style scoped>
</style>