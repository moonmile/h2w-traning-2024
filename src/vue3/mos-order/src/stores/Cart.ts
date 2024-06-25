import { ref } from 'vue'
import { defineStore } from 'pinia'
import type { Product } from '../types/product'

export const useCartStore = defineStore('cart', () => {
    const products = ref<Product[]>([])
    
    function addProduct(value: Product) {
        console.log('addProduct:' +  value.name)
        products.value.push(value)
    }

    return { products, addProduct }
  })
  
