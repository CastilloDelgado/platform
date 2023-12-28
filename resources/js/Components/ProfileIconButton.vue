<template>
    <button type="button" class="relative flex text-sm" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 border border-black dark:border-white" :src="$page.props.auth.user.profile_photo_url" alt="">
    </button>
</template>