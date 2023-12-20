<script setup>
import { Link } from '@inertiajs/vue3';
import CategoryBadge from './CategoryBadge.vue';
import PrimaryButton from './PrimaryButton.vue';

defineProps({
    post: {
        type: Object, 
        required: true
    }
})

</script>

<template>
    <article class="border border-black dark:border-white flex flex-col ">
        <div>
            <img :src="post.thumbnail_url" alt="Blog Post illustration" class="">
        </div>

        <div class="p-6 bg-white flex flex-col justify-between h-full">
            <header>
                <div class="space-x-2">
                    <CategoryBadge>{{ post.category.name }}</CategoryBadge>
                </div>

                <div class="mt-4">
                    <h1 class="text-2xl font-serif font-bold">
                        {{ post.title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ post.created_at }}</time>
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
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">{{ post.user.name }}</h5>
                    </div>
                </div>

                <div>
                    <Link :href="route('post', post.slug)">
                        <PrimaryButton>Leer más</PrimaryButton>
                    </Link>
                </div>
            </footer>
        </div>

    </article>
</template>