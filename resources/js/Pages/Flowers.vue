<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    {
        name: 'Buchete',
        routeName: 'bouquets',
        image: 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=800',
        description: 'Compoziții realizate manual care surprind frumusețea sălbatică a naturii.'
    },
    {
        name: 'Aranjamente',
        routeName: 'arrangements',
        image: 'https://images.unsplash.com/photo-1519214605650-76a613ee3245?auto=format&fit=crop&q=80&w=800',
        description: 'Compoziții florale sofisticate pentru orice spațiu sau ocazie.'
    },
    {
        name: 'Aranjamente funerare',
        routeName: 'funeralArrangements',
        image: 'https://images.unsplash.com/photo-1516567727245-ad8c68f3ec93?auto=format&fit=crop&q=80&w=800',
        description: 'Omagii pline de grație și respect pentru a-i onora pe cei dragi.'
    },
    {
        name: 'Flori la fir',
        routeName: 'threads',
        image: 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=800',
        description: 'Flori individuale și fire delicate de o eleganță naturală.'
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

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-8 md:space-y-16 px-4 md:px-0">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-4 md:space-y-8">
                <span class="uppercase tracking-[0.4em] md:tracking-[0.5em] text-[8px] md:text-[10px] text-brand-ruby font-bold block">Colecție</span>
                <h1 class="text-3xl md:text-7xl font-serif text-brand-charcoal">Flori</h1>
                <p class="text-xs md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Explorează colecția noastră diversă de artă florală. De la buchete bogate până la fire individuale delicate, fiecare categorie reflectă pasiunea noastră pentru frumusețea botanică.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-4 lg:gap-8">
                <Link v-for="(category, idx) in categories" :key="category.name" :href="route(category.routeName)" 
                    class="group relative aspect-video md:aspect-[3/4] overflow-hidden bg-brand-cream rounded-sm shadow-sm ring-1 ring-brand-charcoal/5"
                >
                    <img 
                        :src="category.image" 
                        :alt="category.name" 
                        class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-[2s]" 
                    />

                    <div class="absolute inset-0 bg-brand-charcoal/20 group-hover:bg-brand-charcoal/40 transition-colors duration-700"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 md:p-8 text-center text-white">
                        <div class="space-y-4 md:space-y-6">
                            <h3 class="text-xl md:text-2xl font-serif tracking-[0.1em]">{{ category.name }}</h3>
                            <div class="w-8 h-px bg-white/40 mx-auto"></div>
                            <p class="text-[9px] md:text-[10px] uppercase tracking-[0.2em] md:tracking-[0.3em] font-light opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-100 hidden md:block">
                                {{ category.description }}
                            </p>
                            <span class="inline-block mt-2 md:mt-4 border border-white px-4 md:px-6 py-1.5 md:py-2 text-[8px] md:text-[9px] uppercase tracking-[0.2em] md:tracking-[0.3em] opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-all duration-700 delay-200">Explorează</span>
                        </div>
                    </div>
                </Link>
            </div>
            
            <!-- Custom Inquiry CTA -->
            <section class="py-8 md:py-12 border-y border-brand-charcoal flex flex-col items-center text-center space-y-8 md:space-y-12">
                <div class="space-y-4 md:space-y-6">
                    <h2 class="text-2xl md:text-5xl font-serif text-brand-charcoal leading-tight max-w-2xl px-4 md:px-0">Găsește expresia perfectă <br/> în flori.</h2>
                    <p class="text-brand-charcoal/40 text-[8px] md:text-[10px] uppercase tracking-[0.3em] md:tracking-[0.4em] font-medium">Design floral personalizat pentru fiecare moment</p>
                </div>
                <Link :href="route('contact.create')">
                    <PrimaryButton>Trimite o cerere</PrimaryButton>
                </Link>
            </section>
        </div>
    </GuestLayout>
</template>
