<script setup>
import { Link } from '@inertiajs/vue3';
import CategoryBadge from './CategoryBadge.vue';
import PrimaryButton from './PrimaryButton.vue';
import { format, formatDistance, formatRelative, subDays } from 'date-fns'

defineProps({
    post: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <Link :href="route('posts.show', post.slug)" as="article"
        class="border border-black dark:border-white flex flex-col cursor-pointer">
    <div>
        <img :src="post.thumbnail_url" alt="Blog Post illustration" class="h-64 w-full object-cover">
    </div>

    <div class="p-6 bg-white dark:bg-black text-black dark:text-white flex flex-col justify-between h-full">
        <header>
            <div class="space-x-2">
                <CategoryBadge>{{ post.category.name }}</CategoryBadge>
            </div>

            <div class="mt-4">
                <h1 class="text-2xl font-serif font-bold">
                    {{ post.title }}
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                    Published <time>{{ formatDistance(new Date(post.created_at), new Date(), { addSuffix: true }) }}</time>
                </span>
            </div>
        </header>

        <div class="text-sm mt-4">
            <p>
                {{ post.excerpt }}
            </p>
        </div>

        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <img :src="post.user.profile_photo_url" class="w-12 h-12 object-cover border border-black dark:border-white"
                    alt="Lary avatar">
                <div class="ml-3">
                    <h5 class="font-bold">{{ post.user.name }}</h5>
                    <p class="text-xs">Joined {{ formatDistance(new Date(post.user.created_at), new Date(), {
                        addSuffix:
                            true
                    }) }}</p>
                </div>
            </div>

            <div>
                <Link :href="route('posts.show', post.slug)">
                <PrimaryButton>Leer más</PrimaryButton>
                </Link>
            </div>
        </footer>
    </div>
    </Link>
</template>