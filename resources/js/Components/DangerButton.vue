<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="h-12 items-center justify-center px-4 py-2 bg-red-600 dark:bg-black dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-black border dark:border-red-500 font-semibold text-xs ">
        <slot />
    </button>
</template>
