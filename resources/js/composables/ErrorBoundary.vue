<script setup lang="ts">
import { computed, onErrorCaptured, ref } from 'vue';

const error = ref<unknown>(null);

onErrorCaptured((err) => {
    error.value = err;

    

    return false;
});

function clearError() {
    error.value = null;
}

const slotProps = computed(() => {
    if(!error.value) return {};
    return { error: error.value, clearError};
});

const slotName = computed(() => (error.value ? "error": "default"));
</script>
<template>
    <slot :name="slotName" v-bind="slotProps"></slot>
</template>