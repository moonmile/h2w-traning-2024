import { ref, computed } from 'vue'
import { defineStore } from 'pinia'


interface Category {
    id: number;
    slug: string;
    title: string;
    description: string;
    image: string;
    sortid: number;
    display: boolean;
    created_at: Date;
    updated_at: Date;
    deleted_at: Date | null;
}

export const useCategoryStore = defineStore('category', () => {
    const categories = ref([] as Category[])
    return { categories }
})