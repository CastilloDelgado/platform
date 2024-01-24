<script setup>
import { ref, computed, onMounted, defineEmits, watch } from 'vue'
import {
    Combobox,
    ComboboxInput,
    ComboboxOptions,
    ComboboxOption,
} from '@headlessui/vue'

const emit = defineEmits(['selectArtist'])

const props = defineProps({
    artistList: {
        type: Array,
        required: true,
        default: []
    }
})

const artists = ref([])

const selectedArtist = ref(artists[0])
const query = ref('')

const filteredArtists = computed(() =>
    query.value === '' ? artists.value : artists.value.filter((artist) => {
        return artist.name.toLowerCase().includes(query.value.toLowerCase())
    })
)

watch(selectedArtist, (newArtistSelected) => {
    emit('selectArtist', newArtistSelected)
})

onMounted(() => {
    if (props.artistList.length > 0) {
        artists.value = [...props.artistList]
    }
})
</script>
  
<template>
    <Combobox v-model="selectedArtist">
        <ComboboxInput @change="query = $event.target.value" :displayValue="(artist) => artist.name" class="text-black" />
        <ComboboxOptions>
            <ComboboxOption v-for="artist in filteredArtists" :key="artist.id" :value="artist"
                :disabled="artist.unavailable">
                {{ artist.name }}
            </ComboboxOption>
        </ComboboxOptions>
    </Combobox>
</template>
