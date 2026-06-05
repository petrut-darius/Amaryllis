<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    {
        name: 'Bouquets',
        routeName: 'bouquets',
        image: 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=800',
        description: 'Hand-crafted arrangements that capture the untamed beauty of nature.'
    },
    {
        name: 'Arrangements',
        routeName: 'arrangements',
        image: 'https://images.unsplash.com/photo-1519214605650-76a613ee3245?auto=format&fit=crop&q=80&w=800',
        description: 'Sophisticated floral compositions for any space or occasion.'
    },
    {
        name: 'Funeral Arrangements',
        routeName: 'funeralArrangements',
        image: 'https://images.unsplash.com/photo-1516567727245-ad8c68f3ec93?auto=format&fit=crop&q=80&w=800',
        description: 'Graceful and respectful tributes to honor your loved ones.'
    },
    {
        name: 'Threads',
        routeName: 'threads',
        image: 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=800',
        description: 'Single stems and delicate threads of natural elegance.'
    }
];

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Flori & Colecții | Amaryllis",
        "description": "Explorați colecțiile noastre de buchete, aranjamente și flori la fir.",
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
        <title>Flori & Colecții | Amaryllis Târgu Mureș</title>
        <meta name="description" content="Explorează diversitatea florilor noastre. De la buchete bogate la fire delicate, fiecare categorie reflectă pasiunea noastră pentru frumosul botanic.">
        <link rel="canonical" :href="route('flowers')" />

        <meta property="og:title" content="Flori & Colecții | Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Explorează diversitatea florilor noastre realizate cu pasiune la Amaryllis." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('flowers')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-12">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Collection</span>
                <h1 class="text-4xl md:text-7xl font-serif text-brand-charcoal">The Flowers</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Explore our diverse collection of floral artistry. From bountiful bouquets to delicate single stems, each category showcases our passion for botanical beauty.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-4 lg:gap-8">
                <Link v-for="(category, idx) in categories" :key="category.name" :href="route(category.routeName)" 
                    class="group relative aspect-[3/4] overflow-hidden bg-brand-cream rounded-sm shadow-sm ring-1 ring-brand-charcoal/5"
                >
                    <img 
                        :src="category.image" 
                        :alt="category.name" 
                        class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-[2s]" 
                    />

                    <div class="absolute inset-0 bg-brand-charcoal/20 group-hover:bg-brand-charcoal/40 transition-colors duration-700"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center text-white">
                        <div class="space-y-6">
                            <h3 class="text-2xl font-serif tracking-[0.1em]">{{ category.name }}</h3>
                            <div class="w-8 h-px bg-white/40 mx-auto"></div>
                            <p class="text-[10px] uppercase tracking-[0.3em] font-light opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-100">
                                {{ category.description }}
                            </p>
                            <span class="inline-block mt-4 border border-white px-6 py-2 text-[9px] uppercase tracking-[0.3em] opacity-0 group-hover:opacity-100 transition-all duration-700 delay-200">Explore</span>
                        </div>
                    </div>
                </Link>
            </div>
            
            <!-- Custom Inquiry CTA -->
            <section class="py-12 border-y border-brand-charcoal flex flex-col items-center text-center space-y-12">
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal leading-tight max-w-2xl">Find the perfect <br/> expression in bloom.</h2>
                    <p class="text-brand-charcoal/40 text-[10px] uppercase tracking-[0.4em] font-medium">Custom floral designs for every moment</p>
                </div>
                <Link :href="route('contact.create')">
                    <PrimaryButton>Begin Your Inquiry</PrimaryButton>
                </Link>
            </section>
        </div>
    </GuestLayout>
</template>
