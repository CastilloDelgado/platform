<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type"
        class="h-10 items-center md:px-4 px-2  py-1 bg-white hover:text-white border-black dark:border-white dark:bg-black border font-semibold text-xs md:text-sm text-black dark:text-white tracking hover:bg-black dark:hover:bg-white  dark:focus:bg-white  dark:hover:text-black dark:hover:border-black ">
        <slot />
    </button>
</template>
