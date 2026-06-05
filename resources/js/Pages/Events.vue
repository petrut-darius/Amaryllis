<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    {
        name: 'Weddings',
        routeName: 'weddings',
        image: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80&w=800',
        description: 'Creating timeless memories for your most special day.'
    },
    {
        name: 'Baptisms',
        routeName: 'baptisms',
        image: 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&q=80&w=800',
        description: 'Elegant floral touches for new beginnings.'
    },
    {
        name: 'Eighteenths',
        routeName: 'eighteenths',
        image: 'https://images.unsplash.com/photo-1530103043960-ef38714abb15?auto=format&fit=crop&q=80&w=800',
        description: 'Vibrant arrangements for celebrating your milestones.'
    }
];

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Evenimente & Design Floral | Amaryllis",
        "description": "Design floral artistic pentru nunți, botezuri și majorate în Târgu Mureș.",
        "publisher": {
            "@id": "https://amaryllis-flori.ro/#organization"
        }
    });
});

onMounted(() => {
    const script = document.createElement("script");
    script.type = "application/ld+json";
    script.id = "structured-data";
    script.textContent = structuredData.value;
    document.head.appendChild(script);
});

onUnmounted(() => {
    const existing = document.head.querySelector('script#structured-data');
    if (existing) existing.remove();
});
</script>

<template>
    <Head>
        <title>Evenimente & Design Floral | Amaryllis Târgu Mureș</title>
        <meta name="description" content="Elevăm orice ocazie prin design floral artistic. Transformăm spații și momente în experiențe de neuitat prin compoziții atent studiate și frumusețe naturală.">
        <link rel="canonical" :href="route('events')" />

        <meta property="og:title" content="Evenimente & Design Floral | Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Elevăm orice ocazie prin design floral artistic la Amaryllis." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('events')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-12">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Occasions</span>
                <h1 class="text-4xl md:text-7xl font-serif text-brand-charcoal">The Events</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Elevating every occasion with artistic floral design. We transform spaces and moments into unforgettable experiences through thoughtful composition and natural beauty.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-4 lg:gap-12">
                <Link v-for="(category, idx) in categories" :key="category.name" :href="route(category.routeName)" 
                    class="group relative aspect-[3/4] overflow-hidden bg-brand-cream rounded-sm shadow-sm ring-1 ring-brand-charcoal/5"
                >
                    <img 
                        :src="category.image" 
                        :alt="category.name" 
                        class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-[2s]" 
                    />

                    <div class="absolute inset-0 bg-brand-charcoal/20 group-hover:bg-brand-charcoal/40 transition-colors duration-700"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-center p-12 text-center text-white">
                        <div class="space-y-6">
                            <h3 class="text-3xl font-serif tracking-[0.1em]">{{ category.name }}</h3>
                            <div class="w-8 h-px bg-white/40 mx-auto"></div>
                            <p class="text-[10px] uppercase tracking-[0.3em] font-light opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-100">
                                {{ category.description }}
                            </p>
                            <span class="inline-block mt-4 border border-white px-8 py-3 text-[9px] uppercase tracking-[0.3em] opacity-0 group-hover:opacity-100 transition-all duration-700 delay-200">Explore</span>
                        </div>
                    </div>
                </Link>
            </div>
            
            <!-- Custom Inquiry CTA -->
            <section class="py-12 border-y border-brand-charcoal flex flex-col items-center text-center space-y-12">
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal leading-tight max-w-2xl">Host an event that <br/> feels like a dream.</h2>
                    <p class="text-brand-charcoal/40 text-[10px] uppercase tracking-[0.4em] font-medium">Custom floral installations & designs</p>
                </div>
                <Link :href="route('contact.create')">
                    <PrimaryButton>Begin Your Inquiry</PrimaryButton>
                </Link>
            </section>
        </div>
    </GuestLayout>
</template>
