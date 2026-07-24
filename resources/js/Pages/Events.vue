<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const categories = [
    {
        name: 'Nunți',
        routeName: 'weddings',
        image: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&q=80&w=800',
        description:
            'Creăm amintiri atemporale pentru cea mai specială zi a ta.',
    },
    {
        name: 'Botezuri',
        routeName: 'baptisms',
        image: 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&q=80&w=800',
        description: 'Atingeri florale elegante pentru noile începuturi.',
    },
    {
        name: 'Majorate',
        routeName: 'eighteenths',
        image: 'https://images.unsplash.com/photo-1530103043960-ef38714abb15?auto=format&fit=crop&q=80&w=800',
        description:
            'Aranjamente vibrante pentru a sărbători momentele importante.',
    },
];

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'WebPage',
        name: 'Evenimente & Design Floral | Amaryllis',
        description:
            'Design floral artistic pentru nunți, botezuri și majorate în Târgu Mureș.',
        publisher: {
            '@id': 'https://amaryllis-flori.ro/#organization',
        },
    });
});
</script>

<template>
    <Head>
        <title>Evenimente & Design Floral | Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Elevăm orice ocazie prin design floral artistic. Transformăm spații și momente în experiențe de neuitat prin compoziții atent studiate și frumusețe naturală."
        />
        <link rel="canonical" :href="route('events')" />

        <meta
            property="og:title"
            content="Evenimente & Design Floral | Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Elevăm orice ocazie prin design floral artistic la Amaryllis."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('events')" />
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
                    >Ocazii</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-7xl">
                    Evenimente
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-semibold text-brand-charcoal/85 md:text-lg"
                >
                    Elevăm orice ocazie prin design floral artistic, transformând
                    spațiile și momentele în experiențe de neuitat.
                </p>
                <div class="mx-auto h-[2px] w-12 bg-brand-ruby"></div>
            </div>

            <!-- Categories Grid -->
            <div
                class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:grid-cols-3"
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
                        class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center text-white md:p-12"
                    >
                        <div class="space-y-4 md:space-y-6">
                            <h3
                                class="font-serif text-xl tracking-[0.1em] md:text-3xl"
                            >
                                {{ category.name }}
                            </h3>
                            <div class="mx-auto h-px w-8 bg-white/40"></div>
                            <p
                                class="hidden text-xs font-bold tracking-[0.15em] uppercase opacity-0 transition-opacity delay-100 duration-700 group-hover:opacity-100 md:block"
                            >
                                {{ category.description }}
                            </p>
                            <span
                                class="mt-2 inline-block border-2 border-white px-6 py-2 text-xs font-bold opacity-100 transition-all delay-200 duration-700 md:mt-4 md:px-8 md:py-2.5 md:opacity-0 md:group-hover:opacity-100"
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
                <div class="space-y-3 px-4 md:space-y-4 md:px-0">
                    <h2
                        class="mx-auto max-w-2xl font-serif text-2xl leading-tight text-brand-charcoal md:text-5xl"
                    >
                        Organizează un eveniment care <br />
                        pare un vis.
                    </h2>
                </div>
                <Link :href="route('contact.create')">
                    <PrimaryButton>Trimite o cerere</PrimaryButton>
                </Link>
            </section>
        </div>
    </GuestLayout>
</template>
