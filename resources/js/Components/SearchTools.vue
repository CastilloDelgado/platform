<script setup>
import TextInput from '@/Components/TextInput.vue';
import SelectDropdown from './SelectDropdown.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import throttle from "lodash/throttle"


const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    filters: {
        type: Object
    }
})

const search = ref(props.filters.search)

watch(search, throttle(value => {
    router.get('/', {
        search: value
    }, {
        preserveState: true,
        preserveScroll: true,
        replace: true
    })
}, 500))

</script>

<template>
    <div class="w-full flex justify-center flex-wrap gap-x-2 space-y-2 lg:space-y-0 lg:space-x-4 mt-8 mb-6">
        <!--  Category -->
        <SelectDropdown :list="categories" />

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center">
            <form method="GET" action="#">
                <!-- <input type="text" name="search" placeholder="Find something"
                        class="bg-transparent placeholder-black font-semibold text-sm"> -->
                <TextInput v-model="search" placeholder="Buscar por palabra clave" />
            </form>
        </div>
    </div>
</template>