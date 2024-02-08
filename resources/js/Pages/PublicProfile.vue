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

        <Head :title="user.name" />

        <div class="max-w-6xl mx-auto py-12 flex md:flex-row relative  md:h-[90vh] overflow-y-hidden flex-col px-6">
            <div
                class="w-full md:w-1/4 text-black dark:text-white sticky top-0 grid place-content-center md:place-content-start">
                <img :src="user.profile_photo_url"
                    class="w-64 h-64 object-cover md:w-full mb-4 border border-black dark:border-white md:justify-start justify-center" />
                <p class="text-center md:text-start text-2xl font-bold font-serif">{{ user.username }}</p>
                <p class="text-center md:text-start text-lg">{{ user.name }}</p>
                <p class="text-center md:text-start dark:text-white/50">Joined {{ formatDistance(new Date(user.created_at),
                    new
                        Date(), { addSuffix: true }) }}</p>
            </div>
            <div class="w-full md:w-3/4 text-black dark:text-white px-8 md:overflow-auto no-scrollbar">
                <p
                    class="text-3xl font-sans font-bold mb-4 border-b border-black dark:border-white sticky top-0 bg-white dark:bg-black pb-2">
                    Posts</p>
                <div class="flex flex-col space-y-4">
                    <Link as="div" :href="route('posts.show', post)" v-for="post in posts"
                        class="flex flex-row border border-black dark:border-white">
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

<style scoped>
/* Hide scrollbar for Chrome, Safari and Opera */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.no-scrollbar {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}
</style>