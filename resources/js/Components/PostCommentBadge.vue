<script setup>
import { formatDistance } from 'date-fns'
import DangerButton from './DangerButton.vue';
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    comment: Object
})

const deleteComment = () => router.delete(`post-comment/${props.comment.id}`)

</script>

<template>
    <div class="flex flex-row">
        <img :src="comment.user.profile_photo_url" alt="Lary avatar"
            class="w-12 h-12 border border-black dark:border-white">
        <div class="ml-2 w-full">
            <div class="flex flex-col mb-3">
                <h5 class="font-bold">{{ comment.user.name }}</h5>
                <p class="text-xs">{{ formatDistance(new Date(comment.created_at), new Date(), { addSuffix: true }) }}</p>
            </div>
            <p class="text-justify">{{ comment.body }}</p>
        </div>
        <div class="self-start ml-2" v-if="$page.props.auth.user.id === comment.user.id">
            <DangerButton class="p-1 h-auto" @click="deleteComment">Eliminar</DangerButton>
        </div>
    </div>
</template>