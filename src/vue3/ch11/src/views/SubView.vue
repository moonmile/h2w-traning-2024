<template>
    <div>
        <h1>Sub View</h1>
        <p>現在のポイント: {{  point }}</p>
        <p>現在のポイントさらに倍: {{  point2 }}</p>
        <hr />

        <p>名前: {{ name }}</p>
        <p>年齢: {{ age }}</p>


    </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { useCounterStore  } from '@/stores/counter';
import { usePersonStore } from '@/stores/person';

const counterStore = useCounterStore();
const personStore = usePersonStore();

const point = computed(() => counterStore.count);
const point2 = computed(() => counterStore.doubleCount);

const name = usePersonStore().name;
const age = usePersonStore().age;

</script>

<style scoped>
h1 {
    color: blue;
}
p {
    font-size: 18px;
}
</style>