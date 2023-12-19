<script setup>
import CategoryBadge from '@/Components/CategoryBadge.vue';
import PostCommentsSection from '@/Components/PostCommentsSection.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    post: Object
})

</script>

<template>
    <PublicLayout>
        <Head :title="post.title" />
        <main class="max-w-6xl mx-auto space-y-6 text-black dark:text-white pt-12 px-4 md:px-0 pb-12">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ post.created_at }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ post.user.name }}</h5>
                            <h6>Joined {{ post.user.created_at }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <Link :href="route('welcome')"
                            class="transition-colors duration-300 relative inline-flex items-center text-sm hover:font-semibold">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Regresar
                        </Link>

                        <div class="space-x-2">
                           <CategoryBadge>
                                {{ post.category.name }}
                           </CategoryBadge>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10 font-serif">
                        {{ post.title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p class="text-2xl">{{ post.excerpt }}</p>

                        <p class="text-xl">{{ post.body }}</p>
                    </div>


                    <PostCommentsSection :post-id="post.id" :comments="post.comments" />
                </div>
            </article>
        </main>
    </PublicLayout>
</template>