<script setup lang="ts">
defineProps({
    size: {
        type: String,
        default: 'normal'
    }
})
</script>
<template>
    <div class="flex flex-col items-center group cursor-pointer">
        <div 
            class="font-serif tracking-[0.3em] uppercase text-brand-charcoal transition-all duration-700 group-hover:text-brand-ruby"
            :class="{
                'text-2xl': size === 'normal',
                'text-4xl md:text-6xl': size === 'large',
                'text-xl': size === 'small'
            }"
        >
            Amaryllis
        </div>
        <div 
            class="tracking-[0.8em] uppercase text-brand-charcoal/30 mt-2 font-sans font-light"
            :class="{
                'text-[8px]': size === 'normal',
                'text-[10px]': size === 'large',
                'text-[7px]': size === 'small'
            }"
        >
            Floral Design
        </div>
    </div>
</template>
