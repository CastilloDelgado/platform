<script setup>
import { format, formatDistance, formatRelative, subDays } from 'date-fns'

defineProps({
    comment: Object
})
</script>

<template>
    <div class="flex flex-row">
        <img :src="post.user.profile_photo_url" alt="Lary avatar" class="w-12 h-12">
        <div class="ml-2">
            <div class="flex flex-col mb-3">
                <h5 class="font-bold">{{ comment.user.name }}</h5>
                <p class="text-xs">{{ formatDistance(new Date(comment.created_at), new Date(), { addSuffix: true }) }}</p>
            </div>
            <p class="text-justify">{{ comment.body }}</p>
        </div>
    </div>
</template>