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
    <Swiper>
        <SwiperSlide v-for="image in images">
            <img :src="image" />
        </SwiperSlide>
    </Swiper>
</template>