<template>
    <h2>カートの中身</h2>
    <p v-show="!items.length"><i>カートに商品は入っていません。</i></p>
    <ul>
        <li v-for="product in items" :key="product.id">
            <hr>
            {{ product.name }} - ¥{{ product.price }}
            <!--数量-->
            {{ product.quantity }}個
            <br>
            <!--小計-->
            ¥{{ product.price * product.quantity }}
        </li>
    </ul>
    <p>合計: ¥{{ total }}</p>
    <hr>
</template>

<script setup lang="ts">
import { useCartStore } from '../stores/Cart';
import { storeToRefs } from 'pinia';

const { items, total } = storeToRefs(useCartStore());

// 注文確定
function clickOrder() {
    alert('注文確定しました。');
}

</script>

<style scoped>
</style>
