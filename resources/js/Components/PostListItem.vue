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
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <Link :href="route('posts.show', post.slug)">
                <img :src="post.thumbnail_url" alt="" class="w-32 h-32 object-cover">
            </Link>
            <div class="min-w-0 flex-auto">
                <p class="text-lg font-semibold leading-6 dark:text-white">{{post.title }}</p>
                <p class="mt-1 truncate text-xs leading-5 mb-2">{{ formatDistance(new Date(post.created_at), new Date(), { addSuffix: true }) }}</p>
                <p class="mt-1 truncate leading-5">{{ post.excerpt }}</p>
            </div>
        </div>
        <div class="flex gap-2">
            <Link :href="route('posts.edit', post.slug)">
                <PrimaryButton>Editar</PrimaryButton>
            </Link>
            <DangerButton @click="deletePost">Eliminar</DangerButton>
        </div>
    </li>
</template>