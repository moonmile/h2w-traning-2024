<template>
    <div>
        <h1>Category List</h1>
        <button class="btn btn-primary" @click="onadd">新規作成</button>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリー名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.title }}</td>
                    <td>
                        <button class="btn btn-primary" @click="onedit(category)">編集</button>        
                        <button class="btn btn-danger" @click="ondelete(category)">削除</button>        
                        <button class="btn btn-secondary" @click="onedit(category)">上へ</button>        
                        <button class="btn btn-secondary" @click="onedit(category)">下へ</button>        
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

const categories = ref([
    { id: 1, title: 'Category 1' },
    // Add more categories here
]);

async function onload() {
    const url = 'http://localhost:8000/api/categories';
    const response = await axios.get(url);
    categories.value = response.data.data ;
}
onMounted(onload) ;


function onadd() {
    console.log('onadd');
}
function onedit(item) {
    console.log('onedit ' + item.title);
    // ルーティング
    router.push({ name: 'category-item', params: { id: item.id } });
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