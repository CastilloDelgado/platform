
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
    <article
        class="border border-black dark:border-white">
        <div class="lg:flex">
            <div class="flex-1">
                <img src="/images/illustration-1.png" alt="Blog Post illustration" class="object-fill w-full h-full">
            </div>

            <div class="flex-1 flex flex-col justify-between p-6 bg-white">
                <header class="mt-8 lg:mt-0">
                    <div class="space-x-2 justify-end flex">
                        <CategoryBadge>{{ post.category.name }}</CategoryBadge>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl font-serif font-bold">
                            {{ post.title }}
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>1 day ago</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm mt-2">
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

                    <div class="hidden lg:block">
                        <Link :href="route('post', post.slug)">
                            <PrimaryButton>Leer más</PrimaryButton>
                        </Link>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</template>