<script setup>
import ImageGalleryItem from './ImageGalleryItem.vue';

defineProps({
    images: {
        type: Array,
        required: true
    }
})

</script>

<template>
    <div class="text-white">
        <p>This is the random image gallery</p>

        <div class="grid grid-cols-3 gap-2">
            <ImageGalleryItem v-for="image in images" :image="image" />
        </div>
    </div>
</template>