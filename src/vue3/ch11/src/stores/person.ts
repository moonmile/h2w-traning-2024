import { ref, reactive } from 'vue'
import { defineStore } from 'pinia'

export const usePersonStore = defineStore('person', () => {
    const name = ref("名無し")
    const age  = ref(10)
    
    function setName(value: string) {
        name.value = value
    }
    function setAge(value: number) {
        if ( value < 0 ) value = 0
        if ( value > 100 ) value = 100
        age.value = value
    }

    return { name, age, setName, setAge }
  })
  


interface Person {
    name: string;
    age: number;
}




const person = reactive<Person>({
    name: '',
    age: 0,
});

export default person;