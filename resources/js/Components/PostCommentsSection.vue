<script setup>
import PostCommentBadge from './PostCommentBadge.vue';

defineProps({
    comments: Array
})
</script>

<template>
    <div class="mt-6">
        <p class="font-bold text-lg mb-4">Comentarios</p>
        <div class="space-y-4">
           <PostCommentBadge v-for="comment in comments" :comment="comment" />
        </div>
    </div>
</template>