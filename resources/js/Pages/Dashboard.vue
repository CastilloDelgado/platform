<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PostsList from '@/Components/PostsList.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl dark:text-white dark:bg-black leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pb-12">
                <div class="dark:bg-black dark:border-white border overflow-hidden dark:text-white px-6 py-4">
                    <div class="w-full flex justify-between gap-4 ">
                        <div class="grid place-content-center">
                            <p class="text-2xl font-bold font-serif">Mis Posts</p>
                        </div>
                        <Link :href="route('posts.create')">
                            <PrimaryButton class="w-64">Crear un post</PrimaryButton>
                        </Link>
                    </div>    
                    <PostsList :posts="posts" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
