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
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Portofoliu Nunți",
        "description": "Design floral personalizat pentru nunți în Târgu Mureș.",
        "numberOfItems": props.weddings?.data?.length || 0,
        "itemListElement": (props.weddings?.data || []).map((item, index) => ({
            "@type": "ListItem",
            "position": index + 1,
            "item": {
                "@type": "CreativeWork",
                "name": item.name,
                "description": item.description,
                "image": item.images?.[0]?.path,
                "author": {
                    "@id": "https://amaryllis-flori.ro/#organization"
                }
            }
        }))
    });
});
</script>

<template>
    <Head>
        <title>Nunți | Design Floral Amaryllis Târgu Mureș</title>
        <meta name="description" content="Design floral personalizat pentru nunta ta de vis. De la buchetul miresei la decorul complet al locației în Târgu Mureș, transformăm viziunea ta în realitate.">
        <link rel="canonical" :href="route('weddings')" />

        <meta property="og:title" content="Nunți | Design Floral Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Design floral personalizat pentru nunta ta de vis în Târgu Mureș." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('weddings')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-12 md:space-y-16 px-4 md:px-0">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-6 md:space-y-8">
                <span class="uppercase tracking-[0.4em] md:tracking-[0.5em] text-[8px] md:text-[10px] text-brand-ruby font-bold block">Portfolio</span>
                <h1 class="text-3xl md:text-7xl font-serif text-brand-charcoal">The Weddings</h1>
                <p class="text-xs md:text-base text-brand-charcoal/50 leading-relaxed font-light italic">
                    Love stories told through unique floral design. We curate every detail to reflect your personal journey, creating an atmosphere that is as unique as your bond.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Weddings List -->
            <div class="space-y-16 md:space-y-48">
                <section v-for="(wedding, idx) in weddings.data" :key="wedding.id" class="space-y-12 md:space-y-24">
                    <!-- Wedding Info -->
                    <div class="max-w-2xl mx-auto text-center space-y-6 md:space-y-10">
                        <div class="space-y-2 md:space-y-4">
                            <h2 class="text-2xl md:text-5xl font-serif text-brand-charcoal">{{ wedding.name }}</h2>
                            <div class="flex justify-center gap-4">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/60"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/30"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-blush/30"></span>
                            </div>
                        </div>
                        <p class="text-brand-charcoal/50 leading-relaxed text-xs md:text-base font-light px-4 md:px-6">
                            {{ wedding.description }}
                        </p>
                    </div>

                    <!-- Wedding Photos Grid -->
                    <div class="grid grid-cols-1 gap-8 md:gap-16 max-w-5xl mx-auto w-full">
                        <div v-for="(image, index) in wedding.images" :key="index" 
                            class="max-h-[400px] md:max-h-[600px] flex justify-center overflow-hidden group relative px-4 md:px-0"
                        >
                            <img 
                                :src="image.path" 
                                :alt="wedding.name" 
                                class="w-full h-full object-contain grayscale-[0.1] group-hover:grayscale-0 transition-all duration-[2s]" 
                            />
                        </div>
                    </div>
                </section>
            </div>

            <!-- Final CTA -->
            <section class="py-12 md:py-20 border-y border-brand-charcoal text-center space-y-8 md:space-y-10">
                <h2 class="text-2xl md:text-5xl font-serif text-brand-charcoal px-4 md:px-0">Planning your own special day?</h2>
                <div class="pt-2 md:pt-4">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start an Inquiry</PrimaryButton>
                    </Link>
                </div>
            </section>

            <!-- Empty State -->
            <div v-if="!weddings.data || weddings.data.length === 0" class="text-center py-40 bg-white/50 border border-brand-charcoal rounded-sm">
                <p class="text-brand-charcoal/30 font-serif italic text-xl">Our portfolio is currently being curated.</p>
            </div>
        </div>
    </GuestLayout>
</template>
