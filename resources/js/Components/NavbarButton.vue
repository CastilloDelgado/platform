<script setup>

defineProps({
    title: String,
    href: String,
    active: Boolean
})

</script>

<template>
    <a 
        :href="href"  
        class="block px-3 py-2 text-base font-medium text-sm" 
        :class="{
            'bg-black text-white': active,
            'bg-white text-black hover:bg-black hover:text-white': !active
        }"
        aria-current="page"
    >
        {{title}}
    </a>
</template>