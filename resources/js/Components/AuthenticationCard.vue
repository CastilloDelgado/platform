<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-black">

        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-black shadow-md overflow-hidden sm:rounded-lg">
            <slot name="logo" />
            <slot />
        </div>
    </div>
</template>
