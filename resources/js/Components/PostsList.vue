
<script setup>
import createSadFace from '@/helpers';
import GridPaginator from './GridPaginator.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import DangerButton from './DangerButton.vue';
import PrimaryButton from './PrimaryButton.vue';
import PostListItem from './PostListItem.vue';

defineProps({
    posts: {
        type: Object,
        required: true
    }
})

const sadFace = ref(createSadFace())

</script>

<template>
    <template  v-if="posts?.data?.length > 0">
        <ul role="list" class="divide-y divide-gray-100">
            <PostListItem v-for="post in posts.data" :post="post" />
        </ul>
        <GridPaginator :paginator-info="posts" />
    </template>
    <template v-else>
        <div class="text-center py-12 flex flex-col space-y-6">
            <p class="text-4xl">{{ sadFace }}</p>
            <p class="text-black dark:text-white text-md text-center">No has creado ningún post (aún...)</p>
            <Link :href="route('posts.create')">
                <PrimaryButton>Crea un post aquí!</PrimaryButton>
                </Link>
        </div>
    </template>
</template>