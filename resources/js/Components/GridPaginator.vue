<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    paginatorInfo: {
        type: Object,
        required: true
    }
})

</script>

<template>
    <div class="flex items-center justify-between border-non py-3 ">
        <div class="flex flex-col md:flex-row sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm dark:text-white mb-2">
                    Mostrando de
                    <span class="font-medium">{{ paginatorInfo.from }}</span>
                    a
                    <span class="font-medium">{{ paginatorInfo.to }}</span>
                    de
                    <span class="font-medium">{{ paginatorInfo.total }}</span>
                    resultados
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px " aria-label="Pagination">
                    <Link v-for="(link, index) in paginatorInfo.links" :href="link.url || ''" as="button"
                        :disabled="!link.url"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold  border-black dark:border-white hover:bg-black  hover:text-white dark:hover:bg-white dark:hover:text-black border"
                        :class="{
                            'bg-black text-white dark:bg-white dark:text-black': link.active,
                            'dark:text-white': !link.active
                        }" preserve-scroll>
                    {{ index === 0 ? '<' : '' }} {{ index !== 0 && index < paginatorInfo.links.length - 1 ? link.label : ''
                    }} {{ index === paginatorInfo.links.length - 1 ? '>' : '' }} </Link>
                </nav>
            </div>
        </div>
    </div>
</template>