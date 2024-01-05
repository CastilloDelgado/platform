<script setup>

import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'

defineProps({
    images: {
        type: Array,
        required: true
    }
})

</script>

<template>
    <Swiper class="border dark:border-white border-black h-[70vh]">
        <SwiperSlide v-for="image in images">
            <div class="grid place-content-center">
                <img :src="image" class="object-contain h-[70vh]" />
            </div>
        </SwiperSlide>
    </Swiper>
</template>