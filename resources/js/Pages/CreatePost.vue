<script setup>
import PostForm from '@/Components/PostForm.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    categories: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <AppLayout>

        <Head title="Crear Post" />
        <template #header>
            <h2 class="font-semibold text-xl dark:text-white dark:bg-black leading-tight">
                Crear Post
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-black dark:border-white  overflow-hidden dark:text-white px-6 py-4">
                <PostForm :categories="categories" />
            </div>
        </div>
    </AppLayout>
</template>