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
const isMobile = ref(false);

const updateHeaderHeight = () => {
    const header = document.querySelector('header');
    if (header) {
        headerHeight.value = header.offsetHeight;
    }
    isMobile.value = window.innerWidth < 768;
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

    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.id = "structured-data";
    script.textContent = structuredData.value;
    document.head.appendChild(script);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('resize', updateHeaderHeight);
    if (rafId) cancelAnimationFrame(rafId);

    const existing = document.head.querySelector('script#structured-data');
    if (existing) existing.remove()
});

const heroScrollProgress = computed(() => {
    if (typeof window === 'undefined') return 0;
    
    // Use documentElement.clientHeight for more stable vh on mobile Safari
    const vh = document.documentElement.clientHeight || window.innerHeight;
    const heroCenter = headerHeight.value + (vh * 0.5);
    const viewportCenter = vh / 2;
    const triggerPoint = heroCenter - viewportCenter;
    
    if (scrollY.value <= triggerPoint) return 0;
    
    // Adjusted duration for a more controlled travel distance
    const scrollDuration = vh * 0.5; 
    const progress = (scrollY.value - triggerPoint) / scrollDuration;
    
    return Math.min(Math.max(progress, 0), 1);
});

const pinnedOffset = computed(() => {
    if (typeof window === 'undefined') return 0;
    const vh = document.documentElement.clientHeight || window.innerHeight;
    const heroCenter = headerHeight.value + (vh * 0.5);
    const viewportCenter = vh / 2;
    const triggerPoint = heroCenter - viewportCenter;
    
    if (scrollY.value <= triggerPoint) return 0;
    
    const scrollDuration = vh * 0.5;
    const offset = scrollY.value - triggerPoint;
    
    // Reduced pinning and sink to avoid hitting the image below
    const pinning = Math.min(offset, scrollDuration);
    const sink = heroScrollProgress.value * (vh * 0.05);
    
    return pinning + sink;
});

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "LocalBusiness",
                "@id": "https://amaryllis-flori.ro/#organization",
                "name": "Amaryllis Floral Design",
                "url": "https://amaryllis-flori.ro",
                "logo": "https://amaryllis-flori.ro/amaryllis_logo.png",
                "image": "https://amaryllis-flori.ro/amaryllis_logo.png",
                "description": "Florărie boutique în Târgu Mureș specializată în design floral creativ, buchete artizanale și decor pentru evenimente.",
                "telephone": "+40743331147",
                "email": "hello@amaryllis.com",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Târgu Mureș",
                    "addressCountry": "RO"
                },
                "geo": {
                    "@type": "GeoCoordinates",
                    "latitude": 46.53663,
                    "longitude": 24.58163
                },
                "openingHoursSpecification": [
                    {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": [
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday"
                        ],
                        "opens": "09:00",
                        "closes": "19:00"
                    }
                ],
                "sameAs": [
                    "https://www.facebook.com/amaryllis.flori",
                    "https://www.instagram.com/amaryllis.flori"
                ]
            },
            {
                "@type": "WebSite",
                "@id": "https://amaryllis-flori.ro/#website",
                "url": "https://amaryllis-flori.ro",
                "name": "Amaryllis Floral Design",
                "publisher": {
                    "@id": "https://amaryllis-flori.ro/#organization"
                },
                "inLanguage": "ro-RO"
            }
        ]
    });
});
</script>

