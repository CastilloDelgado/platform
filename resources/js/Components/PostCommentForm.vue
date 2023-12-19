
<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from './PrimaryButton.vue';

const props = defineProps({
    postId: {
        type: Number,
        required: true
    }
})

const form = useForm({
    body: '',
})


const submitForm = () => form.post(`/posts/${props.postId}/comments`,{
    onSuccess: () => form.reset('body')
})

</script>

<template>
    <form class="w-full" @submit.prevent="submitForm">
        <p class="mb-2 font-bold">Agrega un comentario</p>
        <textarea v-model="form.body" required class="w-full bg-transparent dark:text-white outline-none mb-2 dark:placeholder:text-white/50" :rows="6" placeholder="¿Qué opinas de este review?" />
        <div class="flex justify-end">
            <PrimaryButton :disabled="form.processing">Publicar</PrimaryButton>
        </div>
    </form>
</template>