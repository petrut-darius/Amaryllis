<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    eighteenths: Object,
});

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'ItemList',
        name: 'Portofoliu Majorate',
        description: 'Decor floral modern pentru majorate în Târgu Mureș.',
        numberOfItems: props.eighteenths?.data?.length || 0,
        itemListElement: (props.eighteenths?.data || []).map((item, index) => ({
            '@type': 'ListItem',
            position: index + 1,
            item: {
                '@type': 'CreativeWork',
                name: item.name,
                description: item.description,
                image: item.images?.[0]?.path,
                author: {
                    '@id': 'https://amaryllis-flori.ro/#organization',
                },
            },
        })),
    });
});
</script>

<template>
    <Head>
        <title>Majorate | Decor Floral Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Decor floral creativ și modern pentru petreceri de majorat. Transformăm evenimentul tău într-o experiență memorabilă cu aranjamente florale îndrăznețe și pline de stil."
        />
        <link rel="canonical" :href="route('eighteenths')" />

        <meta
            property="og:title"
            content="Majorate | Decor Floral Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Decor floral creativ și modern pentru petreceri de majorat."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('eighteenths')" />
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
                    Majorate
                </h1>
                <p
                    class="mx-auto max-w-2xl text-sm leading-relaxed font-semibold text-brand-charcoal/85 md:text-lg"
                >
                    Energie și culoare pentru cele mai vibrante momente din
                    viață. Celebrăm trecerea în viața de adult cu artă florală
                    contemporană, pe cât de îndrăzneață, pe atât de frumoasă.
                </p>
                <div class="mx-auto h-[2px] w-12 bg-brand-gold/60"></div>
            </div>

            <!-- Eighteenths List -->
            <div class="space-y-12 md:space-y-20">
                <section
                    v-for="(eighteenth, idx) in eighteenths.data"
                    :key="eighteenth.id"
                    class="space-y-6 md:space-y-10"
                >
                    <!-- Eighteenth Info -->
                    <div
                        class="mx-auto max-w-2xl space-y-4 text-center md:space-y-6"
                    >
                        <div class="space-y-3">
                            <h2
                                class="font-serif text-2xl text-brand-charcoal md:text-5xl"
                            >
                                {{ eighteenth.name }}
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
                            {{ eighteenth.description }}
                        </p>
                    </div>

                    <!-- Eighteenth Photos Grid -->
                    <div
                        class="mx-auto grid w-full max-w-5xl grid-cols-1 gap-4 md:gap-8"
                    >
                        <div
                            v-for="(image, index) in eighteenth.images"
                            :key="index"
                            class="group relative flex max-h-[400px] justify-center overflow-hidden px-4 md:max-h-[600px] md:px-0"
                        >
                            <img
                                :src="image.path"
                                :alt="eighteenth.name"
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
                    Ești gata să sărbătorești?
                </h2>
                <div class="pt-2">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Trimite o cerere</PrimaryButton>
                    </Link>
                </div>
            </section>

            <!-- Empty State -->
            <div
                v-if="!eighteenths.data || eighteenths.data.length === 0"
                class="rounded-sm border border-brand-charcoal/10 bg-white/50 py-20 text-center"
            >
                <p class="font-serif text-xl text-brand-charcoal/45 italic">
                    Portofoliul nostru este în curs de actualizare.
                </p>
            </div>
        </div>
    </GuestLayout>
</template>
