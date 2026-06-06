<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const structuredData = computed(() => {
    return JSON.stringify({
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "mainEntity": {
            "@id": "https://amaryllis-flori.ro/#organization"
        },
        "description": "Povestea Amaryllis - O tradiție de peste 25 de ani în design floral și evenimente premium în Târgu Mureș.",
        "publisher": {
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
</script>

<template>
    <Head>
        <title>Povestea Noastră | Amaryllis Florărie Târgu Mureș</title>
        <meta name="description" content="Descoperă povestea Amaryllis: peste 25 de ani de pasiune pentru evenimente și flori în Târgu Mureș. Eleganță, autenticitate și emoție în fiecare creație florală.">
        <link rel="canonical" :href="route('about')" />

        <meta property="og:title" content="Povestea Noastră | Amaryllis Florărie Târgu Mureș" />
        <meta property="og:description" content="Amaryllis — un loc în care eleganța, autenticitatea și emoția se întâlnesc. De la decoruri premium la arta floristicii moderne." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('about')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-12 md:space-y-32 pt-4 md:pt-6">
            <!-- Story Section: Large Scale Editorial -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-8 md:space-y-12 order-2 lg:order-1 px-4 md:px-0">
                    <div class="space-y-4 md:space-y-8">
                        <span class="uppercase tracking-[0.6em] md:tracking-[1em] text-[8px] md:text-[10px] text-brand-ruby font-bold block animate-fade-in">Începuturile</span>
                        <h1 class="text-3xl md:text-8xl font-serif text-brand-charcoal leading-[1.1] md:leading-[1] animate-reveal">
                            Fondată din <br/>
                            <span class="italic font-normal text-brand-gold font-script text-3xl md:text-9xl lowercase tracking-normal">pasiune pentru frumos</span>
                        </h1>
                    </div>
                    <div class="space-y-6 md:space-y-10 text-brand-charcoal/60 leading-relaxed text-sm md:text-lg font-light animate-fade-in-up delay-500 max-w-xl">
                        <p>
                            Totul a început acum aproape 25 de ani, din pasiunea pentru organizarea de evenimente. De la nunți elegante și botezuri intime, până la majorate și decoruri create cu atenție la fiecare detaliu, fondatoarea Amaryllis a fost printre primele persoane din Târgu Mureș care au adus rafinamentul huselor de brocard și conceptul de decor premium.
                        </p>
                        <p>
                            În timp, experiența acumulată a dus firesc către lumea florilor — acel element care transformă orice moment într-o amintire. În 2015, am preluat florăria care există încă din 2003 și am început să construim ceea ce astăzi înseamnă Amaryllis: un loc în care eleganța, autenticitatea și emoția se întâlnesc.
                        </p>
                    </div>
                    <div class="pt-4 md:pt-8 animate-fade-in delay-700">
                        <div class="w-16 md:w-24 h-px bg-brand-gold/30"></div>
                    </div>
                </div>
                <div class="lg:col-span-6 aspect-[3/4] md:aspect-[4/5] overflow-hidden order-first lg:order-last relative group shadow-xl md:shadow-2xl animate-reveal delay-300">
                    <img src="https://images.unsplash.com/photo-1596438459194-f275f413d6ff?auto=format&fit=crop&q=80&w=1000" alt="Amaryllis Studio" class="w-full h-full object-cover grayscale-[0.4] group-hover:grayscale-0 transition-all duration-[3s] group-hover:scale-110" />
                    <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Split -->
            <section class="space-y-8 md:space-y-12 px-4 md:px-0">
                <div class="text-center space-y-4 md:space-y-8 max-w-3xl mx-auto">
                    <p class="text-[8px] md:text-[10px] uppercase tracking-[0.6em] md:tracking-[1em] text-brand-ruby font-bold">Viziunea Noastră</p>
                    <h2 class="text-2xl md:text-7xl font-serif text-brand-charcoal">O abordare <span class="italic font-normal font-script text-2xl md:text-8xl text-brand-gold lowercase tracking-normal">autentică</span></h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-12 md:gap-16 items-start">
                    <!-- Column 1 -->
                    <div class="md:col-span-6 space-y-8 md:space-y-12 group">
                        <div class="relative aspect-video md:aspect-[4/3] overflow-hidden bg-brand-ruby/10 shadow-xl md:shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=1000" alt="Design Floral" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-4 md:space-y-6 max-w-md">
                            <h3 class="font-serif italic text-xl md:text-5xl text-brand-charcoal">Design Intuitiv</h3>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-xs md:text-base">
                                Credem că florile nu sunt doar un cadou. Sunt emoție, intenție și modul prin care oamenii transmit ceea ce uneori nu poate fi spus în cuvinte. Fiecare creație este realizată cu atenție, adaptată stilului și poveștii fiecărui client.
                            </p>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-xs md:text-base">
                                Această flexibilitate și atenție la detalii definesc stilul Amaryllis — autentic, fresh și elegant, capabil să devină exact ceea ce momentul are nevoie pentru a rămâne în suflet.
                            </p>
                        </div>
                    </div>
                    <!-- Column 2 (Offset) -->
                    <div class="md:col-span-6 space-y-8 md:space-y-12 group md:mt-16">
                        <div class="relative aspect-video md:aspect-[4/3] overflow-hidden bg-brand-rose/10 shadow-xl md:shadow-2xl animate-reveal delay-500">
                            <img src="https://images.unsplash.com/photo-1453904300235-0f2f60b15b5d?auto=format&fit=crop&q=80&w=1000" alt="Evoluție" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-4 md:space-y-6 max-w-md ml-auto md:text-right">
                            <h3 class="font-serif italic text-xl md:text-5xl text-brand-charcoal">Evoluție Constantă</h3>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-xs md:text-base">
                                De la „florăria de la poalele podului Mureș” de pe strada Tisei, astăzi ne continuăm povestea într-un nou spațiu în zona Tudor, pe strada 1 Decembrie 1918, cu aceeași pasiune și o viziune modernă.
                            </p>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-xs md:text-base">
                                Ne dorim să ridicăm standardul experienței florale în Târgu Mureș și să construim un brand local în care oamenii aleg să revină pentru calitate, profesionalism și emoția pe care o simt de fiecare dată când ne trec pragul.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final Quote: Minimalist Grandeur -->
            <section class="py-12 md:py-20 text-center border-t border-brand-charcoal mx-4 md:mx-0">
                <div class="max-w-4xl mx-auto space-y-8 md:space-y-12">
                    <p class="text-xl md:text-6xl font-serif italic text-brand-charcoal leading-snug">
                        "Într-un oraș al recomandărilor sincere, ne-am construit povestea natural — prin <span class="text-brand-gold font-script text-2xl md:text-8xl lowercase tracking-normal">emoții reale</span> și oameni mulțumiți."
                    </p>
                    <div class="pt-4 md:pt-8 animate-fade-in-up delay-500">
                        <Link :href="route('contact.create')">
                            <PrimaryButton class="!text-[10px] md:!text-xs py-3 px-6 md:py-4 md:px-10">Contactează-ne</PrimaryButton>
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