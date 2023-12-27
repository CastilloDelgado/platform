<script setup>
import LogoIcon from "@/Components/LogoIcon.vue"
import { ref } from 'vue';
import NavbarLink from "./NavbarLink.vue";
import ProfileIconButton from "./ProfileIconButton.vue";
import NavbarButton from "./NavbarButton.vue";
import DropdownLink from "./DropdownLink.vue";
import ThemeSwitch from "./ThemeSwitch.vue"
import { router } from "@inertiajs/vue3";

const profileMenuIsOpen = ref(false)
const linkMenuIsOpen = ref(false)

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

const logout = () => router.get('/auth/logout')
</script>

<template>
    <nav class="bg-white dark:bg-black sticky top-0 z-10 border-b border-black dark:border-white text-black">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-0">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button @click="() => linkMenuIsOpen = !linkMenuIsOpen" type="button"
                        class="text-black hover:text-white hover:bg-black dark:text-white dark:hover:text-black dark:hover:bg-white relative inline-flex items-center justify-center px-2 py-1 transition"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                        Icon when menu is closed.

                        Menu open: "hidden", Menu closed: "block"
                    -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                        Icon when menu is open.

                        Menu open: "block", Menu closed: "hidden"
                    -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center md:justify-between sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <LogoIcon />
                    </div>

                    <div class="hidden sm:ml-6 sm:block">
                        <div v-if="canLogin" class="flex space-x-4">
                            <NavbarLink :href="route('welcome')" title="Inicio" :active="true" />
                            <NavbarLink v-if="$page.props.auth.user" :href="route('dashboard')" title="Dashboard" />
                            <template v-else>
                                <NavbarLink :href="route('login')" title="Iniciar Sesión" />
                                <NavbarLink v-if="canRegister" :href="route('register')" title="Registrate" />
                            </template>
                        </div>
                        <div v-else class="flex space-x-4">
                            <NavbarLink href="/" title="Inicio" :active="true" />
                        </div>
                    </div>
                </div>
                <div class="ml-4 pt-1">
                    <ThemeSwitch class="hidden md:block" />
                </div>
                <div v-if="$page.props.auth.user"
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <ProfileIconButton @click="() => profileMenuIsOpen = !profileMenuIsOpen" />
                        </div>
                        <div :class="{
                            'hidden': !profileMenuIsOpen,
                            'block': profileMenuIsOpen
                        }"
                            class="absolute right-[-4px] z-10 mt-2 w-48 origin-top-right border border-black bg-white dark:border-white dark:bg-black py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <DropdownLink :href="route('profile.show')">
                                Mi perfil
                            </DropdownLink>

                            <button @click="logout"
                                class="block w-full px-4 py-2 text-start text-sm leading-5 text-red-500 hover:bg-red-500 hover:text-black  dark:hover:bg-red-500 dark:hover:text-white ">
                                Cerrar Sesión
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu" :class="{
            'hidden': !linkMenuIsOpen,
            'block': linkMenuIsOpen
        }">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <div v-if="canLogin" class="flex space-x-4">
                    <NavbarLink :href="route('welcome')" title="Inicio" :active="true" />
                    <NavbarLink v-if="$page.props.auth.user" :href="route('dashboard')" title="Dashboard" />
                    <template v-else>
                        <NavbarLink :href="route('login')" title="Iniciar Sesión" />
                        <NavbarLink v-if="canRegister" :href="route('register')" title="Registrate" />
                    </template>
                </div>
                <template v-else>
                    <NavbarButton title="Inicio" :active="false" :href="route('welcome')" />
                    <NavbarButton title="Blog" :active="false" :href="route('welcome')" />
                </template>
            </div>
        </div>
    </nav>
</template>

