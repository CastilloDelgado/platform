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
    <Swiper class="border dark:border-white border-black">
        <SwiperSlide v-for="image in images" class="">
            <div class="w-full flex justify-center " >
                <div class="w-fit">
                    <img :src="image" class="max-h-[65vh]" />
                </div>
            </div>
        </SwiperSlide>
    </Swiper>
</template>