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
        <div class="grid grid-cols-4 gap-2">
            <ImageGalleryItem v-for="(image, index) in images" :image="image" :class="{
                'col-span-2': [1, 3, 8].find((el) => el === index)
            }" />
        </div>
    </div>
</template>