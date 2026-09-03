<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "mainEntity": {
            "@id": "https://floraria-amaryllis.ro/#organization"
        },
        "description": "Povestea Amaryllis - O tradiție de peste 25 de ani în design floral și evenimente premium în Târgu Mureș.",
        "publisher": {
            "@id": "https://floraria-amaryllis.ro/#organization"
        }
    });
});
</script>

<template>
    <Head>
        <title>Povestea Noastră | Amaryllis Florărie Târgu Mureș</title>
        <meta name="description" content="Descoperă povestea Amaryllis: peste 25 de ani de pasiune pentru evenimente și flori în Târgu Mureș. Eleganță, autenticitate și emoție în fiecare creație florală.">
        <link rel="canonical" :href="route('about')" />

        <meta property="og:title" content="Povestea Noastră | Amaryllis Florărie Târgu Mureș" />
        <meta property="og:description" content="Amaryllis un loc în care eleganța, autenticitatea și emoția se întâlnesc. De la decoruri premium la arta floristicii moderne." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('about')" />
        <meta property="og:image" content="https://floraria-amaryllis.ro/amaryllis_logo.png" />

        <component :is="'script'" type="application/ld+json">
            {{ structuredData }}
        </component>
    </Head>
      <GuestLayout>
        <div class="space-y-6 md:space-y-10 pt-4 md:pt-6">
            <!-- Story Section: Large Scale Editorial -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-6 md:space-y-8 order-2 lg:order-1 px-4 md:px-0">
                    <div class="text-center max-w-3xl mx-auto">
                        <h1 class="text-3xl md:text-6xl font-serif text-brand-charcoal leading-[1.1] md:leading-[1] animate-reveal">
                            Fondată din <br/>
                            <span class="italic font-normal text-brand-gold font-script text-3xl md:text-6xl lowercase tracking-normal">pasiune pentru frumos</span>
                        </h1>
                    </div>
                    <div class="space-y-4 md:space-y-6 text-brand-charcoal/85 leading-relaxed text-base md:text-lg font-normal animate-fade-in-up delay-500 max-w-xl">
                        <p>
                            Totul a început acum aproape 25 de ani, din pasiunea pentru organizarea de evenimente. De la nunți și botezuri până la majorate, fondatoarea Amaryllis a fost printre primele persoane din Târgu Mureș care au introdus decorurile premium și husele de brocard.
                        </p>
                        <p>
                            Experiența a dus firesc către lumea florilor, iar în 2015 am preluat florăria înființată în 2003. Astăzi, Amaryllis este locul în care eleganța, autenticitatea și emoția dau viață fiecărui moment.
                        </p>
                    </div>
                    <div class="pt-2 md:pt-4 animate-fade-in delay-700">
                        <div class="w-16 md:w-24 h-px bg-brand-gold/50"></div>
                    </div>
                </div>
                <div class="lg:col-span-6 aspect-[3/4] md:aspect-[4/5] overflow-hidden order-first lg:order-last relative group shadow-xl md:shadow-2xl animate-reveal delay-300">
                    <img src="https://images.unsplash.com/photo-1596438459194-f275f413d6ff?auto=format&fit=crop&q=80&w=1000" alt="Amaryllis Studio" class="w-full h-full object-cover grayscale-[0.4] group-hover:grayscale-0 transition-all duration-[3s] group-hover:scale-110" />
                    <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Split -->
            <section class="space-y-10 md:space-y-16 px-4 md:px-0">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-2xl md:text-7xl font-serif text-brand-charcoal">O abordare <span class="italic font-normal font-script text-2xl md:text-8xl text-brand-gold lowercase tracking-normal">autentică</span></h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-start">
                    <!-- Column 1 -->
                    <div class="md:col-span-6 space-y-6 md:space-y-8 group">
                        <div class="relative aspect-video md:aspect-[4/3] overflow-hidden bg-brand-ruby/10 shadow-xl md:shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=1000" alt="Design Floral" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-3 md:space-y-4 max-w-md">
                            <h3 class="font-serif italic text-xl md:text-5xl text-brand-charcoal">Design Intuitiv</h3>
                            <p class="text-brand-charcoal/80 leading-relaxed font-normal text-sm md:text-base">
                                La Amaryllis, credem că florile transmit emoții și spun povești dincolo de cuvinte. Fiecare creație este realizată cu grijă și adaptată fiecărui client, într-un stil autentic, fresh și elegant, care transformă orice moment într-o amintire de neuitat.    
                            </p>
                        </div>
                    </div>
                    <!-- Column 2 (Offset) -->
                    <div class="md:col-span-6 space-y-6 md:space-y-8 group md:mt-10">
                        <div class="relative aspect-video md:aspect-[4/3] overflow-hidden bg-brand-rose/10 shadow-xl md:shadow-2xl animate-reveal delay-500">
                            <img src="https://images.unsplash.com/photo-1453904300235-0f2f60b15b5d?auto=format&fit=crop&q=80&w=1000" alt="Evoluție" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-3 md:space-y-4 max-w-md md:ml-auto">
                            <h3 class="font-serif italic text-xl md:text-5xl text-brand-charcoal">Evoluție Constantă</h3>
                            <p class="text-brand-charcoal/80 leading-relaxed font-normal text-sm md:text-base">
                                De la florăria de pe strada Tisei, ne continuăm astăzi povestea într-un nou spațiu, pe strada 1 Decembrie 1918, păstrând aceeași pasiune și o viziune modernă. Ne dorim să oferim o experiență florală deosebită și să fim un brand local ales pentru calitate, profesionalism și emoția fiecărei vizite.    
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final Quote: Minimalist Grandeur -->
            <section class="py-8 md:py-12 text-center border-t border-brand-charcoal mx-4 md:mx-0">
                <div class="max-w-4xl mx-auto space-y-6 md:space-y-8">
                    <p class="text-xl md:text-6xl font-serif italic text-brand-charcoal leading-snug">
                        "Într-un oraș al recomandărilor sincere, ne-am construit povestea natural prin <span class="text-brand-gold font-script text-2xl md:text-8xl lowercase tracking-normal">emoții reale</span> și oameni mulțumiți."
                    </p>
                    <div class="pt-4 md:pt-6 animate-fade-in-up delay-500">
                        <Link :href="route('contact.create')">
                            <PrimaryButton>Contactează-ne</PrimaryButton>
                        </Link>
                    </div>
                </div>
            </section>
        </div>
    </GuestLayout>
</template>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
}

.delay-100 { animation-delay: 0.1s; }
.delay-300 { animation-delay: 0.3s; }
</style>