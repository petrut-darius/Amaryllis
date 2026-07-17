<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center justify-center rounded-sm border border-brand-charcoal/10 bg-white px-8 py-3 text-[10px] font-medium tracking-[0.3em] text-brand-charcoal/60 uppercase transition-all duration-300 hover:border-brand-charcoal hover:text-brand-charcoal focus:ring-1 focus:ring-brand-ruby/20 focus:outline-none disabled:opacity-25"
    >
        <slot />
    </button>
</template>
