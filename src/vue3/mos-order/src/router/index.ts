import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import TopView from '../views/TopView.vue'
import CategoryView from '../views/CategoryView.vue'
import ProductListView from '../views/ProductListView.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/top',
      name: 'top',
      component: TopView
    },
    {
      path: '/category',
      name: 'category',
      component: CategoryView
    },
    {
      path: '/product-list/:slug',
      name: 'product-list',
      component: ProductListView
    },
  ]
})

export default router
