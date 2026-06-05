<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    { name: 'Flowers', routeName: 'flowers', image: 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=800' },
    { name: 'Events', routeName: 'events', image: 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=800' },
];

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ImageGallery",
        "name": "Portofoliu & Galerie Amaryllis",
        "description": "Explorați colecțiile noastre de flori și evenimente.",
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
        <title>Portofoliu & Galerie | Amaryllis Târgu Mureș</title>
        <meta name="description" content="Explorează galeria noastră de proiecte florale. Inspirație pentru nunți, evenimente și aranjamente deosebite realizate de echipa Amaryllis.">
        <link rel="canonical" :href="route('gallery')" />

        <meta property="og:title" content="Portofoliu & Galerie | Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Explorează galeria noastră de proiecte florale realizate de echipa Amaryllis." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('gallery')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-12 md:space-y-24">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-semibold block">Portfolio</span>
                <h1 class="text-4xl md:text-7xl font-serif text-brand-charcoal">The Gallery</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    A visual journey through our floral landscapes. Each creation is a testament to the beauty of the natural world and our dedication to the art of arrangement.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Category Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto">
                <Link v-for="category in categories" :key="category.name" :href="route(category.routeName)"
                    class="group relative aspect-[16/9] overflow-hidden rounded-sm bg-brand-cream shadow-sm ring-1 ring-brand-charcoal/5"
                >
                    <img :src="category.image" :alt="category.name" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-all duration-[2s] group-hover:scale-105" />
                    <div class="absolute inset-0 bg-brand-charcoal/20 group-hover:bg-brand-charcoal/40 transition-colors duration-700"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <h2 class="text-white text-3xl md:text-5xl font-serif tracking-[0.2em] uppercase">{{ category.name }}</h2>
                    </div>
                </Link>
            </div>

            <!-- Final CTA -->
            <section class="py-12 border-y border-brand-charcoal text-center space-y-10">
                <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal">Love what you see?</h2>
                <div class="pt-4">
                    <Link :href="route('contact.create')" >
                        <PrimaryButton>Start Your Own Story</PrimaryButton>
                    </Link>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
