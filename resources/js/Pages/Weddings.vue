<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    weddings: Object,
});

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'ItemList',
        name: 'Portofoliu Nunți',
        description: 'Design floral personalizat pentru nunți în Târgu Mureș.',
        numberOfItems: props.weddings?.data?.length || 0,
        itemListElement: (props.weddings?.data || []).map((item, index) => ({
            '@type': 'ListItem',
            position: index + 1,
            item: {
                '@type': 'CreativeWork',
                name: item.name,
                description: item.description,
                image: item.images?.[0]?.path,
                author: {
                    '@id': 'https://floraria-amaryllis.ro/#organization',
                },
            },
        })),
    });
});
</script>

<template>
    <Head>
        <title>Nunți | Design Floral Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Design floral personalizat pentru nunta ta de vis. De la buchetul miresei la decorul complet al locației în Târgu Mureș, transformăm viziunea ta în realitate."
        />
        <link rel="canonical" :href="route('weddings')" />

        <meta
            property="og:title"
            content="Nunți | Design Floral Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Design floral personalizat pentru nunta ta de vis în Târgu Mureș."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('weddings')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-8 px-4 md:space-y-12 md:px-0">
            <!-- Header -->
            <div class="mx-auto max-w-3xl space-y-3 text-center md:space-y-4">
                <span
                    class="block text-xs font-extrabold tracking-[0.25em] text-brand-ruby uppercase md:text-sm"
                    >Portofoliu</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-7xl">
                    Nunți
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-semibold text-brand-charcoal/85 md:text-lg"
                >
                    Povești de dragoste spuse prin design floral unic, adaptat
                    în detaliu călătoriei voastre personale.
                </p>
                <div class="mx-auto h-[2px] w-12 bg-brand-ruby"></div>
            </div>

            <!-- Weddings List -->
            <div class="space-y-12 md:space-y-20">
                <section
                    v-for="(wedding, idx) in weddings.data"
                    :key="wedding.id"
                    class="space-y-6 md:space-y-10"
                >
                    <!-- Wedding Info -->
                    <div
                        class="mx-auto max-w-2xl space-y-4 text-center md:space-y-6"
                    >
                        <div class="space-y-3">
                            <h2
                                class="font-serif text-2xl text-brand-charcoal md:text-5xl"
                            >
                                {{ wedding.name }}
                            </h2>
                            <div class="flex justify-center gap-4">
                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-brand-ruby"
                                ></span>
                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-brand-ruby/60"
                                ></span>
                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-brand-gold/60"
                                ></span>
                            </div>
                        </div>
                        <p
                            class="px-4 text-base leading-relaxed font-normal text-brand-charcoal/85 md:px-6"
                        >
                            {{ wedding.description }}
                        </p>
                    </div>

                    <!-- Wedding Photos Grid -->
                    <div
                        class="mx-auto grid w-full max-w-5xl grid-cols-1 gap-4 md:gap-8"
                    >
                        <div
                            v-for="(image, index) in wedding.images"
                            :key="index"
                            class="group relative flex max-h-[400px] justify-center overflow-hidden px-4 md:max-h-[600px] md:px-0"
                        >
                            <img
                                :src="image.path"
                                :alt="wedding.name"
                                class="h-full w-full object-contain grayscale-[0.1] transition-all duration-[2s] group-hover:grayscale-0"
                            />
                        </div>
                    </div>
                </section>
            </div>

            <!-- Final CTA -->
            <section
                class="space-y-4 border-y border-brand-charcoal/20 py-6 text-center md:space-y-6 md:py-10"
            >
                <h2
                    class="px-4 font-serif text-2xl text-brand-charcoal md:px-0 md:text-5xl"
                >
                    Îți planifici propria zi specială?
                </h2>
                <div class="pt-2">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Trimite o cerere</PrimaryButton>
                    </Link>
                </div>
            </section>

            <!-- Empty State -->
            <div
                v-if="!weddings.data || weddings.data.length === 0"
                class="rounded-sm border border-brand-charcoal/10 bg-white/50 py-20 text-center"
            >
                <p class="font-serif text-xl text-brand-charcoal/45 italic">
                    Portofoliul nostru este în curs de actualizare.
                </p>
            </div>
        </div>
    </GuestLayout>
</template>
