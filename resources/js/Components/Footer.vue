<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="dark:bg-black bg-white w-full py-6 border-t dark:border-white">
        <div class="mx-auto max-w-7xl dark:text-white  text-black text-center">
            <Link href="/">
            <div class="flex justify-center">
                <p class="text-2xl font-bold font-serif mr-1">Life & Live Music</p>
                <p class="text-sm">[blog]</p>
            </div>
            </Link>
            <div class="flex text-sm justify-center">
                <p class="font-bold mr-1">Creado por:</p>
                <a href="https://www.instagram.com/castillodelgado/" target="_blank">
                    <p>Marco Castillo</p>
                </a>
            </div>
        </div>
    </div>
</template>