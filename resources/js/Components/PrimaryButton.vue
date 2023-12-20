<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="h-12 items-center px-4 py-2 bg-white dark:bg-black border font-semibold text-xs text-black dark:text-white tracking hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 dark:hover:text-black dark:hover:border-black ">
        <slot />
    </button>
</template>
