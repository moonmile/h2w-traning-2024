import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', () => {
    const products = ref<Product>([])
    
    function addProduct(value: Product) {
        console.log('addProduct:' +  value)
        products.value.push(value)
    }

    return { products, addProduct }
  })
  

interface Product {
    id: number;
    slug: string;
    name: string;
    description: string;
    image: string;
    price: string;
    sortid: number;
    display: number;
    created_at: string;
    updated_at: string;
    is_delete: boolean;
}