<template>
    <Head>
        <title>Amaryllis | Florărie Târgu Mureș - Design Floral Creativ</title>
        <meta name="description" content="Florărie boutique în Târgu Mureș. Creăm buchete unice, aranjamente florale pentru evenimente, nunți și botezuri. Livrare flori la domiciliu și design floral de excepție.">
        <link rel="canonical" :href="route('home')" />

        <meta property="og:title" content="Amaryllis | Florărie Târgu Mureș - Design Floral Creativ" />
        <meta property="og:description" content="Florărie boutique în Târgu Mureș. Creăm buchete unice, aranjamente florale pentru evenimente, nunți și botezuri." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('home')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="mt-4">
            <!-- Hero Section: Editorial & Grand -->
            <section 
                class="relative min-h-[85dvh] flex items-center justify-center -mx-4 sm:-mx-8 animate-fade-in"
                :style="{ marginBottom: isMobile ? `${35 + heroScrollProgress * 10}dvh` : `${35 + heroScrollProgress * 40}dvh` }"
            >
                <div 
                    class="absolute inset-0 z-0 overflow-hidden transform-gpu"
                    :style="{ opacity: 1 - heroScrollProgress }"
                >
                    <img 
                        src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=1600" 
                        alt="Editorial Floral Design"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-brand-charcoal/20 via-transparent to-brand-cream/60"></div>
                </div>

                <div class="relative z-30 flex items-center justify-center w-full px-4 sm:px-6">
                    <div 
                        class="flex flex-col items-center text-center will-change-transform transform-gpu"
                        :style="{ 
                            transform: `translate3d(0, ${isMobile ? pinnedOffset * 0.8 : pinnedOffset}px, 0) scale(${1 + heroScrollProgress * 0.01})`,
                            transition: 'transform 0.1s linear'
                        }"
                    >
                        <!-- Logo Image (Original Size) -->
                        <div class="mb-8">
                            <img 
                                src="/amaryllis_logo.png" 
                                alt="Amaryllis Floral Design" 
                                class="mx-auto w-32 md:w-auto" 
                            />
                        </div>

                        
                        <!-- Buttons Container -->
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate-fade-in-up delay-500 mb-2">
                            <Link :href="route('contact.create')">
                                <PrimaryButton>Start an Inquiry</PrimaryButton>
                            </Link>
                            <Link 
                                :href="route('bouquets')" 
                                class="text-[10px] uppercase tracking-[0.4em] text-brand-ruby transition-all border-b border-white/20 pb-2 hover:border-brand-ruby hover:tracking-[0.5em] drop-shadow-lg"
                            >
                                View the Collection
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Editorial -->
            <section class="px-4 sm:px-6 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 relative group">
                        <div class="aspect-[4/5] overflow-hidden bg-brand-sage/20 shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=1200" alt="Philosophy" class="w-full h-full object-cover grayscale-[0.3]" />
                        </div>
                        <!-- Overlapping Text -->
                        <div class="absolute -bottom-8 -right-4 lg:-bottom-12 lg:-right-16 bg-brand-cream p-6 lg:p-12 shadow-xl max-w-[280px] md:max-w-md animate-fade-in-up delay-700">
                            <h2 class="text-2xl md:text-5xl font-serif text-brand-charcoal leading-tight">
                                A language spoken in <span class="italic font-normal text-brand-gold font-script text-3xl md:text-4xl lowercase tracking-normal">petals</span>.
                            </h2>
                        </div>
                    </div>
                    <div class="lg:col-span-5 space-y-8 pt-16 lg:pt-0 lg:pl-12">
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
            <section class="py-12 md:py-20 text-center space-y-12 md:space-y-16">
                <div class="space-y-8 md:space-y-12 px-4 md:px-0">
                    <h2 class="text-4xl md:text-[10rem] font-serif text-brand-charcoal leading-none tracking-tighter">Ready to <span class="italic font-normal text-brand-ruby font-script text-5xl md:text-[12rem] tracking-normal">Bloom?</span></h2>
                    <p class="text-brand-charcoal/40 uppercase tracking-[0.6em] md:tracking-[0.8em] text-[10px] md:text-[12px]">Let's collaborate on your next moment.</p>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-12">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start Your Inquiry</PrimaryButton>
                    </Link>
                    <Link :href="route('gallery')" class="text-[10px] md:text-[12px] uppercase tracking-[0.4em] md:tracking-[0.5em] hover:text-brand-gold transition-all border-b border-brand-charcoal/10 pb-2 hover:tracking-[0.6em] md:hover:tracking-[0.7em]">
                        View Portfolio
                    </Link>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
}

@keyframes reveal {
    from { clip-path: inset(100% 0 0 0); }
    to { clip-path: inset(0 0 0 0); }
}

.animate-reveal {
    animation: reveal 1.5s cubic-bezier(0.77, 0, 0.175, 1) forwards;
}

.delay-300 { animation-delay: 0.3s; }
.delay-500 { animation-delay: 0.5s; }
.delay-700 { animation-delay: 0.7s; }
</style>
