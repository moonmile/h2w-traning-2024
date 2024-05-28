<template>
    <div>
        <h1>Category Page</h1>
        <ul>
            <li v-for="category in categories" :key="category.id">
                {{ category.title }} {{ category.slug }}
                <RouterLink :to="{ name: 'product-list', params: { slug: category.slug  } }">{{ category.title }}</RouterLink>                
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';

const categories = ref([
]);


async function onload() {
    const url = 'http://localhost:8000/api/categories';
    const response = await axios.get(url);
    categories.value = response.data.data ;
}
onMounted(onload) ;

</script>

<style scoped>
/* Add your custom styles here */
</style>