
<script setup>
import createSadFace from '@/helpers';
import GridPaginator from './GridPaginator.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

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
            <li class="flex justify-between gap-x-6 py-5" v-for="i in [1,2,3,4,5,6]">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">leslie.alexander@example.com</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
        </ul>
        <!-- <GridPaginator /> -->
    </template>
    <template v-else>
        <div class="text-center py-12 flex flex-col space-y-2">
            <p class="text-4xl">{{ sadFace }}</p>
            <p class="text-white text-xl text-center">No tienes posts creados aún</p>
            <Link href="#">Crea uno aquí</Link>
        </div>
    </template>
</template>