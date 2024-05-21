<template>
    <div>
        <h1>ハンバーガー注文 商品一覧</h1>

        <select name="StoreDesignation">
            <option value="store0">店舗指定</option>
            <option value="store1">○○店</option>
            <option value="store2">△△店</option>
            <option value="store3">◇◇店</option>
            <!-- 他のオプションも追加 -->
        </select>

        <button class="btn btn-success" @click="onadd">新規作成</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリ名</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>写真</th>
                    <th>価格</th>
                    <th>表示</th>
                    <th>有効</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.slug }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.image }}</td>
                    <td>{{ product.price + '円' }}</td>
                    <td><input type="checkbox"></td>
                    <td><input type="checkbox"></td>
                    <td>
                        <button class="btn btn-primary" @click="onedit(product)">編集</button>        
                        <button class="btn btn-danger" @click="ondelete(product)">削除</button>        
                        <button class="btn btn-secondary" @click="onup(product)">上へ</button>        
                        <button class="btn btn-secondary" @click="ondown(product)">下へ</button>        
                    </td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-primary" @click="onload">一覧を取得</button>   
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const products = ref([
    { id: 1, slug: 'slug 1', name: 'Category 1' , description: 'Description 1', image: 'Image 1', sortid: 1, price: 'Price 1', display: false ,created_at: 'created_at 1', updated_at: 'updated_at 1',is_delete: false},
]);

async function onload() {
    const url = 'http://localhost:8000/api/products';
    const response = await axios.get(url);
    products.value = response.data.data ;
}
onMounted(onload);


// 新規作成ボタン
function onadd() {
    console.log('onadd');
    router.push({ name: 'product-item', params: { id: 0 } });
}

// 編集ボタン
function onedit(item) {
    console.log('onedit ' + item.name);
    // ルーティング
    router.push({ name: 'product-item', params: { id: item.id } });
}

// 削除ボタン
function ondelete(item) {
    console.log('ondelete');
}

// 上へボタン
function onup(item) {
    console.log('onup');
}

// 下へボタン
function ondown(item) {
    console.log('ondown');
}


</script>

<style>
/* Add your custom styles here */

h1 {
    color: white;
    background-color: green;
    padding: 20px;
    font-size: 1.5em;
}

th {
    text-align: left;
}

.btn {
    margin-right: 5px;
    margin-left: 5px;
}
.btn-danger {
    margin-right: 15px;
}
.btn-success {
    margin-right: 10px;
    position: relative;
    left: 57%;
}

select {
    width: 150px;
    height: 30px;
    margin: 15px;
    text-align: center;
    position: relative;
    left: 8%;
}

</style>