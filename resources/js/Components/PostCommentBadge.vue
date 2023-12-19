<script setup>
defineProps({
    comment: Object
})
</script>

<template>
    <div class="flex flex-row">
        <img src="/images/lary-avatar.svg" alt="Lary avatar" class="w-12 h-12">
        <div class="ml-2">
            <div class="flex flex-col mb-3">
                <h5 class="font-bold">{{ comment.user.name }}</h5>
                <p class="text-xs">{{ comment.created_at }}</p>
            </div>
            <p class="text-justify">{{ comment.body }}</p>
        </div>
    </div>
</template>