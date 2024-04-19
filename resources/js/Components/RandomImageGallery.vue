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
    <div class="text-white mb-8">
        <div class="hidden md:grid grid-cols-4 gap-[4px]">
            <ImageGalleryItem v-for="(image, index) in images" :image="image" :class="{
                'col-span-2': [1, 3, 8, 10, 12, 17].find((el) => el === index)
            }" />
        </div>
        <div class="grid md:hidden grid-cols-3 md:grid-cols-4 gap-[4px]">
            <ImageGalleryItem v-for="(image, index) in images.slice(0, 8)" :image="image" :class="{
                'col-span-2': [1, 2, 5, 6, 7, 8, 11, 12, 13, 14, 17].find((el) => el === index)
            }" />
        </div>
    </div>
</template>