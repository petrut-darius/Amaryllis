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
        "description": "Povestea Amaryllis - Pasiunea noastră pentru design floral organic și sustenabil în Târgu Mureș.",
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
        <meta name="description" content="Află mai multe despre pasiunea noastră pentru design floral organic și sustenabil. Amaryllis - unde fiecare floare are o poveste și fiecare aranjament este o operă de artă.">
        <link rel="canonical" :href="route('about')" />

        <meta property="og:title" content="Povestea Noastră | Amaryllis Florărie Târgu Mureș" />
        <meta property="og:description" content="Află mai multe despre pasiunea noastră pentru design floral organic și sustenabil." />
        <meta property="og:type" content="website" />
        <meta property="og:url" :content="route('about')" />
        <meta property="og:image" content="/amaryllis_logo.png" />
    </Head>

    <GuestLayout>
        <div class="space-y-16 md:space-y-32 pt-6 md:pt-6">
            <!-- Story Section: Large Scale Editorial -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 space-y-12 order-2 lg:order-1">
                    <div class="space-y-8">
                        <span class="uppercase tracking-[1em] text-[10px] text-brand-ruby font-bold block animate-fade-in">The Beginning</span>
                        <h1 class="text-5xl md:text-8xl font-serif text-brand-charcoal leading-[1] animate-reveal">
                            Founded on a <br/>
                            <span class="italic font-normal text-brand-gold font-script text-5xl md:text-9xl lowercase tracking-normal">love for the organic</span>
                        </h1>
                    </div>
                    <div class="space-y-10 text-brand-charcoal/60 leading-relaxed text-sm md:text-lg font-light animate-fade-in-up delay-500 max-w-xl">
                        <p>
                            Amaryllis began in a small garden workshop with a simple mission: to celebrate the natural elegance of flowers. We believe that floral design is an art form that captures the fleeting beauty of the seasons.
                        </p>
                        <p>
                            Over the years, we've grown into a full-service studio, but our core philosophy remains unchanged. We treat every stem with respect and every client with the utmost care.
                        </p>
                    </div>
                    <div class="pt-8 animate-fade-in delay-700">
                        <div class="w-24 h-px bg-brand-gold/30"></div>
                    </div>
                </div>
                <div class="lg:col-span-6 aspect-[4/5] overflow-hidden order-first lg:order-last relative group shadow-2xl animate-reveal delay-300">
                    <img src="https://images.unsplash.com/photo-1596438459194-f275f413d6ff?auto=format&fit=crop&q=80&w=1000" alt="Our Studio" class="w-full h-full object-cover grayscale-[0.4] group-hover:grayscale-0 transition-all duration-[3s] group-hover:scale-110" />
                    <div class="absolute inset-0 bg-brand-charcoal/10 group-hover:bg-transparent transition-colors duration-1000"></div>
                </div>
            </section>

            <!-- Philosophy Section: Asymmetrical Split -->
            <section class="space-y-12">
                <div class="text-center space-y-8 max-w-3xl mx-auto">
                    <p class="text-[10px] uppercase tracking-[1em] text-brand-ruby font-bold">The Core</p>
                    <h2 class="text-4xl md:text-7xl font-serif text-brand-charcoal">Our Approach to <span class="italic font-normal font-script text-4xl md:text-8xl text-brand-gold lowercase tracking-normal">nature</span></h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-16 items-start">
                    <!-- Column 1 -->
                    <div class="md:col-span-6 space-y-12 group">
                        <div class="relative aspect-[4/3] overflow-hidden bg-brand-ruby/10 shadow-2xl animate-reveal delay-300">
                            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=1000" alt="Work Process" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-6 max-w-md">
                            <h3 class="font-serif italic text-3xl md:text-5xl text-brand-charcoal">Intuitive Design</h3>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-sm md:text-base">
                                We favor a relaxed, garden-inspired aesthetic that allows flowers to breathe and dance. By working with the natural curves and textures of each bloom, we create arrangements that feel alive and effortless.
                            </p>
                        </div>
                    </div>
                    <!-- Column 2 (Offset) -->
                    <div class="md:col-span-6 space-y-12 group md:mt-16">
                        <div class="relative aspect-[4/3] overflow-hidden bg-brand-rose/10 shadow-2xl animate-reveal delay-500">
                            <img src="https://images.unsplash.com/photo-1453904300235-0f2f60b15b5d?auto=format&fit=crop&q=80&w=1000" alt="Sourcing" class="w-full h-full object-cover grayscale-[0.2] group-hover:grayscale-0 transition-transform duration-[2s] group-hover:scale-110" />
                        </div>
                        <div class="space-y-6 max-w-md ml-auto">
                            <h3 class="font-serif italic text-3xl md:text-5xl text-brand-charcoal text-right">Honest Sourcing</h3>
                            <p class="text-brand-charcoal/50 leading-loose font-light text-sm md:text-base text-right">
                                Sustainability and quality are at the heart of everything we do. We prioritize locally grown flowers and seasonal varieties, ensuring our designs are not only beautiful but also respectful of the environment.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final Quote: Minimalist Grandeur -->
            <section class="py-12 md:py-20 text-center border-t border-brand-charcoal">
                <div class="max-w-4xl mx-auto px-6 space-y-12">
                    <p class="text-3xl md:text-6xl font-serif italic text-brand-charcoal leading-snug">
                        "Every bouquet is a unique story, told through the <span class="text-brand-gold font-script text-4xl md:text-8xl lowercase tracking-normal">delicate whisper</span> of petals."
                    </p>
                    <div class="pt-8 animate-fade-in-up delay-500">
                        <Link :href="route('contact.create')">
                            <PrimaryButton>Begin Your Inquiry</PrimaryButton>
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
