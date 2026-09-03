<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed, onMounted, ref } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import ErrorBoundary from '@/composables/ErrorBoundary.vue';

const page = usePage();

const props = defineProps({
    reviews: Array,
    googleMapsKey: String,
});

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'WebPage',
        name: 'Livrare și Ridicare Flori | Amaryllis',
        description:
            'Informații despre serviciile de livrare flori în Târgu Mureș și ridicare personală din studio.',
        mainEntity: {
            '@id': 'https://floraria-amaryllis.ro/#organization',
        },
    });
});

const center = { lat: 46.53663, lng: 24.58163 };
const placeId = 'ChIJw7OIf5y3S0cRdMzs4tJBJKU';

function openMaps() {
    window.open(`https://maps.app.goo.gl/2R46MSLRb8YaJk4z8?g_st=iw`, '_blank');
}

function openReviews() {
    window.open(`https://maps.app.goo.gl/2R46MSLRb8YaJk4z8?g_st=iw`, '_blank');
}

function handleImageError(e: Event) {
    const target = e.target as HTMLImageElement;
    target.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(target.alt)}&background=F6F4E8&color=7A1F3D&bold=true`;
    target.classList.add('grayscale');
}

const show = ref(false);

onMounted(() => {
    console.log(show.value);

    if (props.googleMapsKey && !document.getElementById('google-maps-script')) {
        const script = document.createElement('script');
        script.id = 'google-maps-script';
        script.src = `https://maps.googleapis.com/maps/api/js?key=${props.googleMapsKey}&loading=async&libraries=maps,marker&v=weekly`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }
});
</script>
<template>
    <Head>
        <title>Livrare Flori Târgu Mureș | Amaryllis</title>
        <meta
            name="description"
            content="Livrare rapidă și sigură de flori în Târgu Mureș. Ne asigurăm că fiecare petală ajunge în condiții perfecte la ușa ta. Info livrare și ridicare personală din studio."
        />
        <link rel="canonical" :href="route('delivery')" />

        <meta
            property="og:title"
            content="Livrare Flori Târgu Mureș | Amaryllis"
        />
        <meta
            property="og:description"
            content="Livrare rapidă și sigură de flori în Târgu Mureș."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('delivery')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div
            class="mx-auto mb-8 max-w-7xl space-y-8 px-4 md:space-y-12 md:px-0"
        >
            <!-- Header -->
            <div class="mx-auto max-w-3xl space-y-4 px-4 text-center">
                <span
                    class="block text-xs font-extrabold tracking-[0.25em] text-brand-ruby uppercase md:text-sm"
                    >Servicii</span
                >
                <h1 class="font-serif text-3xl text-brand-charcoal md:text-7xl">
                    Informații Livrare
                </h1>
                <p
                    class="text-sm leading-relaxed font-semibold text-brand-charcoal/85 md:text-lg"
                >
                    Transportate cu grijă din atelierul nostru până la ușa ta.
                    Ne asigurăm că fiecare petală ajunge în condiții perfecte,
                    păstrând prospețimea și integritatea creațiilor noastre.
                </p>
                <div class="mx-auto h-[2px] w-12 bg-brand-ruby"></div>
            </div>

            <!-- Content Grid -->
            <div
                class="mx-auto flex max-w-5xl flex-col items-start gap-6 px-4 md:gap-10"
            >
                <div class="order-2 w-full space-y-6">
                    <div class="space-y-3">
                        <h2
                            class="font-serif text-2xl text-brand-charcoal md:text-5xl"
                        >
                            Livrare Locală
                        </h2>
                        <p
                            class="text-base leading-relaxed font-medium text-brand-charcoal/85"
                        >
                            Oferim servicii de livrare personală în tot orașul
                            și în zonele limitrofe. Fiecare aranjament este
                            asigurat și transportat într-un mediu cu temperatură
                            controlată pentru a-și păstra frumusețea.
                        </p>
                    </div>
                    <ul
                        class="space-y-4 border-l-2 border-brand-ruby pl-8 text-xs font-bold tracking-[0.15em] text-brand-charcoal/80 uppercase md:text-sm"
                    >
                        <li class="flex items-center gap-4">
                            <span class="h-1.5 w-1.5 bg-brand-ruby"></span> Luni
                            – Sâmbătă: 09:00 – 20:00
                        </li>
                        <li class="flex items-center gap-4">
                            <span class="h-1.5 w-1.5 bg-brand-ruby"></span>
                            Duminică: 09:00 – 18:00
                        </li>
                    </ul>
                </div>

                <div class="order-1 w-full space-y-6">
                    <div class="space-y-3">
                        <h2
                            class="font-serif text-2xl text-brand-charcoal md:text-5xl"
                        >
                            Ridicare din Studio
                        </h2>
                        <p
                            class="text-base leading-relaxed font-medium text-brand-charcoal/85"
                        >
                            Te așteptăm cu drag să ne vizitezi atelierul pentru
                            a ridica comanda. Aceasta este o ocazie excelentă de
                            a vedea cele mai recente flori de sezon și de a ne
                            cunoaște personal.
                        </p>
                    </div>
                    <ErrorBoundary>
                        <template #default>
                            <div
                                class="space-y-6 overflow-hidden rounded-sm bg-white shadow-sm ring-1 ring-brand-charcoal/5"
                            >
                                <gmp-map
                                    style="width: 100%; height: 500px"
                                    :center="`${center.lat},${center.lng}`"
                                    zoom="15"
                                    map-id="DEMO_MAP_ID"
                                    rendering-type="RASTER"
                                >
                                    <gmp-advanced-marker
                                        :position="`${center.lat},${center.lng}`"
                                        title="Amaryllis"
                                        @click="openMaps()"
                                    ></gmp-advanced-marker>
                                </gmp-map>
                            </div>
                        </template>
                        <template #error="{ error, clearError }">
                            <div class="error-box">
                            <p>{{ error instanceof Error ? error.message : String(error) }}</p>
                            <button @click="clearError">Retry</button>
                            </div>
                        </template>
                    </ErrorBoundary>
                </div>
            </div>

            <!-- FAQ Section -->
            <section class="space-y-8 px-4 md:space-y-12">
                <div class="space-y-4 text-center">
                    <h2
                        class="font-serif text-2xl font-semibold text-brand-charcoal md:text-5xl"
                    >
                        Întrebări Frecvente
                    </h2>
                    <div class="mx-auto h-[2px] w-12 bg-brand-ruby"></div>
                </div>

                <!-- FAQ Items Grid with Top-to-Bottom Enter / Bottom-to-Top Leave -->
                <Transition name="faq-toggle">
                    <div
                        v-show="show"
                        class="faq-container mx-auto grid max-w-5xl grid-cols-1 gap-6 md:grid-cols-2 md:gap-8"
                    >
                        <div class="group space-y-4">
                            <p
                                class="text-xs font-bold tracking-[0.15em] text-brand-ruby md:text-brand-charcoal uppercase transition-colors duration-300 group-hover:md:text-brand-ruby md:text-sm"
                            >
                                Cum vor fi ambalate florile mele?
                            </p>
                            <p
                                class="text-sm leading-relaxed font-normal text-brand-charcoal/80 md:text-base"
                            >
                                Folosim ambalaje minimaliste și ecologice care
                                protejează florile, evidențiind în același timp
                                frumusețea lor naturală. Fiecare aranjament include
                                instrucțiuni de îngrijire și hrană pentru flori.
                            </p>
                        </div>
                        <div class="group space-y-4">
                            <p
                                class="text-xs font-bold tracking-[0.15em] text-brand-ruby md:text-brand-charcoal uppercase transition-colors duration-300 group-hover:text-brand-ruby md:text-sm"
                            >
                                Pot solicita o oră specifică de livrare?
                            </p>
                            <p
                                class="text-sm leading-relaxed font-normal text-brand-charcoal/80 md:text-base"
                            >
                                Deși nu putem garanta ore exacte de livrare, facem
                                tot posibilul pentru a respecta preferințele de
                                dimineață sau după-amiază în intervalele noastre de
                                livrare.
                            </p>
                        </div>
                    </div>
                </Transition>

                <!-- Mobile Toggle Button (Zero Layout Shift) -->
                <div class="flex justify-center md:hidden">
                    <button
                        @click="show = !show"
                        type="button"
                        class="group relative inline-flex items-center gap-2.5 rounded-full border border-brand-ruby/30 bg-white/90 px-6 py-2.5 text-xs font-bold tracking-[0.2em] text-brand-ruby uppercase shadow-sm backdrop-blur-sm transition-all duration-300 hover:border-brand-ruby hover:bg-brand-ruby hover:text-white hover:shadow-md hover:shadow-brand-ruby/20 active:scale-95 focus:outline-none"
                    >
                        <span>{{ show ? 'Show less' : 'Show more' }}</span>
                        <svg
                            class="h-4 w-4 transition-transform duration-500 ease-out"
                            :class="show ? 'rotate-180' : 'rotate-0'"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2.5"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section
                class="space-y-10 rounded-3xl bg-brand-cream/20 px-4 py-12 md:space-y-16"
            >
                <div class="space-y-6 text-center">
                    <span
                        class="block text-[10px] font-bold tracking-[0.5em] text-brand-ruby uppercase"
                        >Testimoniale</span
                    >
                    <h2
                        class="font-serif text-2xl text-brand-charcoal md:text-5xl"
                    >
                        Gânduri Bune
                    </h2>
                    <div class="mx-auto h-px w-12 bg-brand-ruby"></div>
                </div>

                <div
                    class="columns-1 gap-8 space-y-8 md:columns-2 lg:columns-3"
                >
                    <div
                        v-for="review in reviews"
                        :key="review.name"
                        class="break-inside-avoid"
                    >
                        <div
                            class="group space-y-6 rounded-2xl border border-brand-charcoal/5 bg-white p-6 transition-all duration-500 hover:-translate-y-1 hover:border-brand-ruby/20 hover:shadow-xl hover:shadow-brand-ruby/5 md:p-8"
                        >
                            <div class="flex gap-1">
                                <svg
                                    v-for="i in 5"
                                    :key="i"
                                    class="h-3 w-3"
                                    :class="
                                        i <= review.rating
                                            ? 'fill-brand-ruby text-brand-ruby'
                                            : 'fill-transparent text-brand-charcoal/10'
                                    "
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>
                            </div>

                            <p
                                class="font-serif text-sm leading-relaxed text-brand-charcoal/80 italic md:text-base"
                            >
                                "{{ review.text }}"
                            </p>

                            <div
                                class="flex items-center gap-4 border-t border-brand-charcoal/5 pt-4"
                            >
                                <div class="relative">
                                    <img
                                        :src="review.photo"
                                        :alt="review.name"
                                        @error="handleImageError"
                                        class="h-12 w-12 rounded-full object-cover ring-2 ring-brand-cream ring-offset-2 grayscale transition-all duration-700 group-hover:grayscale-0"
                                    />
                                    <div
                                        class="absolute -right-1 -bottom-1 flex h-4 w-4 items-center justify-center rounded-full border-2 border-white bg-brand-ruby"
                                    >
                                        <svg
                                            class="h-2 w-2 text-white"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="3"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <p
                                        class="text-[10px] font-bold tracking-[0.2em] text-brand-charcoal uppercase"
                                    >
                                        {{ review.name }}
                                    </p>
                                    <p
                                        class="text-[9px] tracking-widest text-brand-charcoal/40 uppercase"
                                    >
                                        {{ review.date }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 text-center">
                    <a
                        @click="openReviews()"
                        class="group inline-flex items-center gap-4 text-[10px] tracking-[0.4em] text-brand-ruby uppercase"
                    >
                        <span
                            class="border-b border-brand-ruby/30 pb-2 transition-all duration-300 group-hover:border-brand-ruby"
                            >Lasă o recenzie</span
                        >
                        <svg
                            class="h-4 w-4 -translate-y-1 transition-transform duration-300 group-hover:translate-x-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"
                            />
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>

<style scoped>
@media (max-width: 767px) {
    /* Mobile FAQ transition: Pure Fade-in top-to-bottom on enter, Pure Fade-out bottom-to-top on leave */
    .faq-toggle-enter-active {
        transition: clip-path 0.65s cubic-bezier(0.22, 1, 0.36, 1),
                    opacity 0.55s cubic-bezier(0.22, 1, 0.36, 1),
                    max-height 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        max-height: 400px;
        overflow: hidden;
    }

    .faq-toggle-leave-active {
        transition: clip-path 0.55s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.45s cubic-bezier(0.4, 0, 0.2, 1),
                    max-height 0.55s cubic-bezier(0.4, 0, 0.2, 1);
        max-height: 400px;
        overflow: hidden;
    }

    .faq-toggle-enter-from {
        opacity: 0;
        clip-path: inset(0 0 100% 0);
        max-height: 0;
    }

    .faq-toggle-enter-to {
        opacity: 1;
        clip-path: inset(0 0 0 0);
        max-height: 400px;
    }

    .faq-toggle-leave-from {
        opacity: 1;
        clip-path: inset(0 0 0 0);
        max-height: 400px;
    }

    .faq-toggle-leave-to {
        opacity: 0;
        clip-path: inset(0 0 100% 0);
        max-height: 0;
    }
}

@media (min-width: 768px) {
    .faq-container {
        display: grid !important;
        max-height: none !important;
        opacity: 1 !important;
        clip-path: none !important;
    }
}
</style>
