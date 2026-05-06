<template>
    <button
        class="group relative inline-flex items-center justify-center overflow-hidden rounded-sm bg-brand-charcoal px-10 md:px-16 py-4 md:py-6 text-[10px] md:text-xs font-medium uppercase tracking-[0.5em] text-white transition-all duration-700 hover:shadow-2xl hover:shadow-brand-ruby/20 active:scale-95"
    >
        <!-- Hover Background Fill -->
        <div class="absolute inset-0 w-0 bg-brand-ruby transition-all duration-500 ease-out group-hover:w-full"></div>
        
        <!-- Button Text -->
        <span class="relative z-10 group-hover:text-white transition-colors duration-500">
            <slot />
        </span>

        <!-- Subtle Border Shine -->
        <div class="absolute inset-0 border border-brand-ruby/20 group-hover:border-brand-ruby/40 transition-colors duration-500"></div>
    </button>
</template>
