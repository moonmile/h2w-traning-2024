<template>
    <div>
        <h1>Hello, World!</h1>
        <p>Welcome to the HelloView component.</p>

        <hr/>
        <h2>コンポーネントがひとつ</h2>
        <OneProduct
            :id="item.id" 
            :name="item.name" 
            :description="item.description"
            />

        <hr />
        <h2>ひとつのコンポーネントに v-model で送信する場合</h2>
        <OneProductModel v-model="item" v-on:edit="oneventEdit" />

        <hr />
        <h2>リストを表示する</h2>
        <ul>
            <li v-for="it in items" :key="it.id">
                <OneProductModel 
                    v-bind:model-value="it"
                    v-on:edit="oneventEdit"
                    /> 
                <!-- v-model では書き込みができないので、v-bind:model-value を使う -->
                <!-- <OneProductModel v-model="it" /> -->
            </li>
        </ul>

        <hr />

        <h2>子コンポーネントを使わない方式</h2>
        <ul>
            <li v-for="it in items" :key="it.id">
                <div>
                    {{ it.id }} {{ it.name }} {{ it.description }}
                    <button @click="onclickEdit(it)">編集</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import OneProduct from '@/components/OneProduct.vue'
import OneProductModel from '@/components/OneProductModel.vue';
import { convertToObject } from 'typescript';
const items = ref([
    { id: 1, name: "ハンバーガー", description: 'ハンバーガーの商品説明を書く。', },
    { id: 2, name: "チーズハンバーガー", description: 'YYYYYYYYYYYYYYYYYYYYY', },
    { id: 3, name: "フィッシュハンバーガー", description: 'ZZZZZZZZZZZZZZZZZZ', },
]);
const item = ref(items.value[0]);


function oneventEdit( item ) {
    console.log('in HelloView : oneventEdit');
    alert( 'oneventEdit ' + item.name );
}
function onclickEdit( item ) {
    console.log('in HelloView : onclickEdit');
    alert( 'onclickEdit ' + item.name );
}

</script>

<style scoped>
h1 {
    color: blue;
}
p {
    font-size: 18px;
}
</style>