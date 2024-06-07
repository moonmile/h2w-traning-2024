<template>
    <div>
        <h1>Product List</h1>
        <div class="ProductLink-wrap">
            <ul v-for="product in products" :key="product.id" class="ProductLink-list">
                <li class="ProductLink-item">
                    <a class="ProductLink"><!-- herf="カートに入れる画面"　カートボタンと共存したい -->
                        <div class="ProductLink-inner">
                            <div class="ProductLink-img">
                                <img :src="product.image" alt="product.name">
                            </div>
                            <div class="ProductLink-name">
                                <p class="Link">
                                    {{ product.name }}
                                </p>
                                <ul class="price-list">
                                    <li class="price">
                                        ￥{{ product.price }}<button class="btn btn-primary" @click="clickCart(product)">カートに追加</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { useCartStore } from '../stores/Cart';

const router = useRouter();
const slug = ref(router.currentRoute.value.params.slug);


const products = ref([
    { id: 1, slug: "slug 1", name: "Product 1", description: "description", image: "image 1", price: "price 1", sortid: 1, display: false, created_at: "created_at 1", updated_at: "updated_at 1", is_delete: false },
    { id: 2, slug: "slug 2", name: "Product 2", description: "description", image: "image 2", price: "price 2", sortid: 2, display: false, created_at: "created_at 2", updated_at: "updated_at 2", is_delete: false },
    { id: 3, slug: "slug 3", name: "Product 3", description: "description", image: "image 3", price: "price 3", sortid: 3, display: false, created_at: "created_at 3", updated_at: "updated_at 3", is_delete: false },
    { id: 4, slug: "slug 4", name: "Product 4", description: "description", image: "image 4", price: "price 4", sortid: 4, display: false, created_at: "created_at 4", updated_at: "updated_at 4", is_delete: false },
    { id: 5, slug: "slug 5", name: "Product 5", description: "description", image: "image 5", price: "price 5", sortid: 5, display: false, created_at: "created_at 5", updated_at: "updated_at 5", is_delete: false },
]);



async function onload() {
    const url = `http://localhost:8000/api/products`;
    console.log( url )
    const response = await axios.get(url);
    products.value = response.data.data; 
}
onMounted(onload) ;


/**
 * Handles the click event on the cart.
 */
async function clickCart(product) {
    console.log('clickCart ' + product.name);
    alert('カートに追加しました');
    // カートに追加
    const cartStore = useCartStore();
    cartStore.addCart(product);
}


</script>

<style scoped>
h1 {
    color: blue;
}

.btn {
    position: absolute;
    right: 0;
    bottom: 0;
    margin: 20px;


}

.ProductLink-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -14px;
}

.ProductLink {
    /* C's modified >> */
    /*  display: block; */
    /* << C's modified */
    border-radius: 5px;
    border: solid 1px #ccc;
    overflow: hidden;
    /* C's modified >> */
    /*  height: 100%; */
    width: 100%;
    height: auto;
    /* << C's modified */
    text-decoration: none;
    position: relative;
    -webkit-box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.06);
            box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.06);
    background-color: #fff;
}

.ProductLink-list {
    -webkit-transform: translateY(28px);
            transform: translateY(28px);
    margin: -28px -14px 0;
}

.ProductLink-item {
      /* C's modified >> */
    display: flex;
    /* << C's modified */
    padding-left: 14px;
    padding-right: 14px;
    margin-bottom: 60px;
    width: 300px;
    height: 400px;
}

.ProductLink:hover .ProductLink-inner {
    opacity: .7;
}

.ProductLink-inner {
    padding: 15px 20px 25px;
  /* C's modified >> */
    flex-wrap: wrap;
  /* << C's modified */
}

.ProductLink-img {
    text-align: center;
    margin: -15px -20px 0;
    background-color: aqua;
    width: 300px;
    height: 240px;
}

.ProductLink-name {
    /* change theme >> */
    border-top: solid 1px #007749;
    /* << change theme */
    padding-top: 15px;
}

.ProductLink-name {
    font-size: 1.4rem;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.price-list {
    list-style: none;
    padding-left: 0;
    margin: 0;    
}

</style>