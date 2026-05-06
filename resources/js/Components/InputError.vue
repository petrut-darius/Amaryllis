<script setup lang="ts">
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-[10px] uppercase tracking-[0.2em] text-brand-ruby font-bold mt-2 italic">
            {{ message }}
        </p>
    </div>
</template>
