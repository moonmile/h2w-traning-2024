<template>
    <div>
        {{ item.id }} {{ item.name }} {{ item.description }}
        <button @click="onclickEdit">編集</button>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { defineProps } from 'vue';

// v-model を受信する
// const props = defineProps<{ modelValue: { id: number, name: string, description: string } }>();


// interface を定義する方式
interface Props { 
    modelValue: { 
        id: number, 
        name: string, 
        description: string 
    } 
}
const props = defineProps<Props>();
// 以下のようにも書ける
/*
const props = defineProps<{  
    modelValue: { 
        id: number, 
        name: string, 
        description: string }}>();
*/

// props のままでは変更できないので、別途 ref で定義する
const id = ref(props.modelValue.id);
const name = ref(props.modelValue.name);
const description = ref(props.modelValue.description);

const item = ref(props.modelValue);

const emit = defineEmits(['edit']);

function onclickEdit() {
    console.log('in OneProductModel : onclickEdit');
    emit('edit', item.value);
    // alert('onclickEdit ' + item.value.name);
}

</script>
