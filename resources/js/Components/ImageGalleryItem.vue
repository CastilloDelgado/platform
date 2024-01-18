<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    image: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <Link :href="route('posts.show', image.post.slug)">
    <div class="border border-black dark:border-white relative">
        <img :src="image.image_url"
            class="transition hover:brightness-50 hover:blur hover:grayscale h-72 w-full object-cover" />
        <div
            class="absolute top-0 left-0 right-0 bottom-0 grid place-content-center hover:grid hover:bg-black/80 bg-black/20 transition text-transparent hover:text-white">
            <div class="text-center px-2 md:px-12">
                <p class="font-bold text md:text-xl font-serif">{{ image.post.title }}</p>
                <p class="text-[8px] md:text-xs mb-4">¡Haz click para ver más!</p>
                <p class="capitalize text-[8px] md:text-xs">creado por</p>
                <p class="font-md font-bold text-[11px] md:text-sm">{{ image.post.user.name }} </p>
            </div>
        </div>
    </div>
    </Link>
</template>