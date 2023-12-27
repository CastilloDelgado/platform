<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    title: String,
    canLogin: Boolean,
    canRegister: Boolean,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>

        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-white dark:bg-black">

            <Navbar :canLogin="canLogin" :canRegister="canRegister" />

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white dark:bg-black">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="dark:bg-black min-h-[80vh]">
                <slot />
            </main>

            <Footer />
        </div>
    </div>
</template>
