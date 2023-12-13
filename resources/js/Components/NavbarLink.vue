<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    title: String,
    href: String,
    active: Boolean
})

</script>

<template>
    <Link 
        :href="href" 
        aria-current="page" 
        class="text-black text-sm border-black pt-2" 
        :class="{
            'border-b hover:border-none font-bold': active,
            'hover:border-b ': !active,
        }"
    >

    <span class="pt-2">

        {{ title }} 
    </span>
    </Link>
</template>