<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    {
        name: 'Flori',
        routeName: 'flowers',
        image: 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&q=80&w=800',
    },
    {
        name: 'Evenimente',
        routeName: 'events',
        image: 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&q=80&w=800',
    },
];

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'ImageGallery',
        name: 'Portofoliu & Galerie Amaryllis',
        description: 'Explorați colecțiile noastre de flori și evenimente.',
        publisher: {
            '@id': 'https://amaryllis-flori.ro/#organization',
        },
    });
});
</script>

<template>
    <Head>
        <title>Portofoliu & Galerie | Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Explorează galeria noastră de proiecte florale. Inspirație pentru nunți, evenimente și aranjamente deosebite realizate de echipa Amaryllis."
        />
        <link rel="canonical" :href="route('gallery')" />

        <meta
            property="og:title"
            content="Portofoliu & Galerie | Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Explorează galeria noastră de proiecte florale realizate de echipa Amaryllis."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('gallery')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-8 px-4 md:space-y-24 md:px-0">
            <!-- Header -->
            <div class="mx-auto max-w-3xl space-y-4 text-center md:space-y-8">
                <span
                    class="block text-[8px] font-semibold tracking-[0.4em] text-brand-ruby uppercase md:text-[10px] md:tracking-[0.5em]"
                    >Portofoliu</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-7xl">
                    Galerie
                </h1>
                <p
                    class="text-xs leading-relaxed font-light text-brand-charcoal/50 md:text-base"
                >
                    O călătorie vizuală prin peisajele noastre florale. Fiecare
                    creație este o dovadă a frumuseții lumii naturale și a
                    dedicării noastre pentru arta aranjamentelor.
                </p>
                <div class="mx-auto h-px w-12 bg-brand-blush"></div>
            </div>

            <!-- Category Links -->
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-4 md:grid-cols-2 md:gap-8"
            >
                <Link
                    v-for="category in categories"
                    :key="category.name"
                    :href="route(category.routeName)"
                    class="group relative aspect-video overflow-hidden rounded-sm bg-brand-cream shadow-sm ring-1 ring-brand-charcoal/5 md:aspect-[16/9]"
                >
                    <img
                        :src="category.image"
                        :alt="category.name"
                        class="h-full w-full object-cover grayscale-[0.2] transition-all duration-[2s] group-hover:scale-105 group-hover:grayscale-0"
                    />
                    <div
                        class="absolute inset-0 bg-brand-charcoal/20 transition-colors duration-700 group-hover:bg-brand-charcoal/40"
                    ></div>
                    <div
                        class="absolute inset-0 flex items-center justify-center"
                    >
                        <h2
                            class="font-serif text-2xl tracking-[0.1em] text-white uppercase md:text-5xl md:tracking-[0.2em]"
                        >
                            {{ category.name }}
                        </h2>
                    </div>
                </Link>
            </div>

            <!-- Final CTA -->
            <section
                class="space-y-8 border-y border-brand-charcoal py-8 text-center md:space-y-10 md:py-12"
            >
                <h2
                    class="px-4 font-serif text-2xl text-brand-charcoal md:px-0 md:text-5xl"
                >
                    Îți place ce vezi?
                </h2>
                <div class="pt-2 md:pt-4">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Începe-ți propria poveste</PrimaryButton>
                    </Link>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
