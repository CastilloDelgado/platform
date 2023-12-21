<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    class: {
        type: String,
        default: ""
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="dark:border-white  dark:bg-black dark:text-white border dark:placeholder:text-white/50 p-2"
        :class="class"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
