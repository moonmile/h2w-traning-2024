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
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const products = ref([
    { id: 1, slug: 'slug 1', name: 'Category 1' , description: 'Description 1', image: 'Image 1', sortid: 1, price: 'Price 1', display: false ,created_at: 'created_at 1', updated_at: 'updated_at 1',is_delete: false},
    { id: 2, slug: 'slug 2', name: 'Category 2' , description: 'Description 2', image: 'Image 2', sortid: 2, price: 'Price 2', display: false ,created_at: 'created_at 2', updated_at: 'updated_at 2',is_delete: false},
    { id: 3, slug: 'slug 3', name: 'Category 3' , description: 'Description 3', image: 'Image 3', sortid: 3, price: 'Price 3', display: false ,created_at: 'created_at 3', updated_at: 'updated_at 3',is_delete: false},
    { id: 4, slug: 'slug 4', name: 'Category 4' , description: 'Description 4', image: 'Image 4', sortid: 4, price: 'Price 4', display: false ,created_at: 'created_at 4', updated_at: 'updated_at 4',is_delete: false},
    { id: 5, slug: 'slug 5', name: 'Category 5' , description: 'Description 5', image: 'Image 5', sortid: 5, price: 'Price 5', display: false ,created_at: 'created_at 5', updated_at: 'updated_at 5',is_delete: false},
    { id: 6, slug: 'slug 6', name: 'Category 6' , description: 'Description 6', image: 'Image 6', sortid: 6, price: 'Price 6', display: false ,created_at: 'created_at 6', updated_at: 'updated_at 6',is_delete: false},
]);

async function onload() {
    const url = 'http://localhost:8000/api/products';
    const response = await axios.get(url);
    products.value = response.data.data ;
}
onMounted(() => {
    onload();
})
;


function onadd() {
    console.log('onadd');
}
function onedit(item) {
    console.log('onedit ' + item.name);
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