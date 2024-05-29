<template>
    <div>
        <h1>Product List : {{ slug }}</h1>
        <div class="ProductLink-wrap">
            <ul v-for="product in products" :key="product.id" class="ProductLink-list">
                <li class="ProductLink-item">
                    <a class="ProductLink" href="/about">
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
                                        {{ product.price }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-primary" @click="clickCart(product)">カート</button>
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
                { id: 1, name: 'Product 1', price: 10 },
                { id: 2, name: 'Product 2', price: 20 },
                { id: 3, name: 'Product 3', price: 30 },
            ]);

const cartStore = useCartStore();


async function onload() {
    const url = `http://localhost:8000/api/categories/${slug.value}/products`;
    console.log( url )
    const response = await axios.get(url);
    products.value = response.data.data[0].products; 
}
onMounted(onload) ;


/**
 * Handles the click event on the cart.
 */
function clickCart(item) {
    console.log('clickCart')
    cartStore.addProduct(item);

    alert('clickCart ' + item.name)
}


</script>

<style scoped>
h1 {
    color: blue;
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
    margin-bottom: 28px;
}

.ProductLink:hover .ProductLink-inner {
    opacity: 0.7;
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
}

.ProductLink-name {
    /* change theme >> */
    border-top: solid 1px #007749;
    /* << change theme */
    padding-top: 25px;
}

</style>