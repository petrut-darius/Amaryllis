<script setup lang="ts">
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label
        class="block text-[9px] font-medium tracking-[0.4em] text-brand-charcoal/40 uppercase"
    >
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
