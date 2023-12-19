<script setup>
import LargePostBadge from './LargePostBadge.vue';
import PostBadge from './PostBadge.vue';
import { ref } from 'vue';
import createSadFace from "@/helpers"

defineProps({
    posts: {
        type: Array,
        required: true
    },
    firstThreeHighlighted: Boolean
})

// const posts = ref([])

const sadFace = ref(createSadFace())

</script>

<template>
    <div class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-3 gap-3">
        <template v-if="posts.length > 0">
            <template v-if="firstThreeHighlighted">
                <LargePostBadge :post="posts[0]" />
            
                <div class="lg:grid lg:grid-cols-6 gap-3">
                    <PostBadge v-for="(post, index) in posts.slice(1)" :post="post" :class="{
                        'col-span-3': index < 2,
                        'col-span-2': index > 1
                    }"/>
                </div>
            </template>
            <template v-else>
                <div class="lg:grid lg:grid-cols-6 gap-3">
                    <PostBadge v-for="post in posts" :post="post" class="col-span-2"/>
                </div>
            </template>
        </template>
        <template v-else>
            <p class="text-white text-xl text-center">{{ sadFace }}<br/>No encontramos lo que buscar</p>
        </template>
    </div>
</template>