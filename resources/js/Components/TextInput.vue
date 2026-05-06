<script setup lang="ts">
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

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
        class="w-full border-0 border-b border-brand-charcoal/10 bg-transparent py-4 px-0 text-brand-charcoal placeholder:text-brand-charcoal/20 focus:border-brand-ruby focus:ring-0 transition-all duration-300 text-sm font-light outline-none"
        v-model="model"
        ref="input"
    />
</template>
