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
        <button v-on:click="oncreate(categories)" type="button" class="btn btn-success">新規作成</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>カテゴリ名</th>
                    <th>説明</th>
                    <th>写真</th>
                    <th>価格</th>
                    <th>表示</th>
                    <th>有効</th>
                    <th>　操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.id}} </td>
                    <td>{{ category.title }}</td>
                    <td>{{  category.description }}</td>
                    <td>{{  category.image }}</td>
                    <td>{{ category.price + '円' }}</td>
                    <td><input type="checkbox"></td>
                    <td><input type="checkbox"></td>
                    <td>
                        <button v-on:click="onedit(category)" type="button" class="btn btn-primary">編集</button>
                        <button v-on:click="ondelete(category)" type="button" class="btn btn-danger">削除</button>
                        <button v-on:click="onUp(category)" type="button" class="btn btn-primary">上へ</button>
                        <button v-on:click="onDown(category)" type="button" class="btn btn-primary">下へ</button>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
    <button class="btn btn-ptimary" @click="onload">一覧を取得</button>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { on } from 'events';

const router = useRouter();

const categories = ref([
    { id: 1, slug: 'slug 1', title: 'Category 1' , description: 'Description 1', image: 'Image 1', sortid: 1, price: 1, display: false ,created_at: 'created_at 1', updated_at: 'updated_at 1',is_delete: false},
    { id: 2, slug: 'slug 2', title: 'Category 2' , description: 'Description 2', image: 'Image 2', sortid: 2, price: 1, display: false ,created_at: 'created_at 2', updated_at: 'updated_at 2',is_delete: false},
    { id: 3, slug: 'slug 3', title: 'Category 3' , description: 'Description 3', image: 'Image 3', sortid: 3, price: 1, display: false ,created_at: 'created_at 3', updated_at: 'updated_at 3',is_delete: false},
    { id: 4, slug: 'slug 4', title: 'Category 4' , description: 'Description 4', image: 'Image 4', sortid: 4, price: 1, display: false ,created_at: 'created_at 4', updated_at: 'updated_at 4',is_delete: false},
    { id: 5, slug: 'slug 5', title: 'Category 5' , description: 'Description 5', image: 'Image 5', sortid: 5, price: 1, display: false ,created_at: 'created_at 5', updated_at: 'updated_at 5',is_delete: false},
    { id: 6, slug: 'slug 6', title: 'Category 6' , description: 'Description 6', image: 'Image 6', sortid: 6, price: 1, display: false ,created_at: 'created_at 6', updated_at: 'updated_at 6',is_delete: false},
]);

async function onload() {
    const url = "http://localhost:8000/api/categories";
    const response = await axios.get(url);
    categories.value = response.data.data;
}
onMounted(onload);



function onedit(item) {
    console.log('onedit' + item.title);
    // ルーティング
    router.push({ name: 'categories-item', params: { id: item.id } });
};

// 削除ボタン
function ondelete(item) {
    console.log('ondelete' + item.title);
};

// 上へボタン
function onUp(category: Category) {
    const index = categories.value.findIndex((c) => c.id === category.id);
    if (index > 0) {
        const temp = categories.value[index];
        categories.value[index] = categories.value[index - 1];
        categories.value[index - 1] = temp;
    }
}

/*
function onUp(category: Category) {
    console.log('onUp' + categories.title);
};
*/

// 下へボタン
function onDown(category: Category) {
    const index = categories.value.findIndex((c) => c.id === category.id);
    if (index < categories.value.length - 1) {
        const temp = categories.value[index];
        categories.value[index] = categories.value[index + 1];
        categories.value[index + 1] = temp;
    }
}


/*
function onDown(category: Category) {
    console.log('onDown' + categories.title);
};
*/

// 新規作成ボタン
function oncreate() {
    console.log('oncreate');
    router.push({ name: 'categories-item', params: { id: 0 } });
};


/*
const router = useRouter();
function editCategory() {
    router.push({ name: 'categories-item', params: { id: } });
};
*/

// 削除ボタンを押すと、その行を非表示にする


/*

function deleteCategory(category: Category) {
    category.hidden = true;
};


// 上へボタンを押すと、上に移動する
function moveUp(category: Category) {
    const index = categories.value.findIndex((c) => c.id === category.id);
    if (index > 0) {
        const temp = categories.value[index];
        categories.value[index] = categories.value[index - 1];
        categories.value[index - 1] = temp;
    }
}


// 下へボタンを押すと、下に移動する
function moveDown(category: Category) {
    const index = categories.value.findIndex((c) => c.id === category.id);
    if (index < categories.value.length - 1) {
        const temp = categories.value[index];
        categories.value[index] = categories.value[index + 1];
        categories.value[index + 1] = temp;
    }
}

*/
</script>

<style scoped>
/* Add your component styles here */
h1 {
    color: white;
    background-color: green;
    padding: 20px;
    font-size: 1.5em;
}

table {
    width: 100%;
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

select {
    width: 150px;
    height: 30px;
    margin: 15px;
    text-align: center;
    position: relative;
    left: 8%;
}

.btn-success {
    margin-right: 10px;
    position: relative;
    left: 57%;
}



</style>