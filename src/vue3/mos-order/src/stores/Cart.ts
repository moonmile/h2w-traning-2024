import { ref } from 'vue'
import { defineStore } from 'pinia'


export const useCartStore = defineStore('cart', {
    state: () => ({
        items: [] as Product[]
    }),
    getters: {
        // 全体の合計金額を計算する
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
                console.log(value.name + 'の数量を1個追加しました')
                item.quantity++;
            } else {
                console.log(value.name + 'をカートに入れました')
                this.items.push({ ...value, quantity: 1 })
            }
        },
        // 数量を更新する
        updateQuantity(value: Product) { //value: { id: number, quantity: number }とどちらがいいのかな
            const item = this.items.find((item) => item.id === value.id)
            if (item) {
                console.log(value.name + 'の数量を更新しました')
                item.quantity = value.quantity;
            }
        },
        // カートから削除する
        removeCart(id: number) {
            const index = this.items.findIndex((item) => item.id === id)
            if (index !== -1) {
                console.log(this.items[index].name + 'をカートから削除しました')
                this.items.splice(index, 1)
            }
        },
        // 数量を1つ追加する
        incrementQuantity(value: Product) {
            const item = this.items.find((item) => item.id === value.id)
            if (item) {
                console.log(item.name + 'の数量を1個追加しました')
                item.quantity++;
            }
        },
        // 数量を1つ減らす
        decrementQuantity(value: Product) {
            const item = this.items.find((item) => item.id === value.id)
            if (item && item.quantity > 1) {
                console.log(item.name + 'の数量を1個減らしました')
                item.quantity--;
            }
        },
        
    }
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
    quantity: number;
}
