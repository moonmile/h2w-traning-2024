<template>
    <div>
        {{ id }} {{ name }} {{ description }}
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

// props のままでは変更できないので、別途 ref で定義する
const id = ref(props.modelValue.id);
const name = ref(props.modelValue.name);
const description = ref(props.modelValue.description);

</script>
