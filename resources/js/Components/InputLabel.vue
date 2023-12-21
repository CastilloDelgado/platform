<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-medium text-md text-black dark:text-white">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
