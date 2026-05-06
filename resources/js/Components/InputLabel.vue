<script setup lang="ts">
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block font-medium text-[9px] uppercase tracking-[0.4em] text-brand-charcoal/40">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
