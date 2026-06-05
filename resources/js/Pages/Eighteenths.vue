<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    eighteenths: Object,
});

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Portofoliu Majorate",
        "description": "Decor floral modern pentru majorate în Târgu Mureș.",
        "numberOfItems": props.eighteenths?.data?.length || 0,
        "itemListElement": (props.eighteenths?.data || []).map((item, index) => ({
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
        <title>Majorate | Decor Floral Amaryllis Târgu Mureș</title>
        <meta name="description" content="Decor floral creativ și modern pentru petreceri de majorat. Transformăm evenimentul tău într-o experiență memorabilă cu aranjamente florale îndrăznețe și pline de stil.">
        <link rel="canonical" :href="route('eighteenths')" />

        <meta property="og:title" content="Majorate | Decor Floral Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Decor floral creativ și modern pentru petreceri de majorat." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('eighteenths')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-16 md:space-y-16">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Portfolio</span>
                <h1 class="text-4xl md:text-7xl font-serif text-brand-charcoal">The Eighteenths</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Energy and color for life's most vibrant milestones. We celebrate the transition into adulthood with contemporary floral art that is as bold as it is beautiful.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Eighteenths List -->
            <div class="space-y-24 md:space-y-48">
                <section v-for="(eighteenth, idx) in eighteenths.data" :key="eighteenth.id" class="space-y-24">
                    <!-- Eighteenth Info -->
                    <div class="max-w-2xl mx-auto text-center space-y-10">
                        <div class="space-y-4">
                            <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal">{{ eighteenth.name }}</h2>
                            <div class="flex justify-center gap-4">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/60"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-ruby/30"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-blush/30"></span>
                            </div>
                        </div>
                        <p class="text-brand-charcoal/50 leading-relaxed text-sm md:text-base font-light px-6">
                            {{ eighteenth.description }}
                        </p>
                    </div>

                    <!-- Eighteenth Photos Grid -->
                    <div class="grid grid-cols-1 gap-8 md:gap-16 max-w-5xl mx-auto w-full">
                        <div v-for="(image, index) in eighteenth.images" :key="index" 
                            class="max-h-[600px] flex justify-center overflow-hidden group relative"
                        >
                            <img 
                                :src="image.path" 
                                :alt="eighteenth.name" 
                                class="w-full h-full object-contain grayscale-[0.1] group-hover:grayscale-0 transition-all duration-[2s]" 
                            />
                        </div>
                    </div>
                </section>
            </div>

            <!-- Final CTA -->
            <section class="py-20 border-y border-brand-charcoal text-center space-y-10">
                <h2 class="text-3xl md:text-5xl font-serif text-brand-charcoal">Ready to celebrate?</h2>
                <div class="pt-4">
                    <Link :href="route('contact.create')">
                        <PrimaryButton>Start an Inquiry</PrimaryButton>
                    </Link>
                </div>
            </section>

            <!-- Empty State -->
            <div v-if="!eighteenths.data || eighteenths.data.length === 0" class="text-center py-40 bg-white/50 border border-brand-charcoal rounded-sm">
                <p class="text-brand-charcoal/30 font-serif italic text-xl">Our portfolio is currently being curated.</p>
            </div>
        </div>
    </GuestLayout>
</template>
