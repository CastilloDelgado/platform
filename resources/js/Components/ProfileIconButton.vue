<template>
    <button type="button" class="relative flex text-sm" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 border-black dark:border-l-white dark:border-t-white dark:shadow-[4px_4px_0px_0px_rgba(255,255,255,1)] border-[1.5px] shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]"
            :src="$page.props.auth.user.profile_photo_url" alt="">
    </button>
</template>