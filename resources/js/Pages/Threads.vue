<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    threads: Object,
});

const activeThreadId = ref(null);

const toggleThread = (id) => {
    activeThreadId.value = activeThreadId.value === id ? null : id;
};

const structuredData = computed(() => {
    return JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'ItemList',
        name: 'Flori la Fir',
        description:
            'Selecție premium de flori la fir disponibilă în Târgu Mureș.',
        numberOfItems: props.threads?.data?.length || 0,
        itemListElement: (props.threads?.data || []).map((item, index) => ({
            '@type': 'ListItem',
            position: index + 1,
            item: {
                '@type': 'Product',
                name: item.name,
                description: item.description,
                image: item.images,
                brand: {
                    '@id': 'https://amaryllis-flori.ro/#organization',
                },
            },
        })),
    });
});
</script>

<template>
    <Head>
        <title>Flori la Fir | Amaryllis Târgu Mureș</title>
        <meta
            name="description"
            content="Selecție premium de flori la fir pentru a-ți crea propriile aranjamente sau pentru un gest simplu și elegant. Calitate excepțională și prospețime garantată."
        />
        <link rel="canonical" :href="route('threads')" />

        <meta
            property="og:title"
            content="Flori la Fir | Amaryllis Târgu Mureș"
        />
        <meta
            property="og:description"
            content="Selecție premium de flori la fir pentru a-ți crea propriile aranjamente sau pentru un gest simplu și elegant."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('threads')" />
        <meta property="og:image" content="/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>

    <GuestLayout>
        <div class="space-y-8 px-4 md:space-y-12 md:px-0">
            <!-- Header: Elegant & Focused -->
            <div class="mx-auto max-w-4xl space-y-4 text-center md:space-y-6">
                <div class="space-y-3">
                    <span
                        class="animate-fade-in block text-xs font-extrabold tracking-[0.3em] text-brand-ruby uppercase md:text-sm"
                        >Simplitate Botanică</span
                    >
                    <h1
                        class="animate-reveal font-serif text-3xl text-brand-charcoal md:text-8xl"
                    >
                        Flori la Fir
                    </h1>
                </div>
                <p
                    class="animate-fade-in-up mx-auto max-w-2xl text-base leading-relaxed font-semibold text-brand-charcoal/85 italic delay-500 md:text-lg"
                >
                    „Flori individuale și fire delicate ce celebrează caracterul
                    unic și forma elegantă a fiecărei flori.”
                </p>
                <div
                    class="animate-fade-in mx-auto h-px w-24 bg-brand-ruby delay-700"
                ></div>
            </div>

            <!-- Grid: Editorial Presentation -->
            <div
                class="animate-fade-in-up grid grid-cols-1 gap-x-8 gap-y-8 delay-700 md:grid-cols-2 md:gap-x-12 md:gap-y-12 lg:grid-cols-3"
            >
                <div
                    v-for="thread in threads.data"
                    :key="thread.id"
                    class="group flex flex-col space-y-4 md:space-y-6"
                >
                    <!-- Image Container -->
                    <div
                        class="relative aspect-[4/5] transform-gpu overflow-hidden bg-brand-cream shadow-2xl ring-1 ring-brand-charcoal/5"
                    >
                        <img
                            :src="thread.images"
                            :alt="thread.name"
                            class="h-full w-full object-cover grayscale-[0.3] transition-transform duration-[2s] will-change-transform group-hover:scale-110 group-hover:grayscale-0"
                        />

                        <!-- Desktop Overlay (Elegant Blur) -->
                        <div
                            class="safari-blur-md absolute inset-0 hidden flex-col items-center justify-center bg-brand-cream/80 p-12 text-center opacity-0 transition-all duration-750 group-hover:opacity-100 hover:text-white md:flex"
                        >
                            <div
                                class="translate-y-8 transform space-y-6 transition-transform duration-1000 group-hover:translate-y-0 md:space-y-8"
                            >
                                <h3
                                    class="font-serif text-2xl leading-tight text-brand-charcoal italic md:text-4xl"
                                >
                                    {{ thread.name }}
                                </h3>
                                <p
                                    class="line-clamp-4 px-4 text-sm leading-relaxed font-normal text-brand-charcoal/85"
                                >
                                    {{ thread.description }}
                                </p>
                                <div class="pt-6">
                                    <Link
                                        :href="route('contact.create')"
                                        class="inline-block border-b-2 border-brand-ruby/20 pb-1 text-xs font-bold tracking-[0.25em] text-brand-ruby uppercase transition-all hover:border-brand-gold hover:tracking-[0.3em] hover:text-brand-gold"
                                        >Solicită detalii</Link
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Info Overlay (Toggled) -->
                        <Transition name="fade">
                            <div
                                v-if="activeThreadId === thread.id"
                                class="safari-blur-sm absolute inset-0 z-10 flex flex-col items-center justify-center bg-brand-charcoal/90 p-6 text-center md:hidden md:p-10"
                            >
                                <div class="space-y-6 md:space-y-8">
                                    <h3
                                        class="font-serif text-xl text-white italic md:text-3xl"
                                    >
                                        {{ thread.name }}
                                    </h3>
                                    <p
                                        class="text-[11px] leading-loose font-light text-white/70"
                                    >
                                        {{ thread.description }}
                                    </p>
                                    <div class="pt-6">
                                        <Link
                                            :href="route('contact.create')"
                                            class="inline-block border-b border-brand-gold/30 pb-2 text-[10px] tracking-[0.4em] text-brand-gold uppercase"
                                            >Solicită detalii</Link
                                        >
                                    </div>
                                </div>
                            </div>
                        </Transition>

                        <!-- Mobile Info Toggle Button (Plus Icon) -->
                        <div class="absolute right-6 bottom-6 z-10 md:hidden">
                            <button
                                @click="toggleThread(thread.id)"
                                class="safari-blur-md rounded-full bg-brand-cream/90 p-4 text-brand-charcoal shadow-2xl transition-all duration-500 hover:scale-110"
                                :class="{
                                    'rotate-45 !bg-brand-gold !text-brand-cream':
                                        activeThreadId === thread.id,
                                }"
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 4v16m8-8H4"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Label: Clean Typography -->
                    <div class="flex items-baseline justify-between px-1 pt-4">
                        <div class="space-y-2">
                            <h3
                                class="font-serif text-xl text-brand-charcoal italic transition-colors duration-700 group-hover:text-brand-gold md:text-2xl"
                            >
                                {{ thread.name }}
                            </h3>
                            <span
                                class="block text-xs font-semibold tracking-[0.2em] text-brand-charcoal/60 uppercase"
                            >
                                {{ thread.occasion || 'De sezon' }}
                            </span>
                        </div>
                        <span class="text-sm font-semibold text-brand-ruby/70">
                            {{ thread.color }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div
                v-if="!threads.data || threads.data.length === 0"
                class="border-t border-brand-charcoal py-10 text-center md:py-16"
            >
                <p
                    class="font-serif text-xl text-brand-charcoal/20 italic md:text-3xl"
                >
                    Colecția este în curs de actualizare.
                </p>
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
