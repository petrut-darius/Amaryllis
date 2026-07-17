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
        description:
            'Compoziții realizate manual care surprind frumusețea sălbatică a naturii.',
    },
    {
        name: 'Aranjamente',
        routeName: 'arrangements',
        image: 'https://images.unsplash.com/photo-1519214605650-76a613ee3245?auto=format&fit=crop&q=80&w=800',
        description:
            'Compoziții florale sofisticate pentru orice spațiu sau ocazie.',
    },
    {
        name: 'Aranjamente funerare',
        routeName: 'funeralArrangements',
        image: 'https://images.unsplash.com/photo-1516567727245-ad8c68f3ec93?auto=format&fit=crop&q=80&w=800',
        description:
            'Omagii pline de grație și respect pentru a-i onora pe cei dragi.',
    },
    {
        name: 'Flori la fir',
        routeName: 'threads',
        image: 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&q=80&w=800',
        description:
            'Flori individuale și fire delicate de o eleganță naturală.',
    },
];

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'WebPage',
        name: 'Flori & Colecții | Amaryllis',
        description:
            'Explorați colecțiile noastre de buchete, aranjamente și flori la fir.',
        publisher: {
            '@id': 'https://amaryllis-flori.ro/#organization',
        },
    });
});
</script>

<template>
    <Head>
        <title>Flori & Colecții | Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Explorează diversitatea florilor noastre. De la buchete bogate la fire delicate, fiecare categorie reflectă pasiunea noastră pentru frumosul botanic."
        />
        <link rel="canonical" :href="route('flowers')" />

        <meta
            property="og:title"
            content="Flori & Colecții | Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Explorează diversitatea florilor noastre realizate cu pasiune la Amaryllis."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('flowers')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-6 px-4 md:space-y-10 md:px-0">
            <!-- Header -->
            <div class="mx-auto max-w-3xl space-y-3 text-center md:space-y-4">
                <span
                    class="block text-xs font-extrabold tracking-[0.25em] text-brand-ruby uppercase md:text-sm"
                    >Colecție</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-7xl">
                    Flori
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-semibold text-brand-charcoal/85 md:text-lg"
                >
                    Explorează colecția noastră diversă de artă florală. De la
                    buchete bogate până la fire individuale delicate, fiecare
                    categorie reflectă pasiunea noastră pentru frumusețea
                    botanică.
                </p>
                <div class="mx-auto h-[2px] w-12 bg-brand-gold/60"></div>
            </div>

            <!-- Categories Grid -->
            <div
                class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:grid-cols-4"
            >
                <Link
                    v-for="(category, idx) in categories"
                    :key="category.name"
                    :href="route(category.routeName)"
                    class="group relative aspect-video overflow-hidden rounded-sm bg-brand-cream shadow-sm ring-1 ring-brand-charcoal/5 md:aspect-[3/4]"
                >
                    <img
                        :src="category.image"
                        :alt="category.name"
                        class="h-full w-full object-cover grayscale-[0.2] transition-all duration-[2s] group-hover:grayscale-0"
                    />

                    <div
                        class="absolute inset-0 bg-brand-charcoal/20 transition-colors duration-700 group-hover:bg-brand-charcoal/40"
                    ></div>

                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center text-white md:p-8"
                    >
                        <div class="space-y-4 md:space-y-6">
                            <h3
                                class="font-serif text-xl tracking-[0.1em] md:text-2xl"
                            >
                                {{ category.name }}
                            </h3>
                            <div class="mx-auto h-px w-8 bg-white/40"></div>
                            <p
                                class="hidden text-xs font-bold tracking-[0.15em] uppercase opacity-0 transition-opacity delay-100 duration-500 group-hover:opacity-100 md:block"
                            >
                                {{ category.description }}
                            </p>
                            <span
                                class="mt-2 inline-block border-2 border-white px-4 py-1.5 text-xs font-bold tracking-[0.15em] uppercase opacity-100 transition-all delay-200 duration-700 md:mt-4 md:px-6 md:py-2 md:opacity-0 md:group-hover:opacity-100"
                                >Explorează</span
                            >
                        </div>
                    </div>
                </Link>
            </div>

            <!-- Custom Inquiry CTA -->
            <section
                class="flex flex-col items-center space-y-4 border-y border-brand-charcoal/20 py-6 text-center md:space-y-6 md:py-8"
            >
                <div class="space-y-3 md:space-y-4">
                    <h2
                        class="max-w-2xl px-4 font-serif text-2xl leading-tight text-brand-charcoal md:px-0 md:text-5xl"
                    >
                        Găsește expresia perfectă <br />
                        în flori.
                    </h2>
                    <p
                        class="text-xs font-extrabold tracking-[0.25em] text-brand-ruby uppercase md:text-sm"
                    >
                        Design floral personalizat pentru fiecare moment
                    </p>
                </div>
                <Link :href="route('contact.create')">
                    <PrimaryButton>Trimite o cerere</PrimaryButton>
                </Link>
            </section>
        </div>
    </GuestLayout>
</template>
