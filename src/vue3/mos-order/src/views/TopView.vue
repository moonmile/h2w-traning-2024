<template>
    <div>
        <h1>注文方法を選択</h1>
    </div>
    <div>
        <button class="btn btn-primary" @click="onOrder">お持ち帰り</button>
        <button class="btn btn-primary" @click="onOrder">お届け</button>
        <!--
        <router-link class="btn btn-primary" to="/category" >お持ち帰り</router-link>
        <router-link class="btn btn-primary" to="/category">お届け</router-link>
        -->
    </div>
    <br />

    <Carousel :itemsToShow="1.8" :wrapAround="true">
        <slide v-for="image in images" :key="image.id" class="slide-list">
            <a href="/product-list/special">
                <img width="500" height="300" src="../assets/top-hamburger.jpg" alt="ハンバーガー"/>
            </a>
        </slide>
        <template #addons>
            <Pagination />
            <Navigation />
        </template>
    </Carousel>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { defineComponent } from 'vue'
import { Carousel, Slide, Navigation, Pagination } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';
import { useRouter } from 'vue-router';

const router = useRouter();


const images = ref([
    { id: 1, src: '../assets/top-hamburger.jpg', alt: 'ハンバーガー' },
    { id: 2, src: '../assets/top-hamburger.jpg', alt: 'ハンバーガー' },
    { id: 3, src: '../assets/top-hamburger.jpg', alt: 'ハンバーガー' },
    { id: 4, src: '../assets/top-hamburger.jpg', alt: 'ハンバーガー' },
    { id: 5, src: '../assets/top-hamburger.jpg', alt: 'ハンバーガー' },
]);

function onOrder() {
    console.log('onOrder');
    router.push('/category');
}





</script>

<style scoped>
h1 {
    color: blue;
    text-align: center;
}

button {
 /* ボタンの幅を画面幅の50%に設定 */
    min-width: 250px; /* 最小幅を指定 */
    max-width: 600px; /* 最大幅を指定 */
    height: 100px; /* ボタンの高さを指定 */
    font-size: 20px; /* フォントサイズを指定 */
    margin: 20px; /* ボタン間の余白を指定 */
    box-sizing: border-box; /* paddingとborderをwidthに含める */
    border-radius: 10px; /* ボタンの角を丸くする */
    /*ボタンの位置を中央*/
    position: relative;
    left: 26.5%;

    
}

.slide-list {

}

.carousel__slide {
    height: 300px;
    width: 500px;
    background-color: red;


    &:nth-child(2n) {
    background-color: green;
  }
}
</style>
