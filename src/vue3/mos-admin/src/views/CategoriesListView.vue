<template>
    <div>
        <h1>ハンバーガー注文 カテゴリー一覧</h1>
        <!--
        <select name="StoreDesignation">
            <option value="store0">店舗指定</option>
            <option value="store1">○○店</option>
            <option value="store2">△△店</option>
            <option value="store3">◇◇店</option>
             他のオプションも追加 
        </select>
        -->
        

        <table class="table">
            <thead>
                <tr>
                    <th class="widthId">ID</th>
                    <th class="widthTitle">カテゴリ名</th>
                    <!--
                    <th>説明</th>
                    <th>写真</th>
                    <th>価格</th>
                    <th>表示</th>
                    <th>有効</th>
                    -->
                    <th class="widthOperation">　　操作<button v-on:click="onadd()" type="button" class="btn btn-success">新規作成</button></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.id}} </td>
                    <td>{{ category.title }}</td>
                    <!--
                    <td>{{  category.description }}</td>
                    <td>{{  category.image }}</td>
                    <td>{{ category.price + '円' }}</td>
                    <td><input type="checkbox"></td>
                    <td><input type="checkbox"></td>
                    -->
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
    <button class="btn btn-primary" @click="onload">一覧を取得</button>
    <button class="btn btn-primary" @click="onRestore">復元</button>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const categories = ref([
    { id: 1, slug: 'slug 1', title: 'Category 1' , description: 'Description 1', image: 'Image 1', sortid: 1, price: 1, display: false ,created_at: 'created_at 1', updated_at: 'updated_at 1',is_delete: false},
]);

async function onload() {
    const url = "http://localhost:8000/api/categories";
    const response = await axios.get(url);
    categories.value = response.data.data.sort((a, b) => a.sortid - b.sortid);
}
onMounted(onload);

// 新規作成ボタン
function onadd() {
    console.log('onadd');
    router.push({ name: 'categories-item', params: { id: 0 } });
};

// 編集ボタン
function onedit(item) {
    console.log('onedit' + item.title);
    // ルーティング
    router.push({ name: 'categories-item', params: { id: item.id } });
};

// 削除ボタン
function ondelete(item) {
    console.log('ondelete' + item.title);
    // 削除確認
    if (confirm('削除しますか？')) {
        // 削除処理
        deleteCategory(item);
    }
};

// 削除処理 DBから削除
async function deleteCategory(item) {
    try {
        const url = `http://localhost:8000/api/categories/${item.id}`;
        await axios.delete(url);
        categories.value = categories.value.filter(category => category.id !== item.id);
    } catch (error) {
        console.error(error);
    }
};

// 復元ボタン
function onRestore(item) {
    console.log('onRestore' + item.title);
    // 復元処理
    restoreCategory(item);
};

// 復元処理
async function restoreCategory(item) {
    try {
        const url = `http://localhost:8000/api/categories/${item.id}/restore`;
        await axios.patch(url);
        categories.value = categories.value.map(category => {
            if (category.id === item.id) {
                category.is_delete = false;
            }
            return category;
        });
    } catch (error) {
        console.error(error);
    }
};



// 上へボタン
function onUp(item) {
    console.log('onUp' + item.title);
    const currentIndex = categories.value.findIndex(category => category.sortid === item.sortid);
    if (currentIndex > 0) {
        const temp = categories.value[currentIndex - 1];
        categories.value[currentIndex - 1] = categories.value[currentIndex];
        categories.value[currentIndex] = temp;
    }
};

// 下へボタン
function onDown(item) {
    console.log('onDown' + item.title);
    const currentIndex = categories.value.findIndex(category => category.sortid === item.sortid);
    if (currentIndex < categories.value.length - 1) {
        const temp = categories.value[currentIndex + 1];
        categories.value[currentIndex + 1] = categories.value[currentIndex];
        categories.value[currentIndex] = temp;
    }
};



// 削除ボタンを押すと、その行を非表示にする
/*
function deleteCategory(category: Category) {
    category.hidden = true;
};
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
    table-layout: fixed;
    width: 100%;
}
th {
    text-align: left;
}
.widthId {
    width: 5%;
}
.widthTitle {
    width: 67%;
}
.widthOperation {
    width: 28%;
}

.btn {
    margin-right: 6px;
    margin-left: 6px;
}
.btn-danger {
    margin-right: 17px;
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
    left: 3%;
}



</style>