<script setup>
import { Head } from '@inertiajs/vue3';
import WelcomeMessage from "@/Components/WelcomeMessage.vue"
import PublicLayout from '@/Layouts/PublicLayout.vue';
import SearchTools from "@/Components/SearchTools.vue"
import RandomImageGallery from '@/Components/RandomImageGallery.vue';
import PostsGrid from '@/Components/PostsGrid.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    posts: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true
    },
    filters: {
        type: Object
    },
    randomImages: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <PublicLayout :canLogin="canLogin" :canRegister="canRegister">

        <Head title="Inicio" />

        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-white  dark:bg-black selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <WelcomeMessage />

                <SearchTools :categories="categories" :filters="filters" />

                <PostsGrid :posts="posts" />


                <RandomImageGallery :images="randomImages" />
            </div>
        </div>
    </PublicLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
