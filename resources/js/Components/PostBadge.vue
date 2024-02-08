<script setup>
import { Link } from '@inertiajs/vue3';
import CategoryBadge from './CategoryBadge.vue';
import PrimaryButton from './PrimaryButton.vue';
import { formatDistance } from 'date-fns'

defineProps({
    post: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <article class="border border-black dark:border-white flex flex-col transition hover:saturate-[1.15]">
        <Link :href="route('posts.show', post.slug)" as="div" class="cursor-pointer">
        <img :src="post.thumbnail_url" alt="Blog Post illustration" class="h-64 w-full object-cover ">
        </Link>

        <div class="p-6 bg-white dark:bg-black text-black dark:text-white flex flex-col justify-between h-full">
            <header>
                <div class="space-x-2">
                    <CategoryBadge>{{ post.category.name }}</CategoryBadge>
                </div>

                <Link :href="route('posts.show', post.slug)" class="cursor-pointer ">
                <div class="mt-4">
                    <h1 class="text-2xl font-serif font-bold">
                        {{ post.title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ formatDistance(new Date(post.created_at), new Date(), { addSuffix: true })
                        }}</time>
                    </span>
                </div>
                </Link>
            </header>

            <Link :href="route('posts.show', post.slug)" class="text-sm mt-4 cursor-pointer" as="div">
            <p class="text-justify">
                {{ post.excerpt }}
            </p>
            </Link>

            <footer class="flex justify-between items-center mt-8">
                <Link as="div" class="flex items-center text-sm cursor-pointer" :href="route('profile.show', post.user.id)">
                <img :src="post.user.profile_photo_url" class="w-12 h-12 object-cover border border-black dark:border-white"
                    alt="Lary avatar">
                <div class="ml-3">
                    <h5 class="font-bold">{{ post.user.name }}</h5>
                    <p class="text-xs">Joined {{ formatDistance(new Date(post.user.created_at), new Date(), {
                        addSuffix:
                            true
                    }) }}</p>
                </div>
                </Link>

                <div>
                    <Link :href="route('posts.show', post.slug)" class="cursor-pointer">
                    <PrimaryButton>Leer más</PrimaryButton>
                    </Link>
                </div>
            </footer>
        </div>
    </article>
</template>