<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { formatDistance } from 'date-fns';


defineProps({
    user: {
        type: Object,
        required: true
    },
    posts: {
        type: Array,
        required: true
    }
})

</script>

<template>
    <PublicLayout>

        <Head :title="user.username" />

        <div class="max-w-6xl mx-auto py-12 flex flex-row relative">
            <div class="w-1/4 text-black dark:text-white sticky top-0">
                <img :src="user.profile_photo_url" class="w-full mb-4 border border-black dark:border-white" />
                <p class="text-2xl font-bold font-serif">{{ user.username }}</p>
                <p class="text-lg">{{ user.name }}</p>
                <p class="dark:text-white/50">Joined {{ formatDistance(new Date(user.created_at), new
                    Date(), { addSuffix: true }) }}</p>
            </div>
            <div class="w-3/4 text-black dark:text-white px-8 overflow-auto">
                <p class="text-3xl font-sans font-bold mb-4">Posts</p>
                <div class="flex flex-col space-y-4">
                    <Link as="div" :href="route('posts.show', post)" v-for="post in posts"
                        class="flex flex-row border border-white">
                    <div class="w-1/4">
                        <img :src="post.thumbnail_url" alt="" class="w-full h-64 object-cover">
                    </div>
                    <div class="w-3/4 py-2 px-4 grid place-content-between">
                        <div class="w-full">
                            <p class="font-serif font-bold text-2xl">{{ post.title }}</p>
                            <p class="mt-4 lg:mt-1 text-left block text-gray-400 text-sm mb-4">
                                Published <time>{{ formatDistance(new Date(post.created_at), new Date(), {
                                    addSuffix: true
                                })
                                }}</time>
                            </p>
                            <p class="text-justify">{{ post.excerpt }}</p>
                        </div>
                        <div class="flex justify-start gap-x-2 w-full">
                            <div class="flex text-sm gap-x-2">
                                <p class="">Views</p>
                                <p class="font-serif">{{ post.view_count }}</p>
                            </div>
                            <!-- <p class="">Likes</p> -->
                            <!-- <p class="">Share</p> -->
                        </div>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>