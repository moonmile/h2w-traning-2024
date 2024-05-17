<template>
    <div>
        {{ id }} {{ name }} {{ description }}
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { defineProps } from 'vue';

// props をバラバラに送る場合
const props = defineProps(['id', 'name', 'description']);
// const props = defineProps(['content']);

const id = ref(props.id);
const name = ref(props.name);
const description = ref(props.description);

</script>
