<template>
    <div>
        <h1>Category Page</h1>
    </div>
    <div class="page-body">
        <div class="menu" v-for="category in categories" :key="category.id">
            <details class="accordion">
            <summary class="menu-btn" id="Special_menu">
                <div class="menu-icon">
                    <img alt="icon" src=""></div>
                    <p class="menu-text">{{ category.title }}</p>
            </summary>
            <div class="accordion-menu">
                <div class="ProductLink-wrap">
                    <ul v-for="product in products" :key="product.id" class="ProductLink-list">
                        <li class="ProductLink-item">
                            <a class="ProductLink" v-bind:href="`product-list/${category.slug}`"><!-- herf="カートに入れる画面" -->
                                <div class="ProductLink-inner">
                                    <div class="ProductLink-img">
                                        <img :src="product.image" alt="product.name">
                                    </div>
                                    <div class="ProductLink-name">
                                        <p class="Link">
                                            {{ product.name }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </details>
        </div>
    </div>

    <div>
        <ul>
            <li v-for="category in categories" :key="category.id">
                {{ category.title }} {{ category.slug }}
                <RouterLink :to="{ name: 'product-list', params: { slug: category.slug  } }">{{ category.title }}</RouterLink>                
            </li>
        </ul>
    </div>
    
</template>

<!--

-->


<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';

const categories = ref([
    { id: 1, slug: "slug 1", title: "Category 1", sortid: 1, display: false, created_at: "created_at 1", updated_at: "updated_at 1", is_delete: false },
    { id: 2, slug: "slug 2", title: "Category 2", sortid: 2, display: false, created_at: "created_at 2", updated_at: "updated_at 2", is_delete: false },
    { id: 3, slug: "slug 3", title: "Category 3", sortid: 3, display: false, created_at: "created_at 3", updated_at: "updated_at 3", is_delete: false },
    { id: 4, slug: "slug 4", title: "Category 4", sortid: 4, display: false, created_at: "created_at 4", updated_at: "updated_at 4", is_delete: false },
    { id: 5, slug: "slug 5", title: "Category 5", sortid: 5, display: false, created_at: "created_at 5", updated_at: "updated_at 5", is_delete: false },
]);

const products = ref([
    { id: 1, slug: "slug 1", name: "Product 1", description: "description", image: "image 1", price: "price 1", sortid: 1, display: false, created_at: "created_at 1", updated_at: "updated_at 1", is_delete: false },
    { id: 2, slug: "slug 2", name: "Product 2", description: "description", image: "image 2", price: "price 2", sortid: 2, display: false, created_at: "created_at 2", updated_at: "updated_at 2", is_delete: false },
    { id: 3, slug: "slug 3", name: "Product 3", description: "description", image: "image 3", price: "price 3", sortid: 3, display: false, created_at: "created_at 3", updated_at: "updated_at 3", is_delete: false },
    { id: 4, slug: "slug 4", name: "Product 4", description: "description", image: "image 4", price: "price 4", sortid: 4, display: false, created_at: "created_at 4", updated_at: "updated_at 4", is_delete: false },
    { id: 5, slug: "slug 5", name: "Product 5", description: "description", image: "image 5", price: "price 5", sortid: 5, display: false, created_at: "created_at 5", updated_at: "updated_at 5", is_delete: false },
]);


async function onload() {
    const url = 'http://localhost:8000/api/categories';
    const response = await axios.get(url);
    categories.value = response.data.data ;
}
onMounted(onload) ;

/*
async function onload2() {
    const url = `http://localhost:8000/api/categorie/${slug.value}/products`;
    console.log( url )
    const response = await axios.get(url);
    products.value = response.data.data[0].products; 
}
onMounted(onload2) ;
*/


</script>

<style scoped>
/* Add your custom styles here */




.menu-btn {
    width: 100%;
  padding: 0.9375rem 1.25rem;
  /* change theme >> */
  border-top: 1px solid #007749;
  /* << change theme */
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  min-height: 3.75rem;
}


.menu-btn .menu-text {
  position: relative;
  width: 100%;
  text-align: left;
  padding-right: 1.25rem;
  font-weight: bold;
}

.menu-btn .menu-text::before {
  content: "";
  position: absolute;
  top: 45%;
  right: 0;
  width: 1.125rem;
  height: 0.1875rem;
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
  /* change theme >> */
  background: #007749;
  /* << change theme */
  border-radius: 2px;
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}
/*
.menu-btn .menu-text.is-open::before {
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}
*/
.menu-btn .menu-text::after {
  content: "";
  position: absolute;
  top: 45%;
  right: 0;
  width: 1.125rem;
  height: 0.1875rem;
  /* change theme >> */
  background: #007749;
  /* << change theme */
  border-radius: 2px;
}

/*
.accordion-menu-inner .menulink-list {
  margin: 0 -0.875rem;
  -webkit-box-pack: start;
      -ms-flex-pack: start;
          justify-content: flex-start;
}
*/




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

.ProductLink-name {
    font-size: 1.4rem;
    font-weight: bold;
    color: #333;
    margin: 0;
}


</style>