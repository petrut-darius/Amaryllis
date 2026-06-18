<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    funeralArrangements: Object,
})

const activeFuneralId = ref(null);

const toggleFuneral = (id) => {
    activeFuneralId.value = activeFuneralId.value === id ? null : id;
};

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Aranjamente Funerare",
        "description": "Omagii florale realizate cu respect și delicatețe în Târgu Mureș.",
        "numberOfItems": props.funeralArrangements?.data?.length || 0,
        "itemListElement": (props.funeralArrangements?.data || []).map((item, index) => ({
            "@type": "ListItem",
            "position": index + 1,
            "item": {
                "@type": "Product",
                "name": item.name,
                "description": item.description,
                "image": item.images,
                "brand": {
                    "@id": "https://amaryllis-flori.ro/#organization"
                }
            }
        }))
    });
});
</script>

<template>
    <Head>
        <title>Aranjamente Funerare | Amaryllis Târgu Mureș</title>
        <meta name="description" content="Omagii florale realizate cu respect și delicatețe. Coroane, jerbe și aranjamente funerare deosebite, create pentru a onora memoria celor dragi.">
        <link rel="canonical" :href="route('funeralArrangements')" />

        <meta property="og:title" content="Aranjamente Funerare | Amaryllis Târgu Mureș" />
        <meta property="og:description" content="Omagii florale realizate cu respect și delicatețe." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('funeralArrangements')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-10 md:space-y-32 px-4 md:px-0">
            <!-- Header: Elegant & Focused -->
            <div class="max-w-4xl mx-auto text-center space-y-8 md:space-y-12">
                <div class="space-y-6">
                    <span class="uppercase tracking-[1em] text-[10px] text-brand-ruby font-bold block animate-fade-in">Respectful Tributes</span>
                    <h1 class="text-3xl md:text-8xl font-serif text-brand-charcoal animate-reveal">Funeral Arrangements</h1>
                </div>
                <p class="text-sm md:text-lg text-brand-charcoal/50 leading-relaxed font-light italic max-w-2xl mx-auto animate-fade-in-up delay-500">
                    "Graceful and respectful floral tributes designed to honor and celebrate a life. Each piece is crafted with care and sensitivity."
                </p>
                <div class="w-24 h-px bg-brand-gold/20 mx-auto animate-fade-in delay-700"></div>
            </div>

            <!-- Grid: Editorial Presentation -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12 md:gap-x-16 md:gap-y-32 animate-fade-in-up delay-700">
                <div v-for="arrangement in funeralArrangements.data" :key="arrangement.id" 
                    class="group flex flex-col space-y-6 md:space-y-8"
                >
                    <!-- Image Container -->
                    <div class="relative aspect-[4/5] overflow-hidden bg-brand-cream shadow-2xl ring-1 ring-brand-charcoal/5 transform-gpu">
                        <img 
                            :src="arrangement.images" 
                            :alt="arrangement.name" 
                            class="w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-110 grayscale-[0.3] group-hover:grayscale-0 will-change-transform"
                        />
                        
                        <!-- Desktop Overlay (Elegant Blur) -->
                        <div class="hidden md:flex absolute inset-0 bg-brand-cream/80 flex-col hover:text-white items-center justify-center p-12 text-center opacity-0 group-hover:opacity-100 transition-all duration-750 safari-blur-md">
                            <div class="space-y-6 md:space-y-8 transform translate-y-8 group-hover:translate-y-0 transition-transform duration-1000">
                                <h3 class="text-2xl md:text-4xl font-serif text-brand-charcoal leading-tight italic">
                                    {{ arrangement.name }}
                                </h3>
                                <p class="text-[12px] text-brand-charcoal/60 leading-loose font-light line-clamp-4 px-4">
                                    {{ arrangement.description }}
                                </p>
                                <div class="pt-6">
                                    <Link :href="route('contact.create')" class="inline-block text-[10px] uppercase tracking-[0.4em] text-brand-gold border-b border-brand-gold/30 pb-2 hover:tracking-[0.6em] transition-all">Inquire Now</Link>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Info Overlay (Toggled) -->
                        <Transition name="fade">
                            <div 
                                v-if="activeFuneralId === arrangement.id"
                                class="md:hidden absolute inset-0 bg-brand-charcoal/90 flex flex-col items-center justify-center p-6 md:p-10 text-center safari-blur-sm z-10"
                            >
                                <div class="space-y-6 md:space-y-8">
                                    <h3 class="text-xl md:text-3xl font-serif text-white italic">
                                        {{ arrangement.name }}
                                    </h3>
                                    <p class="text-[11px] text-white/70 leading-loose font-light">
                                        {{ arrangement.description }}
                                    </p>
                                    <div class="pt-6">
                                        <Link :href="route('contact.create')" class="inline-block text-[10px] uppercase tracking-[0.4em] text-brand-gold border-b border-brand-gold/30 pb-2">Inquire Now</Link>
                                    </div>
                                </div>
                            </div>
                        </Transition>

                        <!-- Mobile Info Toggle Button (Plus Icon) -->
                        <div class="absolute bottom-6 right-6 md:hidden z-10">
                             <button 
                                @click="toggleFuneral(arrangement.id)" 
                                class="bg-brand-cream/90 safari-blur-md p-4 rounded-full shadow-2xl text-brand-charcoal transition-all duration-500 hover:scale-110"
                                :class="{ 'rotate-45 !bg-brand-gold !text-brand-cream': activeFuneralId === arrangement.id }"
                            >
                                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path d="M12 4v16m8-8H4" stroke-width="1.5" stroke-linecap="round"/>
                                 </svg>
                             </button>
                        </div>
                    </div>

                    <!-- Label: Clean Typography -->
                    <div class="flex justify-between items-baseline pt-4 px-1">
                        <div class="space-y-2">
                            <h3 class="text-xl md:text-2xl font-serif text-brand-charcoal group-hover:text-brand-gold transition-colors duration-700 italic">{{ arrangement.name }}</h3>
                            <span class="text-[10px] uppercase tracking-[0.4em] text-brand-charcoal/30 block">
                                {{ arrangement.occasion || 'Funeral' }}
                            </span>
                        </div>
                        <span class="text-[11px] text-brand-charcoal/30 font-light italic font-script text-lg lowercase tracking-normal">
                             {{ arrangement.color }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Empty State -->
            <div v-if="!funeralArrangements.data || funeralArrangements.data.length === 0" class="text-center py-20 md:py-32 border-t border-brand-charcoal">
                <p class="text-brand-charcoal/20 font-serif italic text-xl md:text-3xl">The collection is currently being refreshed.</p>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1.2s ease-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
