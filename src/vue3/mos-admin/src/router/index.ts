import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

import CategoriesListView from '@/views/CategoriesListView.vue'
import CategoriesItemView from '@/views/CategoriesItemView.vue'
import ProductListView from '@/views/ProductListView.vue'
import ProductItemview from '@/views/ProductItemview.vue'

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
      path: '/categories-list',
      name: 'categories-list',
      component: CategoriesListView
    },
    {
      path: '/product-list',
      name: 'product-list',
      component: ProductListView
    },

    {
      path: '/categories-list/:id',
      name: 'categories-item',
      component: CategoriesItemView
    },
    {
      path: '/product-list/:id',
      name: 'product-item',
      component: ProductItemview
    },
    
  ]
})

export default router
