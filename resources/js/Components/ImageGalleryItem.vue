<script setup>

defineProps({
    image: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <img :src="image.image_url" class="border border-black dark:border-white" />
</template>