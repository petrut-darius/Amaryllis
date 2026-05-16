<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted, computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const scrollY = ref(0);
const targetScrollY = ref(0);
const headerHeight = ref(0);

const updateHeaderHeight = () => {
    const header = document.querySelector('header');
    if (header) {
        headerHeight.value = header.offsetHeight;
    }
};

let rafId = null;
const lerp = (start, end, factor) => start + (end - start) * factor;

const smoothScrollLoop = () => {
    // Smoothly interpolate scrollY towards targetScrollY
    // 0.1 is the smoothing factor (lower = smoother/slower)
    scrollY.value = lerp(scrollY.value, targetScrollY.value, 0.1);
    
    // Continue the loop if there's still a significant difference
    if (Math.abs(scrollY.value - targetScrollY.value) > 0.01) {
        rafId = requestAnimationFrame(smoothScrollLoop);
    } else {
        scrollY.value = targetScrollY.value;
        rafId = null;
    }
};

const handleScroll = () => {
    targetScrollY.value = window.scrollY;
    if (!rafId) {
        rafId = requestAnimationFrame(smoothScrollLoop);
    }
};

onMounted(() => {
    updateHeaderHeight();
    targetScrollY.value = window.scrollY;
    scrollY.value = window.scrollY;
    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('resize', updateHeaderHeight);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('resize', updateHeaderHeight);
    if (rafId) cancelAnimationFrame(rafId);
});

const heroScrollProgress = computed(() => {
    if (typeof window === 'undefined') return 0;
    
    const vh = window.innerHeight;
    const heroCenter = headerHeight.value + (vh * 0.5);
    const viewportCenter = vh / 2;
    const triggerPoint = heroCenter - viewportCenter;
    
    if (scrollY.value <= triggerPoint) return 0;
    
    // Increased duration for a longer travel distance
    const scrollDuration = vh * 0.7; 
    const progress = (scrollY.value - triggerPoint) / scrollDuration;
    
    return Math.min(Math.max(progress, 0), 1);
});

const pinnedOffset = computed(() => {
    if (typeof window === 'undefined') return 0;
    const vh = window.innerHeight;
    const heroCenter = headerHeight.value + (vh * 0.6);
    const viewportCenter = vh / 2;
    const triggerPoint = heroCenter - viewportCenter;
    
    if (scrollY.value <= triggerPoint) return 0;
    
    const scrollDuration = vh * 0.7;
    const offset = scrollY.value - triggerPoint;
    
    // Pin to center + "Sink" further down (extra 25vh of downward travel)
    const pinning = Math.min(offset, scrollDuration);
    const sink = heroScrollProgress.value * (vh * 0.25);
    
    return pinning + sink;
});
</script>

<template>
    <Head title="Artful Floral Design | Amaryllis" />

    <GuestLayout>
        <div class="mt-8">
            <!-- Hero Section: Editorial & Grand -->
            <section 
                class="relative min-h-[85vh] flex items-center justify-center -mx-4 sm:-mx-8"
                :style="{ marginBottom: `${40 + heroScrollProgress * 55}vh` }"
            >
                <div class="absolute inset-0 z-0 overflow-hidden">
                    <img 
                        src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=1600" 
                        alt="Editorial Floral Design"
                        class="w-full h-full object-cover animate-subtle-zoom"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-brand-charcoal/20 via-transparent to-brand-cream/60"></div>
                </div>

                <div class="relative z-30 flex items-center justify-center w-full px-4 sm:px-6">
                    <div 
                        class="flex flex-col items-center text-center will-change-transform"
                        :style="{ 
                            transform: `translateY(${pinnedOffset}px) scale(${1 + heroScrollProgress * 0.01})`,
                            transition: 'transform 0.1s linear'
                        }"
                    >
                        <!-- Logo Image (Original Size) -->
                        <div class="mb-8">
                            <img 
                                src="/amaryllis_logo.png" 
                                alt="Amaryllis Floral Design" 
                                class="mx-auto" 
                            />
                        </div>
                        
                        <!-- Buttons Container -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-8 animate-fade-in-up delay-500">
                            <Link :href="route('contact.create')">
                                <PrimaryButton>Start an Inquiry</PrimaryButton>
                            </Link>
                            <Link 
                                :href="route('bouquets')" 
                                class="text-[10px] uppercase tracking-[0.4em] text-brand-gold transition-all border-b border-white/20 pb-2 hover:border-brand-gold hover:tracking-[0.5em] drop-shadow-lg"
                            >
                                View the Collection
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Editorial -->
            <section class="px-4 sm:px-6 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                    <div class="lg:col-span-7 relative group">
                        <div class="aspect-[4/5] overflow-hidden bg-brand-sage/20 shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=1200" alt="Philosophy" class="w-full h-full object-cover grayscale-[0.3]" />
                        </div>
                        <!-- Overlapping Text -->
                        <div class="absolute -bottom-12 -right-4 lg:-right-16 bg-brand-cream p-8 lg:p-16 shadow-xl max-w-md animate-fade-in-up delay-700">
                            <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal leading-tight">
                                A language spoken in <span class="italic font-normal text-brand-gold font-script text-4xl lowercase tracking-normal">petals</span>.
                            </h2>
                        </div>
                    </div>
                    <div class="lg:col-span-5 space-y-12 pt-12 lg:pt-0 lg:pl-12">
                        <p class="text-sm md:text-base text-brand-charcoal/60 leading-relaxed font-light italic">
                            "We believe flowers are more than decoration—they are a medium for emotion, a way to capture the fleeting beauty of a moment and hold it close to our hearts forever."
                        </p>
                        <div class="pt-4">
                            <Link :href="route('about')" class="inline-block group">
                                <span class="text-[10px] uppercase tracking-[0.4em] text-brand-charcoal/40 group-hover:text-brand-charcoal transition-all group-hover:tracking-[0.5em]">Our Full Story</span>
                                <div class="h-px bg-brand-gold w-0 group-hover:w-full transition-all duration-700 mt-2"></div>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            
            <!-- Final CTA: Bold Editorial -->
            <section class="py-32 text-center space-y-24">
                <div class="space-y-12">
                    <h2 class="text-6xl md:text-[10rem] font-serif text-brand-charcoal leading-none tracking-tighter">Ready to <span class="italic font-normal text-brand-ruby font-script text-7xl md:text-[12rem] tracking-normal">Bloom?</span></h2>
                    <p class="text-brand-charcoal/40 uppercase tracking-[0.8em] text-[12px]">Let's collaborate on your next moment.</p>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center gap-16">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start Your Inquiry</PrimaryButton>
                    </Link>
                    <Link :href="route('gallery')" class="text-[12px] uppercase tracking-[0.5em] hover:text-brand-gold transition-all border-b border-brand-charcoal/10 pb-2 hover:tracking-[0.7em]">
                        View Portfolio
                    </Link>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
