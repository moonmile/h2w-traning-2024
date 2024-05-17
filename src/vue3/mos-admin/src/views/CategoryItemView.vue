<template>
    <div>
        <h1>Category Item View : {{ id }}</h1>

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" id="id" v-model="item.id" class="form-control">
        </div>  
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" id="slug" v-model="item.slug" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" v-model="item.title" class="form-control">
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

const router = useRouter();
const id = ref(router.currentRoute.value.params.id);
const item = ref({ id: 0, title: '' });

async function onload() {
    console.log('onload');
    var url = 'http://localhost:8000/api/categories/' + id.value;
    const response = await axios.get(url);
    item.value = response.data.data;
}

onMounted(onload);

function onupdate() {
    console.log('onupdate');
    var url = 'http://localhost:8000/api/categories/' + id.value;
    axios.put(url, item.value)
    .then(response => {
        console.log(response.data);
        router.push({ name: 'category' });
    });
}
function oncancel() {
    console.log('oncancel');
    router.push({ name: 'category' });
}


</script>

<style scoped>
/* Add your component styles here */
</style>