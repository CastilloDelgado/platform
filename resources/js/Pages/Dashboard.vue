<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PostsList from '@/Components/PostsList.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl dark:text-white dark:bg-black leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="dark:bg-black dark:border-white border overflow-hidden dark:text-white px-6 py-4">
                    <p class="font-serif font-bold text-2xl">Mis posts</p>
                    <PostsList />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
