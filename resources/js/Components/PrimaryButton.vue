<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-white dark:bg-black border font-semibold text-xs text-black dark:text-white tracking hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:hover:text-black dark:hover:border-black focus:ring-offset-2 dark:focus:ring-offset-gray-800">
        <slot />
    </button>
</template>
