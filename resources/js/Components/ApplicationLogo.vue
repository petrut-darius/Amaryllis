<script setup lang="ts">
defineProps({
    size: {
        type: String,
        default: 'normal',
    },
});
</script>
<template>
    <div class="group flex cursor-pointer flex-col items-center">
        <div
            class="font-serif tracking-[0.3em] text-brand-ruby uppercase transition-all duration-700"
            :class="{
                'text-2xl': size === 'normal',
                'text-4xl md:text-6xl': size === 'large',
                'text-xl': size === 'small',
            }"
        >
            Amaryllis
        </div>
        <div
            class="mt-2 font-sans tracking-[0.8em] uppercase"
            :class="{
                'text-[8px]': size === 'normal',
                'text-[12px]': size === 'large',
                'text-[7px]': size === 'small',
            }"
        >
            Design Floral - Targu Mures
        </div>
    </div>
</template>
