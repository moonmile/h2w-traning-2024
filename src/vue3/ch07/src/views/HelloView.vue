<template>
    <div>
        <h1>Hello, World!</h1>
        <p>Welcome to the HelloView component.</p>
        <p>Has published books: 
            {{ message }}
        </p>
        <p>
          name is {{ name }}
        </p>
        <button @click="changeBooks">changeBooks</button>
    </div>
</template>

<script setup lang="ts">
import { ref, reactive, computed, watch } from 'vue'

const author = reactive({
  name: 'John Doe',
  books: [
    'Vue 2 - Advanced Guide',
    'Vue 3 - Basic Guide',
    'Vue 4 - The Mystery'
  ]
})
const name = computed({
    get() {
        return author.name
    },
    set(value) {
        console.log('name changed:', value)
        author.name = value
    }
})

// const message = ref(calculateBooksMessage())
// calculated property
const message = computed({
    get() {
        return author.books.length > 0 ? 'Yes' : 'No'
    },
    set(value) {
        console.log('set value:', value)
    }
})

// watch property
// watch(name, (newVal, oldVal) => {
//     console.log('name changed:', newVal, oldVal)
// })


// コンポーネント内
function calculateBooksMessage() {
  return author.books.length > 0 ? 'Yes' : 'No'
}

function changeBooks() {
  author.books = []
  // message.value = calculateBooksMessage()

  name.value = "suzuki"


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