<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PostsList from '@/Components/PostsList.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Object,
        required: true
    },
    canLogin: Boolean,
    canRegister: Boolean,
})

</script>

<template>
    <AppLayout title="Dashboard" :canLogin="canLogin" :canRegister="canRegister">
        <template #header>
            <h2 class="font-semibold text-xl dark:text-white dark:bg-black">
                Dashboard
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto px-4 lg:px-8 pb-12">
                <div class=" overflow-hidden text-black dark:text-white">
                    <div class="w-full flex justify-between gap-4 ">
                        <div class="grid place-content-center">
                            <p class="text-2xl font-bold font-serif">Mis Posts</p>
                        </div>
                        <Link :href="route('posts.create')">
                        <PrimaryButton class="w-32 md:w-64">Crear un post</PrimaryButton>
                        </Link>
                    </div>
                    <PostsList :posts="posts" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
