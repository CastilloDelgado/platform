<template>
    <div class="max-h-[60hv] flex flex-col sm:justify-center items-center sm:pt-0 bg-white dark:bg-black">

        <div
            class="w-full h-full grid place-content-center sm:max-w-md px-6 py-4 bg-white dark:bg-black shadow-md overflow-hidden sm:rounded-lg">
            <slot name="logo" />
            <slot />
        </div>
    </div>
</template>
