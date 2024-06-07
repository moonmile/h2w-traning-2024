<template>
    <div class="Cart-wrap">
        <h2>カートの中身</h2>
        <p v-show="!items.length"><i>カートに商品は入っていません。</i></p>
    
        <ul class="Cart-list">
            <li v-for="product in items" :key="product.id" class="Cart-item">
                <div class="Cart-inner">
                    <hr>
                    <div class="Cart-img">
                        <!--商品画像-->
                        <img :src="product.image" alt="product.name">
                    </div>
                    <div class="Cart-name">
                        <!--商品名-->
                        {{ product.name }}
                    </div>
                    <div class="Cart-price">
                        ¥{{ product.price }}
                    </div>
                    <div class="Cart-quantity">
                        <!--増加-->
                        <button @click="incrementQuantity(product); updateQuantity(items)">+</button>
                        <!--数量-->
                        {{ product.quantity }}
                        <!--減少-->
                        <button @click="decrementQuantity(product); updateQuantity(items)">-</button>
                        個
                    </div>
                    <div class="Cart-subtotal">
                        <!--小計-->
                        ¥{{ product.price * product.quantity }}
                    </div>
                    <!--削除ボタン-->
                    <button @click="removeCart(product.id)">削除</button>
                </div>
            </li>
        </ul>
    </div>
    <hr>
    <p>合計: ¥{{ total }}</p>
    <hr>
    <!--購入画面へ-->
    <button @click="clickOrder">購入手続きへ</button>

</template>

<script setup lang="ts">
import { useCartStore } from '../stores/Cart';
import { storeToRefs } from 'pinia';
import { useRouter } from 'vue-router';

const router = useRouter();
const cartStore = useCartStore();

const { items, total } = storeToRefs(useCartStore());

function removeCart(id) {
    if (confirm('削除しますか？')) {
        cartStore.removeCart(id);
    }
}

function updateQuantity(items) {
    console.log(items);
    cartStore.updateQuantity(items);
}

function incrementQuantity(items) {
    console.log('increment ' + items.name);
    cartStore.incrementQuantity(items);
}

function decrementQuantity(items) {
    console.log('decrement ' + items.name);
    cartStore.decrementQuantity(items);
}

// 購入画面へ もしカートに商品がない場合は無効化
const clickOrder = () => {
    if (items.value.length === 0) {
        console.log('カートに商品がありません');
        alert('カートに商品がありません');
    } else {
        console.log('購入手続きへ');
        router.push('/order-list');
    }
};




</script>

<style scoped>

.Cart-wrap {
    background-color: beige;
    padding: 20px;
}

.Cart-item {
    list-style: none;
}

.Cart-inner {
    background-color: white;
}

</style>
