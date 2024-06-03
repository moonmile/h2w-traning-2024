<template>
    <div>
        <h1>ハンバーガー注文 セットメニュー一覧</h1>

        <select name="StoreDesignation">
            <option value="store0">店舗指定</option>
            <option value="store1">○○店</option>
            <option value="store2">△△店</option>
            <option value="store3">◇◇店</option>
            <!-- 他のオプションも追加 -->
        </select>
        <button v-on:click="onadd()" type="button" class="btn btn-success">新規作成</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>セットメニュー名</th>
                    <th>説明</th>
                    <th>セット商品</th>
                    <th>写真</th>
                    <th>価格</th>
                    <th>表示</th>
                    <th>有効</th>
                    <th>　操作</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="setmenu in setmenus" :key="setmenu.id">
                    <td>{{ setmenu.id}} </td>
                    <td>{{ setmenu.name }}</td>
                    <td>{{  setmenu.description }}</td>
                    <td>セット商品</td>
                    <td>{{  setmenu.image }}</td>
                    <td>{{ setmenu.price + '円' }}</td>
                    <td><input type="checkbox"></td>
                    <td><input type="checkbox"></td>
                    <td>
                        <button v-on:click="onedit(setmenu)" type="button" class="btn btn-primary">編集</button>
                        <button v-on:click="ondelete(setmenu)" type="button" class="btn btn-danger">削除</button>
                        <button v-on:click="onUp(setmenu)" type="button" class="btn btn-primary">上へ</button>
                        <button v-on:click="onDown(setmenu)" type="button" class="btn btn-primary">下へ</button>
                    </td>
                </tr>
            </tbody>
            
        </table>
    </div>
    <button class="btn btn-primary" @click="onload">一覧を取得</button>
</template>


<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();

const setmenus = ref([
    { id: 1, slug: 'slug 1', name: 'setmenu 1' , description: 'Description 1', image: 'Image 1', sortid: 1, price: 'Price 1', display: false ,created_at: 'created_at 1', updated_at: 'updated_at 1',is_delete: false, hidden: false},
]);

async function onload() {
    console.log('onload');
    const url = 'http://localhost:8000/api/products';
    const response = await axios.get(url);
    setmenus.value = response.data.data.sort((a, b) => a.sortid - b.sortid);
}
onMounted(onload) ;

// 新規作成ボタン
function onadd() {
    console.log('onadd');
    // ルーティング
    router.push({ name: 'setmenu-item', params: { id: 0 } });
}

// 編集ボタン
function onedit(item) {
    console.log('onedit ' + item.name);
    // ルーティング
    router.push({ name: 'setmenu-item', params: { id: item.id } });
}

// 削除ボタン
function ondelete(item) {
    console.log('ondelete' + item.name);
    // 削除確認
    if (confirm('削除しますか？')) {
        // 削除処理
        deleteProduct(item);
    }
};
// 削除処理 DBから削除
async function deleteProduct(item) {
    try {
        const url = `http://localhost:8000/api/products/${item.id}`;
        await axios.delete(url);
        setmenus.value = setmenus.value.filter(setmenu => setmenu.id !== item.id);
    } catch (error) {
        console.error(error);
    }
};



// 上へボタンを押したら一つ上に移動する（順番はsortidで判別する
function onUp(item) {
    console.log('onUp ' + item.name);
    const index = setmenus.value.findIndex((p) => p.sortid === item.sortid);
    if (index > 0) {
        const temp = setmenus.value[index - 1];
        setmenus.value[index - 1] = setmenus.value[index];
        setmenus.value[index] = temp;
    }
}

// 下へボタンを押したら一つ下に移動する。（順番はsortidで判別する
function onDown(item) {
    console.log('onDown ' + item.name);
    const index = setmenus.value.findIndex((p) => p.sortid === item.sortid);
    if (index < setmenus.value.length - 1) {
        const temp = setmenus.value[index + 1];
        setmenus.value[index + 1] = setmenus.value[index];
        setmenus.value[index] = temp;
    }
}


</script>

<style scoped>
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