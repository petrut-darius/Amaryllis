<template>
    <button
        class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-ruby px-8 py-3 text-xs font-bold tracking-[0.3em] text-white uppercase transition-all duration-500 hover:shadow-xl hover:shadow-brand-ruby/20 active:scale-95 md:px-12 md:py-4 md:text-sm"
    >
        <!-- Hover Background Fill -->
        <div
            class="absolute inset-0 w-0 bg-brand-gold transition-all duration-500 ease-out group-hover:w-full"
        ></div>

        <!-- Button Text -->
        <span
            class="relative z-10 transition-colors duration-500 group-hover:text-brand-charcoal"
        >
            <slot />
        </span>

        <!-- Subtle Border Shine -->
        <div
            class="absolute inset-0 border border-brand-gold/30 transition-colors duration-500 group-hover:border-brand-gold/60"
        ></div>
    </button>
</template>
