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

const router = useRouter();
const slug = ref(router.currentRoute.value.params.slug);

const products = ref([
                { id: 1, name: 'Product 1', price: 10 },
                { id: 2, name: 'Product 2', price: 20 },
                { id: 3, name: 'Product 3', price: 30 },
            ]);

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
function clickCart(item) {
    console.log('clickCart')
    cartStore.addProcuct(item);

    alert('clickCart ' + item.name)
}


</script>

<style scoped>
h1 {
    color: blue;
}
</style>