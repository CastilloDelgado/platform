<script setup>
import CategoryBadge from '@/Components/CategoryBadge.vue';
import ImageCarousel from '@/Components/ImageCarousel.vue';
import PostCommentsSection from '@/Components/PostCommentsSection.vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import { format, formatDistance, formatRelative, subDays } from 'date-fns'

const props = defineProps({
    post: Object
})

const imagesPreview = computed(() => props.post.images.length > 0 ? props.post.images.map(image => image.image_url) : [])

</script>

<template>
    <PublicLayout>
        <Head :title="post.title" />
        <main class="max-w-6xl mx-auto space-y-6 text-black dark:text-white pt-12 px-4 md:px-0 pb-12">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img :src="post.thumbnail_url" alt="Blog Post illustration" class="">

                    <p class="mt-4 text-left block text-gray-400 text-sm">
                        Published <time>{{ formatDistance(new Date(post.created_at), new Date(), { addSuffix: true }) }}</time>
                    </p>

                    <div class="flex justify-start text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ post.user.name }}</h5>
                            <h6 class="dark:text-white/50">Joined {{ formatDistance(new Date(post.user.created_at), new Date(), { addSuffix: true }) }}</h6>
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

                    <ImageCarousel :images="imagesPreview" />

                    <PostCommentsSection :post-id="post.id" :comments="post.comments" />
                </div>
            </article>
        </main>
    </PublicLayout>
</template>