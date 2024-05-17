import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CategoryListView from '../views/CategoryListView.vue'
import CategoryItemView from '../views/CategoryItemView.vue'

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
      path: '/cetegory',
      name: 'cetegory',
      component: CategoryListView
    },
    {
      path: '/cetegory/:id',
      name: 'category-item',
      component: CategoryItemView
    },
  ]
})

export default router
