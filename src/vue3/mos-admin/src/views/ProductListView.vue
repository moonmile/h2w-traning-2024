<template>
    <div>
        <h1>Product List</h1>
        <button class="btn btn-primary" @click="onadd">新規作成</button>
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
                    <td>
                        <button class="btn btn-primary" @click="onedit(product)">編集</button>        
                        <button class="btn btn-danger" @click="ondelete(product)">削除</button>        
                        <button class="btn btn-secondary" @click="onedit(product)">上へ</button>        
                        <button class="btn btn-secondary" @click="onedit(product)">下へ</button>        
                    </td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-primary" @click="onload">読み込み</button>   
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();

const products = ref([
    { id: 1, name: 'product 1' },
    // Add more products here
]);

async function onload() {
    const url = 'http://localhost:8000/api/products';
    const response = await axios.get(url);
    products.value = response.data.data ;
}
onMounted(onload) ;


function onadd() {
    console.log('onadd');
}
function onedit(item) {
    console.log('onedit ' + item.title);
    // ルーティング
    router.push({ name: 'product-item', params: { id: item.id } });
}
function ondelete(item) {
    console.log('ondelete');
}
function onup(item) {
    console.log('onup');
}
function ondown(item) {
    console.log('ondown');
}



</script>

<style>
/* Add your custom styles here */
.btn {
    margin-right:5px;
    margin-left: 5px;
}
</style>