<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import { GoogleMap, Marker } from 'vue3-google-map';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    reviews: Array
})

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Livrare și Ridicare Flori | Amaryllis",
        "description": "Informații despre serviciile de livrare flori în Târgu Mureș și ridicare personală din studio.",
        "mainEntity": {
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

const center = {lat: 46.53663, lng: 24.58163}
const placeId = 'ChIJw7OIf5y3S0cRdMzs4tJBJKU'

function openMaps() {
    window.open(
        `https://maps.app.goo.gl/2R46MSLRb8YaJk4z8?g_st=iw`,
        '_blank'
    )
}

function openReviews() {
    window.open(
        `https://maps.app.goo.gl/2R46MSLRb8YaJk4z8?g_st=iw`,
        '_blank'
    )
}

function handleImageError(e: Event) {
    const target = e.target as HTMLImageElement
    target.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(target.alt)}&background=F6F4E8&color=7A1F3D&bold=true`
    target.classList.add('grayscale')
}
</script>
<template>
    <Head>
        <title>Livrare Flori Târgu Mureș | Amaryllis</title>
        <meta name="description" content="Livrare rapidă și sigură de flori în Târgu Mureș. Ne asigurăm că fiecare petală ajunge în condiții perfecte la ușa ta. Info livrare și ridicare personală din studio.">
        <link rel="canonical" :href="route('delivery')" />

        <meta property="og:title" content="Livrare Flori Târgu Mureș | Amaryllis" />
        <meta property="og:description" content="Livrare rapidă și sigură de flori în Târgu Mureș." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('delivery')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="max-w-7xl mx-auto space-y-10 md:space-y-24 px-4 md:px-0 mb-16">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center space-y-8 px-4">
                <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Services</span>
                <h1 class="text-3xl md:text-7xl font-serif text-brand-charcoal">Delivery Info</h1>
                <p class="text-sm md:text-base text-brand-charcoal/50 leading-relaxed font-light">
                    Transported with care from our studio to your door. We ensure every petal arrives in perfect condition, maintaining the freshness and integrity of our designs.
                </p>
                <div class="w-12 h-px bg-brand-blush mx-auto"></div>
            </div>

            <!-- Content Grid -->
            <div class="flex flex-col gap-8 md:gap-12 lg:gap-24 items-start px-4 max-w-5xl mx-auto">
                <div class="space-y-12 w-full order-2">
                    <div class="space-y-6">
                        <h2 class="font-serif text-2xl md:text-5xl text-brand-charcoal">Local Delivery</h2>
                        <p class="text-brand-charcoal/50 leading-relaxed font-light text-sm md:text-base italic">
                            We offer personal delivery services throughout the city and surrounding areas. Each arrangement is secured and transported in a climate-controlled environment to preserve its beauty.
                        </p>
                    </div>
                    <ul class="text-[10px] text-brand-charcoal/40 space-y-6 uppercase tracking-[0.3em] font-medium border-l border-brand-ruby/30 pl-8">
                        <li class="flex items-center gap-4"><span class="w-1.5 h-1.5 bg-brand-ruby"></span> Monday – Saturday: 09:00 – 19:00</li>
                        <li class="flex items-center gap-4"><span class="w-1.5 h-1.5 bg-brand-ruby/50"></span> Sunday: Special request only</li>
                        <li class="flex items-center gap-4"><span class="w-1.5 h-1.5 bg-brand-blush"></span> Same day: Order before 12:00</li>
                    </ul>
                </div>

                <div class="space-y-12 w-full order-1">
                    <div class="space-y-6">
                        <h2 class="font-serif text-2xl md:text-5xl text-brand-charcoal">Studio Pickup</h2>
                        <p class="text-brand-charcoal/50 leading-relaxed font-light text-sm md:text-base italic">
                            You are welcome to visit our studio to pick up your order. This is a great opportunity to see the latest seasonal blooms and meet our designers in person.
                        </p>
                    </div>
                    <div class="bg-white shadow-sm ring-1 ring-brand-charcoal/5 space-y-6 rounded-sm overflow-hidden ">
                        <GoogleMap
                            api-key="AIzaSyDdqmMvty7NdfoPF11JRcGOzIp9cESQuyo"
                            style="width: 100%; height: 500px"
                            :center="center"
                            :zoom="15"
                            :draggable="false"
                            :zoom-control="false"
                            :map-type-control="false"
                            :scale-control="false"
                            :street-view-control="false"
                            :rotate-control="false"
                            :fullscreen-control="false"
                            :scroll-wheel="false"
                            :gestureHandling="'none'"
                            >
                                <Marker :options="{ position: center }" @click="openMaps()"/>
                        </GoogleMap>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <section class="space-y-10 md:space-y-16 px-4">
                <div class="text-center space-y-6">
                    <h2 class="font-serif text-2xl md:text-5xl text-brand-charcoal">Common Questions</h2>
                    <div class="w-12 h-px bg-brand-ruby mx-auto"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 lg:gap-24 max-w-5xl mx-auto">
                    <div class="space-y-6 group">
                        <p class="font-semibold text-brand-charcoal uppercase tracking-[0.3em] text-[10px] group-hover:text-brand-ruby transition-colors duration-300">How will my flowers be packaged?</p>
                        <p class="text-brand-charcoal/50 font-light leading-relaxed text-sm md:text-base">We use minimal, eco-friendly packaging that protects the blooms while highlighting their natural beauty. Each arrangement includes care instructions and flower food.</p>
                    </div>
                    <div class="space-y-6 group">
                        <p class="font-semibold text-brand-charcoal uppercase tracking-[0.3em] text-[10px] group-hover:text-brand-ruby transition-colors duration-300">Can I request a specific delivery time?</p>
                        <p class="text-brand-charcoal/50 font-light leading-relaxed text-sm md:text-base">While we cannot guarantee exact delivery times, we do our best to accommodate morning or afternoon preferences within our delivery windows.</p>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="space-y-10 md:space-y-16 px-4 py-12 bg-brand-cream/20 rounded-3xl">
                <div class="text-center space-y-6">
                    <span class="uppercase tracking-[0.5em] text-[10px] text-brand-ruby font-bold block">Testimonials</span>
                    <h2 class="font-serif text-2xl md:text-5xl text-brand-charcoal">Kind Words</h2>
                    <div class="w-12 h-px bg-brand-ruby mx-auto"></div>
                </div>

                <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
                    <div v-for="review in reviews" :key="review.name" class="break-inside-avoid">
                        <div class="bg-white p-6 md:p-8 rounded-2xl space-y-6 border border-brand-charcoal/5 hover:border-brand-ruby/20 transition-all duration-500 group hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-ruby/5">
                            <div class="flex gap-1">
                                <svg v-for="i in 5" :key="i" 
                                     class="w-3 h-3"
                                     :class="i <= review.rating ? 'text-brand-ruby fill-brand-ruby' : 'text-brand-charcoal/10 fill-transparent'"
                                     viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <p class="font-serif italic text-brand-charcoal/80 leading-relaxed text-sm md:text-base">
                                "{{ review.text }}"
                            </p>

                            <div class="flex items-center gap-4 pt-4 border-t border-brand-charcoal/5">
                                <div class="relative">
                                    <img :src="review.photo" 
                                         :alt="review.name" 
                                         @error="handleImageError"
                                         class="w-12 h-12 rounded-full grayscale group-hover:grayscale-0 transition-all duration-700 object-cover ring-2 ring-brand-cream ring-offset-2">
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-brand-ruby rounded-full flex items-center justify-center border-2 border-white">
                                        <svg class="w-2 h-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-charcoal">{{ review.name }}</p>
                                    <p class="text-[9px] text-brand-charcoal/40 uppercase tracking-widest">{{ review.date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-8">
                    <a @click="openReviews()" class="inline-flex items-center gap-4 text-[10px] uppercase tracking-[0.4em] text-brand-ruby group">
                        <span class="border-b border-brand-ruby/30 pb-2 group-hover:border-brand-ruby transition-all duration-300">Write your opinion</span>
                        <svg class="w-4 h-4 -translate-y-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>
