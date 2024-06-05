import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [] as Product[]
    }),
    getters: {
        total: (state) => {
            return state.items.reduce((total, item) => {
                return total + item.price * item.quantity;
            }, 0);
        },
    },
    actions: {
        addCart(value: Product) {
            const item = this.items.find((item) => item.id === value.id)
            if (item) {
                console.log( value.name + 'の数量を1個追加しました')
                item.quantity++;
            } else {
                console.log( value.name + 'をカートに入れました')
                this.items.push({ ...value, quantity: 1 })
            }
        }
    }
})






/*
export const useCartStore = defineStore('cart', () => {
    const products = ref<Product>([])
    
    function addProduct(value: Product) {
        console.log('addProduct:' +  value)
        products.value.push(value)
    }

    return { products, addProduct }
  })
*/

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
    quantity: number;
}

