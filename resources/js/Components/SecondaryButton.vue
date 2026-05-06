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
        class="inline-flex items-center justify-center border border-brand-charcoal/10 bg-white px-8 py-3 text-[10px] font-medium uppercase tracking-[0.3em] text-brand-charcoal/60 transition-all duration-300 hover:text-brand-charcoal hover:border-brand-charcoal focus:outline-none focus:ring-1 focus:ring-brand-ruby/20 disabled:opacity-25 rounded-sm"
    >
        <slot />
    </button>
</template>
