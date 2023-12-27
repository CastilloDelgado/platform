<script setup>
import LargePostBadge from './LargePostBadge.vue';
import PostBadge from './PostBadge.vue';
import { ref } from 'vue';
import GridPaginator from "@/Components/GridPaginator.vue"
import createSadFace from "@/helpers"

defineProps({
    posts: {
        type: Object,
        required: true
    },
    firstThreeHighlighted: Boolean
})

const sadFace = ref(createSadFace())

</script>

<template>
    <div class="max-w-7xl mx-auto mt-6 lg:mt-8 space-y-3 gap-3">
        <template v-if="posts.data.length > 0">
            <template v-if="firstThreeHighlighted">
                <LargePostBadge :post="posts.data[0]" />

                <div class="lg:grid lg:grid-cols-6 gap-3">
                    <PostBadge v-for="(post, index) in posts.data.slice(1)" :post="post" :class="{
                                            'col-span-3': index < 2,
                                            'col-span-2': index > 1
                                        }" />
                </div>
            </template>
            <template v-else>
                <GridPaginator :paginatorInfo="posts" />
                <div class="grid md:grid-cols-6 gap-3 space-y-3 md:space-y-0">
                    <PostBadge v-for="post in posts.data" :post="post" class="md:col-span-3 lg:col-span-2" />
                </div>
                <GridPaginator :paginatorInfo="posts" />
            </template>
        </template>
        <template v-else>
            <p class="text-white text-xl text-center">{{ sadFace }}<br />No encontramos lo que buscas</p>
        </template>
    </div>
</template>