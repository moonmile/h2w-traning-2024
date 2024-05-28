<template>
    <div>
        <h1>Product Item View : {{ id }}</h1>

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" id="id" v-model="item.id" class="form-control">
        </div>  
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" id="slug" v-model="item.slug" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" id="title" v-model="item.name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" v-model="item.description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" id="image" v-model="item.image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sortid" class="form-label">Sort ID</label>
            <input type="number" id="sortid" v-model="item.sortid" class="form-control">
        </div>
        <div class="mb-3">
            <label for="display" class="form-label">Display</label>
            <input type="checkbox" id="display" v-model="item.display" class="form-check-input">
        </div>
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" id="created_at" v-model="item.created_at" class="form-control">
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input type="datetime-local" id="updated_at" v-model="item.updated_at" class="form-control">
        </div>
        <div class="mb-3">
            <label for="is_delete" class="form-label">Is Delete</label>
            <input type="checkbox" id="is_delete" v-model="item.is_delete" class="form-check-input">
        </div>
        <hr />

        <button @click="onupdate" class="btn btn-primary">更新</button>
        <button @click="oncancel" class="btn btn-secondary">キャンセル</button>
    </div>  
</template>

<script setup lang="ts">

import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

interface Product {
    id: number;
    slug: string;
    name: string;
    description: string;
    image: string;
    price: string;
    sortid: number;
    display: boolean;
    created_at: string;
    updated_at: string;
    is_delete: boolean;
}

const router = useRouter();
const id = ref(router.currentRoute.value.params.id);
// 初期値をいれておく
const item = ref<Product>({ 
    id: 0, 
    slug: '', 
    name: '',
    description: '', 
    image: '', 
    price: '',
    sortid: 0, 
    display: false, 
    created_at: '', 
    updated_at: '', 
    is_delete: false 
});

/**
 * Loads the product item data from the server.
 * @async
 * @function onload
 */
async function onload() {
    console.log('onload');
    var url = 'http://localhost:8000/api/products/' + id.value;
    const response = await axios.get(url);
    item.value = response.data.data;
    // 日時をフォーマット変換しておく
    item.value.created_at = formatDateTime(item.value.created_at);
    item.value.updated_at = formatDateTime(item.value.updated_at);
}

/// ロード時に実行
onMounted(onload);

/**
 * Updates the product item.
 * @async
 * @function onupdate
 * @returns {Promise<void>}
 */
async function onupdate() {
    console.log('onupdate');
    var url = 'http://localhost:8000/api/products/' + id.value;
    const response = await axios.put(url, item.value)
    router.push({ name: 'product-list' });
}

/**
 * Handles the cancel action.
 * Navigates back to the 'product' route.
 */
function oncancel() {
    console.log('oncancel');
    router.push({ name: 'product-list' });
}


/**
 * Formats a given datetime string into the desired format.
 * @param {string} datetimeStr - The datetime string to be formatted.
 * @returns {string} The formatted datetime string in the format "YYYY-MM-DDTHH:MM".
 */
function formatDateTime(datetimeStr: string) {
    // Dateオブジェクトを作成
    const date = new Date(datetimeStr);
    
    // 年、月、日、時、分を取得
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    
    // 目的の形式にフォーマット
    return `${year}-${month}-${day}T${hours}:${minutes}`;
}

/**
 * Converts a datetime string to ISO 8601 format.
 * @param {string} datetimeStr - The datetime string to convert.
 * @returns {string} The datetime string in ISO 8601 format.
 */
function convertToISO(datetimeStr: string) {
    // 入力形式を分割して、各部分を取得
    const [datePart, timePart] = datetimeStr.split('T');
    const [year, month, day] = datePart.split('-');
    const [hours, minutes] = timePart.split(':');
    
    // 新しい Date オブジェクトを作成
    const date = new Date(Date.UTC(year, month - 1, day, hours, minutes));
    
    // ISO 8601 形式の文字列に変換
    const isoString = date.toISOString();
    
    // 必要な部分を抽出して返す
    return isoString.replace('.000Z', '.000000Z');
}


</script>

<style scoped>
/* Add your component styles here */
</style>