<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="h-10 items-center justify-center bg-white px-4 py-1 text-red-600 border-red-600 hover:bg-red-600 hover:text-white  dark:bg-black dark:text-red-500 dark:hover:bg-red-500 dark:hover:text-black border dark:border-red-500 font-semibold text-xs ">
        <slot />
    </button>
</template>
