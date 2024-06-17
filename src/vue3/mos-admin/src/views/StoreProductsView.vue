<template>
    <div class="store-product-item">
        <h1>{{ store.name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();

interface Product {
    id: number;
    slug: string;
    name: string;
    description: string;
    image: string;
    sortid: number;
    price: string;
    display: boolean;
    created_at: string;
    updated_at: string;
    is_delete: boolean;
    imageurl: string;
}
interface Store {
    id: number;
    name: string;
    address: string;   
}

const products = ref([
    { id: 1, name: 'product 1' },
    // Add more products here
]);
const store = ref<Store>({
    id: 0,
    name: '',
    address: '',
});

async function onload() {

    const url = 'http://localhost:8000/api/stores/1/products';
    const response = await axios.get(url);
    store.value = response.data.data ;

    const items = response.data.data.products;
    console.log(items);
    products.value = [];
    for ( const item of items ) {
        console.log(item.product);
        products.value.push(item.product);
    }
}
onMounted(onload) ;

</script>

<style scoped>
.store-product-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.product-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    margin-bottom: 10px;
}

.product-name {
    font-size: 18px;
    margin-bottom: 5px;
}

.product-price {
    font-size: 16px;
    margin-bottom: 10px;
}

.add-to-cart-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}
</style>