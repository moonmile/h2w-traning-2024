<template>
    <div>
        <h1>Product List : {{  slug }}</h1>
        <ul>
            <li v-for="product in products" :key="product.id">
                {{ product.name }} - {{ product.price }}
                <button class="btn btn-primary" @click="clickCart(product)">カート</button>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { useCartStore } from '../stores/Cart';
import type { Product } from '../types/product'
import type { Category } from '../types/category'
   
const router = useRouter();
const slug = ref(router.currentRoute.value.params.slug); 

const products = ref<Product[]>([]);

const cartStore = useCartStore();


async function onload() {
    const url = `http://localhost:8000/api/categories/${slug.value}/products`;
    console.log( url )
    const response = await axios.get(url);
    products.value = response.data.data[0].products; 
}
onMounted(onload) ;


/**
 * Handles the click event on the cart.
 */
function clickCart(item : Product) {
    console.log('clickCart')
    cartStore.addProduct(item);

    alert('clickCart ' + item.name)

    console.log('カートの中身')
    for (const item of cartStore.products) {
        console.log(item.name)
    }
}


</script>

<style scoped>
h1 {
    color: blue;
}
</style>