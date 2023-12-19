<script setup>
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import Snow from '@/Components/Snow.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Snow />
    <section class="dark:bg-white">

        <Navbar :canLogin="canLogin" :canRegister="canRegister" />
        
        <div class="min-h-[80vh] bg-white dark:bg-black space-y-6">

                <slot  />
                
        </div>
        
        <Footer />
    </section>
</template>