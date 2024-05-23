<template>
    <div>
        <h1>カウンター</h1>
        <p>現在のポイント: {{  point }}</p>
        <p>現在のポイントさらに倍: {{  point2 }}</p>

        <button @click="clickAdd">加算</button>

        <hr />

        <input v-model="name" />
        <input v-model="age" />
        <button @click="clickUpdate">更新</button>

    </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue';
import { useCounterStore  } from '@/stores/counter';
import { usePersonStore } from '@/stores/person';

const counterStore = useCounterStore();
const personStore = usePersonStore();


const point = computed(() => counterStore.count);
const point2 = computed(() => counterStore.doubleCount);

const name = ref(personStore.name);
const age = ref(personStore.age);


function clickAdd() {
    console.log('clickAdd');
    counterStore.increment();
    // point.value = counterStore.count;
    // point2.value = counterStore.doubleCount;  
}


function clickUpdate() {
    console.log('clickUpdate');
    personStore.setName( name.value );
    personStore.setAge( age.value );
    // personStore.name = name.value;
    // personStore.age = age.value;
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