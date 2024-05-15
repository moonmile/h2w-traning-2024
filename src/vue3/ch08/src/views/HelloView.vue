<template>
    <div>
        <h1>Hello, World!</h1>
        <p>Welcome to the HelloView component.</p>

        <hr />
        <h2>コンポーネントがひとつ</h2>
        <OneProduct :id="item.id" :name="item.name" :description="item.description" />

        <hr />
        <h2>ひとつのコンポーネントに v-model で送信する場合</h2>
        <OneProductModel v-model="item" />

        <hr />
        <h2>リストを表示する</h2>
        <ul>
            <li v-for="item in items" :key="item.id">
                <OneProductModel v-bind:model-value="item" />
                <!-- v-model では書き込みができないので、v-bind:model-value を使う -->
                <!-- <OneProductModel v-model="item" /> -->
            </li>
        </ul>

        <hr />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import OneProduct from '@/components/OneProduct.vue'
import OneProductModel from '@/components/OneProductModel.vue';
const items = ref([
    { id: 1, name: "ハンバーガー", description: 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', },
    { id: 2, name: "チーズハンバーガー", description: 'YYYYYYYYYYYYYYYYYYYYY', },
    { id: 3, name: "フィッシュハンバーガー", description: 'ZZZZZZZZZZZZZZZZZZ', },
]);
const item = ref(items.value[0]);

</script>

<style scoped>
h1 {
    color: blue;
}
p {
    font-size: 18px;
}
</style>