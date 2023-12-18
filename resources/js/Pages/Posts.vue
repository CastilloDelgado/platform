<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    posts: Array
})

</script>

<template>
    <PublicLayout>
        <Head title="Posts" />

        <div class="py-6">
            <div v-for="post in posts" class="text-white mx-auto max-w-xl mb-6 border-b pb-2">
                <Link :href="route('post', post.slug)">
                    <p class="font-bold text-lg">{{ post.title }}</p>
                </Link>
                <div class="flex  text-xs gap-1 mb-2">
                    <p>Create by</p>
                    <Link :href="route('authors', post.user.username)" class="underline">{{ post.user.name }}</Link>
                    <p>for</p>
                    <Link :href="route('categories', post.category.slug)" class="capitalize underline">{{ post.category.name }}</Link>
                </div>
                <p>{{ post.body }}</p>
            </div>
        </div>
    </PublicLayout>
</template>