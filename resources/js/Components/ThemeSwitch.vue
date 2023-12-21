<script setup>
import { useDark, useToggle } from '@vueuse/core'

const isDark = useDark()
const toggleDark = useToggle(isDark)

</script>

<template>
    <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" :checked="isDark" @change="toggleDark()"  class="sr-only peer">
        <div class="w-11 h-6 peer-focus:outline-none rounded-full peer bg-black dark:bg-white peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full  after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:border-black after:border after:bg-white dark:after:bg-black after:rounded-full before:h-5 after:h-5 after:w-5 after:transition-all " />
    </label>
</template>