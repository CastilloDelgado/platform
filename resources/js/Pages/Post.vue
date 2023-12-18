<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    post: Object
})

</script>

<template>
    <PublicLayout>
        <Head :title="post.title" />
        <div class="text-center text-white py-6 flex justify-center">
            <div class=" max-w-xl">
                <p class="font-bold text-2xl">{{ post.title }}</p>
                <div class="flex justify-center text-xs gap-1 mb-4">
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