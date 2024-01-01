<script setup>
import { Link } from '@inertiajs/vue3';
import PostCommentBadge from './PostCommentBadge.vue';
import PostCommentForm from './PostCommentForm.vue';
import PrimaryButton from './PrimaryButton.vue';

defineProps({
    postId: {
        type: Number,
        required: true
    },
    comments: Array,
})

</script>

<template>
    <div class="mt-6">
        <p class="font-bold text-lg mb-4">Comentarios</p>
        <div class="space-y-4">
            <PostCommentForm :post-id="postId" v-if="$page.props.auth.user" />
            <div v-else>
                <Link :href="route('register')">
                <PrimaryButton>Ingresa para comentar!</PrimaryButton>
                </Link>
            </div>
            <PostCommentBadge v-for="comment in comments" :comment="comment" />
        </div>
    </div>
</template>