<script setup>
import DangerButton from './DangerButton.vue';
import PrimaryButton from './PrimaryButton.vue';
import { Link, router } from '@inertiajs/vue3';
import { formatDistance } from 'date-fns'

const props = defineProps({
    post: {
        type: Object,
        required: true
    }
})

const deletePost = () => {
    router.delete(`/posts/${props.post.id}`, {
        onBefore: () => confirm('¿Quieres eliminar este post?'),
    })
}

</script>

<template>
    <li class="flex justify-between gap-x-6 py-5 flex-col md:flex-row border-b border-black dark:border-white">
        <div class="flex flex-col md:flex-row min-w-0 gap-x-4">
            <div class="w-full md:w-1/5 flex justify-center">
                <Link :href="route('posts.show', post.slug)">
                <img :src="post.thumbnail_url" alt=""
                    class="w-40 md:w-32 mb-2 h-auto object-fit border border-black dark:border-white ">
                </Link>
            </div>
            <div class="w-full md:w-4/5">
                <p class="text-xl font-semibold leading-6 dark:text-white font-serif">{{ post.title }}</p>
                <p class="mt-1 truncate text-xs leading-5 mb-2">{{ formatDistance(new Date(post.created_at), new Date(), {
                    addSuffix: true
                }) }}</p>
                <div>
                    <p class="mt-1 text-justify leading-5 text-wrap">{{ post.excerpt }}</p>
                </div>
            </div>
        </div>
        <div class="flex gap-2 mt-2 justify-end">
            <!-- <Link :href="route('posts.edit', post.slug)">
                <PrimaryButton>Editar</PrimaryButton>
            </Link> -->
            <DangerButton @click="deletePost">Eliminar</DangerButton>
        </div>
    </li>
</template>