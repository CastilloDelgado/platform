<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
});
</script>

<template>
    <div>
        <button v-if="as=='button'" type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-black dark:text-white hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black focus:outline-none dark:focus:bg-gray-800 transition duration-150 ease-in-out">
            <slot />
        </button>

        <a v-else-if="as=='a'" :href="href" class="block w-full px-4 py-2 text-start text-sm leading-5 text-black dark:text-white hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black focus:outline-none dark:focus:bg-gray-800 transition duration-150 ease-in-out">
            <slot />
        </a>

        <Link v-else :href="href" class="block w-full px-4 py-2 text-start text-sm leading-5 text-black dark:text-white hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black focus:outline-none dark:focus:bg-gray-800 transition duration-150 ease-in-out">
            <slot />
        </Link>
    </div>
</template>
