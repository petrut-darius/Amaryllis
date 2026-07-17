<script setup lang="ts">
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p
            class="mt-2 text-[10px] font-bold tracking-[0.2em] text-brand-ruby uppercase italic"
        >
            {{ message }}
        </p>
    </div>
</template>
