<script setup>

defineProps({
    list: {
        type: Array,
        required: true
    }
})
</script>

<template>
    <div class="relative flex lg:inline-flex items-center py-3 dark:bg-black dark:text-white dark:border-white">
        <select class="capitalize flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
            <option class="capitalize" value="category" disabled selected>categoría</option>
            <option class="capitalize" v-for="item in list" :value="item.id">{{ item.name }}</option>
        </select>
    </div>
</template>