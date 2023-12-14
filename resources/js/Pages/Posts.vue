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
            <div v-for="post in posts" class="text-white mx-auto max-w-xl mb-6">
                <Link :href="route('post', post.slug)">
                    <p class="font-bold text-lg">{{ post.title }}</p>
                </Link>
                <Link :href="route('categories', post.category.slug)" class="text-xs underline">{{ post.category.name }}</Link>
                <p>{{ post.body }}</p>
            </div>
        </div>
    </PublicLayout>
</template>