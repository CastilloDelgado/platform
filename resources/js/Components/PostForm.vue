<script setup>
import { computed, onMounted, ref, watch } from 'vue';
import InputError from './InputError.vue';
import InputLabel from './InputLabel.vue';
import PrimaryButton from './PrimaryButton.vue';
import TextInput from './TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import ImageCarousel from './ImageCarousel.vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    editing: {
        type: Boolean,
        default: false
    },
    post: {
        type: Object,
    }
});

const form = useForm({
    title: "",
    slug: "",
    excerpt: "",
    body: "",
    category_id: "",
    thumbnail_url: "",
    images: []
})

const thumbnailUpdated = ref(false)
const thumbnailPreview = ref('')

const submitForm = () => {
    if(props.editing){
        form.patch('/posts/update')
    } else {
        form.post('/posts/store')
    }
}

const resetForm = () => {
    form.reset()
    thumbnailUpdated.value = false
}

const handleThumbnailChange = (event) => {
    form.thumbnail_url = event.target.files[0]
    if(props.editing){
        thumbnailUpdated.value = true
    }
}

const handelImagesChange = (event) => form.images = event.target.files

watch(
    form, 
    (newForm) => {
        console.log("executing")
        if(props.editing){
            if(thumbnailUpdated.value){
                thumbnailPreview.value = newForm.thumbnail_url? URL.createObjectURL(newForm.thumbnail_url) : ''
            } else {
                thumbnailPreview.value = newForm.thumbnail_url
            }
        } else {   
            thumbnailPreview.value = newForm.thumbnail_url ? URL.createObjectURL(newForm.thumbnail_url) : ''
        }
    },
    {
        immediate: true
    }
)

const imagesPreview = computed(() => {
    if(props.editing){
        return props.post.images.map((image) => image.image_url)
    }

    return Array.from(form.images).length > 0 ? Array.from(form.images).map(image => URL.createObjectURL(image)) : []
})

onMounted(() => {
    if(props.editing){
        form.defaults({
            title:  props.post.title,
            slug:  props.post.slug,
            excerpt:  props.post.excerpt,
            body:  props.post.body,
            category_id:  props.post.category_id,
            thumbnail_url: props.post.thumbnail_url
        })

        form.reset()
    }
})

</script>

<template>
    <div class="pt-2 pb-12">
        <form @reset.prevent="resetForm" @submit.prevent="submitForm" class="max-w-lg mx-auto space-y-2">
            <p class="font-serif font-bold text-xl text-center px-12">Completa el formulario para publicar un nuevo post!</p>
            <div class="">
                <InputLabel for="title" value="Titulo" />
                <TextInput  
                    id="title"
                    v-model="form.title"
                    type="title"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="Titulo"
                />
                <div v-show="form.errors.title" class="flex justify-end">
                    <InputError :message="form.errors.title" />
                </div>
            </div>
            <div class="">
                <InputLabel for="slug" value="Slug" />
                <TextInput  
                    id="slug"
                    v-model="form.slug"
                    type="slug"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="Slug"
                />
                <div v-show="form.errors.slug" class="flex justify-end">
                    <InputError :message="form.errors.slug" />
                </div>
            </div>

            <!-- Thumbnail -->
            <div class="">
                <InputLabel for="thumbnail_url" value="Thumbnail" />
                <div class="flex flex-row w-full">
                    <div>
                        <input  
                            id="thumbnail_url"
                            @change="handleThumbnailChange"
                            type="file"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="Slug"
                        />
                    </div>
                    <div class="w-full justify-center">
                        <img :src="thumbnailPreview" class="w-64"/>
                    </div>
                </div>
                <div v-show="form.errors.thumbnail_url" class="flex justify-end">
                    <InputError :message="form.errors.thumbnail_url" />
                </div>
            </div>

            <!-- Images -->
            <div class="">
                <InputLabel for="thumbnail_url" value="Galería de Imagenes" />
                <div class="flex flex-col w-full">
                    <div class="mb-2">
                        <input  
                            id="thumbnail_url"
                            @change="handelImagesChange"
                            type="file"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            multiple
                        />
                    </div>
                    <div class="w-full justify-center">
                       <ImageCarousel :images="imagesPreview" />
                    </div>
                </div>
                <div v-show="form.errors.thumbnail_url" class="flex justify-end">
                    <InputError :message="form.errors.thumbnail_url" />
                </div>
            </div>
            <div class="">
                <InputLabel for="excerpt" value="Resumen del post" />
                <textarea 
                    id="excerpt"
                    v-model="form.excerpt"
                    type="excerpt"
                    class="mt-1 block w-full dark:bg-black border dark:border-white"
                    required
                    rows="4"
                    autofocus
                    autocomplete="Titulo"
                />
                <div v-show="form.errors.excerpt" class="flex justify-end">
                    <InputError :message="form.errors.excerpt" />
                </div>
            </div>
            <div class="">
                <InputLabel for="body" value="Cuerpo del post" />
                <textarea 
                    id="body"
                    v-model="form.body"
                    type="body"
                    class="mt-1 block w-full dark:bg-black border dark:border-white"
                    required
                    rows="12"
                    autofocus
                    autocomplete="Titulo"
                />
                <div v-show="form.errors.body" class="flex justify-end">
                    <InputError :message="form.errors.body" />
                </div>
            </div>
            <div class="">
                <InputLabel for="category_id" value="Categoria"/>
                <select 
                    v-model="form.category_id" 
                    class="capitalize flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
                    required    
                >
                    <option class="capitalize" value="category" disabled selected>categoría</option>
                    <option class="capitalize" v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
                <div v-show="form.errors.category_id" class="flex justify-end">
                    <InputError :message="form.errors.category_id" />
                </div>
            </div>
            <div class="pt-6 flex gap-2">
                <PrimaryButton v-if="editing" class="w-full" type="reset" @click="form.reset()">Cancelar cambios</PrimaryButton>
                <PrimaryButton type="submit" class="w-full">{{ editing ? "Editar post" : "Publicar Post"}}</PrimaryButton>
            </div>
        </form>
    </div> 
</template>